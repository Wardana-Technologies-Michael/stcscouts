<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Handle an image upload from the report editor. Saves the file under
     * public/uploads/ and returns its public URL as JSON so the admin can
     * paste it into the report's HTML body.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 8 MB cap; images only.
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,webp,svg|max:8192',
        ]);

        $file = $request->file('file');

        $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
        $name = $name ?: 'image';
        $filename = $name . '-' . substr(md5(uniqid('', true)), 0, 8) . '.' . $file->getClientOriginalExtension();

        // Store directly in public/uploads (avoids needing `storage:link`).
        $destination = public_path('uploads');
        $file->move($destination, $filename);

        $url = '/uploads/' . $filename;

        return response()->json([
            'url'  => $url,
            'html' => '<img src="' . $url . '" class="img-fluid" alt="' . e($name) . '" />',
        ]);
    }
}
