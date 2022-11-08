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
                            <h4 id="tiile">Roles<p data-bs-toggle="modal" data-bs-target="#exampleModal" class="d-inline btn btn-danger text-white float-end btn-sm">Add Roles<i class="fa-solid fa-plus-circle ml-2"></i></p></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px"></div>
                            
                            <div class="table-responsive mt-3">
                               
                                <table class="table  table-bordered">
                                    <thead>
                                        <th class="text-center">Role Name</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td class="text-center">{{ $role->name }}</td>
                                                <td class="text-center">
                                                    <span onclick="edit('{{ $role->name }}' , '{{ $role->id }}')"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></span>
                                                    <a href="{{ route('app.model.delete' , ['model' => 'Spatie\Permission\Models\Role' , 'id' => $role->id , 'default' => 'default']) }}"><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                                @if (count($roles) <= 0)
                                <span class="text-center">No data available</span>
                              @endif
                            <div class="bg-light shadow-sm p-2">
                                {{ $roles->links() }}

                            </div>
                            </div>
                        </div>



  
                        <!-- Modal -->
                        <form method="POST" action="{{ route('role.store') }}">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Role Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="rolename" placeholder="Role Name" name="role_name">
                                            <input type="hidden"  class="form-control" id="role_id" placeholder="Role Name" name="role_id">
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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

            function edit(role_name , role_id){
                $('#exampleModal').modal('show');
                $('#rolename').val(role_name);
                $('#role_id').val(role_id);
            }
        </script>
</x-backend-layout>
