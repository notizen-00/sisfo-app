// store.js
import { createStore } from 'vuex';
import axios from 'axios';
const store = createStore({
  state() {
    return {
      isSidebarCollapsed: false,
      userId:null,
      userData:null,
      // ... tambahkan state lainnya jika diperlukan
    };
  },
  mutations: {
    toggleSidebar(state) {
      state.isSidebarCollapsed = !state.isSidebarCollapsed;
    },
    setUserId(state, id) {
      state.userId = id;
    },
    setUserData(state, data) {
      state.userData = data;
    },
    // ... tambahkan mutations lainnya jika diperlukan
  },
  actions: {

    async fetchUser(context, id) {
   
      const response = await axios.get(`/user/${id}`);

      const userData = response.data;

      context.commit('setUserData', userData);
    },
    // ... tambahkan actions jika diperlukan
  },
  getters: {
    getUserId(state) {
      return state.userId;
    },
    getUserData(state) {
      return state.userData;
    },

    // ... tambahkan getters jika diperlukan
  }
});

export default store;
