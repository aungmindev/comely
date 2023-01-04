<template>
    <div>
        <input v-model="color" :name="'colors['+colorLists+']'" required  @change="colorChange($event)" type="color" class="form-control form-control-color" id="exampleColorInput"  title="Choose your color">
        <div class="p-3 border rounded mt-3" v-if="colorLists.length > 0">
            <span  class="badge badge-phoenix m-1" v-for="(color , i) in colorLists" :key="i" v-on:click="removeColor(i)" :style="{'background-color': color}">{{ color }}</span>

            <p class="mt-3">Tap to remove.</p>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['colorList'],
        data(){
            return {
               color : '#000000',
               colorLists : [],
            }
        },

        methods : {
            colorChange (e){
                if(!this.colorLists.includes(this.color)){
                    this.colorLists.push(this.color)

                }
            },
            removeColor(index){
                this.colorLists.splice(index , 1)
            }
        },

        mounted(){
            if(this.colorList != undefined){
                this.colorLists = this.colorList

            }
        }
    }
</script>

<style lang="scss" scoped>

</style>
