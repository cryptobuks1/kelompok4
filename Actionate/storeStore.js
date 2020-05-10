import { createStore} from 'redux'

const defaultState = {
  token : undefined
};

function storeStore(state=defaultState, action) {
  switch(action.type) {
    case 'SET_TOKEN':
      defaultState.token = action.payload.token;
      return{...state, defaultState};
    default:
      return state;
  }
}

export default createStore(storeStore);