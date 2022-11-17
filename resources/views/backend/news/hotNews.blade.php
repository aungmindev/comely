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
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('success')}}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif
                        
                        <div class="card p-3">
                            <h4 id="tiile">Hot News <a href="{{ route('news.upload' , ['cat_id' => 2]) }}" class="d-inline btn btn-danger text-white float-end btn-sm">Upload News <i class="fa-solid fa-cloud-arrow-up"></i></a></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px ; position : relative ; bottom : 5px"></div>
                            
                            <div  style="max-height : 100vh ;  overflow-y: scroll">
                                @foreach ($hotNews as $hotNew)
                                <div class="shadow-md p-2 border rounded">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="col-lg-12 d-flex justify-content-center">
                                                    <img id="image" class="img-thumbnail img-fluid border-0" src="{{ asset('uploads/news/breaking/'.$hotNew->image) }}">
                                                  </div>
                                            </div>
                                            <div class="col-md-9 pt-3">
                                                <h5>{{ $hotNew->title }}</h5>
                                                <p>{!! mb_substr($hotNew->body , 0 , 1000) !!}</p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <span style='font-family: Arial;font-size : 15px'>{{ $hotNew->created_at }}</span>
                                            </div>
                                            <div class="col-lg-9 d-flex justify-content-end mt-lg-0 mt-2">
                                                <a href="{{ route('app.model.delete' , ['model' => 'News' , 'id' => $hotNew->id]) }}" class="btn btn-danger text-white float-end btn-sm mr-2">Delete<i class="fa-solid fa-trash ml-1"></i></a>
                                                <a href="{{ route('app.model.edit' , ['model' => 'News' ,'view' => 'backend.news.edit' , 'id' => $hotNew->id]) }}" class="text-white btn btn-warning float-end btn-sm mr-2">Edit<i class="fa-solid fa-edit ml-1"></i></a>
                                                <a href="{{ route('app.model.detail' , ['model' => 'News' ,'view' => 'backend.news.detail' , 'id' => $hotNew->id]) }}" class="text-white btn btn-primary float-end btn-sm mr-2 ">Detail<i class="fa-solid fa-arrow-right-long ml-1"></i></a>
                                            </div>
                                        
                                    
                                    </div>
                                </div> 
                                @endforeach

                                
                                    
                            </div> 
                            @if (count($hotNews) <= 0)
                                <span class="text-center">No data available</span>
                            @endif
                            <div class="bg-light shadow-sm p-2">
                                {{ $hotNews->links() }}

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
