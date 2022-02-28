<template>
    <div class="container-fluid">
        <div class="row types-row py-4">
            <div class="types-box d-flex justify-content-start align-items-end">
                <div class="text">Tipologia</div>
            </div>
            <div class="types-box d-flex justify-content-start align-items-end">
                <div class="text">Tipologia</div>
            </div>
            <div class="types-box d-flex justify-content-start align-items-end">
                <div class="text">Tipologia</div>
            </div>
            

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
                    <RestaurantBox />
                    <RestaurantBox />
                    <RestaurantBox />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RestaurantBox from './RestaurantBox.vue';

export default {
    name: 'Restaurants',
    components:  {
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

    .types-box{
        height: 100px;
        width: 150px;
        border-radius: 20px;
        background-color: orange;
        box-shadow: 0 1px 2px rgba(0,0,0,0.15);
        transition: box-shadow 0.3s ease-in-out;
        margin-right: 10px;
        transition: height 0.3s, width 0.3s;

        &:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            height: 110px;
            width: 160px;
            font-weight: bold;
        }

        .text{
            padding: 0 10px;
        }
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