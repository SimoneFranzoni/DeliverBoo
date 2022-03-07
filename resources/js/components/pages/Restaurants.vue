<template>
<div class="wrapper">

    <div class="container">
         <div>Scelti per te</div>
        <div class="row types-row pb-4">
            <div class="typebox"
            v-for="(type, index) in randomTypes"
            :key="`randomType${index}`"
            @click="changeActiveRestaurants(type)">
                <div class="title">{{type.name}}</div>
            </div>
            
        </div>
        <div class="row">
            <div class="d-none d-lg-block col-3 filter-column">
                <div>Tutte le cucine (A, Z)</div>
                <ul class="filter-list">
                    <li v-for="(type, index) in types" 
                    :key="`type${index}`"
                    @click="changeActiveRestaurants(type), counter = index"
                    :class="{active: counter === index}">
                  
                        <span>v</span>
                        {{type.name}}

                    </li>
                </ul>
            </div>
            
            <div v-if="filter_close">
                        <div @click="toggleMenu" class="filter d-block d-lg-none ml-3">Filtri</div>
                    </div>
                    <div v-else>
                        <div class="hamburger">
                            <div @click="toggleMenu" class="filter">X</div>
                            <div>Tutte le cucine (A, Z)</div>
                                <ul class="filter-list">
                                    <li v-for="(type, index) in types" 
                                    :key="`type${index}`"
                                    @click="changeActiveRestaurants(type), counter = index"
                                    :class="{active: counter === index}">
                                
                                        <span>v</span>
                                        {{type.name}}

                                    </li>
                                </ul>
                        </div>
                    </div>
                    

            <div class="col-12 col-lg-9 restaurant-column">
                <div class="search-input">
                    <input type="text" name="restsearch" placeholder="Cerca qui una tipologia di ristorante...">
                    <router-link :to="{name: 'restaurants'}">
                        <div class="ac-btn">Vai</div>
                    </router-link>
                </div>

                <div class="pt-4"> {{activeRestaurants.length}} risultati trovati </div>
                

                <div class="restaurant-box-row">
                    <RestaurantBox 
                        v-for="restaurant in activeRestaurants" 
                        :key="restaurant.id" 
                        :restaurant="restaurant"
                        :type="activeType"/>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>

import RestaurantBox from '../partials/RestaurantBox.vue';

export default {
    name: 'Restaurants',
    components:  {
        RestaurantBox,
    },
    mounted(){
        this.getApiTypes();
        this.getActiveRestaurants();
    },
    data(){
        return {
            types: [],
            randomTypes: [],
            activeRestaurants: [],
            activeRestaurantsUrl: 'http://127.0.0.1:8000/api/ristoranti/tiporistorante/',
            activeType: {},
            counter: -1,
            filter_close: false,
        }
    },
    methods: {
        getApiTypes() {
            this.types = [];
            axios.get('http://127.0.0.1:8000/api/tipo/')
            .then(res => {
                this.types = res.data.types;
                for (let type of this.types) {
                  if(type.slug === this.$route.params.slug) {
                    this.counter = type.id-1;
                  }
                }
                this.getRandomTypes();

            })
        },
        getRandomTypes() {
          // console.log(this.types);
          let count = 0;
          let randomNumb = 0;
          let randomType = {};
          for (count = 0; count < 8; count++) {
            randomNumb = this.getRandomNumber(0, this.types.length);
            randomType = this.types[randomNumb];
            console.log(randomNumb);
            console.log(randomType);
            if (!this.randomTypes.includes(randomType)) {
              this.randomTypes.push(randomType)
            } else {
              count--
            }
          }
          console.log('RANDOM TYPES >>>', this.randomTypes);

        },
        getActiveRestaurants() {
          this.activeRestaurants = [];
          this.activeType = {};
          axios.get(this.activeRestaurantsUrl + this.$route.params.slug)
          .then(res => {
            this.activeRestaurants = res.data.type.restaurants;
            this.activeType = res.data.type;
          })
        },
        changeActiveRestaurants(type) {
          axios.get(this.activeRestaurantsUrl + type.slug)
          .then(res => {
            this.activeRestaurants = res.data.type.restaurants;
            this.activeType = res.data.type;
          })
          this.$router.push(type.slug);
        },

        getRandomNumber(min, max) {
           return Math.floor(Math.random() * (max - min + 1) + min);
        },
        
        toggleMenu(){
            if(this.filter_close === true){
                this.filter_close = false;
            } else {
                this.filter_close = true;
            }
        }
    }
}

</script>

<style scoped lang="scss">

@import '../../../sass/_variables.scss';

  .wrapper {
    padding-top: 50px;
    .filter-column{
        width: 100%;
        height: 700px;
        overflow-y: auto;
        z-index: 1;
    }

    .filter-list{
        li{
            border-radius: 20px;
            border: 0.5px solid grey;
            padding: 10px;
            margin: 10px 0;
            z-index: 3;  
            cursor: pointer;
                &:active{
                    border: 1px solid black;
                    font-weight: bold;
                    font-size: 18px;
                }

                span{
                    transition: opacity 0.5s ease-out;
                    opacity: 0;
                    height: 0;
                    overflow: hidden;
                    color: $primary-color;
                }   

                &:hover{
                    transform: translate(20px);
                    transition: transform 0.5s;

                span{
                    opacity: 1;
                    height: auto;
                }
            }
        }
    }

    .filter{
            background-color: $primary-color;
            color: white;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            padding-top: px;
            border-radius: 10px;
            width: 70px;
            height: 35px;
        
        }

    .hamburger{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: white;
            z-index: 2000;
            overflow-y: auto;
            margin: 20px 0;
        }

    .restaurant-column{
        z-index: 1;
        height: 700px;
        overflow-y: auto;
        
        .restaurant-box-row{
            display: flex;
            flex-direction: column;
            justify-content: center;
            
        }
    }

    .search-input {
        display: flex;
        align-items: center;
        width: 100%;
        
        input {
            width: 90%;
            margin-right: 5px;
            padding: 5px 10px;
            border-radius: 10px;
            border: 1px solid rgba($color: #000000, $alpha: .3);
            caret-color: $primary-color;
            
            &:focus {
                outline: 2px solid $primary-color;
            }
        }
        
        .ac-btn {
            width: 60px;
            text-align: center;
            font-size: 16px;
        }
    }


    //il css relativo ai box delle type inizia qui
    .types-row{
        width: 100%;
        height: 150px;
        //allinea le box con il titolo sopra
        margin: 0 1px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: nowrap;    
    }

    .typebox{
        height: 100px;
        width: 180px;
        border-radius: 20px;
        background-color: $primary-color;
        box-shadow: 0 1px 2px rgba(0,0,0,0.15);
        //transition: box-shadow 1s ease-in-out;
        margin-right: 10px;
        transition: transform 0.3s;
        position: relative;
        cursor: pointer;

        .title{
            position: absolute;
            bottom: 5%;
            left: 5%;
            font-size: 15px;
            color: white;
        }
    }

    .typebox:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        transform: scale(1.05, 1.1);
        font-weight: bold;
    }

  }

</style>