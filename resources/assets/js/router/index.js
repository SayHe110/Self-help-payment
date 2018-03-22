import Vue from 'vue'
import Router from 'vue-router'
import footer from '../components/footer.vue'
import box from '../components/box.vue'
Vue.use(Router)

export default new Router({
  routes: [
    {
        path: '*',
        redirect: require('../page/home.vue'),
    },
    {
      path: '/',
      name: 'login',
      component: require('../page/login.vue'),
    },
    {
        path: '/article/:id',
        name: 'article',
        component: require('../page/article.vue'),
    },
    {
      path: '/footer',
      name: 'footer',
      component: footer,
      children: [
        {
          path: '/home',
          name: 'home',
          component: require('../page/home.vue'),
          children: []
        },
        {
          path: '/service',
          name: 'service',
          component: require('../page/service.vue'),
        },
        {
          path: '/notice',
          name: 'notice',
          component: require('../page/notice.vue'),
        },
        {
          path: '/personal',
          name: 'personal',
          component: require('../page/personal.vue'),
        }
      ]
    },
    {
        path: '/box',
        name: 'box',
        component: box,
        children: [
            {
                path: '/register',
                name: 'register',
                component: require('../page/register.vue'),
            },
            {
                path: '/Forget',
                name: 'Forget',
                component: require('../page/Forget.vue'),
            },
            {
                path: '/Reset',
                name: 'Reset',
                component: require('../page/Reset.vue'),
            },
            {
                path: '/pay',
                name: 'pay',
                component: require('../servepages/pay.vue'),
            },
             {
                path: '/mybill/:id/:name',
                name: 'mybill',
                component: require('../servepages/mybill.vue'),
            },
            {

               path: '/myorder',
               name: 'myorder',
               component: require('../servepages/myorder.vue'),
            },
            {
                path: '/repair',
                name: 'repair',
                component: require('../servepages/repair.vue'),
            },
            {
                path: '/PowerCutNotice',
                name: 'PowerCutNotice',
                component: require('../servepages/PowerCutNotice.vue'),
            },
            {
                path: '/alreadybill',
                name: 'alreadybill',
                component: require('../servepages/alreadybill.vue'),
            },
            {
              path: '/nous',
              name: 'nous',
              component: require('../servepages/nous.vue'),
            },
            {
                path: '/complaint',
                name: 'complaint',
                component: require('../servepages/complaint.vue'),
            },
            {
                path: '/tellphone',
                name: 'tellphone',
                component: require('../servepages/tellphone.vue'),
            },
            {
                path: '/Electricity',
                name: 'Electricity',
                component: require('../servepages/Electricity.vue'),
            },
            {
                path: '/Powerdetails',
                name: 'Powerdetails',
                component: require('../servepages/Powerdetails.vue'),
            },
            {
                path: '/balance',
                name: 'balance',
                component: require('../servepages/balance.vue'),
            },
            {
                path: '/payment',
                name: 'payment',
                component: require('../servepages/payment.vue'),
            },
            {
                path: '/aboutus',
                name: 'aboutus',
                component: require('../servepages/aboutus.vue'),
            },
            {
                path: '/information',
                name: 'information',
                component: require('../servepages/information.vue'),
            },
            {
                path: '/dornum',
                name: 'dornum',
                component: require('../servepages/dornum.vue'),
            },
            {
                path: '/security',
                name: 'security',
                component: require('../servepages/security.vue'),
            },
            {
                path: '/SetPassword',
                name: 'SetPassword',
                component: require('../servepages/SetPassword.vue'),
            },
            {
                path: '/Alipay',
                name: 'Alipay',
                component: require('../servepages/Alipay.vue')
            }
        ]
    },
  ]
})
