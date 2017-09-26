import $ from 'jquery'

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import page_index from '../components/page_index';
import page_service from '../components/page_service';
// import page_works from '../components/page_work';
// import page_works_indep from '../components/page_work_indep';

import page_artist from '../components/page_artist';
import page_artist_indep from '../components/page_artist_indep';

import page_works from '../components/page_works';
import page_works_indep from '../components/page_works_indep';

import page_blog from '../components/page_blog';
import page_post_indep from '../components/page_post_indep';

import page_contact from '../components/page_contact';

const routes = [
  { path: '/', component: page_index },
  { path: '/index', component: page_index },
  { path: '/service', component: page_service },

  { path: '/works', component: page_works },
  { path: '/works/:wkid', component: page_works_indep ,props: true},

  { path: '/artist', component: page_artist},
  { path: '/artist/:wkid', component: page_artist_indep ,props: true},
  { path: '/blog', component: page_blog },
  { path: '/blog/:wkid', component: page_post_indep ,props: true},
  { path: '/contact', component: page_contact }
]

const router = new VueRouter({
  routes,
  mode: "history"
})
router.beforeEach((to, from, next) => {
  $(".pages_area").animate({scrollTop: 0});
  next()
})


export default router;