import Vue from 'vue'
import Vuex from 'vuex'

import * as getters from './getters'
import * as actions from './actions'
import mutations from './mutations'

//import navigation from './modules/navigation.js'
import listmovetransition from './modules/listmovestore.js'

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
    //navigation,
    listmovetransition
  }
  //plugins: process.env.NODE_ENV !== 'production'
  //  ? [createLogger()]
  //  : []
})