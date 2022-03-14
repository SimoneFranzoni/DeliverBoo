<template>
  <div class="container" >

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
      <router-link  :to="{name:'restaurantdetail', params: {slug: rest.slug}}">
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
    console.log(this.isLoaded);
    this.isLoaded = false;
    this.getApiTypes();
    this.getApiRestaurants();
    this.isLoaded = true;
    console.log(this.isLoaded);
  },
  data(){
    return {
      types: [],
      type: {},
      restaurants: [],
      randomRestaurants: [],
      isLoaded: false
    }
  },
  methods: {
    getApiTypes() {
      this.isLoaded = false
      this.types = [];
      axios.get('http://127.0.0.1:8000/api/tipo/')
      .then(res => {
        this.types = res.data.types;
        this.isLoaded = true;
      // console.log(this.types);
      })
    },

    getApiRestaurants() {
      this.isLoaded = false
      this.restaurants = [];
      axios.get('http://127.0.0.1:8000/api/ristoranti/')
      .then(res => {
        this.restaurants = res.data.restaurants;
        this.getRandomRestaurants();
        this.isLoaded = true
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

    // confirmChange() {
    //   let text = 'Attenzione! Se cambi ristorante perderai quello che hai messo nel carrello.';

    //     if (!confirm(text)) {
    //       history.back()
    //     }
    // }
    
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
    max-height: 140px;
    img {
      height: 140px;
      overflow: hidden;
      border-radius: 15px;
      width: 100%;
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

  .restbox {
    border-radius: 15px;
    transition: all .3s;
    cursor: pointer;
    max-height: 300px;
  }

  .restbox img {
      height: 300px;
      overflow: hidden;
      border-radius: 15px;
      width: 100%;
      object-fit: cover; 
  }

  .restbox:hover {
    transform: none;
  }

  .restbox .title {
    font-size: 20px;
  }
}





@media screen and (max-width: 992px) {
  .restbox {
    margin-bottom: 50px;
  }
  
}


</style>