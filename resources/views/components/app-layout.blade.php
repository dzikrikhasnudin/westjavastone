<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'West Java Stone' }}</title>

    <meta name="title" content="{{ $title ?? 'West Java Stone' }}">
    <meta name="description"
        content="{{ $description ??  'West Java Stone is an exporter of premium petrified wood from Garut, Indonesia—The City of Diamonds.'}}">
    <meta name="keywords"
        content="petrified wood, fossilized wood, stone furniture, Indonesian stone exporter, West Java Stone, Garut, City of Diamonds">

    <link rel="canonical" href="https://www.westjavastone.com/" />

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.westjavastone.com/">
    <meta property="og:title" content="{{ $title ?? ' West Java Stone' }}">
    <meta property="og:description"
        content="{{ $description ?? 'West Java Stone is an exporter of premium petrified wood from Garut, Indonesia—The City of Diamonds.' }}">
    @isset($metaimage)
    <meta property="og:image" content="{{ $metaimage }}">
    @endisset





    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
   
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    
    
    <link rel="stylesheet" href="https://westjavastone.com/build/assets/app-UWPHssLd.css" data-navigate-track="reload">
    <script type="module" src="https://westjavastone.com/build/assets/app-BLjnXR7l.js" data-navigate-track="reload"></script>
    

    @stack('style')

    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-white dark:bg-gray-900">
    @include('partials.top-navigation')

    {{ $slot }}


    @include('partials.bottom-navigation')
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @stack('script')

</body>

</html>