<template>
  <router-view :prova="prova"></router-view>
</template>

<script>

export default {
  name: 'App', 
  components:  {
  
  },
  data() {
    return {
      prova:'ciao'
    }
  }
}
</script>

<style>

</style>