<template>
    <div class="card my-2">
        <div class="card-body">
            <div class="card-tite">
                <router-link :to="question.path" class="h4">{{ question.title }}</router-link>
                <span class="float-right" style="color:grey">{{ question.user }} ( {{ question.created_at }} )</span>
            </div>
            <div class="card-text my-3" v-html="body"></div>
        </div>
    </div>
</template>

<script>
export default {
    props:['question'],
    data(){
        return {

        }
    },
    computed:{
        body(){
            return md.parse(this.question.body)
        }
    }
}
</script>

<style scoped>

    a {
        /*
        color: #38c171;
        */
        color: teal
    }
</style>