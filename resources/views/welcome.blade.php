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

            {{-- Side nav --}}
            <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-80">
                <div class="md:mt-12 md:w-80 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                    <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                        <li class="mr-3 flex-1">
                            <label for="event_name" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-tasks pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">Event</span>
                            </label>
                            <input id="event_name" name="event_name"
                                class="w-full bg-gray-70 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </li>
                        <li class="mr-3 flex-1">
                            <label for="calendar_from" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-calendar-alt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">From</span>
                            </label>
                            <input type="date" id="calendar_from"
                                name="calendar_from"
                                class="w-full bg-gray-70 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </li>
                        <li class="mr-3 flex-1">
                            <label for="calendar_to" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500">
                                <i class="fas fa-calendar-alt pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-600 md:text-gray-400 block md:inline-block">To</span>
                            </label>
                            <input type="date" id="calendar_to"
                                name="calendar_to"
                                class="w-full bg-gray-70 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </li>
                        <li class="mr-3 w-full">
                            <br>
                            <div class="flex">
                                <label class="inline-flex items-center mt-3 flex-1">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-white">Sunday</span>
                                </label>
                                <label class="inline-flex items-center mt-3 flex-1">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-white">Monday</span>
                                </label>
                            </div>
                            <div class="flex">
                                <label class="inline-flex items-center mt-3 flex-1">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-white">Tuesday</span>
                                </label>
                                <label class="inline-flex items-center mt-3 flex-1">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-white">Wednesday</span>
                                </label>
                            </div>
                            <div class="flex">
                                <label class="inline-flex items-center mt-3 flex-1">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-white">Thursday</span>
                                </label>
                                <label class="inline-flex items-center mt-3 flex-1">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-white">Friday</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center mt-3">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-orange-600" checked><span class="ml-2 text-white">Saturday</span>
                                </label>
                            </div>
                        </li>
                        
                        <div class="p-2 w-full text-center">
                            <div class="relative">
                                <button type="button" id="add_event"
                                    class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-700 rounded-full shadow ripple hover:shadow-lg hover:bg-blue-100 focus:outline-none disabled:opacity-50">
                                    Save
                                </button>
                            </div>
                            <div id="mycalendar">

                            </div>
                        </div>
                    </ul>
                </div>
            </div>

            <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

                <div class="bg-gray-800 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
                        <h3 class="font-bold pl-2 text-center">Calendar - Code Challenge</h3>
                    </div>
                </div>
                {{-- Main Content --}}
                <div class="flex flex-wrap">
                    {{-- Month and Year --}}
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-green-600"><i class="fa fa-calendar-check fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    {{-- <h5 class="font-bold uppercase text-gray-600">MMMM, YY: </h5> --}}
                                    <h3 class="font-bold text-3xl text-green-500">
                                        <input type="month" id="start" name="start">
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
