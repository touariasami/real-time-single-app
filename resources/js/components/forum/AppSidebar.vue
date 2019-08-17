<template>
    <div class=" my-2">
            <ul class="list-group">
                <li class="list-group-item text-center  h5" style="background-color:teal;color:white">Categories</li>
                <li class="list-group-item " v-for="category in categories" :key="category.name">{{ category.name }}</li>
            </ul>
    </div>
</template>

<script>
export default {
    data(){
        return {
            categories: [],
        }
    },

    created(){

        axios.get('/api/categories')
        .then(res => {
            this.categories = res.data.data
        })
        .catch(error => console.log(error.response.data))
                
    },
}
</script>

<style scoped>

</style>