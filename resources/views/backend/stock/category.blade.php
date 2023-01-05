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
                                          <h5 class="mb-0">All Categories <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="float-end btn btn-danger btn-sm"> Add New Category <i  class="fas fa-plus-circle ml-2"></i></button></h5>
                                          {{-- <p  data-bs-toggle="modal" data-bs-target="#addUser" class="d-inline btn btn-danger text-white float-end btn-sm">Add Users<i class="fa-solid fa-plus-circle ml-2"></i></p> --}}
                                        </div>
                                        
                                      </div>
                                    </div>
                                    
                                    <div class="card-body p-0">
                                        <div class="table-responsive mt-3">
                                       
                                            <table class="table  table-striped">
                                                <thead>
                                                    <th class="text-center">Category Name</th>
                                                    <th class="text-center">Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td class="text-center">{{ $category->name_en }}</td>
                                                            <td class="text-center">
                                                                <span onclick="edit('{{ $category->name }}' , '{{ $category->name_en }}'  ,'{{ $category->id }}')"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></span>
                                                                <a onclick="removeItem('{{ $category->id }}' , 'Category' , 'no')"><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
            
                                            @if (count($categories) <= 0)
                                            <p class="text-center text-danger">No data available</p>
                                          @endif
                                        <div class="">
                                            {{ $categories->links() }}
            
                                        </div>
                                        </div>
                                    </div>
                                  </div>
                                
                               
                            
                            
                            <!-- Modal -->
                            <form method="POST" action="{{ route('category.store') }}">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h5 for="exampleFormControlInput1" class="mb-3">Category Name (English)<span class="text-danger">*</span></h5>
                                                <input type="text" required  class="form-control" id="category_name_en" placeholder="Category Name" name="category_name_en">
                                                <input type="hidden"  class="form-control" id="category_id" placeholder="Role Name" name="category_id">
                                              </div>
                                            <div class="mb-3">
                                                <h5 for="exampleFormControlInput1" class="mb-3">Category Name (Myanmar)<span class="text-danger">*</span></h5>
                                                <input type="text" required class="form-control" id="category_name" placeholder="Category Name" name="category_name">
                                              </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
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

        function edit(category_name , category_name_en, category_id){
            $('#exampleModal').modal('show');
            $('#category_name').val(category_name);
            $('#category_name_en').val(category_name_en);
            $('#category_id').val(category_id);
        }

        function removeItem(id , model , default_model){
            var cc = confirm('Are you sure to delete ?');
            if(cc){
              window.location = '{{ url("/app/delete") }}' +'/'+model+'/'+id+'/'+default_model
            }
          }
    </script>
{{-- content end --}}
    @endsection
</x-backend-layout>
