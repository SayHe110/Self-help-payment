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
<<<<<<< HEAD
                    <Input class="dorNum" v-model="formPay.input2" @click.native="choseDor">{{dorNums.name}}</Input>
=======
                    <Input class="dorNum" v-model="formPay.dorNum" ></Input>
>>>>>>> 75766f2896744f62d5ea91eb98b29bf4705f422a
                </FormItem>
                <FormItem label="缴费金额">
                    <Input class="cash" v-model="formPay.cash"></Input>
                </FormItem>
<<<<<<< HEAD
                     <Button type="primary" @click="goLink">提交</Button>
                      <Modal
                          v-model="submit"
                          title="请您核对"
                          @on-ok="asyncOK">
                          <p class="chose" v-for="(value,key) in data ">您选择了{{key}}单元,{{value}}号宿舍</p>
                          <p class="dorNum">您的宿舍号是：  {{formPay.input2}}</p>
                          <p  class="cash">您的缴费金额是:   {{formPay.input3}}</p>
                      </Modal>
                  
=======
                <Button type="success" long @click="goLink">下一步</Button>
                <Modal
                    v-model="submit"
                    title="请您核对"
                    @on-ok="asyncOK">
                    <p class="chose">您选择了{{data.label}}</p>
                    <p class="dorNum">您的宿舍号是：  {{formPay.dorNum}}</p>
                    <p  class="cash">您的缴费金额是:   {{formPay.cash}}</p>
                </Modal>
>>>>>>> 75766f2896744f62d5ea91eb98b29bf4705f422a
            </Form>
        </div>  
    </div>
</div>
</template>
<script>
    export default {
        data () {
            return {
                submit: false,
                loading: true,
                choseDornums:{},
                dorNums: [],
                formPay: {
                    dorNum: '',
                    cash: ''
                },
                data: [{
                    value: '1',
                    label: '一单元',
                    dorNums:[
                          { name: '9a432', dorNums:'6'},
                          { name: '9a433', dorNums:'6'}, 
                          { name: '9a434', dorNums:'6'}  
                            ],
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
                        },
                        {
                            value: 'B',
                            label: 'B栋',
                            
                        }
                    ]
                }, {
                    value: '2',
                    label: '二单元',
                    dorNums:[
                          { name: '9a432', dorNums:'6'},
                          { name: '9a433', dorNums:'6'}, 
                          { name: '9a434', dorNums:'6'}
                            ],
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
                        },
                        {
                            value: 'B',
                            label: 'B栋',
                            
                        }
                    ],

                }, {
                    value: '3',
                    label: '三单元',
                    dorNums:[
                          { name: '9a432', dorNums:'6'},
                          { name: '9a433', dorNums:'6'}, 
                          { name: '9a434', dorNums:'6'} 
                            ],
                    children: [
                        {
                            value: 'A',
                            label: 'A栋',
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
            },
             choseDor() {
              for(let item in this.data){
                 this.choseDornums = this.data[item].dorNums;
              }
             }
        }
    }
</script>
<style scoped>
.layout-box .header-title p{
    color: #fff;
    position: absolute;
    line-height: 45px;
    z-index: 999;
    left: 40%;
    font-size: 18px;
}
.article-title{
  padding: 10px;
}
.layout-application{
    position: absolute;
    top: 45px;
    padding: 0 10px;
    width: 100%;
    padding-bottom: 65px;
    background: #fff;
}
.dorNum{
  font-size: 16px;
  color: #874;
}
.cash{
  font-size: 16px;
  color: #454;
}
.chose{
  font-size: 18px;
  color: #444;
<<<<<<< HEAD
}
=======
  }
>>>>>>> 75766f2896744f62d5ea91eb98b29bf4705f422a
.application-box{
    padding-top: 30px;
}

</style>
