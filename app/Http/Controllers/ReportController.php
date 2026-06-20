<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    /**
     * Render the Year Reports timeline index from the database.
     */
    public function index()
    {
        $reports = Report::where('published', true)
            ->orderBy('year')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        // Group by era band, then by year, preserving config order.
        $byEra = [];
        foreach (config('reports.eras') as $era) {
            $entries = $reports->filter(
                fn ($r) => $r->year >= $era['start'] && $r->year <= $era['end']
            );

            if ($entries->isEmpty()) {
                continue;
            }

            $byEra[] = [
                'meta'  => $era,
                'years' => $entries->groupBy('year')->sortKeys(),
            ];
        }

        return view('recent-year-reports', [
            'eras'  => $byEra,
            'total' => $reports->count(),
            'years' => $reports->pluck('year')->unique()->count(),
        ]);
    }

    /**
     * Render a single report at its slug. Returns 404 if no published report
     * matches — this is the catch-all that preserves the old static URLs.
     */
    public function show(string $slug)
    {
        $report = Report::where('slug', $slug)
            ->where('published', true)
            ->first();

        abort_if(! $report, 404);

        return view('report-show', compact('report'));
    }
}
