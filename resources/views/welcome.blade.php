<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
          {{-- <div class="bg-white p-5 w-100" style="position: absolute;top:20rem;height:9rem">

          </div> --}}
          


            <div class="bg-white shadow-sm" >
              <div id="calendar" class="container pb-3 ">
                     
                     <div class="row">
                          <div class=" col-lg-5 mt-lg-5 mt-3">
                            <h4 class="text-start pt-lg-5 pt-3"  id="homepage_header">{{ __("welcome.Session's Calendar") }}</h4>
                            {{-- <p class="text-start mt-4 text-muted" id="homepage_sub_header">{{ __('welcome.calendar_body') }}</p> --}}
                            <div class="row mt-5" style="height : 21rem">
                                <div class="col-lg-3  rounded-start d-flex justify-content-center  align-items-center p-2" id="background">
                                    <div class="row">
                                        <div class="col-md-12">
                                          <h3 class=" text-center">{{ date('d') }}</h4>
                                        </div>
                                        <div class="col-md-12">
                                          <h6 class=" text-center">{{ date('M') }}- {{ date('Y') }}</h6>
                                        </div>
                                      </div>  
                                
                                </div>
                                <div class="col-lg-8 shadow-md rounded-right d-flex justify-cntent-around">
                                  <calendar-view></calendar-view>
                                </div>
                            </div>

                            <div class="col-lg-12 row mt-lg-3" style="margin-top: 6rem">
                              <p><i class="fa-solid fa-square text-danger"></i> <span class="ml-2">{{ __('welcome.Office_holidays') }}</span></p>
                              <p><i class="fa-solid fa-square text-warning"></i> <span class="ml-2">{{ __('welcome.session_close') }}</span></p>
                              <p><i class="fa-solid fa-square text-success"></i> <span class="ml-2">{{ __('welcome.scheduled_dates') }}</span></p>
                            </div>
                        </div>
                        <div class=" col-lg-7 mt-lg-5 mt-3">
                          <h4 class="text-start pt-lg-5 pt-3"  id="homepage_header">{{ __('welcome.findmp_title') }}</h4>
                          <div class="bg-warning  rounded-0 rounded-top p-0 mt-5" >
                            <div class="card border-0 shadow-md  p-4 rounded rounded-top  mt-3 mb-2 " style="position: relative;top:-2px ; height : 21rem" >
                              <div class="row align-items-center">
                                {{-- <div class="col-md-3 d-flex justify-content-center ">
                                  <i id="icon_mark" class="fas fa-search fa-2x bg-danger"></i>
                                </div> --}}
                                <div class="col-lg-12">
                                      <h6 class="font-weight-bold text-danger sahdow-sm" style="letter-spacing: 1px">{{ __('welcome.findmp') }}</h6>
                                        <div class="mt-4">
                                          <div class="mb-5">
                                            <input class="form-control" id="disabledInput" type="text" placeholder="{{ __('welcome.mpname_placeholder') }}" >
                                          </div>
                                          <div class="mb-5">
                                            <select class="form-control">
                                                <option>{{ __('welcome.mp_region') }}</option>
                                            </select>
                                          </div>
                                          <div class="d-flex justify-content-end mt-2 mt-lg-0">
                                            <button  class="col-3 btn btn-danger">{{ __('welcome.find') }}</div>
                                          </div>
                                        </div>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                     </div>
                </div>
            </div>
            
           

            <div id="news" class="bg-white mt-2 shadow-sm pb-5">
               <div class="container">
                <h4 class="text-start pt-lg-5 pt-5 font-weight-bold"  id="homepage_header">{{ __('welcome.History') }}</h4>
                  <div class="row">
                      <div class="col-lg-4"></div>
                      <div class="col-md-8">
                        <p class="text-start mt-4 text-muted" id="homepage_sub_header"> ကျွန်ုပ်တို့၏အစိုးရတွင် ကျွန်ုပ်တို့၏နိုင်ငံသားများနှင့် မြို့၏ဧည့်သည်များအတွက် အကောင်းဆုံးအခြေအနေများကိုသေချာစေရန်နေ့စဉ်လုပ်ဆောင်ပေးသော မတူညီသောဘုတ်အဖွဲ့များနှင့် ဌာနများပါဝင်သည်။<br><br>(က) တိုင်းဒေသကြီး သို့မဟုတ် ပြည်နယ် တစ်ခုစီအတွက် ကိုယ်စားလှယ် ၁၂ ဦး ကျစီ တူညီစွာဖြင့် ရွေးကောက်တင်မြှောက်သည့် အမျိုးသားလွှတ်တော် ကိုယ်စားလှယ် ၁၆၈ဦး၊

                          <br><br>(ခ) တိုင်းဒေသကြီး သို့မဟုတ် ပြည်နယ်တစ်ခုစီ အတွက် ကိုယ်စားလှယ် လေးဦးကျစီဖြင့် တပ်မတော်ကာကွယ်ရေးဦးစီးချုပ် က ဥပဒေနှင့်အညီ အမည်စာရင်း တင်သွင်းသည့် တပ်မတော်သား အမျိုးသားလွှတ်တော် ကိုယ်စားလှယ် ၅၆ ဦး
                          
                          အမျိုးသားလွှတ်တော်၏ သက်တမ်းသည် ပြည်သူ့လွှတ်တော်၏ သက်တမ်းနှင့် အညီဖြစ်သည်။</p>
                          <div class="btn bnt-sm btn-danger">ဆက်လက်ဖတ်ရန် <i class="fas fa-arrow-right"></i></div>
                      </div>
                  </div>
               </div>
            </div>
            
            <div id="news" class="bg-white mt-2 shadow-sm pb-5" >
              
              


              <div class="container">
                
               <h4 class="text-start pt-lg-5 pt-5 font-weight-bold"  id="homepage_header">{{ __('welcome.News') }}</h4>
               <p class="text-start mt-4 text-muted" id="homepage_sub_header">{{ __('welcome.news_body') }}</p>

               <div class="row mt-5">
                 <div class="col-lg-4" id="hotnews">
                   <div>
                     <h4 class="mb-4">{{ __('welcome.Breaking News') }} <a href="{{ route('news.frontend.viewall' , ['cat_id' => 1]) }}" class="d-inline btn btn-danger float-end btn-sm text-white">{{ __('welcome.view_all') }}<i class="fas fa-arrow-right ml-2"></i></a></h4>
                     <div class="swiper">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($breakingnews as $breakingNews)

                        <div class="swiper-slide">
                          @if(session()->get('locale') == 'mm')
                           
                             <div  class="card shadow-md border rounded-0 rounded-top p-2" >
                               <div class=" card-body">
                                 <div class=" d-flex justify-content-center">
                                   <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                                 </div>
                                 <div style="height : 15rem;" class="pl-5 mt-lg-2 mt-4">
                                  <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingNews->id]) }}">
                                   <h5 class="" id="news_title">{!! mb_substr($breakingNews->title  , 0 ,60)!!}</h5>
                                  </a>
                                   <span  class="mt-3 d-inline-block text-muted d-inline-block">{!! mb_substr(trim($breakingNews->body), 0 , 200) !!} ...</span>
                               </div>
                               </div>
                                 <div class="card-footer">
                                     <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                                 </div>
                             </div>
                          @else
                             <div  class="card shadow-md border rounded-0 rounded-top p-2" style="cursor: pointer">
                               <div class="row card-body">
                                 <div class=" d-flex justify-content-center">
                                   <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                                 </div>
                                 <div style="height : 15rem" class=" pl-5 mt-lg-2 mt-4">
                                  <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingNews->id]) }}">
                        
                                  <h5 class="" id="news_title">{!! mb_substr($breakingNews->title_en , 0 , 30) !!}</h5>
                                  </a> 
                                  <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingNews->body_en) , 0 , 200) !!}...</span>
                               </div>
                               </div>
                                 <div class="card-footer">
                                     <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                                 </div>
                             </div>
                          @endif
                        </div>
                        @endforeach

                        ...
                      </div>
                      <!-- If we need pagination -->
                      <div class="swiper-pagination"></div>
                    
                      <!-- If we need navigation buttons -->
                      <div class="swiper-button-prev"></div>
                      <div class="swiper-button-next"></div>
                    
                    </div>
                    
                     
                  
                     
                   </div>
                   
                 </div>

                 <div class="col-lg-4 mt-4 mt-lg-0" id="hotnews">
                  <div>
                    <h4 class="mb-4">{{ __('welcome.Hot News') }} <a href="{{ route('news.frontend.viewall' , ['cat_id' => 1]) }}" class="d-inline btn btn-danger float-end btn-sm text-white">{{ __('welcome.view_all') }}<i class="fas fa-arrow-right ml-2"></i></a></h4>
                    <div class="swiper">
                     <!-- Additional required wrapper -->
                     <div class="swiper-wrapper">
                       <!-- Slides -->
                       @foreach ($hotnews as $breakingNews)

                       <div class="swiper-slide">
                         @if(session()->get('locale') == 'mm')
                          
                            <div  class="card shadow-md border rounded-0 rounded-top p-2" >
                              <div class=" card-body">
                                <div class=" d-flex justify-content-center">
                                  <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                                </div>
                                <div style="height : 15rem;" class="pl-5 mt-lg-2 mt-4">
                                 <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingNews->id]) }}">
                                  <h5 class="" id="news_title">{!! mb_substr($breakingNews->title  , 0 ,60)!!}</h5>
                                 </a>
                                  <span  class="mt-3 d-inline-block text-muted d-inline-block">{!! mb_substr(trim($breakingNews->body), 0 , 200) !!} ...</span>
                              </div>
                              </div>
                                <div class="card-footer">
                                    <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                                </div>
                            </div>
                         @else
                            <div  class="card shadow-md border rounded-0 rounded-top p-2" style="cursor: pointer">
                              <div class="row card-body">
                                <div class=" d-flex justify-content-center">
                                  <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                                </div>
                                <div style="height : 15rem" class=" pl-5 mt-lg-2 mt-4">
                                 <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingNews->id]) }}">
                       
                                 <h5 class="" id="news_title">{!! mb_substr($breakingNews->title_en , 0 , 30) !!}</h5>
                                 </a> 
                                 <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingNews->body_en) , 0 , 200) !!}...</span>
                              </div>
                              </div>
                                <div class="card-footer">
                                    <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                                </div>
                            </div>
                         @endif
                       </div>
                       @endforeach

                       ...
                     </div>
                     <!-- If we need pagination -->
                     <div class="swiper-pagination"></div>
                   
                     <!-- If we need navigation buttons -->
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-button-next"></div>
                   
                   </div>
                   
                    
                 
                    
                  </div>
                  
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0" id="hotnews">
                  <div>
                    <h4 class="mb-4">{{ __('welcome.Latest News') }} <a href="{{ route('news.frontend.viewall' , ['cat_id' => 1]) }}" class="d-inline btn btn-danger float-end btn-sm text-white">{{ __('welcome.view_all') }}<i class="fas fa-arrow-right ml-2"></i></a></h4>
                    <div class="swiper">
                     <!-- Additional required wrapper -->
                     <div class="swiper-wrapper">
                       <!-- Slides -->
                       @foreach ($latestnews as $breakingNews)

                       <div class="swiper-slide">
                         @if(session()->get('locale') == 'mm')
                          
                            <div  class="card shadow-md border rounded-0 rounded-top p-2" >
                              <div class=" card-body">
                                <div class=" d-flex justify-content-center">
                                  <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                                </div>
                                <div style="height : 15rem;" class="pl-5 mt-lg-2 mt-4">
                                 <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingNews->id]) }}">
                                  <h5 class="" id="news_title">{!! mb_substr($breakingNews->title  , 0 ,60)!!}</h5>
                                 </a>
                                  <span  class="mt-3 d-inline-block text-muted d-inline-block">{!! mb_substr(trim($breakingNews->body), 0 , 200) !!} ...</span>
                              </div>
                              </div>
                                <div class="card-footer">
                                    <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                                </div>
                            </div>
                         @else
                            <div  class="card shadow-md border rounded-0 rounded-top p-2" style="cursor: pointer">
                              <div class="row card-body">
                                <div class=" d-flex justify-content-center">
                                  <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                                </div>
                                <div style="height : 15rem" class=" pl-5 mt-lg-2 mt-4">
                                 <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingNews->id]) }}">
                       
                                 <h5 class="" id="news_title">{!! mb_substr($breakingNews->title_en , 0 , 30) !!}</h5>
                                 </a> 
                                 <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingNews->body_en) , 0 , 200) !!}...</span>
                              </div>
                              </div>
                                <div class="card-footer">
                                    <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                                </div>
                            </div>
                         @endif
                       </div>
                       @endforeach

                       ...
                     </div>
                     <!-- If we need pagination -->
                     <div class="swiper-pagination"></div>
                   
                     <!-- If we need navigation buttons -->
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-button-next"></div>
                   
                   </div>
                   
                    
                 
                    
                  </div>
                  
                </div>

                 
                 
              </div>
              </div>
           </div>
            <div id="news" class="mt-2 shadow-sm pb-5 pb-md-5">
              <div class="container">
               <h4 class="text-start pt-lg-5 pt-5 font-weight-bold"  id="homepage_header">{{ __('welcome.Gallery') }}</h4>
               
               <ul class="nav nav-pills mb-4 mt-5" id="pills-tab" role="tablist">
                <li class="nav-item col-lg-6 col-12" role="presentation">
                  <button class="nav-link active col-lg-12 col-12 p-3 shadow-sm rounded-0 " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa-solid fa-photo-film mr-3"></i>{{ __('welcome.Photo_btn') }}</button>
                </li>
                <li class="nav-item col-lg-6 col-12" role="presentation">
                  <button class="nav-link col-lg-12 col-12 p-3 btn btn-light shadow-sm rounded-0" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa-solid fa-video mr-3"></i>{{ __('welcome.Video_btn') }}</button>
                </li>
                
              </ul>

                 <div class=" mt-3">

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      @if (isset($photo_videos[1]))
                        <div class="tab-pane fade show active  row mt-2 mt-lg-0">
                        @foreach ($photo_videos[1] as $photo_video)
                            {{-- <div class="col-lg-3">
                              <img id="image_video_image" class="img-fluid border-bottom border-3 border-warning shadow-md" src="{{ asset('uploads/gallery/'.$photo_video->image_or_video) }}">
                            </div> --}}

                                  
                                  <div class="col-lg-3">
                                      <div class="box">
                                          <img src="{{ asset('uploads/gallery/'.$photo_video->image_or_video) }}">
                                          <div class="box-content">
                                              {{-- <ul class="icon">
                                                  <li><a href="#"><i class="fa fa-search"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-link"></i></a></li>
                                              </ul> --}}
                                              {{-- <h3 class="title">Miranda Roy</h3> --}}
                                              <span class="post">{!! $photo_video->description !!}</span>
                                          </div>
                                      </div>
                                  </div>
                            @endforeach
                        </div>
                      @endif

                      
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                      @if (isset($photo_videos[0]))
                        <div class="tab-pane fade show active  row mt-2 mt-lg-0">
                        @foreach ($photo_videos[0] as $photo_video)
                            <div class="col-lg-3">
                              <div class="box">
                              <iframe width="400" height="200" src="{{ $photo_video->image_or_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              {{-- <img id="image_video_image" class="img-fluid border-bottom border-3 border-warning shadow-md" src="{{ asset('uploads/gallery/'.$photo_video->image_or_video) }}"> --}}
                              <div class="box-content">
                                {{-- <ul class="icon">
                                    <li><a href="#"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link"></i></a></li>
                                </ul> --}}
                                {{-- <h3 class="title">Miranda Roy</h3> --}}
                                <span class="post">{!! $photo_video->description !!}</span>
                            </div>
                            </div>
                            </div>
                            @endforeach
                        </div>
                      @endif
                    </div>
                  </div>



                  
                  
                 </div>
              </div>
           </div>
           
              @include('frontend.layout.footer')
    </div>

    
    @section('script')
      <script>
        const swiper = new Swiper('.swiper', {
                    // spaceBetween: 15,
                    // slidesPerView: 1    , 
                    // pagination: {
                    // el: ".swiper-pagination",
                    // clickable: true
                    // },
                    // speed: 1000,
                    // loop: true,
                    // autoplay: {
                    // delay: 2500,
                    // disableOnInteraction: false,
                    // }

                    navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                    },
                 })
      </script>
    @endsection
</x-frontend-layout>


