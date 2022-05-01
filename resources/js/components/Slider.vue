<template>
    <div id="slider" @touchstart="onTouchStart" @touchmove="onTouchMove">
        <div class="arrows">
            <div class="arrow-item s-next" @click="nextSlide">
                <i class="fa fa-angle-double-right"></i>
            </div>

            <div class="arrow-item s-prev" @click="prevSlide">
                <i class="fa fa-angle-double-left"></i>
            </div>
        </div>

        <div class="background-slider" ref="bgSlider"></div>

        <div class="slide-wrapper" ref="sliderWrapper">
            <a v-for="item in items" :href="item.url" :key="item.id">
                <div class="slide"><img :src="item.img" :alt="item.title"></div>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Slider",
    props: {
        items: {
            type: [Array]
        }
    },
    data() {
        return {
            sliderWidth: null,
            startContactSlider: null,
            endContactSlider: null,
            isSwitching: true,
            prevpos: 0,
            pos: 0
        }
    },
    computed: {
        slideCount() {
            return this.items.length
        }
    },
    mounted() {
        this.setSliderWidth()
        this.onResize()
        setInterval(this.nextSlide, 4000);
    },
    methods: {
        onResize() {
            window.onresize = () => {
                this.setSliderWidth()
            }
        },
        onTouchStart(event) {
            this.startContactSlider = event.targetTouches[0].pageX

            setTimeout(() => {
                if (this.startContactSlider > (this.endContactSlider + 50)) this.nextSlide();
                if ((this.startContactSlider + 50) < this.endContactSlider) this.prevSlide();
            }, 300);
        },
        onTouchMove(event) {
            this.endContactSlider = event.targetTouches[0].pageX
        },
        setSliderWidth() {
            this.sliderWidth = document.querySelector('#wrapper').clientWidth;
        },
        nextSlide() {
            if (this.isSwitching) {
                this.isSwitching = false;
                this.prevpos = this.pos;
                this.pos < this.slideCount - 1 ? this.pos++ : this.pos = 0;
                this.showSlide();
            }
        },
        prevSlide() {
            if (this.isSwitching) {
                this.isSwitching = false;
                this.prevpos = this.pos;
                this.pos > 0 ? this.pos-- : this.slideCount;
                this.showSlide();
            }
        },
        showSlide() {
            this.$refs.bgSlider.style.transform = "translateX(-" + (this.pos * this.sliderWidth) / 3 + "px)";
            this.$refs.sliderWrapper.style.transform = "translateX(-" +this.pos * this.sliderWidth + "px)";
            setTimeout(() => {
                this.isSwitching = true;
            }, 2000);
        }
    }
}
</script>

<style scoped>

</style>
