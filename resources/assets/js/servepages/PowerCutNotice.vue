<template>
<div class="layout-box">
    <sheader headerTitle="停电公告"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <div class="card" v-for="values in noticeData" :key="values.id">
                <div class="card-head">
                    <p :v-model="noticeData" >{{values.title}}</p>
                </div>
                <div class="card-body">
                    <p class="card-box">{{values.body}}</p>
                    <p class="time">{{values.created_at}}</p>
                </div>
            </div>
        </div>  
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
        return{
            noticeData: [{ id: "" }, { title: "" }, { body: "" }, {time: ""}]
        }
    },
     mounted() {
    // 停电公告
    this.$http.get("power_failure").then(res => {
      this.noticeData = res.body.topics;
    //   this.current_page = res.body.meta.pagination.current_page;
    //   this.total_pages = res.body.meta.pagination.total_pages;
    });
  },
};
</script>
<style scoped>
.layout{
    background: #f3f3f3;
}
.layout-box {
  position: absolute;
  top: 0px;
  padding: 0px 0px;
  width: 100%;
  height: 100%;
  background: #f3f3f3;
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
  background: #f3f3f3;
}
.application-box {
  padding-top: 10px;
}
/* 卡片 */
.card {
  background: #fff;
  border-radius: 4px;
  font-size: 14px;
  position: relative;
  transition: all 0.2s ease-in-out;
  padding: 10px;
  margin-bottom: 10px;
  padding-bottom: 0px;
}
.card-head {
  padding: 0px 5px;
  line-height: 1;
}
.card-head p {
  display: inline-block;
  width: 100%;
  height: 20px;
  line-height: 20px;
  font-size: 14px;
  color: #1c2438;
  font-weight: 700;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.card-body {
  padding: 5px;
}
.card-box {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    padding-bottom: 5px;
}
.time {
  text-align: right;
  font-size: 13px;
}
</style>
