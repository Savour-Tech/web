@php
	
	

@endphp

<div class="rating-widget {{@$class}}">
    <span class="single-rating"><i class="fa {{ rating_star_class(1, $value) }}"></i></span>
    <span class="single-rating"><i class="fa {{ rating_star_class(2, $value) }}"></i></span>
    <span class="single-rating"><i class="fa {{ rating_star_class(3, $value) }}"></i></span>
    <span class="single-rating"><i class="fa {{ rating_star_class(4, $value) }}"></i></span>
    <span class="single-rating"><i class="fa {{ rating_star_class(5, $value) }}"></i></span>
</div>