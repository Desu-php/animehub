import {createApp} from 'vue'
import HelloWorld from "./components/HelloWorld";
import Slider from "./components/Slider";
import Login from "./components/Auth/Login"
import ProfileModal from "./components/Auth/ProfileModal"
import Player from "./components/Post/Player"
import Toast from "vue-toastification";
import { createPinia } from 'pinia'

import "vue-toastification/dist/index.css";
import {useAuthStore} from "./stores/auth";

const pinia = createPinia()


const app = createApp({
    data() {
        return {
            openLogin: false,
            openProfile: false
        }
    },
    methods: {
        showLogin() {
            this.openLogin = !this.openLogin
        },
        showProfile(){
            this.openProfile = !this.openProfile
        }
    },
    setup() {
        const store = useAuthStore()

        return {
            store,
        }
    },
}).component('hello-world', HelloWorld)
    .component('slider', Slider)
    .component('login', Login)
    .component('ProfileModal', ProfileModal)
    .component('player', Player)
    .use(Toast)
    .use(pinia)

window.App = app

