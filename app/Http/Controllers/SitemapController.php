<?php
/*
    Site Name: Official Web Portal of STCSCOUTS (The Tribe of the Evening Star)
    Version: 5.0
    Created: July 2024
	This version developed and maintained by: Sidath Gajanayaka in collaboration with Digico Labs (Private) Limited.
    © 2003 - 2024 - 16th Colombo Scout Group of S. Thomas' College, Mount Lavinia. All rights reserved.

    Unauthorised use and/or duplication of this material without express and written permission from the authors /
    owners of this site is strictly prohibited.

    Contact: info@digicolabs.com, stcscouts@gmail.com.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function generateXmlSitemap()
    {

//        $urls = [
//            ['loc' => url('/'), 'lastmod' => now()->toAtomString(), 'priority' => '1.0'],
//            ['loc' => url('/about'), 'lastmod' => now()->toAtomString(), 'priority' => '0.8'],
//            ['loc' => url('/services'), 'lastmod' => now()->toAtomString(), 'priority' => '0.8'],
//            ['loc' => url('/services/service1'), 'lastmod' => now()->toAtomString(), 'priority' => '0.7'],
//            ['loc' => url('/services/service2'), 'lastmod' => now()->toAtomString(), 'priority' => '0.7'],
//            ['loc' => url('/services/service3'), 'lastmod' => now()->toAtomString(), 'priority' => '0.7'],
//            ['loc' => url('/contact'), 'lastmod' => now()->toAtomString(), 'priority' => '0.8'],
//            ['loc' => url('/blog'), 'lastmod' => now()->toAtomString(), 'priority' => '0.8'],
//            ['loc' => url('/blog/post1'), 'lastmod' => now()->toAtomString(), 'priority' => '0.7'],
//            ['loc' => url('/blog/post2'), 'lastmod' => now()->toAtomString(), 'priority' => '0.7'],
//        ];

        //Get from web.php
        // Get all named routes
//        $routes = Route::getRoutes()->getRoutesByName();
//        $urls = [];
//
//        foreach ($routes as $name => $route) {
//            $urls[] = [
//                'loc' => url($route->uri()),
//                'lastmod' => now()->toAtomString(),
//                'priority' => '0.8'
//            ];
//        }

        // Path to the Blade file
        $filePath = resource_path('views/sitemap.blade.php');

        // Read the file content
        $fileContent = file_get_contents($filePath);

        // Use regex to find all href attributes
        preg_match_all('/href=["\'](.*?)["\']/', $fileContent, $matches);

        // Extracted hrefs will be in $matches[1]
        $hrefs = $matches[1];

        // Return the hrefs as JSON response
        //return response()->json($hrefs);

        $urls = [];

        foreach ($hrefs as $route) {
            $urls[] = [
                'loc' => url($route),
                'lastmod' => now()->toAtomString(),
                'priority' => '0.8'
            ];
        }

        // Append every published database report so newly-added reports show up
        // in the sitemap automatically (the static hrefs above only cover the
        // reports that existed when the sitemap blade was written).
        foreach (\App\Models\Report::where('published', true)->get() as $report) {
            $urls[] = [
                'loc' => url('/' . $report->slug),
                'lastmod' => optional($report->updated_at)->toAtomString() ?: now()->toAtomString(),
                'priority' => '0.7',
            ];
        }

        // De-duplicate by URL (a migrated report may also be listed statically).
        $urls = collect($urls)->unique('loc')->values()->all();

        $content = view('sitemap.xml', compact('urls'));
//        $content = view('sitemap.xml', compact('urls'));

        return Response::make($content, 200)->header('Content-Type', 'application/xml');
//        return Response::make($hrefs, 200)->header('Content-Type', 'application/json');
    }
}
