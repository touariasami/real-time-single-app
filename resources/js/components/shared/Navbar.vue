<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <router-link style="color: #808080" :to="'/'"><a class="navbar-brand">RealTime App</a></router-link>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto "></ul>

            <ul class="navbar-nav ">
                <router-link 

                    v-for="item in items"
                    :key="item.title"
                    v-if="item.show"
                    :to="item.to"  
                    active-class="active" exact tag="li">
                    <a class="nav-link">{{ item.title }}</a>
                </router-link>
                
                <!--
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                -->
            
            </ul>

            
            </div>
        </div>
    </nav>

</template>

<script>
export default {
    data(){
        return {
            items: [
                { title: 'Forum', to: '/forum' , show: true },
                { title: 'Ask Question', to: '/ask' , show: User.loggedIn() },
                { title: 'Category', to: '/category' , show: User.loggedIn() },
                { title: 'Login', to: '/login' , show: !User.loggedIn() },
                { title: 'Logout', to: '/logout' , show: User.loggedIn() },
            ]
        }
    },
    created(){
        EventBus.$on('logout', () => {
            User.logout()
        })
    }
}
</script>


<style scoped>

</style>