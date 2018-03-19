<template>
  <div class="layout">
    <div class="layout-contain">
        <router-view/>
    </div>
    <div class="layout-footer">
    <Menu mode="horizontal" :active-name="activeName" @on-select="onSelect">
        <MenuItem name="home">
            <Icon type="android-home"></Icon>
            首页
        </MenuItem>
        <MenuItem name="service">
            <Icon type="ios-color-filter"></Icon>
            服务
        </MenuItem>
        <MenuItem name="notice">
            <Icon type="chatbubble-working"></Icon>
            消息
        </MenuItem>
        <MenuItem name="personal">
            <Icon type="android-person"></Icon>
            我的
        </MenuItem>
    </Menu>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return{
            activeName: ''
        }
    },
    mounted () {
        this.activeName = localStorage.active ? localStorage.active : 'home';
        this.$router.push({name: this.activeName});
    },
  methods: {
    onSelect(name) {
      this.$nextTick(() => {
        this.$router.push({ name });
        localStorage.active = name;
      });
    }
  }
};
</script>
<style>
.layout {
  background: #f3f3f3;
  position: relative;
  height: 100%;
  width: 100%;
}
.layout-contain {
  position: relative;
  /* padding-bottom: 50px; */
  height: 100%;
}
.layout-header {
  height: 45px;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  color: #fff;
  background: #1bbc9b;
  line-height: 45px;
  font-size: 18px;
  z-index: 999;
  padding: 0 10px;
}
.layout-footer {
  position: fixed;
  bottom: 0;
  left: 0;
  height: 50px;
  width: 100%;
}
.layout-box {
  position: absolute;
  top: 45px;
  padding: 0 10px;
  width: 100%;
  /* padding-bottom: 50px; */
}
.ivu-menu-light {
  background: #f7f7f7;
}
.ivu-menu-horizontal {
  padding: 5px;
}
.ivu-menu-light.ivu-menu-horizontal .ivu-menu-item-active,
.ivu-menu-light.ivu-menu-horizontal .ivu-menu-item:hover,
.ivu-menu-light.ivu-menu-horizontal .ivu-menu-submenu-active,
.ivu-menu-light.ivu-menu-horizontal .ivu-menu-submenu:hover {
  border-bottom: none;
  color: #1bbc9b;
}
.ivu-menu-item > i {
  margin-right: 0;
}
.ivu-icon {
  display: block;
  font-size: 24px;
  margin-bottom: -20px;
}
.ivu-menu-horizontal .ivu-menu-item {
  width: 25%;
}
</style>

