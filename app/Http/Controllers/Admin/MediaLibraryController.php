<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MediaLibraryController extends Controller
{
    private const IMAGE_EXTS  = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
    private const UPLOAD_ROOT = 'uploads';

    // ── Helpers ──────────────────────────────────────────────────────────────

    private function uploadsRoot(): string
    {
        return public_path(self::UPLOAD_ROOT);
    }

    /** Resolve a relative folder path to an absolute path, or abort if unsafe. */
    private function safeFolderPath(string $relative): string
    {
        // Strip leading/trailing slashes and collapse any ..
        $parts = array_filter(explode('/', $relative), fn ($p) => $p !== '' && $p !== '.' && $p !== '..');
        $abs   = $this->uploadsRoot() . ($parts ? DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts) : '');

        if (! str_starts_with(realpath($abs) ?: $abs, realpath($this->uploadsRoot()))) {
            abort(403);
        }

        return $abs;
    }

    /** Validate that a single folder segment is safe (letters, numbers, hyphens, underscores). */
    private function validateFolderName(string $name): void
    {
        if (! preg_match('/^[a-z0-9_\-]+$/i', $name) || strlen($name) > 64) {
            abort(422, 'Folder name may only contain letters, numbers, hyphens and underscores.');
        }
    }

    // ── Actions ──────────────────────────────────────────────────────────────

    public function index(Request $request)
    {
        $folder  = trim($request->query('folder', ''), '/');
        $absPath = $folder ? $this->safeFolderPath($folder) : $this->uploadsRoot();

        // Subdirectories in current path
        $subfolders = collect(File::directories($absPath))
            ->map(fn ($d) => [
                'name'   => basename($d),
                'path'   => ($folder ? $folder . '/' : '') . basename($d),
                'count'  => count(File::files($d)),
            ])
            ->sortBy('name')
            ->values();

        // Files in current path
        $files = collect(File::files($absPath))
            ->filter(fn ($f) => $f->getFilename() !== '.gitignore')
            ->sortByDesc(fn ($f) => $f->getCTime())
            ->map(function ($f) use ($folder) {
                $ext      = strtolower($f->getExtension());
                $relPath  = ($folder ? $folder . '/' : '') . $f->getFilename();
                return [
                    'name'     => $f->getFilename(),
                    'path'     => $relPath,
                    'url'      => '/' . self::UPLOAD_ROOT . '/' . $relPath,
                    'size'     => $f->getSize(),
                    'ext'      => $ext,
                    'is_image' => in_array($ext, self::IMAGE_EXTS),
                    'is_pdf'   => $ext === 'pdf',
                ];
            })
            ->values();

        // Breadcrumb segments
        $breadcrumb = [];
        if ($folder) {
            $parts = explode('/', $folder);
            $built = '';
            foreach ($parts as $part) {
                $built = $built ? $built . '/' . $part : $part;
                $breadcrumb[] = ['label' => $part, 'path' => $built];
            }
        }

        return view('admin.media.index', compact('files', 'subfolders', 'folder', 'breadcrumb'));
    }

    public function createFolder(Request $request)
    {
        $request->validate(['name' => 'required|string|max:64', 'folder' => 'nullable|string']);

        $name       = $request->input('name');
        $parent     = trim($request->input('folder', ''), '/');
        $this->validateFolderName($name);

        $parentAbs  = $parent ? $this->safeFolderPath($parent) : $this->uploadsRoot();
        $newAbs     = $parentAbs . DIRECTORY_SEPARATOR . $name;

        if (! is_dir($newAbs)) {
            mkdir($newAbs, 0755, true);
        }

        $newRelPath = ($parent ? $parent . '/' : '') . $name;

        return redirect()
            ->route('admin.media.index', ['folder' => $newRelPath])
            ->with('status', 'Folder "' . $name . '" created.');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file'   => 'required|file|mimes:jpg,jpeg,png,gif,webp,svg,pdf,doc,docx|max:16384',
            'folder' => 'nullable|string',
        ]);

        $folder  = trim($request->input('folder', ''), '/');
        $absPath = $folder ? $this->safeFolderPath($folder) : $this->uploadsRoot();

        $file     = $request->file('file');
        $name     = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) ?: 'file';
        $filename = $name . '-' . substr(md5(uniqid('', true)), 0, 8) . '.' . $file->getClientOriginalExtension();

        $file->move($absPath, $filename);

        return redirect()
            ->route('admin.media.index', $folder ? ['folder' => $folder] : [])
            ->with('status', 'Uploaded: ' . $filename);
    }

    public function destroy(Request $request)
    {
        $request->validate(['path' => 'required|string']);

        $relative = trim($request->input('path'), '/');

        // Rebuild safe absolute path via validated segments
        $parts = array_filter(explode('/', $relative), fn ($p) => $p !== '' && $p !== '.' && $p !== '..');
        $abs   = $this->uploadsRoot() . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts);
        $real  = realpath($abs);

        if ($real && str_starts_with($real, realpath($this->uploadsRoot())) && is_file($real)) {
            @unlink($real);
            $status = 'Deleted: ' . basename($real);
        } else {
            $status = 'File not found.';
        }

        // Return to the folder this file was in
        $folder = count($parts) > 1 ? implode('/', array_slice($parts, 0, -1)) : null;

        return redirect()
            ->route('admin.media.index', $folder ? ['folder' => $folder] : [])
            ->with('status', $status);
    }

    public function destroyFolder(Request $request)
    {
        $request->validate(['folder' => 'required|string']);

        $relative = trim($request->input('folder'), '/');
        $parts    = array_filter(explode('/', $relative), fn ($p) => $p !== '' && $p !== '.' && $p !== '..');

        if (empty($parts)) {
            abort(403, 'Cannot delete the root uploads folder.');
        }

        $abs  = $this->uploadsRoot() . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $parts);
        $real = realpath($abs);

        if ($real && str_starts_with($real, realpath($this->uploadsRoot())) && is_dir($real)) {
            File::deleteDirectory($real);
        }

        $parent = count($parts) > 1 ? implode('/', array_slice($parts, 0, -1)) : null;

        return redirect()
            ->route('admin.media.index', $parent ? ['folder' => $parent] : [])
            ->with('status', 'Folder "' . basename($real) . '" deleted.');
    }
}
