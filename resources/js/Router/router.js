import Vue from 'vue'

import VueRouter from 'vue-router';
Vue.use(VueRouter)


import Login from '../components/login/Login.vue'
import Logout from '../components/login/Logout.vue'
import SignUp from '../components/login/SignUp.vue'
import Forum from '../components/forum/Forum.vue'



const routes = [
    
    {'path': '/login', component: Login, name: 'login' },
    {'path': '/logout', component: Logout, name: 'logout' },
    {'path': '/signup', component: SignUp , name: 'home' },
    {'path': '/forum', component: Forum , name: 'forum' },
]

const router = new VueRouter({
    routes,
    mode: 'history'
})


export default router