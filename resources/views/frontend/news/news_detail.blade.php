<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
            <div class=" container mt-lg-2">
                <div class="row">
                    <div class="col-lg-8 card p-4 border-top-0 border-start-0 border-right-5" >
                        @if(session()->get('locale') == 'mm')
                            <h2 class="mt-3" id="title">{{ $data->title }}</h3>
                            <p style='font-family: Arial;font-size : 15px' class="mt-3 text-danger">{{ date('F d , Y' , strtotime($data->created_at)) }}</span>
                               
                            <div class="d-flex justify-content-center">
                                <img  id="detail_image" class="img-fluid d-none d-lg-block" src="{{ asset('uploads/news/breaking/'.$data->image) }}">
                                <img id="image" class="img-fluid d-xl-none d-lg-none" src="{{ asset('uploads/news/breaking/'.$data->image) }}">
                            </div>

                            <div>
                                <p class="text-dark">{!! $data->body !!}</p>
                            </div>
                        @else
                             <h2 class="" id="title">{{ $data->title_en }}</h3>
                             <p style='font-family: Arial;font-size : 15px' class="mt-3 text-danger">{{ date('F d , Y' , strtotime($data->created_at)) }}</span>

                                <div class="d-flex justify-content-center">
                                    <img  id="detail_image" class="img-fluid d-none d-lg-block" src="{{ asset('uploads/news/breaking/'.$data->image) }}">
                                    <img id="image" class="img-fluid d-xl-none d-lg-none" src="{{ asset('uploads/news/breaking/'.$data->image) }}">
                                </div>

                                <div>
                                    <p class="text-dark">{!! $data->body_en !!}</p>
                                </div>
                        @endif

                        <div class="card-footer">
                            <h5 class="text-center mt-3 text-danger">Related News</h5>
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <img id="image" class="img-fluid img-thumbnail" src="{{ asset('uploads/news/breaking/'.$data->image) }}">
                                    @if(session()->get('locale') == 'mm')
                                    <a href="#" class="font-weight-bold"><p class="pt-2 pl-2 text-primary ">{{ $data->title }}</p></a>
                                    <span class="pt-2 pl-2 text-muted ">{!! mb_substr(trim($data->body) , 0 , 200) !!} ...</span>
                                    @else
                                    <a href="#" class="font-weight-bold"><p class="pt-2 pl-2 text-primary ">{{ $data->title_en }}</p></a>
                                    <span class="pt-2 pl-2 text-muted ">{!! mb_substr(trim($data->body_en) , 0 , 200) !!} ...</span>
                                    @endif

                                </div>
                                
                            </div>
                        </div>
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
