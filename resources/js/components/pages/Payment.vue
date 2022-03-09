<template>
  <div>
    <div class="bg">
      <img :src="activeRestaurant.cover" alt="" v-if="activeRestaurant.cover" />
    </div>
    <div class="container">
      <div class="row">
        <div class="col-8 col-md-8 col-lg-8 central-column">
          <div class="box-ristorante">
            <h2 class="pb-3">Inserisci i dati per la spedizione</h2>
            <div class="row">
              <!-- FORM -->
              <form action="" class="form_payment">
                <div class="row">
                  <!-- Nome -->
                  <div class="col-6">
                    <label for="validationCustom01" class="form-label"
                      >Nome</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="validationCustom01"
                      value="Inserisci il nome"
                      required
                    />
                    <div class="valid-feedback">Looks good!</div>
                  </div>

                  <!-- Cognome -->
                  <div class="col-6">
                    <label for="validationCustom02" class="form-label"
                      >Cognome</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="validationCustom02"
                      value="Inserisci il cognome"
                      required
                    />
                    <div class="valid-feedback">Looks good!</div>
                  </div>

                  <!-- Città -->
                  <div class="col-6">
                    <label for="validationCustom02" class="form-label"
                      >Indirizzo:</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="validationCustom02"
                      value="Inserisci un indirizzo"
                      required
                    />
                    <div class="valid-feedback">
                      Inserire un indirizzo valido!
                    </div>
                  </div>

                  <!-- CAP -->
                  <div class="col-6">
                    <label for="validationCustom02" class="form-label"
                      >CAP:</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="validationCustom02"
                      value="Inserisci un CAP"
                      required
                    />
                    <div class="valid-feedback">
                      Inserire un CAP valido valido!
                    </div>
                  </div>

                  <!-- Città -->
                  <div class="col-6">
                    <label for="validationCustom02" class="form-label"
                      >Città:</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="validationCustom02"
                      value="Inserisci una città"
                      required
                    />
                    <div class="valid-feedback">Inserire una città valida!</div>
                  </div>

                  <!-- Provincia -->
                  <div class="col-6">
                    <label for="validationCustom02" class="form-label"
                      >Provincia:</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="validationCustom02"
                      value="Inserisci una provincia"
                      required
                    />
                    <div class="valid-feedback">
                      Inserire una provincia valida!
                    </div>
                  </div>

                  <!-- Mail -->
                  <div class="col-12">
                    <label for="exampleFormControlInput1" class="form-label"
                      >Email</label
                    >
                    <input
                      type="email"
                      class="form-control"
                      id="exampleFormControlInput1"
                      placeholder="name@example.com"
                    />
                  </div>

                  <!-- Text Area -->
                  <div class="col-12">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      >Notazioni sull'ordine:</label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                    ></textarea>
                  </div>

                  <!-- Conditions -->
                  <div class="col-12">
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="checkbox"
                        value=""
                        id="invalidCheck"
                        required
                      />
                      <label class="form-check-label" for="invalidCheck">
                        Accetto le condizioni sulla privacy
                      </label>
                      <div class="invalid-feedback">
                        You must agree before submitting.
                      </div>
                    </div>
                  </div>

                  <div class="row text-center">
                    <h4>Sintesi Ordine:</h4>
                  </div>

                  <!-- Submit -->
                  <div class="col-12 d-flex justify-content-center">
                    <button class="ac-btn" type="submit">
                      Vai al pagamento
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="col-4 col-md-4 col-lg-4 right-column">
        <div class="carrello" v-if="isLoaded && isCart">
          <div class="row justify-content-around align-items-center">
            <h2 class="fw-bold">Il tuo ordine</h2>
          </div>
          <div class="line mt-3"></div>
          <div class="plate-order">
            <!-- elenco piatti con prezzi  -->

            <div v-for="(item, index) in cart" :key="`item${index}`">
              <div>
                <strong>{{ item.name }}</strong>
              </div>
              <div class="d-flex justify-content-between p-0">
                <div class="p-0">
                  <span class="amount-plates">{{ item.quantity }}</span>
                  <span
                    class="add-plate"
                    @click="cartArray(item, (string = 'più'))"
                    >+
                  </span>
                  <span
                    class="del-plate"
                    @click="cartArray(item, (string = 'meno'))"
                    >-</span
                  >
                </div>
                € {{ item.price }}
              </div>
            </div>
          </div>

          <div class="line"></div>
          <div
            class="
              row
              px-5
              pt-3
              pb-2
              justify-content-between
              align-items-center
            "
          >
            <div class="fw-bold">Totale</div>
            <div class="fw-bold">€{{ getSubTotal }}</div>
          </div>

          <div class="d-flex justify-content-center">
            <router-link
              v-if="isLoaded"
              class="ac-btn"
              :to="{
                name: 'payment',
                params: { slug: activeRestaurant.slug },
              }"
            >
              Vai al pagamento
            </router-link>
          </div>
        </div>

        <div class="carrello" v-else>
          <div class="carrello-empty">
            <div class="mt-5">
              <i class="fas fa-shopping-cart"></i>
              <h6 class="fw-bold">Il tuo carrello è vuoto</h6>
            </div>

            <div class="fake-button">Vai al carrello</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PlateBox from "../partials/PlateBox.vue";

