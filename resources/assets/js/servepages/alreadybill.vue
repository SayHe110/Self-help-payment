<template>
<div class="layout-box">
    <sheader headerTitle="我的订单"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <!-- <div class="no_card" :v-model="dorm" v-if="dorms.order_num == null">
                <img src="../assets/icon/nodata.png" width="100%">
                <p style="font-size:20px">暂无订单</p>
            </div> -->
            <Scroll :on-reach-bottom="handleReachBottom" :height="getViewPortHeight">
            <div class="card" v-for="(item, index) in dorms" :key="index" >
                <div class="card-head">
                    <p>下单日期：{{item.created_at}}</p>
                </div>
                <div class="card-body">
                     <img src="../assets/icon/iview.png" alt="">
                    <ul>
                        <li><p class="list_font">订单编号:<span>{{item.order_num}}</span></p></li>
                        <li><p class="list_font">支付金额:<span>{{item.money}}元</span></p></li>
                        <li><p class="list_font">充电宿舍:<span>{{item.dormitory_id}}</span></p></li>
                    </ul>
                </div>
                <p class="money">实际付款:<span>¥{{item.money}}</span></p>                
            </div>
            </Scroll>
        </div>  
    </div>
</div>
</template>
<script>
import sheader from "../components/box.vue";
export default {
  components: {
    sheader
  },
  data() {
    return {
      current_page: null,
      total_pages: null,
      dorms: [
        {
          order_num: "",
          money: "",
          dormitory_id: "",
          created_at: ""
        }
      ],
      dorm_content: {},
      dormstudent: {},
      dorm: []
    };
    styledata: {
        background: 'white';
    }
  },
  computed: {
    // 获取浏览器窗口的可视区域的高度
    getViewPortHeight: function() {
      return document.documentElement.clientHeight - 45;
    }
  },
  mounted() {
    this.$http.get("orders").then(res => {
      this.dorms = res.data.data.map(item => {
        let dom = {
          created_at: item.created_at,
          order_num: item.order_num,
          money: item.money,
          dormitory_id: item.dormitory_id
        };
        console.log(item.order_num, item.money, item.dormitory_id);
        return dom;
      });
    });
  },
  methods: {
    handleReachBottom() {
      if (this.current_page >= this.total_pages) {
        return false;
      } else {
        return new Promise(resolve => {
          this.$http
            .get("orders", {
              params: {
                page: ++this.current_page
              }
            })
            .then(res => {
              for (let i in res.body.data) {
                this.dorms.push(res.body.data[i]);
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
  position: absolute;
  top: 0px;
  padding: 0px 0px;
  width: 100%;
  height: 100%;
  background: #f3f3f3;
}
.header-title {
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
/* 订单*/
.no_card{
    text-align: center;
    background: #fff;
    position: absolute;
    width: 100%;
    left: 0;
    height: 100%;
    top: 0;
}
.card {
  background: #fff;
  border-radius: 4px;
  font-size: 14px;
  position: relative;
  transition: all 0.2s ease-in-out;
  margin-bottom: 10px;
  padding-bottom: 0px;
  border-bottom: 1px solid #eee;
}
.card-head {
  padding: 0px 10px;
  height: 40px;
  line-height: 40px;
  border-top: 1px solid #eee;
  border-bottom: 1px solid #eee;
}
.card-head p {
  display: inline-block;
  width: 100%;
  font-size: 14px;
  color: #444;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.card-body {
  padding: 10px;
  border-bottom: 1px solid #eee;
}
.list_font span {
  padding-left: 8px;
  font-size: 14px;
}
/* .card-body ul li p {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    padding-bottom: 5px;
} */
.card-body img {
  float: left;
  width: 70px;
  margin-right: 20px;
}
.money {
  text-align: right;
  font-size: 14px;
  padding: 5px 15px;
}
.money span {
  padding-left: 7px;
  font-size: 16px;
}
</style>
