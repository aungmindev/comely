<template>
    <div>
        <div class="row mb-6">
        <div class="col-lg-4 mt-3">
            <h5 class="mb-3">Regular Price<span class="text-danger">*</span></h5>
            <input type="number" v-model="regular_price" class="form-control" name="regular_price" required>
        </div>
        <div class="col-lg-4 mt-3">
            <h5 class="mb-3">Original Sale Price<span class="text-danger">*</span></h5>
            <input type="number" v-on:keyup="priceCalculate()" v-model="original_sale_price" class="form-control" name="original_sale_price" required>
        </div>
        <div class="col-lg-4 mt-3">
            <h5 class="mb-3">After Discount<span class="text-danger">*</span></h5>
            <input type="string" name="after_discount_price" :value=" after_discount "  readonly class="form-control">
        </div>
        
        
    </div>
    
    <div class="row mb-6">
        <h5 class="mb-3"> Discount<span class="text-danger"></span></h5>

        <div class="input-group mb-3">
        <input class="form-control" v-on:keyup="discountCalculate()" v-model="discount"  type="number" placeholder="Discount with percentage" name="discount" />
        <span class="input-group-text" id="basic-addon2">%</span>
        </div>
        
    </div>
    </div>
</template>

<script>
    export default {
        props : ['originalPrice' , 'originalSaleprice' , 'discountPercent' , 'afterDiscount'],
        data(){
            return {
                'regular_price' : '',
                'original_sale_price' : '',
                'after_discount' : '',
                'discount' : 0,
            }
        },

        methods : {
            priceCalculate(){
                if(this.original_sale_price > 0){
                    this.after_discount = this.original_sale_price;
                }
            },
            discountCalculate(){
                if(this.discount > 0){
                    this.after_discount = this.original_sale_price - (this.original_sale_price * this.discount)/100
                }
            }
        },

        mounted(){
            if(this.originalPrice != undefined){
                this.regular_price = this.originalPrice 
            }
            if(this.originalSaleprice != undefined){
                this.original_sale_price = this.originalSaleprice
            }
            if(this.discountPercent != undefined){
                this.discount = this.discountPercent
            }
            if(this.afterDiscount != undefined){
                this.after_discount = this.afterDiscount
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
