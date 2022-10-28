<template>
  <div>
    <div class="container-fluid mt-3">
      <div class="card p-3 table-responsive">
        <div class="row mb-3 shadow-sm pb-3">
          <div class="col-md-2">
            <label class="">Rank</label>
            <select class="form-control" v-model="filter_rank">
              <option disabled selected value="">Choose rank</option>
              <option
                v-for="rank in ranks"
                v-bind:key="rank"
                v-text="rank"
              ></option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="">Country</label>
            <input
              v-model="filter_country"
              type="text"
              class="form-control"
              placeholder="Type country name"
            />
          </div>
          <div class="col-md-2">
            <label class="">Year</label>
            <select class="form-control" v-model="filter_year">
              <option disabled value="">Choose year</option>
              <option
                v-for="year in years"
                v-bind:key="year"
                v-text="year"
              ></option>
            </select>
          </div>
          <div class="col-md-2">
            <button
              title="Click to filter"
              class="btn btn-primary mt-4 col-6"
              @click="filterData()"
            >
              Filter <i class="fas fa-filter ml-2"></i>
            </button>
            <button
              @click="clearFilter()"
              title="Clear filter"
              v-if="
                filter_rank != '' || filter_country != '' || filter_year != ''
              "
              class="btn btn-danger mt-4 ml-3 btn-sm"
            >
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>

          <div class="col-md-4 mt-4">
            <div class="d-flex justify-content-end">
              <input
                type="file"
                class="hidden"
                id="csvUpload"
                @change="csvchoosed($event)"
              />
              <button
                v-if="uploadBtn"
                class="btn btn-primary btn-sm"
                @click="csvUpload()"
              >
                Upload CSV <i class="fas fa-upload ml-2"></i>
              </button>

              <button v-if="!uploadBtn" class="btn btn-warning btn-sm mr-3">
                <i class="fa fa-spinner fa-spin fa-2x fa-fw mr-2"></i>
                Your file is uploading....Please wait a moment...
              </button>
              <!-- <div v-if="!uploadBtn" class="loader"></div> -->
            </div>
          </div>
        </div>

        <table
          class="table table-bordered table-striped table-hover"
          id="tablecsc"
        >
          <thead>
            <tr>
              <th>Year</th>
              <th>Rank</th>
              <th>Recipient</th>
              <th>Country</th>
              <th>Career</th>
              <th>Tied</th>
              <th>Title</th>
              <!-- <th width="100px">Action</th> -->
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import VueSweetalert2 from "vue-sweetalert2";
export default {
  data() {
    return {
      uploadBtn: true,
      currentYear: new Date().getFullYear(),
      years: [],
      ranks: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
      csvFile: "",
      formData: new FormData(),
      formDataConfig: {
        headers: {
          "content-type": "multipart/form-data",
        },
      },
      filter_rank: "",
      filter_country: "",
      filter_year: "",
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

    csvUpload() {
      $("#csvUpload").click();
    },

    dataTbaleLoad(year = null, rank = null, country = null) {
      let point = this;
      $(function () {
        var table = $("#tablecsc").DataTable({
          processing: true,
          serverSide: true,
          language: {
            processing:
              '<i class="text-primary fa fa-spinner fa-spin fa-1x fa-fw mr-2"></i> <span class="text-primary">Processing</span>',
          },
          ajax: {
            url: "/csv/list/get/datatable",
            type: "post",
            data: {
              _token: document.head.querySelector('meta[name="csrf-token"]')
                .content,
              filter_year: point.filter_year,
              filter_rank: point.filter_rank,
              filter_country: point.filter_country,
            },
          },

          columns: [
            { data: "year", name: "year" },
            { data: "rank", name: "rank" },
            { data: "recipient", name: "recipient" },
            { data: "country", name: "country" },
            { data: "career", name: "career" },
            { data: "tied", name: "tied" },
            { data: "title", name: "title" },
          ],
        });
      });
    },

    filterData() {
      if (
        this.filter_rank != "" ||
        this.filter_year != "" ||
        this.filter_country != ""
      ) {
        $("#tablecsc").dataTable().fnDestroy();
        this.dataTbaleLoad();
      } else {
        this.Alert("warning", "Alteast one data is required to filter.");

      }
    },
    clearFilter() {
      this.filter_rank = "";
      this.filter_year = "";
      this.filter_country = "";
      $("#tablecsc").dataTable().fnDestroy();
      this.dataTbaleLoad();
    },
    Alert(data, message) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 5000,
      });

      Toast.fire({
        icon: data,
        title: message,
      });
    },
  },

  created() {
    for (let i = 1999; i <= this.currentYear; i++) {
      this.years.push(i);
    }

    this.dataTbaleLoad();
  },
};
</script>

<style lang="scss" scoped>
</style>
