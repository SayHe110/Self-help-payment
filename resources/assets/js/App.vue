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
  max-width: 500px;
  min-width: 300px;
  margin: 0 auto;
  height: 100%;
  background: #fff;
}
*{
    padding: 0;
    margin: 0;
}
li{
    list-style: none;
}
html,body{
  width: 100%;
  height: 100%;
  background:#f3f3f3;
}
html{
  font-size: 62.5%;
}
</style>
