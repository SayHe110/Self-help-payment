<template>
    <div class="layout-box">
        <div class="layout-header">
           <p>我的消息</p>
        </div>
        <div class="notice-contain">
            <ul>
                <li  v-for="(item, index) in dorms" :key="index">
                    <a href="javascript:;">
                       <div class="notice-icon"><img src="../assets/icon/buydian.png" alt=""></div>
                       <div class="notice-title">
                           <p>购电通知</p>
                            <span>您于{{item.created_at}}购电{{item.money}}元核算{{item.money}}度电</span>
                       </div>
                       <span class="notice-time">2018-3-25</span>
                   </a>
                </li>
            </ul>
        </div>
   </div>
</template>
<script>
export default {
  name: "notice",
  data() {
    return {
      current_page: null,
      total_pages: null,
      dorms: [],
      dorm_content: {},
      dormstudent: {},
      dorm: [],
      notice:[{title: ""}, {body: ""}, {time: ""}]
    };
  },
  mounted() {
    // 消息
    this.$http.get("user/notifications").then(res => {
      console.log(res.data);
    });
    this.$http.get("orders?include=dormitory").then(res => {
      this.dorms = res.data.data.map(item => {
        let dom = {
          created_at: item.created_at,
          order_num: item.order_num,
          money: item.money,
          dormitory_id: item.dormitory.dorm_name,
          handle: item.is_handle
        };
        return dom;
      });
    });
  }
};
</script>
<style>
.notice-contain {
  position: absolute;
  background: #fff;
  width: 100%;
  left: 0;
}
.notice-contain ul li {
  height: 60px;
  border-bottom: 1px solid #f3f3f3;
}
.notice-contain ul li a {
  display: block;
  padding: 12px 10px;
  width: 100%;
  height: 100%;
}
.notice-contain ul li .notice-icon {
  width: 32px;
  height: 32px;
  float: left;
}
.notice-contain ul li .notice-title {
  float: left;
  padding-left: 10px;
  text-align: left;
}
.notice-contain ul li .notice-title p {
  color: #444;
  font-size: 14px;
}
.notice-contain ul li .notice-title span {
  color: #ccc;
  font-size: 12px;
}
.notice-contain ul li .notice-time {
  position: absolute;
  right: 10px;
  color: #ccc;
}
</style>

