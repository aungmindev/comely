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
                        <h4 id="tiile">Parliament Reports<p  data-bs-toggle="modal" data-bs-target="#addSession" class="d-inline btn btn-danger text-white float-end btn-sm">Add Reports Data<i class="fa-solid fa-plus-circle ml-2"></i></p></h4>

                        <div class="card p-3 table-responsive">
                          
                  
                          <table class="table table-bordered table-striped table-hover w-100" id="session" >
                            <thead>
                                <tr>
                                    {{-- <th>Session Data Type</th> --}}
                                    <th>Parliament Times</th>
                                    <th>Session Times</th>
                                    <th>Report title</th>
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

                      <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data">
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Reports Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                      
                                    <div class="mb-3">
                                        <label for="ptimes" class="form-label">Parliament Times</label>
                                        <select class="form-control" name="ptimes" id="" required>
                                        @foreach ($ptimes as $ptime)
                                            <option value="{{ $ptime->id }}" id="{{ $ptime->id }}">{{ $ptime->name }}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                      

                                      <div class="mb-3">
                                        <div class="row">
                                          <div class="col">
                                            <label for="session_time" class="form-label">Session Time (Myanmar)<span class="text-danger">*</span></label>
                                          
                                            <select class="form-control" name="session_time" id="" required>
                                              @foreach ($psessiontimes as $psessiontime)
                                                  <option value="{{ $psessiontime->id }}" >{{ $psessiontime->name }}</option>
                                              @endforeach
                                              </select>
                                          </div>
                                          <div class="col">
                                            <label for="session_time_en" class="form-label">Session Time (English)<span class="text-danger">*</span></label>
                                            <select class="form-control" name="session_time_en" id="" required>
                                              @foreach ($psessiontimes as $psessiontime)
                                                  <option value="{{ $psessiontime->id }}" >{{ $psessiontime->name_en }}</option>
                                              @endforeach
                                              </select>
                                          </div>
                                        </div>
                                  </div>

                                      <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                              <label for="law_title" class="form-label">Title (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="အစီရင်ခံစာခေါင်းစဉ်" name="report_title" id="">
                                            </div>
                                            <div class="col">
                                              <label for="law_title_en" class="form-label">Title (English)<span class="text-danger">*</span></label>
                                              <input required type="text" id="" class="form-control" placeholder="Title of report" name="report_title_en">
                                            </div>
                                          </div>
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


                    <form method="POST" action="{{ route('report.update') }}" enctype="multipart/form-data">
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
                                <h5 class="modal-title" id="exampleModalLabel">Edit Reports Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                  <input type="hidden" name="old_image" id="old_image">
                                  <input type="hidden" name="old_pdf" id="old_pdf">
                                  <input type="hidden" name="update_id" id="update_id">

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
                                          
                                            <select class="form-control" name="session_time" id="" required>
                                              @foreach ($psessiontimes as $psessiontime)
                                                  <option value="{{ $psessiontime->id }}" id="{{ $psessiontime->name }}">{{ $psessiontime->name }}</option>
                                              @endforeach
                                              </select>
                                          </div>
                                          <div class="col">
                                            <label for="session_time_en" class="form-label">Session Time (English)<span class="text-danger">*</span></label>
                                            <select class="form-control" name="session_time_en"  required>
                                              @foreach ($psessiontimes as $psessiontime)
                                                  <option value="{{ $psessiontime->id }}" id="{{ $psessiontime->name }}">{{ $psessiontime->name_en }}</option>
                                              @endforeach
                                              </select>
                                          </div>
                                        </div>
                                  </div>

                                      
                                      <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                              <label for="law_title" class="form-label">Title (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="Title" name="report_title" id="report_title">
                                            </div>
                                            <div class="col">
                                              <label for="law_title_en" class="form-label">Title (English)<span class="text-danger">*</span></label>
                                              <input required type="text"  class="form-control" placeholder="Title" name="report_title_en" id="report_title_en">
                                            </div>
                                          </div>
                                      </div>

                                      <div class="mb-3">
                                        <label for="pdf" class="form-label">PDF <span class="text-danger">*</span></label>
                                        <input  type="file"  class="form-control" id=""  name="pdf_file">
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
                    url: "/parliament/report/data/get",
                    type: "post",
                    data: {
                    _token: document.head.querySelector('meta[name="csrf-token"]').content,
                    },
                },

                columns: [
                    { data: "parliament_times_id", name: "parliament_times_id" },
                    { data: "session_time_id", name: "session_time_id" },
                    { data: "title", name: "title" },
                    { data: "pdf", name: "pdf" },
                    { data: "image", name: "image" },
                    { data: "created_at", name: "created_at" },
                    { data: "action", name: "action" },
                ],

                "order": [[5, "desc" ]]
                });
            });

            function edit(id,parliament_times_id,session_time,title,title_en,summary,summary_en,pdf,image){
                $("#"+parliament_times_id).attr("selected" , false);
                $("#"+session_time).attr("selected" , false);

                $('#addSessionedit').modal('show');
                $('#update_id').val(id);
                $('#old_image').val(image);
                $('#old_pdf').val(pdf);
                $('#report_title').val(title);
                $('#report_title_en').val(title_en);
                $("#"+parliament_times_id).attr("selected" , true);
                $("#"+session_time).attr("selected" , true);
                // roles.map((name) => {
                //     $("#"+name).attr("selected" , true);
                // })
                tinymce.get('summary').setContent(summary); 
                tinymce.get('summary_en').setContent(summary_en); 
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
