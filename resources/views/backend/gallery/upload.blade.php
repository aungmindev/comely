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
                            <h4 id="tiile">Upload Gallery <a href="{{ url()->previous() }}"  class="text-white d-inline btn btn-danger float-end btn-sm"><i class="fa-solid fa-arrow-left-long"></i> Back to Gallery</a></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px"></div>
                            <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class=" rounded container">
                                    <div class="card-body ">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $error }}</strong> 
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            @endforeach
                                        @endif
                                        
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                              <button class="nav-link active font-weight-bold" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Upload Image</button>
                                              <button class="nav-link font-weight-bold" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Upload Videos</button>
                                            </div>
                                          </nav>
                                          <div class="tab-content card mt-4  p-4 shadow" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                
                                                  <div class="mb-3">
                                                      <label for="formFile" class="form-label">Image <span class="text-danger">*</span></label>
                                                      <input class="form-control" type="file" id="image" name="image">
                                                  </div>

                                                  <div class="mb-3">
                                                     <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label">Description (Myanmar)<span class="text-danger">*</span></label>
                                                              <textarea name="image_description" class="form-control"  rows="3"></textarea>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label">Description (English) <span class="text-danger">*</span></label>
                                                              <textarea name="image_description_en" class="form-control"  rows="3"></textarea>
                                                        </div>
                                                     </div>
                                                  </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Video link <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" id="video" name="video" >
                                                </div>

                                                <div class="mb-3">
                                                  <div class="row">
                                                        <div class="col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label">Description (Myanmar)<span class="text-danger">*</span></label>
                                                            <textarea name="video_description" class="form-control"  rows="3"></textarea>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="exampleInputEmail1" class="form-label">Description (English)<span class="text-danger">*</span></label>
                                                            <textarea name="video_description_en" class="form-control"  rows="3"></textarea>
                                                        </div>
                                                  </div>
                                                </div>
                                            </div>
                                          </div>
                                          
                                            
                                    </div>
        
                                    <div class="card-footer ">
                                        <span class="text-danger">You can upload image and video at once.</span>
                                            <button class="float-end btn btn-warning btn-sm">Submit<i class="fa-solid fa-cloud-arrow-up ml-2"></i></button>
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
