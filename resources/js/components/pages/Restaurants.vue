<template>
    <div class="container">
        <div>Le cucine più richieste</div>
        <div class="row types-row pb-4">
            <div class="typebox">
                <div class="title">Italiano</div>
            </div>
            <div class="typebox">
                <div class="title">Cinese</div>
            </div>
            <div class="typebox">
                <div class="title">Pizza</div>
            </div>
            <div class="typebox">
                <div class="title">Hamburger</div>
            </div>
            <div class="typebox">
                <div class="title">Poke</div>
            </div>
            <div class="typebox">
                <div class="title">Kebab</div>
            </div>
            <div class="typebox">
                <div class="title">Sushi</div>
            </div>
        </div>
        <div class="row">
            <div class="col-3 filter-column">
                <div>Tutte le cucine (A, Z)</div>
                <ul>
                    <li v-for="(type, index) in types" 
                    :key="`type${index}`">
                        <span>v</span>
                        {{type.name}}
                    </li>
                </ul>
            </div>
            
            <div class="col-9 restaurant-column">
                <div class="search-input">
                    <input type="text" name="restsearch" id="restsearch" placeholder="Cerca qui una tipologia di ristorante...">
                    <router-link :to="{name: 'restaurants'}">
                        <div class="ac-btn">Vai</div>
                    </router-link>
                </div>

                <div class="pt-4"> XXX risultati trovati </div>

                <div class="restaurant-box-row">
                    <!-- <RestaurantBox 
                    v-for="restaurant in restaurantsList"
                    :key="restaurant.id"/> -->
                    <RestaurantBox />
                    <RestaurantBox />
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
    },
    data(){
        return {
            types: null,
        }
    },
    methods: {
        getApiTypes() {
            this.types = null;
            axios.get('http://127.0.0.1:8000/api/tipo/')
            .then(res => {
                this.types = res.data.types;
            })
        }
    }
}

</script>

<style scoped lang="scss">

@import '../../../sass/_variables.scss';

  
    .filter-column{
        width: 100%;
        height: 700px;
        overflow-y: auto;
        z-index: 1;
        
        li{
            border-radius: 20px;
            border: 0.5px solid grey;
            padding: 10px;
            margin: 10px 0;
            z-index: 3;  
            cursor: pointer;
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

    .restaurant-column{
        z-index: 1;
      
        .restaurant-box-row{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
            cursor: pointer;

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

    

</style>