<template>
   <div class="layout-box">
        <div class="layout-header">
           <p>个人中心</p>
        </div>
       <div class="personal-contain">
            <ul>
                <li class="personal-box" >
                    <div class="personal_login" v-if="!jwtToken">
                        <router-link :to="{name: 'login'}">
                            <div class="personal-icon"><img src="../assets/icon/moicon.png" alt=""></div>
                            <div class="personal-title">
                                <p>登录/注册</p>
                                <span >添加宿舍迅速购电</span>
                            </div>                        
                            <span class="more" style="line-height:72px;" ><img src="../assets/icon/more.png" alt=""></span>                   
                        </router-link>
                    </div>
                    <span class="personal-exit" v-if="jwtToken">
                        <a @click="quit" style="display: inline;">退出</a>
                    </span>
                    <router-link :to="{name: 'information'}" v-if="jwtToken">
                        <div class="personal-icon"><img :src="avatar" alt=""></div>
                        <div class="personal-title">
                            <p>{{nickname}}</p>
                            <span >{{student_id}}</span>
                        </div>                          
                    </router-link>                      
                </li>
                <li>
                     <router-link :to="{name: 'alreadybill'}">
                        <p class="personal-type">我的订单</p>
                        <span class="more"><img src="../assets/icon/more.png" alt=""></span>
                     </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'dornum'}">
                        <p class="personal-type">宿舍号</p>
                        <span class="more"><img src="../assets/icon/more.png" alt=""></span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'security'}">
                        <p class="personal-type">账户与安全</p>
                        <span class="more"><img src="../assets/icon/more.png" alt=""></span>
                    </router-link>
                </li>
                <li>
                    <a href="javascript:;">
                        <p class="personal-type">帮助与反馈</p>
                        <span class="more"><img src="../assets/icon/more.png" alt=""></span>
                    </a>
                </li>
                <li>
                    <router-link :to="{name: 'aboutus'}">
                        <p class="personal-type">关于我们</p>
                        <span class="more"><img src="../assets/icon/more.png" alt=""></span>
                    </router-link>
                </li>
            </ul>
       </div>
   </div>
</template>
<script>
export default {
  data() {
    return {
      name: "personal",
      student_id: "",
      nickname: "",
      avatar: "",
      jwtToken: !!localStorage.jwt_token,
    };
  },
  mounted() {
      //用户
      this.$http.get("user").then(res => {
          this.student_id = res.body.student_id;
          this.nickname = res.body.nickname;
          this.avatar = res.body.avatar;
      });
  },
  methods: {
    quit() {
      this.$http
        .delete("authorizations/current")
        .then(res => {
            this.jwtToken = false; 
            localStorage.removeItem('jwt_token');
        });
    }
  }
};
</script>
<style>
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
.personal-contain ul li a {
  display: block;
  padding: 0 10px;
  width: 100%;
  height: 100%;
}
.personal-contain ul li .personal-icon {
  width: 54px;
  height: 54px;
  float: left;
  overflow: hidden;
  margin-top: 8px;
  border-radius: 50%;
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
.more {
  position: absolute;
  right: 10px;
  color: #999;
  line-height: 72px;
}
.personal-contain ul li .personal-exit{
    top: 0px;
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
.personal-contain ul li .more {
  line-height: 48px;
}
.personal-contain ul li .more img {
  width: 12px;
  height: 12px;
}
</style>