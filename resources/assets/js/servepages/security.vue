<template>
<div class="layout-box">
    <sheader headerTitle="账户与安全"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <div class="personal-contain ">
            <ul>
                <li>
                    <router-link :to="{name: 'SetPassword'}">
                        <p class="personal-type">修改账户密码</p>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'tellphone'}">
                        <p class="personal-type">手机号</p>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'Alipay'}">
                        <p class="personal-type">绑定支付宝</p>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'Forget'}">
                        <p class="personal-type">邮箱地址</p>
                    </router-link>
                </li>
            </ul>
            </div>
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
      name_value: "",
      autograph_value: ""
    };
  },
  methods: {
   
  }
};
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
  top: 25px;
  padding: 0 10px;
  text-align: left;
  width: 100%;
  background: #fff;
}
.application-box {
  padding-top: 20px;
}
.personal-contain {
  position: absolute;
  background: #fff;
  width: 100%;
  left: 0;
}
.personal-contain ul li {
  height: 48px;
  border-bottom: 1px solid #f3f3f3;
}
.personal-contain ul .personal-box {
  height: 72px;
}
.personal-box p {
  line-height: 72px;
}
.personal-contain ul li a {
  display: block;
  padding: 0 10px;
  width: 100%;
  height: 100%;
}
.personal-contain ul li .personal-icon {
  position: absolute;
  right: 10px;
  width: 48px;
  height: 48px;
  float: left;
  overflow: hidden;
  margin-top: 12px;
}
.personal-contain ul li .personal-icon img {
  width: 100%;
  height: 100%;
}
.personal-contain ul li .personal-title {
  float: left;
  padding-left: 10px;
  text-align: left;
  margin-top: 15px;
}
.personal-contain ul li .personal-title p {
  color: #444;
  font-size: 16px;
}
.personal-contain ul li .personal-title span {
  color: #999;
  font-size: 13px;
}
.personal-contain ul li .personal-exit,
.personal-value {
  position: absolute;
  right: 10px;
  color: #999;
  line-height: 72px;
}
.personal-contain ul li .personal-exit a {
  color: #444;
}
.personal-contain ul li .personal-type {
  display: block;
  float: left;
  color: #444;
  line-height: 48px;
  font-size: 14px;
}
.personal-contain ul li .personal-value {
  line-height: 48px;
  font-size: 13px;
}
</style>
