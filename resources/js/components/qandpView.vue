<template>
  
  <div>
 <div style="position : absolute ; top : 0rem ;  ;overflow:hidden" class="h-50 offcanvas offcanvas-top" tabindex="-1" id="firsttime" aria-labelledby="offcanvasTopLabel">
          <div class="offcanvas-header">
              <h5 id="offcanvasTopLabel"></h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <div class="container">
                  <div class="row"  v-if="f_parliament_sessions.length > 0">
                      
                      <div class="col-lg-4 mt-2" v-for="(f_parliament_session , fi)  in  f_parliament_sessions" :key="fi">
                          <div class="accordion" id="accordionExample" >
                              
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                  <button  class="accordion-button  bg-warning" type="button" data-bs-toggle="collapse" v-bind:href="'#'+f_parliament_session.session_times.name " aria-expanded="false" :aria-controls="f_parliament_session.session_times.name">
                                      {{ f_parliament_session.session_times.name }}
                                  </button>
                                </h2>
                                <div :id="f_parliament_session.session_times.name" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <nav class="nav flex-column card">
                                          <a style="cursor : pointer" @click="session(f_parliament_session.isstar ,f_parliament_session.parliament_times_id , f_parliament_session.session_time_id , 'မေးခွန်း')" class="nav-link  border-bottom text-dark" aria-current="page">မေးခွန်း <i class="fa-solid fa-photo-film float-end"></i></a>
                                          <a style="cursor : pointer" @click="session(f_parliament_session.isstar ,f_parliament_session.parliament_times_id , f_parliament_session.session_time_id , 'အဆိုများ')" class="nav-link  border-bottom text-dark" >အဆိုများ<i class="fa-solid fa-list float-end"></i></a>
                                        </nav>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
                     
                      
                  </div>
                  <div v-else>
                      <p class="text-danger text-center">No Data Available</p>
                  </div>
              </div>
          </div>
      </div>
      <div style="position : absolute ; top : 0rem ;  ;overflow:hidden" class="h-50 offcanvas offcanvas-top" tabindex="-1" id="secondtime" aria-labelledby="offcanvasTopLabel">
          <div class="offcanvas-header">
              <h5 id="offcanvasTopLabel"></h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <div class="container">
                  <div class="row" v-if="s_parliament_sessions.length > 0">
                    <div class="col-lg-4 mt-2" v-for="(f_parliament_session , si)  in  s_parliament_sessions" :key="si">
                          <div class="accordion" id="accordionExample" >
                              
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                  <button  class="accordion-button  bg-warning" type="button" data-bs-toggle="collapse" v-bind:href="'#'+f_parliament_session.session_times.name " aria-expanded="false" :aria-controls="f_parliament_session.session_times.name">
                                      {{ f_parliament_session.session_times.name }}
                                  </button>
                                </h2>
                                <div :id="f_parliament_session.session_times.name" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <nav class="nav flex-column card">
                                          <a style="cursor : pointer" @click="session(f_parliament_session.isstar ,f_parliament_session.parliament_times_id , f_parliament_session.session_time_id , 'မေးခွန်း')" class="nav-link  border-bottom text-dark" aria-current="page">မေးခွန်း <i class="fa-solid fa-photo-film float-end"></i></a>
                                          <a style="cursor : pointer" @click="session(f_parliament_session.isstar ,f_parliament_session.parliament_times_id , f_parliament_session.session_time_id , 'အဆိုများ')" class="nav-link  border-bottom text-dark" >အဆိုများ<i class="fa-solid fa-list float-end"></i></a>
                                        </nav>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
                  </div>
                  <p class="text-danger text-center" v-else>No Data Available</p>
              </div>
          </div>
      </div>
      <div style="position : absolute ; top : 0rem ;  ;overflow:hidden" class="h-50 offcanvas offcanvas-top" tabindex="-1" id="thirdtime" aria-labelledby="offcanvasTopLabel">
          <div class="offcanvas-header">
              <h5 id="offcanvasTopLabel"></h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <div class="container">
                  <div class="row" v-if="t_parliament_sessions.length > 0">
                    <div class="col-lg-4 mt-2" v-for="(f_parliament_session , ti)  in  t_parliament_sessions" :key="ti">
                          <div class="accordion" id="accordionExample" >
                              
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                  <button  class="accordion-button  bg-warning" type="button" data-bs-toggle="collapse" v-bind:href="'#'+f_parliament_session.session_times.name " aria-expanded="false" :aria-controls="f_parliament_session.session_times.name">
                                      {{ f_parliament_session.session_times.name }}
                                  </button>
                                </h2>
                                <div :id="f_parliament_session.session_times.name" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <nav class="nav flex-column card">
                                          <a style="cursor : pointer" @click="session(f_parliament_session.isstar ,f_parliament_session.parliament_times_id , f_parliament_session.session_time_id , 'မေးခွန်း')" class="nav-link  border-bottom text-dark" aria-current="page">မေးခွန်း <i class="fa-solid fa-photo-film float-end"></i></a>
                                          <a style="cursor : pointer" @click="session(f_parliament_session.isstar ,f_parliament_session.parliament_times_id , f_parliament_session.session_time_id , 'အဆိုများ')" class="nav-link  border-bottom text-dark" >အဆိုများ<i class="fa-solid fa-list float-end"></i></a>
                                        </nav>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
                  </div>
                  <div v-else>
                      <p class="text-danger text-center">No Data Available</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import VueSweetalert2 from "vue-sweetalert2";
export default {
  props: ['qandpType'],
  data() {
    return {
        f_parliament_sessions : [],
        s_parliament_sessions : [],
        t_parliament_sessions : [],
    };
  },

  methods: {
    csvchoosed(event) {
      let csvFile = event.target.files[0];
      if (csvFile.type == "text/csv") {
        this.formData.append("csvFile", csvFile);
        let point = this;
        axios
          .post("/csv/Upload", this.formData, this.formDataConfig)
          .then(function (response) {
            setTimeout(() => {
              point.uploadBtn = true;
              if (response.data == 200) {
                point.Alert("success", "Uploaded successfully");
                $("#tablecsc").dataTable().fnDestroy();
                point.dataTbaleLoad();
              } else {
                point.Alert(
                  "error",
                  "Please check your file and upload again,"
                );
              }
            }, 1000);
          });
        this.uploadBtn = false;
      } else {
        this.Alert("error", "Wrong file format . CSV file only support.");
      }

      $("#csvUpload").val("");
    },

    session(isstart , pid , st , qandpType){
      // window.location.href = '/session/pid/{sessionTime?}/{sessionType?}'
      window.location.href = '/qandp/show/'+isstart+'/'+pid+'/'+st+'/'+qandpType
      // window.location =  "{{ route('session.view') }}"
    }
   

   
  },
 
  created() {
    let point = this;
    axios
    .post("/qandp/get/bypid", {'isstar' : point.qandpType})
    .then(function (response) {
      point.f_parliament_sessions = response.data[0]
      point.s_parliament_sessions = response.data[1]
      point.t_parliament_sessions = response.data[2]
        console.log(response.data)
    });
  },
};
</script>

<style lang="scss" scoped>
</style>
