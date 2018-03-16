<template>
    <div class="layout-box">
        <div class="layout-header">
            <a href="javascript:;" @click="back" class="return"><Icon type="android-arrow-back" color="#fff" size="28"></Icon></a>
            <Dropdown class="menu" trigger="click"  placement="bottom-end">
                <a href="javascript:;"><Icon type="android-more-vertical" color="#fff" size="28"></Icon></a>
                <DropdownMenu slot="list">
                    <button  @click="success"><DropdownItem>收藏</DropdownItem></button>
                    <DropdownItem>分享</DropdownItem>
                    <DropdownItem>评论</DropdownItem>
                </DropdownMenu>
            </Dropdown>
        </div>
        <div class="article-contain">
            <div class="article-title">
                <h2>{{topicsData.title}}</h2>
                <p class="info">
                    <span>{{topicsData.created_at}}</span>
                    <span class="margin-left">{{topicsData.user.nickname}}</span>
                    <span class="margin-left">
                        <i class="iconfont icon-sannongguancha">{{topicsData.view_count}}</i>
                    </span>
                </p>
            </div>
            <div class="article-box">
                <p>{{topicsData.body}}</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return{
            topicsData: []
        }
    },
    mounted () {
        this.loadItem();
    },
    methods: {
        back() {
        this.$router.back(-1);
        },
        success() {
        this.$Message.success("收藏成功!");
        },
        loadItem(){
            this.$http.get("topics/" + this.$route.params.id + '?include=user').then(res => {
            this.topicsData = res.body;
            })
        }
  }
};
</script>
<style>
.layout-box {
  background: #fff;
  position: absolute;
  top: 45px;
  padding: 0 10px;
  width: 100%;
  padding-bottom: 65px;
}

.layout-header {
  height: 45px;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  color: #fff;
  background: #1bbc9b;
  line-height: 45px;
  font-size: 18px;
  z-index: 999;
  padding: 0 10px;
}
.layout-header .return {
  float: left;
  line-height: 45px;
  position: absolute;
  left: 20px;
  top: 8px;
}
.layout-header .menu {
  float: right;
  position: absolute;
  right: 20px;
  top: 8px;
}
.layout-header .return img {
  width: 100%;
  height: 100%;
}
.menu button {
  background: #fff;
  border: none;
}
.article-title {
  text-align: left;
  padding:10px 0;
}
.article-title h2 {
  font-size: 18px;
  line-height: 1.5;
  font-weight: 600;
  color: #444;
  margin-bottom: 5px;
  text-align: left;
}
.article-title .info {
  color: gray;
  font-size: 13px;
  text-align: left;
  margin-bottom: 0px;
  border-bottom: 1px solid #eee;
  padding-bottom: 5px;
}
.article-box {
  width: 100%;
  max-width: 100%;
  font-size: 14px;
  line-height: 1.8;
  color: #666;
  word-wrap: break-word;
  text-align: justify;
  padding: 10px;
  text-indent: 2em;
}
</style>

