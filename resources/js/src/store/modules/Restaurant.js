import axios from 'axios';

const restaurantModule = {

    state: () => ({
        restaurants: [],
    }),

    mutations : {

        SET_RESTAURANTS(state, restaurants) {
            state.restaurants = restaurants;
        },
    },

    actions : {
        async fetchAndSaveRestaurants({ commit }) {
            try {
                const authToken = localStorage.getItem('authToken');
                const apiUrl = "/api/restaurants";
                const response = await axios.get(apiUrl, {
                    headers: {
                        Authorization: `Bearer ${authToken}`,
                    },
                });
                // Save fetched restaurants in the store
                commit('SET_RESTAURANTS', response.data.data);
                console.log("🚀 ~ fetchAndSaveRestaurants ~ response.data.data:", response.data.data)

            } catch (error) {
                console.error('Error fetching restaurants:', error);
                throw error;
            }
        },
    },

    getters : {
        getRestaurants: state => state.restaurants,
        getSelectedRestaurant: state => state.selectedRestaurant,
    },

};

export default restaurantModule;
