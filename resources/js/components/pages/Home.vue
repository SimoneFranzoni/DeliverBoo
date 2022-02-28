<template>
  <div class="wrapper">

    <!-- header -->
    <Header />
    <!-- jumbotron -->
    <Jumbotron />

    <!-- ricerca -->
    <Searchbar />
      <!-- per tipologia -->
      <!-- lista tipologie -->

    <!-- footer -->


    
  </div>
</template>

<script>
import Jumbotron from '../partials/Jumbotron.vue'
import Header from '../partials/Header.vue'
import Searchbar from '../partials/Searchbar.vue'
export default {
  name: 'Home',
  components: {
    Header,
    Jumbotron,
    Searchbar
  }
}
</script>

<style lang="scss">
  
</style>