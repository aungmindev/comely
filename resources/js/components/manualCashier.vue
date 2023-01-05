<template>
    <div class="row">
        <div class="col-xl-6" >
            <div>
        <div class="card-header p-3 bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0 text-center">Enter Product Item Code.</h5>
                </div>
            
            </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-xl-6">
                <div class="col-12">
                    <h5 class="mb-3">Item Code</h5>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">#c</span>
                        <input v-model="itemCode" @keyup.enter="addLists()" class="form-control" type="text" placeholder="Item Code" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="col-12">
                    <h5 class="mb-3">Qty</h5>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Qty</span>
                        <input v-model="qty" @keyup.enter="addLists()" class="form-control" type="text" placeholder="Qty" aria-label="Username" aria-describedby="basic-addon1" />
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
         <div class="col-12">
            <h5 class="mb-3">Paid</h5>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">MMK</span>
                <input v-model="paid"  class="form-control" type="text" placeholder="Paid Amount" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
         </div>
        </div>

    </div>
    
    </div>
        </div>
        <div class="col-xl-6 ">
            <div class="card-header p-3 bg-light">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0 text-center">Slip</h5>
                    </div>
                
                </div>
            </div>

            <div class="card-body border" id="slip">
                <div>
                    <p class="text-center">Comely</p>
                    <p class="text-center">Phone : 09-750364513 / 09-457102646</p>
                    <p class="text-center">Open daily : 8:00 AM To 9:00 PM</p>
                    <p class="text-center">CASH SALE</p>
                    <div class="row">
                        <div class="col-6 text-center">
                            Slip No : {{ slip_no }}
                        </div>
                        <div class="col-6 text-center">
                            {{ currentTime }}
                        </div>
                    </div>


                    <div class="table-responsive scrollbar mt-3">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="">Product</th>
                            <th class="">Qty</th>
                            <th class="">Discount</th>
                            <th class="text-center">KS</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product , i) in buying_lists" :key="i" @mouseover="edit = i" @mouseleave="edit = -1">
                            <td class="">{{ product.name_en }}</td>
                            <td class="">{{ product.qty }}</td>
                            <td class="">{{ product.discount_percent }}</td>
                            <td class="text-center">
                                <span v-if="product.discount_percent > 0" class="text-decoration-line-through text-danger">{{ product.original_sale_price }}</span>
                                <span v-if="product.discount_percent > 0" class="mr-3 ml-3">~</span>
                               <span class="">{{ product.after_discount_price }}</span>
                            </td>
                            <td v-if="edit == i">
                                <span class="ml-2" @click="remove(i , product.after_discount_price , product.qty)"><i class="fas fa-trash text-danger"></i></span>
                            </td>
                        </tr>
                          
                          <tr>
                            <td colspan="3" class="text-danger">Total</td>
                            <th scope="row" class="text-center">{{ total_price }}</th>
                          </tr>
                          <tr>
                            <td colspan="3" class="text-danger">Paid</td>
                            <th scope="row" class="text-center">{{ paid }}</th>
                          </tr>
                          <tr>
                            <td colspan="3" class="text-danger">Changed</td>
                            <th scope="row" class="text-center">{{ getChanged }}</th>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  


                    

                    <p class="text-center">Thank You</p>
                </div>
                
            </div>
            <div class=" d-flex justify-content-end card-footer"> 
                <div v-if="print">
                    <button class="btn btn-phoenix-primary me-1 mb-1" @click="printOutCancel()">Cancel</button>
                    <button class="btn btn-primary me-1 mb-1" @click="printOut()">Print</button>
                </div>
                <button v-else class="btn btn-secondary me-1 mb-1" @click="cashier()">Submit</button>

            </div>
            
        </div>
    </div>
     
    
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return {
                itemCode : '',
                buying_lists : [],
                total_price : 0,
                paid : 0,
                changed : 0,
                qty : 1,
                edit : -1,
                slip_no : '',
                print : false,
            }
        },
        computed : {
            getChanged(){
                this.changed =  this.paid - this.total_price
                return this.changed
            },
            currentTime(){
                let date =  new Date()
                let am_or_pm = date.getHours() >= 12 ? 'PM' : 'AM';
                let cd = date.getDate()+'/'+date.getMonth() + 1 +'/'+date.getFullYear() +'  '+ date.getHours() % 12 + ':'+date.getMinutes() + ' '+ am_or_pm
                return cd;
            }
        },
        methods : {
            addLists(){
                if(this.itemCode != ''){
                    var point = this;

                   axios.post('/manual/cashier/get/product' , {'itemCode' : this.itemCode}).
                   then((response) => {
                    if(response.data.status == 403){
                        point.Alert('error' , response.data.message)
                    }else{
                        response.data[0]['qty'] = point.qty
                        point.buying_lists.push(response.data[0])
                        point.total_price += (response.data[0].after_discount_price * point.qty)
                        point.itemCode = ''
                        point.qty = 1
                        point.slip_no = response.data[1]
                    }
                        

                   })

                }
            },
            remove(i , price , qty){
                this.buying_lists.splice(i , 1)
                this.total_price -= (price * qty)
            },
            cashier(){
                if(this.paid != 0 && this.buying_lists.length > 0 && this.paid >= this.total_price){
                    var point = this;

                   axios.post('/manual/cashier/' , this.$data).
                   then((response) => {
                    console.log(response.data)
                    if(response.data.status == 200){
                        point.Alert('success' , 'Successfully cash register.')
                        point.print = true
                        
                    }else{
                        point.Alert('error' , response.data.message)
                    }
                        console.log(response.data)
                   })
                }else{
                    this.Alert('error' , 'Input data is something wrong')
                }
            },
            printOut(){
                var printContents = document.getElementById('slip').innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
                location.reload()
            },
            printOutCancel(){
                this.buying_lists = [];
                this.total_price = 0;
                this.changed = 0
                this.paid = 0
                this.print = false
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
