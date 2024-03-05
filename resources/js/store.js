import { createStore } from 'vuex';

const store = createStore({
  state: {
    user: null,
    isLoggedIn: false,
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
      state.isLoggedIn = !!user;
    },
    logout(state) {
      state.isLoggedIn = false;
      state.user = null;
    },
  },
  actions: {
    login({ commit }, credentials) {
      axios.post('/login', credentials)
        .then(response => {
          commit('setUser', response.data.user);
        })
        .catch(error => {
          console.error(error);
        });
    },
    logout({ commit }) {
      axios.post('/logout')
        .then(() => {
          commit('logout');
        })
        .catch(error => {
          console.error(error);
        });
    },
  },
  getters: {
    currentUser(state) {
      return state.user;
    },
    isLoggedIn(state) {
      return state.isLoggedIn;
    },
  },
});

export default store;
