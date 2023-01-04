<template>
         <div class="mb-6">
            <h5 class="mb-3">Display images <span class="text-danger">*</span></h5>
            <div>
                <input type="hidden" name="uploadsImage" :value="JSON.stringify(uploadImages)">
                <input  type="file" @change="imagePreview($event)" class="form-control" name="images[]" multiple id="images" >
               
                <div class="p-5 border rounded mt-3" v-if="imageUploaded">
                    <div class="row mb-4" >
                        <div v-for="(image , i) in imageLists" :key="i" class="col-lg-2">
                            <div class="rounded-2 " v-on:click="removeImage(i)">
                                <img :src="image" class="img-thumbnail" alt="" width="100">
                            </div>
                        </div>
                        <div v-for="(image , i) in editImageLists" :key="i" class="col-lg-2">
                            <div class="rounded-2 " v-on:click="removeImage(i)">
                                <img :src="image" class="img-thumbnail" alt="" width="100">
                            </div>
                        </div>
                    </div>

                    <button class="mt-5"  sty>Tap to remove.</button>

                </div>
            </div>

         </div>
</template>

<script>
    export default {
        props : ['modelName' , 'updateId' , 'columnName' , 'requiredStatus'],
        data(){
            return {
               editImageLists : [],
               imageLists : [],
               uploadImages : [],
               imageUploaded : [],
               getImage : true,
               noPhoto : false,
            }
        },

        methods : {
            imagePreview (e){
                if(this.imageLists.length > 0){
                    this.imageLists = []
                }
                [...e.target.files].map((file , i)=>{
                    let link  = URL.createObjectURL(file)
                    this.imageLists.push(link)
                    if(this.uploadImages == null){
                        this.uploadImages = []
                    }
                    this.uploadImages.push(file.name)
                    this.imageUploaded = true
                })
            },

            removeImage(i){
              this.uploadImages.splice(i,1)
              this.imageLists.splice(i,1)
              this.editImageLists.splice(i,1)
              if(this.uploadImages.length <= 0){
                this.uploadImages = null
              }
            },

            getImages (){
                
                
            }
            
        },

        mounted(){
            let point = this;
                point.getImage = false
                let edit_id = point.updateId
                let column  = point.columnName
                axios.post('/app/get/images' , {'model' : this.modelName , 'id' : edit_id , 'column' : column}).
                    then((response)=>{
                        if(response.data.length > 0){
                            response.data.map((val , i)=>{
                            point.editImageLists.push(val.image)
                            point.uploadImages.push(val.image)
                            this.imageUploaded = true
                            })
                        }else{
                            point.uploadImages = null
                        }
                    })
        }
    }
</script>

<style lang="scss" scoped>

</style>
