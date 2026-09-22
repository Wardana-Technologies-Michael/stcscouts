@extends('layouts.master')

@section('content')
    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-white font-weight-bold text-8">About the site</h1>
                    {{-- <span class="sub-title text-white">Check out our Latest News!</span> --}}
                </div>

            </div>
        </div>
    </section>

    <div class="container py-4">

        <div class="row">
            <div class="col">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post border-0 m-0 p-0">



                        <div class="post-content ms-0">

                            <h2 class="font-weight-semi-bold">History of the Site</h2>
                            <h4 class="font-weight-semi-bold">Launching of the first site:</h4>

                            <p class="text-dark text-justify text-4">The first ever website of the Troop was launched at the Scout & Craft Exhibition – Tribal
                                Craft 2004, held from the 13th – 14th of February 2004. The site was one of the first ever
                                Troop websites to be launched by a Scout Troop in the country:</p>

                                <div class="col-md-12 align-self-center p-static order-2 text-center">
                                    <img src="{{asset('images/Launching-the-first-site.jpg')}}"
                                    class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                            </div>
                            <p class="text-dark text-justify text-4">The website was then officially handed over to the “Webmasters” of the Troop, an office
                                created to look into the IT related data handling in the Troop. From there on, the site was
                                developed to suit the developments in the field of Web Development in Computing with time.
                            </p>
                            <h4 class="font-weight-semi-bold">Updating of the site layout:</h4>

                            <p class="text-dark text-justify text-4">The site layout was changed in 2012, and the platform was changed to HTML 4.0 with added new
                                features and a more attractive look. The following is a glimpse of the site that was
                                updated:</p>

                                <div class="col-md-12 align-self-center p-static order-2 text-center">
                                    <img src="{{asset('images/Website.jpg')}}"
                                    class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                            </div>

                            <h4 class="font-weight-semi-bold">Switching to HTML 5.0:

                            </h4>

                            <p class="text-dark text-justify text-4">With the advent of HTML 5.0, as the Troop has always been the pioneers of the field of IT in
                                the local Scouting arena, a major step was taken to change the whole site to fit into the
                                new technology immediately. The 16th Colombo Cub Pack contents have also been synced to the
                                present site. The present site, which you are currently navigating, was launched by the
                                Warden of College, Prof. Indra de Soysa at the Group Committee meeting held on the 16th of
                                January 2014:</p>

                                <div class="col-md-12 align-self-center p-static order-2 text-center">
                                    <img src="{{asset('images/Launching-the-present-site.jpg')}}"
                                    class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                            </div>

                            <h4 class="font-weight-semi-bold">The present site:</h4>

                            <p class="text-dark text-justify text-4">In 2024, the website was rebuilt from the ground up on a modern platform — the Laravel
                                framework with a Tailwind CSS front-end and a Vite build pipeline — replacing the earlier
                                templated site. The Year Reports archive is now database-driven, so the complete timeline of
                                annual reports, jamborees, camps and milestones can be maintained through a
                                password-protected administration panel rather than by editing pages by hand. The site
                                continues to include a comprehensive History of the Scout Group, a complete series of
                                Badgework contents, details of all the events of the Group, a complete gallery of images and
                                videos of the Scout Group and many more. It is unarguably one of the most comprehensive Scout
                                Group websites in the country.</p>

                            <h2 class="font-weight-semi-bold">Site Administration</h2>

                            <p class="text-dark text-justify text-4">The site is updated and maintained by the Troop Scout Web Team. The present Webmaster is
                                Michael Gunawardana.</p>

                            <h2 class="font-weight-semi-bold">Site Credits & Copyrights:</h2>


                            <p class="text-dark text-justify text-4">This website is completely an educational and organizational website and contains no content
                                that is inappropriate for any audience.</p>

                            <p class="text-dark text-justify text-4">Please note that all extracts (If used) of official web content have only been copied solely
                                for educative purposes only. All such images are subject to the explicit copyright of their
                                respective owners. Extracts from College Magazines have been used for all records of history
                                and the Group extends thanks to the College Administration for granting permission to use
                                the College Archives for this cause.</p>

                            <p class="text-dark text-justify text-4">The images in the Gallery at <a href="{{url('photo-gallery')}}">Photo Gallery</a>, and all other photos of events
                                are subject to explicit copyrights and are owned by the Group. You may not use them for any
                                purpose other than for any requirement relating to Scouting activity.</p>

                                    <p class="text-dark text-center text-4">-© 2014 – THOMIAN SCOUT IT CREW-</p>
                                    <p class="text-dark text-center text-4">16TH COLOMBO SCOUT GROUP,
                                        S. THOMAS’ COLLEGE,
                                        MOUNT LAVINIA.</p>

                                    <p class="text-dark text-center text-4">-© THOMIAN SCOUT GRAPHICS INC.-</p>
                                    <p class="text-dark text-center text-4">~THE TRIBE OF THE EVENING STAR~ </p>



                        </div>
                    </article>

                </div>
            </div>
        </div>

    </div>
@endsection
