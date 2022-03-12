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
              <div class="row">
                
                <!-- FORM -->
                <form method="POST" action=""  class="form_payment">
                  <div class="row">
                    <!-- Nome -->
                    <div class="col-6">
                      <label
                        for="name"
                        class="form-label fw-bold fw-bold"
                        >Nome</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        v-model="name"
                        name="name"
                        placeholder="Inserisci il nome"
                        required
                      />
                      <div class="valid-feedback">Looks good!</div>
                    </div>

                    <!-- Cognome -->
                    <div class="col-6">
                      <label for="lastname" class="form-label fw-bold"
                        >Cognome</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="lastname"
                        name="lastname"
                        v-model="lastname"
                        placeholder="Inserisci il cognome"
                        required
                      />
                      <div class="valid-feedback">Looks good!</div>
                    </div>

                    <!-- Città -->
                    <div class="col-6">
                      <label for="address" class="form-label fw-bold"
                        >Indirizzo:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="address"
                        name="address"
                        v-model="address"
                        placeholder="Inserisci un indirizzo"
                        required
                      />
                      <div class="valid-feedback">
                        Inserire un indirizzo valido!
                      </div>
                    </div>

                    <!-- CAP -->
                    <div class="col-6">
                      <label for="cap" class="form-label fw-bold"
                        >CAP:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="cap"
                        name="cap"
                        v-model="cap"
                        placeholder="Inserisci un CAP"
                        required
                      />
                      <div class="valid-feedback">
                        Inserire un CAP valido valido!
                      </div>
                    </div>

                    <!-- Città -->
                    <div class="col-6">
                      <label for="city" class="form-label fw-bold"
                        >Città:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="city"
                        name="city"
                        v-model="city"
                        placeholder="Inserisci una città"
                        required
                      />
                      <div class="valid-feedback">
                        Inserire una città valida!
                      </div>
                    </div>

                    <!-- Provincia -->
                    <div class="col-6">
                      <label for="province" class="form-label fw-bold"
                        >Provincia:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="province"
                        name="province"
                        v-model="province"
                        placeholder="Inserisci una provincia"
                        required
                      />
                      <div class="valid-feedback">
                        Inserire una provincia valida!
                      </div>
                    </div>


                    <!-- Cellulare -->
                    <div class="col-6">
                      <label for="phone" class="form-label fw-bold"
                        >Telefono:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="phone"
                        name="phone"
                        v-model="phone"
                        placeholder="Inserisci un numero di telefono"
                        required
                      />
                      <div class="valid-feedback">
                        Inserire una numero  di telefono valido!
                      </div>
                    </div>

                    <!-- Campanello -->
                    <div class="col-6">
                      <label for="doorbell" class="form-label fw-bold"
                        >Nome sul campanello:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="doorbell"
                        name="doorbell"
                        v-model="doorbell"
                        placeholder="Famiglia Rossi"
                        required
                      />
                      <div class="valid-feedback">
                        Inserire una numero  di telefono valido!
                      </div>
                    </div>

                    <!-- Mail -->
                    <div class="col-12">
                      <label
                        for="email"
                        class="form-label fw-bold"
                        >Email</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        v-model="email"
                        placeholder="name@example.com"
                      />
                    </div>

                    <!-- Text Area -->
                    <div class="col-12">
                      <label
                        for="note"
                        class="form-label fw-bold"
                        >Notazioni sull'ordine:</label
                      >
                      <textarea
                        class="form-control"
                        id="note"
                        name="note"
                        v-model="note"
                        rows="3"
                      ></textarea>
                    </div>

                    <!-- CAMPI NASCOSTI -->
                    <!-- Totale -->
                    <div class="col-6 invisible">
                      <label for="total" class="form-label fw-bold"
                        >Totale:</label
                      >
                      <input
                        type="text"
                        class="form-control"
                        id="total"
                        name="total"
                        v-model="getSubTotal"
                        placeholder="Inserisci una provincia"
                        required
                      />
                      <div class="valid-feedback">
                        Inserire una provincia valida!
                      </div>
                    </div>

                    <!-- Conditions -->
                    <div class="col-12">
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="invalidCheck"
                          required
                        />
                        <label class="form-check-label" for="invalidCheck">
                          Accetto le condizioni sulla privacy
                        </label>
                        <div class="invalid-feedback">
                          E' necessario accettare le condizoni.
                        </div>
                      </div>
                    </div>

                    <div class="carrello-small d-block d-lg-none">
                      <div
                        class="row justify-content-around align-items-center"
                      >
                        <h2 class="fw-bold">
                          Ordine: <span class="code-ordine">{{ codeOrder }}</span>
                        </h2>
                      </div>
                      <div class="line mt-3"></div>
                      <div class="plate-order">
                        <!-- elenco piatti con prezzi  -->

                        <div
                          v-for="(item, index) in cart"
                          :key="`item${index}`"
                        >
                          <div>
                            <strong>{{ item.name }}</strong>
                          </div>
                          <div class="d-flex justify-content-between p-0">
                            <div class="p-0">
                              Quantità:
                              <span class="amount-plates">{{
                                item.quantity
                              }}</span>
                            </div>
                            € {{ item.price }}
                          </div>
                        </div>
                      </div>

                      <div class="line"></div>
                    </div>

                    <div class="total-text row text-center pt-4">
                      <h4 class="fw-bold">
                        TOTALE:
                        <span class="total-pay">€{{ subTotal }}</span>
                      </h4>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 d-flex flex-column align-items-center">
                      <div v-if="isLoading">

                    </div>
                      <div v-else>
                        <v-braintree
                        :authorization="tokenApi"
                        locale="it_IT"
                        @success="onSuccess"
                        @error="onError"
                      >
                      <template #button="slotProps">
                        <button 
                        @click="slotProps.submit" 
                        ref="paymentBtnRef" 
                        class="d-none" />
                      </template>
                      
                      </v-braintree>
                        <!-- v-if="!disableBuyButton" -->
                      <button
                        @click.prevent="beforeBuy"
                        class="ac-bnt w-full btn-success mt-5"
                      >
                        Procedi con l'acquisto 🎉
                      </button>

                      <div class="trans-ok"
                      v-if="transOk">
                        <p>Transazione Inviata</p>
                      </div>
                    </div>
                      
                      <!-- <button  class="ac-btn" type="submit">
                        Vai al pagamento
                      </button> -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 slider d-none d-lg-block">
          <div class="col-12 right-column">

            <!-- Carrello -->
            <div class="carrello">
              <div class="row justify-content-around align-items-center">
                <h2 class="fw-bold">
                  Ordine: <span class="code-ordine">{{ codeOrder }}</span>
                </h2>
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
                      Quantità:
                      <span class="amount-plates">{{ item.quantity }}</span>
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
                <div class="fw-bold">€{{ subTotal }}</div>
              </div>
            </div>

            <!-- Fine Carrello  -->

            <div class="box-pagamento mt-4">
              <div class="box-btn d-flex flex-column align-items-center">

                

  
                <!-- <button class="btn-success p-3">Conferma Pagamento</button> -->
              </div>
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
  name: "Payment",
  components: {
    PlateBox,
  },
  data() {
    return {
      transOk: 'false',
      isLoading: true,
      tokenApi: '',
      apiUrlGenerateToken: '/api/orders/generate',
      apiMakePayment: '/api/orders/makepayment',
      apiUrl: "http://127.0.0.1:8000/api/ristoranti/",
      activeRestaurant: {},
      plates: [],
      plate: {},
      itemsArray: [],
      isLoaded: false,
      cart: JSON.parse(localStorage.getItem("items")),
      // cart: [],
      subTotal: null,
      isCart: true,
      alphabet: "QWERTYUIOPLKJHGFDSAZXCVBNM",
      codeOrder: '',
      
        token: "",
        name: "",
        lastname: "",
        address: "",
        city: "",
        cap: null,
        province: "",
        phone: "",
        doorbell: "",
        email: "",
        note: "",
        total: "",
        hiddenInput: false,
        
      

      //   FORM
      
    };
  },
  mounted() {
    this.getActiveRestaurant();
    this.getTrueCart();
    this.generateTokenApi();
    // this.getRandomNumber();
    this.codeRandom();
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

    generateTokenApi(){
      
      axios.get(this.apiUrlGenerateToken).then((res) => {
        this.tokenApi = res.data.token;
        this.isLoading = false;
      })
      .catch((error) => {
        console.log(error);
      });
    },

    getActiveRestaurant() {
      this.transOk= false;
      this.isLoaded = false;
      this.activeRestaurant = {};
      axios.get(this.apiUrl + this.$route.params.slug).then((res) => {
        this.activeRestaurant = res.data.restaurant;

        this.plates.push(this.activeRestaurant.plates);
        //   console.log(JSON.parse(localStorage.getItem('items'))[0].restaurant_id)

        // if (
        //   JSON.parse(localStorage.getItem("items"))[0].restaurant_id !=
        //   this.activeRestaurant.id
        // ) {
        //   window.localStorage.clear();
        //   // localStorage.removeItem('items')
        //   this.isCart = false;
        // }
        this.isLoaded = true;
      });
    },
    sendData(){
      axios.post(this.apiUrl + 'payment')
      {
        console.log('ciao mondo');
      }
    },

    getTrueCart() {
      console.log("cart all avvio da getTrueCart", this.cart);
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

    // sendingForm() {
    //   $.get(
    //     "formFrontEnd.php",
    //     {
    //         Name: this.name,
    //         Lastname: this.lastname,
    //         Address: this.address,
    //         City: this.city,
    //         Cap: this.cap,
    //         Province: this.province,
    //         Email: this.email,
    //         Note: this.note,
    //         Total: this.total,
    //     },
    //     function (data) {
    //         console.log(data);
    //       alert(data);
    //     }
    //   );
    // },

    codeRandom() {
      console.log("funzione CodeRandom");
      let code =
        this.getRandomNumber(1, 9) +
        this.alphabet.substr(this.getRandomNumber(1, 28), 1) +
        this.getRandomNumber(1, 9) +
        this.alphabet.substr(this.getRandomNumber(1, 28), 1) +
        // + (this.getRandomNumber(1, 9))
        this.alphabet.substr(this.getRandomNumber(1, 28), 1);
      this.codeOrder = code
    },
    getRandomNumber(min, max) {
      return Math.floor(Math.random() * (max - min + 1) + min);
    },

    onLoad(){
      alert('loading')
    },

    beforeBuy () {
      this.$refs.paymentBtnRef.click()
    },

    onSuccess (payload) {
      let gToken = payload.nonce;
      this.token = gToken;
      this.buy();
      console.log(this.token);
      // this.buy();
      // Do something great with the nonce...
    },
    onError (error) {
      console.log('Errore');
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
    },

    buy(){
      console.log('CART INVIATO->>>', this.cart);
      axios.post(this.apiMakePayment, {
        
        token: this.token,
        restaurant_id: this.cart[0].restaurant_id,
        name: this.name,
        surname: this.lastname,
        address: this.address,
        CAP: this.cap,
        city: this.city,
        province: this.province,
        phone: this.phone,
        doorbell: this.doorbell,
        email: this.email,
        note: this.note,
        total_price: this.subTotal,
        cart: this.cart,
      }).then((res) => {
        this.transOk= true,
        console.log('click res' ,res);
        location.href = '/order/' + this.activeRestaurant.slug;
      });
    }
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
