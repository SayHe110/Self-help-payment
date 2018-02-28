import Vue from 'vue'
import Router from 'vue-router'
import login from '../page/login.vue'
import footer from '../components/footer.vue'
import home from '../page/home.vue'
import service from '../page/service.vue'
import notice from '../page/notice.vue'
import personal from '../page/personal.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'login',
      component: login
    },
    {
      path: '/footer',
      name: 'footer',
      component: footer,
      children: [
        {
          path: '/home',
          name: 'home',
          component: home
        },
        {
          path: '/service',
          name: 'service',
          component: service
        },
        {
          path: '/notice',
          name: 'notice',
          component: notice
        },
        {
          path: '/personal',
          name: 'personal',
          component: personal
        },
      ]
    }
  ]
})
