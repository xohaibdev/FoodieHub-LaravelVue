import { createRouter, createWebHistory } from "vue-router";
import RestaurantLayout from '../views/layouts/RestaurantLayout.vue';
import List from '../views/restaurents/List.vue';

import Add from '../views/restaurents/Add.vue';
import Details from '../views/restaurents/Details.vue';

import ItemsList from '../views/restaurents/ItemsList.vue';
import AddonList from '../views/restaurents/AddonList.vue';
import AddItem from '../views/restaurents/AddItem.vue';


import Login from '../views/auth/Login.vue';
const routes = [
    {
      path: '/',
      component: RestaurantLayout,
      meta: { requiresAuth: true },
      children: [
        {
          path: '',
          component: List,
          name: 'restaurants-list'
        },
        {
          path: 'restaurants/add',
          component: Add,
          name: 'add-restaurant'
        },
        {
          path: 'restaurants/view/:id',
          component: Details,
          props: true,
          name: 'restaurant-details'
        },
        {
            path: 'restaurants/items',
            component: ItemsList,
            name: 'restaurant-items-list'
        },

        {
            path: 'restaurants/items/add',
            component: AddItem,
            name: 'add-restaurant-items'
        },

        {
            path: 'restaurants/items/addons',
            component: AddonList,
            name: 'restaurant-items-addons-list'
        }
      ]
    },
    {
      path: '/login',
      component: Login
    }
  ];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

function checkIfUserIsLoggedIn() {
    const authToken = localStorage.getItem('authToken');
    return !!authToken;
}

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth) {
        const isLoggedIn = checkIfUserIsLoggedIn();

        if (!isLoggedIn) {
            next('/login');
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
