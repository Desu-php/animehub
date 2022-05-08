<template>
    <div class="mb-8">
        <div
            class="relative border-b-2"
            :class="{
        'is-invalid': error.length,
        'focus-within:border-blue-500': !error.length
    }"
        >
            <input
                v-bind="$attrs"
                name="username"
                placeholder=" "
                class="block w-full appearance-none focus:outline-none bg-transparent"
                @input="$emit('update:modelValue', $event.target.value)"
            />
            <label for="username" class="absolute top-0 -z-1 duration-300 origin-0">{{ label }}</label>
        </div>
        <small class="text-red-800">{{ Array.isArray(error) ? error[0] : error }}</small>
    </div>


</template>

<script>
export default {
    name: "Input",
    props: {
        label: {
            type: String,
            default: ''
        },
        modelValue: {
            type: [String, Number],
            default: ''
        },
        error: {
            type: [String, Array, Object],
            default: ''
        }
    }
}
</script>

<style scoped lang="scss">
input:focus-within ~ label,
input:not(:placeholder-shown) ~ label {
    @apply transform scale-75 -translate-y-6;
}

input:focus-within ~ label {
    @apply text-blue-500;
}

.is-invalid {
    @apply border-red-700;

    label {
        @apply text-red-700;
    }

    input {
        &:focus-within ~ label {
            @apply text-red-700;
        }
    }

}
</style>
