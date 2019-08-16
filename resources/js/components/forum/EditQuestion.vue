<template>
  <div class="container">
       <div class="row m-5">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="update">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" v-model="question.title">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Body</label>
                        <vue-simplemde  v-model="question.body" ref="markdownEditor" />
                    </div>

                    <div>
                        <button @click="cancel"  class="btn float-right btn-lg">
                            <i style="color: #808080" class="fas fa-times-circle"></i>           
                        </button>
                        <button type="submit" class="btn float-right btn-lg"><i style="color:teal" class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</template>

<script>
export default {
    props:['question'],

    methods:{
        cancel(){
            EventBus.$emit('cancelEditting')
        },

        update(){
            axios.put('/api/questions/'+this.question.slug , this.question)
            .then(res => this.cancel() )
            .catch(error => console.log(error.response.data.error))
        }
    }
}
</script>

<style scoped>

</style>