jQuery( document ).ready(function( $ ) {
	$('.recent_slider').slick({
		autoplay: true,    
	    dots: true,
	    infinite: true,
	    speed: 300,
	    slidesToShow: 1,
	    slidesToScroll: 1
  	});

  	$('.regiones_slider').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});

	$('.deportes_slider').slick({
		autoplay: true,    
	    dots: true,
	    infinite: true,
	    speed: 300,
	    slidesToShow: 1,
	    slidesToScroll: 1
  	});

  	$('.opiniones_slider').slick({
	    dots: false,
	    infinite: true,
	    speed: 300,
	  	slidesToShow: 1,
	  	centerMode: false,
	  	variableWidth: true
	});

	$('.article_igallery_slider').slick({
	  // lazyLoad: 'ondemand',
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  centerMode: true,
	  focusOnSelect: true
	});

  	setTimeout(function(){
  		$('.slick-slider, .recent_slider, .regiones_slider, .opiniones_slider, .deportes_slider').css('opacity', '1');
  	}, 800);

  	// $(".fancybox").fancybox();
  	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: false,
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {},
			overlay: { locked: false },
			// thumbs	: {
			// 	width	: 100,
			// 	height	: 100
			// }
		}
	});

 //  	$.datepicker.setDefaults({
	//   showOn: "both",
	//   buttonImageOnly: true,
	//   buttonImage: "calendar.gif",
	//   buttonText: "Calendar"
	// });

  	console.debug('edit: ', $("#edit-field-date-und-0-value"));
	

	// Add articulo
	$("#edit-field-date-und-0-value").datepicker({
		inline: true
	});

	//#edit-field-type-und-0-value
	$("#edit-field-visited-und-0-value, #edit-field-approved-und-0-value, #edit-field-cancel-und-0-value").attr('disabled','disabled');
	$('#edit-title, #edit-field-description-und-0-value, #edit-field-title-und-0-value, #edit-field-title-und-0-value, #edit-field-atags-und-0-value, #edit-field-note-releated-1-und-0-value, #edit-field-note-releated-2-und-0-value, #edit-body-und-0-value').alphanum();

	// Add opinión
	$("#edit-field-opinion-date-und-0-value").datepicker({
		inline: true
	});
	$('#edit-field-opinion-summary-und-0-value, #edit-field-opinion-author-und-0-value, #edit-field-opinion-tags-und-0-value').alphanum();

	// Add efemeride
	$("#edit-field-date-efem-und-0-value").datepicker({
		inline: true
	});
	

	// Hide facebook comment from /add/articulo
	var url = window.location.href;
	if(url.indexOf("add/articulo") != -1 || url.indexOf("add/opinion")){ 
		// console.debug('facebook: ', $('#block-facebook-comments-block-fb-comments'));
		$('#block-facebook-comments-block-fb-comments').css('display','none');
	}

});
