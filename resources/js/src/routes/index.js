import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("../views/restaurents/List.vue"),
    },
    {
        path: "/restaurents/add",
        component: () => import("../views/restaurents/Add.vue"),
    },
    {
        path: "/restaurents/view/:id",
        component: () => import("../views/restaurents/Details.vue"),
        props: true
    },
    {
        path: "/login",
        component: () => import("../views/auth/login.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
