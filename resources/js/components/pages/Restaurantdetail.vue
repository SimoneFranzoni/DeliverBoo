<template>
    <div>
        <div class="bg"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-2 nav-menu">
                    <ul class="pt-5">
                        <li><a href="#primi">Primi</a></li>
                    </ul>
                </div>
                <div class="col-7 central-column">
                    <div class="box-ristorante">
                        <h2 class="pb-3">Pizzeria da Beppe</h2>
                        <div class="pb-2">
                            <div class="row">
                                <div class="type">Pizza</div>
                                <div class="type">Italiano</div>
                            </div>
                        </div>
                        <div class="row">
                            <div>Via fasulla 0</div>
                            <div class="px-3">|</div>
                            <div>Brescia</div>
                        </div>
                    </div>
                    <div class="menu pt-5">
                        <h4 id="primi">Primi</h4>
                        <PlateBox />
                        <PlateBox />
                        <PlateBox />
                        <PlateBox />
                        <PlateBox />
                    </div>
                </div>
                <div class="col-3">
                    carrello
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
}
</script>

<style lang="scss" scoped>

@import '../../../sass/_variables.scss';

.bg{
    width: 100%;
    height: 300px;
    background-color: orange;
}

.container-fluid{
    padding: 0 10%;
}

.nav-menu{

    ul{
        //position: fixed;
        li{
            font-size: 25px;
            
            &:hover{
                font-weight: bold;
            }
        }
    }
}

.central-column{
    position: relative;

    .box-ristorante{
        position: absolute;
        width: 100%;
        top: -10%;
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
        margin-top: 100px;
        display: flex;
        flex-direction: column;
        align-items: center;
        align-items: center;
        justify-content: center;
    }

}

</style>