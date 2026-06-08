<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', function () {
    return view('home');
});

Route::get('/sitemap.xml', [SitemapController::class, 'generateXmlSitemap']);


Route::get('/new', function () {
    return view('home');
});

Route::get('/sitemap', function () {
    return view('sitemap');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/about-the-site', function () {
    return view('about-the-site');
});

Route::get('/troop-profile', function () {
    return view('troop-profile');
});

Route::get('/photo-gallery', function () {
    return view('photo-gallery');
});

Route::get('/badgework-new-syllabus', function () {
    return view('badgework-new-syllabus');
});

Route::get('/instructors', function () {
    return view('instructors');
});

Route::get('/the-group-committee', function () {
    return view('the-group-committee');
});

Route::get('/the-scout-dunk', function () {
    return view('the-scout-dunk');
});

Route::get('/kindling-legacy', function () {
    return view('kindling-legacy');
});

Route::get('/badgework-old-syllabus', function () {
    return view('badgework-old-syllabus');
});

Route::get('/cub-pack-leaders', function () {
    return view('cub-pack-leaders');
});

Route::get('/history-of-scouting-at-college', function () {
    return view('History/history-of-scouting-at-college');
});


Route::get('/history-of-scouting-at-college-2', function () {
    return view('History/history-of-scouting-at-college-2');
});

Route::get('/history-of-scouting-at-college-3', function () {
    return view('History/history-of-scouting-at-college-3');
});



Route::get('/history-of-the-16th-colombo-cub-pack', function () {
    return view('History/history-of-the-16th-colombo-cub-pack');
});

Route::get('/mr-w-i-muttiah', function () {
    return view('History/mr-w-i-muttiah');
});

Route::get('/mr-rex-jayasinha', function () {
    return view('History/mr-rex-jayasinha');
});

Route::get('/2nd-asia-pacific-6th-new-zealand-venture-scout-camp-1995', function () {
    return view('Recent_Year_Reports/1995/2nd-asia-pacific-6th-new-zealand-venture-scout-camp-1995');
});

Route::get('/year-report-1995', function () {
    return view('Recent_Year_Reports/1995/year-report-1995');
});


Route::get('/17th-Asia-Pacific-Scout-Jamboree-1996', function () {
    return view('Recent_Year_Reports/1996/17th-Asia-Pacific-Scout-Jamboree-1996');
});

Route::get('/Tidal-Wave-1996', function () {
    return view('Recent_Year_Reports/1996/tidal-Wave-1996');
});

Route::get('/year-report-1996', function () {
    return view('Recent_Year_Reports/1996/year-report-1996');
});

Route::get('/18th-Asia-Pacific-Scout-Jamboree-1997', function () {
    return view('Recent_Year_Reports/1997/18th-Asia-Pacific-Scout-Jamboree-1997');
});

Route::get('/Coastal-Winds–1997', function () {
    return view('Recent_Year_Reports/1997/Coastal-Winds–1997');
});

Route::get('/year-report-1997', function () {
    return view('Recent_Year_Reports/1997/year-report-1997');
});

Route::get('/Sand-Storm–1998', function () {
    return view('Recent_Year_Reports/1998/Sand-Storm–1998');
});

Route::get('/year-report-1998', function () {
    return view('Recent_Year_Reports/1998/year-report-1998');
});

Route::get('/Sweden-National-Jamboree-’99', function () {
    return view('Recent_Year_Reports/1999/Sweden-National-Jamboree-’99');
});

Route::get('/De-Ja-‘Vu–1999', function () {
    return view('Recent_Year_Reports/1999/De-Ja-‘Vu–1999');
});

Route::get('/Thai-National-Jamboree-’99', function () {
    return view('Recent_Year_Reports/1999/Thai-National-Jamboree-’99');
});

Route::get('/year-report-1999', function () {
    return view('Recent_Year_Reports/1999/year-report-1999');
});


Route::get('/Cyclone-2000', function () {
    return view('Recent_Year_Reports/2000/Cyclone-2000');
});

Route::get('/year-report-2000', function () {
    return view('Recent_Year_Reports/2000/year-report-2000');
});

Route::get('/year-report-2001', function () {
    return view('Recent_Year_Reports/2001/year-report-2001');
});

Route::get('/Tribe-Out-2002', function () {
    return view('Recent_Year_Reports/2002/tribe-out-2002');
});

Route::get('/year-report-2002', function () {
    return view('Recent_Year_Reports/2002/year-report-2002');
});

Route::get('/year-report-2003', function () {
    return view('Recent_Year_Reports/2003/year-report-2003');
});


Route::get('/tribal-craft-2004', function () {
    return view('Recent_Year_Reports/2004/tribal-craft-2004');
});


Route::get('/year-report-2004', function () {
    return view('Recent_Year_Reports/2004/year-report-2004');
});


Route::get('/year-report-2005', function () {
    return view('Recent_Year_Reports/2005/year-report-2005');
});


Route::get('/year-report-2006', function () {
    return view('Recent_Year_Reports/2006/year-report-2006');
});


Route::get('/year-report-2007', function () {
    return view('Recent_Year_Reports/2007/year-report-2007');
});


Route::get('/year-report-2008', function () {
    return view('Recent_Year_Reports/2008/year-report-2008');
});


Route::get('/year-report-2009', function () {
    return view('Recent_Year_Reports/2009/year-report-2009');
});


Route::get('/year-report-2010', function () {
    return view('Recent_Year_Reports/2010/year-report-2010');
});


Route::get('/year-report-2011', function () {
    return view('Recent_Year_Reports/2011/year-report-2011');
});


Route::get('/Centennial-Flames-2012', function () {
    return view('Recent_Year_Reports/2012/centennial-flames-2012');
});


Route::get('/International-Achievement', function () {
    return view('Recent_Year_Reports/2012/international-achievement');
});

Route::get('/year-report-2012', function () {
    return view('Recent_Year_Reports/2012/year-report-2012');
});

Route::get('/year-report-2013', function () {
    return view('Recent_Year_Reports/2013/year-report-2013');
});

Route::get('/year-report-2014', function () {
    return view('Recent_Year_Reports/2014/year-report-2014');
});

Route::get('/year-report-2015', function () {
    return view('Recent_Year_Reports/2015/year-report-2015');
});

Route::get('/year-report-2016', function () {
    return view('Recent_Year_Reports/2016/year-report-2016');
});

Route::get('/year-report-2017', function () {
    return view('Recent_Year_Reports/2017/year-report-2017');
});

Route::get('/year-report-2018', function () {
    return view('Recent_Year_Reports/2018/year-report-2018');
});

Route::get('/Escapade-2019', function () {
    return view('Recent_Year_Reports/2019/escapade-2019');
});

Route::get('/year-report-2019', function () {
    return view('Recent_Year_Reports/2019/year-report-2019');
});

Route::get('/ESCAPADE=At-Home-“Kids”', function () {
    return view('Recent_Year_Reports/2020/escapade-at-home-kids');
});

Route::get('/ONLINE-CAMP-FIRE', function () {
    return view('Recent_Year_Reports/2020/ONLINE-CAMP-FIRE');
});

Route::get('/Past-Troop-Leaders', function () {
    return view('Recent_Year_Reports/Past-Troop-Leaders');
});

Route::get('/King’s-and-Queen’s-Scouts', function () {
    return view('Recent_Year_Reports/King’s-and-Queen’s-Scouts');
});

Route::get('/President’s-Award-Winners', function () {
    return view('Recent_Year_Reports/President’s-Award-Winners');
});





