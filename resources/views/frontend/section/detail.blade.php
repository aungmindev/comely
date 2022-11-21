<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
        <div class="outline_bar container mt-lg-2 mb-3">
            <div class="col-lg-9 p-3 card border-0 shadow-sm">
                @if(session()->get('locale') == 'mm')
                    <h4 class="tile_design">{{ $data->title }}</h4>
                    <p style='font-family: Arial;font-size : 15px' class="mt-2 text-danger">{{ date('F d , Y' , strtotime($data->date)) }}</span>

                    <div class="mt-3">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a >{{ $data->parliament_time->name . __('all.siteName')}}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ $data->session_type->name }}</li>
                            <li class="breadcrumb-item" aria-current="page">{{ $data->session_times->name }}</li>
                            </ol>
                        </nav>    
                    </div>  

                    <div class="mt-2">
                        <a download="" href="{{ asset('/uploads/session/pdf/'.$data->pdf) }}"><button class="btn btn-danger btn-sm"><span class="" style="font-weight: bold">ဖိုင်ရယူရန်</span> <i class="fas fa-download"></i></button></a>
                    </div>

                    <div>
                        @if ($data->image)
                        
                            <div class="d-flex justify-content-center mt-3">
                                <img  id="detail_image" class="img-fluid d-none d-lg-block" src="{{ asset('uploads/session/image/'.$data->image) }}">
                                <img id="image" class="img-fluid d-xl-none d-lg-none" src="{{ asset('uploads/session/image/'.$data->image) }}">
                            </div>
                        @endif
                        @if ($data->summary)
                            <div class="mt-5">
                                {!! $data->summary !!}
                            </div>
                        @endif
                    </div>
                @else
                <h4 class="tile_design">{{ $data->title_en }}</h4>
                <p style='font-family: Arial;font-size : 15px' class="mt-2 text-danger">{{ date('F d , Y' , strtotime($data->date)) }}</span>

                <div class="mt-3">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a >{{ $data->parliament_time->name_en.' ' . __('all.siteName')}}</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{ $data->session_type->name }}</li>
                        <li class="breadcrumb-item" aria-current="page">{{ $data->session_times->name_en }}</li>
                        </ol>
                    </nav>    
                </div>  

                <div class="mt-2">
                    <a download="" href="{{ asset('/uploads/session/pdf/'.$data->pdf) }}"><button class="btn btn-danger btn-sm"><span class="" style="font-weight: bold">ဖိုင်ရယူရန်</span> <i class="fas fa-download"></i></button></a>
                </div>

                <div>
                    @if ($data->image)
                    
                        <div class="d-flex justify-content-center mt-3">
                            <img  id="detail_image" class="img-fluid d-none d-lg-block" src="{{ asset('uploads/session/image/'.$data->image) }}">
                            <img id="image" class="img-fluid d-xl-none d-lg-none" src="{{ asset('uploads/session/image/'.$data->image) }}">
                        </div>
                    @endif
                    @if ($data->summary)
                        <div class="mt-5">
                            {!! $data->summary_en !!}
                        </div>
                    @endif
                </div>
                @endif
                
                
                
            </div>
        </div>

 @include('frontend.layout.footer')
</div>

    <script>
        
    </script>
    
</x-frontend-layout>
