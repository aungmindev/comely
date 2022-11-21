<x-frontend-layout>
    <x-slot name="header">
        @include('frontend.layout.header')
    </x-slot>

    <div id="app" class="">
        <div class="outline_bar container mt-lg-2 mb-3">
          <h4 class="mt-4 mb-4 text-center border-bottom p-3">{{ __('all.siteName') }} {{ __('menu.About') }}</h4>
          
          @foreach ($activities as $activity)
          @if(session()->get('locale') == 'mm')
            <div class="mt-2 p-0 p-lg-2 col-lg-9">
                <a href="{{ route('app.model.frontend.detail' , ['model' => 'Activity' , 'view' => 'frontend.activites.detail' , 'id' => $activity->id]) }}">
                <div class="card p-2 shadow-md">
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center">
                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/reports/image/'.$activity->image) }}">
                        </div>
                        <div class="col-lg-8 ">
                            <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($activity->title  , 0 ,60) }} ...</h5>
                            <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($activity->description), 0 , 300) !!} ...</span>

                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($activity->created_at)) }}</span>
                    </div>
                </div>
                </a>
            </div>
            @else
            <div class="mt-2 p-0 p-lg-2 col-lg-9">
                <a href="{{ route('app.model.frontend.detail' , ['model' => 'Activity' , 'view' => 'frontend.activites.detail' , 'id' => $activity->id]) }}">
                <div class="card p-2 shadow-md">
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-center">
                            <img id="image" class=" img-thumbnail img-fluid border-0" src="{{ asset('uploads/reports/image/'.$activity->image) }}">
                        </div>
                        <div class="col-lg-8 ">
                            <h5 id="news_title" class="mt-2 font-weight-bold"> {{ mb_substr($activity->title_en  , 0 ,50) }}... </h5>
                            <span class="mt-3 d-inline-block text-start text-muted">{!! mb_substr(trim($activity->description_en), 0 , 300) !!} ...</span>

                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-end" style='font-family: Arial;font-size : 15px'>{{ date('M d , Y' , strtotime($activity->created_at)) }}</span>
                    </div>
                </div>
                </a>
            </div>
            @endif
        @endforeach
            
        <div>
            @if (count($activities) <= 0)
              <p class="text-danger text-center">No Data Available</p>
            @endif
        </div>
        </div>

 @include('frontend.layout.footer')
</div>
  @section('script')
    <script>
          
    </script>
    @endsection
</x-frontend-layout>
