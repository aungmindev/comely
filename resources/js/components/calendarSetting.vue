<template>
    <div class="container-fluid">
        <div class="text-center section">
            
            <v-calendar
              class="custom-calendar max-w-full"
              :masks="masks"
              disable-page-swipe
              is-expanded
            >
            
              <template v-slot:day-content="{ day }">
                
                  <div class="d-flex justify-content-center mb-2" v-on:click="setColor(day)" :style="{cursor : day.weekday == 1 || day.weekday == 7 ? 'not-allowed' :'pointer'}">
                   
                    <div id="calender_mark" v-if="currentDate == day.year +'-'+day.month || currentDate < day.year +'-'+day.month"
                     :class="[day.weekday == 1 || day.weekday == 7 ? 'bg-danger' : getColor(day)] "
                      class=" d-flex align-items-center justify-content-center">{{day.day}}
                    </div>

                   <div id="calender_mark" v-else
                     :class="[day.weekday == 1 || day.weekday == 7 ? 'bg-danger' : ''] "
                      class=" d-flex align-items-center justify-content-center">{{day.day}}
                    </div>

                  </div>
                
              </template>
            </v-calendar>
          </div>

          <div class="card mt-3 p-2" v-if="editingLists.length > 0">
            <div class="row">
                <div class="col-lg-3 p-lg-3">
                  <div class="">
                        <span class="btn btn-light shadow-md m-1" data-toggle="tooltip" title="Tap to remove" v-for="(edit , index) in editingLists" :key="index" @click="removeEditDate(index)">
                            {{edit}}
                        </span>
                        <p class="text-muted pl-2 pt-2 text-sm">Click on the number to remove.</p>
                  </div>
                </div>

                <div class="col-lg-8 p-3" >
                  <div class="row">
                    <div class="col-lg-7 offset-lg-1">
                      <form>
                        <p>
                          <input  v-model="colorChecked" @click="colorChange('bg-danger')" value="bg-danger" :checked="colorChecked == 'bg-danger' ? true : false " type="radio" name="flexRadioDefault" id="weekend" />
                          
                          <i class="fa-solid fa-square text-danger ml-2"></i> <span class="ml-2"> ရုံးပိတ်ရက်များ</span></p>
                      <p>
                        <input  v-model="colorChecked"  @click="colorChange('bg-warning')" value="bg-warning" :checked="colorChecked == 'bg-warning' ? true : false " type="radio" name="flexRadioDefault" id="close" />
                        
                       <i class="fa-solid fa-square text-warning ml-2"></i> <span class="ml-2">လွှတ်တော် အစည်းအဝေးရပ်နားမည့်ရက်များ</span></p>
                      <p>
                        <input  v-model="colorChecked" @click="colorChange('bg-success')" value="bg-success" :checked="colorChecked == 'bg-success' ? true : false " type="radio" name="flexRadioDefault" id="open" />
                          <i class="fa-solid fa-square text-success ml-2"></i> <span class="ml-2">လွှတ်တော် အစည်းအဝေးကျင်းပရန် လျာထားသည့်ရက်များ</span></p>
                      </form>
                    </div>

                    <div class="col-lg-4 d-flex align-items-center">
                      <button class="btn btn-danger btn-sm" v-on:click="saveSetting()"><i class="fas fa-save mr-2" ></i>Save Calendar Setting</button>
                    </div>
                  </div>

                </div>
            </div>
          </div>
    </div>
</template>

<script>
    export default {
        data(){
          return {
              masks: {
                weekdays: 'WWW',
              },
              lists: {
                
              },
              editingLists : [],
              colorChecked : 'bg-success',
              currentDate : new Date().getFullYear() + '-' + ( new Date().getMonth() + 1 ),
              deleteIcon : true
            
          };
        },
        
        
        methods : {
          setColor(day){
            if(day.year +'-'+day.month == this.currentDate){
              if(day.weekday == 1 || day.weekday == 7){
                
              }else{
                if(!this.editingLists.includes(day.day)){
                  this.editingLists.push(day.day)
                  this.lists[day.day] = 'bg-success'
                }
              }
            }else{
              const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 5000,
                    });
              Toast.fire({
                      icon: 'error',
                      title: 'Calendar configuration is allowed for current month only.',
                    });
            }
              
            },

            removeEditDate(index){
              this.editingLists.splice(index , 1)
            },

            getColor(day){
              if(day.day in this.lists){
                return this.lists[day.day]
              }else{
                return '';
              }
            },

            colorChange(color){
              this.editingLists.map((list , i) => {
               this.lists[list] = color
              })
            },

            saveSetting(){
                let point = this;
                axios
                .post("/calendar/setting/store", this.lists)
                .then(function (response) {
                  if(response.data.status == 200){
                    point.editingLists = [];
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 5000,
                    });

                    Toast.fire({
                      icon: 'success',
                      title: 'successfully created.',
                    });
                  }
                });

                
              
            },

            
        },

        mounted(){
          let point = this;
          axios
          .post("/calendar/setting/get", this.lists)
          .then(function (response) {
            // console.log(response.data)
              if(response.data != 'no-data'){
                point.lists = response.data
              }
          });
        }
    }
</script>

<style lang="scss" scoped>

</style>
