<template>
	<div class="layout-box">
        <div class="header-title">
            <p>提交订单</p>
        </div>
            <div class="Bill_content">
                <ul>
                    <li><p>用户编号 :</p><span>102500124</span></li>
                    <li><p>单元号 :</p><span>1</span></li>
                    <li><p>A楼/B楼:</p><span>A楼</span></li>
                    <li><p>缴费宿舍 :</p><span>9A110</span></li>
                    <li><p>缴费金额 :</p><span>110</span></li>
                </ul>
                 <Button  type="primary" @click="submit">提交订单</Button>
                   
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
        },
        submit(){
        this.$router.push({ name: "alreadybill" });
        }
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
    font-size: 14px;
    line-height: 40px;
    float: right;
}
.Bill_content ul li p{
    font-size: 14px;
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