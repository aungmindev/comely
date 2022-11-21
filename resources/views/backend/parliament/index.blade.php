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
                            <h4 id="tiile">Parliament Times<p data-bs-toggle="modal" data-bs-target="#exampleModal" class="d-inline btn btn-danger text-white float-end btn-sm">Add Parliament Times<i class="fa-solid fa-plus-circle ml-2"></i></p></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px"></div>
                            
                            <div class="table-responsive mt-3">
                               
                                <table class="table  table-bordered">
                                    <thead>
                                        <th class="text-center">Parliament time Name</th>
                                        <th class="text-center">Parliament time Name (EN)</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($ptimes as $ptime)
                                            <tr>
                                                <td class="text-center">{{ $ptime->name }}</td>
                                                <td class="text-center">{{ $ptime->name_en }}</td>
                                                <td class="text-center">
                                                    <span onclick="edit('{{ $ptime->name  }}' ,'{{ $ptime->name_en  }}', '{{ $ptime->id }}')"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></span>
                                                    {{-- <a href="{{ route('app.model.delete' , ['model' => 'Parliament' , 'id' => $ptime->id , 'default' => '']) }}"><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                                @if (count($ptimes) <= 0)
                                <p class="text-center">No data available</p>
                              @endif
                            
                            </div>
                        </div>

                        <div class="card p-3 mt-5">
                            <h4 id="tiile">Parliament Session Times<p data-bs-toggle="modal" data-bs-target="#psessiontimes" class="d-inline btn btn-danger text-white float-end btn-sm">Add Parliament Session Times<i class="fa-solid fa-plus-circle ml-2"></i></p></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px"></div>
                            
                            <div class="table-responsive mt-3">
                               
                                <table class="table  table-bordered">
                                    <thead>
                                        <th class="text-center">Session time Name</th>
                                        <th class="text-center">Session time Name (EN)</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($psession_times as $psession_time)
                                            <tr>
                                                <td class="text-center">{{ $psession_time->name }}</td>
                                                <td class="text-center">{{ $psession_time->name_en }}</td>
                                                <td class="text-center">
                                                    <span onclick="psession_edit('{{ $psession_time->name  }}' ,'{{ $psession_time->name_en  }}', '{{ $psession_time->id }}')"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></span>
                                                    {{-- <a href="{{ route('app.model.delete' , ['model' => 'Sessiontime' , 'id' => $psession_time->id , 'default' => '']) }}"><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                                @if (count($psession_times) <= 0)
                                <p class="text-center">No data available</p>
                              @endif
                            
                              <div class="bg-light shadow-sm p-2">
                                {{ $psession_times->links() }}

                            </div>
                            </div>
                        </div>



  
                        <!-- Modal -->
                        <form method="POST" action="{{ route('parliament.times.create') }}">
                            @csrf
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show rounded-0 rounded-top" role="alert">
                                                <strong>{{ $error }}</strong> 
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            @endforeach
                                        @endif
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Parliament Times</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name (Myanmar)<span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="ptimes_name" placeholder="Name" name="Name_myanmar">
                                            <input type="hidden"  class="form-control" id="ptimes_id" placeholder="Role Name" name="ptimes_id">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name (English)<span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="ptimes_name_en" placeholder="Name" name="Name_english">
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('parliament.session.times.create') }}">
                            @csrf
                            <div class="modal fade" id="psessiontimes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible fade show rounded-0 rounded-top" role="alert">
                                                <strong>{{ $error }}</strong> 
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            @endforeach
                                        @endif
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Parliament Session Times</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name (Myanmar)<span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="psessiontimes_name" placeholder="Name" name="Name_myanmar">
                                            <input type="hidden"  class="form-control" id="psessiontimes_id" placeholder="Role Name" name="ptimes_id">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Name (English)<span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="psessiontimes_name_en" placeholder="Name" name="Name_english">
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
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

        <script type="text/javascript">
            window.onload = () => {
                
                if('{{ $errors->any() }}'){
                    $('#exampleModal').modal('show');

                }
            }

            function edit(ptimes_name , ptimes_name_en , ptimes_id){
                $('#exampleModal').modal('show');
                $('#ptimes_name').val(ptimes_name);
                $('#ptimes_name_en').val(ptimes_name_en);
                $('#ptimes_id').val(ptimes_id);
            }
            function psession_edit(ptimes_name , ptimes_name_en , ptimes_id){
                $('#psessiontimes').modal('show');
                $('#psessiontimes_name').val(ptimes_name);
                $('#psessiontimes_name_en').val(ptimes_name_en);
                $('#psessiontimes_id').val(ptimes_id);
            }
        </script>
</x-backend-layout>
