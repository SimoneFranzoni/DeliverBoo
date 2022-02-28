<template>
  <header>
    <div class="logo">
      <img src="img/logoDeliveBoo.png" alt="logo deliveboo">
    </div>
    <div class="header-content">aaa aaa</div>
  </header>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style lang="scss">
  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    .logo {
      width: 100px;
      img {
        width: 100%;
      }
    }
  }
</style>