import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import homeIndex from '../views/posts/Index';
import postsEdit from '../views/posts/Edit';

const routes = [{
    path: '/',
    name: 'posts',
    props: true,
    component: homeIndex
}, {
    path: '/post/:slug/edit',
    name: 'post.edit',
    props: true,
    component: postsEdit
}

];

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'
});

export default router;
