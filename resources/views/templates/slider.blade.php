<div id="slider">
    <div class="arrows">
        <div class="arrow-item s-next">
            <i class="fa fa-angle-double-right"></i>
        </div>

        <div class="arrow-item s-prev">
            <i class="fa fa-angle-double-left"></i>
        </div>
    </div>

    <div class="background-slider"></div>

    <div class="slide-wrapper">
        @foreach($sliders as $slider)
            <a href="">
                <div class="slide"><img src="{{$slider->img}}" alt="{{$slider->title}}"></div>
            </a>
        @endforeach
    </div>
</div>

