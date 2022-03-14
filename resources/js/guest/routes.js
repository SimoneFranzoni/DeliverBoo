import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

//import vari
import Home from '../components/pages/Home';
import Restaurants from '../components/pages/Restaurants.vue';
import RestaurantsAll from '../components/pages/RestaurantsAll.vue';
import Restaurantdetail from '../components/pages/Restaurantdetail.vue';
import Payment from '../components/pages/Payment.vue';
import OrderSuccess from '../components/pages/OrderSuccess.vue';

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
      path: '/restaurants/:slug',
      name: 'restaurants',
      component: Restaurants,
    },
    {
      path: '/restaurants/',
      name: 'restaurantsAll',
      component: RestaurantsAll,
    },
    {
      path: '/restaurantdetail/:slug',
      name: 'restaurantdetail',
      component: Restaurantdetail,
      beforeEnter: (to, from, next) => {
        let text = 'Attenzione! Se cambi ristorante perderai quello che hai nel carrello.';
        if (localStorage.getItem('items') !== null ) {
          if(confirm(text)) {
            next()
          } else {
            next(false)
          }
        } else next()
      }
    },
    {
      path: '/payment/:slug',
      name: 'payment',
      component: Payment
    },
    {
      path: '/order/:slug',
      name: 'orderSuccess',
      component: OrderSuccess
    },
    {
      path: '*',
      component: Error404
    },
    
  ]
})

export default router;