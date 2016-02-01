$j = jQuery.noConflict();		
$j( document ).ready(function() {					
		
	// Version 1.3.3
	$j(".owl-carousel-twitter").owlCarousel({
		items: 3,
		loop: true,
		autoPlay:true,
		navigation:true,
		navigationText:["<i class='fa fa-arrow-circle-o-left'></i>","<i class='fa fa-arrow-circle-o-right'></i>"],
		pagination:false,
		responsive: true,
		stopOnHover : true,
		lazyLoad : true,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1]
	});			
});