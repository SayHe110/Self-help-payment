<template>
<div class="layout-box">
    <div class="header-title">
        <p>电费电量</p>
    </div>
    <div class="layout-application">
        <template>
            <ve-histogram :data="chartData" :settings="chartSettings" style="height:350px;"></ve-histogram>
        </template>  
    </div>
</div>
    
</template>
<script>
  module.exports = {
    created: function () {
      this.chartData = {
        columns: ['日期', '电量', '电费'],
        rows: [
          { '电量': 5, '日期': '1月1日', '电费': 0.57*5, },
          { '电量': 2, '日期': '1月2日', '电费': 2*0.57,  },
          { '电量': 2, '日期': '1月3日', '电费': 2*0.57  },
          { '电量': 3, '日期': '1月4日', '电费': 3*0.57, }
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
  background: #f3f3f3;
}
.layout-box .header-title p {
  color: #fff;
  position: fixed;
  line-height: 45px;
  z-index: 999;
  left: 40%;
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

</style>
