
//import shop from '../../api/shop'
import * as types from '../mutation-types'

// initial state
// shape: [{ id, quantity }]
const state = {
  //added: [],
  //checkoutStatus: null
    items: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
}

// getters
const getters = {
    /*
    checkoutStatus: state => {
      console.log('getting checkoutStatus')
      state.checkoutStatus
  }*/
  getItems: state => {
      console.log('getting items');
      return state.items;
  }
}

// actions
const actions = {
  /*
    checkout ({ commit, state }, products) {
    const savedCartItems = [...state.added]
    commit(types.CHECKOUT_REQUEST)
    shop.buyProducts(
      products,
      () => commit(types.CHECKOUT_SUCCESS),
      () => commit(types.CHECKOUT_FAILURE, { savedCartItems })
    )
  }
  */
  shuffle ({commit, state}, items) {
      console.log('shuffling');
      let temp = doShuffle([...state.items]);
        console.log('committing ' + types.SET_LIST_MOVE_ARRAY + ', ' , temp);
        commit(types.SET_LIST_MOVE_ARRAY, {items: temp});
  }
}

// mutations
const mutations = {
    [types.SET_LIST_MOVE_ARRAY] (state, { items }) {
        console.log('applying mutation to state.items');
        state.items = items;
    }
/*  
    [types.ADD_TO_CART] (state, { id }) {
    state.checkoutStatus = null
    const record = state.added.find(p => p.id === id)
    if (!record) {
      state.added.push({
        id,
        quantity: 1
      })
    } else {
      record.quantity++
    }
  },

  [types.CHECKOUT_REQUEST] (state) {
    // clear cart
    state.added = []
    state.checkoutStatus = null
  },

  [types.CHECKOUT_SUCCESS] (state) {
    state.checkoutStatus = 'successful'
  },

  [types.CHECKOUT_FAILURE] (state, { savedCartItems }) {
    // rollback to the cart saved before sending the request
    state.added = savedCartItems
    state.checkoutStatus = 'failed'
  }
  */
}

export default {
  state,
  getters,
  actions,
  mutations
}

function doShuffle(array) {
    let counter = array.length;

    // While there are elements in the array
    while (counter > 0) {
        // Pick a random index
        let index = Math.floor(Math.random() * counter);

        // Decrease counter by 1
        counter--;

        // And swap the last element with it
        let temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }
    return array;
}
