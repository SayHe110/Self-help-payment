<template>
<div class="layout-box">
    <div class="header-title">
        <p>电量电费</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            
        </div>  
    </div>
</div>
</template>
<script>
export default {};
</script>
<style scoped>
.layout-box {
  position: absolute;
  top: 0px;
  padding: 0px 0px;
  width: 100%;
  height: 100%;
  background: #f3f3f3;
}
.layout-box .header-title p {
  color: #fff;
  position: fixed;
  line-height: 45px;
  z-index: 999;
  left: 40%;
  font-size: 18px;
}
.layout-application {
  position: absolute;
  top: 45px;
  padding: 0 10px;
  text-align: left;
  width: 100%;
  padding-bottom: 65px;
  background: #f3f3f3;
}
.application-box {
  padding-top: 10px;
}

</style>
