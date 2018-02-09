import * as types from '../mutation-types'

// initial state
// shape: [{ id, quantity }]
const state = {
    //added: [],
    navOpen: false,
    content: '<p>Default Content Store.</p>'
}

// getters
const getters = {
    getNavState: state => {
        //console.log('getting navOpen ' + state.navOpen);
        return state.navOpen;
    },
    getContent: state => {
        console.log('getContent:');
        return state.content;
    }
}

// actions
const actions = {
    toggleNav({commit, state}, nav) {
        //console.log('toggling Nav ' + !state.navOpen);
        commit(types.TOGGLE_NAV, {navOpen: !state.navOpen})
    },
    setContent({commit, state}, content) {
        console.log('setContent running ');
        commit(types.SET_CONTENT, {content: content});
    }
}

// mutations
const mutations = {
    [types.TOGGLE_NAV](state, { navOpen }) {
        //console.log('applying mutation to state.navOpen');
        state.navOpen = navOpen;
    },
    [types.SET_CONTENT](state, { content }) {
        console.log('applying the set content mutation');
        state.content = content;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
