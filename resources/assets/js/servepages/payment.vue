<template>
<div class="layout-box">
    <div class="header-title">
        <p>支付成功</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            <img src="../assets/icon/success.png">
            <p>支付成功</p>
        </div> 
        <div class="list_box">
          <ul>
              <li>订单编号:<span>10002001</span></li>
              <li>支付金额:<span>{{$route.params.name}}</span></li>
              <li>交易日期:<span>2018-3-19</span></li>
              <li v-if="dorm_content !== undefined">充电宿舍:<span>{{dorm_content}}</span></li>
          </ul>
        </div> 
          <router-link :to="{name: 'service'}">
          <Button type="success" long>返回</Button>
          </router-link>
    </div>
    
</div>
</template>
<script>
export default {
  data() {
    return {
      dorm_content: {},
      dormstudent: {},
      modal1: false,
      myDate: [],
      a: false,
      idCard: [],
      formPay: {
        dorNum: [],
        cash: null
      }
    };
  },
  mounted(){
    this.$http.get("dormitories/" + this.$route.params.id).then(res => {
      this.dormstudent = res.data.data;
      this.dorm_content = res.data.dorm_name;
    })
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
  top: 45px;
  padding: 0 10px;
  text-align: left;
  width: 100%;
  padding-bottom: 65px;
  background: #f3f3f3;
}
.application-box {
  text-align: center;
  position: relative;
  padding-top: 10px;
  width: 100%;
  height: 150px;
}
.application-box p{
  font-size: 20px;
  line-height: 40px;
  letter-spacing: 1.5px;
  font-family: "Micsoft Yahei";
}
.list_box{
  background-color: #fff;
}
.list_box ul li{
  padding: 10px 15px;
}
.list_box ul li span{
  padding-left: 20px;
  font-size: 16px;
  font-family: "Micsoft Yahei";
}
button{
  margin-top: 15px; 
}
</style>
