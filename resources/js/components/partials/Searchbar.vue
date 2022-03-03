<template>
  <div class="searchbar">
    <div class="slogan">
      <h2>I piatti che ami, comodamente a casa tua con <span class="name">#deliveBoo</span></h2>
    </div>

    <div class="search-input">
      <input 
      type="text" name="restsearch" id="restsearch" placeholder="Cerca qui una tipologia di ristorante..."
      v-model="searchedValue"
      @keyup="$emit('triggerSearch', searchedValue)">
      <!-- <router-link :to="{name: 'restaurants', params: {slug: type.slug}}"> -->
      <router-link :to="{name: 'restaurants'}">
       <div class="ac-btn">Vai</div>
      </router-link>
    </div>

  </div>
</template>

<script>
export default {
  name: 'Searchbar',
  data() {
    return {
      searchedValue: '', 
      apiUrl: 'http://127.0.0.1:8000/api/ristoranti/tiporistorante/',
      type: {}
    }
  },
  methods: {
    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
          .then(res => {
            this.type = res.data;
            console.log('TIPO >>>>>>',this.type);
          })
    }
  },
  mounted() {
    this.getApi();
  }
}
</script>

<style lang="scss">
@import '../../../sass/_variables.scss';
.searchbar {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 180px;
  max-width: 850px;
  width: 50%;
  min-width: 450px;
  margin: 0 auto;
  background-color: white;
  padding: 20px;
  border-radius: 15px;
  outline: 1px solid $primary-color;
  outline-offset: 2px;
  // box-shadow: 3px 3px 3px 3px rgba($color: #000000, $alpha: .5);
  .slogan {
    margin-bottom: 20px;
    text-align: center;
    h2 {
      color: $primary-color;
      font-weight: bold;
      .name {
        font-size: 34px;
        color: $logo-color;
      }
    }
  }
  .search-input {
    display: flex;
    align-items: center;
    width: 100%;
    input {
      width: 90%;
      margin-right: 5px;
      padding: 5px 10px;
      border-radius: 10px;
      border: 1px solid rgba($color: #000000, $alpha: .3);
      caret-color: $primary-color;
      &:focus {
        outline: 2px solid $primary-color;
      }
    }
    .ac-btn {
     width: 60px;
     text-align: center;
     font-size: 16px;
    }
  }

}



@media only screen and (max-width: 991px) {
  .slogan h2 {
    font-size: 24px;
  }
 }

</style>