import Vuex from 'vuex';
import Auth from './modules/Auth';
import Restaurant from './modules/Restaurant';

const store = new Vuex.Store({
    modules: {
        Auth,
        Restaurant,
    },
});

export default store;
