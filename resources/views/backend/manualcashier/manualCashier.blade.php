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
                               <h4 class="mb-3">Manual Cashier</h4>
    
                                <div class="card shadow-sm h-lg-100 overflow-hidden" >
                                  <manual-cashier></manual-cashier>

                                  </div>

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
