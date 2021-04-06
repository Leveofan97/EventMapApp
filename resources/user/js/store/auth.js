import {auth} from "@/user/js/api";

const state = window.initialState.user || {
    id: null,
    firstName: null,
    lastName: null,
    phone: null,
    email: null,
};

let user = window.initialState && window.initialState.user;
if (user) {
    Object.assign(state, user);
}

const getters = {
    authorized: state => state.id,
};

const actions = {/*
    async update(context, data) {
        const res = await auth.update(data);
        context.commit("update", res);
    },*/
    async login(context, data) {
        const res = await auth.login(data);
        context.commit("update", res);
    },
    async register(context, data) {
        const res = await auth.register(data);
        context.commit("update", res);
    },
};

const mutations = {
    setState(state, data) {
        state = data;
    },
    update(state, data) {
        Object.assign(state, data);
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
