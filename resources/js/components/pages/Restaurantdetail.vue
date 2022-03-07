<template>
    <div>
        <div class="bg">
          <img :src="activeRestaurant.cover" alt="" v-if="activeRestaurant.cover">
        </div>
        <div class="container">
            <div class="row">
              
                <div class="col-2 nav-menu" id="stickyMenu">
                    <ul class="pt-5">
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
                            <a href="#dessert">Dessert</a>
                        </li>
                        <li>
                            <div class="bar"></div>
                            <a href="#bevande">Bevande</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 central-column">
                    <div class="box-ristorante">
                        <h2 class="pb-3">{{activeRestaurant.name}}</h2>
                        <div class="pb-2">
                            <div class="row">
                                <div class="type"
                                v-for="(type, index) in activeRestaurant.types"
                                :key="`type${index}`">{{type.name}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div>{{activeRestaurant.address}}</div>
                            <div class="px-3">|</div>
                            <div>{{activeRestaurant.city}}</div>
                        </div>
                    </div>
                    <div class="menu pt-5">
                        <h4 id="primi">Primi</h4>
                        <PlateBox v-for="(plate, index) in activeRestaurant.plates"
                          :key="`plate${index}`"
                          :plate="plate"
                        />
                        <!-- <PlateBox 
                        
                        />
                        <PlateBox 
                        
                        />
                        <PlateBox 
                        
                        /> -->
                        
                    </div>
                </div>
                <div class="col-4 right-column">
                    <div class="carrello">
                        <div class="row justify-content-around align-items-center">
                            <h2 class="fw-bold">Il tuo ordine</h2>
                        </div>
                        <div class="line mt-3"></div>
                        <div class="plate-order">
                            <div>{{ localStorageGet()[0] }}</div>
                            <div class="row">
                                <div class="pr-2 minus-btn">-</div>
                                <div>1</div>
                                <div class="pl-2 plus-btn">+</div>
                            </div>
                            <div>{{ localStorageGet()[1] }}</div>
                        </div>
                        
                        <div class="line"></div>
                        <div class="row px-5 pt-3 pb-2 justify-content-between align-items-center">
                            <div class="fw-bold">Subtotale</div>
                            <div class="fw-bold">5,50 €</div>
                        </div>
                        <div class="row px-5 py-2 justify-content-between align-items-center">
                            <div>Costo di consegna</div>
                            <div>2,00 €</div>
                        </div>
                        <div class="row px-5 py-2 justify-content-between align-items-center">
                            <div class="fw-bold">Totale</div>
                            <div class="fw-bold">7,50 €</div>
                        </div>
                    </div>
                </div>
            </div>
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
        items: []
      }
    },
    mounted() {
     this.getActiveRestaurant(),
     this.localStorageGet()
    },
    methods : {
      getActiveRestaurant() {
        this.activeRestaurant = {};
        axios.get(this.apiUrl + this.$route.params.slug)
        .then(res => {
          this.activeRestaurant = res.data.restaurant;
          this.plates.push(this.activeRestaurant.plates);
        })
        console.log(this.plates);
      },

      localStorageGet() {
        
      }
    }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/_variables.scss';

.bg{
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

.container-fluid{
    padding: 0 8%;
}

.nav-menu{
    position: sticky;
    top: 400px;
    left: 0;
    ul{
        //position: fixed;
        li{
            display: flex;
            justify-content: flex-start;
            align-items: center;

            .bar{
                width: 1px;
                height: 50px;
                background-color: lightgrey;
                margin-right: 10px;
            }

            a{
                color: rgb(51, 50, 50);
                text-decoration: none;
                font-size: 15px;
                transition: transform 0.5s;
            }

            &:hover{
                font-weight: bold;
                
                a{
                    transform: translateX(10px);
                }
                
                .bar{
                    width: 2px;
                    background-color: black;
                }
            }

        }
    }
}

.central-column{
    position: relative;
    padding-bottom: 100px;
    
    .box-ristorante{
        position: absolute;
        width: 95%;
        top: -150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
        box-shadow: 0 3px 10px rgba(0,0,0,0.3);
        border-radius: 20px;
        background-color: white;
    }

    .type{
        background-color: #eeebeb;
        transition: all .2s;
        margin: 0 5px;
        display: inline-block;
        padding: 0 5px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;

        
        &:hover {
            background-color: lighten(#eeebeb, 2.5);
            transform: scale(1.1);
            border-radius: 10px;
        }
    }

    .menu{
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

.right-column{
    position: relative;

    .carrello{
        
        position: absolute;
        // top: -10%;
        top: -150px;
        width: 100%;
        height: fit-content;
        box-shadow: 0 3px 10px rgba(0,0,0,0.3);
        border-radius: 20px;
        padding-left: 10px;
        background-color: white;
        padding: 20px;


        .line{
            background-color: grey;
            width: 100%;
            height: 1px;
            margin: 10px 0;
        }

        .plate-order{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10px;
           
        }
    }
}

.fw-bold{
    font-weight: bold;
}

</style>