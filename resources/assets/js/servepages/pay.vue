<template>
<div class="layout-box">
    <div class="header-title">
        <p>快速购电</p>
    </div>
    <div class="layout-application">
        <div class="application-box">
            <Form :model="formPay" label-position="right" :label-width="80">
                <FormItem label="所在单元">
                    <Cascader v-model="value3" :data="data" filterable></Cascader>
                </FormItem>
                <FormItem label="宿舍号">
                    <Input v-model="formPay.input2"></Input>
                </FormItem>
                <FormItem label="缴费金额">
                    <Input v-model="formPay.input3"></Input>
                </FormItem>
            </Form>
        </div>  
    </div>
</div>
</template>
<script>
    export default {
        data () {
            return {
                formPay: {
                    input1: '',
                    input2: '',
                    input3: ''
                },
                data: [{
                    value: '1',
                    label: '一单元',
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
                }],
                value3: []
            }
        }
    }
</script>
<style scoped>
.header-title{
    color: #fff;
    position: absolute;
    line-height: 45px;
    z-index: 999;
    left: 40%;
    font-size: 18px;
}
.layout-application{
    position: absolute;
    top: 45px;
    padding: 0 10px;
    width: 100%;
    padding-bottom: 65px;
    background: #fff;
}
.application-box{
    padding-top: 30px;
}
</style>
