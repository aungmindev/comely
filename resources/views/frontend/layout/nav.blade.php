<header class="site-navbar d-none d-lg-block" role="banner" id="background">

    <div class="container">
      <div class="row align-items-center">
        
        {{-- <div class="col-6 col-xl-2">
          <h1 class="mb-0 site-logo"><a href="index.html">Brand<span class="text-primary">.</span> </a></h1>
        </div> --}}

        <div class="">
          <nav class="site-navigation position-relative " role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="{{ url('/') }}" class="nav-link" id="nav_text">{{ __('menu.Home') }}</a></li>

              <li class="has-children ">
                    <a href="#meeting" class="nav-link" id="nav_text">@lang('menu.Session')<i class="fa-solid fa-caret-down ml-2"></i></a>
                    <ul class="dropdown" style="z-index: 999999">
                    <li><a href="{{ route('session.view' , ['sessionType' => 'regular']) }}" class="nav-link">{{ __('menu.Regular Session') }}</a></li>
                    <li><a  href="{{ route('session.view' , ['sessionType' => 'special']) }}">{{ __('menu.Special Session') }}</a></li>
                    <li><a href="{{ route('session.view' , ['sessionType' => 'emergency']) }}" class="nav-link">{{ __('menu.Emergency Session') }}</a></li>
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
                    <a href="#question" class="nav-link" id="nav_text">{{ __('menu.Question') }} <i class="fa-solid fa-caret-down ml-2"></i></a>
                    <ul class="dropdown" style="z-index: 999999">
                    <li><a href="#team-section" class="nav-link">{{ __('menu.Show Star') }}</a></li>
                    <li><a href="#pricing-section" class="nav-link">{{ __('menu.No Star') }}</a></li>
                    
                    </ul>
              </li>

              

            <li class="has-children">
                <a href="#question" class="nav-link" id="nav_text">{{ __('menu.Laws') }}<i class="fa-solid fa-caret-down ml-2"></i></a>
                <ul class="dropdown" style="z-index: 999999">
                <li><a href="{{ route('app.view' , ['view' => 'frontend.law.draft']) }}" class="nav-link">{{ __('menu.Draft Law') }}</a></li>
                <li><a href="{{ route('app.view' , ['view' => 'frontend.law.bill']) }}" class="nav-link">{{ __('menu.Bill law') }}</a></li>
                <li><a href="{{ route('app.view' , ['view' => 'frontend.law.lease']) }}" class="nav-link">{{ __('menu.Lease law') }}</a></li>
               
                </ul>
          </li>

          <li class="has-children">
            <a href="#question" class="nav-link" id="nav_text">{{ __('menu.Committees') }}<i class="fa-solid fa-caret-down ml-2"></i></a>
            <ul class="dropdown" style="z-index: 999999">
            <li><a href="#team-section" class="nav-link">{{ __('menu.Committee1') }}</a></li>
            <li><a href="#pricing-section" class="nav-link">{{ __('menu.Committee2') }}</a></li>
            
            </ul>
      </li>

              
              
              <li><a href="{{ route('app.view' , ['view' => 'frontend.history.history']) }}" class="nav-link" id="nav_text">{{ __('menu.History') }}</a></li>
              <li><a href="{{ route('app.view' , ['view' => 'frontend.about.about']) }}" class="nav-link" id="nav_text">{{ __('menu.About') }}</a></li>
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
