<template>
    <div>
        <div class="card-header p-3 bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0 text-center">Enter Product Item Code.</h5>
                </div>
            
            </div>
    </div>

    <div class="card-body">
        <div class="d-flex justify-content-center">
            <div class="col-xl-6">
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">#c</span>
            <input v-model="itemCode" @keyup.enter="cashier()" class="form-control" type="text" placeholder="Item Code" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
        </div>
        </div>
        <div class=" d-flex justify-content-center">
            <button class="btn btn-primary me-1 mb-1" @click="cashier()">Submit</button>

        </div>
    </div>
    
    </div>
     
    
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                itemCode : ''
            }
        },

        methods : {
            cashier(){
                if(this.itemCode != ''){
                var point = this;

                   axios.post('/manual/cashier/' , {'itemCode' : this.itemCode}).
                   then((response) => {
                    if(response.data.status == 200){
                        point.Alert('success' , 'Successfully cash register.')
                        this.itemCode = ''
                    }else{
                        point.Alert('error' , response.data.message)
                    }
                        console.log(response.data)
                   })
                }
            },

            Alert(data, message) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 10000,
            });

            Toast.fire({
                icon: data,
                title: message,
            });
            },
        },

        

        mounted(){
            
        }
    }
</script>

<style lang="scss" scoped>

</style>
