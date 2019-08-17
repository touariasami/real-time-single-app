<template>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-9">
                <question v-for="question in questions" :key="question.path" :question="question"></question>
            </div>
            <div class="col-md-3">
                <app-sidebar></app-sidebar>
            </div>
        </div>
    </div>
</template>

<script>

import Question from './Question.vue'
import AppSidebar from './AppSidebar.vue'

export default {
    data(){
        return {
            questions:[],
            categories: [],
        }
    },

    created(){

        axios.get('/api/categories')
        .then(res => this.categories = res.data.data)
        .catch(error => console.log(error.response.data))
        
        axios.get('/api/questions')
        .then(res => this.questions = res.data.data )
        .catch(error => console.log(error.response.data))
        
    },

    methods:{

    },

    components:{ 
        question:Question,
        AppSidebar,
    },
}
</script>

<style scoped>

</style>