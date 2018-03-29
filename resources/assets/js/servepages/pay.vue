<template>
<div class="layout-box">
    <sheader headerTitle="快速购电"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <Form :model="formPay" label-position="left" :label-width="60">
                <FormItem label="所在宿舍">
                   <Cascader v-model="formPay.dorNum" :data="dorms" filterable trigger="hover"></Cascader>
                </FormItem>
                <FormItem label="缴费金额">
                  <InputNumber class="cash" :max="999" :min="0" v-model="formPay.cash"  placeholder="请输入金额..."/> 
                </FormItem>
                <Button @click="submitOrder('formPay')" type="success" long>下一步</Button>
            </Form> 
        </div>  
    </div>
</div>
</template>
<script>
import sheader from "../components/box.vue";
export default {
  components: {
    sheader
  },
  data() {
    return {
      btn: null,
      btnn: null,
      btnnn: null,
      submit: false,
      loading: true,
      formPay: {
        dorNum: [],
        cash: null
      },
      dorms: [],
    };
  },
  methods: {
    
    asyncOK() {
      this.submit = false;
      this.$router.push({ name: "  mybill" });
      setTimeout(
        function() {
          this.$router.push({
            name: "mybill",
            params: { id: this.formPay.dorNum, name: this.formPay.cash }
          });
        }.bind(this),
        1000
      );
    },
    submitOrder() {
        if (this.formPay.cash === null || this.formPay.dorNum.length ===  0) {
            this.$Message.error('数据不能为空');
        } else {
            this.$router.push({name: 'mybill', params: {
            id: this.formPay.dorNum[2],
            name:this.formPay.cash}
          });
        }
     } 
    },
    goLink() {
      this.submit = true;
  },
    mounted() {
      this.$http.get("dormitories").then(res => {
        this.dorms = res.data.dormitories.map(item => {
          let dom = {
            label: item.dorm_name,
            value: item.id
          };
          if (item.all_children_dorms.length != 0) {
            dom.children = item.all_children_dorms.map(item => {
              let dom = {
                label: item.dorm_name + "栋",
                value: item.id
              };
              if (item.all_children_dorms.length != 0) {
                dom.children = item.all_children_dorms.map(item => {
                  return {
                    label: item.dorm_name,
                    value: item.id
                  };
                });
              }
              return dom;
            });
          }
          return dom;
        });
      });
    }
  };
</script>
<style scoped>
.header-title {
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
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
.dorNum {
  font-size: 16px;
  color: #874;
}

.chose {
  font-size: 18px;
  color: #444;
}
.application-box {
  padding-top: 30px;
}
.application-box {
  padding-top: 30px;
}
.ivu-cascader-menu {
  max-width: 90px;
}
.cash {
  width: 100% !important;
}
</style>
