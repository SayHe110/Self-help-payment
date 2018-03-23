<template>
   <div class="layout-box">
        <div class="layout-header">
           <p>掌电</p>
       </div>
        <Scroll :on-reach-bottom="handleReachBottom" :height="getViewPortHeight">
        <div class="home-contain">
            <!-- 轮播图 -->
            <div class="banner">
                <div class="banner-box">
                <Carousel autoplay v-model="value2"
                    :autoplay-speed="setting.autoplaySpeed"
                    :dots="setting.dots"
                    :radius-dot="setting.radiusDot"
                    :trigger="setting.trigger"
                    :arrow="setting.arrow" loop style="height:150px">
                    <CarouselItem v-for="imgvalues in carousel_figureData" :key="imgvalues.id">
                        <div class="demo-carousel">
                            <a href="javascript:;" target="_blank"><img :v-model="carousel_figureData" :src="imgvalues.path"></a>
                        </div>
                    </CarouselItem>
                </Carousel>
                </div>
            </div>
            <!-- 新闻列表 -->
            <div class="news-container">
                <ul class="news-lists">
                        <li v-for="values in topicsData" :key="values.id">
                            <div class="news-box">
                                <router-link :to="{name: 'article', params: {id: values.id}}">
                                    <div class="news-left">
                                        <p class="news-title" :v-model="topicsData">{{values.title}}</p>
                                        <p class="info">
                                            <span>{{values.created_at}}</span>
                                            <span class="margin-left" v-if="values.user!==undefined">{{values.user.nickname}}</span>
                                            <span class="margin-left">
                                                <i class="iconfont icon-sannongguancha">{{values.view_count}}</i>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="news-right">
                                        <img :src="values.title_image_path" alt="">
                                    </div>
                                </router-link>
                            </div>
                        </li>
                    </ul>
                <div v-if="current_page >= total_pages" class="get-more"> <Spin fix>已经到底了</Spin></div>
            </div>
       </div>
       </Scroll>
   </div>
</template>

<script>
export default {
  data() {
    return {
      value2: 0,
      current_page: null,
      total_pages: null,
      setting: {
        autoplay: false,
        autoplaySpeed: 2000,
        dots: "inside",
        radiusDot: true,
        trigger: "click",
        arrow: "never"
      },
      topicsData: [{ id: "" }, { title: "" }, { body: "" }],
      carousel_figureData: [{ id: "" }, { path: "" }]
    };
  },
  //请求接口
  mounted() {
    // 文章
    this.$http.get("topics?include=user").then(res => {
      this.topicsData = res.body.data;
      this.current_page = res.body.meta.pagination.current_page;
      this.total_pages = res.body.meta.pagination.total_pages;
    });
    // 轮播图
    this.$http.get("carousel_figure").then(res => {
      this.carousel_figureData = res.body.images;
    });
  },
  computed: {
    // 获取浏览器窗口的可视区域的高度
    getViewPortHeight: function() {
      return document.documentElement.clientHeight - 45;
    }
  },
  methods: {
    handleReachBottom() {
      if (this.current_page >= this.total_pages) {
        return false;
      } else {
        return new Promise(resolve => {
          this.$http
            .get("topics", {
              params: {
                page: ++this.current_page
              }
            })
            .then(res => {
              for (let i in res.body.data) {
                this.topicsData.push(res.body.data[i]);
              }
            });
        });
      }
    }
  }
};
</script>
<style scoped>
.layout-box {
  background-color: #fff;
  top: 35px;
  padding: 0px;
}
/* 轮播图 */
.banner {
  position: relative;
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
  padding: 0 10px;
}
.news {
  background: #fff;
  padding: 20px 0;
}
.news-box {
  width: 100%;
  height: 100%;
  position: relative;
}
.news-lists li {
  flex-direction: row;
  display: flex;
  padding: 10px 0px;
  overflow: hidden;
  background-color: #fff;
  border-bottom: 1px solid #eee;
  height: 90px;
}
.news-box a {
  display: block;
  height: 100%;
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
  font-size: 14px;
  color: #444;
  text-align: left;
  padding-bottom: 5px;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
  overflow: hidden;
}
.news-box .info {
  color: #999;
  font-size: 12px;
  text-align: left;
  margin-bottom: 0px;
  position: absolute;
  bottom: 0px;
}
.news-box .info .margin-left {
  margin-left: 10px !important;
}
.news-right img {
  width: 100%;
  height: 100%;
  border-radius: 5px;
}
.get-more {
  height: 20px;
  position: relative;
  padding: 20px 0;
}
.ivu-spin {
  color: #1bbc9b;
}
.ivu-spin-fix {
  z-index: 0;
}
</style>

