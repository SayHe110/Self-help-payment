<template>
<div class="layout-box">
    <div class="header-title">
        <p>更换手机号</p>
    </div>
    <div class="tell_content">
        <ul>
            <li>
                <p>手机号:</p>
                <Input class="input_box" v-model="tellphone"  placeholder="请输入手机号..." clearable style="width: 200px"></Input>
            </li>
        </ul>
            <Button type="success" @click="modal6 = true">确认更换</Button>
            <Modal
                v-model="modal6"
                title="Title"
                :loading="loading"
                @on-ok="asyncOK">
                <p v-model="tellphone">您确认将手机号换成{{tellphone}}</p>
            </Modal>
            <p class="notice">一个手机号只能作为一个账号的登录名，一个手机号最多可以账号绑定</p>
    </div>
  </div>
</template>

<script>
export default {
        data () {
            return {
                tellphone:'',
                modal6: false,
                loading: true
            }
        },
        methods: {
            asyncOK () {
                setTimeout(() => {
                    this.modal6 = false;
                }, 2000);
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
.notice{
    padding: 8px;
}
.header-title{
    color: #fff;
    position: absolute;
    line-height: 45px;
    z-index: 999;
    left: 40%;
    font-size: 18px;
}
.tell_content{
    position: absolute;
    top: 50px;
}
.tell_content ul li{
    width: 100%;
    height: 50px;;
    position: relative;
    background-color: #fff;
    padding: 5px;
    border-radius: 0.5;
}
.tell_content ul li p{
    color: #333;
    position: absolute;
    top: 8px;
    left: 30px;
    line-height: 35px;
    font-size: 16px;
    font-family: "Micosoft Yahei";
}
.tell_content ul li .input_box{
    position: absolute;
    right: 25px;
    top: 10px;
}
button{
    width: 280px;
}
</style>
