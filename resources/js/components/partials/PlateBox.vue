<template>
<div class="box">
    <div class="name">Pizza margherita</div>
    <div>Lorem</div>
    <div class="price">5.50 €</div>
</div>
</template>

<script>
export default {
    name: 'PlateBox'
}
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';
  
  .box{
    width: 100%;
    height: 120px;
    padding: 0 5%;
    margin: 10px 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
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

    .name{
        font-weight: bold;
        font-size: 20px;
    }

    .price{
        font-weight: bold;
    }

  }
</style>