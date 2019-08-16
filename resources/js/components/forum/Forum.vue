<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <question v-for="question in questions" :key="question.path" :question="question"></question>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</template>

<script>

import Question from './Question.vue'

export default {
    data(){
        return {
            questions:[]
        }
    },

    created(){
        axios.get('/api/questions')
        .then(res => {
            this.questions = res.data.data   
        })
        .catch(error => console.log(error.response.data))
        
    },

    methods:{

    },

    components:{ 
        question:Question
    },
}
</script>

<style scoped>

</style>