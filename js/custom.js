$j = jQuery.noConflict();		
		$j( document ).ready(function() {	
				$j('.form-submit input#submit').addClass('btn');
				
				if ($j.browser.msie && $j.browser.version == 10) {
				  	$j("html").addClass("ie10");
				}
				
				
				var $mobileMenuButton = $j('.menu-button'), $mobileMenu = $j('.mobile-nav-menu'), $alreadyOpen = true;

			    if ($mobileMenu.length > 0) {
			
			        $mobileMenuButton.on('click', this, function (e) {
			            e.preventDefault();
			
			            $mobileMenuButton.toggleClass('open');
			
			            $alreadyOpen = false;
			            $mobileMenu.slideToggle(200, function () {
			
			            });
			
			        });
			    }
			    
			    
			    

/*
	// Add a class to the header once scrolled down, so we can shrink the header.
    $j(window).on('scroll', function() {
        var scrollY = $j(this).scrollTop();
        if (scrollY > 5) {
            $j('#header').addClass('shrink');
            $j('.logo,.logo2').css('display','none');
            $j('.shrink-logo1,.shrink-logo2').css('display','inline');
            $j('.shrink-logo1').addClass('span3');
            $j('.shrink-logo2').addClass('span2');
            
        } else {
            $j('#header.shrink').removeClass('shrink');
            $j('.logo,.logo2').css('display','inline');
            $j('.shrink-logo1,.shrink-logo2').css('display','none');
            $j('.shrink-logo1').removeClass('span3');
			$j('.shrink-logo2').removeClass('span2');
        }
	});
*/
 /*
 
        // Find out which section is closest to the top of the screen
        // and give its nav link an active state.
        var $closestElem,
            closestDist,
            $menuItems = $j('#menu-main-menu .menu-item a');

        // Loop through each section and compare how close it is to the top.
        // Once we find an element further away than the previous one then we can stop, as we've found it
        $j('div[id], .banner').each(function() {
            var dist = Math.abs(($j(window).scrollTop() + $j('#header').height()) - $j(this).offset().top);
            if (!$closestElem || dist < closestDist) {
                $closestElem = $j(this);
                closestDist = dist;
            } else {
                // Previous elem is the closest element that has a nav item.
                return false;
            }
        });

        var id = $closestElem.attr('id');

        $menuItems.removeClass('active').filter('[href="/#'+id+'"]').addClass('active');

    });
	
*/
	
	//var stickyOffset = $j('.header-wrapper').offset().top;
	$j(window).scroll(function(){
	  var sticky = $j('.header-wrapper'),
	      scroll = $j(window).scrollTop();
	  if (scroll >= 50){
	  		sticky.addClass('fixed');
	  } else {
	  	sticky.removeClass('fixed');
		}	
	});
	
	// Resposnive Breakpoint where mobile menu needs to show
	if (window.matchMedia("(max-width: 979px)").matches) {
		$j('.logo').addClass('mobile-mainlogo');
		$j('.logo2').addClass('mobile-secondlogo');
	} else {
	
	}
	
	
	// Single page
	$j('.single-blog-content, #about-contents').append('<div class="vertical-border-single"></div>');	
	
	//back to top scroll function. Any link with a hash (#) will scroll to that id on the page
	$j('a[href*=#]').click(function() {
	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var $target = $j(this.hash);
			$target = $target.length && $target || $j('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				targetOffset = targetOffset - 35;
				
				$j('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
	});
	
	$j('#main-nav ul li.menu-item-277 a').click(function(){
		$j(this).css('color','#d51067');	
	});
	    
	// Apply CTA
	  $j('.cta-1 .vc_cta3-container').click(function() {
	  		$j('.cta-1 .layer .first-layer').toggle(300);
	  });
	  
	  
	  // Volunteer CTA
	  $j('.cta-2 .vc_cta3-container').click(function() {
	  		$j('.cta-2 .layer .first-layer').toggle(300);
	  });
	  
	  	  
	  
	  // Bus CTA
	  $j('.cta-3 .vc_cta3-container').click(function() {
	  		$j('.cta-3 .layer .first-layer').toggle(300);
	  });
		
	  	
	  	
	  	// Initiall resources boxes; Currently it sets 9
	  	
	  	size_li = $j(".main-blog-listing .white-panel").size();
	    x=9;
	    $j('.main-blog-listing .white-panel:lt('+x+')').show(500, function(){
		    $j('#resources-loading').isotope({
			  itemSelector: '.white-panel',
			  percentPosition: true,
			  masonry: {
			  	columnWidth: '.white-panel'
	  			}
			});

	    });
	    
	    // if total is less than current set
	        if (size_li  < x){
		        $j('#loadMore').fadeOut(500);
	        }
	    
	    // Load more will add further 3.
	    
	    $j('#loadMore').click(function () {
	        x= (x+3 <= size_li) ? x+3 : size_li;
	        
	        $j('.main-blog-listing .white-panel:lt('+x+')').show(500, function(){
		        $j('#resources-loading').isotope({
				  itemSelector: '.white-panel',
				  percentPosition: true,
				  masonry: {
				  	columnWidth: '.white-panel'
		  			}
				});
	        });
	        
	        // reaches full
	        if (x == size_li){
		        $j('#loadMore').fadeOut(500);
	        }
	        // if total is less than current set
	        if (size_li  < x){
		        $j('#loadMore').fadeOut(500);
	        }

	  	});
	  
	  
	  
	  	  
/*
	  
	  $j('.main-blog-listing-parent').on('click', '#pagination a', function(e){
        e.preventDefault();
        var link = $j(this).attr('href');
        var ajax_image = "<img src='http://startupbritain.org/wp-content/uploads/2016/01/rolling.svg' alt='Loading...' class='aligncenter'/>";
		
		//$j("body").css({ opacity: 0.5 });
		$j('.main-blog-listing-parent').html(ajax_image);
        $j('.main-blog-listing-parent').fadeIn(500, function(){
	        
	        
            $j(this).load(link + ' .main-blog-listing-parent', function() {
	            //$j("body").css({ opacity: 1.0 });
	            $j('#resources-loading').isotope({
		            isInitLayout: true,
		            itemSelector: '.white-panel'
	            });	            
            });
        });
    });
*/
    
/*
    
    $j('.resources-sidebar').on('click', '.textwidget a', function(e){
        e.preventDefault();
        var link = $j(this).attr('href');
        var ajax_image = "<img src='http://startupbritain.org/wp-content/uploads/2016/01/rolling.svg' alt='Loading...' class='aligncenter'/>";
		
		$j(".resources-sidebar .textwidget a").css({ 'display': 'none' });
		$j('.main-blog-listing-parent').html(ajax_image);
        $j('.main-blog-listing-parent').fadeIn(500, function(){
            $j(this).load(link + ' .main-blog-listing-parent', function() {
	            
	            $j('#resources-loading').isotope('destroy');  
	            $j('#resources-loading').isotope('layout');           
            });
        });
    });
    
*/	
	
	// when show all resoruces link clicked.
	
	$j('.resources-sidebar').on('click', '.textwidget a', function(e){
		var link = $j(this).attr('href');
        var ajax_image = "<img src='http://startupbritain.org/wp-content/uploads/2016/01/rolling.svg' alt='Loading...' class='aligncenter'/>";
		$j(".resources-sidebar .textwidget .back-url").fadeOut(500);
		$j('.main-blog-listing-parent').html(ajax_image);
        $j('.main-blog-listing-parent').fadeIn(500, function(){
            $j(this).load(link + ' .main-blog-listing-parent', function() {
            });
        });
    });
    
    
    
    // When category/taxonomy of resources are clicked
    
    $j('.resources-sidebar').on('click', '.widget_categories ul li a', function(e){
        e.preventDefault();
        var link = $j(this).attr('href');
        var ajax_image = "<img src='http://startupbritain.org/wp-content/uploads/2016/01/rolling.svg' alt='Loading...' class='aligncenter'/>";
		
		$j('.resources-sidebar .widget_categories ul li').removeClass('highlight');
		$j(this).parent().addClass('highlight');
		
		$j(".resources-sidebar .textwidget .back-url").fadeIn(500);
		$j('.main-blog-listing').html(ajax_image);
        $j('.main-blog-listing').fadeIn(500, function(){
            $j(this).load(link + ' .main-blog-listing', function() {
	            	$j('.main-blog-listing .white-panel').css({'display':'block'});
	            	$j('#resources-loading').isotope(); 
	            	
	            	size_li = $j(".main-blog-listing .white-panel").size();
	            	
	            	if (x == size_li){
						$j('#loadMore').fadeOut(500);
					}

	            	if (size_li < x){
						$j('#loadMore').fadeOut(500);
	        		}             
            });
        });
    });
    
    
    
    
    
});