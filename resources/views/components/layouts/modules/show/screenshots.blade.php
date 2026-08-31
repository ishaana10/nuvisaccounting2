@props(['module'])

<div class="relative">
    <nuvisfinance-slider :screenshots="{{ json_encode($module->screenshots) }}" :arrow="true" :slider-view="5"></nuvisfinance-slider>
</div>
