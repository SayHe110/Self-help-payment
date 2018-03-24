<template>
<div class="layout-box">
    <sheader headerTitle="支付密码"></sheader>
    <div class="layout-application">
        <div class="application-box" style="padding-top:30px;">
            <Form class="login" ref="formInline" :model="formInline" label-position="right" :rules="ruleInline" post="" :label-width="70">
                <FormItem label="账户密码" prop="password">
                    <Input type="text" v-model="formInline.password" placeholder="请输入账户密码" size="large">
                    </Input>
                </FormItem>
                <FormItem label="设置密码" prop="password_new">
                    <Input type="password" v-model="formInline.password_new" placeholder="请输入新密码" size="large">
                    </Input>
                </FormItem>
                 <FormItem label="确认密码" prop="password_confirm">
                    <Input type="password" v-model="formInline.password_confirm" placeholder="请确认新密码" size="large">
                    </Input>
                </FormItem>
            </Form>
            <Button type="success" long @click="handleSubmit('formInline')">完成</Button>
        </div>
    </div>
</div>
</template>
<script>
import sheader from '../components/box.vue'
export default {
    components:{
        sheader
    },
  data() {
    return {
      formInline: {
         password: "",
         password_new: "",
         password_confirm: ""
      },
      ruleInline: {
        password: [{ required: true, message: "请输入密码", trigger: "blur" }],
        password_new: [
          { required: true, message: "请输入新密码", trigger: "blur" },
          {
            type: "string",
            min: 6,
            message: "密码长度不能小于6位",
            trigger: "blur"
          }
        ],
        password_confirm: [
          { required: true, message: "请再次输入新密码", trigger: "blur" }
        ]
      }
    };
  },
  methods: {
    handleSubmit(name) {
        if(this.formInline.password_new !== this.formInline.password_confirm) {
          this.$Message.error("两次输入的密码不相同!");
        return false
      }
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
.header-title{
    display: flex;
    flex-direction: column;
}
.layout-box .header-title p {
  color: #fff;
  line-height: 45px;
  z-index: 999;
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