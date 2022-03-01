<template>
  <div class="container">

    <!-- header da home.blade.php per controlli auth-->

    <!-- jumbotron con ricerca-->
    <Jumbotron />

    <!-- elenco tipologie -->
    <h3>Non sai cosa scegliere? Dai un'occhiata</h3>
    <div class="types-wrapper">
      <div class="type"
      v-for="(type, index) in types" 
      :key="`type${index}`">
        {{type.name}}
      </div>
    </div>


    <!-- footer -->


    
  </div>
</template>

<script>
import Jumbotron from '../partials/Jumbotron.vue'

export default {
  name: 'Home',
  components: {
    Jumbotron,
  
  },
  mounted(){
    this.getApiTypes();
  },
  data(){
    return {
      types: null,

    }
  },
  methods: {
    getApiTypes() {
      this.types = null;
      axios.get('http://127.0.0.1:8000/api/tipo/')
      .then(res => {
        this.types = res.data.types;
      })
    }
  }
}
</script>

<style lang="scss">
  h3 {
    margin-top: 150px;
  }
  .types-wrapper {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    .type {
      background-color: khaki;
      cursor: pointer;
    }
  }

</style>