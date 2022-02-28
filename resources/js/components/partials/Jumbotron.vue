<template>
  <section class="ac-jumbotron">
    <div class="container">
      <div class="row">

          <div class="video-bg">
            <video autoplay muted loop
            src="videos/pexels-vanessa-loring-5866268.mp4"></video>
          </div>

        <div class="col-sm-12 col-md-6">
          <div class="slogan-left">
            <h2>
              I piatti che ami, a domicilio.
            </h2>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="slogan-right">
            <h2>
              Hai fame? Ci pensa #deliveBoo!
            </h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Jumbotron'
}
</script>

<style lang="scss">
// @import 'resources/sass/guest/style.scss';
@import 'resources/sass/_variables.scss';
 .ac-jumbotron {
  height: 400px;
  position: relative;
  //  background-color: $primary-color;
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
   .slogan-left, .slogan-right {
    background-color: white;
    position: absolute;
    bottom: -425px;
    left: 0px;
    padding: 10px 15px;
    border-radius: 15px;
    transition: all .3s;
    box-shadow: 5px 5px 5px rgba($color: #000000, $alpha: .5);
    &:hover {
      transform: translateY(-10px);
    }
    h2 {
    // color: darken($primary-color, 20);
    color: darken($secondary-color, 20);
    cursor: default;
    font-size: 36px;
    padding: 0;
    margin: 0;
  }
  }
 }
</style>