<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{asset('images/logo.png')}}" rel="shortcut icon" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        
       

        {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow-sm" >
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            
           
            {{-- @include('frontend.layout.nav_mobile') --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
                
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="{{ asset('js/tiny.js') }}" referrerpolicy="origin"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/datatable.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
        
        <script>
            tinymce.init({
              selector: 'textarea#editor',
              skin: 'bootstrap',
              plugins: 'lists, link, image, media',
              toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
              menubar: false,
              });
          </script>

          @yield('script')
    </body>
</html>
