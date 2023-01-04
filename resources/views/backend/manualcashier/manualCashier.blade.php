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
                <div class="px-xl-4 mx-xl-n6 pt-1">
    
                    <div class="col-12 col-xl-12">
                      <div class="mb-5 mt-7 ">
                            <h4 class="mb-3">Manual Cashier</h4>

                       <div class="card">
                        <manual-cashier></manual-cashier>

                       </div>
                        
                      </div>
                     
                    </div>
                    <div class="col-12 col-xl-6">
                      
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

        function edit(brand_name , brand_name_en, brand_id){
            $('#exampleModal').modal('show');
            $('#brand_name').val(brand_name);
            $('#brand_name_en').val(brand_name_en);
            $('#brand_id').val(brand_id);
        }
    </script>
{{-- content end --}}
    @endsection
</x-backend-layout>
