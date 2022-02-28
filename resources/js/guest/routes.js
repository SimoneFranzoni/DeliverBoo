import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

//import vari
import Home from '../components/pages/Home';


import Error404 from '../components/pages/Error404'

const router = new VueRouter({
  mode: 'history',
  linkExactActiveClass: 'active',
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },

    
    {
      path: '*',
      component: Error404
    }
    
  ]
})

export default router;