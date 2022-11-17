<x-backend-layout>
 

    <div id="app">
        <div id="wrapper">

           @include('backend.layout.sidebar')
    
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
    
                <!-- Main Content -->
                <div id="content">
                    @include('backend.layout.toolbar')
                    <div class="container-fluid mt-3">
                        <h4 id="tiile">Parliament Session<p  data-bs-toggle="modal" data-bs-target="#addSession" class="d-inline btn btn-danger text-white float-end btn-sm">Add Session Data<i class="fa-solid fa-plus-circle ml-2"></i></p></h4>

                        <div class="card p-3 table-responsive">
                          
                  
                          <table class="table table-bordered table-striped table-hover w-100" id="session" >
                            <thead>
                                <tr>
                                    <th>Session Type</th>
                                    <th>Session Data Type</th>
                                    <th>Parliament Times</th>
                                    <th>Session Times</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>PDF</th>
                                    <th>Image</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                    
                                    </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                      </div>

                      <form method="POST" action="{{ route('psession.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="addSession" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                        <label for="exampleFormControlInput1" class="form-label"> Session Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="session_type" id="" required>
                                            <option id="ပုံမှန်အစည်းအဝေး">ပုံမှန်အစည်းအဝေး</option>
                                            <option id="အထူးအစည်းအဝေး">အထူးအစည်းအဝေး</option>
                                            <option id="အရေးပေါ်အစည်းအဝေး">အရေးပေါ်အစည်းအဝေး</option>
                                        </select>
                                        {{-- <input type="hidden"  class="form-control"  id="user_id" placeholder="Role Name" name="user_id"> --}}
                                      </div>
                                    <div class="mb-3">
                                        <label for="session_data_type" class="form-label">Session Data Type  <span class="text-danger">*</span></label>
                                        <select class="form-control" required name="session_data_type" id="">
                                            <option id="အစည်းအဝေးအစီအစဉ်များ">အစည်းအဝေးအစီအစဉ်များ</option>
                                            <option id="အစည်းအဝေးမှတ်တမ်းများ">အစည်းအဝေးမှတ်တမ်းများ</option>
                                        </select>
                                      </div>
                                    <div class="mb-3">
                                        <label for="ptimes" class="form-label">Parliament Times</label>
                                        <select class="form-control" name="ptimes" id="" required>
                                        @foreach ($ptimes as $ptime)
                                            <option value="{{ $ptime->id }}" id="{{ $ptime->name }}">{{ $ptime->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      

                                    <div class="mb-3">
                                            <div class="row">
                                              <div class="col">
                                                <label for="session_time" class="form-label">Session Time (Myanmar)<span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control" placeholder="ပထမပုံမှန်အစည်းအဝေး" name="session_time" id="">
                                              </div>
                                              <div class="col">
                                                <label for="session_time_en" class="form-label">Session Time (English)<span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control" placeholder="First Regular Session" name="session_time_en" id="">
                                              </div>
                                            </div>
                                      </div>

                                      <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                              <label for="session_title" class="form-label">Session Title (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="ပထမနေ့ အစီအစဉ် (သို.) ပထမနေ့ မှတ်တမ်း" name="session_title" id="">
                                            </div>
                                            <div class="col">
                                              <label for="session_title_en" class="form-label">Session Title (English)<span class="text-danger">*</span></label>
                                              <input required type="text" id="" class="form-control" placeholder="First day's plan (or) First day's record" name="session_title_en">
                                            </div>
                                          </div>
                                      </div>
                                    
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date<span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id="" placeholder="Confirm Password" name="date">
                                      </div>
                                      <div class="mb-3">
                                        <label for="pdf" class="form-label">PDF <span class="text-danger">*</span></label>
                                        <input required type="file"  class="form-control" id=""  name="pdf_file">
                                      </div>
                                    <div class="mb-3">
                                        
                                        <div class="row">
                                            <div class="col">
                                                <label for="summary" class="form-label">Summary (Myanmar)<span class="text-primary">(Optional)</span></label>
                                                 <textarea  type="text"  class="form-control" id="editor" placeholder="Summary" name="summary"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="summary" class="form-label">Summary (English)<span class="text-primary">(Optional)</span></label>
                                                 <textarea  type="text"  class="form-control" id="editor" placeholder="Summary" name="summary_en"></textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image <span class="text-primary">(Optional)</span></label>
                                        <input  type="file"  class="form-control" id=""  name="image">
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


                    <form method="POST" action="{{ route('psession.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="addSessionedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                        <label for="exampleFormControlInput1" class="form-label"> Session Type <span class="text-danger">*</span></label>
                                        <input type="hidden" name="old_image" id="old_image">
                                        <input type="hidden" name="old_pdf" id="old_pdf">
                                        <input type="hidden" name="update_id" id="update_id">
                                        <select class="form-control" name="session_type" id="session_type" required>
                                            <option id="ပုံမှန်အစည်းအဝေး">ပုံမှန်အစည်းအဝေး</option>
                                            <option id="အထူးအစည်းအဝေး">အထူးအစည်းအဝေး</option>
                                            <option id="အရေးပေါ်အစည်းအဝေး">အရေးပေါ်အစည်းအဝေး</option>
                                        </select>
                                        {{-- <input type="hidden"  class="form-control"  id="user_id" placeholder="Role Name" name="user_id"> --}}
                                      </div>
                                    <div class="mb-3">
                                        <label for="session_data_type" class="form-label">Session Data Type  <span class="text-danger">*</span></label>
                                        <select class="form-control" required name="session_data_type" id="session_data_type">
                                            <option id="အစည်းအဝေးအစီအစဉ်များ">အစည်းအဝေးအစီအစဉ်များ</option>
                                            <option id="အစည်းအဝေးမှတ်တမ်းများ">အစည်းအဝေးမှတ်တမ်းများ</option>
                                        </select>
                                      </div>
                                    <div class="mb-3">
                                        <label for="ptimes" class="form-label">Parliament Times</label>
                                        <select class="form-control" name="ptimes" id="ptimes" required>
                                        @foreach ($ptimes as $ptime)
                                            <option value="{{ $ptime->id }}" id="{{ $ptime->name }}">{{ $ptime->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      

                                    <div class="mb-3">
                                            <div class="row">
                                              <div class="col">
                                                <label for="session_time" class="form-label">Session Time (Myanmar)<span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control" placeholder="ပထမပုံမှန်အစည်းအဝေး" name="session_time" id="session_time">
                                              </div>
                                              <div class="col">
                                                <label for="session_time_en" class="form-label">Session Time (English)<span class="text-danger">*</span></label>
                                                <input required type="text" class="form-control" placeholder="First Regular Session" name="session_time_en" id="session_time_en">
                                              </div>
                                            </div>
                                      </div>

                                      <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                              <label for="session_title" class="form-label">Session Title (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="ပထမနေ့ အစီအစဉ် (သို.) ပထမနေ့ မှတ်တမ်း" name="session_title" id="session_title">
                                            </div>
                                            <div class="col">
                                              <label for="session_title_en" class="form-label">Session Title (English)<span class="text-danger">*</span></label>
                                              <input required type="text" id="session_title_en" class="form-control" placeholder="First day's plan (or) First day's record" name="session_title_en">
                                            </div>
                                          </div>
                                      </div>
                                    
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date<span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id="date" placeholder="Confirm Password" name="date">
                                      </div>
                                      <div class="mb-3">
                                        <label for="pdf" class="form-label">PDF <span class="text-danger">*</span></label>
                                        <input  type="file"  class="form-control" id="pdf"  name="pdf_file">
                                      </div>
                                    <div class="mb-3">
                                        
                                        <div class="row">
                                            <div class="col">
                                                <label for="summary" class="form-label">Summary (Myanmar)<span class="text-primary">(Optional)</span></label>
                                                 <textarea  type="text"  class="form-control" id="summary" placeholder="Summary" name="summary"></textarea>
                                            </div>
                                            <div class="col">
                                                <label for="summary" class="form-label">Summary (English)<span class="text-primary">(Optional)</span></label>
                                                 <textarea  type="text"  class="form-control" id="summary_en" placeholder="Summary" name="summary_en"></textarea>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image <span class="text-primary">(Optional)</span></label>
                                        <input  type="file"  class="form-control" id="image"  name="image">
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

@section('script')
    <script>
        window.onload = () => {
                
                if('{{ $errors->any() }}'){
                    if('{{ $errors->first("modal") }}' == 'Add Session fail'){
                        $('#addSession').modal('show');
                    }else{
                        $('#edit_btn').click();

                    }
                    
                }
            }

        $(function () {
                var table = $("#session").DataTable({
                processing: true,
                serverSide: true,
                language: {
                    processing:
                    '<i class="text-primary fa fa-spinner fa-spin fa-1x fa-fw mr-2"></i> <span class="text-primary">Processing</span>',
                },
                ajax: {
                    url: "/parliament/session/data/get",
                    type: "post",
                    data: {
                    _token: document.head.querySelector('meta[name="csrf-token"]').content,
                    },
                },

                columns: [
                    { data: "session_type", name: "session_type" },
                    { data: "session_data_type", name: "session_data_type" },
                    { data: "parliament_times_id", name: "parliament_times_id" },
                    { data: "session_time", name: "session_time" },
                    { data: "title", name: "title" },
                    { data: "date", name: "date" },
                    { data: "pdf", name: "pdf" },
                    { data: "image", name: "image" },
                    { data: "created_at", name: "created_at" },
                    { data: "action", name: "action" },
                ],

                "order": [[ 9, "desc" ]]
                });
            });

            function edit(id,session_type,session_data_type,parliament_times_id,session_time,session_time_en,title,title_en,date,summary,summary_en,pdf , image){
                
                $('#addSessionedit').modal('show');
                $("#"+session_type).attr("selected" , false);
                $("#"+session_data_type).attr("selected" , false);
                $("#"+parliament_times_id).attr("selected" , false);

                $('#update_id').val(id);
                $('#old_image').val(image);
                $('#old_pdf').val(pdf);
                $('#session_time').val(session_time);
                $('#session_time_en').val(session_time_en);
                $('#session_title').val(title);
                $('#session_title_en').val(title_en);
                $('#date').val(date);
                tinymce.get('summary').setContent(summary); 
                tinymce.get('summary_en').setContent(summary_en); 
                $("#"+session_type).attr("selected" , true);
                $("#"+session_data_type).attr("selected" , true);
                $("#"+parliament_times_id).attr("selected" , true);
                // roles.map((name) => {
                //     $("#"+name).attr("selected" , true);
                // })
            }
        
            tinymce.init({
              selector: 'textarea#summary',
              skin: 'bootstrap',
              plugins: 'lists, link, image, media',
              toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
              menubar: false,
              });
            tinymce.init({
              selector: 'textarea#summary_en',
              skin: 'bootstrap',
              plugins: 'lists, link, image, media',
              toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
              menubar: false,
              });
    </script>
@endsection
</x-backend-layout>
