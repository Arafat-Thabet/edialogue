<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title:'' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/af-2.3.7/datatables.min.css"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">
    <link href="{{asset('css/tailwind.css')}}" rel="stylesheet">

     <link rel="stylesheet" href="{{ asset('css/calendar/humanity.calendars.picker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @if(app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@700&display=swap" rel="stylesheet">
    <!--===============================================================================================-->
    
    @endif
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/af-2.3.7/datatables.min.css"/>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
    <!-- Scripts -->
</head>

<body class="font-sans antialiased" <?= app()->getLocale() == 'ar' ? 'style="direction: rtl;"' : '' ?>>
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

    
  
        <!-- Page Content -->
        <main>

        <script type="text/javascript" src="{{ asset('js/jquery3.6.0.js') }}"></script>

            {{ $slot }}
        </main>
      
    </div>
    <div class="text-center site-footer py-2">
        
            جميع الحقوق محفوظة ركن الحوار@<?=date('Y')?></div>
    @include('layouts/modal')
    
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap5.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/calendar/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('js/calendar/jquery.calendars.all.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.11.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/af-2.3.7/datatables.min.js"></script> 
</body>

</html>