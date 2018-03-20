<template>
<div class="layout-box">
    <div class="header-title">
        <p>用户注册</p>
    </div>
    <div class="layout-application">
        <div class="application-box" style="padding-top:30px;">
            <Form class="login" ref="formInline" :model="formInline" :rules="ruleInline" post="">
                <FormItem prop="user">
                    <Input type="text" v-model="formInline.user" placeholder="请输入您的学号" size="large">
                    </Input>
                </FormItem>
                <FormItem prop="email">
                    <AutoComplete
                        v-model="formInline.email"
                        size="large"
                        @on-search="handleSearch_email"
                        placeholder="请输入您的邮箱">
                        <Option aligin="left" v-for="item in emailarry" :value="item" :key="item">{{ item }}</Option>
                    </AutoComplete>
                </FormItem>
                <FormItem prop="password">
                    <Input type="password" v-model="formInline.password" placeholder="请设置6-16位密码" size="large">
                    </Input>
                </FormItem>
                 <FormItem prop="password_confirm">
                    <Input type="password" v-model="formInline.password_confirm" placeholder="请确认您的密码" size="large">
                    </Input>
                </FormItem>
                <FormItem>
                    <Button type="success" long @click="handleSubmit('formInline')">立即注册</Button>
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
      emailarry: "",
      usersSrc: "",
      captchaKey: "",
      formInline: {
        user: "",
        password: "",
        email: "",
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
        email: [
          { required: true, message: "请输入邮箱", trigger: "blur" }
        ],
        password_confirm: [
            {required: true, message: "请确认密码", trigger: "blur" }
        ]
      }
    };
  },
  methods: {
    handleSubmit(name) {
      this.$refs[name].validate(valid => {
        if (valid) {
          this.$http
            .post("users", {
              student_id: this.formInline.user,
              email: this.formInline.email,
              password:this.formInline.password
            })
            .then(
              res => {
                this.$router.push("./");
              },
              err => {
                this.$Message.error(err.body.message || "注册失败");
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

