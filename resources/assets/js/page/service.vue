<template>
    <div class="layout-box">
        <div class="service-contain">
            <div class="service-title">
                <img src="../assets/icon/icon-shu.png" class="title-icon">
                <p class="title-name">生活服务</p>
            </div>
            <div class="service-type">
                <ul>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>快速购电</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>我的账单</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>电量电费</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>电费余额</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>故障报修</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>停电公告</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>用电常识</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
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
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>快速购电</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>我的账单</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>电量电费</p>
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
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>快速购电</p>
                       </a>
                   </li>
                   <li>
                       <a href="javascript:;">
                           <img src="../assets/icon/yuezhifu.png" alt="">
                           <p>我的账单</p>
                       </a>
                   </li>              
               </ul>
           </div>
       </div>
    </div>
</template>
<script>
    export default {
        name: 'service',
        data () {
            return {
               
            }
        }
    }
</script>
<style>
    .service-title{
        padding-top: 10px;
        width: 100%;
        height: 30px;
        line-height: 30px;
    }
    .title-icon{
        width: 3px;
        height: 16px;
        float: left;
        position: relative;
        left: 10px;
        margin-right: 10px;
        top: 2px;
    }
    .title-name{
        display: block;
        float: left;
        font-size: 14px;
        line-height: 20px;
        padding-left: 8px;
        color: #999;
    }
    .service-type{
        background: #fff;
        width: 100%;
        margin-top: 10px;
        border-radius: 5px;
        border: 0.5px solid #cccccc4a;
        padding: 15px 0;
        height: 160px;
    }
    .service-type ul li{
        float: left;
        width: 25%;
        padding-bottom: 15px;
    }
    .service-type ul li a {
        display: block;
        width: 100%;
        height: 100%;
    }
    .service-type ul li p{
         color: #444;
     }
</style>