export default {
  name: "Restaurantdetail",
  components: {
    PlateBox,
  },
  data() {
    return {
      apiUrl: "http://127.0.0.1:8000/api/ristoranti/",
      activeRestaurant: {},
      plates: [],
      itemsArray: [],
      isLoaded: false,
      cart: JSON.parse(localStorage.getItem("items")),
      // cart: [],
      subTotal: null,
      isCart: true,
    };
  },
  mounted() {
    this.getActiveRestaurant();
    this.getTrueCart();
  },
  computed: {
    getSubTotal: function () {
      let itemTotalPrice = 0;
      let sum = 0;
      for (let item of this.cart) {
        itemTotalPrice = item.price * item.quantity;
        sum += itemTotalPrice;
      }
      // console.log(this.cart);

      return (this.subTotal = sum);
    },
  },

  methods: {
    getActiveRestaurant() {
      this.isLoaded = false;
      this.activeRestaurant = {};
      axios.get(this.apiUrl + this.$route.params.slug).then((res) => {
        this.activeRestaurant = res.data.restaurant;
        this.plates.push(this.activeRestaurant.plates);
        //   console.log(JSON.parse(localStorage.getItem('items'))[0].restaurant_id)

        if (
          JSON.parse(localStorage.getItem("items"))[0].restaurant_id !=
          this.activeRestaurant.id
        ) {
          window.localStorage.clear();
          // localStorage.removeItem('items')
          this.isCart = false;
        }
        this.isLoaded = true;
      });
    },

    getTrueCart() {
      console.log("cart all avvio", this.cart);
      if (!this.cart) {
        this.isCart = false;
      } else if (this.cart.length === 0) {
        this.isCart = false;
      }
    },

    cartArray(plate, string) {
      console.log("cart", this.cart);

      this.cart = JSON.parse(localStorage.getItem("items"));
      this.itemsArray = localStorage.getItem("items")
        ? JSON.parse(localStorage.getItem("items"))
        : [];

      // GENERO UN ARRAY BOOLITEM CHE SI POPOLA SOLO SE ESISTE GIA' IL PIATTO CLICCATO
      let boolItem = this.itemsArray.filter(function (item) {
        return item.id === plate.id;
      });

      // SE QUESTO BOOLITEM E' VUOTO POSSO PUSHARE
      if (boolItem.length === 0 && string === "più") {
        plate.quantity = 1;
        this.isCart = true;
        this.itemsArray.push(plate);
      } else {
        for (let i = 0; i < this.itemsArray.length; i++) {
          if (this.itemsArray[i].id === plate.id && string === "più") {
            this.isCart = true;
            this.itemsArray[i].quantity++;
          } else if (this.itemsArray[i].id === plate.id && string === "meno") {
            this.itemsArray[i].quantity--;
            if (this.itemsArray[i].quantity === 0) {
              this.itemsArray = this.itemsArray.filter(function (item) {
                return item.quantity > 0;
              });
              if (this.itemsArray.length === 0) {
                this.isCart = false;
              }
            }
          }
        }
      }

      localStorage.setItem("items", JSON.stringify(this.itemsArray));

      // inizializzo il carrello trasformando le stringhe del localStorage in oggetti
      this.cart = JSON.parse(localStorage.getItem("items"));
      console.log("padre", this.cart);
    },

    removeArray() {
      window.localStorage.clear();
      this.isCart = false;
      console.log("Reset Storare Cliccato");
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

.central-column {
  position: relative;
  padding-bottom: 100px;
  background-color: blue;

  .box-ristorante {
    position: relative;
    width: 95%;
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
      }
    }
  }
}

.right-column {
  position: relative;
  background-color: red;

  .carrello {
    position: relative;
    // top: -10%;
    top: -150px;
    width: 100%;
    height: fit-content;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
    border-radius: 20px;
    padding-left: 10px;
    background-color: white;
    padding: 20px;

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
