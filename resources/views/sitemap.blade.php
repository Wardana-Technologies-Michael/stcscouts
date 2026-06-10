@extends('layouts.master')

@section('content')
    <section class="page-header page-header-modern bg-color-grey page-header-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="font-weight-bold text-dark">Sitemap</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb d-block text-center">
                        <li><a href="/">Home</a></li>
                        <li class="active">Sitemap</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-4">
        <div class="row">
            <!-- Column 1: Core Navigation & Troop -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">MAIN PORTAL</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><a href="/"><i class="far fa-file"></i> Home Page</a></li>
                    <li><a href="/contact"><i class="far fa-file"></i> Contact Us</a></li>
                    <li><a href="/photo-gallery"><i class="far fa-file"></i> Photo Gallery</a></li>
                    <li><a href="/about-the-site"><i class="far fa-file"></i> About The Site</a></li>
                </ul>

                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">EVENTS & CAMPS</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><a href="/kindling-legacy"><i class="far fa-file"></i> Kindling Legacy 2026</a></li>
                </ul>

                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">THE TROOP</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><a href="/troop"><i class="far fa-file"></i> The Troop Overview</a></li>
                    <li><a href="/troop-profile"><i class="far fa-file"></i> Present Troop Profile</a></li>
                    <li><a href="/the-group-committee"><i class="far fa-file"></i> Sponsoring Authority & Committee</a></li>
                    <li><a href="/Past-Troop-Leaders"><i class="far fa-file"></i> Past Troop Leaders</a></li>
                    <li><a href="/King’s-and-Queen’s-Scouts"><i class="far fa-file"></i> King's & Queen's Scouts</a></li>
                    <li><a href="/President’s-Award-Winners"><i class="far fa-file"></i> President's Award Winners</a></li>
                    <li><a href="/the-scout-dunk"><i class="far fa-file"></i> Request the Scout Dunk</a></li>
                </ul>
            </div>

            <!-- Column 2: History & Cub Pack -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">HERITAGE & HISTORY</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><a href="/history-of-scouting-at-college"><i class="far fa-file"></i> The Beginnings: 1912-1948</a></li>
                    <li><a href="/history-of-scouting-at-college-2"><i class="far fa-file"></i> Post-war Scouting: 1948-1968</a></li>
                    <li><a href="/history-of-scouting-at-college-3"><i class="far fa-file"></i> Recent Times: 1968-Present</a></li>
                    <li><a href="/mr-w-i-muttiah"><i class="far fa-file"></i> Men of Honour: Mr. W.I. Muttiah</a></li>
                    <li><a href="/mr-rex-jayasinha"><i class="far fa-file"></i> Men of Honour: Mr. Rex Jayasingha</a></li>
                </ul>

                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">THE CUB PACK</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><a href="/history-of-the-16th-colombo-cub-pack"><i class="far fa-file"></i> History of Cub Pack</a></li>
                    <li><a href="/cub-pack-leaders"><i class="far fa-file"></i> Cub Pack Leaders</a></li>
                </ul>

                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">RESOURCES</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><a href="/badgework-new-syllabus"><i class="far fa-file"></i> Badgework - New Syllabus</a></li>
                    <li><a href="/badgework-old-syllabus"><i class="far fa-file"></i> Badgework - Old Syllabus</a></li>
                </ul>
            </div>

            <!-- Column 3: Year Reports 1995-2009 -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">YEAR REPORTS (1995-2009)</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><strong>1995</strong>
                        <ul>
                            <li><a href="/2nd-asia-pacific-6th-new-zealand-venture-scout-camp-1995">Venture Scout Camp '95</a></li>
                            <li><a href="/year-report-1995">Year Report 1995</a></li>
                        </ul>
                    </li>
                    <li><strong>1996</strong>
                        <ul>
                            <li><a href="/17th-Asia-Pacific-Scout-Jamboree-1996">17th AP Scout Jamboree</a></li>
                            <li><a href="/Tidal-Wave-1996">Tidal Wave 1996</a></li>
                            <li><a href="/year-report-1996">Year Report 1996</a></li>
                        </ul>
                    </li>
                    <li><strong>1997</strong>
                        <ul>
                            <li><a href="/18th-Asia-Pacific-Scout-Jamboree-1997">18th AP Scout Jamboree</a></li>
                            <li><a href="/Coastal-Winds–1997">Coastal Winds 1997</a></li>
                            <li><a href="/year-report-1997">Year Report 1997</a></li>
                        </ul>
                    </li>
                    <li><strong>1998</strong>
                        <ul>
                            <li><a href="/Sand-Storm–1998">Sand Storm 1998</a></li>
                            <li><a href="/year-report-1998">Year Report 1998</a></li>
                        </ul>
                    </li>
                    <li><strong>1999</strong>
                        <ul>
                            <li><a href="/Sweden-National-Jamboree-’99">Sweden Jamboree '99</a></li>
                            <li><a href="/De-Ja-‘Vu–1999">De Ja 'Vu 1999</a></li>
                            <li><a href="/Thai-National-Jamboree-’99">Thai Jamboree '99</a></li>
                            <li><a href="/year-report-1999">Year Report 1999</a></li>
                        </ul>
                    </li>
                    <li><strong>2000-2004</strong>
                        <ul>
                            <li><a href="/Cyclone-2000">Cyclone 2000</a></li>
                            <li><a href="/year-report-2000">Year Report 2000</a></li>
                            <li><a href="/year-report-2001">Year Report 2001</a></li>
                            <li><a href="/Tribe-Out-2002">Tribe Out 2002</a></li>
                            <li><a href="/year-report-2002">Year Report 2002</a></li>
                            <li><a href="/year-report-2003">Year Report 2003</a></li>
                            <li><a href="/tribal-craft-2004">Tribal Craft 2004</a></li>
                            <li><a href="/year-report-2004">Year Report 2004</a></li>
                        </ul>
                    </li>
                    <li><strong>2005-2009 Reports</strong>
                        <ul>
                            <li><a href="/year-report-2005">Year Report 2005</a></li>
                            <li><a href="/year-report-2006">Year Report 2006</a></li>
                            <li><a href="/year-report-2007">Year Report 2007</a></li>
                            <li><a href="/year-report-2008">Year Report 2008</a></li>
                            <li><a href="/year-report-2009">Year Report 2009</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Year Reports 2010-Present -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3 class="font-weight-bold text-4 mb-3 text-color-primary">YEAR REPORTS (2010-PRESENT)</h3>
                <ul class="list list-icons list-icons-sm mb-4">
                    <li><strong>2010-2014</strong>
                        <ul>
                            <li><a href="/year-report-2010">Year Report 2010</a></li>
                            <li><a href="/year-report-2011">Year Report 2011</a></li>
                            <li><a href="/Centennial-Flames-2012">Centennial Flames 2012</a></li>
                            <li><a href="/International-Achievement">International Achievement 2012</a></li>
                            <li><a href="/year-report-2012">Year Report 2012</a></li>
                            <li><a href="/year-report-2013">Year Report 2013</a></li>
                            <li><a href="/year-report-2014">Year Report 2014</a></li>
                        </ul>
                    </li>
                    <li><strong>2015-2019</strong>
                        <ul>
                            <li><a href="/year-report-2015">Year Report 2015</a></li>
                            <li><a href="/year-report-2016">Year Report 2016</a></li>
                            <li><a href="/year-report-2017">Year Report 2017</a></li>
                            <li><a href="/year-report-2018">Year Report 2018</a></li>
                            <li><a href="/Escapade-2019">Escapade 2019</a></li>
                            <li><a href="/year-report-2019">Year Report 2019</a></li>
                        </ul>
                    </li>
                    <li><strong>2020 Reports</strong>
                        <ul>
                            <li><a href="/ESCAPADE=At-Home-“Kids”">ESCAPADE At Home “Kids”</a></li>
                            <li><a href="/ONLINE-CAMP-FIRE">ONLINE CAMP FIRE</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection