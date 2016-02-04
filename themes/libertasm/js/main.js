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

	// Lista.
	// var service_url = '/node/47?alice_test';
	// $(".lista_content_see_more").click(function(){
	// 	console.debug('enter here alice!');
	// 	$.ajax({
 //            cache: false,
 //            data: '',
 //            dataType: 'json',
 //            type: 'post',
 //            success: function(data) {
 //                if (data.status == 'ok') {
 //                    // $('#sxc_email_review').text($sxc_email.val());
 //                    // $('.first-step').fadeOut(300, function() {
 //                    //     $('.second-step').removeClass('hidden').hide().fadeIn();
 //                    // });
	// 				alert('alice!');
 //                } else {
 //                    // $('#sxc_send').removeAttr(disabled).animate({
 //                    //     opacity: '1'
 //                    // });
 //                    alert(data.message);
 //                }
 //            },
 //            url: service_url
 //        });
	// });

});
