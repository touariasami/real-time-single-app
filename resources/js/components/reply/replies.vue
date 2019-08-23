<template>
    <div class="container">
        <reply v-for="(reply , index) in content" :key="reply.id" :index="index" :data="reply"></reply>
    </div>
</template>

<script>
import Reply from './Reply.vue'

export default {
    props: ['question'],
    data(){
        return {
            content: this.question.replies
        }
    },
    components:{
        Reply
    },

    created(){
        EventBus.$on('newReply', (reply) => {
            this.content.unshift(reply)
        })

        EventBus.$on('deleteReply', (index) => {
            console.log(this.content[index])
            axios.delete('/api/question/'+this.question.slug+'/replies/'+this.content[index].id )
            .then(res => {
                this.content.splice(index,1)
            })
            .catch(error => console.log(error.response.data.error))

            
        })


        Echo.private('App.User.' + User.id())
            .notification((notification) => {
                this.content.unshift(notification.reply)
        });


         Echo.channel('deleteReplyChannel')
        .listen('DeleteReplyEvent', (e) => {
            for(let index = 0 ; this.content.length ; index++){
                if(this.content[index].id == e.id ){
                    this.content.splice(index,1)
                }
            }
        });
    }
}
</script>

<style scoped>

</style>