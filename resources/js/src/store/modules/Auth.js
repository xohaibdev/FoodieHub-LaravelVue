import axios from 'axios';

const authModule = {
  state: () => ({
    authToken: localStorage.getItem('authToken') || null,
    user: null,
  }),
  mutations: {
    SET_AUTH_TOKEN(state, token) {
      state.authToken = token;
      localStorage.setItem('authToken', token);
    },
    SET_USER(state, user) {
      state.user = user;
    },
    LOGOUT(state) {
      state.authToken = null;
      state.user = null;
      localStorage.removeItem('authToken');
    },
  },
  actions: {
    async login({ commit }, { email, password }) {
      try {
        const response = await axios.post('/api/admin/login', {
          email,
          password,
        });
        if (response.status === 200) {
          const token = response.data.data.token;
          commit('SET_AUTH_TOKEN', token);
          commit('SET_USER', null);
          return { success: true };
        }
      } catch (error) {
        console.error('Error:', error.message);
        throw error;
      }
    },
    logout({ commit }) {
      commit('LOGOUT');
    },
  },
  getters: {
    isLoggedIn: state => !!state.authToken,
    getUser: state => state.user,
    getAuthToken: state => state.authToken,
  },
};

export default authModule;
