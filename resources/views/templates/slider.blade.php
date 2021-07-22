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
        <?php foreach ($slider as $slide):?>
        <a href="/anime/<?=$helper::renderUrl($slide['id'], $slide['alias'])?>" >  <div class="slide"><img src="<?=$slide['img']?>"> </div></a>
        <?php endforeach; ?>
    </div>
</div>

