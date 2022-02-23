<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>البوابه الموحده لركن الحوار</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css?2') }}">
        <!-- Fonts -->
   
        <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />

        <!-- Scripts -->
    </head>
    <body <?=app()->getLocale()=='ar' ? 'style="direction: rtl;"':''?>>
    <h4 class="text-center alert alert-danger">
        خطأ!
        مسموح الدخول فقط بالايميلات التاليه
        <ul>
            <li>@edialoguec.com</li>
            <li>@edialogue.org</li>
            <li>@newmuslimacademy.org</li>
            <li>@islamvolunteers.org</li>
            <li>@mopacademy.org</li>
        </ul>
    
    </h4>
    </body>
</html>

