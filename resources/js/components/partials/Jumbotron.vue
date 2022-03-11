<template>
  <section class="ac-jumbotron">
    <div class="container">
      <div class="row">
          <div class="video-bg">
            <video autoplay muted loop
            src="videos/video (5).mp4"></video>
          </div>
      </div>
      <div class="row searchbar-slogan">
        <Searchbar @triggerSearch="triggerSearch"/>
      </div>
     
    </div>
  </section>
</template>

<script>
import Searchbar from './Searchbar.vue'
export default {
  name: 'Jumbotron',
  components: {
    Searchbar
  }, props: {
    type: Object
  },
  methods: {
    triggerSearch(searchedValue) {
      this.$emit('triggerSearch', searchedValue)
    }
  }
}
</script>

<style lang="scss">
// @import 'resources/sass/guest/style.scss';
@import 'resources/sass/_variables.scss';
 .ac-jumbotron {
  height: 400px;
  //  background-color: rgba($color: black, $alpha: 0.3);
   .video-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 500px;
    z-index: -100;
    direction: flex;
    align-items: center;
    justify-content: center;
     video {
      object-fit: cover;
      display: block;
      width: 100%;
      height: 100%;
      position: absolute;
      left: 0px;
      top: 0px;
      z-index: -100;
      overflow: hidden;
     }
   }
   
  .searchbar-slogan {
    padding-top: 305px;
  }

  }


 


</style>