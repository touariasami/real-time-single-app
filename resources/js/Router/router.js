import Vue from 'vue'

import VueRouter from 'vue-router';
Vue.use(VueRouter)


import Login from '../components/login/Login.vue'
import Home from '../components/AppHome.vue'



const routes = [
    //{'path': '/', component: Home , name: 'home' },
    {'path': '/login', component: Login, name: 'login' },
]

const router = new VueRouter({
    routes,
    mode: 'history'
})


export default router