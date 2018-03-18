<template>
    <div class="layout">
        <div class="login-bg">
            <div class="login_top">
                <img src="../assets/images/logo2.png">
                <p>掌上购电</p>
            </div>
            <Form class="login" ref="formInline" :model="formInline" :rules="ruleInline" post="">
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
                    <a href="javascript:;" @click="updatedCaptchas(captchasSrc)"> <img class="token-img" id="token" alt="验证码" style="height:32px;width:80px;" :src="captchasSrc"></a>
                    <a href="javascript:;" @click="updatedCaptchas(captchasSrc)" style="color:#1bbc9b">换一张</a>
                </FormItem>
                <FormItem>
                    <Button type="success" long @click="handleSubmit('formInline')">登录</Button>
                </FormItem>
                <FormItem>
                    <router-link :to="{name: 'register'}">
                    <a href="javascript:;" style="color:#1bbc9b">马上注册</a>
                    </router-link>
                    <a href="javascript:;" style="color:#444">| 忘记密码</a>
                </FormItem>
            </Form>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      captchasSrc: "",
      captchaKey: "",
      formInline: {
        user: "",
        password: "",
        verification: "",
      },
      ruleInline: {
        user: [{ required: true, message: "请输入学号", trigger: "blur" }],
        password: [
          { required: true, message: "请输入密码", trigger: "blur" },
          {
            type: "string",
            min: 6,
            message: "密码长度不能小于6位",
            trigger: "blur"
          }
        ],
        verification: [
          { required: true, message: "请输入验证码", trigger: "blur" }
        ]
      }
    };
  },
  created() {
    // 请求验证码接口
    this.updatedCaptchas(); 
  },
  methods: {
    handleSubmit(name) {
      this.$refs[name].validate(valid => {
        if (valid) {
          this.$http.post('authorizations', {
              student_id: this.formInline.user,
              password: this.formInline.password,
              captcha_key: this.captchaKey,
              captcha_code: this.formInline.verification,
          }).then(res => {
              this.$router.push("./home");
          }, err => {
              this.$Message.error(err.body.message || '登录失败');
          });
        } else {
          this.$Message.error("输入的数据格式有误，请检查!");
        }
      });
    },
    // 切换验证码
    updatedCaptchas(captchasSrc) {
      this.$http.get("captchas").then(res => {
        this.captchaKey = res.body.captcha_key;
        this.captchasSrc = res.body.captcha_image_content;
      });
    }
  }
};
</script>
<style>
.layout {
  width: 100%;
  height: 100%;
  background: #fff;
}
.login-bg {
  padding: 0 15px;
}
.login_top {
  width: 100%;
  left: 0;
  padding: 20px;
}
.login_top p {
  font-size: 26px;
}
.ivu-form-item{
    margin-bottom: 20px;
}
</style>

