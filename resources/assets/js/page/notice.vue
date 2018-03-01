<template>
   <div class="layout-box">
       <div class="notice-contain">
           <ul>
               <li>
                   <a href="javascript:;">
                       <div class="notice-icon"><img src="../assets/icon/huodong.png" alt=""></div>
                       <div class="notice-title">
                           <p>精彩活动</p>
                            <span>暂无内容</span>
                       </div>
                       <span class="notice-time">2018-3-1</span>
                   </a>
                </li>
                <li>
                   <a href="javascript:;">
                       <div class="notice-icon"><img src="../assets/icon/xitongxiaoxi.png" alt=""></div>
                       <div class="notice-title">
                           <p>系统消息</p>
                            <span>暂无内容</span>
                       </div>
                       <span class="notice-time">2018-3-1</span>
                   </a>
                </li>
           </ul>
       </div>
   </div>
</template>
<script>
    export default {
        name: 'notice'
    }
</script>
<style>
    .notice-contain{
        position: absolute;
        background: #fff;
        width: 100%;
        left: 0;
    }
    .notice-contain ul li{
        height: 50px;
        border-bottom: 1px solid #f3f3f3;
    }
    .notice-contain ul li a{
        display: block;
        padding: 5px 10px;
        width: 100%;
        height: 100%;
    }
    .notice-contain ul li .notice-icon{
        width: 32px;
        height: 32px;
        float: left;
     }
     .notice-contain ul li .notice-title{
        float: left;
        padding-left: 10px;
     }
     .notice-contain ul li .notice-title p{
        color: #444;
        font-size: 14px;
     }
     .notice-contain ul li .notice-title span{
        color: #ccc;
        font-size: 12px;
     }
     .notice-contain ul li .notice-time{
        position: absolute;
        right: 10px;
        color: #ccc;
     }
</style>

