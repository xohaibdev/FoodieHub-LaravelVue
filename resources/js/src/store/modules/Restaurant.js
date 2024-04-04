
const restaurantModule = {

    state: () => ({
        restaurants: [],
        selectedRestaurant: null,
      }),
  mutations : {
    SET_RESTAURANTS(state, restaurants) {
      state.restaurants = restaurants;
    },
    SET_SELECTED_RESTAURANT(state, restaurant) {
      state.selectedRestaurant = restaurant;
    },
  },

  actions : {
    async fetchRestaurants({ commit }) {
      try {
        // Fetch restaurants from API
        // Upon successful retrieval, commit mutation to update state
        const restaurants = []; // Fetch restaurants from API
        commit('SET_RESTAURANTS', restaurants);
      } catch (error) {
        // Handle error
        console.error('Failed to fetch restaurants:', error.message);
      }
    },
    selectRestaurant({ commit }, restaurantId) {
      // Fetch restaurant details by ID from API
      // Upon successful retrieval, commit mutation to update state
      const restaurant = {}; // Fetch restaurant details by ID from API
      commit('SET_SELECTED_RESTAURANT', restaurant);
    },
  },

  getters : {
    getRestaurants: state => state.restaurants,
    getSelectedRestaurant: state => state.selectedRestaurant,
  },

};

export default restaurantModule;
