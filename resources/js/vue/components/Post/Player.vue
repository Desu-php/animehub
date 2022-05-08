<template>
  <Series :series="series" v-model="activeSeries" />
    <video
        ref="video"
        :src="activeSeries"
        class="video"
        :autoplay="autoplay"
        @ended="onEnded"
        controls>

    </video>
</template>

<script setup>
import {nextTick, onMounted, ref} from "vue";
import Series from "./Series";

const props = defineProps({
    series: [Object, Array],
    post_id: [String, Number],
    studs: [Object, Array],
    kachs: [Object, Array]
})

const video = ref(null)
const activeSeries = ref({})
const autoplay = ref(false)


function onEnded(e) {
    autoplay.value = true

    if (activeSeries.id === props.series.at(-1).id) return;


}

onMounted(() => {
    nextTick(() => {
        const blockWidth = block.value.offsetWidth

    })

    // const videoEl = video.value
    // videoEl.addEventListener('ended', function () {
    //     videoEl.setAttribute("autoplay", "true")
    //     let oldSeries = $('.series-item-active');
    //     oldSeries.removeClass('series-item-active')
    //     if (oldSeries.attr("src") === seriesItem[seriesItem.length - 1].getAttribute("src")) {
    //         return
    //     }
    //     let next = oldSeries.next();
    //     if (next) {
    //         while (next.attr('id-ser') === oldSeries.attr('id-ser')) {
    //             next = next.next()
    //         }
    //         next.addClass('series-item-active');
    //         let indexSeries = next.index();
    //         localStorage.setItem(id_post, JSON.stringify({
    //             'index': indexSeries,
    //             'video': 0
    //         }));
    //         videoLink.src = next.attr('src')
    //     }
    // })
    //
    // if (localStorage.getItem(post_id)) {
    //     let memory = JSON.parse(localStorage.getItem(post_id));
    //     console.log(memory)
    //     if (memory.index !== -1) {
    //         $(`.series-item:eq(${memory.index})`).addClass('series-item-active')
    //         videoLink.setAttribute("autoplay", "false")
    //         videoLink.src = seriesItem[memory.index].getAttribute('src');
    //         videoLink.currentTime = memory.video;
    //         videoLink.pause();
    //     } else {
    //         localStorage.setItem(post_id, JSON.stringify({
    //             'index': 0,
    //             'video': 0
    //         }));
    //     }
    //
    // } else {
    //     localStorage.setItem(post_id, JSON.stringify({
    //         'index': 0,
    //         'video': 0
    //     }));
    //     videoLink.removeAttribute("autoplay");
    //     videoLink.src = seriesItem[0].getAttribute('src');
    //     seriesItem[0].classList.add('series-item-active')
    // }
})
</script>

<style scoped>

</style>
