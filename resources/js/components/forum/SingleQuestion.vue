<template>
    <div v-if="question">
        <edit-question :question="question" v-if="editting"></edit-question>
        <show-question v-else :question="question" ></show-question>
    </div>
</template>

<script>

import ShowQuestion from './ShowQuestion.vue'
import EditQuestion from './EditQuestion.vue'

export default {
    data(){
        return {
            question: null,
            editting: false,
        }
    },

    created(){

        EventBus.$on('cancelEditting', () => {
            this.editting = false
        } )
        
        EventBus.$on('startEditting', () => {
            this.editting = true
        })

        axios.get('/api/questions/'+ this.$route.params.slug)
            .then(res => {
                this.question = res.data.data
            })
            .catch(error => console.log(error.response.dara))
    },

    components:{
        ShowQuestion,
        EditQuestion,
    }
}
</script>

<style scoped>

</style>