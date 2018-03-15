<template>
	<div class="layout-box">
    <div class="header-title">
        <p>我的账单</p>
    </div>
    <div class="Bill_content">
        
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
.header-title{
    color: #fff;
    position: fixed;
    line-height: 45px;
    z-index: 999;
    left: 40%;
    font-size: 18px;
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