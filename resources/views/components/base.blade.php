<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Global Trotting - Nathaniel Copel and Campell Travels')</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="/js/base.js" defer></script>

</head>

<body class="bg-gray-50">

    <!-- Navigation -->
    @include('components.nav')


    @yield('content')


    @include('components.footer')




    <!---- Go to Booking Section--->
    <script>
        document.getElementById('bookNowBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('book-now-section').scrollIntoView({
                behavior: 'smooth',
            });
        });
    </script>

</body>

</html>
