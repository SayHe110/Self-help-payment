<template>
<div class="layout-box">
    <div class="header-title">
        <p>电费电量</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            <div class="personal">
                <img src="../assets/icon/touxiang.png" alt="">
                <div class="title">                        
                    <p>用户名：31321</p>
                    <p>宿舍号：9A106</p>
                </div>
            </div>
            <div class="total">
                <ul>
                    <li>2017年电量120度</li>
                    <li>电费90元</li>
                </ul>
            </div>
            <div class="box">
                <ul>
                    <li class="item">
                        <div class="box-head">1月</div>
                        <div class="box-info">
                            <li>
                                <img src="../assets/icon/dianliang.png" alt="">
                                <p>41度</p>
                            </li>
                            <li>
                                <img src="../assets/icon/qian.png" alt="">
                                <p>21元</p>
                            </li>
                        </div>
                    </li>
                    <li class="item">
                        <div class="box-head">1月</div>
                        <div class="box-info">
                            <li>
                                <img src="../assets/icon/dianliang.png" alt="">
                                <p>41度</p>
                            </li>
                            <li>
                                <img src="../assets/icon/qian.png" alt="">
                                <p>21元</p>
                            </li>
                        </div>
                    </li>
                    <li class="item">
                        <div class="box-head">1月</div>
                        <div class="box-info">
                            <li>
                                <img src="../assets/icon/dianliang.png" alt="">
                                <p>41度</p>
                            </li>
                            <li>
                                <img src="../assets/icon/qian.png" alt="">
                                <p>21元</p>
                            </li>
                        </div>
                    </li>
                    <li class="item">
                        <div class="box-head">1月</div>
                        <div class="box-info">
                            <li>
                                <img src="../assets/icon/dianliang.png" alt="">
                                <p>41度</p>
                            </li>
                            <li>
                                <img src="../assets/icon/qian.png" alt="">
                                <p>21元</p>
                            </li>
                        </div>
                    </li>
                    <li class="item">
                        <div class="box-head">1月</div>
                        <div class="box-info">
                            <li>
                                <img src="../assets/icon/dianliang.png" alt="">
                                <p>41度</p>
                            </li>
                            <li>
                                <img src="../assets/icon/qian.png" alt="">
                                <p>21元</p>
                            </li>
                        </div>
                    </li>
                    <li class="item">
                        <div class="box-head">1月</div>
                        <div class="box-info">
                            <li>
                                <img src="../assets/icon/dianliang.png" alt="">
                                <p>41度</p>
                            </li>
                            <li>
                                <img src="../assets/icon/qian.png" alt="">
                                <p>21元</p>
                            </li>
                        </div>
                    </li>
                </ul>
            </div>
        </div>  
    </div>
</div>
</template>
<script>
export default {};
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
.personal{
    height: 72px;
    background: #fff;
    position: absolute;
    width: 100%;
    left: 0;
    top: 0;
}
.personal img{
    float: left;
    padding: 0 10px;
    float: left;
    overflow: hidden;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
}
.personal .title{
    font-size: 14px;
    float: left;
    text-align: center;
    padding-left: 10px;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 15%;
}
.total {
  text-align: center;
  padding: 10px;
  margin-top: 70px;
}
.total ul {
  display: inline-block;
}
.total ul li {
  display: block;
  float: left;
  padding: 0 5px;
  font-size: 16px;
  color: #444;
}
.box{
    width: 100%;
    padding: 15px 5px 0;
    background: #fff;
    position: absolute;
    left: 0;

}
.item{
    float: left;
    padding: 5px 5px;
    width: 33.3%;
}
.box-head{
    text-align: center;
    font-size: 16px;
    background: #b1f7d3;
    color: #444;
}
.box-info{
    background: #1bbc9b;
    text-align: center;
}
.box-info li{
    height: 32px;
    line-height: 32px;
    color: #fff;
}
.box-info li img{
    float: left;
}
.box-info li p{
    display: block;
    float: right;
    padding-right: 5px;
    font-size: 14px;
}

</style>
