import Vue from 'vue'
import Router from 'vue-router'
import AppRouter from './AppRouter.vue';

Vue.use(Router)

const Foo = {
    template: '<div>foo</div>'
}
const Bar = {
    template: '<div>bar</div>'
}
const User = {
    template: '<div>User: {{ $route.params.id }}</div>'
}

const routes = [
    {
        path: '/foo',
        component: Foo
    },
    {
        path: '/bar',
        component: Bar
    },
    {
        path: '/user/:id',
        component: User
    }
];

export default new Router({
    // routes: [
    //     {
    //         path: '/',
    //         name: 'AppRouter',
    //         component: AppRouter
    //     }
    // ]
    routes,
    mode: 'history'
})