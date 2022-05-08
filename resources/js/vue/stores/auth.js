import {defineStore} from "pinia";

export const useAuthStore = defineStore({
    id: 'auth',
    state: () => ({
        auth: {}
    }),
    actions: {
        login(params) {
            return axios.post('/auth/login', params)
        },
    }
})
