<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
        <div class="outline_bar container mt-lg-2 mb-3">
          <h4 class="mt-4 mb-4 text-center border-bottom p-3">{{ __('all.siteName') }} {{ __('menu.Question') }}</h4>
          <qandp-view :qandp-type="{{ $isstar }}"></qandp-view>
          <ul class=" nav nav-pills nav-justified rounded-0 mb-3 mt-2" id="pills-tab" role="tablist">
            <li class="nav-item " role="presentation">
              <button data-bs-toggle="offcanvas" data-bs-target="#firsttime" class="nav-link  p-3 {{ $ptimes == 1 ? 'active' : '' }} rounded-0 d-inline-block" id="pills-home-tab"  type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('all.firsttime') }}<i class="d-none d-lg-block fa-solid fa-caret-down float-end"></i> </button>
            </li>
            <li class="nav-item " role="presentation">
              <button data-bs-toggle="offcanvas" data-bs-target="#secondtime" class="nav-link p-3 r{{ $ptimes == 2 ? 'active' : '' }}ounded-0 d-inline-block" id="pills-profile-tab"  type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('all.secondtime') }}<i class="d-none d-lg-block fa-solid fa-caret-down float-end"></i></button>
            </li>
            <li class="nav-item " role="presentation">
              <button data-bs-toggle="offcanvas" data-bs-target="#thirdtime" class="nav-link {{ $ptimes == 3 ? 'active' : '' }} p-3 rounded-0 d-inline-block" id="pills-contact-tab"  type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{ __('all.thirdtime') }} <i class="d-none d-lg-block fa-solid fa-caret-down float-end"></i></button>
            </li>
          </ul>

                
            <div class="row">
                <div class="col-lg-8" >
                            @foreach ($qandps as $qandp)
                     @if(session()->get('locale') == 'mm')

                            <div class="card p-0 mt-2">
                              <div class="d-flex">
                                {{-- <div class="col-3  rounded-start d-flex justify-content-center  align-items-center p-2" id="background">
                                  <div class="row card-body">
                                      <div class="col-md-12">
                                        <h5 class=" text-center">{{ date('d' , strtotime($qandp->date)) }}</h5>
                                      </div>
                                      <div class="col-md-12">
                                        <h6 class=" text-center">{{ date('F' , strtotime($qandp->date)) }}</h6>
                                      </div>
                                    </div>  
                              
                                 </div> --}}
                                  <div class="col-lg-12">
                                      <div class="card-body border-0">
                                          <a href="{{ route('qandp.frontend.detail' , ['id' => $qandp->id]) }}"><h6 class="font-weight-bold title_design">{{ $qandp->title }}</h6></a>
                                      </div>
                                      <div class="card-footer no-gutters ">
                                         {{ $qandp->qnadp_type }} @if ($qandp->isstar == 1)
                                         <span class="text-danger">*</span>
                                         @endif
                                          <span class="float-right text-muted pt-3 pt-lg-0">{{$qandp->session_times->name }}</span>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          @else
                          <div class="card p-0 mt-2">
                            <div class="d-flex">
                              {{-- <div class="col-3  rounded-start d-flex justify-content-center  align-items-center p-2" id="background">
                                <div class="row card-body">
                                    <div class="col-md-12">
                                      <h5 class=" text-center">{{ date('d' , strtotime($qandp->date)) }}</h5>
                                    </div>
                                    <div class="col-md-12">
                                      <h6 class=" text-center">{{ date('F' , strtotime($qandp->date)) }}</h6>
                                    </div>
                                  </div>  
                            
                               </div> --}}
                                <div class="col-lg-12">
                                    <div class="card-body border-0">
                                        <a href="{{ route('qandp.frontend.detail' , ['id' => $qandp->id]) }}"><h6 class="font-weight-bold title_design">{{ $qandp->title_en }}</h6></a>
                                    </div>
                                    <div class="card-footer no-gutters ">
                                       {{ $qandp->qnadp_type }} @if ($qandp->isstar == 1)
                                       <span class="text-danger">*</span>
                                       @endif
                                        <span class="float-right text-muted pt-3 pt-lg-0">{{$qandp->session_times->name_en }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                          @endif
                            @endforeach
                            
                            <div>
                                @if (count($qandps) <= 0)
                                  <p class="text-danger text-center">No Data Available</p>
                                @endif
                            </div>

                            <div class="mt-2 p-2">
                              {{ $qandps->links() }}

                          </div>
                            
                   

                    
                </div>
                {{-- <div class="col-lg-3">
                    <nav class="nav flex-column card">
                        <a class="nav-link bg-warning border-bottom p-3" aria-current="page" href="#">{{ __('welcome.Gallery') }} <i class="fa-solid fa-photo-film float-end"></i></a>
                        <a class="nav-link bg-warning border-bottom p-3" href="#">{{ __('menu.History') }} <i class="fa-solid fa-list float-end"></i></a>
                        <a class="nav-link bg-warning border-bottom p-3" href="#">{{ __('menu.About') }} <i class="fa-solid fa-list float-end"></i></a>
                        <a class="nav-link bg-warning border-bottom p-3" href="#">{{ __('welcome.News') }} <i class="fa-solid fa-newspaper float-end"></i></a>
                      </nav>
                </div> --}}
            </div>
        </div>

 @include('frontend.layout.footer')
</div>
  @section('script')
    <script>
          
    </script>
    @endsection
</x-frontend-layout>
