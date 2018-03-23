<template>
<div class="layout-box">
    <sheader headerTitle="宿舍号绑定"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <Form :model="repairItem" ref="repairItem" label-position="right" :rules="ruleValidate"  >
                <FormItem label="宿舍号:" prop="dorNum">
                    <Input v-model="repairItem.dorNum" icon="ios-close-outline" />
                </FormItem>
                <Button type="success" long  @click="handleSubmit('repairItem')">提交</Button>
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
      repairItem: {
        dorNum: ""
      },
      ruleValidate: {
        dorNum: [
          {
            required: true,
            message: "请输入宿舍号",
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
                tel: this.repairItem.tel,
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
