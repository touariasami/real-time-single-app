<template>
    <div class="">
        <div class="card mt-2">
            <div class="card-body">
                    <div class="card-tite">
                        <div style="font-weight:bold">
                            <span style="color:#808080">{{ data.user }} <span >( {{ data.created_at }} )</span>    </span>
                            <like class="float-right" :content="data"></like> 
                        </div>
                    </div>

                <edit-reply v-if="editing" :reply="data"></edit-reply>
                <div v-else class="card-text my-3" v-html="reply"></div>
            </div>
            
            <div v-if="!editing">
                <div v-if="show">
                    <button @click="remove" class="btn float-right"><i style="color:red" class="fas fa-trash-alt"></i></button>
                    <button @click="edit" class="btn float-right"><i style="color: teal" class="fas fa-pen-alt"></i></button>
                </div>
            </div>

                            
        </div>
    </div>
</template>

<script>


import EditReply from '../reply/EditReply'
import Like from '../likes/Like'
export default {
    props: ['data','index'],
    data(){
        return {
            editing: false
        }
    },
    
    created(){
        EventBus.$on('cancelEditing', () => {
            this.editing = false
        })

    },

    computed:{
        show(){
            return User.id() == this.data.user_id ? true : false
        },

        reply(){
            return md.parse(this.data.reply)
        }
    },

    methods:{
        edit(){
            //EventBus.$emit('editReply', this.editing)
            this.editing = true
        },

        remove(){
            EventBus.$emit('deleteReply', this.index)
        },
    },
    components:{
        EditReply,
        Like
    }
}
</script>

<style scoped>

</style>