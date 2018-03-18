<template>
  <div>
        <div class="header-title">
            <p>手机号</p>
        </div>
        <div class="tell_content">
            <ul>
                <li>
                    <p>手机号:</p>
                    <span>13922933322</span>
                </li>
            </ul>
            <button type="primary">更换手机号</button>
            <p>一个手机号只能作为一个账号的登录名，一个手机号最多可以被6哥账号绑定</p>
        </div>
  </div>
</template>

<script>
export default {

}
</script>

<style scoped>
.layout-box{
    position: relative;
}
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
</style>
