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
            <div class="px-xl-4 mx-lg-n6 px-xl-6  pt-xl-7 ">

                <div class="col-12 col-xl-12">
                  <div class=" mt-7">

                    <div class="alert shadow-xs ">
                      <h3 class="mb-xl-0 mt-xl-0 mb-4 mt-3">Products lists 
                      </h3>
                      <a href="{{ route('products.create') }}"><button class="btn btn-phoenix-primary float-right d-inline-block" type="button">Add New Products <i class="fas fa-arrow-right ml-2"></i></button></a>

                    </div>

                    @if(Session::has('success'))
                   

                      <div class="alert alert-outline-success d-flex align-items-center mt-3 border-0" role="alert">
                        <span class="fas fa-check-circle text-success fs-3 me-3"></span>
                        <p class="mb-0 flex-1">{{ Session::get('success')}}</p>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    {{-- <p class="text-700">Where you generated most of the revenue</p> --}}
                  </div>
                  <div class="scrollbar" >
                    <div class="table-responsive  card-body card">
                        <table class="table fs--0" id="products">
                            <thead>
                              <tr>
                                <th class="border-top border-200 ps-0 align-middle" scope="col" >Item Code</th>
                                <th class="border-top border-200 align-middle" scope="col" >Name</th>
                                <th class="border-top border-200 align-middle" scope="col" >Price</th>
                                <th class="border-top border-200 align-middle" scope="col" >Stock</th>
                                <th class="border-top border-200 align-middle" scope="col" >Brand</th>
                                <th class="border-top border-200 align-middle" scope="col" >Category</th>
                                <th class="border-top border-200 align-middle" scope="col" >Action</th>
                              </tr>
                            </thead>
                            
                          </table>
                    </div>
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
                
                if('{{ $errors->any() }}'){
                    if('{{ $errors->first("modal") }}' == 'Add Session fail'){
                        $('#addSession').modal('show');
                    }else{
                        $('#edit_btn').click();

                    }
                    
                }
            }

        $(function () {
                var table = $("#products").DataTable({
                processing: true,
                serverSide: true,
                language: {
                    processing:
                    '<i class="text-primary fa fa-spinner fa-spin fa-1x fa-fw mr-2"></i> <span class="text-primary">Processing</span>',
                },
                ajax: {
                    url: "/products/get",
                    type: "post",
                    data: {
                    _token: document.head.querySelector('meta[name="csrf-token"]').content,
                    },
                },

                columns: [
                    { data: "item_code", name: "item_code" },
                    { data: "name", name: "name" },
                    { data: "after_discount_price", name: "after_discount_price" },
                    { data: "stock", name: "stock" },
                    { data: "brand_id", name: "brand_id" },
                    { data: "category_id", name: "category_id" },
                    { data: "action", name: "action" },
                ],

                "order": [[0, "desc" ]]
                });
            });

            
    </script>
@endsection
</x-backend-layout>
