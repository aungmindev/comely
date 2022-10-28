<div class="h-25 d-none d-lg-block">
    <div class="row align-items-center  justify-content-around">
        <div class="col-md-4">
            <span class="d-inline-block">
                <i class="fa-solid fa-globe shadow-sm p-2 rounded-circle border  d-inline" id="iconColor" style="font-size:25px"></i>
            </span>
            <span class="d-inline-block ml-2 text-danger">Myanmar</span>
            <span class="d-inline-block ml-2 font-weight-bold">|</span>
            <span class="d-inline-block ml-2">English</span>
        </div>

        <div class="col-md-4 ">
            <img src="{{ asset('images/logo.png') }}">
        </div>
       
        <div class="col-md-4">
            <span class="d-inline-block">
                    <i class="fa-solid fa-location-dot  shadow-sm p-2 border rounded-circle d-inline" id="iconColor" style="font-size:25px"></i>
            </span>
            <span class="d-inline-block float-right ml-3">
                Q4VP+JR5, Yangon, Myanmar (Burma)
            </span>
        </div>
    </div>
</div>

<div class="d-xl-none d-lg-none">
    <div class="col-12">
        <div class="row">
            {{-- <div class="col-6">
                <img src="{{ asset('images/logo.png') }}" style="width: 100px ; height : 100px">
            </div> --}}
            <div class="col-8">
                
                <span class="d-inline-block ml-2 text-danger">Myanmar</span>
                <span class="d-inline-block ml-2 font-weight-bold">|</span>
                <span class="d-inline-block ml-2">English</span>
            </div>
            <div class="col-6">
                <button style="position: absolute ; right : 0 ; top : 19px  ;margin-right : 10px ;" class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="fa-solid fa-bars"></i>
                  </button>
            </div>
        </div>
    </div>
    

   

      
      
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <img src="{{ asset('images/logo.png') }}" style="width: 70px ; height : 70px">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel">Yangon Hluttaw</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <header class="site-navbar " role="banner" id="">

            <div class="container">
              <div class="row align-items-center">
                
                {{-- <div class="col-6 col-xl-2">
                  <h1 class="mb-0 site-logo"><a href="index.html">Brand<span class="text-primary">.</span> </a></h1>
                </div> --}}
        
                <div class="">
                  <nav class="site-navigation position-relative " role="navigation">
        
                    <ul class="nav flex-column site-menu main-menu js-clone-nav mr-auto ">
                      <li class="has-children ">
                            <a href="#meeting" class="nav-link " id="nav_text">အစည်းအဝေး <i class="fa-solid fa-caret-down"></i></a>
                            <ul class="dropdown" style="z-index: 999999">
                            <li><a href="#team-section" class="nav-link">ပုံမှန်အစည်းအဝေး</a></li>
                            <li><a href="#pricing-section" class="nav-link">အထူးအစည်းအဝေး</a></li>
                            <li><a href="#faq-section" class="nav-link">အရေးပေါ်အစည်းအဝေး</a></li>
                            {{-- <li class="has-children">
                                <a href="#">More Links</a>
                                <ul class="dropdown">
                                <li><a href="#">Menu One</a></li>
                                <li><a href="#">Menu Two</a></li>
                                <li><a href="#">Menu Three</a></li>
                                </ul>
                            </li> --}}
                            </ul>
                    </li>
                      <li class="has-children">
                            <a href="#question" class="nav-link" id="nav_text">အဆိုမေးခွန်းများ <i class="fa-solid fa-caret-down"></i></a>
                            <ul class="dropdown" style="z-index: 999999">
                            <li><a href="#team-section" class="nav-link">ကြယ်ပြ</a></li>
                            <li><a href="#pricing-section" class="nav-link">ကြယ်မပြ</a></li>
                            
                            </ul>
                      </li>
        
                      
        
                    <li class="has-children">
                        <a href="#question" class="nav-link" id="nav_text">ဥပဒေပြုရေး <i class="fa-solid fa-caret-down"></i></a>
                        <ul class="dropdown" style="z-index: 999999">
                        <li><a href="#team-section" class="nav-link">ဥပဒေကြမ်း</a></li>
                        <li><a href="#pricing-section" class="nav-link">ပြငှာန်းပီး ဥပဒေ</a></li>
                       
                        </ul>
                  </li>
        
                  <li class="has-children">
                    <a href="#question" class="nav-link" id="nav_text">ကော်မတီ / အဖွဲ့ <i class="fa-solid fa-caret-down"></i></a>
                    <ul class="dropdown" style="z-index: 999999">
                    <li><a href="#team-section" class="nav-link">ကော်မတီ၁</a></li>
                    <li><a href="#pricing-section" class="nav-link">ကော်မတီ၂</a></li>
                    <li><a href="#faq-section" class="nav-link">ကော်မတီ၃</a></li>
                    <li><a href="#gallery-section" class="nav-link">ကော်မတီ၄</a></li>
                    <li><a href="#services-section" class="nav-link">ကော်မတီ၅</a></li>
                    
                    </ul>
              </li>
        
                      
                      
                      <li><a href="#blog-section" class="nav-link" id="nav_text">မှတ်တမ်း</a></li>
                      <li><a href="#blog-section" class="nav-link" id="nav_text">လွှတ်တော်အကြောင်း သိကောင်းစရာ</a></li>
                      {{-- <li><a href="#contact-section" class="nav-link">Contact</a></li>
                      <li class="social"><a href="#contact-section" class="nav-link"><span class="icon-facebook"></span></a></li>
                      <li class="social"><a href="#contact-section" class="nav-link"><span class="icon-twitter"></span></a></li>
                      <li class="social"><a href="#contact-section" class="nav-link"><span class="icon-linkedin"></span></a></li> --}}
                    </ul>
                  </nav>
                </div>
        
              </div>
            </div>
            
          </header>
        </div>
      </div>
</div>