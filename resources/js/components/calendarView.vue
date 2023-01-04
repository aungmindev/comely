<template>
    <div class="container-fluid">
        <div class="text-center section">
            
            <v-calendar
              class="custom-calendar max-w-full border-0"
              :masks="masks"
              disable-page-swipe
              is-expanded
            >
            
              <template v-slot:day-content="{ day }">
                
                  <div class="d-flex justify-content-center mb-2"  :style="{cursor : day.weekday == 1 || day.weekday == 7 ? 'not-allowed' :'pointer'}">
                   
                    <div id="calender_mark" v-if="currentDate == day.year +'-'+day.month"
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
              currentDate : new Date().getFullYear() + '-' + ( new Date().getMonth() + 1 ),
            
          };
        },
        
        
        methods : {
        
            getColor(day){
              if(day.day in this.lists){
                return this.lists[day.day]
              }else{
                return '';
              }
            },

 
        },

        mounted(){
          let point = this;
          axios
          .post("/calendar/setting/get", this.lists)
          .then(function (response) {
              if(response.data != 'no-data'){
                point.lists = response.data
              }
          });
        }
    }
</script>

<style lang="scss" scoped>

</style>
