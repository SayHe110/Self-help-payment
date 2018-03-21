<template>
<div class="layout-box">
    <div class="header-title">
        <p>个人信息</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            <div class="personal-contain ">
            <ul>
                <li class="personal-box">
                    <a href="javascript:;">                        
                        <p class="personal-type" style="line-height:72px;">头像</p>
                        <div class="personal-icon">
                            <Upload action="//jsonplaceholder.typicode.com/posts/">
                                <img src="../assets/icon/4.jpg" alt="">
                            </Upload>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <p class="personal-type">昵称</p>
                        <span class="personal-value">南枫</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <p class="personal-type">学号</p>
                        <span class="personal-value">1508220235</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <p class="personal-type">宿舍号</p>
                        <span class="personal-value">9A106</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <p class="personal-type">个性签名</p>
                        <span class="personal-value"></span>
                    </a>
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
