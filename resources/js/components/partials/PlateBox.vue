<template>
<div class="box"
  v-if="plate.is_available == 1"
>
  <div class="left">
      <div class="name">{{plate.name}}</div>
      <div>{{plate.description}}</div>
      <div class="price">€ {{plate.price}}</div>

      <div class="cart">
        <i class="fas fa-shopping-cart"></i>

        <span id="add"
        @click="saveItem(plate)">+</span> 
        
        0

        <span id="remove"  @click="removeItem(plate)">-</span>

      </div>

  </div>
  <div class="right">
      <div class="image">
        <img :src="plate.cover" :alt="plate.name">
      </div>
  </div>
</div>
</template>

<script>
export default {
    name: 'PlateBox',
    props: {
      plate: Object,
      vecchioCarrello: Array,
    },
    mounted() {
      // console.log('MOUNTED >>', localStorage);
    },
    data() {
      return {
        quantity: 0,
      }
    },
    methods: {
      // saveItem(plate) {

      //     this.quantity = this.quantity +1;
      //     this.$emit('cartArray',plate, this.quantity);

      // },

      saveItem(plate) {
        if(this.quantity === 0){
          this.$emit('cartArray',plate, this.quantity);
        }else{
          this.quantity = this.quantity +1;
          this.$emit('cartArray',plate, this.quantity);
        }
      }
    }
}



// this.singItem = localStorage.setItem('name', plate.name);
// this.items.push(this.singItem);
// console.log('array', this.singItem);
// localStorage.setItem('items', JSON.stringify(this.items))
// console.log(localStorage.getItem('items'));
</script>

<style lang="scss" scoped>
@import '../../../sass/_variables.scss';
  
  .box{
    width: 100%;
    height: 120px;
    padding: 0 5%;
    margin: 10px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 20px;
    transition: box-shadow 0.3s ease-in-out;
    transition: height 0.3s, width 0.3s;
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    transition: transform 0.3s;
    cursor: pointer;

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

    .price, .cart {
      display: inline-block;
    }

    .cart {
      padding-left: 20px;
      padding-top: 10px;
      width: 150px;
      font-size: 18px;
      color: $primary-color;
      i {
        padding-right: 5px;
      }
      span {
        color: black;
        border: 1px solid black;
        padding: 5px 12px;
        border-radius: 7px;
      }
    }

    .right {
      height: 90%;
      object-fit: cover;
      display: flex;
      align-items: center;
    }
    .image {
      // margin-left: auto;
      width: 130px;
      border-radius: 15px;
      height: 80%;
      img {
        border-radius: 15px;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }
  }
</style>