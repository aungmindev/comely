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
                            <h4 id="tiile">Users<p  data-bs-toggle="modal" data-bs-target="#addUser" class="d-inline btn btn-danger text-white float-end btn-sm">Add Users<i class="fa-solid fa-plus-circle ml-2"></i></p></h4>
                            <div class="bg-danger rounded shadow col-lg-1 col-3" style="width : 5rem ; height:7px"></div>
                            
                            <div class="table-responsive mt-3">
                               
                                <table class="table  table-bordered">
                                    <thead>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Roles</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @foreach ($user->roles->pluck('name') as $role)
                                                         <span class="badge badge-primary ml-2">{{ $role }}</span>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <span id="edit_btn" onclick="edit('{{ json_encode([$user->name , $user->email, $user->id]) }}' , '{{ $user->roles->pluck('name') }}')"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></span>
                                                    {{-- <a href="{{ route('app.model.delete' , ['model' => 'Spatie\Permission\Models\Role' , 'id' => $user->id , 'default' => 'default']) }}"><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                                @if (count($users) <= 0)
                                <span class="text-center">No data available</span>
                              @endif
                            <div class="bg-light shadow-sm p-2">
                                {{ $users->links() }}

                            </div>
                            </div>
                        </div>



  
                        <!-- Modal -->
                        <form method="POST" action="{{ route('users.update') }}">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Edit user information</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label"> Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="name" placeholder="Role Name" name="name">
                                            <input type="hidden"  class="form-control"  id="user_id" placeholder="Role Name" name="user_id">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Email  <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="email" placeholder="Email" name="email">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                                            <input type="text"  class="form-control" id="password" placeholder="Password" name="password">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                                            <input type="text"  class="form-control" id="password" placeholder="Confirm Password" name="password_confirmation">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Select Role<span class="text-danger">*</span></label>
                                            <select class="form-control" id="roles" name="roles">
                                                <option >Selected</option>
                                                @foreach ($roles as $role)
                                                    <option id="{{  $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
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



                        <form method="POST" action="{{ route('users.add') }}">
                            @csrf
                            <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label"> Name <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="name" placeholder="Role Name" name="name">
                                            <input type="hidden"  class="form-control"  id="user_id" placeholder="User Name" name="user_id">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Email  <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" id="email" placeholder="Email" name="email">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                                            <input type="text"  class="form-control" id="password" placeholder="Password" name="password">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                                            <input type="text"  class="form-control" id="password" placeholder="Confirm Password" name="password_confirmation">
                                          </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Select Role<span class="text-danger">*</span></label>
                                            <select class="form-control" id="roles" name="roles">
                                                <option >Selected</option>
                                                @foreach ($roles as $role)
                                                    <option id="{{  $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
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
                    if('{{ $errors->first("modal") }}' == 'Add User fail'){
                        $('#addUser').modal('show');
                    }else{
                        $('#edit_btn').click();

                    }
                    
                }
            }

            function edit(user , role){
                let users = JSON.parse(user)
                let roles = JSON.parse(role)
                console.log(users)
                $('#exampleModal').modal('show');
                $('#name').val(users[0]);
                $('#email').val(users[1]);
                $('#user_id').val(users[2]);
                roles.map((name) => {
                    $("#"+name).attr("selected" , true);
                })
            }
        </script>
</x-backend-layout>
