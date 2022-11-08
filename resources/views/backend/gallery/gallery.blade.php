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
                            <h4 id="tiile">Photos / Videos Gallery<a href="{{ route('app.view' , ['view' => 'backend.gallery.upload']) }}" class="d-inline btn btn-danger text-white float-end btn-sm">Upload Photo / Video <i class="fa-solid fa-cloud-arrow-up"></i></a></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px "></div>
                            
                            <div class="table-responsive mt-3">
                               
                                <table class="table table-striped">
                                    <thead>
                                        <th>Image/video</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>
                                                @if ($gallery->is_image == 1)
                                                <img width="150" height="200" src="{{ asset('/uploads/gallery/'.$gallery->image_or_video) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></img>

                                                @else
                                                <iframe width="150" height="100" src="{{ $gallery->image_or_video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                @endif
                                            <td>{{ $gallery->description }}</td>
                                            <td>{{ date('Y-m-d' , strtotime($gallery->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('app.model.edit' , ['model' => 'Gallery' ,'view' => 'backend.gallery.update' , 'id' => $gallery->id]) }}"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
                                                <a href="{{ route('app.model.delete' , ['model' => 'Gallery' , 'id' => $gallery->id]) }}"><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                                @if (count($galleries) <= 0)
                                <span class="text-center">No data available</span>
                            @endif
                            <div class="bg-light shadow-sm p-2">
                                {{ $galleries->links() }}

                            </div>
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
