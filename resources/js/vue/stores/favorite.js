import {defineStore} from "pinia";

export const useFavoriteStore = defineStore('favorite',{
    state: () => ({
        count: null
    }),
    actions: {
        getCount() {
            return axios.get('/favorites/count')
                .then(response => this.count = response.data)
        },
    }
})

