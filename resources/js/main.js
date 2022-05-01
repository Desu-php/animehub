import {createApp} from 'vue'
import HelloWorld from "./components/HelloWorld";
import Slider from "./components/Slider";
import Login from "./components/Auth/Login"
import Input from "./components/Forms/Input";


const app = createApp({
    data() {
        return {
            openLogin: false
        }
    },
    methods: {
        showLogin() {
            console.log('showLogin')
             this.openLogin = !this.openLogin
        },
        testing(){
            console.log('kalbosa')
        }
    }
}).component('hello-world', HelloWorld)
    .component('slider', Slider)
    .component('login', Login)

window.App = app

