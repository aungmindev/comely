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
                      
                      <div class="col-lg-3 mt-2" v-for="(f_parliament_session , fi)  in  f_parliament_sessions" :key="fi">
                        <button @click="session(f_parliament_session.parliament_times_id , f_parliament_session.session_time_id)" class="btn col-12" type="button" id="background">
                                      {{ f_parliament_session.session_times.name }}
                                  </button>
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
                      <button @click="session(f_parliament_session.parliament_times_id , f_parliament_session.session_time_id)" class="btn col-12" type="button" id="background">
                                      {{ f_parliament_session.session_times.name }}
                                  </button>
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
                      <button @click="session(f_parliament_session.parliament_times_id , f_parliament_session.session_time_id)" class="btn col-12" type="button" id="background">
                                      {{ f_parliament_session.session_times.name }}
                                  </button>
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

    session(pid , st){
      // window.location.href = '/session/pid/{sessionTime?}/{sessionType?}'
      window.location.href = '/report/show/'+pid+'/'+st
      // window.location =  "{{ route('session.view') }}"
    }
   

   
  },
 
  created() {
    let point = this;
    axios
    .post("/report/get/bypid")
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
