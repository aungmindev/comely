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
                            <h4 id="tiile">Upload News <a href="{{ url()->previous() }}"  class="text-white d-inline btn btn-danger float-end btn-sm"><i class="fa-solid fa-arrow-left-long"></i> Back to News</a></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px ; position : relative ; bottom : 5px"></div>
                            <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="shadow   p-2 border rounded container">
                                    <div class="card-body ">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $error }}</strong> 
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            @endforeach
                                        @endif
                                        
                                            
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="exampleInputEmail1" class="form-label">Title (Myanmar)</label>
                                                        <input type="text" required class="form-control" id="title" name="title" >
                                                        <input type="hidden" value="{{ $cat_id }}" class="form-control" id="title" name="cat_id" >
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="exampleInputEmail1" class="form-label">Title (English)</label>
                                                        <input type="text" required class="form-control" id="title" name="title_en" >
                                                    </div>
                                                </div>
                                              
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Image</label>
                                                <input class="form-control" type="file" id="image" name="image" required>
                                            </div>

                                            <div class="mb-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlTextarea1" class="form-label">News Body (Myanmar)</label>
                                                            <textarea id="editor"  class="form-control" id="exampleFormControlTextarea1"  name="body"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlTextarea1" class="form-label">News Body (English)</label>
                                                            <textarea id="editor"  class="form-control" id="exampleFormControlTextarea1"  name="body_en"></textarea>
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                    </div>
        
                                    <div class="card-footer">
                                        <span style='font-family: Arial;font-size : 15px'>Oct 25 , 2022</span>
                                        <button class="btn btn-warning float-end btn-sm m-0 ">Submit<i class="fa-solid fa-cloud-arrow-up ml-2"></i></button>
                                    </div>
                                </div>     
                                    
                            </form>
                            
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
