import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import postsIndex from '../components/posts/Index';

const routes = [{
    path: '/home',
    name: 'home.index',
    component: postsIndex
}];

const router = new VueRouter({
  routes,
  hashbang: false,
  mode: 'history'
});

export default router;
