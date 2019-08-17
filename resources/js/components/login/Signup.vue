<template>
    <div class="container">

        <div class="row m-5">
            <div class="col-md-6 offset-3">
                <form @submit.prevent="signup">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" v-model="form.name">
                        <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="form.email">
                        <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" v-model="form.password">
                        <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>

                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation">
                    </div>
                    
                    <button style="margin-top:20px" class="btn btn-outline-success form-control">Create Account</button>

                </form>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    data(){
        return {
            form:{},
            errors:{}
        }
    },
    created(){
        if( User.loggedIn()){
            this.$router.push({ name: 'forum'})
        }
    },
    methods:{
        signup(){
            axios.post('/api/auth/signup', this.form)
            .then(res => {
                User.responseAfterLogin(res)
                this.$router.push({ name: 'forum'})
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style scoped>

</style>