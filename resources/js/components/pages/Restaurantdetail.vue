<template>
    <div>
        <div class="bg">
            <img
                :src="activeRestaurant.cover"
                alt=""
                v-if="activeRestaurant.cover"
            />
        </div>
        <div class="container">
            <div class="row">
              
                <div class="d-none d-lg-block col-2 position-relative nav-menu" >
                    <ul class="pt-5" id="stickyMenu">
                        <li>
                            <div class="bar"></div>
                            <a href="#antipasti">Antipasti</a>
                        </li>
                        <li>
                            <div class="bar"></div>
                            <a href="#primi">Primi</a>
                        </li>
                        <li>
                            <div class="bar"></div>
                            <a href="#secondi">Secondi</a>
                        </li>
                        <li>
                            <div class="bar"></div>
                            <a href="#contorni">Contorni</a>
                        </li>
                        <li>
                            <div class="bar"></div>
                            <a href="#frutta">Frutta</a>
                        </li>
                        <li>
                            <div class="bar"></div>
                            <a @click="removeArray()" href="#dessert"
                                >Dessert</a
                            >
                        </li>
                    </ul>
                    
                </div>

                <div class="col-12 col-md-7 col-lg-6 central-column">
                    <div class="box-ristorante">
                        <h2 class="pb-3">{{ activeRestaurant.name }}</h2>
                        <div class="pb-2">
                            <div class="row">
                                <div
                                    class="type"
                                    v-for="(
                                        type, index
                                    ) in activeRestaurant.types"
                                    :key="`type${index}`"
                                >
                                    {{ type.name }}
                                </div>
                            </div>
                        </div>
                        <div class="row address">
                            <div>{{ activeRestaurant.address }}</div>
                            <div class="px-3">|</div>
                            <div>{{ activeRestaurant.city }}</div>
                        </div>
                          <router-link 
                          v-if="isLoaded"
                          
                          class="ac-btn" :to="{name: 'restaurants', params: {slug: activeRestaurant.types[0].slug}}">
                            Torna ai ristoranti
                          </router-link>
                    </div>
                    <div class="menu pt-5" v-if="isLoaded">

                     <h4 id="antipasti" v-if="getAntipasti.length > 0">Antipasti</h4>
                        <PlateBox v-for="(plate, index) in getAntipasti"
                          :key="`antipasto${index}`"
                          :plate="plate"
                          @cartArray="cartArray"
                        />
                      <h4 id="primi" v-if="getPrimi.length > 0">Primi</h4>  
                        <PlateBox v-for="(plate, index) in getPrimi"
                          :key="`primo${index}`"
                          :plate="plate"
                          @cartArray="cartArray"
                        />
                      <h4 id="secondi" v-if="getSecondi.length > 0">Secondi</h4>  
                        <PlateBox v-for="(plate, index) in getSecondi"
                          :key="`secondo${index}`"
                          :plate="plate"
                          @cartArray="cartArray"
                        />
                      <h4 id="contorni" v-if="getContorni.length > 0">Contorni</h4>  
                        <PlateBox v-for="(plate, index) in getContorni"
                          :key="`contorno${index}`"
                          :plate="plate"
                          @cartArray="cartArray"
                        />
                      <h4 id="frutta" v-if="getFrutta.length > 0">Frutta</h4>  
                        <PlateBox v-for="(plate, index) in getFrutta"
                          :key="`frutta${index}`"
                          :plate="plate"
                          @cartArray="cartArray"
                        />
                      <h4 id="dessert" v-if="getDessert.length > 0">Dessert</h4>  
                        <PlateBox v-for="(plate, index) in getDessert"
                          :key="`dessert${index}`"
                          :plate="plate"
                          @cartArray="cartArray"
                        />
                      </div>

                </div>
                <div class="d-none d-md-block col-5 col-lg-4 right-column">
                    <div class="carrello" v-if="isLoaded && isCart">
                        <div
                            class="row justify-content-around align-items-center"
                        >
                            <h2 class="fw-bold">Il tuo ordine</h2>
                        </div>
                        <div class="line mt-3"></div>
                        <div class="plate-order" >
                            <!-- elenco piatti con prezzi  -->

                            <div v-for="(item, index) in cart" :key="`item${index}`">
                                <div>
                                    <strong>{{item.name}}</strong>
                                </div>
                                <div class="d-flex justify-content-between p-0">
                                    <div class="p-0">
                                        <span class="amount-plates">{{item.quantity}}</span>
                                        <span class="add-plate" @click="cartArray(item, string ='più')">+ </span> 
                                        <span class="del-plate" @click="cartArray(item, string = 'meno')">-</span>
                                    </div>
                                     € {{item.price}}
                                </div>
                            </div>
                        </div>

                        <div class="line"></div>
                        <div
                            class="row px-5 pt-3 pb-2 justify-content-between align-items-center"
                        >
                            <div class="fw-bold">Totale</div>
                            <div class="fw-bold">€{{getSubTotal}}</div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <router-link 
                            v-if="isLoaded"
                            
                            class="ac-btn" :to="{name: 'payment', params: {slug: activeRestaurant.slug}}">
                                Vai al pagamento
                            </router-link>
                        </div>
                    </div>
                    
                    <div class="carrello" v-else>
                        <div
                            class="carrello-empty" 
                        >
                            <div class="mt-5">
                                <i class="fas fa-shopping-cart"></i>
                                <h6 class="fw-bold">Il tuo carrello è vuoto</h6>
                            </div>

                            <div class="fake-button">
                                Vai al carrello
                            </div>
                        </div>
                        
                    </div>

                </div> 
                  
            </div> 
        </div> 
        <div class="d-block d-md-none carrello-mobile">
            Clicca qui per il carrello
        </div>
    </div>
