<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    @if (App::getLocale() == 'ar')
    {{-- FONTS OF SITE --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- STYLEING OF SITE --}}
    <link rel="stylesheet" href="{{ asset("assets/style/ar/main.css") }}">
    @else
    {{-- FONTS OF SITE --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    {{-- STYLEING OF SITE --}}
    <link rel="stylesheet" href="{{ asset("assets/style/en/main.css") }}">
    @endif

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>Laravel</title>
</head>
<body>
    @include('layouts._header')
    
    <div class="l-container">
        {{ $slot }}

        <x-flash-message />
    </div>
    

    @include('layouts._footer')

    <script src="{{ asset('assets/js/index.js') }}"></script>
</body>
</html>