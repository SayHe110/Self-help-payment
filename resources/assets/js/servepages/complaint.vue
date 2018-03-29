<template>
<div class="layout-box">
    <sheader headerTitle="投诉举报"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <div class="complaint_title">
                <h2>欢迎举报违规行为</h2>
                <p>当你看到违规行为时，首先应进行劝阻，或者找到场工作人员让其进行劝阻。如劝阻无效，可进行投诉举报。</p>
            </div>
            <Form :model="repairItem" ref="repairItem" label-position="top" :rules="ruleValidate"  >
                <FormItem label="投诉标题:" prop="title">
                    <Input v-model="repairItem.title" />
                </FormItem>
                <FormItem label="投诉单位:" prop="Company">
                    <Input v-model="repairItem.Company" />
                </FormItem>
                <FormItem label="详细描述:" prop="textarea">
                    <Input v-model="repairItem.textarea" type="textarea" :autosize="{minRows: 2,maxRows: 5}" placeholder=""/>
                </FormItem>
                <FormItem label="是否匿名:" prop="radio">
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
import sheader from '../components/box.vue'
export default {
    components:{
        sheader
    },
  data() {
    return {
      repairItem: {
        title: "",
        radio: "1",
        Company: "",
        textarea: ""
      },
      ruleValidate: {
        title: [
          {
            required: true,
            message: "请输入标题",
            trigger: "blur"
          }
        ],
        textarea: [
          {
            required: true,
            message: "请输入详细描述",
            trigger: "blur"
          }
        ],
        Company: [
          {
            required: true,
            message: "请输入投诉单位",           
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
                title: this.repairItem.title,
                reports: this.repairItem.Company,
                description: this.repairItem.textarea,                
                anonymous: this.repairItem.radio
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
.complaint_title{
    padding-bottom: 20px;
}
.complaint_title h2{
    text-align: center;
}
</style>
