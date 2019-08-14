<template>
    <div class="container">

        <div class="row m-5">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="form.email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" v-model="form.password">
                    </div>
                    
                    <input style="margin-top:20px" type="submit" class="btn btn-outline-success " value="Login">
                    <button style="margin-top:20px" @click="signup" class="btn btn-success ">Sign Up</button>

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
    created(){
        if( User.loggedIn()){
            this.$router.push({ name: 'forum'})
        }
    },
    methods:{
        login(){
            User.login(this.form)
        },

        signup(){
            this.$router.push('/signup')
        }
    }
}
</script>

<style scoped>

</style>