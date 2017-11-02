jQuery  (document).ready(function($) {

	$('#hamburger').click(function () {
      $(this).toggleClass('is-active');
        $('nav > ul').toggle('fast');
        $('header').toggleClass('fixedmobile');
    });
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
        
          $('.filters-block .widget h3').click(function(){
            $('.filters-block .widget').removeClass('active');
            $( this ).closest('.filters-block .widget').addClass('active');
        });

          $('.widget .test .close-filter').click(function(){
            $('.filters-block .widget').removeClass('active');
        });

                    $('.filters-block .remove').click(function(){
            $('.filters-block .widget').removeClass('active');
        });



	if (window.matchMedia("(min-width: 768px)").matches){

	$('.content-slider-wrapper').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  centerMode: true,
	  arrows: true,
	  fade: true,
	  vertical: false,
	  asNavFor: '.content-slider-nav',
      prevArrow: $('.slider-left'),
      nextArrow: $('.slider-right'),
      autoplay: true,
      autoplaySpeed: 4000,
	});

	$('.content-slider-nav').slick({
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  asNavFor: '.content-slider-wrapper',
	  focusOnSelect: true,
	  arrows: false,
	});

	$('.content-review_slider-container').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  prevArrow: $('.simple-arrow-left'),
      nextArrow: $('.simple-arrow-right'),
	  focusOnSelect: true,
	  arrows: true,
	  dots: false,
	});
	$('.catalog-slider_wrapper').slick({
	  slidesToShow: 2,
	  slidesToScroll: 2,
	  prevArrow: $('.slider-left'),
      nextArrow: $('.slider-right'),
	  focusOnSelect: true,
	  arrows: true,
	  dots: false,
	});
	
    };

    if (window.matchMedia("(max-width: 767px)").matches){

    	$('.content-slider-wrapper').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: true,
		  dots: true,
		  fade: true,
	      prevArrow: $('.slider-left'),
	      nextArrow: $('.slider-right'),

		});

		$('.content-services_item-wrapper').slick({
		  slidesToShow: 2,
		   rows: 2,
		  slidesToScroll: 1,
		  arrows: false,
		  dots: true,
		});

		$('.content-review_slider-container').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  focusOnSelect: true,
		  arrows: false,
		  dots: true,
		});

		$('.catalog-slider_wrapper').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  prevArrow: $('.slider-left'),
	      nextArrow: $('.slider-right'),
		  focusOnSelect: true,
		  arrows: true,
		  dots: false,
		});
		$('.content-our-clients_wrap .mobile-scroll').slick({
		  slidesToShow: 2,
		  slidesToScroll: 1,
		  variableWidth: true,
		  arrows: false,
		  dots: true,
		});
			/*	$('.content-also_wrapper .mobile-scroll').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  variableWidth: true,
		  rows: 1,
		  arrows: false,
		  dots: true,

		}); */

		    	$('.content-repair-select .home ul').insertAfter('.content-repair-select .home figure');
		    	$('.content-price_table > p').insertAfter('.catalog-calculator');
		    		$('.calc-button').click(function () {
        $('.catalog-calculator').toggle('fast');
    });

    };

	$('.switch').change(function(){
		$('.content-repair-block').toggle();
	});

	$("input[type='tel']").mask("+7(999)999-99-99");

	
});