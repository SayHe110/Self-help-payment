<template>
<div class="layout-box">
    <div class="header-title">
        <p>我的订单</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            <div class="card">
                <div class="card-head">
                    <p>下单日期：2018年3月21日 16：22</p>
                </div>
                <div class="card-body">
                     <img src="../assets/icon/iview.png" alt="">
                    <ul>
                        <li><p>订单编号:10002001</p></li>
                        <li><p>支付金额:{{$route.params.name}}元</p></li>
                        <li><p>充电宿舍:{{dorm_content}}</p></li>
                    </ul>
                </div>
                <p class="money">实际付款:{{$route.params.name}}</p>                
            </div>
        </div>  
    </div>
</div>
</template>
<script>
export default {
    data(){
        return{
         dorm_content: {},
         dormstudent: {},
         dorm:[]
        }
    },
     mounted(){
      this.$http.get("orders").then(res => {
         this.dorm = res.data.dormitories.map(){
             
         }
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
  padding-top: 10px;
}
/* 订单*/
.card {
  background: #fff;
  border-radius: 4px;
  font-size: 14px;
  position: relative;
  transition: all 0.2s ease-in-out;
  margin-bottom: 10px;
  padding-bottom: 0px;
  border-bottom: 1px solid #eee;
}
.card-head {
  padding: 0px 10px; 
  height: 40px;
  line-height: 40px;
  border-top: 1px solid #eee;
  border-bottom: 1px solid #eee;
  
}
.card-head p {
  display: inline-block;
  width: 100%;
  font-size: 14px;
  color: #444;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.card-body {
  padding: 10px;
  border-bottom: 1px solid #eee;
}
/* .card-body ul li p {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    padding-bottom: 5px;
} */
.card-body img{
    float: left;
    width: 72px;
    margin-right: 20px;
}
.money {
  text-align: right;
  font-size: 14px;
  padding: 5px 15px;
}
</style>
