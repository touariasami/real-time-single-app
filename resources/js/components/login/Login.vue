<template>
    <div class="container">

        <div class="row m-5">
            <div class="col-md-8 offset-2">
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="form.email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" v-model="form.password">
                    </div>
                    
                    <button style="margin-top:20px" class="btn btn-outline-success form-control">Login</button>
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
                email: null,
                password: null
            }
        }
    },

    methods:{
        login(){
            User.login(this.form)
        }
    }
}
</script>

<style scoped>

</style>