<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
        <div class="outline_bar container mt-lg-2 mb-3">
            <ul class=" nav nav-pills nav-justified rounded-0 mb-3 mt-2" id="pills-tab" role="tablist">
                <li class="nav-item " role="presentation">
                  <button data-bs-toggle="offcanvas" data-bs-target="#firsttime" class="nav-link active p-3 rounded-0 d-inline-block" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('all.firsttime') }} <i class="d-none d-lg-block fa-solid fa-caret-down float-end"></i> </button>
                </li>
                <li class="nav-item " role="presentation">
                  <button data-bs-toggle="offcanvas" data-bs-target="#secondtime" class="nav-link p-3 rounded-0 d-inline-block" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('all.secondtime') }} <i class="d-none d-lg-block fa-solid fa-caret-down float-end"></i></button>
                </li>
                <li class="nav-item " role="presentation">
                  <button data-bs-toggle="offcanvas" data-bs-target="#thirdtime" class="nav-link p-3 rounded-0 d-inline-block" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{ __('all.thirdtime') }} <i class="d-none d-lg-block fa-solid fa-caret-down float-end"></i></button>
                </li>
              </ul>
              


                <div style="position : absolute ; top : 0rem ;  ;overflow:hidden" class="h-50 offcanvas offcanvas-top" tabindex="-1" id="firsttime" aria-labelledby="offcanvasTopLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasTopLabel"></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="position : absolute ; top : 0rem ;  ;overflow:hidden" class="h-50 offcanvas offcanvas-top" tabindex="-1" id="secondtime" aria-labelledby="offcanvasTopLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasTopLabel"></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="position : absolute ; top : 0rem ;  ;overflow:hidden" class="h-50 offcanvas offcanvas-top" tabindex="-1" id="thirdtime" aria-labelledby="offcanvasTopLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasTopLabel"></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 mt-2">
                                    <div class="accordion" id="accordionExample">
                                        
                                        <div class="accordion-item">
                                          <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ပထမပုံမှန်အစည်းအဝေး
                                            </button>
                                          </h2>
                                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <nav class="nav flex-column card">
                                                    <a class="nav-link bg-warning border-bottom" aria-current="page" href="#">အစည်းအဝေးအစီအစဉ်များ <i class="fa-solid fa-photo-film float-end"></i></a>
                                                    <a class="nav-link bg-warning border-bottom" href="#">အစည်းအဝေးမှတ်တမ်းများ<i class="fa-solid fa-list float-end"></i></a>
                                                  </nav>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-lg-8" >
                    @if(session()->get('locale') == 'mm')

                            <div class="card p-0">
                                <div class="row">
                                    <div class="col-4" id="background">
                                        <h5 class="text-center mt-3">{{ date('d') }}</h5>
                                        <p class="text-center">{{ date('F') }}</p>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body border-0">
                                            <h5 class="font-weight-bold">၁၂ ရက်မြောက်နေ့ အစီအစဉ်</h5>
                                        </div>
                                        <div class="card-footer no-gutters ">
                                            {{ date('Y-m-d') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card p-0 mt-2">
                                <div class="row">
                                    <div class="col-4" id="background">
                                        <h5 class="text-center mt-3">{{ date('d') }}</h5>
                                        <p class="text-center">{{ date('F') }}</p>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body">
                                            <h5 class="font-weight-bold">စတုတ္ထနေ့ အစီအစဉ်</h5>
                                        </div>
                                        <div class="card-footer no-gutters">
                                            {{ date('Y-m-d') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @else
                        

                       
                    @endif

                    
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

    <script>
        
    </script>
    
</x-frontend-layout>
