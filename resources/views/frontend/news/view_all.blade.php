<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
        <div class=" container mt-lg-2">
            <div class="row">
                <div class="col-lg-9 card p-4 border-top-0 border-start-0 border-right-5" >
                    @if(session()->get('locale') == 'mm')
                    {{-- @if ($cat_id == '1')
                        <h4>{{ __('all.siteName') }}၏ ကြားဖြတ်သတင်းများ</h4>
                     @elseif ($cat_id == '1')   
                         <h4>{{ __('all.siteName') }}၏ သတင်းထူးများ</h4>
                     @else
                          <h4>{{ __('all.siteName') }}၏ နောက်ဆုံးရသတင်းများ</h4>
                    @endif --}}

                        <div class="mt-2">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <button class="nav-link {{ $cat_id == 1 ? 'active' : '' }}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">ကြားဖြတ်သတင်းများ</button>
                                  <button class="nav-link {{ $cat_id == 2 ? 'active' : '' }}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">သတင်းထူးများ</button>
                                  <button class="nav-link {{ $cat_id == 3 ? 'active' : '' }}" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">နောက်ဆုံးရသတင်းများ</button>
                                </div>
                              </nav>


                              <div class="tab-content p-0" id="nav-tabContent">
                                    {{-- @if ($cat_id == '1')
                                        <h4 class="mt-4 mb-3">{{ __('all.siteName') }}၏ ကြားဖြတ်သတင်းများ</h4>
                                    @elseif ($cat_id == '1')   
                                        <h4 class="mt-4 mb-3">{{ __('all.siteName') }}၏ သတင်းထူးများ</h4>
                                    @else
                                        <h4 class="mt-4 mb-3">{{ __('all.siteName') }}၏ နောက်ဆုံးရသတင်းများ</h4>
                                    @endif --}}

                                <div class="tab-pane  fade {{ $cat_id == 1 ? 'show active' : '' }} p-0" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <h4 class="mt-4 mb-4"><i class="fa-solid fa-newspaper mr-3  d-inline border p-2 rounded-circle" id="iconColor"></i>{{ __('all.siteName') }}၏ ကြားဖြတ်သတင်းများ</h4>
                                    <div class="row ">
                                        @foreach ($breakingnews->take(2) as $breakingnew)
                                        
                                        <div class="col-lg-6 mt-2 p-0 p-lg-2">
                                            <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                            <div class="card shadow-md p-2">
                                                <div class="d-flex justify-content-center">
                                                    <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                  </div>
                                                  <div style="height : 15rem" class="p-0 mt-lg-2 mt-4">
                                                    <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title  , 0 ,60) }} ...</h5>
                                                    <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body), 0 , 200) !!} ...</span>
                                                  </div>
                                                  <div class="card-footer">
                                                    <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        @endforeach
                                        
                                        @foreach ($breakingnews->skip(2) as $breakingnew)
                                            <div class="mt-2 p-0 p-lg-2">
                                                <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                <div class="card p-2 shadow-md">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex justify-content-center">
                                                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                        </div>
                                                        <div class="col-lg-8 ">
                                                            <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title  , 0 ,60) }} ...</h5>
                                                            <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body), 0 , 300) !!} ...</span>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-pane fade {{ $cat_id == 2 ? 'show active' : '' }}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <h4 class="mt-4 mb-4">{{ __('all.siteName') }}၏ သတင်းထူးများ</h4>
                                        <div class="row ">
                                            @foreach ($hotnews->take(2) as $breakingnew)
                                            <div class="col-lg-6 mt-2 p-0 p-lg-2">
                                                <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                <div class="card shadow-md p-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                    </div>
                                                    <div style="height : 15rem" class="p-0 mt-lg-2 mt-4">
                                                        <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title  , 0 ,60) }} ...</h5>
                                                        <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body), 0 , 200) !!} ...</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            @endforeach
                                            
                                            @foreach ($hotnews->skip(2) as $breakingnew)
                                                <div class="mt-2 p-0 p-lg-2">
                                                    <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                    <div class="card p-2 shadow-md">
                                                        <div class="row">
                                                            <div class="col-lg-4 d-flex justify-content-center">
                                                                <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                            </div>
                                                            <div class="col-lg-8 ">
                                                                <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title  , 0 ,60) }} ...</h5>
                                                                <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body), 0 , 300) !!} ...</span>

                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="tab-pane fade" {{ $cat_id == 3 ? 'show active' : '' }} id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <h4 class="mt-4 mb-4">{{ __('all.siteName') }}၏ နောက်ဆုံးရသတင်းများ</h4>
                                    <div class="row ">
                                        @foreach ($latestnews->take(2) as $breakingnew)
                                        <div class="col-lg-6 mt-2 p-0 p-lg-2">
                                            <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                            <div class="card shadow-md p-2">
                                                <div class="d-flex justify-content-center">
                                                    <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                  </div>
                                                  <div style="height : 15rem" class="p-0 mt-lg-2 mt-4">
                                                    <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title  , 0 ,60) }} ...</h5>
                                                    <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body), 0 , 200) !!} ...</span>
                                                  </div>
                                                  <div class="card-footer">
                                                    <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        @endforeach
                                        
                                        @foreach ($hotnews->skip(2) as $breakingnew)
                                            <div class="mt-2 p-0 p-lg-2">
                                                <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                <div class="card p-2 shadow-md">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex justify-content-center">
                                                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                        </div>
                                                        <div class="col-lg-8 ">
                                                            <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title  , 0 ,60) }} ...</h5>
                                                            <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body), 0 , 300) !!} ...</span>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                              </div>
                        </div>
                    @else
                         {{-- @if ($cat_id == '1')
                        <h4>{{ __('all.siteName') }}၏ ကြားဖြတ်သတင်းများ</h4>
                     @elseif ($cat_id == '1')   
                         <h4>{{ __('all.siteName') }}၏ သတင်းထူးများ</h4>
                     @else
                          <h4>{{ __('all.siteName') }}၏ နောက်ဆုံးရသတင်းများ</h4>
                    @endif --}}

                        <div class="mt-2">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <button class="nav-link {{ $cat_id == 1 ? 'active' : '' }}" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Breaking News</button>
                                  <button class="nav-link {{ $cat_id == 2 ? 'active' : '' }}" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hot News</button>
                                  <button class="nav-link {{ $cat_id == 3 ? 'active' : '' }}" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Latest News</button>
                                </div>
                              </nav>


                              <div class="tab-content p-0" id="nav-tabContent">
                                    {{-- @if ($cat_id == '1')
                                        <h4 class="mt-4 mb-3">{{ __('all.siteName') }}၏ ကြားဖြတ်သတင်းများ</h4>
                                    @elseif ($cat_id == '1')   
                                        <h4 class="mt-4 mb-3">{{ __('all.siteName') }}၏ သတင်းထူးများ</h4>
                                    @else
                                        <h4 class="mt-4 mb-3">{{ __('all.siteName') }}၏ နောက်ဆုံးရသတင်းများ</h4>
                                    @endif --}}

                                <div class="tab-pane  fade {{ $cat_id == 1 ? 'show active' : '' }} p-0" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <h4 class="mt-4 mb-4">{{ __('all.siteName') }}'s Breaking News</h4>
                                    <div class="row ">
                                        @foreach ($breakingnews->take(2) as $breakingnew)
                                        <div class="col-lg-6 mt-2 p-0 p-lg-2">
                                            <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                            <div class="card shadow-md p-2">
                                                <div class="d-flex justify-content-center">
                                                    <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                  </div>
                                                  <div style="height : 15rem" class="p-0 mt-lg-2 mt-4">
                                                    <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title_en  , 0 ,60) }} ...</h5>
                                                    <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body_en), 0 , 200) !!} ...</span>
                                                  </div>
                                                  <div class="card-footer">
                                                    <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        @endforeach
                                        
                                        @foreach ($breakingnews->skip(2) as $breakingnew)
                                            <div class="mt-2 p-0 p-lg-2">
                                                <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                <div class="card p-2 shadow-md">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex justify-content-center">
                                                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                        </div>
                                                        <div class="col-lg-8 ">
                                                            <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title_en  , 0 ,60) }} ...</h5>
                                                            <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body_en), 0 , 300) !!} ...</span>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="tab-pane fade {{ $cat_id == 2 ? 'show active' : '' }}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <h4 class="mt-4 mb-4">{{ __('all.siteName') }}'s Hot News</h4>
                                        <div class="row ">
                                            @foreach ($hotnews->take(2) as $breakingnew)
                                            <div class="col-lg-6 mt-2 p-0 p-lg-2">
                                                <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                <div class="card shadow-md p-2">
                                                    <div class="d-flex justify-content-center">
                                                        <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                    </div>
                                                    <div style="height : 15rem" class="p-0 mt-lg-2 mt-4">
                                                        <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->titl_en  , 0 ,60) }} ...</h5>
                                                        <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body_en), 0 , 200) !!} ...</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            @endforeach
                                            
                                            @foreach ($hotnews->skip(2) as $breakingnew)
                                                <div class="mt-2 p-0 p-lg-2">
                                                    <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                    <div class="card p-2 shadow-md">
                                                        <div class="row">
                                                            <div class="col-lg-4 d-flex justify-content-center">
                                                                <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                            </div>
                                                            <div class="col-lg-8 ">
                                                                <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title_en  , 0 ,60) }} ...</h5>
                                                                <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body_en), 0 , 300) !!} ...</span>

                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="tab-pane fade" {{ $cat_id == 3 ? 'show active' : '' }} id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <h4 class="mt-4 mb-4">{{ __('all.siteName') }}'s Latest News</h4>
                                    <div class="row ">
                                        @foreach ($latestnews->take(2) as $breakingnew)
                                        <div class="col-lg-6 mt-2 p-0 p-lg-2">
                                            <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                            <div class="card shadow-md p-2">
                                                <div class="d-flex justify-content-center">
                                                    <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                  </div>
                                                  <div style="height : 15rem" class="p-0 mt-lg-2 mt-4">
                                                    <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title_en  , 0 ,60) }} ...</h5>
                                                    <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body_en), 0 , 200) !!} ...</span>
                                                  </div>
                                                  <div class="card-footer">
                                                    <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        @endforeach
                                        
                                        @foreach ($hotnews->skip(2) as $breakingnew)
                                            <div class="mt-2 p-0 p-lg-2">
                                                <a href="{{ route('app.model.frontend.detail' , ['model' => 'News' , 'view' => 'frontend.news.news_detail' , 'id' => $breakingnew->id]) }}">
                                                <div class="card p-2 shadow-md">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex justify-content-center">
                                                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$breakingnew->image) }}">
                                                        </div>
                                                        <div class="col-lg-8 ">
                                                            <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($breakingnew->title_en  , 0 ,60) }} ...</h5>
                                                            <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($breakingnew->body_en), 0 , 300) !!} ...</span>

                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($breakingnew->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                              </div>
                        </div>
                    @endif

                    {{-- <div class="card-footer">
                        
                    </div> --}}
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

 {{-- @include('frontend.layout.footer') --}}
</div>

    <script>
        
    </script>
    
</x-frontend-layout>
