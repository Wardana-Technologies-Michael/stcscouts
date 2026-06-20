<?php

namespace App\Console\Commands;

use App\Models\Report;
use Illuminate\Console\Command;

class ImportReports extends Command
{
    protected $signature = 'reports:import {--fresh : Delete existing reports before importing}';

    protected $description = 'Import the existing static Year Report Blade pages into the reports table';

    /**
     * Each existing report: slug (= old URL path), year, category, icon,
     * chip label, and the Blade view file it was rendered from.
     */
    protected function map(): array
    {
        $yr = fn ($y) => [
            'slug' => "year-report-$y", 'year' => $y, 'category' => 'report',
            'icon' => 'description', 'chip' => "Year Report – $y",
            'view' => "Recent_Year_Reports/$y/year-report-$y",
        ];

        $rows = [
            ['slug' => '2nd-asia-pacific-6th-new-zealand-venture-scout-camp-1995', 'year' => 1995, 'category' => 'event', 'icon' => 'explore', 'chip' => "Asia Pacific Scout Camp '95", 'view' => 'Recent_Year_Reports/1995/2nd-asia-pacific-6th-new-zealand-venture-scout-camp-1995'],
            $yr(1995),
            ['slug' => '17th-Asia-Pacific-Scout-Jamboree-1996', 'year' => 1996, 'category' => 'event', 'icon' => 'campaign', 'chip' => '17th AP Scout Jamboree', 'view' => 'Recent_Year_Reports/1996/17th-Asia-Pacific-Scout-Jamboree-1996'],
            ['slug' => 'Tidal-Wave-1996', 'year' => 1996, 'category' => 'event', 'icon' => 'water', 'chip' => 'Tidal Wave – 1996', 'view' => 'Recent_Year_Reports/1996/tidal-Wave-1996'],
            $yr(1996),
            ['slug' => '18th-Asia-Pacific-Scout-Jamboree-1997', 'year' => 1997, 'category' => 'event', 'icon' => 'campaign', 'chip' => '18th AP Scout Jamboree', 'view' => 'Recent_Year_Reports/1997/18th-Asia-Pacific-Scout-Jamboree-1997'],
            ['slug' => 'Coastal-Winds–1997', 'year' => 1997, 'category' => 'event', 'icon' => 'air', 'chip' => 'Coastal Winds – 1997', 'view' => 'Recent_Year_Reports/1997/Coastal-Winds–1997'],
            $yr(1997),
            ['slug' => 'Sand-Storm–1998', 'year' => 1998, 'category' => 'event', 'icon' => 'grain', 'chip' => 'Sand Storm – 1998', 'view' => 'Recent_Year_Reports/1998/Sand-Storm–1998'],
            $yr(1998),
            ['slug' => 'Sweden-National-Jamboree-’99', 'year' => 1999, 'category' => 'event', 'icon' => 'flag', 'chip' => "Sweden National Jamboree '99", 'view' => 'Recent_Year_Reports/1999/Sweden-National-Jamboree-’99'],
            ['slug' => 'De-Ja-‘Vu–1999', 'year' => 1999, 'category' => 'event', 'icon' => 'history', 'chip' => "De Ja 'Vu – 1999", 'view' => 'Recent_Year_Reports/1999/De-Ja-‘Vu–1999'],
            ['slug' => 'Thai-National-Jamboree-’99', 'year' => 1999, 'category' => 'event', 'icon' => 'forest', 'chip' => "Thai National Jamboree '99", 'view' => 'Recent_Year_Reports/1999/Thai-National-Jamboree-’99'],
            $yr(1999),
            ['slug' => 'Cyclone-2000', 'year' => 2000, 'category' => 'event', 'icon' => 'cyclone', 'chip' => 'Cyclone 2000', 'view' => 'Recent_Year_Reports/2000/Cyclone-2000'],
            $yr(2000),
            $yr(2001),
            ['slug' => 'Tribe-Out-2002', 'year' => 2002, 'category' => 'event', 'icon' => 'groups', 'chip' => 'Tribe Out 2002', 'view' => 'Recent_Year_Reports/2002/tribe-out-2002'],
            $yr(2002),
            $yr(2003),
            ['slug' => 'tribal-craft-2004', 'year' => 2004, 'category' => 'event', 'icon' => 'handyman', 'chip' => 'Tribal Craft 2004', 'view' => 'Recent_Year_Reports/2004/tribal-craft-2004'],
            $yr(2004),
            $yr(2005),
            $yr(2006),
            $yr(2007),
            $yr(2008),
            $yr(2009),
            $yr(2010),
            $yr(2011),
            ['slug' => 'Centennial-Flames-2012', 'year' => 2012, 'category' => 'event', 'icon' => 'local_fire_department', 'chip' => 'Centennial Flames 2012', 'view' => 'Recent_Year_Reports/2012/centennial-flames-2012'],
            ['slug' => 'International-Achievement', 'year' => 2012, 'category' => 'event', 'icon' => 'public', 'chip' => 'International Achievement', 'view' => 'Recent_Year_Reports/2012/international-achievement'],
            $yr(2012),
            $yr(2013),
            $yr(2014),
            $yr(2015),
            $yr(2016),
            $yr(2017),
            $yr(2018),
            ['slug' => 'Escapade-2019', 'year' => 2019, 'category' => 'event', 'icon' => 'celebration', 'chip' => 'Escapade 2019', 'view' => 'Recent_Year_Reports/2019/escapade-2019'],
            $yr(2019),
            ['slug' => 'ESCAPADE=At-Home-"Kids"', 'year' => 2020, 'category' => 'event', 'icon' => 'home_work', 'chip' => 'ESCAPADE At Home "Kids"', 'view' => 'Recent_Year_Reports/2020/escapade-at-home-kids'],
            ['slug' => 'ONLINE-CAMP-FIRE', 'year' => 2020, 'category' => 'event', 'icon' => 'local_fire_department', 'chip' => 'Online Camp Fire', 'view' => 'Recent_Year_Reports/2020/ONLINE-CAMP-FIRE'],
        ];

        // Assign a stable sort order within each year (events before the annual report).
        $perYear = [];
        foreach ($rows as &$row) {
            $perYear[$row['year']] = ($perYear[$row['year']] ?? -1) + 1;
            $row['sort_order'] = $perYear[$row['year']];
        }

        return $rows;
    }

