<template>
	<div class="layout-box">
        <div class="header-title">
            <p>提交订单</p>
        </div>
        <div class="layout-application">
            <div class="application-box">
                <ul>
                    <li><p>缴费单位 :</p><span>淮南市知明科技</span></li>
                    <li><p>户名 :</p><span>某某某</span></li>
                    <li><p>用户编号 :</p><span>102500124</span></li>
                    <li><p>缴费宿舍 :</p><span>9A110</span></li>
                    <li><p>缴费金额 :</p><span>110</span></li>
                </ul>
                <Button  type="success" long @click="submit">提交订单</Button>
            </div>                
        </div>
	</div>
</template>
<script>
export default {
  data() {
    return {
      modal1: false
    };
  },
  methods: {
    confirm() {
      this.$http
        .post(`/api/select_dorm/${this.$route.params.id}`)
        .then(res => {
          this.$router.push({ name: "pay" });
        })
        .catch(err => {
          this.$router.push({ name: "pay" });
        });
    },
    submit() {
      this.$router.push({ name: "alreadybill" });
    }
  }
};
</script>
<style scoped>
button {
 margin-top: 20px;
}
.header-title {
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
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
.application-box ul li {
  border-bottom: 1px solid #e4e5e7;
  width: 100%;
  float: left;
  height: 40px;
}
.application-box ul li span {
  font-size: 14px;
  line-height: 40px;
  float: right;
}
.application-box ul li p {
  font-size: 14px;
  float: left;
  line-height: 40px;
}
.article-title {
  padding: 10px;
}
.layout-bill {
  position: absolute;
  top: 45px;
  padding: 0 10px;
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
</style>