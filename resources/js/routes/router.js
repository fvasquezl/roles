import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import homeIndex from '../components/posts/Index';
import postsEdit from '../components/posts/Edit';

const routes = [{
    path: '/home',
    name: 'home.index',
    component: homeIndex
}, {
    path: '/posts/edit',
    name: 'posts.edit',
    component: postsEdit
}

];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
});

export default router;
