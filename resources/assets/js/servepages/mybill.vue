<template>
	<div class="layout-box">
    <sheader headerTitle="提交订单"></sheader>
        <div class="layout-application">
            <div class="application-box">
                <ul>
                    <li><p>缴费宿舍 :</p><span>{{dorm_content}}</span></li>
                    <li v-if="dorm_content !== undefined"><p>缴费金额 :</p><span>{{$route.params.name}}元</span></li>
                </ul>
                <Button type="success" long @click="showIdCardInput">提交订单</Button>
            </div>                
        </div>
         <transition name="fade">
            <div class="mask_one" v-show="a">
              <div class="password">
                <div class="cancer">
                  <button @click="a=false"><Icon type="chevron-left" style="margin-top:4px;"></Icon></button>
                  <p>请输入支付密码</p>
                  <span style="color:red;">{{err_message}}</span>
                </div>
                <div class="button_box">
                  <input :key="n" v-for="n in 4" :value="idCard[n - 1]" type="password">
                </div>
                <div class="click_box">
                  <ul>
                    <li :key="n" @click="addIdCard(n)" v-for="n in 9" class="click">{{n}}</li>
                    <li class="click">完成</li>
                    <li @click="addIdCard(0)" class="click">0</li>
                    <li @click="removeIdCard" class="id_cancer click">
                     <Icon type="android-delete"></Icon>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </transition>
	</div>
</template>
<script>
import sheader from '../components/box.vue'
export default {
    components:{
        sheader
    },
  data() {
    return {
      dorm_content: {},
      dormstudent: {},
      modal1: false,
      err_message: "",
      myDate: [],
      a: false,
      idCard: [],
      formPay: {
        dorNum: [],
        cash: null
      }
    };
  },
  methods: {
    showIdCardInput(val) {
      this.t1 = val;
      this.a = true;
      
    },
    removeIdCard() {
      this.idCard.pop();
    },
    addIdCard(n) {
      this.idCard.push(n);
      if (this.idCard.length === 4) {
        this.$http.post('orders', {
          dorm_id: this.$route.params.id,
          money: this.$route.params.name,
          payment_password: this.idCard.join(''),
        })
        .then(res => {
          this.$router.push({ name: "payment", params: {
            id: this.$route.params.id,
            name: this.$route.params.name,
            orderNum: res.data.order_num,
            date: res.data.created_at,
          }});
        }, err => {
            this.err_message = err.data.message;
            setTimeout(() => {
               this.err_message = ''; 
            },3000);
            this.idCard= []
        });
      }
    }
  },
  mounted() {
    this.$http.get("dormitories/" + this.$route.params.id).then(res => {
      this.dormstudent = res.data.data;
      this.dorm_content = res.data.dorm_name;
    });
  }
};
</script>
<style scoped>
.layout-box {
  height: 100%;
  position: relative;
}
button {
  margin-top: 20px;
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
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
.application-box ul li {
  border-bottom: 1px solid #e4e5e7;
  width: 100%;
  float: left;
  padding-left: 20px;
  height: 40px;
}
.application-box ul li span {
  font-size: 14px;
  line-height: 40px;
  float: right;
  padding-right: 20px;
}
.application-box ul li p {
  font-size: 14px;
  float: left;
  line-height: 40px;
}
.article-title {
  padding: 10px;
}
.search li {
  background-color: #fff;
}
.search li:active {
  background-color: #e1e1e1;
}
#serach_box {
  width: 200px;
  height: 50px;
  font-size: 14px;
}
.layout-bill {
  position: absolute;
  top: 45px;
  padding: 0 10px;
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
.click_box {
  overflow: hidden;
  margin-top: 42px;
  background-color: #f9f9f9;
}
.click_box ul li {
  color: #474747;
  font-size: 16px;
  float: left;
  width: 33.333%;
  text-align: center;
  line-height: 40px;
  border-right: 1px #eee solid;
  border-bottom: 1px #eee solid;
}
.click_box .id_X {
  background-color: #f1f1f1;
}
.click_box .id_cancer {
  background-color: #dddddd;
}
.click_box ul li:active {
  background-color: #e1e1e1;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}
.button_box {
  padding: 20px 20px;
  width: 100%;
  line-height: 40px;
}
.button_box input {
  text-align: center;
  float: left;
  height: 40px;
  width: 24%;
  border: 1px solid #aaa;
  border-left: 0;
}
.button_box input:first-child{
  border-left: 1px solid #aaa;
}

.content_box {
  position: absolute;
  bottom: 0;
}
.mask_one {
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: #333;
  opacity: 0.7;
}
.password {
  background-color: #f9f9ff;
  width: 100%;
  position: absolute;
  bottom: 0px;
  border-bottom: 1px solid #fff;
}
.password .cancer {
  text-align: center;
  position: relative;
}
.password .cancer p {
  color: #333 !important;
  font-family: "Microsoft Yahei";
  letter-spacing: 2px;
  font-size: 20px;
  line-height: 40px;
}
.password .cancer button {
  border: none;
  border: 0px;
  position: absolute;
  top: -15px;
  left: 10px;
  width: 30px;
  height: 30px;
  background: #f9f9f9;
  font-size: 20px;
}
</style>