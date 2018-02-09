import Vue from 'vue'
import Vuex from 'vuex'
import * as getters from './getters'
import * as actions from './actions'
import mutations from './mutations'
import listmovetransition from './modules/listmovestore.js'
import AppRouter from './modules/approuter.js'

Vue.use(Vuex)

const state = {
    test: true,
}

export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations,
  modules: {
    listmovetransition,
    AppRouter
  }
})