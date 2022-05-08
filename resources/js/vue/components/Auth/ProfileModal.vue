<template>
    <div id="profile" v-if="store.auth">
        <div class="top">
            <div>Профиль</div>
            <div class="exit-profile" @click="() => $emit('update:modelValue', false)">
                <div class="exit-line f-line"></div>
                <div class="exit-line s-line"></div>
            </div>
        </div>

        <div class="main-sign-in-page">
            <div class="profile-data">
                <div class="profile-avatar">
                    <img :src="store.auth.avatar" alt="avatar">
                </div>

                <div class="profile-name">
                    {{ store.auth.login }}
                </div>
            </div>

            <div class="profile-bottom">
                <div><a :href="`/profile/${store.auth.login}`">Профиль</a></div>
                <div><a href="/favorites">Закладки: (<span
                    class="bookmark-quantity">{{ favoriteStore.count}}</span>)</a></div>
                <div><a href="#"
                        onclick="(event) => event.preventDefault(); document.getElementById('logoutForm').submit()">Выйти</a>
                </div>
                <form hidden id="logoutForm" method="post" :action="props.route">
                    <slot/>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, watch} from "vue";
import {useAuthStore} from "../../stores/auth";
import {useFavoriteStore} from "../../stores/favorite";

const props = defineProps({
    route: String,
    modelValue: Boolean,
    user: Object
})

defineEmits(['update:modelValue'])

const store = useAuthStore()
const favoriteStore = useFavoriteStore()

onMounted(() => {
    if (props.user) store.auth = props.user
})

watch(() => props.modelValue, (newVal, oldVal) => {
    if (newVal) {
        open()
        if (favoriteStore.count === null) favoriteStore.getCount()
    } else {
        close()
    }
})

function open() {
    document.body.classList.add('open-profile');
    setTimeout(() => document.body.classList.add('sign-in-opacity'), 0);
}

function close() {
    document.body.classList.remove('sign-in-opacity');
    setTimeout(() => document.body.classList.remove('open-profile'), 500);
}

</script>

<style scoped>

</style>
