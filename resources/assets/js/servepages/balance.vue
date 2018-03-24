<template>
<div class="layout-box">
    <sheader headerTitle="电费余额"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <div class="personal">
                <img src="../assets/icon/touxiang.png" alt="">
                <div class="title">                        
                    <p>用户名：{{sutdent_name}}</p>
                    <p>宿舍号：{{dormitory_name}}</p>
                </div>
            </div>
            <div class="box">
               <h2>{{balance}}元</h2>
               <p>电费余额</p>
               <span>截止到{{updated_time}}</span>
            </div>
            <Button  type="success" long @click="showIdCardInput(value)">立即购电</Button>
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
    data() {
        return{
            sutdent_name: "",
            dormitory_name: "",
            balance: "67",
            updated_time: "",
        }
    },
    mounted() {
        //余额
        this.$http.get("electricity_balance").then(res => {
            this.sutdent_name = res.body.user.nickname;
            this.dormitory_name = res.body.dormitory_name;
            // this.balance = this.res.balance_of_electricity;
            this.updated_time = res.body.user.updated_at;
        });
    },
    methods: {
        showIdCardInput(){            
          this.$router.push({ name: "pay" });
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
  padding-top: 90px;
}
.personal {
  height: 72px;
  background: #fff;
  position: absolute;
  width: 100%;
  left: 0;
  top: 0;
}
.personal img {
  float: left;
  padding: 0 10px;
  float: left;
  overflow: hidden;
  border-radius: 50%;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}
.personal .title {
  font-size: 14px;
  float: left;
  text-align: left;
  padding-left: 10px;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 15%;
}
.box {
  width: 100%;
  padding: 15px 5px;
  background: #fff;
  position: absolute;
  left: 0;
  text-align: center;
}
.box h2 {
  color: #ed3f14;
  font-size: 26px;
  padding-bottom: 10px;
}
.box p {
  font-size: 16px;
  padding-bottom: 10px;
  color: #444;
}
.box span {
  color: #999;
  font-size: 14px;
}
Button{
    position: relative;
    left: 0;
    top: 160px;
}
</style>
