<template>
<div class="layout-box">
    <sheader headerTitle="个人信息"></sheader>
    <div class="layout-application">
        <div class="application-box">
            <div class="personal-contain ">
            <ul>
                <li class="personal-box">
                    <a href="javascript:;">                        
                        <p class="personal-type" style="line-height:72px;">头像</p>
                        <div class="personal-icon">
                            <Upload 
                                :format="['jpg','jpeg','png']" 
                                :max-size="2048"
                                :data="{
                                    type: 'avatar'
                                }"
                                :headers="{
                                    'Authorization': 'Bearer ' + jwtToken
                                }"
                                :on-success="onUploadSuccess"
                                name="image"
                                :show-upload-list="true"
                                action="/api/images">
                                <img :src="avatar" alt="">
                            </Upload>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" @click="handleRender_name">
                        <p class="personal-type">昵称</p>
                        <span class="personal-value">{{nickname}}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <p class="personal-type">学号</p>
                        <span class="personal-value">{{student_id}}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <p class="personal-type">宿舍号</p>
                        <span class="personal-value">{{dormitory}}</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" @click="handleRender_autograph">
                        <p class="personal-type">个性签名</p>
                        <span class="personal-value">{{ autograph }}</span>
                    </a>
                </li>
            </ul>
            </div>
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
      student_id: "",
      nickname: "",
      avatar: "",
      type: "",
      dormitory: "",
      autograph: "",
      file: null
    };
  },
  computed: {
      jwtToken () {
          return localStorage.jwt_token;
      }
  },
   mounted() {
      //用户
      this.$http.get("user?include=dormitory").then(res => {
          this.student_id = res.body.student_id;
          this.nickname = res.body.nickname;
          this.avatar = res.body.avatar;
          this.dormitory = res.body.dormitory.dorm_name;
      });
  },
  methods: {
    onUploadSuccess({path}) {
        this.avatar = path;
    },
    handleRender_name() {
      this.$Modal.confirm({
        render: h => {
          return h("Input", {
            props: {
              value: this.nickname,
              autofocus: true,
              placeholder: "请输入您的昵称...",
            },
            on: {
              input: val => {
                this.nickname = val;
                this.$http.post('users',{
                    nickname: this.nickname
                })
              }
            }
          });
        }
      });
    },
    handleRender_autograph() {
      this.$Modal.confirm({
        render: h => {
          return h("Input", {
            props: {
              value: this.value,
              autofocus: true,
              placeholder: "请输入您的个性签名..."
            },
            on: {
              input: val => {
                this.autograph_value = val;
              }
            }
          });
        }
      });
    },
  }
};
</script>
<style scoped>
.layout{
    background: #f3f3f3;
}
.layout-box {
  position: absolute;
  top: 0px;
  padding: 0px 0px;
  width: 100%;
  height: 100%;
  background: #f3f3f3;
}
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
  top: 25px;
  padding: 0 10px;
  text-align: left;
  width: 100%;
  background: #fff;
}
.application-box {
  padding-top: 20px;
}
.personal-contain {
  position: absolute;
  background: #fff;
  width: 100%;
  left: 0;
}
.personal-contain ul li {
  height: 48px;
  border-bottom: 1px solid #f3f3f3;
}
.personal-contain ul .personal-box {
  height: 72px;
}
.personal-box p {
  line-height: 72px;
}
.personal-contain ul li a {
  display: block;
  padding: 0 10px;
  width: 100%;
  height: 100%;
}
.personal-contain ul li .personal-icon {
  position: absolute;
  right: 10px;
  width: 48px;
  height: 48px;
  float: left;
  overflow: hidden;
  margin-top: 12px;
}
.personal-contain ul li .personal-icon img {
  width: 100%;
  height: 100%;
}
.personal-contain ul li .personal-title {
  float: left;
  padding-left: 10px;
  text-align: left;
  margin-top: 15px;
}
.personal-contain ul li .personal-title p {
  color: #444;
  font-size: 16px;
}
.personal-contain ul li .personal-title span {
  color: #999;
  font-size: 13px;
}
.personal-contain ul li .personal-exit,
.personal-value {
  position: absolute;
  right: 10px;
  color: #999;
  line-height: 72px;
}
.personal-contain ul li .personal-exit a {
  color: #444;
}
.personal-contain ul li .personal-type {
  display: block;
  float: left;
  color: #444;
  line-height: 48px;
  font-size: 14px;
}
.personal-contain ul li .personal-value {
  line-height: 48px;
  font-size: 13px;
}
</style>
