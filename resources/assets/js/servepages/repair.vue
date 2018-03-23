<template>
<div class="layout-box">
    <div class="header-title">
        <p>故障报修</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            <Form :model="repairItem" ref="repairItem" label-position="top" :rules="ruleValidate"  >
                <FormItem label="主题:" prop="title">
                    <Input v-model="repairItem.title" />
                </FormItem>
                <FormItem label="故障描述:" prop="textarea">
                    <Input v-model="repairItem.textarea" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder=""></Input>
                </FormItem>
                <FormItem label="宿舍号:" prop="dorNum">
                    <Input v-model="repairItem.dorNum" />
                </FormItem>
                <FormItem label="联系电话:" prop="Tel">
                    <Input v-model="repairItem.Tel" />
                </FormItem>
                <FormItem label="需维修人员到现场处理:" prop="radio">
                    <RadioGroup v-model="repairItem.radio">
                        <Radio label="1">是</Radio>
                        <Radio label="0">否</Radio>
                    </RadioGroup>
                </FormItem>
                <Button type="success" long  @click="handleSubmit('repairItem')">提交</Button>
            </Form>
        </div>  
    </div>
</div>
</template>
<script>
export default {
  data() {
    return {
      repairItem: {
        title: "",
        radio: "1",
        dorNum: "",
        Tel: "",
        textarea: ""
      },
      ruleValidate: {
        title: [
          {
            required: true,
            message: "请输入主题",
            trigger: "blur"
          }
        ],
        textarea: [
          {
            required: true,
            message: "请输入故障描述",
            trigger: "blur"
          }
        ],
        dorNum: [
          {
            required: true,
            message: "请输入宿舍号",
            trigger: "blur"
          }
        ],
        Tel: [
          {
            required: true,
            message: "请输入电话",
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
            .post("faults", {
              title: this.repairItem.title,
              description: this.repairItem.textarea,
              dormitory: this.repairItem.dorNum,
              phone: this.repairItem.Tel,
              arrival_processing: this.repairItem.radio
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
  padding-top: 30px;
}
</style>
