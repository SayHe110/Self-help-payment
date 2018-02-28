<template>
  <div id="app" class="fillcontain">
    <router-view/>
  </div>
</template>
<script>
export default {
  name: 'App'
}
</script>
<style>
#app {
  font-family: "Microsoft YaHei",Arial, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body, html, .fillcontain{
  width: 100%;
  height: 100%;
}
</style>
