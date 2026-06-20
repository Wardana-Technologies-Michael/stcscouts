<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{
    /**
     * List all reports, grouped by year (newest first) for the admin dashboard.
     */
    public function index()
    {
        $reports = Report::orderByDesc('year')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('admin.reports.index', compact('reports'));
    }

    /**
     * Show the "new report" form.
     */
    public function create()
    {
        $report = new Report([
            'year'      => (int) date('Y'),
            'category'  => 'report',
            'icon'      => 'description',
            'published' => true,
        ]);

        return view('admin.reports.form', [
            'report' => $report,
            'mode'   => 'create',
        ]);
    }

    /**
     * Persist a new report.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        Report::create($data);

        return redirect()
            ->route('admin.reports.index')
            ->with('status', "Report “{$data['title']}” created.");
    }

    /**
     * Show the edit form for an existing report.
     */
    public function edit(Report $report)
    {
        return view('admin.reports.form', [
            'report' => $report,
            'mode'   => 'edit',
        ]);
    }

    /**
     * Persist edits.
     */
    public function update(Request $request, Report $report)
    {
        $data = $this->validateData($request, $report);

        $report->update($data);

        return redirect()
            ->route('admin.reports.index')
            ->with('status', "Report “{$report->title}” updated.");
    }

    /**
     * Delete a report.
     */
    public function destroy(Report $report)
    {
        $title = $report->title;
        $report->delete();

        return redirect()
            ->route('admin.reports.index')
            ->with('status', "Report “{$title}” deleted.");
    }

    /**
     * Validate + normalise incoming report data. Auto-generates a slug from the
     * title when one isn't supplied.
     */
    protected function validateData(Request $request, ?Report $report = null): array
    {
        $data = $request->validate([
            'title'      => 'required|string|max:255',
            'chip_label' => 'nullable|string|max:255',
            'year'       => 'required|integer|min:1900|max:2100',
            'category'   => ['required', Rule::in(['report', 'event'])],
            'icon'       => 'nullable|string|max:64',
            'slug'       => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[^\/\s]+$/', // no slashes or whitespace
                Rule::unique('reports', 'slug')->ignore($report?->id),
            ],
            'body'        => 'nullable|string',
            'sort_order'  => 'nullable|integer',
            'published'   => 'nullable|boolean',
        ]);

        $data['slug'] = $data['slug']
            ?: $this->uniqueSlug($data['title'], $report?->id);

        $data['icon']       = $data['icon'] ?: 'description';
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['published']  = $request->boolean('published');

        return $data;
    }

    /**
     * Build a unique slug from a title.
     */
    protected function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'report';
        $slug = $base;
        $i = 2;

        while (Report::where('slug', $slug)
            ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}
