<template>
  <div class="layout">
      <div class="layout-contain">
        <div class="layout-header">
            <a href="javascript:;" @click="back" class="return"><Icon type="android-arrow-back" color="#fff" size="28"></Icon></a>
            
        </div>
        <router-view/>
      </div>
  </div>
</template>
<script>
export default {
  methods: {
    back() {
      this.$router.back(-1);
    }
  }
};
</script>
<style scoped>
.layout {
  background: #f3f3f3;
  position: relative;
  height: 100%;
  width: 100%;
}
.layout-contain {
  position: relative;
  padding-bottom: 50px;
  height: 100%;
}
.layout-header {
  height: 45px;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  color: #fff;
  background: #1bbc9b;
  line-height: 45px;
  font-size: 18px;
  z-index: 999;
  padding: 0 10px;
}
.layout-header .return {
  float: left;
  line-height: 45px;
  position: absolute;
  left: 20px;
  top: 8px;
}
.header-title{
    color: #fff;
    position: absolute;
    line-height: 45px;
    z-index: 999;
    left: 40%;
    font-size: 18px;
}
</style>
