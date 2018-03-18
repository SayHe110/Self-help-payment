<template>
	<div class="layout-box">
        <div class="header-title">
            <p>我的订单</p>
        </div>
            <div class="Order_content">
                <Table stripe :columns="table_lists" :data="listContent"></Table>
                <router-link :to="{name: 'service'}">
		          <Button  type="primary">返回</Button>
		        </router-link>
            </div>
	</div>
</template>
<script>
export default{
    data(){
        return{
            table_lists: [
                    {
                        title: '订单编号',
                        key: 'name'
                    },
                    {
                        title: '价格',
                        key: 'age'
                    },
                    {
                        title: '时间',
                        key: 'date'
                    }
                ],
                listContent: [
                    {
                        name: '001',
                        age: 2232,
                        date: '2016-10-03'
                    },
                    {
                        name: '002',
                        age: 24,
                        date: '2016-10-01'
                    },
                    {
                        name: '003',
                        age: 30,
                        date: '2016-10-02'
                    },
                    {
                        name: '004',
                        age: 26,
                        date: '2016-10-04'
                    }
                ]
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
.layout-box{
    position: relative;
}
button{
    margin: 10px 10px;
}
.Order_content{
    width: 100%;
    position: absolute;
    top: 45px;
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