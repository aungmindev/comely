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
                      <h6 class="font-weight-bold text-danger sahdow-sm" style="letter-spacing: 1px">လွှတ်တော် ကိုယ်စားလှယ်၏ အမည်နှင့် တိုင်းဒေသကြီးနှင့်ပြည်နယ် တို့ကို အသုံးပြု၍ ကိုယ်ရေးအချက်အလက်အသေးစိတ်ကို ကြည့်ရှုနိုင်ပါသည်။ </h6>
                        <div class="row mt-4">
                          <div class="col-lg-4 ">
                            <input class="form-control" id="disabledInput" type="text" placeholder="ကိုယ်စားလှယ် အမည်" >
                          </div>
                          <div class="col-lg-6 mt-2 mt-lg-0">
                            <select class="form-control">
                                <option>တိုင်းဒေသကြီးနှင့် ပြည်နယ် ရွေးရန်</option>
                            </select>
                          </div>
                          <div class="col-lg-2 mt-2 mt-lg-0">
                            <div class="btn btn-danger">ရှာရန်</div>
                          </div>
                        </div>
                </div>
              </div>
              
            </div>
          </div>


            <div class="bg-white shadow-sm" >
              <div id="calendar" class="container pb-3">
                     <h4 class="text-start pt-lg-5 pt-5"  id="homepage_header">အစည်းအဝေး / ပြက္ခဒိန်</h4>
                     <p class="text-start mt-4 text-muted" id="homepage_sub_header"> ကျွန်ုပ်တို့၏အစိုးရတွင် ကျွန်ုပ်တို့၏နိုင်ငံသားများနှင့် မြို့၏ဧည့်သည်များအတွက် အကောင်းဆုံးအခြေအနေများကိုသေချာစေရန်နေ့စဉ်လုပ်ဆောင်ပေးသော မတူညီသောဘုတ်အဖွဲ့များနှင့် ဌာနများပါဝင်သည်။</p>
                     <div class="row">
                      <div class=" col-lg-7 mt-lg-5 mt-3">
                        <div class="row ">
                            <div class="col-lg-4  rounded-start d-flex justify-content-center  align-items-center " style="background-color: #f8d753">
                                <div class="row">
                                    <div class="col-md-12">
                                      <h3 class=" text-center">20</h4>
                                    </div>
                                    <div class="col-md-12">
                                      <h6 class=" text-center">OCTOBER-2022</h6>
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
                          <p><i class="fa-solid fa-square text-danger"></i> <span class="ml-2"> ရုံးပိတ်ရက်များ</span></p>
                          <p><i class="fa-solid fa-square text-warning"></i> <span class="ml-2">လွှတ်တော် အစည်းအဝေးရပ်နားမည့်ရက်များ</span></p>
                          <p><i class="fa-solid fa-square text-success"></i> <span class="ml-2">လွှတ်တော် အစည်းအဝေးကျင်းပရန် လျာထားသည့်ရက်များ</span></p>
                        </div>
                     </div>
                     </div>
                </div>
            </div>
            
            <div id="news" class="bg-white mt-2 shadow-sm pb-5" >
               <div class="container">
                <h4 class="text-start pt-lg-5 pt-5 font-weight-bold"  id="homepage_header">သတင်းများ</h4>
                <p class="text-start mt-4 text-muted" id="homepage_sub_header"> ကျွန်ုပ်တို့၏အစိုးရတွင် ကျွန်ုပ်တို့၏နိုင်ငံသားများနှင့် မြို့၏ဧည့်သည်များအတွက် အကောင်းဆုံးအခြေအနေများကိုသေချာစေရန်နေ့စဉ်လုပ်ဆောင်ပေးသော မတူညီသောဘုတ်အဖွဲ့များနှင့် ဌာနများပါဝင်သည်။</p>

                <div class="row mt-5">
                  <div class="col-lg-4" id="hotnews">
                    <div>
                      <h4 class="mb-4">ကြားဖြတ်သတင်းများ <p class="d-inline btn btn-danger float-end btn-sm">View All <i class="fas fa-arrow-right"></i></p></h4>
                      <div class="card shadow-md border rounded-0 rounded-top p-2">
                        <div class="row card-body">
                          <div class="col-lg-6 d-flex justify-content-center">
                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/2.jpeg') }}">
                          </div>
                          <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                            <h4>Title</h4>
                            <p class="text-start text-muted">မြန်မာလွှတ်တော်နှင့် Hanns Seidel Foundation (HSF)တို့အကြား ချုပ်ဆိုသည့် မြန်မာလွှတ်တော်များ ဖွံ့ဖြိုးတိုးတက်ရေး ပူးပေါင်းဆောင်ရွက်မှုဆိုင်ရာ နားလည်မှုစာချွန်လွှာ .... </p>
                         </div>
                        </div>
                          <div class="card-footer">
                              <span style='font-family: Arial;font-size : 15px'>Oct 25 , 2022</span>
                          </div>
                      </div>
                      <div class="card shadow-md border rounded-0 rounded-top p-2 mt-2">
                        <div class="row card-body">
                          <div class="col-lg-6 d-flex justify-content-center">
                            <img id="image" class="img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/4.jpg') }}">
                          </div>
                          <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                            <h4>Title</h4>
                            <p class="text-start text-muted">မြန်မာလွှတ်တော်နှင့် Hanns Seidel Foundation (HSF)တို့အကြား ချုပ်ဆိုသည့် မြန်မာလွှတ်တော်များ ဖွံ့ဖြိုးတိုးတက်ရေး ပူးပေါင်းဆောင်ရွက်မှုဆိုင်ရာ နားလည်မှုစာချွန်လွှာ .... </p>
                         </div>
                        </div>
                        <div class="card-footer">
                          <span style='font-family: Arial;font-size : 15px'>Oct 25 , 2022</span>
                      </div>
                      </div>
                      
                    </div>
                    
                  </div>

                  <div class="col-lg-4 mt-lg-0 mt-3" id="hotnews">
                    <h4 class="mb-4">သတင်းထူးများ <p class="d-inline btn btn-danger float-end btn-sm">View All  <i class="fas fa-arrow-right"></i></p></h4>
                      <div class="card shadow-md border rounded-0 rounded-top p-2">
                        <div class="row card-body">
                          <div class="col-lg-6 d-flex justify-content-center">
                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/3.jpg') }}">
                          </div>
                          <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                            <h4>Title</h4>
                            <p class="text-start text-muted">မြန်မာလွှတ်တော်နှင့် Hanns Seidel Foundation (HSF)တို့အကြား ချုပ်ဆိုသည့် မြန်မာလွှတ်တော်များ ဖွံ့ဖြိုးတိုးတက်ရေး ပူးပေါင်းဆောင်ရွက်မှုဆိုင်ရာ နားလည်မှုစာချွန်လွှာ .... </p>
                         </div>
                        </div>
                        <div class="card-footer">
                          <span style='font-family: Arial;font-size : 15px'>Oct 25 , 2022</span>
                      </div>

                      </div>

                      <div class="card shadow-md border rounded-0 rounded-top p-2 mt-2">
                        <div class="row card-body">
                          <div class="col-lg-6 d-flex justify-content-center">
                            <img  id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/7.jpeg') }}">
                          </div>
                          <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                            <h4>Title</h4>
                            <p class="text-start text-muted">မြန်မာလွှတ်တော်နှင့် Hanns Seidel Foundation (HSF)တို့အကြား ချုပ်ဆိုသည့် မြန်မာလွှတ်တော်များ ဖွံ့ဖြိုးတိုးတက်ရေး ပူးပေါင်းဆောင်ရွက်မှုဆိုင်ရာ နားလည်မှုစာချွန်လွှာ .... </p>
                         </div>
                        </div>
                        <div class="card-footer">
                          <span style='font-family: Arial;font-size : 15px'>Oct 25 , 2022</span>
                      </div>

                      </div>
                  </div>

                  <div class="col-lg-4 mt-lg-0 mt-3" id="hotnews">
                    <h4 class="mb-4">နောက်ဆုံးရသတင်းများ <p class="d-inline btn btn-danger float-end btn-sm">View All  <i class="fas fa-arrow-right"></i></p></h4>
                      <div class="card shadow-md border rounded-0 rounded-top p-2">
                        <div class="row card-body">
                          <div class="col-lg-6 d-flex justify-content-center">
                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/5.jpeg') }}">
                          </div>
                          <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                            <h4>Title</h4>
                            <p class="text-start text-muted">မြန်မာလွှတ်တော်နှင့် Hanns Seidel Foundation (HSF)တို့အကြား ချုပ်ဆိုသည့် မြန်မာလွှတ်တော်များ ဖွံ့ဖြိုးတိုးတက်ရေး ပူးပေါင်းဆောင်ရွက်မှုဆိုင်ရာ နားလည်မှုစာချွန်လွှာ .... </p>
                         </div>
                        </div>
                          <div class="card-footer">
                              <span style='font-family: Arial;font-size : 15px'>Oct 25 , 2022</span>
                          </div>

                      </div>

                      <div class="card shadow-md border rounded-0 rounded-top p-2 mt-2">
                        <div class="row card-body">
                          <div class="col-lg-6 d-flex justify-content-center">
                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/6.jpg') }}">
                          </div>
                          <div class="col-lg-6 p-0 mt-lg-0 mt-4">
                            <h4>Title</h4>
                            <p class="text-start text-muted">မြန်မာလွှတ်တော်နှင့် Hanns Seidel Foundation (HSF)တို့အကြား ချုပ်ဆိုသည့် မြန်မာလွှတ်တော်များ ဖွံ့ဖြိုးတိုးတက်ရေး ပူးပေါင်းဆောင်ရွက်မှုဆိုင်ရာ နားလည်မှုစာချွန်လွှာ .... </p>
                         </div>
                        </div>
                           <div class="card-footer">
                              <span style='font-family: Arial;font-size : 15px'>Oct 25 , 2022</span>
                          </div>
                          
                      </div>
                  </div>

                  
                  
               </div>
               </div>
            </div>

            <div id="news" class="bg-white mt-2 shadow-sm pb-5">
               <div class="container">
                <h4 class="text-start pt-lg-5 pt-5 font-weight-bold"  id="homepage_header">ရန်ကုန်တိုင်း လွှတ်တော် သမိုင်း</h4>
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
               <h4 class="text-start pt-lg-5 pt-5 font-weight-bold"  id="homepage_header">ဓာတ်ပုံများ / ဗီဒီယိုများ</h4>
               
                 <div class="row mt-5">
                     <div class="col-lg-6">

                        <div class="btn  shadow-sm col-12 rounded-0 rounded-top" id="background">
                          <h4 class="p-2"><i class="fas fa-image"></i> ဓာတ်ပုံများ <p class="d-inline btn float-end btn-sm" style="position: relative;top:5px">ဆက်လက်ကြည့်ရန်  <i class="fas fa-arrow-right"></i></p></h4>
                        </div>
                      
                     </div>
                     <div class="col-lg-6 col-12">
                      <div class="btn btn-light shadow-sm col-12 rounded-0 rounded-top">
                        <h4 class="p-2"><i class="fas fa-video"></i> ဗီဒီယိုများ </h4>
                    </div>
                     </div>
                     
                 </div>

                 <div class="row mt-3">
                    <div class="col-lg-3 d-flex justify-content-center mt-2 mt-lg-0">
                       <img id="image_video_image" class="img-fluid border-bottom border-3 border-warning shadow-md" src="{{ asset('uploads/image_video/(1)22.1.2021.jpg') }}">
                    </div>
                    <div class="col-lg-3  d-flex justify-content-center mt-2 mt-lg-0">
                       <img id="image_video_image" class="img-fluid border-bottom border-3 border-warning shadow-md" src="{{ asset('uploads/image_video/(1)22.1.2021.jpg') }}">
                    </div>
                    <div class="col-lg-3  d-flex justify-content-center mt-2 mt-lg-0">
                      <img id="image_video_image" class=" img-fluid border-bottom border-3 border-warning shadow-md" src="{{ asset('uploads/news/7.jpeg') }}">
                    </div>
                    <div class="col-lg-3  d-flex justify-content-center mt-2 mt-lg-0">
                      <img id="image_video_image" class=" img-fluid border-bottom border-3 border-warning shadow-md" src="{{ asset('uploads/news/7.jpeg') }}">
                    </div>
                 </div>
              </div>
           </div>

              @include('frontend.layout.footer')
    </div>

    <script>
        
    </script>
    
</x-frontend-layout>
