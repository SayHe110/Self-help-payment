// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import VueResource from 'vue-resource'
import iView from 'iview';
import 'iview/dist/styles/iview.css';
import FastClick from 'fastclick';
import VCharts from 'v-charts'

Vue.use(VCharts)
Vue.config.productionTip = false
Vue.use(VueResource);
Vue.use(iView);
Vue.http.options.root = '/api';


/* eslint-disable no-new */
if(!!localStorage.jwt_token){
  Vue.http.headers.common.Authorization = 'Bearer ' + localStorage.jwt_token
}

Vue.http.interceptors.push(function(request) {
  if(!!localStorage.jwt_token){
    console.log(localStorage.jwt_token)
    request.headers.set('Authorization', 'Bearer ' + localStorage.jwt_token);
  }
});
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
FastClick.attach(document.body);
