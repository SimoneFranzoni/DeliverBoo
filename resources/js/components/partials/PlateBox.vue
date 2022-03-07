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

        <span id="remove">-</span>

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
        cartItemCounter: 0,
        // items: [],
        totalSameItems: [],
        item:{
          name: '',
          price: null
        },
        nuovoCarrello:[],
      }
    },
    methods: {
      saveItem(plate) {
        this.item.name = plate.name,
        this.item.price = plate.price;

        this.totalSameItems.push(this.item);
        // console.log(this.totalSameItems);

        let jsonStr = JSON.stringify(this.totalSameItems);
        localStorage.setItem('Storage Totale del Piatto Cliccato', jsonStr);
        console.log(localStorage);
        this.$emit('cartArray',localStorage);
        // jsonStr.name = localStorage.setItem('this.cart.name',plate.name);
        // jsonStr.price = localStorage.setItem('this.cart.price',plate.price);
        // console.log(localStorage);

        // localStorage.setItem('Carrello', jsonStr);
        // let cartValue = localStorage.getItem('cart');
        // let cartObj = JSON.parse(cartValue);
        // console.log('Oggetto del Carrello', cartObj);
        // return cartObj;

        // this.singItem.name = localStorage.setItem('name', plate.name);
        // this.singItem.price = localStorage.setItem('price', plate.price);
        // this.items.push(this.singItem);
        // localStorage.setItem('items', JSON.stringify(this.items))
        // this.$emit('cartArray', this.items);
        // console.log(localStorage.getItem('items'));
      }
    }
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