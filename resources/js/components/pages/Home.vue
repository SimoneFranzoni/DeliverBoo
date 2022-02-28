<template>
  <div class="wrapper">

    <!-- header da home.blade.php per controlli auth-->

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
import Searchbar from '../partials/Searchbar.vue'
export default {
  name: 'Home',
  components: {
    Jumbotron,
    Searchbar
  }
}
</script>

<style lang="scss">
  
</style>