<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
            <div class=" container mt-lg-2 mb-3">
                <div class="row">
                    <div class="col-lg-8 card p-4 border-0" >
                        @if(session()->get('locale') == 'mm')
                            <h2 class="mt-3" id="title">{{ $data->title }}</h3>
                            <p style='font-family: Arial;font-size : 15px' class="mt-3 text-danger">{{ date('F d , Y' , strtotime($data->created_at)) }}</span>
                               
                            <div class="d-flex justify-content-center">
                                <img  id="detail_image" class="img-fluid d-none d-lg-block" src="{{ asset('uploads/reports/image/'.$data->image) }}">
                                <img id="image" class="img-fluid d-xl-none d-lg-none" src="{{ asset('uploads/reports/image/'.$data->image) }}">
                            </div>

                            <div>
                                <p class="text-dark">{!! $data->description !!}</p>
                            </div>
                        @else
                             <h2 class="" id="title">{{ $data->title_en }}</h3>
                             <p style='font-family: Arial;font-size : 15px' class="mt-3 text-danger">{{ date('F d , Y' , strtotime($data->created_at)) }}</span>

                                <div class="d-flex justify-content-center">
                                    <img  id="detail_image" class="img-fluid d-none d-lg-block" src="{{ asset('uploads/reports/image/'.$data->image) }}">
                                    <img id="image" class="img-fluid d-xl-none d-lg-none" src="{{ asset('uploads/reports/image/'.$data->image) }}">
                                </div>

                                <div>
                                    <p class="text-dark">{!! $data->description_en !!}</p>
                                </div>
                        @endif

                        
                    </div>
                    <div class="col-lg-3">
                        <nav class="nav flex-column card">
                            <a class="nav-link bg-warning border-bottom p-3" aria-current="page" href="#">{{ __('welcome.Gallery') }} <i class="fa-solid fa-photo-film float-end"></i></a>
                            <a class="nav-link bg-warning border-bottom p-3" href="#">{{ __('menu.History') }} <i class="fa-solid fa-list float-end"></i></a>
                            <a class="nav-link bg-warning border-bottom p-3" href="#">{{ __('menu.About') }} <i class="fa-solid fa-list float-end"></i></a>
                            <a class="nav-link bg-warning border-bottom p-3" href="#">{{ __('welcome.News') }} <i class="fa-solid fa-newspaper float-end"></i></a>
                          </nav>
                    </div>
                </div>
            </div>

     @include('frontend.layout.footer')
    </div>

    <script>
        
    </script>
    
</x-frontend-layout>
