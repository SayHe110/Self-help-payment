<template>
    <div class="layout-header">
        <p>掌电</p>
    </div>
</template>
<script>
export default {
  name: 'header-top'
}
</script>
<style>
  .layout-header{
    width: 100%;
    height: 45px;
    line-height: 45px;
    background-color: #1BBC9B;
    text-align: center;
    padding: 0 10px;
    position: fixed;
    top: 0;
    z-index: 9999;
  }
  .layout-header p{
    font-size: 18px;
    color: #fff;
  }
</style>

