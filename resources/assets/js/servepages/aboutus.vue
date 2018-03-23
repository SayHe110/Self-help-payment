<template>
<div class="layout-box">
    <sheader headerTitle="关于我们"></sheader>
    <div class="layout-application">
        <div class="application-box" style="padding-top:30px;">
            <h1>就很牛逼</h1>
            <p>足不出户,移动缴费,方便快捷</p>
        </div>
    </div>
</div>
</template>
<script>
import sheader from '../components/box.vue'
export default {
    components:{
        sheader
    },
  data() {
    return {

    };
  }
};
</script>
<style>
.header-title{
    display: flex;
    flex-direction: column;
}
.layout-box .header-title p {
  color: #fff;
  line-height: 45px;
  z-index: 999;
  font-size: 18px;
}
.layout-application {
  position: absolute;
  top: 45px;
  padding: 0 10px;
  text-align: left;
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
.application-box {
  padding-top: 10px;
}
</style>

