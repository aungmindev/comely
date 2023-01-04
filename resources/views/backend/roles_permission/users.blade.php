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
                        <div id="content">
                            <div class="container-fluid p-0" >
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('success')}}</strong> 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                @endif
    
                                <div class="card h-lg-100 overflow-hidden">
                                    <div class="card-header bg-light">
                                      <div class="row align-items-center">
                                        <div class="col">
                                          <h6 class="mb-0">Users <button class="float-end btn btn-danger btn btn-sm" data-bs-toggle="modal" data-bs-target="#addUser"> Add User <i  class="fas fa-plus-circle ml-2"></i></button></h6>
                                          {{-- <p  data-bs-toggle="modal" data-bs-target="#addUser" class="d-inline btn btn-danger text-white float-end btn-sm">Add Users<i class="fa-solid fa-plus-circle ml-2"></i></p> --}}
                                        </div>
                                        
                                      </div>
                                    </div>
                                    <div class="card-body p-0">
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
                                                                <span class="badge badge-phoenix fs--2 badge-phoenix-primary">{{ $role }}</span>
                                                                {{-- <span class="badge text-bg-primary">{{ $role }}</span> --}}
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
                                                    <input type="text"  class="form-control" id="email_email" placeholder="Email" name="email">
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
                                                    <input type="text"  class="form-control"  placeholder="Email" name="email">
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
                    </div>
                    
                  </div>
                </div>
                
                {{-- <div class="mx-n4  mx-lg-n6 px-lg-6 bg-white pt-6 pb-9 mt-2 border-top border-300">
                    <div class="row g-6">
                      <div class="col-12 col-xl-6">
                        <div class="me-xl-4">
                          <div>
                            <h3>Projection vs actual</h3>
                            <p class="mb-1 text-700">Actual earnings vs projected earnings</p>
                          </div>
                          <div class="echart-projection-actual" style="height:300px; width:100%" data-echart-responsive="data-echart-responsive"></div>
                        </div>
                      </div>
                      <div class="col-12 col-xl-6">
                        <div>
                          <h3>Returning customer rate</h3>
                          <p class="mb-1 text-700">Rate of customers returning to your shop over time</p>
                        </div>
                        <div class="echart-returning-customer" style="height:300px;" data-echart-responsive="data-echart-responsive"></div>
                      </div>
                    </div>
                  </div> --}}
              </div>

      
        {{-- @include('backend.layout.footer') --}}
      </div>
      
    </main>
    @section('script')
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
     $('#email_email').val(users[1]);
     $('#user_id').val(users[2]);
     roles.map((name) => {
         $("#"+name).attr("selected" , true);
     })
 }
     </script>
    @endsection
</x-backend-layout>
