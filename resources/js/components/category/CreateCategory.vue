<template>
    <div class="container">

        <div class="row m-5">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="submit">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" id="name" v-model="form.name">
                    </div>
                    
                    <div class=" text-center">
                        <input v-if="!edittingSlug" style="margin-top:20px" type="submit" class="btn btn-success " value="Create">
                        <input v-else style="margin-top:20px" type="submit" class="btn btn-warning " value="Update">
                    </div>

                </form>

                <div class=" my-5">
                    <ul class="list-group">
                        <li class="list-group-item text-center  h5" style="background-color:teal;color:white">Categories</li>
                        <li class="list-group-item " v-for="(category,index) in categories" :key="category.slug">{{ category.name }}
                            <button @click="remove(category)" class="btn float-right"><i style="color:red" class="fas fa-trash-alt"></i></button>
                            <button @click="edit(category,index)" class="btn float-right"><i style="color: teal" class="fas fa-pen-alt"></i></button>
                        
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data(){
        return {
            form: { name: null },
            categories: [],
            edittingSlug: null,
        }
    },

    created(){
        if( !User.admin() ){
            this.$router.push({ name: 'forum' })
        }
        axios.get('/api/categories')
        .then(res => {
            this.categories = res.data.data
        })
        .catch(error => console.log(error.response.data))
    },

    methods:{
        submit(){
            this.edittingSlug ? this.update() : this.create()
                
        },

        create(){
                axios.post('/api/categories', this.form)
                .then(res => {
                    this.categories.unshift(res.data)
                    this.form.name = null
                })
                .catch(error => console.log(error))
        },
        update(){
                axios.put('/api/categories/'+this.edittingSlug, this.form)
                .then(res => {
                    console.log(res.data)
                    this.categories.unshift(res.data)
                    this.form.name = null
                    this.edittingSlug = null
                })
                .catch(error => console.log(error))
        },

        remove(category){
            axios.delete('/api/categories/'+category.slug)
            .then(res => {
                this.categories =  this.categories.filter(element => element.id !== category.id)
            })
            .catch(error => console.log(error.response.data))
        },

        edit(category,index){
            this.edittingSlug = category.slug 
            this.form = category
            this.categories.splice(index,1)
        }
    }
}
</script>

<style scoped>

</style>