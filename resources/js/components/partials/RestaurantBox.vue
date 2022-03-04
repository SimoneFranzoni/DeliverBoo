<template>
  <div class="box">
    <!--:style="{ backgroundImage: `url(${restaurant.cover})`}"-->
    <div class="restaurant-img float-left"></div>
    <div class="container">  
      <div class="row">
        <div class="col-6">
          <div class="name">
            {{restaurant.name}}
            <small>Tipologia: {{type.name}}</small>
          </div>
          <div class="città">
            {{restaurant.city}}
            <!-- Brescia -->
          </div>    
        </div> 
        <div class="col-6">
          <div>
            {{restaurant.address}}
            <!-- Via fasulla 0 -->
          </div>
          <div>
            {{restaurant.phone_number}}
            <!-- 338 5847545 -->
          </div>
        </div> 
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:'RestaurantBox',
    props: {
      restaurant: Object, 
      type: Object
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
    border-radius: 20px;
    transition: box-shadow 0.3s ease-in-out;
    transition: height 0.3s, width 0.3s;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    transition: transform 0.3s;

    &:hover{
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      font-weight: bold;
      transform: scale(1.05, 1.1);

    }

    .restaurant-img{
      //background-image: url(".../public/img/pexels-marcus-herzberg-1058277.jpg");
      background-color: $primary-color; 
      height: 90%;
      width: 25%;
      margin-left: 5px;
      border-radius: 20px;
    }
  
    .name{
      font-size: 20px;
      small {
        display: block;
        font-style: italic;
        font-size: 12px;
        padding-bottom: 10px;
      }
    }

  }

  

</style>