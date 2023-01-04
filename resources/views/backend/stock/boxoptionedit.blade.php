<x-backend-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <main class="main" id="app">

        <div style="margin-top:4rem">

        </div>
      <div class="container-fluid px-0"  data-layout="container">
        
       @include('backend.layout.sidebar')
    
            <!-- Main Content -->
            <div class="content pt-0">
                {{-- <dashboard-view></dashboard-view> --}}
                
                <div class="px-4 mx-lg-n6 px-lg-6 bg-white pt-7 border-y border-300">
                  <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
                    <div class="row align-items-end justify-content-between pb-5 g-3">
                        <div id="">
                            <div class="container-fluid p-0" >
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('success')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show rounded-0 rounded-top" role="alert">
                                    <strong>{{ $error }}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endforeach
                            @endif
                                <div class="card shadow-sm h-lg-100 overflow-hidden" >
                                    <div class="card-header p-3 bg-light">
                                      <div class="row align-items-center">
                                        <div class="col">
                                          <h5 class="">Edit Box Data <a href="{{ route('boxOption.index') }}"><button  class="float-end btn btn-phoenix-primary btn-sm"> <i  class="fas fa-arrow-left mr-2"></i> Back to Box Lists </button></a></h5>
                                          {{-- <p  data-bs-toggle="modal" data-bs-target="#addUser" class="d-inline btn btn-danger text-white float-end btn-sm">Add Users<i class="fa-solid fa-plus-circle ml-2"></i></p> --}}
                                        </div>
                                        
                                      </div>
                                    </div>
                                    
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('boxOption.store') }}" enctype="multipart/form-data">
                                            @csrf
                                                <div class="">
                                                
                                                   
                                                    
                                                        <div class="row">
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <h5 for="exampleFormControlInput1" class="mb-3">Box Name ( Myanmar ) <span class="text-danger">*</span></h5>
                                                                    <input type="text" required  class="form-control" id="name" value="{{ $data->name }}" placeholder="Box Name" name="name">
                                                                    <input type="hidden"  class="form-control" id="box_id" placeholder="Box Name" name="box_id" value="{{ $data->id }}">
                                                                  </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="mb-3">
                                                                    <h5 for="exampleFormControlInput1" class="mb-3">Box Name ( English ) <span class="text-danger">*</span></h5>
                                                                    <input type="text" required  class="form-control" id="name_en" value="{{ $data->name_en }}" placeholder="Box Name" name="name_en">
                                                                  </div>
                                                            </div>
                                                        </div>
            
                                                        <div class="mb-3">
                                                            <h5 for="exampleFormControlInput1" class="mb-3">Price <span class="text-danger">*</span></h5>
                                                            <input type="text" required  class="form-control" id="price"  value="{{ $data->price }}" placeholder="Price" name="price">
                                                        </div>
            
                                                        <image-upload-edit  :model-name="'Boximage'" :update-id="{{ $data->id }}" :column-name="'box_id'" :required-status="0"></image-upload-edit>
            
                                                        <div class="row mb-3">
                                                            <div class="col-lg-6 mb-3">
                                                                <h5 for="exampleFormControlInput1" class="mb-3">Description (Myanmar)</h5>
                                                                <textarea class="form-control" id="description" rows="5" value="{{ $data->description }}" name="description"></textarea>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <h5 for="exampleFormControlInput1" class="mb-3">Description (English)</h5>
                                                                <textarea class="form-control" id="description_en" rows="5" value="{{ $data->description_en }}" name="description_en"></textarea>
                                                            </div>
                                                        </div>
                                                </div>

                                                <button class="btn btn-primary btn-sm float-end ml-3" type="submit">Save Changes</button>
                                        </form>
                                        <a href="{{ route('boxOption.index') }}"><button  class="float-end btn btn-phoenix-primary btn-sm"> <i  class="fas fa-arrow-left mr-2"></i> Back to Box Lists </button></a>

                                    </div>
                                  </div>
                                
                               
                            
                            
                            <!-- Modal -->
                            
    
    
                            </div>
                        </div>
                    </div>
                    
                  </div>
                </div>
                
              </div>

      
        {{-- @include('backend.layout.footer') --}}
      </div>
      
    </main>
    @section('script')
    <script type="text/javascript">
        window.onload = () => {
            
            if('{{ $errors->any() }}'){
                $('#edit').modal('show');

            }
        }

        
    </script>
{{-- content end --}}
    @endsection
</x-backend-layout>
