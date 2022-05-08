<template>
    <div class="top-video-block">
        <div class="show-all-series-post">Показать все серии</div>
        <div class="search-series-input">
            <input id="search-input" type="text" placeholder="">
            <div class="search-placeholder">Поиск серии</div>
        </div>

        <div class="arrow-series to-left-series">
            <div></div>
        </div>

        <div ref="block" class="series-block">
            <div class="series-main-list">
                <div class="search-place-post">
                    <i class="fa fa-reply-all"></i>
                    <input class="post-search" type="text">
                    <div class="placeholder-post">Поиск серии</div>
                </div>
                <ul ref="series" class="series-list" :style="{
                    translateX: sumSize,
                }">
                    <li
                        v-for="ser in series"
                        class="series-item"
                        :class="{'series-item-active': modelValue.id === ser.id}"
                        :key="ser.id"
                        :ref="calcListWidth"
                    >
                        {{ ser.full_name }}
                    </li>

                </ul>
            </div>
        </div>

        <div class="arrow-series to-right-series" @click="right">
            <div></div>
        </div>
        <div class="search-series">
            <i class="fa fa-search"></i>
        </div>
    </div>
</template>

<script setup>
import {computed, nextTick, onMounted, ref, watch} from "vue";

const props = defineProps({
    series: [Object, Array],
    modelValue: [String, Object, Number],
})

const emit = defineEmits(['update:modelValue'])


const sumSize = ref(0)

const block = ref(null)

const seriesListWidth = ref(0)

const maxTrans = computed(() => {

})


function scrollingSeries(size) {
    sumSize.value += size;
    if (sumSize <= maxTrans) sumSize.value = maxTrans;
    if (sumSize > 0) sumSize.value = 0;
}

function right() {
    scrollingSeries(5)
}


function calcListWidth(el){
    seriesListWidth.value += el.offsetWidth + 10;
}

onMounted( async () => {

})


</script>

<style scoped>

</style>
