import Vue from 'vue'

import VueRouter from 'vue-router';
Vue.use(VueRouter)


import Login from '../components/login/Login.vue'
import Logout from '../components/login/Logout.vue'
import SignUp from '../components/login/SignUp.vue'
import Forum from '../components/forum/Forum.vue'
import singleQuestion from '../components/forum/SingleQuestion.vue'
import AskQuestion from '../components/forum/AskQuestion.vue'
import CreateCategory from '../components/category/CreateCategory.vue'


const routes = [
    
    {'path': '/login', component: Login, name: 'login' },
    {'path': '/logout', component: Logout, name: 'logout' },
    {'path': '/signup', component: SignUp , name: 'home' },
    {'path': '/forum', component: Forum , name: 'forum' },
    {'path': '/questions/:slug', component: singleQuestion , name: 'singleQuestion'},
    {'path': '/ask', component: AskQuestion , name: 'askQuestion'},
    {'path': '/category/create', component: CreateCategory , name: 'createCategory'}
]

const router = new VueRouter({
    routes,
    mode: 'history'
})


export default router