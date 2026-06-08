<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <link rel="canonical" href="{{ request()->url() }}">

    @php
        $siteTitle = "Official Web Portal of the 16th Colombo Scout Group of S. Thomas' College, Mount Lavinia";
        $siteURL = 'https://www.stcscouts.com';
        $siteDescription = "The 16th Colombo Scout Group is one of the leading Scout Groups in Sri
    Lanka. At S. Thomas’ College, Mount Lavinia our objective is to act as a 'Model Scout Group' dedicated to
          the development of young people's physical, mental, and spiritual potential. Staying true to the Spirit
           of Scouting, the Group takes pride in combining knowledge with fun to create an all round experience for
           Scouts of all ages.";
    @endphp

    <title>@yield('title', $siteTitle)</title>

    <meta name="keywords"
        content="Scout Movement, youth development, outdoor activities, leadership training,
		community service, physical development, mental development, spiritual growth, Scouting, adventure
		activities, team building, 16th Colombo, S. Thomas' College, Mount Lavinia, stcscouts">
    <meta name="description" content="@yield('meta_description', $siteDescription)">
    <meta name="author" content="S. Thomas' College, Mount Lavinia">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="@yield('title', $siteTitle)">
    <meta property="og:description" content="@yield('meta_description', $siteDescription)">
    <meta property="og:image" content="{{ asset('images/stcscouts_logo.jpg') }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $siteTitle)">
    <meta name="twitter:description" content="@yield('meta_description', $siteDescription)">
    <meta name="twitter:image" content="{{asset('images/stcscouts_logo.jpg')}}">


    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#000a1e",
              "on-primary": "#ffffff",
              "primary-container": "#002147",
              "on-primary-container": "#708ab5",
              "inverse-primary": "#aec7f6",
              "secondary": "#50606f",
              "on-secondary": "#ffffff",
              "secondary-container": "#d1e1f4",
              "on-secondary-container": "#556474",
              "tertiary": "#5c2d91",
              "on-tertiary": "#ffffff",
              "tertiary-container": "#f0eaf7",
              "on-tertiary-container": "#5c2d91",
              "error": "#ba1a1a",
              "on-error": "#ffffff",
              "error-container": "#ffdad6",
              "on-error-container": "#93000a",
              "primary-fixed": "#d6e3ff",
              "primary-fixed-dim": "#aec7f6",
              "on-primary-fixed": "#001b3d",
              "on-primary-fixed-variant": "#2d476f",
              "secondary-fixed": "#d4e4f6",
              "secondary-fixed-dim": "#b8c8da",
              "on-secondary-fixed": "#0d1d2a",
              "on-secondary-fixed-variant": "#394857",
              "tertiary-fixed": "#ebdbfa",
              "tertiary-fixed-dim": "#c084fc",
              "on-tertiary-fixed": "#3b0764",
              "on-tertiary-fixed-variant": "#6b21a8",
              "background": "#fcf9f8",
              "on-background": "#1c1b1b",
              "surface": "#fcf9f8",
              "surface-dim": "#dcd9d9",
              "surface-bright": "#fcf9f8",
              "surface-container-lowest": "#ffffff",
              "surface-container-low": "#f6f3f2",
              "surface-container": "#f0edec",
              "surface-container-high": "#ebe7e7",
              "surface-container-highest": "#e5e2e1",
              "on-surface": "#1c1b1b",
              "on-surface-variant": "#44474e",
              "inverse-surface": "#313030",
              "inverse-on-surface": "#f3f0ef",
              "outline": "#74777f",
              "outline-variant": "#c4c6cf",
              "surface-tint": "#465f88"
            },
            borderRadius: {
              "sm": "0.125rem",
              "DEFAULT": "0.25rem",
              "md": "0.375rem",
              "lg": "0.5rem",
              "xl": "0.75rem",
              "full": "9999px"
            },
            spacing: {
              "unit": "4px",
              "container-max": "1200px",
              "gutter": "24px",
              "margin-mobile": "16px",
              "margin-desktop": "48px",
              "stack-sm": "8px",
              "stack-md": "16px",
              "stack-lg": "32px"
            },
            fontFamily: {
              sans: ["Plus Jakarta Sans", "sans-serif"],
              display: ["Plus Jakarta Sans", "sans-serif"],
              "headline-lg": ["Plus Jakarta Sans", "sans-serif"],
              "headline-lg-mobile": ["Plus Jakarta Sans", "sans-serif"],
              "headline-md": ["Plus Jakarta Sans", "sans-serif"],
              "title-lg": ["Plus Jakarta Sans", "sans-serif"],
              "body-lg": ["Plus Jakarta Sans", "sans-serif"],
              "body-md": ["Plus Jakarta Sans", "sans-serif"],
              "label-lg": ["Plus Jakarta Sans", "sans-serif"],
              "label-sm": ["Plus Jakarta Sans", "sans-serif"]
            },
            fontSize: {
              "display": ["48px", { lineHeight: "56px", letterSpacing: "-0.02em", fontWeight: "700" }],
              "headline-lg": ["32px", { lineHeight: "40px", letterSpacing: "-0.01em", fontWeight: "700" }],
              "headline-lg-mobile": ["24px", { lineHeight: "32px", fontWeight: "700" }],
              "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
              "title-lg": ["20px", { lineHeight: "28px", fontWeight: "600" }],
              "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
              "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
              "label-lg": ["14px", { lineHeight: "20px", letterSpacing: "0.05em", fontWeight: "600" }],
              "label-sm": ["12px", { lineHeight: "16px", fontWeight: "500" }]
            }
          }
        }
      }
    </script>


    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/theme-elements.css">
    <link rel="stylesheet" href="css/theme-blog.css">
    <link rel="stylesheet" href="css/theme-shop.css">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="css/skins/default.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.min.js"></script>

</head>

<body data-plugin-page-transition>

    <div class="body">
        @include('layouts.header')


        <div role="main" class="main">

            @yield('content')



        </div>
        @extends('layouts.footer')


    </div>

    <!-- Vendor -->
    <script src="vendor/plugins/js/plugins.min.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>

</body>

</html>
