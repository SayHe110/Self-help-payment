<template>
<div class="layout-box">
    <sheader headerTitle="快速交电"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <Form :model="formPay" label-position="left" :label-width="60">
                <FormItem label="所在宿舍">
                   <Cascader v-model="formPay.dorNum" :data="dorms" filterable trigger="hover"></Cascader>
                </FormItem>
                <FormItem label="缴费金额">
                    <Input class="cash" v-model="formPay.cash"></Input>
                </FormItem>
                 <router-link :to="{name: 'mybill', params: {id: this.formPay.dorNum[2], name:this.formPay.cash}}">
                    <Button @click="submitOrder" type="success" long>下一步</Button>
                </router-link> 
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
      submit: false,
      loading: true,
      formPay: {
        dorNum: [],
        cash: null
      },
      dorms: []
    };
  },
  methods: {
    asyncOK() {
      this.submit = false;
      this.$router.push({name: '  mybill'});
      setTimeout(
        function() {
          this.$router.push({ name: "mybill", params: {id: this.formPay.dorNum, name:this.formPay.cash}});
        }.bind(this),
        1000
      );
    },
    submitOrder () {
      this.$http.post('orders', {
          dorm_id: this.formPay.dorNum[2],
          money: Number(this.formPay.cash)
      }).then(res => {
        console.log(res)
      })
    },
    // handleChange (value, selectedData) {
    //   this.formPay.dormNum = value[2]
    // },
    goLink() {
      this.submit = true;
    }
  },
  mounted() {
    this.$http.get("dormitories").then(res => {
      this.dorms = res.data.dormitories.map(item => {
        let dom = {
          label: item.dorm_name,
          value: item.id,
        };
        if (item.all_children_dorms.length != 0) {
          dom.children = item.all_children_dorms.map(item => {
            let dom =  {
              label: item.dorm_name + '栋',
              value: item.id,
            };
            if (item.all_children_dorms.length != 0) {
              dom.children = item.all_children_dorms.map(item => {
                return {
                  label: item.dorm_name,
                  value: item.id,
                }
              });
            }
            return dom;
          });
        }
        return dom;
      })
    });
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
  width: 100%;
  padding-bottom: 65px;
  background: #fff;
}
.dorNum {
  font-size: 16px;
  color: #874;
}
.cash {
  font-size: 16px;
  color: #454;
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
.ivu-cascader-menu{
    max-width: 90px;
}
</style>
