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
                      <h3 class="mb-xl-0 mt-xl-0">Sale History
                      </h3>
                      {{-- <a href="{{ route('products.create') }}"><button class="btn btn-phoenix-primary float-right d-inline-block" type="button">Add New Products <i class="fas fa-arrow-right ml-2"></i></button></a> --}}

                    </div>
                    
                    <div class="">
                        <div class="row">
                            <div class="col-xl-2 mb-2">
                              <label>From</label>
                              <input type="date" class="form-control" id="start_date">
                            </div>
                            <div class="col-xl-2 mb-3">
                              <label>To</label>
                              <input type="date" class="form-control" id="end_date">
                            </div>
                            
                            <div class="col-xl-2 mb-3">
                              <label></label>
                              <button class="btn btn-primary mt-xl-4" onclick="filter()">Search</button>
                            </div>
                        </div>
                    </div>
                    
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
                                <th class="border-top border-200 align-middle" scope="col" >Brand</th>
                                <th class="border-top border-200 align-middle" scope="col" >Category</th>
                                <th class="border-top border-200 align-middle" scope="col" >Sale Quantity</th>
                                <th class="border-top border-200 align-middle" scope="col" >Date</th>
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

        function dataTable(start_date = null , end_date = null ){
          var table = $("#products").DataTable({
                processing: true,
                serverSide: true,
                language: {
                    processing:
                    '<i class="text-primary fa fa-spinner fa-spin fa-1x fa-fw mr-2"></i> <span class="text-primary">Processing</span>',
                },
                ajax: {
                    url: "/sale/history/get",
                    type: "post",
                    data: {
                    _token: document.head.querySelector('meta[name="csrf-token"]').content,
                      start_date , end_date
                    },
                },

                columns: [
                    { data: "item_code", name: "item_code" },
                    { data: "product_name", name: "product_name" },
                    { data: "price", name: "price" },
                    { data: "brand", name: "brand" },
                    { data: "category", name: "category" },
                    { data: "saled_qty", name: "saled_qty" },
                    { data: "created_at", name: "created_at" },
                ],

                "order": [[0, "desc" ]]
                });
        }

        dataTable()
        function filter(){
                let start_date  = $('#start_date').val();
                let end_date    = $('#end_date').val();
                if(start_date != '' && end_date != ''){
                  $("#products").dataTable().fnDestroy();
                  dataTable(start_date , end_date )
                }
               
                
        }
            
    </script>
@endsection
</x-backend-layout>
