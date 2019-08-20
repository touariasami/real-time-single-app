<template>
    <div class="container">
        <div class="mt-2">
            <label for="">Add reply</label>
            <vue-simplemde  v-model="body" ref="markdownEditor" />
            <button class="btn btn-success" @click="addReply">
                Reply
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['slug'],
    data(){
        return  {
            body: null
        }
    },
    methods:{
        addReply() {
            axios.post('/api/question/'+this.slug+'/replies', {body : this.body})
            .then(res => {
                this.body = '',
                EventBus.$emit('newReply', res.data.reply)
                window.scrollTo(0,0)
            })
            .catch(error => error.response.data.error)
        }
    }
}
</script>

<style scoped>

</style>