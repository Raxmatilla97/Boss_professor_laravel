<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css" rel="stylesheet" />
    @stack('styles')
    <style>
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }
        .modal {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 80%;
            max-height: 80%;
            overflow: auto;
        }
         /* CSS styling for card */
         .card {
            transition: transform 0.3s ease-in-out;
        }

        /* Hover effect */
        .card:hover {
            transform: scale(1.05);
        }

        .antialiased, .subpixel-antialiased {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
    </style>
</head>
<body class="font-sans bg-gray-200 bg-hero bg-no-repeat bg-cover bg-center bg-fixed" style="background-image: url({{ asset('assets/thumb__1_0_0_0_auto.jpg') }});">
<!-- Preloader Konteyneri -->
<div id="preloader" class="fixed inset-0 bg-white flex justify-center items-center" style="z-index: 1;">
    <!-- Spinner -->
    <div class="animate-spin rounded-full h-32 w-32 border-b-2 border-gray-900"></div>
</div>
    @include('reyting.frontend.nav')
    @yield('content')  
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  
    @stack('scripts')
</body>
<script>
    window.onload = function() {
        // Sahifa yuklanganda preloader'ni yashirish
        document.getElementById('preloader').style.display = 'none';
    };
</script>
</html>
