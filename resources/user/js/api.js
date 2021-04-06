import axios from "axios";
import humps from "humps";
import qs from "qs"
//import router from "@/user/js/router";

export const fileUploadLink = window.location.origin + "/api/user/upload";
export const http = axios.create({
    baseURL: window.location.origin + "/api/user/",
});

http.interceptors.request.use(function (config) {
    if (config.humps === false) return config;

    if (config.params) {
        config.params = humps.decamelizeKeys(config.params);

        config.paramsSerializer = function (params) {
            return qs.stringify(config.params, {arrayFormat: "index"});
        }
    }

    if (config.data)
        config.data = humps.decamelizeKeys(config.data);

    return config;
}, function (error) {
    return Promise.reject(error);
});

http.interceptors.response.use(function (response) {
    if (response.config.humps === false) return response;

    return humps.camelizeKeys(response);
}, function (error) {
    if (error.response.status === 401) {
        //router.push({name: "login"})
    }
    return Promise.reject(error.response);
});
/*
export const orders = {
    route: "orders",
    async fetch(params) {
        return (await http.get(`${this.route}`, {params: params})).data;
    },
    async fetchOne(id, params) {
        return (await http.get(`${this.route}/${id}`, {params: params})).data;
    },
    async store(params) {
        params = JSON.parse(JSON.stringify(params));
        // if (params.datetime && typeof params.datetime == "object") params.datetime.toISOString();
        if (params.employer) {
            params.employerId = params.employer.id;
            delete params.employer;
        }
        if (params.agent) {
            params.agentId = params.agent.id;
            delete params.agent;
        }
        if (params.user) {
            params.userId = params.user.id;
            delete params.user;
        }
        if (params.items) {
            params.items = params.items.map(item => {
                return {
                    goodId: item.good.id,
                    count: item.count,
                    priceRub: item.priceRub,
                    statusId: item.statusId,
                }
            });
        }
        return (await http.post(`${this.route}`, params)).data;
    },
    async update(id, params) {
        params = JSON.parse(JSON.stringify(params));
        // if (params.datetime && typeof params.datetime == "object") params.datetime.toISOString();
        if (params.employer) {
            params.employerId = params.employer.id;
            delete params.employer;
        }
        if (params.agent) {
            params.agentId = params.agent.id;
            delete params.agent;
        }
        if (params.user) {
            params.userId = params.user.id;
            delete params.user;
        }
        if (params.items) {
            params.items = params.items.map(item => {
                return {
                    goodId: item.good.id,
                    count: item.count,
                    priceRub: item.priceRub,
                    statusId: item.statusId,
                }
            });
        }
        return (await http.put(`${this.route}/${id}`, params)).data;
    },
    async delete(id, params) {
        return (await http.delete(`${this.route}/${id}`, params)).data;
    },
};
*/
export const auth = {
    async login(params) {
        return (await http.post(`login`, params)).data;
    },
    async register(params) {
        return (await http.post(`registration`, params)).data;
    },
    async update(params) {
        return (await http.put(`profile`, params)).data;
    },
};
