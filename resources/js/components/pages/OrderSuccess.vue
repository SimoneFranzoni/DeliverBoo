<template>
  <div>
    <div class="bg">
      <img :src="activeRestaurant.cover" alt="" v-if="activeRestaurant.cover" />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 slider">
          <div class="col-12 central-column">
            <div class="box-ristorante">
              <h2 class="pb-3 fw-bold">Inserisci i dati per la spedizione</h2>
            </div>
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

.del-plate,
.add-plate {
  width: 40px;
  height: 20px;
  display: inline-block;
  font-size: 20px;
  border: 1px solid black;
  line-height: 15px;
  text-align: center;
  border-radius: 8px;
  padding: 0px;
  transition: all 0.2s;
  cursor: pointer;
  &:hover {
    border: 1px solid $primary-color;
    color: $primary-color;
    font-size: 24px;
  }
}
.amount-plates,
.del-plate,
.add-plate {
  width: 40px;
  height: 20px;
  display: inline-block;
  line-height: 15px;
  text-align: center;
  padding: 0px;
}

.bg {
  width: 100%;
  height: 400px;
  position: relative;
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
    position: absolute;
    top: 0;
    left: 0;
    z-index: -100;
    overflow: hidden;
  }
}

.slider {
  position: relative;
  top: -150px;
}

.central-column {
  position: relative;
  padding-bottom: 100px;
  padding-left: 5px !important;
  padding-right: 0px !important;

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
    background-color: white;
    padding-top: 40px;
    top: -150px;

    .row {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding-bottom: 20px;

      .form_payment {
        width: 90%;
        .col-12,
        .col-6 {
          margin: 5px 0px;
        }
        .total-text {
          line-height: 60px;

          h4 {
            font-size: 28px;
            span {
              font-size: 38px;
            }
          }
        }
      }
    }
  }
  .carrello-small{
    padding-top: 30px;
    width: 100%;
        .line {
      background-color: grey;
      width: 100%;
      height: 1px;
      margin: 10px 0;
    }
        .plate-order {
      div {
        padding: 10px 15px;
      }
    }
  }
}

.right-column {
  //   position: absolute;
  //   right: 0px;
  //   top: 0px;

  .carrello {
    // position: relative;
    // top: -10%;
    // top: -150px;
    width: 100%;
    height: fit-content;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
    border-radius: 20px;
    padding-left: 10px;
    background-color: white;
    padding: 40px 20px 20px 20px;

    .line {
      background-color: grey;
      width: 100%;
      height: 1px;
      margin: 10px 0;
    }

    .plate-order {
      div {
        padding: 10px 15px;
      }
    }

    .carrello-empty {
      color: lightgrey;
      height: 220px;
      padding: 20px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      i {
        font-size: 40px;
        color: lightgrey;
      }
      .fake-button {
        background-color: lightgrey;
        color: white;
        height: 33px;
        border-radius: 10px;
        line-height: 33px;
      }
    }
  }
}

.fw-bold {
  font-weight: bold;
}

.carrello-mobile {
  width: 100%;
  height: 75px;
  position: fixed;
  bottom: 0;
  left: 0;
  z-index: 1000;
  margin-top: 100px;
  box-shadow: 0 -3px 10px rgba(0, 0, 0, 0.3);
  background-color: $primary-color;
  margin: 0;
}
</style>