    public function handle(): int
    {
        if ($this->option('fresh')) {
            Report::query()->delete();
            $this->warn('Cleared existing reports.');
        }

        $imported = 0;
        $skipped = 0;

        foreach ($this->map() as $row) {
            $viewPath = resource_path('views/' . str_replace('/', DIRECTORY_SEPARATOR, $row['view']) . '.blade.php');

            if (! is_file($viewPath)) {
                $this->error("Missing view: {$row['view']} (slug {$row['slug']}) — skipped");
                $skipped++;
                continue;
            }

            $raw = file_get_contents($viewPath);
            [$title, $body] = $this->extract($raw);

            Report::updateOrCreate(
                ['slug' => $row['slug']],
                [
                    'title'      => $title ?: $row['chip'],
                    'chip_label' => $row['chip'],
                    'year'       => $row['year'],
                    'category'   => $row['category'],
                    'icon'       => $row['icon'],
                    'body'       => $body,
                    'sort_order' => $row['sort_order'],
                    'published'  => true,
                ]
            );

            $imported++;
            $this->line("✓ {$row['slug']}");
        }

        $this->info("Imported/updated {$imported} reports." . ($skipped ? " Skipped {$skipped}." : ''));

        return self::SUCCESS;
    }

    /**
     * Pull the original H1 (as the title) and the body HTML out of a Blade
     * report page: take the @section('content') block, strip the page-header,
     * and normalise asset()/url() helpers + backslash paths.
     *
     * @return array{0: ?string, 1: string}  [title, body]
     */
    protected function extract(string $raw): array
    {
        // Content between @section('content') and the final @endsection.
        if (preg_match("/@section\\(['\"]content['\"]\\)(.*)@endsection/s", $raw, $m)) {
            $content = $m[1];
        } else {
            $content = $raw;
        }

        // Capture the original H1 from the page-header (if present).
        $title = null;
        if (preg_match('/<section[^>]*page-header[^>]*>(.*?)<\/section>/is', $content, $hdr)) {
            if (preg_match('/<h1[^>]*>(.*?)<\/h1>/is', $hdr[1], $h1)) {
                $title = $this->cleanTitle($h1[1]);
            }
            // Remove the whole page-header block — the template regenerates it.
            $content = preg_replace('/<section[^>]*page-header[^>]*>.*?<\/section>/is', '', $content, 1);
        }

        $body = $this->normalise($content);

        return [$title, trim($body)];
    }

    /**
     * Turn Blade {{ asset('…') }} / {{ url('…') }} helpers into plain paths and
     * fix Windows-style backslash separators so the HTML is portable.
     */
    protected function normalise(string $html): string
    {
        // {{ asset('images\2005\x.jpg') }}  ->  /images/2005/x.jpg
        $html = preg_replace_callback(
            '/\{\{\s*asset\(\s*[\'"](.+?)[\'"]\s*\)\s*\}\}/s',
            fn ($m) => '/' . ltrim(str_replace('\\', '/', $m[1]), '/'),
            $html
        );

        // {{ url('/x') }} or {{ url('x') }}  ->  /x
        $html = preg_replace_callback(
            '/\{\{\s*url\(\s*[\'"](.+?)[\'"]\s*\)\s*\}\}/s',
            fn ($m) => '/' . ltrim(str_replace('\\', '/', $m[1]), '/'),
            $html
        );

        // Fix Windows backslash separators inside src/href/poster attributes
        // (e.g. <source src="images\2012\clip.mp4">), which break as URLs.
        $html = preg_replace_callback(
            '/\b(src|href|poster|data-src)\s*=\s*"([^"]*\\\\[^"]*)"/i',
            fn ($m) => $m[1] . '="' . str_replace('\\', '/', $m[2]) . '"',
            $html
        );
        $html = preg_replace_callback(
            "/\\b(src|href|poster|data-src)\\s*=\\s*'([^']*\\\\[^']*)'/i",
            fn ($m) => $m[1] . "='" . str_replace('\\', '/', $m[2]) . "'",
            $html
        );

        // Drop any stray Blade comments left behind.
        $html = preg_replace('/\{\{--.*?--\}\}/s', '', $html);

        return $html;
    }

    protected function cleanTitle(string $html): ?string
    {
        $text = html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = trim(preg_replace('/\s+/', ' ', $text));

        return $text !== '' ? $text : null;
    }
}
