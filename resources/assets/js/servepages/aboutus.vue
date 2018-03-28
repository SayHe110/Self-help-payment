<template>
<div class="layout-box">
    <sheader headerTitle="关于我们"></sheader>
    <div class="layout-application">
        <div class="application-box" style="padding-top:30px;text-align:center">
            <h2 style="margin-bottom:10px;">互联网+掌上校园购电系统</h2>
            <p>足不出户,移动缴费,方便快捷</p>
            <p>运用“互联网+”思维，创新开展智能交费业务，让学子足不出户就能轻松交纳宿舍电费。</p>
            <p>旨在为广大学子提供方便、快捷、舒心的人性化供电服务。</p>
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
.application-box p{
    font-size: 16px;
}
</style>

