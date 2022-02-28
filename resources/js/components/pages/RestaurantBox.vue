<template>
  <div class="box">
    <div class="restaurant-img float-left"></div>
    <div class="container">  
      <div class="row">
        <div class="col-6">
          <div class="name">
            Pizzeria a caso
          </div>
          <div class="città">
            Brescia
          </div>    
        </div> 
        <div class="col-6">
          <div>
            Via fasulla 0
          </div>
          <div>
            338 5847545
          </div>
        </div> 
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:'RestaurantBox'
}
</script>

<style lang="scss" scoped>

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

    &:hover{
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      height: 130px;
      width: 100%;
      font-weight: bold;
      

    }

    .restaurant-img{
      //background-image: url(".../public/img/pexels-marcus-herzberg-1058277.jpg");
      background-color: blue; 
      height: 90%;
      width: 25%;
      margin-left: 5px;
      border-radius: 20px;
    }
  }

</style>