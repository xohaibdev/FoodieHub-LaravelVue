import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("../views/restaurents/List.vue"),
        meta: { requiresAuth: true },
        name:"restaurants-list"
    },
    {
        path: "/restaurents/add",
        component: () => import("../views/restaurents/Add.vue"),
        meta: { requiresAuth: true }
    },
    {
        path: "/restaurents/view/:id",
        component: () => import("../views/restaurents/Details.vue"),
        props: true,
        meta: { requiresAuth: true }
    },
    {
        path: "/login",
        component: () => import("../views/auth/login.vue"),
    },
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
