<template>
  <div class="wrapper">

    <!-- header da home.blade.php per controlli auth-->

    <!-- jumbotron con ricerca-->
    <Jumbotron />

    <!-- elenco tipologie -->

    <!-- footer -->


    
  </div>
</template>

<script>
import Jumbotron from '../partials/Jumbotron.vue'
// import Searchbar from '../partials/Searchbar.vue'
export default {
  name: 'Home',
  components: {
    Jumbotron,
    // Searchbar
  }
}
</script>

<style lang="scss">
  section.search-slogan {
    // position: relative;
  }
</style>