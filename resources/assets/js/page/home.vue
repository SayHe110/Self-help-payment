<template>
   <div class="layout-box">
       <div class="home-contain">
            <div class="banner">
                <Carousel autoplay v-model="value2"
                    :autoplay-speed="setting.autoplaySpeed"
                    :dots="setting.dots"
                    :radius-dot="setting.radiusDot"
                    :trigger="setting.trigger"
                    :arrow="setting.arrow" loop style="height:150px">
                    <CarouselItem>
                        <div class="demo-carousel">
                            <a href="javascript:;" target="_blank"><img src="../assets/images/03.png"></a>
                        </div>
                    </CarouselItem>
                    <CarouselItem>
                        <div class="demo-carousel">
                            <a href="javascript:;" target="_blank"><img src="../assets/images/01.jpg"></a>
                        </div>
                    </CarouselItem>
                    <CarouselItem>
                        <div class="demo-carousel">
                            <a href="javascript:;" target="_blank"><img src="../assets/images/03.png"></a>
                        </div>
                    </CarouselItem>
                    <CarouselItem>
                        <div class="demo-carousel">
                            <a href="javascript:;" target="_blank"><img src="../assets/images/01.jpg"></a>
                        </div>
                    </CarouselItem>
                </Carousel>
            </div>
            <div class="news-container">
                <ul class="news-lists">
                        <li>
                            <div class="news-box">
                                <a href="javascript:;">
                                    <div class="news-left">
                                        <p class="news-title">国家电网公司积极推进10个城市世界一流城市配电网建设</p>
                                        <p class="info">
                                            <span>2017-12-27</span>
                                            <span class="margin-left">admin</span>
                                            <span class="margin-left">
                                                <i class="iconfont icon-sannongguancha"> 90</i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="news-right">
                                        <img src="../assets/images/list1.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="news-box">
                                <a href="javascript:;">
                                    <div class="news-left">
                                        <p class="news-title">能源绿色低碳转型组合拳推出</p>                                        
                                        <p class="info">
                                            <span>2017-12-27</span>
                                            <span class="margin-left">admin</span>
                                            <span class="margin-left">
                                                <i class="iconfont icon-sannongguancha"> 90</i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="news-right">
                                        <img src="../assets/images/list2.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="news-box">
                                <a href="javascript:;">
                                    <div class="news-left">
                                        <p class="news-title">国家电网蝉联中国500最具价值品牌第一名</p>
                                        <p class="info">
                                            <span>2017-12-27</span>
                                            <span class="margin-left">admin</span>
                                            <span class="margin-left">
                                                <i class="iconfont icon-sannongguancha"> 90</i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="news-right">
                                        <img src="../assets/images/list3.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="news-box">
                                <a href="javascript:;">
                                    <div class="news-left">
                                        <p class="news-title">国家电网蝉联中国500最具价值品牌第一名</p>
                                        <p class="info">
                                            <span>2017-12-27</span>
                                            <span class="margin-left">admin</span>
                                            <span class="margin-left">
                                                <i class="iconfont icon-sannongguancha"> 90</i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="news-right">
                                        <img src="../assets/images/02.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="news-box">
                                <a href="javascript:;">
                                    <div class="news-left">
                                        <p class="news-title">国家电网蝉联中国500最具价值品牌第一名</p>
                                        <p class="info">
                                            <span>2017-12-27</span>
                                            <span class="margin-left">admin</span>
                                            <span class="margin-left">
                                                <i class="iconfont icon-sannongguancha"> 90</i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="news-right">
                                        <img src="../assets/images/list1.png" alt="">
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <div class="get-more"> <Spin fix>加载中...</Spin></div>
                </div>
       </div>
   </div>
</template>

<script>
    export default {
        data () {
            return {
                value2: 0,
                setting: {
                    autoplay: false,
                    autoplaySpeed: 2000,
                    dots: 'inside',
                    radiusDot: true,
                    trigger: 'click',
                    arrow: 'never'
                }
            }
        }
    }
</script>
<style scoped>
.layout-box {
  background-color: #fff;
}
/* 轮播图 */
.banner {
  position: absolute;
  left: 0;
  overflow: hidden;
  width: 100%;
  height: 150px;
}
.demo-carousel img {
  height: 150px !important;
  width: 100%;
}
/* 新闻资讯 */
.news-container {
  padding-top: 150px;
  padding-bottom: 50px;
}
.news {
  background: #fff;
  padding: 20px 0;
}
.news-box {
  width: 100%;
}
.news-lists li {
  flex-direction: row;
  display: flex;
  padding: 10px 0px;
  overflow: hidden;
  background-color: #fff;
  border-bottom: 1px solid #eee;
}
.news-left {
  width: 60%;
  float: left;
  padding-right: 5px;
}
.news-right {
  width: 40%;
  height: 100%;
  float: left;
}
.news-box .news-title {
  font-size: 15px;
  color: #444;
  display: block;
  margin-top: 5px;
  text-align: left;
  padding-bottom: 5px;
}
.news-box .info {
  color: #999;
  font-size: 13px;
  text-align: left;
  margin-bottom: 0px;
}
.news-box .info .margin-left {
  margin-left: 10px !important;
}
.news-right img {
  width: 100%;
  height: 100%;
  border-radius: 5px;
}
.get-more{
    height: 20px;
    position: relative;
    padding:20px 0;
}
.ivu-spin{
    color: #1bbc9b;
}
.ivu-spin-fix{
    z-index: 0;
}
</style>

