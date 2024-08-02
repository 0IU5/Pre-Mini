<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        
        <style>
            .custom-bg {
                background-image: url('../img/login.png');
                background-size: cover; 
                background-position: center; 
                object-fit: cover;
            }

            /* Autofill background color fix */
            input:-webkit-autofill {
                -webkit-box-shadow: 0 0 0 1000px #1a202c inset; /* Change #1a202c to your desired background color */
                -webkit-text-fill-color: #ffffff; /* Change #ffffff to your desired text color */
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased custom-bg">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-opacity-50">
            <div>
                <a href="/">
                    <x-application-logo class=" fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-lg mt-6 px-4 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