</template>

<script>

import PlateBox from '../partials/PlateBox.vue';

export default {
    name: 'Restaurantdetail',
    components:  {
        PlateBox,
    },
    data() {
      return {
        apiUrl: 'http://127.0.0.1:8000/api/ristoranti/',
        activeRestaurant: {},
        plates: [],
        plate: {},
        itemsArray: [],
        isLoaded: false,
        cart: JSON.parse(localStorage.getItem('items')),
        // cart: [],
        subTotal: null,
        isCart: true
      }
    },
    mounted() {
     this.getActiveRestaurant();    
     this.getTrueCart();
     
    },  
    computed: {

      getAntipasti: function() {
        return this.activeRestaurant.plates.filter(function(plate) {
          return plate.category === 'Antipasto'
        })
      },  
      getPrimi: function() {
        return this.activeRestaurant.plates.filter(plate => {
          return plate.category === 'Primo'
        })
      },  
      getSecondi: function() {
        return this.activeRestaurant.plates.filter(plate => {
          return plate.category === 'Secondo'
        })
      },  
      getContorni: function() {
        return this.activeRestaurant.plates.filter(plate => {
          return plate.category === 'Contorno'
        })
      },  
      getFrutta: function() {
        return this.activeRestaurant.plates.filter(plate => {
          return plate.category === 'Frutta'
        })
      },  
      getDessert: function() {
        return this.activeRestaurant.plates.filter(plate => {
          return plate.category === 'Dessert';
        })
      },  

      getSubTotal: function() {
        let itemTotalPrice = 0;
        let sum = 0;
        for(let item of this.cart) {
          itemTotalPrice = item.price * item.quantity;
          sum += itemTotalPrice;
        }
        // console.log(this.cart);
        
        return this.subTotal = sum;
      }
    },
    
    methods : {
      getActiveRestaurant() {
        
        this.isLoaded = false;
        this.activeRestaurant = {};
        axios.get(this.apiUrl + this.$route.params.slug)
        .then(res => {
          this.activeRestaurant = res.data.restaurant;
          this.plates.push(this.activeRestaurant.plates);
          this.isLoaded = true;
          console.log(this.plates)
          console.log(this.getAntipasti)
          
        //   console.log(JSON.parse(localStorage.getItem('items'))[0].restaurant_id)
        
            if(JSON.parse(localStorage.getItem('items'))[0].restaurant_id != this.activeRestaurant.id){
              window.localStorage.clear()
                // localStorage.removeItem('items')
                this.isCart=false
        
          }
          
        })
       
      },

      getTrueCart() {
          
          console.log('cart all avvio',this.cart);
          if(!this.cart){
              this.isCart = false;
          } else if (this.cart.length === 0) {
              this.isCart = false;
          }
      },


      cartArray(plate, string) {
        console.log('cart',this.cart);
        
        this.cart = JSON.parse(localStorage.getItem('items'));
        this.itemsArray = localStorage.getItem('items') ? JSON.parse(localStorage.getItem('items')) : [];


    // GENERO UN ARRAY BOOLITEM CHE SI POPOLA SOLO SE ESISTE GIA' IL PIATTO CLICCATO 
            let boolItem = this.itemsArray.filter(function(item){
                return item.id === plate.id;
            })
            
    // SE QUESTO BOOLITEM E' VUOTO POSSO PUSHARE 
            if(boolItem.length === 0 && string === 'più' ) {
                plate.quantity = 1;
                this.isCart = true;
                this.itemsArray.push(plate);
            } else {
                
                for(let i = 0; i < this.itemsArray.length; i++){
                    if(this.itemsArray[i].id === plate.id && string === 'più'){
                        this.isCart = true;
                       this.itemsArray[i].quantity ++;
                    } else if(this.itemsArray[i].id === plate.id && string === 'meno'){
                        this.itemsArray[i].quantity --;
                        if(this.itemsArray[i].quantity === 0){
                            
                            this.itemsArray = this.itemsArray.filter(function(item){
                               return item.quantity > 0;
                           })
                           if(this.itemsArray.length === 0){
                                    this.isCart = false;
                                }
                        }
                    }
                }
            }



        localStorage.setItem('items', JSON.stringify(this.itemsArray));
            

        // inizializzo il carrello trasformando le stringhe del localStorage in oggetti
        this.cart = JSON.parse(localStorage.getItem('items'));
        console.log('padre', this.cart);
       
      },

      removeArray(){
          window.localStorage.clear();
          this.isCart = false;
          console.log('Reset Storare Cliccato');
      },
      
    }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

#stickyMenu {
  position: sticky;
  top: -25px;
}


