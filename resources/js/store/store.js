// store.js
import { createStore } from 'vuex';

const store = createStore({
  state() {
    return {
      isSidebarCollapsed: false,
      
      // ... tambahkan state lainnya jika diperlukan
    };
  },
  mutations: {
    toggleSidebar(state) {
      state.isSidebarCollapsed = !state.isSidebarCollapsed;
    }
    // ... tambahkan mutations lainnya jika diperlukan
  },
  actions: {
    // ... tambahkan actions jika diperlukan
  },
  getters: {
    // ... tambahkan getters jika diperlukan
  }
});

export default store;
