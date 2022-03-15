<template>


    <div class="box"
      v-if="plate.is_available == 1"
    >
      <div class="left">
          <div class="name">{{plate.name}}</div>
          <div>{{plate.description}}</div>
          <small>{{plate.ingrediants}}</small> <br>
          <div class="price">€ {{plate.price}}</div>

          <div class="cart">
            <i class="fas fa-shopping-cart"></i>
            <span id="remove" @click="saveItem(plate, string = 'meno')">-</span>
            <span id="add" @click="saveItem(plate, string ='più')">+</span> 
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
      quantity: Number,
    },
    mounted() {
      // console.log('MOUNTED >>', localStorage);
    },
    data() {
      return {
        // quantity: 0,
      }
    },
    methods: {

      saveItem(plate, string) {
          this.$emit('cartArray',plate, string);
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
    height: 130px;
    padding: 20px 15px;
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
        height: 10px;
        padding: 0 8px;
        border: 1px solid black;
        border-radius: 7px;
        
        &:hover{
          color: $primary-color;
          border: 1px solid $primary-color;
        }
      }

      #add{
        padding: 0 8px;
      }

      #remove{
        padding: 0 9px;
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
      max-height: 110px;
      img {
        border-radius: 15px;
        width: 100%;
        height: 110px;
        overflow: hidden;
        object-fit: cover;
      }
    }

    span.disabled{
      pointer-events: none;
    }

  }
</style>