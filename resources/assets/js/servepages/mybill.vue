<template>
	<div class="layout-box">
        <div class="header-title">
            <p>我的订单</p>
        </div>
            <div class="Bill_content">
                <ul>
                    <li><p>缴费单位 :</p><span>淮南市知明科技</span></li>
                    <li><p>户名 :</p><span>某某某</span></li>
                    <li><p>用户编号 :</p><span>102500124</span></li>
                    <li><p>缴费宿舍 :</p><span>9A110</span></li>
                    <li><p>缴费金额 :</p><span>110</span></li>
                </ul>
                 <Button type="primary" @click="modal1 = true">提交订单</Button>
                    <Modal
                        v-model="modal1"
                        title="提交订单"
                        @on-ok="ok"
                        @on-cancel="cancel">
                        <p>确定支付吗?</p>
                    </Modal>
            </div>
       
	</div>
</template>
<script>
export default{
    data(){
        return{
            modal1: false
        }
    },
    methods: {
        confirm () {
            this.$http.post(`/api/select_dorm/${this.$route.params.id}`).then(res => {
                this.$router.push({name: 'pay'})
            }).catch(err => {
                this.$router.push({name: 'pay'})
            })
        }
    },
        ok () {
                    this.$Message.info('Clicked ok');
                },
                cancel () {
                    this.$Message.info('Clicked cancel');
            }
}
</script>
<style scoped>
button{
    margin: 10px 10px;
}
.header-title{
    color: #fff;
    position: fixed;
    line-height: 45px;
    z-index: 999;
    left: 40%;
    font-size: 18px;
}
.Bill_content{
    margin: 55px 20px 20px 10px;
}
.Bill_content ul li{
    border-bottom: 1px solid #ccc;
    width: 100%;
    float: left;
    height: 40px;
}
.Bill_content ul li span{
    font-size: 16px;
    line-height: 40px;
    float: right;
}
.Bill_content ul li p{
    font-size: 16px;
    float: left;
    line-height: 40px;
}
.article-title {
  padding: 10px;
}
.layout-bill{
    position: absolute;
    top: 45px;
    padding: 0 10px;
    width: 100%;
    padding-bottom: 65px;
    background: #fff;
}
</style>