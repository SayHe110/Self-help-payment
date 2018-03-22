<template>
  <div id="app" class="fillcontain">
    <router-view/>
  </div>
</template>
<script>
export default {
  name: 'App'
}
</script>
<style>
#app {
  font-family: "Microsoft YaHei",Arial, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  max-width: 500px;
  min-width: 300px;
  margin: 0 auto;
  height: 100%;
  background: #fff;
}
*{
    padding: 0;
    margin: 0;
}
li{
    list-style: none;
}
html,body{
  width: 100%;
  height: 100%;
  background:#f3f3f3;
}
html{
  font-size: 62.5%;
}
.ivu-btn-success{
    color: #fff;
    background-color: #1bbc9b;
    border-color: #1bbc9b;
}
.drop_down{
        opacity: .4;
        position: fixed;
        bottom: 80px;
        right: 20px;
        height: 50px;
        width: 50px;
        background-color: #fff;
        text-align: center;
        border: 1px solid #e1e1e1;
        border-radius: 10px;
        z-index: 999;
        &:active{
            background-color: #f5f5f5;
        }
        >img{
            width: 30px;
            height: 30px;
            margin-top: 9px;
        }
    }
    .vux-pop-out-enter-active,
    .vux-pop-out-leave-active,
    .vux-pop-in-enter-active,
    .vux-pop-in-leave-active {
        will-change: transform;
        transition: all 500ms;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
        perspective: 1000;
    }
    .vux-pop-out-enter {
        opacity: 0;
        transform: translate3d(-100%, 0, 0);
    }
    .vux-pop-out-leave-active {
        opacity: 0;
        transform: translate3d(100%, 0, 0);
    }
    .vux-pop-in-enter {
        opacity: 0;
        transform: translate3d(100%, 0, 0);
    }
    .vux-pop-in-leave-active {
        opacity: 0;
        transform: translate3d(-100%, 0, 0);
    }
    .router-view {
        width: 100%;
    }
</style>
