<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title:'البوابه الموحده لركن الحوار' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/af-2.3.7/datatables.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">
    <link href="{{asset('css/tailwind.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/calendar/humanity.calendars.picker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?3') }}">
    @if(app()->getLocale()=='en')
    <link rel="stylesheet" href="{{ asset('css/ltr.css') }}">
    @endif
    @if(app()->getLocale()=='ar')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
    <!-- Scripts -->
</head>

<body class="font-sans antialiased {{ app()->getLocale() == 'ar' ? 'dir-rtl' : 'dir-ltr'}}" >
    <x-jet-banner />

    <div class="bo-wrapper bo-fixed-sidebar">
        @livewire('navigation-menu')


        <div class="bo-content">
            <!-- Page Content -->
            <section class="content">
                <main>

                    <script type="text/javascript" src="{{ asset('js/jquery3.6.0.js') }}"></script>

                    {{ $slot }}

                </main>

            </section>
            <div class="text-center site-footer py-2">

                جميع الحقوق محفوظة ركن الحوار@<?= date('Y') ?></div>
        </div>
    </div>


    @include('layouts/modal')

    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap5.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/calendar/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('js/calendar/jquery.calendars.all.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.11.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
</body>

</html>