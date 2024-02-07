<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="CSPU, Reyting, Klaster, Universitet, Chirchiq, Uzbekistan. Universitet haqida eng so'nggi yangiliklar, ma'lumotlar va tadbirlar.">
    <meta name="keywords" content="CSPU, Reyting, Klaster, Universitet, Chirchiq, Uzbekistan">
    <meta name="author" content="Fayziyev Raxmatilla">
    <link rel="canonical" href="https://n-reyting.cspu.uz">
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
     <style>
        /**
         * Owl Carousel v2.3.4
         * Copyright 2013-2018 David Deutsch
         * Licensed under: SEE LICENSE IN https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE
         */
        .owl-carousel,.owl-carousel .owl-item{-webkit-tap-highlight-color:transparent;position:relative}.owl-carousel{display:none;width:100%;z-index:1}.owl-carousel .owl-stage{position:relative;-ms-touch-action:pan-Y;touch-action:manipulation;-moz-backface-visibility:hidden}.owl-carousel .owl-stage:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}.owl-carousel .owl-stage-outer{position:relative;overflow:hidden;-webkit-transform:translate3d(0,0,0)}.owl-carousel .owl-item,.owl-carousel .owl-wrapper{-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-ms-backface-visibility:hidden;-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0)}.owl-carousel .owl-item{min-height:1px;float:left;-webkit-backface-visibility:hidden;-webkit-touch-callout:none}.owl-carousel .owl-item img{display:block;width:100%}.owl-carousel .owl-dots.disabled,.owl-carousel .owl-nav.disabled{display:none}.no-js .owl-carousel,.owl-carousel.owl-loaded{display:block}.owl-carousel .owl-dot,.owl-carousel .owl-nav .owl-next,.owl-carousel .owl-nav .owl-prev{cursor:pointer;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel .owl-nav button.owl-next,.owl-carousel .owl-nav button.owl-prev,.owl-carousel button.owl-dot{background:0 0;color:inherit;border:none;padding:0!important;font:inherit}.owl-carousel.owl-loading{opacity:0;display:block}.owl-carousel.owl-hidden{opacity:0}.owl-carousel.owl-refresh .owl-item{visibility:hidden}.owl-carousel.owl-drag .owl-item{-ms-touch-action:pan-y;touch-action:pan-y;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel.owl-grab{cursor:move;cursor:grab}.owl-carousel.owl-rtl{direction:rtl}.owl-carousel.owl-rtl .owl-item{float:right}.owl-carousel .animated{animation-duration:1s;animation-fill-mode:both}.owl-carousel .owl-animated-in{z-index:0}.owl-carousel .owl-animated-out{z-index:1}.owl-carousel .fadeOut{animation-name:fadeOut}@keyframes fadeOut{0%{opacity:1}100%{opacity:0}}.owl-height{transition:height .5s ease-in-out}.owl-carousel .owl-item .owl-lazy{opacity:0;transition:opacity .4s ease}.owl-carousel .owl-item .owl-lazy:not([src]),.owl-carousel .owl-item .owl-lazy[src^=""]{max-height:0}.owl-carousel .owl-item img.owl-lazy{transform-style:preserve-3d}.owl-carousel .owl-video-wrapper{position:relative;height:100%;background:#000}.owl-carousel .owl-video-play-icon{position:absolute;height:80px;width:80px;left:50%;top:50%;margin-left:-40px;margin-top:-40px;background:url(owl.video.play.png) no-repeat;cursor:pointer;z-index:1;-webkit-backface-visibility:hidden;transition:transform .1s ease}.owl-carousel .owl-video-play-icon:hover{-ms-transform:scale(1.3,1.3);transform:scale(1.3,1.3)}.owl-carousel .owl-video-playing .owl-video-play-icon,.owl-carousel .owl-video-playing .owl-video-tn{display:none}.owl-carousel .owl-video-tn{opacity:0;height:100%;background-position:center center;background-repeat:no-repeat;background-size:contain;transition:opacity .4s ease}.owl-carousel .owl-video-frame{position:relative;z-index:1;height:100%;width:100%}
        
        /*================header===============*/
        .header-in {
          background-color: rgb(41 105 222);
          //background-image: url('');
          height: 60px;
        }
        .function {
          display: flex;
          flex-wrap: wrap;
        }
        .date-weather {
          margin-top: 10px;
        }
        .date-weather span {
          color: rgba(247, 247, 247, 1);
          font-size: 14px;
          margin-left: 30px;
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
        
        <header>
            <div class="header-in flex justify-center">
            <marquee behavior="" direction="" style="color: #fff; margin-top: 16px;">
            <div class="flex items-center">
                    <img src="https://www.clipartmax.com/png/full/162-1622253_clipart-warning-triangle-yellow-triangle-with-exclamation-point.png" class="mr-2 h-8">
                    <p class="font-medium text-md text-white">Saytda sozlash ishlari olib borilishi mumkin! (Betta-test: v1.2.5)</p>
                </div>
            </marquee>
             
            </div>
        </header>

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
