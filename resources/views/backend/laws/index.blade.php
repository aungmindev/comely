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
                        <h4 id="tiile">Parliament Laws<p  data-bs-toggle="modal" data-bs-target="#addSession" class="d-inline btn btn-danger text-white float-end btn-sm">Add Laws Data<i class="fa-solid fa-plus-circle ml-2"></i></p></h4>

                        <div class="card p-3 table-responsive">
                          
                  
                          <table class="table table-bordered table-striped table-hover w-100" id="session" >
                            <thead>
                                <tr>
                                    <th>Law Type</th>
                                    {{-- <th>Session Data Type</th> --}}
                                    <th>Parliament Times</th>
                                    <th>Session Times</th>
                                    <th>Law's Name</th>
                                    <th>Date of publication</th>
                                    <th>Proposed From</th>
                                    <th>Proposed Day</th>
                                    <th>The day the report was read</th>
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

                      <form method="POST" action="{{ route('laws.store') }}" enctype="multipart/form-data">
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Laws Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="law_type" class="form-label"> Law Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="law_type" id="" required>
                                            <option value="draft">ဥပဒေမူကြမ်း</option>
                                            <option value="bill">ဥပဒေကြမ်း</option>
                                            <option value="lease">ဥပဒေ</option>
                                        </select>
                                        {{-- <input type="hidden"  class="form-control"  id="user_id" placeholder="Role Name" name="user_id"> --}}
                                      </div>
                                    
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
                                              <label for="law_title" class="form-label">Law's Name (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="ဥပဒေအမည်" name="law_title" id="">
                                            </div>
                                            <div class="col">
                                              <label for="law_title_en" class="form-label">Law's Name (English)<span class="text-danger">*</span></label>
                                              <input required type="text" id="" class="form-control" placeholder="Law's name" name="law_title_en">
                                            </div>
                                          </div>
                                      </div>
                                    
                                    <div class="mb-3">
                                        <label for="law_date_of_publication" class="form-label">Date of publication<span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id=""  name="law_date_of_publication">
                                      </div>

                                      <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                              <label for="law_title" class="form-label">Proposed From (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="အဆိုပြုသည်. အဖွဲ့" name="law_proposed_from" id="">
                                            </div>
                                            <div class="col">
                                              <label for="law_title_en" class="form-label">Proposed From (English)<span class="text-danger">*</span></label>
                                              <input required type="text" id="" class="form-control" placeholder="Proposed group" name="law_proposed_from_en">
                                            </div>
                                          </div>
                                      </div>
                                      

                                      <div class="mb-3">
                                        <label for="date" class="form-label">Proposed Day <span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id="" placeholder="Confirm Password" name="law_proposed_day">
                                      </div>
                                      <div class="mb-3">
                                        <label for="date" class="form-label">The day the report was read<span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id="" placeholder="Confirm Password" name="law_report_read">
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


                    <form method="POST" action="{{ route('laws.update') }}" enctype="multipart/form-data">
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Laws Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="law_type" class="form-label"> Law Type <span class="text-danger">*</span></label>
                                        <input type="hidden" name="old_image" id="old_image">
                                        <input type="hidden" name="old_pdf" id="old_pdf">
                                        <input type="hidden" name="update_id" id="update_id">
                                        <select class="form-control" name="law_type" id="law_type" required>
                                            <option id="draft" value="draft">ဥပဒေမူကြမ်း</option>
                                            <option id="bill" value="bill">ဥပဒေကြမ်း</option>
                                            <option id="law" value="law">ဥပဒေ</option>
                                        </select>
                                        {{-- <input type="hidden"  class="form-control"  id="user_id" placeholder="Role Name" name="user_id"> --}}
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
                                              <label for="law_title" class="form-label">Law's Name (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="ဥပဒေအမည်" name="law_title" id="law_title">
                                            </div>
                                            <div class="col">
                                              <label for="law_title_en" class="form-label">Law's Name (English)<span class="text-danger">*</span></label>
                                              <input required type="text" id="law_title_en" class="form-control" placeholder="Law's name" name="law_title_en">
                                            </div>
                                          </div>
                                      </div>
                                    
                                    <div class="mb-3">
                                        <label for="law_date_of_publication" class="form-label">Date of publication<span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id="law_date_of_publication"  name="law_date_of_publication">
                                      </div>

                                      <div class="mb-3">
                                        <div class="row">
                                            <div class="col">
                                              <label for="law_title" class="form-label">Proposed From (Myanmar)<span class="text-danger">*</span></label>
                                              <input required type="text" class="form-control" placeholder="အဆိုပြုသည်. အဖွဲ့" name="law_proposed_from" id="law_proposed_from">
                                            </div>
                                            <div class="col">
                                              <label for="law_title_en" class="form-label">Proposed From (English)<span class="text-danger">*</span></label>
                                              <input required type="text" id="law_proposed_from_en" class="form-control" placeholder="Proposed group" name="law_proposed_from_en">
                                            </div>
                                          </div>
                                      </div>
                                      

                                      <div class="mb-3">
                                        <label for="date" class="form-label">Proposed Day <span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id="law_proposed_day" placeholder="Confirm Password" name="law_proposed_day">
                                      </div>
                                      <div class="mb-3">
                                        <label for="date" class="form-label">The day the report was read<span class="text-danger">*</span></label>
                                        <input required type="date"  class="form-control" id="law_report_read" placeholder="Confirm Password" name="law_report_read">
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
                    url: "/parliament/laws/data/get",
                    type: "post",
                    data: {
                    _token: document.head.querySelector('meta[name="csrf-token"]').content,
                    },
                },

                columns: [
                    { data: "law_type", name: "law_type" },
                    { data: "parliament_times_id", name: "parliament_times_id" },
                    { data: "session_time_id", name: "session_time_id" },
                    { data: "law_name", name: "law_name" },
                    { data: "dop", name: "dop" },
                    { data: "proposed_from", name: "proposed_from" },
                    { data: "dopd", name: "dopd" },
                    { data: "doprd", name: "doprd" },
                    { data: "pdf", name: "pdf" },
                    { data: "image", name: "image" },
                    { data: "created_at", name: "created_at" },
                    { data: "action", name: "action" },
                ],

                "order": [[ 9, "desc" ]]
                });
            });

            function edit(id,law_type,parliament_times_id,session_time,law_name,law_name_en,dop,proposed_from,proposed_from_en,dopd,doprd,summary,summary_en,pdf,image){
                $('#addSessionedit').modal('show');
                $("#"+law_type).attr("selected" , false);
                $("#"+parliament_times_id).attr("selected" , false);
                $("#"+session_time).attr("selected" , false);
                
                $('#update_id').val(id);
                $('#old_image').val(image);
                $('#old_pdf').val(pdf);
                $('#session_time').val(session_time);
                $('#law_title').val(law_name);
                $('#law_title_en').val(law_name_en);
                $('#law_date_of_publication').val(dop);
                $('#law_proposed_from').val(proposed_from);
                $('#law_proposed_from_en').val(proposed_from_en);
                $('#law_proposed_day').val(dopd);
                $('#law_report_read').val(doprd);
                $("#"+law_type).attr("selected" , true);
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
