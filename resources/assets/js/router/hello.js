import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

export default new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            name: "test1",
            path: '/',
            component: resolve =>void(require(['../components/hello/test1.vue'], resolve))
        },
    ]
})