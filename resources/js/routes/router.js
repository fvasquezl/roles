import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import homeIndex from '../components/posts/Index';
import postsEdit from '../components/posts/Edit';

const routes = [{
    path: '/',
    name: 'home',
    component: homeIndex
}, {
    path: '/post/:slug/edit',
    name: 'post.edit',
    component: postsEdit
}

];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
});

export default router;
