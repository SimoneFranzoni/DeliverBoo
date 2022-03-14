<template>
  <div class="wrapper">
    <div class="container">
      
      <div class="row">
        <div class="d-none d-lg-block col-3 filter-column">
          <div class="all">Tutte le cucine (A, Z)</div>
          
          <ul class="filter-list">
            <router-link :to="{name: 'restaurants', params: {slug: type.slug}}"
              v-for="(type, index) in types"
              :key="`type${index}`"
              @click="
                changeActiveRestaurants(type),
                  (counter = index),
                  (randomTypeCounter = -1)
              "
              :class="{ active: counter === index }"
            >
              {{ type.name }}
            </router-link>
          </ul>
        </div>

        <div v-if="filter_close">
          <div @click="toggleMenu" class="filter d-block d-lg-none ml-3">
            <i class="fas fa-filter"></i>
          </div>
        </div>
        <div v-else>
          <div class="hamburger px-2">
            <div @click="toggleMenu" class="filter">X</div>
            <div>Tutte le cucine (A, Z)</div>
            <ul class="filter-list">
              <router-link :to="{name: 'restaurants', params: {slug: type.slug}}"
              v-for="(type, index) in types"
              :key="`type${index}`"
              @click="
                changeActiveRestaurants(type),
                  (counter = index),
                  (randomTypeCounter = -1)
              "
              :class="{ active: counter === index }"
              >
                {{ type.name }}
              </router-link>
            </ul>
          </div>
        </div>

        <div class="col-12 col-lg-9 restaurant-column">
          <div class="pt-4">
            {{ restaurants.length }} risultati trovati
          </div>

          <div class="restaurant-box-row">
            <RestaurantBox
              v-for="(restaurant, index) in restaurants"
              :key="`restaurant${index}`"
              :restaurant="restaurant"
              :types="types"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import RestaurantBox from "../partials/RestaurantBox.vue";

export default {
  name: "Restaurants",
  components: {
    RestaurantBox,
  },
  mounted() {
    this.getApiTypes();
    this.getActiveRestaurants();
  },
  data() {
    return {
      types: [],
      randomTypes: [],
      restaurants: [],
      restaurantsUrl:
        "http://127.0.0.1:8000/api/ristoranti/",
      activeType: {},
      counter: -1,
      filter_close: true,
      randomTypeCounter: -1,
      isLoaded: false,
    };
  },
  methods: {
    getApiTypes() {
      this.types = [];
      axios.get("http://127.0.0.1:8000/api/tipo/").then((res) => {
        this.types = res.data.types;
        for (let type of this.types) {
          if (type.slug === this.$route.params.slug) {
            this.counter = type.id - 1;
          }
        }
        this.getRandomTypes();
      });
    },
    getRandomTypes() {
      console.log("TIPI >>>>", this.types);
      let count = 0;
      let randomNumb = 0;
      let randomType = {};
      for (count = 0; count < 8; count++) {
        randomNumb = this.getRandomNumber(0, this.types.length);
        randomType = this.types[randomNumb];
        if (!this.randomTypes.includes(randomType) && randomType != undefined) {
          this.randomTypes.push(randomType);
        } else {
          count--;
        }
      }
      console.log("RANDOM TYPES >>>", this.randomTypes);
    },
    getActiveRestaurants() {
      this.isLoaded = false;
      this.restaurants = [];
      this.activeType = {};
      axios
        .get(this.restaurantsUrl)
        .then((res) => {
          this.restaurants = res.data.restaurants;
          this.isLoaded = true;
        });
    },
    changeActiveRestaurants(type) {
      this.isLoaded = false;
      axios.get(this.activeRestaurantsUrl + type.slug).then((res) => {
        this.activeRestaurants = res.data.type.restaurants;
        this.isLoaded = true;
        if (this.isLoaded) this.activeType = res.data.type;
      });
      this.$router.push(type.slug);
    },

    getRandomNumber(min, max) {
      return Math.floor(Math.random() * (max - min + 1) + min);
    },

    toggleMenu() {
      if (this.filter_close === true) {
        this.filter_close = false;
      } else {
        this.filter_close = true;
      }
    },
  },
};
</script>

<style scoped lang="scss">
@import "../../../sass/_variables.scss";

.wrapper {
  padding-top: 50px;
  .filter-column {
    width: 100%;
    height: 700px;
    overflow-y: auto;
    z-index: 1;
  }
  
  .filter-list {
    display: flex;
    flex-direction: column;
    li, a, a:visited {
      color: black;
      border-radius: 20px;
      border: 0.5px solid grey;
      padding: 10px;
      margin: 5px 0;
      z-index: 3;
      cursor: pointer;
      transition: all 0.2s;
      &.active {
        transform: translate(8px);
        border: none;
        font-weight: bold;
        font-size: 18px;
        background-color: $primary-color;
        color: white;
      }
      &:hover {
        transform: translate(8px);
        border: none;
        font-weight: bold;
        font-size: 18px;
        background-color: $primary-color;
        color: white;

      }
    }
  }

  .filter {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $primary-color;
    color: white;
    font-size: 18px;
    cursor: pointer;
    text-align: center;
    margin-bottom: 15px;
    padding: 5px;
    border-radius: 10px;
    width: 70px;
    height: 35px;
  }

  .hamburger {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background-color: white;
    z-index: 2000;
    overflow-y: auto;
    margin: 20px 0;
    .filter-list {
      z-index: 2000;
    }
  }

  .restaurant-column {
    z-index: 1;
    height: 700px;
    overflow-y: auto;

    .restaurant-box-row {
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
      border: 1px solid rgba($color: #000000, $alpha: 0.3);
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
  .types-row {
    width: 100%;
    height: 150px;
    //allinea le box con il titolo sopra
    margin: 0 1px;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: nowrap;
    scrollbar-width: none;
    overflow-y: scroll;
  }

  .typebox {
    display: flex;
    justify-content: center;
    align-items: flex-end;
    text-align: center;
    height: 100px;
    width: 180px;
    min-width: 100px;
    border-radius: 20px;
    background-color: $primary-color;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
    //transition: box-shadow 1s ease-in-out;
    margin-right: 10px;
    transition: transform 0.3s;
    position: relative;
    overflow: hidden;
    cursor: pointer;

    &.active {
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      transform: scale(1.05, 1.1);
      font-weight: bold;
      border: 2px solid white;
    }

    .boximg_f {
      position: absolute;
      top: 0px;
      left: 0px;
      height: 100px;
      width: 180px;
      z-index: 100;

      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
      }
    }

    .title {
        width: 100%;
      font-size: 15px;
      color: white;
      z-index: 200;
      background-color: $primary-color;
    }
  }

  .typebox:hover {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    transform: scale(1.05, 1.1);
    font-weight: bold;
  }
}
</style>
