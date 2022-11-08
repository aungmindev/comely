<x-backend-layout>
 

    <div id="app">
        <div id="wrapper">

           @include('backend.layout.sidebar')
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
                    @include('backend.layout.toolbar')
                    <div class="container-fluid" >
                        <div class="card p-3">
                            <h4 id="tiile">Deatil News <a href="{{ url()->previous() }}" class="text-white d-inline btn btn-danger float-end btn-sm"><i class="fa-solid fa-arrow-left-long"></i> Back to News</a></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px ; position : relative ; bottom : 5px"></div>
                            
                                <div class="card-body  container">
                                    <div class="d-flex justify-content-center">
                                        <div class="col-lg-9 d-flex justify-content-center">
                                            <img id="detail_image" class="img-card img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$data->image) }}">
                                          </div>
                                    </div>

                                    <h4 class="text-center mt-4">{{ $data->title }}</h4>
                                    <p class="mt-4">{!! $data->body !!}</p>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
    

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    
        <!-- Logout Modal-->
        
    </div>
</x-backend-layout>
