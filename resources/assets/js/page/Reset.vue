<template>
<div class="layout-box">
    <div class="header-title">
        <p>重置密码</p>
    </div>
    <div class="layout-application">
        <div class="application-box" style="padding-top:30px;">
            <Form class="login" ref="formInline" :model="formInline" :rules="ruleInline" post="">
                <FormItem prop="code">
                    <Input type="text" v-model="formInline.code" placeholder="请输入验证码" size="large">
                    </Input>
                </FormItem>
                <FormItem prop="password">
                    <Input type="password" v-model="formInline.password" placeholder="请设置6-16位密码" size="large">
                    </Input>
                </FormItem>
                 <FormItem prop="password_confirm">
                    <Input type="password" v-model="formInline.password" placeholder="请确认您的密码" size="large">
                    </Input>
                </FormItem>
                <FormItem>
                    <Button type="success" long @click="handleSubmit('formInline')">完成</Button>
                </FormItem>
            </Form>
        </div>
    </div>
</div>
</template>
<script>
export default {
  data() {
    return {
      formInline: {
         code: "",
         password: "",
         password_confirm: ""
      },
      ruleInline: {
        code: [{ required: true, message: "请输入验证码", trigger: "blur" }],
        password: [
          { required: true, message: "请输入新密码", trigger: "blur" },
          {
            type: "string",
            min: 6,
            message: "密码长度不能小于6位",
            trigger: "blur"
          }
        ],
        password_confirm: [
          { required: true, message: "请再次输入密码", trigger: "blur" }
        ]
      }
    };
  },
  methods: {
    handleSubmit(name) {
      this.$refs[name].validate(valid => {
        if (valid) {
          this.$http
            .post("authorizations", {
              student_id: this.formInline.user,
              password: this.formInline.password,
              captcha_key: this.captchaKey,
              captcha_code: this.formInline.verification
            })
            .then(
              res => {
                this.$router.push("./login");
              },
              err => {
                this.$Message.error(err.body.message || "重置失败");
              }
            );
        } else {
          this.$Message.error("输入的数据格式有误，请检查!");
        }
      });
    },
    handleSearch_email(value) {
      this.emailarry =
        !value || value.indexOf("@") >= 0
          ? []
          : [value + "@qq.com", value + "@sina.com", value + "@163.com"];
    }
  }
};
</script>
<style>
.layout-box .header-title p {
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
  text-align: left;
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
.application-box {
  padding-top: 10px;
}
</style>

