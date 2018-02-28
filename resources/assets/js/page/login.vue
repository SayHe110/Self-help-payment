<template>
    <div class="login-bg">
        <div class="login_top">
            <img src="../assets/images/logo.png">
            <p>掌上购电系统</p>
        </div>
        <Form class="login" ref="formInline" :model="formInline" :rules="ruleInline">
            <FormItem prop="user">
                <Input type="text" v-model="formInline.user" placeholder="学号" size="large">
                    <Icon type="ios-person-outline" slot="prepend"></Icon>
                </Input>
            </FormItem>
            <FormItem prop="password">
                <Input type="password" v-model="formInline.password" placeholder="密码" size="large">
                    <Icon type="ios-locked-outline" slot="prepend"></Icon>
                </Input>
            </FormItem>
            <FormItem prop="verification" style="text-align:left">
                <Input type="text" style="width:50%;float: left;margin-right:10px;" inline v-model="formInline.verification" placeholder="验证码" size="large"></Input>
                <img class="token-img" id="token" alt="验证码" style="height:32px;" src="https://cas.baidu.com/?action=image2&appid=285&key=1512646621247">
                <a href="javascript:void(0);">换一张</a>
            </FormItem>
            <FormItem>
                <Button type="success" long @click="handleSubmit('formInline')">登录</Button>
            </FormItem>
        </Form>
    </div>
</template>
<script>
    export default {
        data () {
            return {
                formInline: {
                    user: '',
                    password: ''
                },
                ruleInline: {
                    user: [
                        { required: true, message: '请输入学号', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请输入密码', trigger: 'blur' },
                        { type: 'string', min: 6, message: '密码长度不能小于6位', trigger: 'blur' }
                    ],
                    verification: [
                        {required: true, message: '请输入验证码', trigger: 'blur'}
                    ]                    
                }
            }
        },
        methods: {
            handleSubmit(name) {
                this.$refs[name].validate((valid) => {
                     if (valid) {
                         this.$router.push('./home')
                    } else {
                        this.$Message.error('登录失败!');
                    }
                })
            }
        }
    }
</script>
<style>
    .login-bg{
        padding: 0 15px;
    }
    .login_top{
        width: 100%;
        left: 0;
        padding: 20px;
    }
    .login_top img{
        width: 80px;
        height: 80px;
    }
    .login_top p {
        font-size: 26px;
    }
</style>

