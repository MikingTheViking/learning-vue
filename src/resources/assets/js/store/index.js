import Vue from 'vue'
import Vuex from 'vuex'
import * as getters from './getters'
import * as actions from './actions'
import mutations from './mutations'
//import module1 from './modules/module1.js'
//import createLogger from '../../../src/plugins/logger'    from example

Vue.use(Vuex)

const state = {
    test: true
  //currentThreadID: null,
  //threads: {
    /*
    id: {
      id,
      name,
      messages: [...ids],
      lastMessage
    }
    */
  //},
  //messages: {
    /*
    id: {
      id,
      threadId,
      threadName,
      authorName,
      text,
      timestamp,
      isRead
    }
    */
  //}
}

export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations,
  //modules: {
  //  module1
  //}
  //plugins: process.env.NODE_ENV !== 'production'
  //  ? [createLogger()]
  //  : []
})