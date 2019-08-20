<template>
    <div>
        <vue-simplemde  v-model="reply.reply" ref="markdownEditor" />
        <div>
            <button @click="cancel"  class="btn float-right">
                <i style="color: #808080" class="fas fa-times-circle"></i>           
            </button>
            <button @click="updateReply" class="btn float-right"><i style="color:teal" class="fas fa-save"></i></button>
        </div>
    </div>
</template>

<script>
export default {
    props:['reply'],
    
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },

        updateReply(){
            axios.patch('/api/question/'+ this.reply.question_slug +'/replies/'+this.reply.id , { body: this.reply.reply})
            .then(res => {
                this.cancel()
            })
            .catch(error => console.log(error.response.data.error))
        }
    }   
}
</script>

<style scoped>

</style>