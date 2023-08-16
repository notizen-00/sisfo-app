// storeModel.js
import { createStore } from 'vuex';
import axios from 'axios';

const storeModel = createStore({
  state() {
    return {
      IkuId: null,
      IkuData: null,
      PengajuanId : null,
    };
  },
  mutations: {
    setPengajuanId(state,id){
        state.PengajuanId = id;
    },
    setIkuId(state, id) {
      state.IkuId = id;
    },
    setIkuData(state, data) {
      state.IkuData = data;
    },
    // ... tambahkan mutations lainnya jika diperlukan
  },
  actions: {
    
    async fetchIku(context) {
      const response = await axios.get('/Rest/iku');
      const IkuData = response.data;
    //   console.log(IkuData);
      context.commit('setIkuData', IkuData);
    },


    // ... tambahkan actions jika diperlukan
  },
  getters: {
    getPengajuanId(state){
        return state.PengajuanId;
    },
    getIkuId(state) {
      return state.IkuId;
    },
    getIkuData(state) {
      return state.IkuData;
    },
    // ... tambahkan getters jika diperlukan
  },
});

export default storeModel;
