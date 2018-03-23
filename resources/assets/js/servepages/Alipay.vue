<template>
<div class="layout-box">
    <sheader headerTitle="绑定支付宝"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <Form :model="formInline" ref="formInline" label-position="right" :rules="ruleValidate" :label-width="90" >
                <FormItem label="支付宝账号:" prop="Alipay_id">
                    <Input v-model="formInline.Alipay_id" placeholder="请输入支付宝账号" />
                </FormItem>
                <FormItem label="支付宝密码:" prop="Alipay_password">
                    <Input type="password" v-model="formInline.Alipay_password" placeholder="请支付宝登录密码" size="large">
                    </Input>
                </FormItem>
                <Button type="success" long  @click="handleSubmit('repairItem')">绑定支付宝账户</Button>
            </Form>
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
        Alipay_id: "",
        Alipay_password: ""
      },
      ruleValidate: {
        Alipay_id: [
          {
            required: true,
            message: "请输入支付宝账号",
            trigger: "blur"
          }
        ],
        Alipay_password: [
          {
            required: true,
            message: "请输入支付宝密码",
            trigger: "blur"
          }
        ]
      }
    };
  },
  methods: {
    //提交
    handleSubmit(name) {
      this.$refs[name].validate(valid => {
        if (valid) {
            this.$http
            .post("reports",{
                Alipay_id: this.formInline.Alipay_id,
                Alipay_password: this.formInline.Alipay_password
            })
            .then(
                res => {                    
                    this.$Message.success("提交成功!");
                    this.$router.push("./service");
                },
                err => {
                    this.$Message.error(err.body.message || "提交失败");                    
                }
            );
        } else {
          this.$Message.error("输入的数据格式有误，请检查!");
        }
      });
    }
  }
};
</script>
<style scoped>
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
