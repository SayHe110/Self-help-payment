<template>
<div class="layout-box">
    <div class="header-title">
        <p>快速购电</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            <Form :model="formPay" label-position="right" :label-width="80">
                <FormItem label="所在单元">
                     <Cascader v-model="dorNums" :data="data" filterable trigger="hover"></Cascader>
                </FormItem>
                <FormItem label="宿舍号">
                    <Input class="dorNum" v-model="formPay.dorNum" @click.native="choseDor">{{dorNums.name}}</Input>
                </FormItem>
                <FormItem label="缴费金额">
                    <Input class="cash" v-model="formPay.cash"></Input>
                </FormItem>
                <router-link :to="{name: 'mybill'}">
                    <Button type="success" long>下一步</Button>
                </router-link>
            </Form>
        </div>  
    </div>
</div>
</template>
<script>
  export default {
        data () {
            return {
                topicsData:{},
                submit: false,
                loading: true,
                dorNums: [],
                formPay: {
                    dorNum: '',
                    cash: ''
                },
                data: [{
                    value: '1',
                    label: '一单元',
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
                            dorNums:[
                              101,102,103,104,105,106
                            ]
                        },
                        {
                            value: 'B',
                            label: 'B栋',
                            
                        }
                    ]
                }, {
                    value: '2',
                    label: '二单元',
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
                            dorNums:[
                              101,102,103,104,105,106
                            ]
                        },
                        {
                            value: 'B',
                            label: 'B栋',
                            
                        }
                    ],
                }, {
                    value: '3',
                    label: '三单元',
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
                            dorNums:[
                              101,102,103,104,105,106
                            ]
                        },
                        {
                            value: 'B',
                            label: 'B栋',
                            
                        }
                    ],
                }, {
                    value: '4',
                    label: '四单元',
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
                            dorNums:[
                              101,102,103,104,105,106
                            ]
                        },
                        {
                            value: 'B',
                            label: 'B栋',
                            
                        }
                    ],
                }, {
                    value: '5',
                    label: '五单元',
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
                            dorNums:[
                              101,102,103,104,105,106
                            ]
                        },
                        {
                            value: 'B',
                            label: 'B栋',
                            
                        }
                    ],
                }]
              }
            },
            methods: {
             asyncOK () {
              this.submit = false;
              // this.$router.push({name: 'mybill'});
              setTimeout(function(){
                this.$router.push({name: 'mybill'});
              }.bind(this), 1000);
            },
             goLink () {
              this.submit = true;
          }
        },
            mounted() {
                this.$http.get("dormitories").then(res => {
                    this.topicsData = res.data.dormitories;
                    this.dornum = res.data.dormitories.dorm_name
              });
    }
  }
</script>
<style scoped>
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
.application-box{
    padding-top: 30px;
}
</style>
