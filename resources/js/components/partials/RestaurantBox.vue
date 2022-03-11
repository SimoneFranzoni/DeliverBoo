<template>

 <router-link class="box" :to="{name: 'restaurantdetail', params: {slug: restaurant.slug}}">

    <!--:style="{ backgroundImage: `url(${restaurant.cover})`}"-->
    <div class="restaurant-img float-left">
      <img :src="restaurant.cover" :alt="restaurant.name">
    </div>
    <div class="container">  
      <div class="row">
        <div class="col-6">
          <div class="name">
            {{restaurant.name}} <br>
            <small v-if="this.$route.name==='restaurantsAll'">
              Tipologia: <small v-for="(type, index) in restaurant.types" :key="`alltypes${index}`">{{type.name}}</small>  
            </small>
          </div>
          <div class="città">
            {{restaurant.city}}
          </div>    
        </div> 
        <div class="col-6 d-flex">
          <div class="row flex-column justify-content-center">
            <div>
              {{restaurant.address}}
            </div>
            <div>
              {{restaurant.phone_number}}
            </div>
          </div>
        </div> 
      </div>
    </div>

 </router-link>
</template>

<script>
export default {
    name:'RestaurantBox',
    props: {
      restaurant: Object, 
      types: Array
    }
}
</script>

<style lang="scss" scoped>

@import '../../../sass/_variables.scss';



  .box{
    width: 98%;
    height: 120px;
    display: flex;
    align-items: center;
    margin: 10px 0;
    padding-left: 12px;
    border-radius: 20px;
    transition: box-shadow 0.3s ease-in-out;
    transition: height 0.3s, width 0.3s;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    transition: transform 0.3s;
    color: black;
    cursor: pointer;

    &:hover{
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      font-weight: bold;
      transform: scale(1.02);

    }

    .restaurant-img{
      //background-image: url(".../public/img/pexels-marcus-herzberg-1058277.jpg");
      // background-color: $primary-color; 
      max-height: 110px;
      width: 25%;
      // margin-left: 10px;
      border-radius: 15px;

      img {
        width: 100%;
        height: 110px;
        border-radius: 15px;
        overflow: hidden;
        object-fit: cover;
      }
    }
  
    .name{
      font-size: 20px;
      small {
        font-style: italic;
        font-size: 12px;
        padding-bottom: 10px;
      }
    }

  }



</style>