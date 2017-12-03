import * as types from '../mutation-types'

// initial state
// shape: [{ id, quantity }]
const state = {
    //added: [],
    navOpen: false
}

// getters
const getters = {
    getNavState: state => {
        //console.log('getting navOpen ' + state.navOpen);
        return state.navOpen;
    }
}

// actions
const actions = {
    toggleNav({commit, state}, nav) {
        //console.log('toggling Nav ' + !state.navOpen);
        commit(types.TOGGLE_NAV, {navOpen: !state.navOpen})
    }
}

// mutations
const mutations = {
    [types.TOGGLE_NAV](state, { navOpen }) {
        //console.log('applying mutation to state.navOpen');
        state.navOpen = navOpen;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