h4 {
  margin: 20px 0;
}

h4:first-of-type {
  margin-top: 0 !important;
  margin-bottom: 20px !important;
}

.del-plate,
.add-plate{
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
    cursor:pointer;
    &:hover{
       border:1px solid $primary-color;
       color:$primary-color;
       font-size: 24px; 
    }
}
.amount-plates,
.del-plate,
.add-plate{
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

.nav-menu{
    ul {
        //position: fixed;
        li {
            display: flex;
            justify-content: flex-start;
            align-items: center;

            &:last-child {
              margin-bottom: 30px;
            }

            .bar{
                width: 1px;
                height: 50px;
                background-color: lightgrey;
                margin-right: 10px;
            }

            a {
                color: rgb(51, 50, 50);
                text-decoration: none;
                font-size: 15px;
                transition: transform 0.5s;
            }

            &:hover {
                font-weight: bold;

                a {
                    transform: translateX(10px);
                }

                .bar {
                    width: 2px;
                    background-color: black;
                }
            }
        }
    }

    a.ac-btn {

      font-size: 17px;

    }
}

.central-column {
    position: relative;
    padding-bottom: 100px;

    .box-ristorante {
        position: absolute;
        width: 95%;
        top: -150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
        border-radius: 20px;
        background-color: white;

    }

    .row.address {
      padding-bottom: 25px;
    }

    .type {
        background-color: #eeebeb;
        transition: all 0.2s;
        margin: 0 5px;
        display: inline-block;
        padding: 0 5px;
        font-size: 20px;
        font-weight: bold;
        cursor: default;
        
    }

    .menu {
        // height: 700px;
        // overflow: auto;
        margin-top: 100px;
        padding-top: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
}

.right-column {
    position: relative;

    .carrello {
        position: absolute;
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

        .carrello-empty{
           color:lightgrey;
           height:220px;
           padding:20px;
           text-align: center;
           display: flex;
           flex-direction:column;
           justify-content: space-between;
           i{
               font-size:40px; 
               color:lightgrey;
           }
           .fake-button{
                background-color:lightgrey;
                color:white;
                height:33px; 
                border-radius:10px;
                line-height:33px;
           }
        }
    }
}

.fw-bold {
    font-weight: bold;
}

.carrello-mobile{
    width: 100%;
    height: 75px;
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 1000;
    margin-top: 100px;
    box-shadow: 0 -3px 10px rgba(0,0,0,0.3);
    background-color: $primary-color;
    margin: 0;
}

</style>
