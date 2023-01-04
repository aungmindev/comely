<x-backend-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <main class="main" id="app">


      <div class="container-fluid px-0" data-layout="container">
        
       @include('backend.layout.sidebar')
       

      
        <div class="content pt-0">
            <div class="px-xl-4 mx-xl-n6   pt-7 ">

                <div class="col-12 col-xl-12">
                  <div class="mb-5 mt-7 ">
                   
                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-outline-danger alert-dismissible fade show rounded-0 rounded-top border-0" role="alert">
                                            <strong>{{ $error }}</strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        @endforeach
                                    @endif
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="offset-xl-2 col-xl-8 pt-7 pt-xl-3">
                            
                              
                            <div class="alert shadow-xs " role="alert">
                                <h4 class="" >Create New Product<hr>
                                <a  href="{{ route('products.index') }}"><button class="btn btn-sm btn-phoenix-primary mt-xl-0 mt-4 float-right" type="button"><i class="fas fa-arrow-left mr-2"></i>Back to product lists</button></a>
                              </h4>
                            </div>

                            <div class="card p-0 m-0 border-0  shadow-sm">
                                <div class="card-body">
                                    <div class="row mb-6">
                                        <div class="col-xl-6 mt-3">
                                            <h5  id="title" class="mb-3"> Product Name ( English ) <span class="text-danger">*</span></h5>
                                            <input class="form-control" name="name" required value="{{ old('name') }}">
                                        </div>
                                        <div class="col-xl-6 mt-3">
                                            <h5 class="mb-3"> Product Name ( Myanmar ) <span class="text-danger">*</span></h5>
                                            <input class="form-control" name="name_en" required>
                                        </div>
                                        
                                    </div>
            
                                    <div class="row mb-6">
                                        <div class="col-xl-12 mt-3">
                                            <h5 class="mb-3">Brand ( English ) <span class="text-danger">*</span></h5>
                                            <select class="form-control" name="brand" required>
                                                <option value="">Choose Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}" value="{{ old('brand') == $brand->id ? 'selected' : '' }}">{{ $brand->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                        
                                        
                                    </div>
                                   
            
                                    <div class="row mb-6">
                                        <div class="col-xl-12 mt-3">
                                            <h5 class="mb-3">Category ( English ) <span class="text-danger">*</span></h5>
                                            <select class="form-control" name="category" required>
                                                <option value="">Choose Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" value="{{ old('category') == $category->id ? 'selected' : '' }}">{{ $category->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        
                                        
                                    </div>
            
                                    <div class="row mb-6">
                                        <h5 class="mb-3">Color ( English ) <span class="text-danger">*</span></h5>
                                         <color-view></color-view>                           
                                    </div>
    
                                    <div class="row mb-6">
                                        <div class="col-xl-4 mt-3">
                                            <h5 class="mb-3">Length<span class="text-danger">*</span></h5>
                                            <input type="string" class="form-control" name="length" required>
                                        </div>
                                        <div class="col-xl-4 mt-3">
                                            <h5 class="mb-3">Width<span class="text-danger">*</span></h5>
                                            <input type="string" class="form-control" name="width" required>
                                        </div>
                                        <div class="col-xl-4 mt-3">
                                            <h5 class="mb-3">Height<span class="text-danger">*</span></h5>
                                            <input type="string" class="form-control" name="height" required>
                                        </div>
                                        
                                        
                                    </div>
    
                                    <div class="row mb-6">
                                        <div class="col-xl-12 mt-3">
                                            <h5 class="mb-3">Stock <span class="text-danger">*</span></h5>
                                            <input type="number" class="form-control" name="stock" required>
                                        </div>
                                        
                                    </div>
    
                                    <price-calculate></price-calculate>
    
    
                                   <image-upload :required-status="1"></image-upload>
    
                                    <div class="row mb-6">
                                        <div class="col-xl-12 mt-3">
                                            <h5 class="mb-3">Box option  <span class="text-danger">*</span></h5>
                                            @foreach ($boxes as $box)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="boxOption[]" required {{ $box->id == 1 ? 'checked' : '' }} type="checkbox" value="{{ $box->id }}" />
                                                <label class="form-check-label" for="inlineCheckbox1">{{ $box->name }}</label>
                                                </div>
                                            @endforeach
                                            
                                            
                                
                                            
                                        </div>
                                
                                        
                                    </div>
                                    
                                    <div class="row mb-6">
                                        
                                        <div class="col-xl-6 mt-3" >
                                            <h5 class="mb-3"> Product Description ( English ) <span class="text-danger">*</span></h5>
                                            <textarea class="tinymce" id="editor" name="description" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>
                                        </div>
                                        <div class="col-xl-6 mt-3">
                                            <h5 class="mb-3"> Product Description ( Myanmar ) <span class="text-danger">*</span></h5>
                                            <textarea class="tinymce" id="editor" name="description_en" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>
                                        </div>
                                        
                                    </div>

                                    <button class="btn btn-secondary me-1 mb-1 float-end" type="submit">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                  </div>
                 
                </div>
                <div class="col-12 col-xl-6">
                  
                </div>
              </div>   
        </div>
     

      


      
        @include('backend.layout.footer')
      </div>
      
    </main>

    @include('layouts.setting')


    @section('script')
    <script>
        window.onload = () => {
                
        }

        $(function () {
                
        });

            
    </script>
@endsection
</x-backend-layout>
