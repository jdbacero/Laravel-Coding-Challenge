<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

        <title>Code Challenge - Calendar</title>

    </head>
    <body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
            
        <!--Nav-->
        <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

            <div class="flex flex-wrap items-center">
                {{-- Icon --}}
                <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                    <a href="#">
                        <span class="text-xl pl-2"><i class="fa fa-calendar"></i></span>
                    </a>
                </div>
            </div>

        </nav>


        <div class="flex flex-col md:flex-row">

            {{-- Side nave --}}
            <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            </div>

            <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

                <div class="bg-gray-800 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                        <h3 class="font-bold pl-2 text-center">Calendar - Code Challenge</h3>
                    </div>

                    {{-- Main Content --}}
                    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
