<template>
    <div class="container">
       <div class="row m-5">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="ask">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" v-model="form.title">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Body</label>
                        <vue-simplemde  v-model="form.body" ref="markdownEditor" />
                    </div>
                        
                    <div class="form-group">
                        <label for="category" style="margin-right:20px">Category</label>
                        <select v-model="form.category_id" id="category" >
                            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>                              
                        </select>
                    </div>

                    <input style="margin-top:20px" type="submit" class="btn btn-outline-success " value="Ask Now">

                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form:{
                title: null,
                body: null,
                category_id: 1
            },
            categories:[],
            errors: {},
        }
    },
    
    created(){
        axios.get('/api/categories')
            .then(res => this.categories = res.data.data)
            .catch(error => console.log(error.response.data))
    },

    methods:{
        ask(){
            axios.post('/api/questions', this.form)
            .then(res => {
                console.log(res.data.slug)
                this.$router.push({ name: 'singleQuestion' , params: {slug : res.data.slug} })
            })
            .catch(error => this.errors = error.response.data.error)
        }
    }
}
</script>

<style scoped>

</style>