<template>
    <div id="sign-in">
        <div class="top">
            <div>Авторизация</div>
            <div class="exit-sign-in" @click="$emit('update:modelValue', false)">
                <div class="exit-line f-line"></div>
                <div class="exit-line s-line"></div>
            </div>
        </div>

        <div class="px-5 py-8">
            <form @submit.prevent="onSubmit">
                <Input v-model="form.login" label="Логин" :error="validation?.login"/>
                <Input type="password" v-model="form.password" label="Пароль" :error="validation?.password"/>

                <div class="check-block">
                    <label for="check"><input type="checkbox" class="mr-2" name="remember" id="check"
                                              v-model="form.remember">Запомнить меня</label>
                </div>
                <div class="flex justify-end">
                    <Button :disabled="loading" text="Войти" type="submit" class="mt-2"/>
                </div>
            </form>
            <div class="bottom">
                <div class="forget-password">Забыли пароль?</div>
                <div class="registration"><a href="{{route('register')}}">Регистрация</a></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {reactive, watch} from 'vue'
import Input from "../Forms/Input";
import Button from "../Forms/Button";
import {useAsync} from "../../hooks/useAsync";
import {useAuthStore} from "../../stores/auth";

const props = defineProps({
    modelValue: Boolean,
});

const emit = defineEmits(['update:modelValue'])

const form = reactive({
    login: '',
    password: '',
    remember: false
})

const store = useAuthStore()

const {loading, run, value, error, validation} = useAsync(params => store.login(params))

watch(() => props.modelValue, (newVal, oldVal) => {
    if (newVal) {
        open()
    } else {
        close()
    }
})

watch(() => value, (newVal) => {
    if (newVal) {
        close()
    }
})

function open() {
    document.body.classList.add('sign-in');
    setTimeout(() => document.body.classList.add('sign-in-opacity'), 0);
}

function close() {
    document.body.classList.remove('sign-in-opacity');
    setTimeout(() => document.body.classList.remove('sign-in'), 500);
}

async function onSubmit() {
    await run(form)

    if (value) {
        emit('update:modelValue', false)
        store.auth = value
    }
}

</script>

<style scoped>

</style>
