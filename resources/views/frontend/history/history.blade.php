<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
         <div>
            <div class=" container shadow-sm pt-3 mt-5" style="height: 100vh">
                <h3 class="text-center" id="title">{{ __('menu.History') }}</h1>
            </div>
         </div>

     @include('frontend.layout.footer')
    </div>

    <script>
        
    </script>
    
</x-frontend-layout>
