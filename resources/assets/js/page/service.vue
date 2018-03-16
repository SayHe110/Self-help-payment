<template>
    <div class="layout-box">
        <div class="layout-header">
           <p>全部应用</p>
        </div>
        <div class="service-contain">
            <div class="service-title">
                <img src="../assets/icon/icon-shu.png" class="title-icon">
                <p class="title-name">生活服务</p>
            </div>
            <div class="service-type">
                <ul>
                   <li>
                        <router-link :to="{name: 'pay'}">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>快速购电</p>
                       </router-link>
                   </li>
                   <li>
<<<<<<< HEAD
                         <router-link :to="{name: 'mybill'}">
                           <img src="../assets/icon/zhangdan.png" alt="">
                           <p>我的订单</p>
                         </router-link>
=======
                        <router-link :to="{name: 'mybill'}">
                           <img src="../assets/icon/zhangdan.png" alt="">
                           <p>我的账单</p>
                        </router-link>
>>>>>>> 1ad0b0bd6e549a7a6118a3e7325c36d231c5109c
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/dianfei.png" alt="">
                           <p>电量电费</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yue.png" alt="">
                           <p>电费余额</p>
                       </a>
                   </li>
                   <li>
                        <router-link :to="{name: 'repair'}">
                           <img src="../assets/icon/baoxiu.png" alt="">
                           <p>故障报修</p>
                        </router-link>
                   </li>
                   <li>
                        <router-link :to="{name: 'PowerCutNotice'}">
                           <img src="../assets/icon/gonggao.png" alt="">
                           <p>停电公告</p>
                        </router-link>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/changshi.png" alt="">
                           <p>用电常识</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/tousu.png" alt="">
                           <p>投诉举报</p>
                       </a>
                   </li>
               </ul>
           </div>
        </div>
        <div class="service-contain">
            <div class="service-title">
                <img src="../assets/icon/icon-shu.png" class="title-icon">
                <p class="title-name">增值服务</p>
            </div>
            <div class="service-type" style="height:85px">
                <ul>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/fudian.png" alt="">
                           <p>自助复电</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/licai.png" alt="">
                           <p>电商理财</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/fuwu.png" alt="">
                           <p>网点服务</p>
                       </a>
                   </li>                   
               </ul>
           </div>
       </div>
       <div class="service-contain">
            <div class="service-title">
                <img src="../assets/icon/icon-shu.png" class="title-icon">
                <p class="title-name">绿色公益</p>
            </div>
            <div class="service-type" style="height:85px">
                <ul>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/fupin.png" alt="">
                           <p>电商扶贫</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/ditan.png" alt="">
                           <p>低碳生活</p>
                       </a>
                   </li>              
               </ul>
           </div>
       </div>
    </div>
</template>
<script>
export default {
  name: "service",
  data() {
    return {};
  }
};
</script>
<style>
.service-title {
  padding-top: 10px;
  width: 100%;
  height: 30px;
  line-height: 30px;
}
.title-icon {
  width: 3px;
  height: 16px;
  float: left;
  position: relative;
  left: 10px;
  margin-right: 10px;
  top: 2px;
}
.title-name {
  display: block;
  float: left;
  font-size: 14px;
  line-height: 20px;
  padding-left: 8px;
  color: #999;
}
.service-type {
  background: #fff;
  width: 100%;
  margin-top: 10px;
  border-radius: 5px;
  border: 0.5px solid #cccccc4a;
  padding: 15px 0;
  height: 160px;
}
.service-type ul li {
  float: left;
  width: 25%;
  padding-bottom: 15px;
}
.service-type ul li a {
  display: block;
  width: 100%;
  height: 100%;
}
.service-type ul li p {
  color: #444;
}
</style>

