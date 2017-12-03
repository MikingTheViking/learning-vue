import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const Foo = { template: `<div class="foo"><h1>foo</h1></div>` }
const Bar = { template: `<div class="bar"><h1>bar</h1></div>` }

export default new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { path: '/foo', component: Foo },
    { path: '/bar', component: Bar }
  ]
})