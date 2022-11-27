<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
        <div class="outline_bar container mt-lg-2 mb-3">
          <h4 class="mt-4 mb-4 text-center border-bottom p-3">{{ __('all.siteName') }} {{ __('welcome.Gallery') }}</h4>

          <div class="col-lg-9">
           <div class="row">
                @foreach ($galleries[1] as $photo)
                     <div class="col-lg-3 mt-lg-0 mt-2  ">
                        <div class="card shadow-md mt-2">
                            <img src="{{ asset('uploads/gallery/'.$photo->image_or_video) }}">
                            <div class="card-body">
                                <p>{!! $photo->description !!}</p>
                            </div>
                            <div class="card-footer">
                                <p>{{ $photo->created_at }}</p>
                            </div>
                        </div>
                     </div>
                @endforeach
           </div>
          </div>
        </div>

 @include('frontend.layout.footer')
</div>
  @section('script')
    <script>
          
    </script>
    @endsection
</x-frontend-layout>
