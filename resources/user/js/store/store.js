import Vue from "vue";
import Vuex from "vuex";
import auth from "@/user/js/store/auth";/*
import sidebar from "@/user/js/store/sidebar";
import statuses from "@/user/js/store/statuses";
import goods from "@/user/js/store/goods";*/

Vue.use(Vuex);

const store = new Vuex.Store({
    strict: process.env.NODE_ENV !== "production",
    state: {
        ready: true,
        authShow: false,
        regShow: false,
    },
    modules: {
        auth//, sidebar, statuses, goods,
    },
    mutations: {
        setReady(state, val) {
            state.ready = val;
        },
        authReq(state) {
            if(state.regShow) state.regShow = !state.regShow;
            state.authShow = !state.authShow;
        },
        regReq(state) {
            if(state.authShow) state.authShow = !state.authShow;
            state.regShow = !state.regShow;
        },
    },
    actions: {
        /*    async fetchDashboard(context) {
                context.commit('setReady', false);
                try {

                } catch (e) {

                }
                context.commit('setReady', true);
            },*/
    },
});

export default store;
