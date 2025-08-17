<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="FsUR4zhtkYQI9B3gGtqZnxuhFLhJ49nFWEglq2DoMq8" />
    <title>@yield('title', 'Global Trotting - Nathaniel Copel and Campell Travels')</title>

    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link rel="icon" type="image/png" href="{{ asset('images/global-throthlelogo.jpeg') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="/js/base.js" defer></script>

</head>

<body class="bg-gray-50">

    <!-- Navigation -->
    @include('components.nav')


    @yield('content')


    @include('components.footer')



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
            document.getElementById("targetSection").scrollIntoView({ behavior: "smooth" });
        });
    </script>

</body>

</html>
