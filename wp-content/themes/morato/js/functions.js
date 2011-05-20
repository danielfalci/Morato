$(document).ready(function() {			
	$('.wpsc_product_title').hover(function(){
		$(this).find('span').css('display','block');
	}, 
	function(){
		$(this).find('span').css('display','none');
  	});
  	
  	
  	$('.wp_bannerize').after('<div id="nav">').cycle({ 
	    fx:     'fade', 
	    speed:  'slow', 
	    timeout: 6000, 
	    pager:  '#nav', 
	    after:     function() {
            $('#bannerTitulo').html($(this).find('img').attr('alt'));
        }
	});
  	
  	$('.menu-item ').find("span").css("display","none");
  	
  	$('.menu-item ').hover(function(){
		$(this).find('span').css('display','block');
		$(this).find('.dobraPlacaMenu').css('display','none');
	}, 
	function(){
		$(this).find('span').css('display','none');
  	});
  	
  	$('.item_image').hover(function(){
		$(this).find('a span').css('display','block');
	}, 
	function(){
		$(this).find('span').css('display','none');
  	})
  	
  	
  	if ($('body').hasClass('blog')){
  	
	  	$('.status-publish').hover(function(){
			$(this).find('p, span, a').css('color','white');
	
		}, 
		function(){
			$(this).find('p').css('color','#1e1e1e');
			$(this).find('span, a').css('color','#585858');
			$(this).find('.more-link').css('color','#0066CC');
			$(this).find('.entry-utility').css('color','#888888');
	  	});
  	}
  	
  	//////////////// DENTRO DO POST
  	
  	if($('body').hasClass('single-post')){
  
	  	$('.post').hover(function(){
	  		$(this).css('background','none');
	  	});
	  	
	  	
	  	
	  	
  	}
  	
  	$(".post p a").fancybox({
  		'centerOnScroll'	: 'true',
    	'autoDimensions'	: 'true',
    	'autoScale'			: 'true',
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade'
  	});
  	
  	$(".comoCC").fancybox({
  		'centerOnScroll'	: 'true',
    	'autoDimensions'	: 'true',
    	'autoScale'			: 'true',
		'transitionIn'		: 'fade',
		'transitionOut'		: 'fade'
  	});
  	
});