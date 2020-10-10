require('./bootstrap');

window.Vue = require('vue');

import Vue from "vue";
import VueRouter from "vue-router";
import Users from './components/Users';
import Admin from './components/Admin';
import Groupes from './components/Groupes';
import UsersUpdate from './components/UserUpdate';
import GroupesUpdate from './components/GroupesUpdate';
import AddGroupe from "./components/AddGroupe";
import AddGroupeUser from "./components/AddGroupeUser";

Vue.use(VueRouter)

const routes = [
    { path: '/admin/users', component: Users },
    { path: '/admin/groupes', component: Groupes },
    { path: '/admin/usersupdate/:user_id', component: UsersUpdate },
    { path: '/admin/groupesupdate/:groupe_id', component: GroupesUpdate },
    { path: '/admin/addgroupe',component: AddGroupe },
    { path: '/admin/addgroupeuser/:groupe_id',component: AddGroupeUser }
]

const router = new VueRouter({
    routes,
    mode: 'history'// short for `routes: routes`
})

const app = new Vue({
    router,
    components:{
        'admin':Admin
    }
}).$mount('#app')
