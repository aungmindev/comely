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
                                <div class="alert alert-outline-success alert-dismissible fade show border-0" role="alert">
                                    <strong>{{ Session::get('success')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
    
                                <div class="card shadow-sm h-lg-100 overflow-hidden" >
                                    <div class="card-header p-3 bg-light">
                                      <div class="row align-items-center">
                                        <div class="col">
                                          <h5 class="">All Boxes <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="float-end btn btn-danger btn-sm"> Back to Box Lists <i  class="fas fa-plus-circle ml-2"></i></button></h5>
                                          {{-- <p  data-bs-toggle="modal" data-bs-target="#addUser" class="d-inline btn btn-danger text-white float-end btn-sm">Add Users<i class="fa-solid fa-plus-circle ml-2"></i></p> --}}
                                        </div>
                                        
                                      </div>
                                    </div>
                                    
                                    <div class="card-body p-0">
                                        <div class="table-responsive mt-3">
                                       
                                            <table class="table table-striped fs--0">
                                                <thead>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($boxes as $box)
                                                        <tr>
                                                            <td class="text-center">{{ $box->name }}</td>
                                                            <td class="text-center">{{ $box->price }}</td>
                                                            <td class="text-center">{{ $box->description }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ route('boxOption.edit' , ['id' => $box->id]) }}"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
                                                                <a href=""><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
            
                                            @if (count($boxes) <= 0)
                                            <p class="text-center text-danger">No data available</p>
                                          @endif
                                        <div class="">
                                            {{ $boxes->links() }}
            
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                
                               
                            
                            
                            <!-- Modal -->
                            <form method="POST" action="{{ route('boxOption.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        @if ($errors->any())
                                                @foreach ($errors->all() as $error)
                                                <div class="alert alert-danger alert-dismissible fade show rounded-0 rounded-top" role="alert">
                                                    <strong>{{ $error }}</strong> 
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                                @endforeach
                                            @endif
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Box Option</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="mb-3">
                                                        <h5 for="exampleFormControlInput1" class="mb-3">Box Name ( Myanmar ) <span class="text-danger">*</span></h5>
                                                        <input type="text" required  class="form-control"  placeholder="Box Name" name="name">
                                                      </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="mb-3">
                                                        <h5 for="exampleFormControlInput1" class="mb-3">Box Name ( English ) <span class="text-danger">*</span></h5>
                                                        <input type="text" required  class="form-control"  placeholder="Box Name" name="name_en">
                                                      </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <h5 for="exampleFormControlInput1" class="mb-3">Price <span class="text-danger">*</span></h5>
                                                <input type="text" required  class="form-control" placeholder="Price" name="price">
                                            </div>

                                            <image-upload :required-status="0"></image-upload>

                                            <div class="row mb-3">
                                                <div class="col-lg-6 mb-3">
                                                    <h5 for="exampleFormControlInput1" class="mb-3">Description (Myanmar)</h5>
                                                    <textarea class="form-control"  rows="5" name="description"></textarea>
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5 for="exampleFormControlInput1" class="mb-3">Description (English)</h5>
                                                    <textarea class="form-control"  rows="5" name="description_en"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                            
    
    
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
                $('#exampleModal').modal('show');

            }
        }

        function edit(data){
            
            $('#edit').modal('show');
            var data = JSON.parse(data)
            localStorage.setItem('Boximage' , data.id)
            localStorage.setItem('Boximage_column' , 'box_id')
            $('#box_id').val(data.id)
            $('#name').val(data.name)
            $('#name_en').val(data.name_en)
            $('#price').val(data.price)
            $('#description').val(data.description)
            $('#description_en').val(data.description_en)
        }
    </script>
{{-- content end --}}
    @endsection
</x-backend-layout>
