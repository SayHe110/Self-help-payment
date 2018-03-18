<template>
	<div class="layout-box">
        <div class="header-title">
            <p>我的账单</p>
        </div>
            <div class="Order_content">
                
            </div>
	</div>
</template>
<script>
export default{
    data(){
        return{

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
    }
}
</script>
<style scoped>
button{
    margin: 10px 10px;
}
.header-title{
    color: #fff;
    position: absolute;
    line-height: 45px;
    z-index: 999;
    left: 40%;
    font-size: 18px;
}
.Bill_content{
    margin: 55px 20px 20px 10px;
}
.Bill_content ul li{
    border-bottom: 1px dotted #ccc;
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