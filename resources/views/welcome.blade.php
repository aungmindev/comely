<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
          {{-- <div class="bg-white p-5 w-100" style="position: absolute;top:20rem;height:9rem">

          </div> --}}
          <div class="bg-warning container rounded-0 rounded-top p-0" >
            <div class="card border-0 shadow p-4 rounded-0 rounded-top  mt-3 mb-2 " style="position: relative;top:-2px" >
              <div class="row align-items-center">
                {{-- <div class="col-md-3 d-flex justify-content-center ">
                  <i id="icon_mark" class="fas fa-search fa-2x bg-danger"></i>
                </div> --}}
                <div class="col-md-12 ">
                      <h6 class="font-weight-bold text-danger sahdow-sm" style="letter-spacing: 1px">{{ __('welcome.findmp') }}</h6>
                        <div class="row mt-4">
                          <div class="col-lg-4 ">
                            <input class="form-control" id="disabledInput" type="text" placeholder="{{ __('welcome.mpname_placeholder') }}" >
                          </div>
                          <div class="col-lg-6 mt-2 mt-lg-0">
                            <select class="form-control">
                                <option>{{ __('welcome.mp_region') }}</option>
                            </select>
                          </div>
                          <div class="col-lg-2 mt-2 mt-lg-0">
                            <div class="btn btn-danger">{{ __('welcome.find') }}</div>
                          </div>
                        </div>
                </div>
              </div>
              
            </div>
          </div>


            <div class="bg-white shadow-sm" >
              <div id="calendar" class="container pb-3">
                     <h4 class="text-start pt-lg-5 pt-5"  id="homepage_header">{{ __("welcome.Session's Calendar") }}</h4>
                     <p class="text-start mt-4 text-muted" id="homepage_sub_header">{{ __('welcome.calendar_body') }}</p>
                     <div class="row">
                      <div class=" col-lg-7 mt-lg-5 mt-3">
                        <div class="row ">
                            <div class="col-lg-4  rounded-start d-flex justify-content-center  align-items-center " style="background-color: #f8d753">
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
                     </div>

                     <div class="col-lg-5 mt-lg-5 mt-3 d-flex align-items-center">
                        <div class="col-lg-10 offset-md-2">
                          <p><i class="fa-solid fa-square text-danger"></i> <span class="ml-2">{{ __('welcome.Office_holidays') }}</span></p>
                          <p><i class="fa-solid fa-square text-warning"></i> <span class="ml-2">{{ __('welcome.session_close') }}</span></p>
                          <p><i class="fa-solid fa-square text-success"></i> <span class="ml-2">{{ __('welcome.scheduled_dates') }}</span></p>
                        </div>
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
                      <h4 class="mb-4">{{ __('welcome.Breaking News') }} <p class="d-inline btn btn-danger float-end btn-sm">{{ __('welcome.view_all') }}<i class="fas fa-arrow-right ml-2"></i></p></h4>
                      @foreach ($news[1] as $breakingNews)
                        @if(session()->get('locale') == 'mm')
                        <div class="card shadow-md border rounded-0 rounded-top p-2">
                          <div class=" card-body">
                            <div class="col-lg-6 d-flex justify-content-center">
                              <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                            </div>
                            <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                              <h5>{!! mb_substr($breakingNews->title  , 0 ,60)!!}</h5>
                              <p class="text-start text-muted">{!! mb_substr($breakingNews->body , 0 , 200) !!} ...</p>
                          </div>
                          </div>
                            <div class="card-footer">
                                <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                            </div>
                        </div>
                        @else
                        <div class="card shadow-md border rounded-0 rounded-top p-2">
                          <div class="row card-body">
                            <div class="col-lg-6 d-flex justify-content-center">
                              <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                            </div>
                            <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                              <h5>{!! mb_substr($breakingNews->title_en , 0 , 15) !!}</h5>
                              <p class="text-start text-muted">{!! mb_substr($breakingNews->body_en , 0 , 100) !!}</p>
                          </div>
                          </div>
                            <div class="card-footer">
                                <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                            </div>
                        </div>
                        @endif
                      @endforeach
                      
                   
                      
                    </div>
                    
                  </div>

                  <div class="col-lg-4 mt-lg-0 mt-3" id="hotnews">
                    <h4 class="mb-4">{{ __('welcome.Hot News') }} <p class="d-inline btn btn-danger float-end btn-sm">{{ __('welcome.view_all') }}<i class="fas fa-arrow-right ml-2"></i></p></h4>
                    @foreach ($news[2] as $breakingNews)
                    @if(session()->get('locale') == 'mm')
                    <div class="card shadow-md border rounded-0 rounded-top p-2">
                      <div class="row card-body">
                        <div class="col-lg-6 d-flex justify-content-center">
                          <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                        </div>
                        <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                          <h5>{!! mb_substr($breakingNews->title  , 0 ,60)!!}</h5>
                          <p class="text-start text-muted">{!! mb_substr($breakingNews->body , 0 , 200) !!} ...</p>
                      </div>
                      </div>
                        <div class="card-footer">
                            <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                        </div>
                    </div>
                    @else
                    <div class="card shadow-md border rounded-0 rounded-top p-2">
                      <div class="row card-body">
                        <div class="col-lg-6 d-flex justify-content-center">
                          <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                        </div>
                        <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                          <h5>{!! mb_substr($breakingNews->title_en , 0 , 15) !!}</h5>
                          <p class="text-start text-muted">{!! mb_substr($breakingNews->body_en , 0 , 100) !!}</p>
                      </div>
                      </div>
                        <div class="card-footer">
                            <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                        </div>
                    </div>
                    @endif
                  @endforeach

                      
                  </div>

                  <div class="col-lg-4 mt-lg-0 mt-3" id="hotnews">
                    <h4 class="mb-4">{{ __('welcome.Latest News') }} <p class="d-inline btn btn-danger float-end btn-sm">{{ __('welcome.view_all') }}<i class="fas fa-arrow-right  ml-2"></i></p></h4>
                    @foreach ($news[3] as $breakingNews)
                    @if(session()->get('locale') == 'mm')
                    <div class="card shadow-md border rounded-0 rounded-top p-2">
                      <div class="row card-body">
                        <div class="col-lg-6 d-flex justify-content-center">
                          <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                        </div>
                        <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                          <h5>{!! mb_substr($breakingNews->title  , 0 ,60)!!}</h5>
                          <p class="text-start text-muted">{!! mb_substr($breakingNews->body , 0 , 200) !!} ...</p>
                      </div>
                      </div>
                        <div class="card-footer">
                            <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                        </div>
                    </div>
                    @else
                    <div class="card shadow-md border rounded-0 rounded-top p-2">
                      <div class="row card-body">
                        <div class="col-lg-6 d-flex justify-content-center">
                          <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingNews->image) }}">
                        </div>
                        <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                          <h5>{!! mb_substr($breakingNews->title_en , 0 , 15) !!}</h5>
                          <p class="text-start text-muted">{!! mb_substr($breakingNews->body_en , 0 , 100) !!}</p>
                      </div>
                      </div>
                        <div class="card-footer">
                            <span style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingNews->created_at)) }}</span>
                        </div>
                    </div>
                    @endif
                  @endforeach
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

            <div id="news" class="mt-2 shadow-sm pb-5 pb-md-5">
              <div class="container">
               <h4 class="text-start pt-lg-5 pt-5 font-weight-bold"  id="homepage_header">{{ __('welcome.Gallery') }}</h4>
               
                 <div class="row mt-5">
                     <div class="col-lg-6">

                        <div class="btn  shadow-sm col-12 rounded-0 rounded-top" id="background">
                          <h4 class="p-2"><i class="fas fa-image"></i> {{ __('welcome.Photo_btn') }} <p class="d-inline btn float-end btn-sm" style="position: relative;top:5px">{{ __('welcome.continue') }}  <i class="fas fa-arrow-right"></i></p></h4>
                        </div>
                      
                     </div>
                     <div class="col-lg-6 col-12">
                      <div class="btn btn-light shadow-sm col-12 rounded-0 rounded-top">
                        <h4 class="p-2"><i class="fas fa-video"></i> {{ __('welcome.Video_btn') }} </h4>
                    </div>
                     </div>
                     
                 </div>

                 <div class="row mt-3">
                  @foreach ($photo_videos as $photo_video)
                    <div class="col-lg-3 d-flex justify-content-center mt-2 mt-lg-0">
                       <img id="image_video_image" class="img-fluid border-bottom border-3 border-warning shadow-md" src="{{ asset('uploads/gallery/'.$photo_video->image_or_video) }}">
                    </div>
                  @endforeach
                   
                    
                 </div>
              </div>
           </div>

              @include('frontend.layout.footer')
    </div>

    <script>
        
    </script>
    
</x-frontend-layout>
