import Vue from 'vue';
import Vuex from 'vuex';
import Auth from './modules/Auth';
import Restaurant from './modules/Restaurant';

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        Auth,
        Restaurant,
    },
});

export default store;
