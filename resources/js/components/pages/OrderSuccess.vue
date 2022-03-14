<template>
  <div class="payment-success">
    <div class="bg">
      <img :src="activeRestaurant.cover" alt="" v-if="activeRestaurant.cover" />
    </div>
    <div class="container">
      <div class="col-6">
        <div class="box-ristorante">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path
              d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"
            />
          </svg>
          <h2 class="fw-bold">PAGAMENTO AVVENUTO CON SUCCESSO</h2>
          <h5>
            Riceverai a breve il tuo ordine.
          </h5>
          <h5>Grazie per averci scelto!</h5>
          <div class="all">
            <router-link :to="{ name: 'restaurantsAll' }">
              <div class="ac-btn  px-5">Torna ai ristoranti</div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PlateBox from "../partials/PlateBox.vue";

export default {
  name: "OrderSuccess",
  components: {
    PlateBox,
  },
  data() {
    return {
      apiUrl: "http://127.0.0.1:8000/api/ristoranti/",
      activeRestaurant: {},
      plates: [],
      plate: {},
      itemsArray: [],
      cart: JSON.parse(localStorage.getItem("items")),
    };
  },
  mounted() {
    this.getActiveRestaurant();
  },
  methods: {
    getActiveRestaurant() {
      this.activeRestaurant = {};
      axios.get(this.apiUrl + this.$route.params.slug).then((res) => {
        this.activeRestaurant = res.data.restaurant;

        this.plates.push(this.activeRestaurant.plates);
      });
    },
  },
};
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

.payment-success {
  position: relative;

  .bg {
    width: 100%;
    height: 80vh;
    position: absolute;
    z-index: -100;
    display: flex;
    align-items: center;
    justify-content: center;
    // background-color: $primary-color;
    img {
      object-fit: cover;
      display: block;
      width: 100%;
      height: 100%;
      z-index: -100;
      overflow: hidden;
    }
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 80vh;
    .col-6 {
      width: 100%;
      .box-ristorante {
        // position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        // padding: 40px 0;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;

        svg {
          fill: $primary-color;
          width: 80px;
          position: relative;
          top: -40px;
        }
        h2 {
          position: relative;
          top: -20px;
          font-size: 28px;
          span {
            font-size: 38px;
          }
        }
        .all {
          margin-top: 15px;
        }
      }
    }
  }

  .fw-bold {
    font-weight: bold;
    z-index: 10000;
  }
}
</style>
