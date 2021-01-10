import Vue from "vue";
import VueRouter from "vue-router";
import TheAuth from "@/user/js/components/auth/TheAuth";
//import TheOrders from "@/user/js/components/orders/TheOrders";
//import TheProfile from "@/user/js/components/profile/TheProfile";
import store from "@/user/js/store/store";

Vue.use(VueRouter);

export const routes = [
/*
    {
        path: "/orders",
        component: TheOrders,
        name: "orders"
    },

    {
        path: "/profile",
        component: TheProfile,
        name: "profile"
    },
*/
    {
        path: "/login",
        component: TheAuth,
        name: "login"
    },
];

const router = new VueRouter({
    mode: "history",
    routes: routes,
    base: "user",
});

router.beforeEach((to, from, next) => {
    if (to.name != "login" && !store.getters["auth/authorized"]) {
        router.push({name: "login"});
    }
    store.commit("sidebar/toggle", false);
    next()
});

export default router;
