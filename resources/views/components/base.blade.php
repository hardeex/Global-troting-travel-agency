<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="FsUR4zhtkYQI9B3gGtqZnxuhFLhJ49nFWEglq2DoMq8" />
    <meta name="google-site-verification" content="rSBLaKuyJYlzkYhTRAtkovhIuggQiRwM7KRGSD096BU" />
    <meta name="msvalidate.01" content="B2BC30B3F709B7093851C0D27E5BFA0A" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield('title', 'GlobeTrottle')</title>
    @hasSection('meta_description')
        <meta name="description" content="{{ trim(str_replace(["\r", "\n"], ' ', strip_tags($__env->yieldContent('meta_description')))) }}">
    @endif
    @hasSection('canonical')
        <link rel="canonical" href="@yield('canonical')">
    @endif
    <meta property="og:title" content="@yield('title', 'GlobeTrottle')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    @hasSection('meta_description')
        <meta property="og:description" content="{{ trim(str_replace(["\r", "\n"], ' ', strip_tags($__env->yieldContent('meta_description')))) }}">
    @endif
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    @yield('structured_data')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script src="/js/base.js" defer></script>
    <link rel="stylesheet" href="/css/logo.css">

    @if(config('services.google_analytics.id'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ config('services.google_analytics.id') }}');
        </script>
    @endif

    @if(config('services.meta.pixel_id'))
        {{-- Meta Pixels --}}
        <!-- Meta Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{ config('services.meta.pixel_id') }}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id={{ config('services.meta.pixel_id') }}&ev=PageView&noscript=1" /></noscript>
    @endif
    <!-- End Meta Pixel Code -->

</head>

<body class="bg-gray-50">

    <!-- Navigation -->
    @if (!request()->routeIs('login', 'register', 'password.*'))
        @include('components.nav')
    @endif

    @yield('content')

    @if (!request()->routeIs('login', 'register', 'password.*'))
        @include('components.new-footer')
    @endif



    @include('components.scroll-to-top')
    <!---- Go to Booking Section--->
    <script>
        document.getElementById('bookNowBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('book-now-section').scrollIntoView({
                behavior: 'smooth',
            });
        });

        document.getElementById("exploreBtn").addEventListener("click", function() {
            document.getElementById("targetSection").scrollIntoView({
                behavior: "smooth"
            });
        });
    </script>


    <!--- Scrolling animation effects-->
    <!-- Loader Overlay -->
    <div id="loaderOverlay"
        class="fixed inset-0 bg-black bg-opacity-700 flex items-center justify-center text-white text-xl font-semibold z-50 hidden">
        Loading...
    </div>

    <script>
        // Select all anchor links in the nav that link to internal sections
        const navLinks = document.querySelectorAll('nav a[href^="#"]');

        const loader = document.getElementById('loaderOverlay');

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // prevent default immediate scroll

                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);

                if (!targetSection) return; // If no target found, exit

                // Show loader
                loader.classList.remove('hidden');

                // Wait 2 seconds, then scroll and hide loader
                setTimeout(() => {
                    loader.classList.add('hidden');

                    // Smooth scroll to the target section
                    targetSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                }, 1000);
            });
        });



        // Select the mobile menu container and all links inside it
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');

        // Loop through each link and add click listener
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                // Hide the mobile menu on click
                mobileMenu.classList.add('hidden');
            });
        });
    </script>


</body>

</html>
