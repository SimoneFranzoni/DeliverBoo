<template>
    <div class="container-fluid">
        <div class="row types-row py-4">
            <TypeBox 
            v-for="type in typesList"
            :key="type.id"
            />
            <TypeBox />
            <TypeBox />
            
        </div>
        <div class="row">
            <div class="col-3 filter-column">
                <h2>I filtri di ricerca andranno qui</h2>
            </div>
            
            <div class="col-9 restaurant-column">
                <input type="text" class="searchTerm" placeholder="Cerca piatti o ristoranti">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>

                <div class="pt-4"> XXX risultati trovati </div>

                <div class="restaurant-box-row">
                    <RestaurantBox 
                    v-for="restaurant in restaurantsList"
                    :key="restaurant.id"/>
                    <RestaurantBox />
                    <RestaurantBox />
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import TypeBox from './TypeBox.vue';
import RestaurantBox from './RestaurantBox.vue';

export default {
    name: 'Restaurants',
    components:  {
        TypeBox,
        RestaurantBox,
    }
}

</script>

<style scoped lang="scss">
    
    .container-fluid{
        padding: 0 5%;
    }

    .types-row{
        width: 100%;
        height: 150px;
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
    }

    .filter-column{
        background-color: aqua;
        width: 100%;
        height: 600px;
    }

    .restaurant-column{
      
        .restaurant-box-row{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
        }
    }

    .searchTerm{
        width: 90%
    }

</style>