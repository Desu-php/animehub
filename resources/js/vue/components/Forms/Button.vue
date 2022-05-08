<template>
    <button class="btn btn-blue" v-bind="$attrs">
        {{text}}
    </button>
</template>

<script>
export default {
    name: "Button",
    props: {
        text: {
            type: [String,Number],
            default: ''
        }
    }
}
</script>

<style scoped lang="scss">
.btn {
    @apply font-bold py-2 px-4 rounded;
}

.btn-blue {
    @apply text-white;
    background: #6882A1;
}

.btn-blue:hover {
    background: #536a84;
}

.btn:disabled {
    @apply opacity-50 cursor-not-allowed;
}
</style>
