<template>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-body">
                            <div class="card-tite">
                                <span class="h4">{{ question.title }}</span>
                                <div>
                                    <span style="color:grey">{{ question.user }} ( {{ question.created_at }} )</span>
                                    <button class="btn btn-success btn-sm float-right">{{ question.replies_count }} Reply</button>
                                </div>
                            </div>
                        <div class="card-text my-3" v-html="body"></div>
                    </div>
                    <div v-if="show">
                        <button @click="remove" class="btn float-right"><i style="color:red" class="fas fa-trash-alt"></i></button>
                        <button @click="edit" class="btn float-right"><i style="color: teal" class="fas fa-pen-alt"></i></button>
                    </div>
                </div>
            </div>



           


            <div class="col-md-7 offset-md-3">
                
                <replies :question="question"></replies>
                
                <new-reply  :slug="question.slug" class="mt-5"></new-reply>
            </div>
        </div>
    </div>
</template>

<script>

import Replies from '../reply/replies'
import NewReply from '../reply/NewReply'

export default {
    props: ['question'],
    
    data(){
        return {
            show: User.id() == this.question.user_id ? true : false,
        }
    },
    
    computed:{
        body(){
            return md.parse(this.question.body)
        }
    },

    methods:{
        remove(){
             axios.delete('/api/questions/'+this.question.slug)
             .then(res => this.$router.push({ name: 'forum'}))
             .catch(error => console.log(error.response.data.error))
        },
        
        edit(){
            EventBus.$emit('startEditting')
        },

    },
    components:{
        Replies,
        NewReply,
    }
}
</script>

<style scoped>

</style>