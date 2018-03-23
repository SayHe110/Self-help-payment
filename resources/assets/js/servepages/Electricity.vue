<template>
<div class="layout-box">
    <sheader headerTitle="电费电量"></sheader>
    <div class="layout-application">
        <template>
            <ve-histogram :data="chartData" :settings="chartSettings" height="300px" style="top:20px"></ve-histogram>
        </template>
        <div class="total">
            <ul>
                <li style="border-bottom: 1px solid #e9eaec;">
                    <p class="title">月用电量</p>
                    <div class="info">
                        <img src="../assets/icon/dianliang.png" alt="">
                        <p>41度</p>
                    </div>
                </li>
                <li>
                    <p class="title">月用电费</p>
                    <div class="info">
                        <img src="../assets/icon/qian.png" alt="">
                        <p>21元</p>
                    </div>
                </li>
            </ul>
        </div>        
        <li class="details">
            <router-link :to="{name: 'Powerdetails'}">
                <p>2017年电费电量</p>
                <span>详情></span>
            </router-link>
        </li>
    </div>
</div>
</template>
<script>
import sheader from '../components/box.vue'
export default {
     components:{
        sheader
    },
  data(){
      return{}
  },
    created: function () {
      this.chartData = {
        columns: ['日期', '电量', '电费'],
        rows: [
          { '电量': 5, '日期': '1-1', '电费': 0.57*5, },
          { '电量': 2, '日期': '1-2', '电费': 2*0.57, },
          { '电量': 2, '日期': '1-3', '电费': 2*0.57  },
          { '电量': 3, '日期': '1-4', '电费': 3*0.57, },
          { '电量': 3, '日期': '1-4', '电费': 3*0.57, },
          { '电量': 3, '日期': '1-4', '电费': 3*0.57, },
          { '电量': 3, '日期': '1-4', '电费': 3*0.57, },
        ]
      }
      this.chartSettings = {
        metrics: ['电量', '电费'],
        dimension: ['日期'],
        yAxisName: ['kW·h']
        
      }
    }
}
</script>
<style scoped>
.layout-box {
  position: absolute;
  top: 0px;
  padding: 0px 0px;
  width: 100%;
  height: 100%;
  background: #fff;
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
  background: #fff;
}
.application-box {
  padding-top: 10px;
}
.total{
    padding: 0 15px;
}
.total ul li{
    height: 36px;
    line-height: 36px;
    margin-bottom: 10px;
}
.total ul li .title{
    display: block;
    float: left;
    font-size: 18px;
}
.total ul li .info{
    min-width: 25%;
    height: 36px;
    float: right;
}
.total ul li .info img{
    float: left;
}
.total ul li .info p{
    font-size: 16px;
    color: #999;
}
.details{
    background: #FE6D38;
    font-size: 18px;
    height: 36px;
    line-height: 36px;
    padding: 0 10px;
}
.details p{
    display: block;
    float: left;
    color: #fff;
    padding-left: 5px;
}
.details span{
    float: right;
    padding-right: 15px;
    color: #fff;
}
</style>
