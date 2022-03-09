<template>
  <div class="container">

    <!-- header da home.blade.php per controlli auth-->

    <!-- jumbotron con ricerca-->
    <Jumbotron @triggerSearch="triggerSearch"/>


    <!-- ristoranti random -->
    <h3 class="marg">Le nostre selezioni</h3>
    <div class="row">
      <div class="restbox col-xs-6 col-md-4 col-lg-2"
      v-for="(rest, index) in randomRestaurants"
      :key="`randomrest${index}`"
      >
      <router-link @click.native="resetStorage()" :to="{name:'restaurantdetail', params: {slug: rest.slug}}">
        <img :src="rest.cover" :alt="rest.name">
        <div class="title">
          {{rest.name}}
        </div>
      </router-link> 
      </div>
    </div>


    <!-- elenco tipologie -->
    <h3>Non sai cosa scegliere? Dai un'occhiata</h3>
    <div class="types-wrapper">
        <div class="type"
        v-for="(type, index) in types" 
        :key="`type${index}`"
        v-show="type.isVisible">
      <router-link class="type-link" :to="{name: 'restaurants', params: {slug: type.slug}}">
      <!-- <router-link class="type-link" :to="{name: 'restaurants' }"> -->
        <span v-if="type.isVisible">
          {{type.name}}
        </span>
      </router-link>
        </div>
    </div>


    <!-- footer da home.blade.php-->


    
  </div>
</template>

<script>
import Jumbotron from '../partials/Jumbotron.vue'

export default {
  name: 'Home',
  components: {
    Jumbotron,
  
  },
  mounted(){
    this.getApiTypes();
    this.getApiRestaurants();
  },
  data(){
    return {
      types: [],
      type: {},
      restaurants: [],
      randomRestaurants: []
    }
  },
  methods: {
    getApiTypes() {
      this.types = [];
      axios.get('http://127.0.0.1:8000/api/tipo/')
      .then(res => {
        this.types = res.data.types;
      // console.log(this.types);
      })
    },

    getApiRestaurants() {
      this.restaurants = [];
      axios.get('http://127.0.0.1:8000/api/ristoranti/')
      .then(res => {
        this.restaurants = res.data.restaurants;
        this.getRandomRestaurants();
      })
    
    },

    getRandomRestaurants() {
      let count = 0;
      let randomNumb = 0;
      let randomRestaurant= {};

      for (count = 0; count < 6; count++) {
        randomNumb = this.getRandomNumber(0, this.restaurants.length);
        randomRestaurant = this.restaurants[randomNumb];
        if (!this.randomRestaurants.includes(randomRestaurant) && randomRestaurant != undefined) {
          this.randomRestaurants.push(randomRestaurant)
        } else {
          count--
        }
      }

    },

    triggerSearch(searchedValue) {
      for (let type of this.types) {

        if (!type.name.toLowerCase().includes(searchedValue.toLowerCase())) {
          type.isVisible = false;
        }
        if (searchedValue === '') {
          type.isVisible = true;
        }
      }
    },
    getRandomNumber(min, max) {
           return Math.floor(Math.random() * (max - min + 1) + min);
        },

        resetStorage(){
          console.log('Click Reset Storage');
          window.localStorage.clear();
        }
    
  }
}
</script>

<style lang="scss">
@import '../../../sass/_variables.scss';
  h3 {
    &.marg {
      margin-top: 180px;
    }
    &:not(.marg) {
      margin-top: 100px;
    }
    font-weight: bold;
    font-size: 32px;
    color: $footer-dark;
  }

  .restbox {
    border-radius: 15px;
    transition: all .3s;
    margin-bottom: 25px;
    cursor: pointer;
    img {
      border-radius: 15px;
      width: 100%;
      height: 90%;
      object-fit: cover;
    }
    &:hover {
      transform: scale(1.05);
    }
    .title {
      font-weight: bold;
      font-size: 17px;
    }
    a, a:visited {
      color: $footer-dark;
    }
  }

  .types-wrapper {
    
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
    padding-bottom: 150px;
    .type {
      router-link {
        span {
          display: inline-block;
          cursor: pointer;
        }
      }
      padding: 0 5px;
      background-color: #eeebeb;
      transition: all .2s;
      &:hover {
        background-color: lighten(#eeebeb, 2.5);
        transform: scale(1.1);
        border-radius: 10px;
      }
    }
  }

@media screen and (max-width:768px) {
  .restbox:hover {
    transform: none;
  }
}


</style>