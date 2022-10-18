/*--------------------- Copyright (c) 2020 -----------------------
[Master Javascript]
Project: Multifarious Services - Responsive HTML Template 
Version: 1.0.0
Assigned to: Theme Forest
-------------------------------------------------------------------*/
(function ($) {
	"use strict";
	/*-----------------------------------------------------
		Function  Start
	-----------------------------------------------------*/
		var Multifarious = {
			initialised: false,
			version:1.0,
			mobile: false,
			init: function () {
				if (!this.initialised) {
					this.initialised = true;
				} else {
					return;
				}
				/*-----------------------------------------------------
					Function Calling
				-----------------------------------------------------*/
				this.preLoader();
				this.wowAnimation();
				this.navMenu();
				this.counter();
				this.topButton();
				this.csTestimonial();
				this.csChoose_slider();
				this.cserviceBanner();
				this.ScrollTop();
			},

			/*-----------------------------------------------------
				Fix Preloader
			-----------------------------------------------------*/
			preLoader: function () {
				$(window).on('load', function () {
					$(".preloader_wrapper").removeClass('preloader_active');
				});
				jQuery(window).on('load', function () {
					setTimeout(function () {
						jQuery('.preloader_open').addClass('loaded');
					}, 100);
				});
			},

			/*-----------------------------------------------------
         Fixed Header
      -----------------------------------------------------*/
        ScrollTop: function(){
                if($('.fixed_header').length > 0){
                    $(window).scroll(function() {  
                    var scroll = $(window).scrollTop();

                    if (scroll >= 50) {
                    $(".fixed_header").addClass("fixed");
                    }
                    else
                    {
                      $(".fixed_header").removeClass("fixed");
                    }
                  
                  });
                }
              },

			/*-----------------------------------------------------
				Fix Animation 
			-----------------------------------------------------*/
			wowAnimation: function () {
				new WOW().init();
			},

			/*-----------------------------------------------------
				Fix Mobile Menu 
			-----------------------------------------------------*/
			navMenu: function () {
				var w = window.innerWidth;
				if (w <= 991) {
					$(".main_menu_wrapper>ul li").on('click', function () {
						$(this).find('ul.sub_menu').slideToggle();
						$(this).toggleClass("open");
					});
					$(".main_menu_wrapper>ul").on('click', function () {
						event.stopPropagation();
					});
					$(".menu_btn").on('click', function (e) {
						event.stopPropagation();
						$(".main_menu_wrapper, .menu_btn_wrap").toggleClass("open");
					});
					$("body").on('click', function () {
						$(".main_menu_wrapper, .menu_btn_wrap").removeClass("open");
					});
				}
			},
			/*-----------------------------------------------------
				Fix Counter
			-----------------------------------------------------*/
			counter: function () {
				if($('.counter_holder').length > 0){
					var a = 0;
					$(window).scroll(function() {
						var topScroll = $('.counter_holder').offset().top - window.innerHeight;
						if (a == 0 && $(window).scrollTop() > topScroll) {
						$('.count_no').each(function() {
							var $this = $(this),
							countTo = $this.attr('data-count');
							$({
							countNum: $this.text()
							}).animate({
								countNum: countTo
							},
							{
							duration: 5000,
							easing: 'swing',
							step: function() {
								$this.text(Math.floor(this.countNum));
							},
							complete: function() {
								$this.text(this.countNum);
							}
							});
						});
						a = 1;
						}
					});
				};
			},

			/*-----------------------------------------------------
				Fix GoToTopButton
			-----------------------------------------------------*/
			topButton: function () {
				var scrollTop = $("#scroll");
				$(window).on('scroll', function () {
					if ($(this).scrollTop() < 500) {
						scrollTop.removeClass("active");
					} else {
						scrollTop.addClass("active");
					}
				});
				$('#scroll').click(function () {
					$("html, body").animate({
						scrollTop: 0
					}, 2000);
					return false;
				});

				$(function() {
					$('.go_to_demo').click (function() {
						$('html, body').animate({scrollTop: $('#go_to_demo').offset().top }, 'slow');
						return false;
					});
				});
			},

			/*-----------------------------------------------------
				Courier Service Testimonial Slider 
			-----------------------------------------------------*/
			csTestimonial: function () {
				var swiper = new Swiper('.cs_testimonial_wrapper .swiper-container', {
			      spaceBetween: 30,
			      centeredSlides: true,
			      speed: 800,
			      loop: true,
			      autoplay: {
			        delay: 2500,
			        disableOnInteraction: false,
			      },
			      navigation: {
			        nextEl: '.swiper-button-next',
			        prevEl: '.swiper-button-prev',
			      },
			    });
			},
			/*-----------------------------------------------------
				Courier Service People Choose Slider 
			-----------------------------------------------------*/
			csChoose_slider: function () {
				var swiper = new Swiper('.cs_people_choose_slider .swiper-container', {
				  spaceBetween: 30,
				  centeredSlides: true,
				  loop: true,
				  effect: 'fade',
				  speed: 800,
				  autoplay: {
				    delay: 2500,
				    disableOnInteraction: false,
				  },
				   fadeEffect: {
				crossFade: true
				  },
				  navigation: {
				    nextEl: '.swiper-button-next',
				    prevEl: '.swiper-button-prev',
				  },
				});
			},
			/*-----------------------------------------------------
				cservices Banner Slider 
			-----------------------------------------------------*/
			cserviceBanner: function () {
				var bannerSwiper = new Swiper('.cs_banner_slider_wrapper .swiper-container', {
					autoHeight: false,
					autoplay: true,
					loop: true,
					spaceBetween: 0,
					centeredSlides: false,
					speed: 2000,
					autoplay: {
						delay: 3000,
					},
					keyboard: {
						enabled: true,
					},
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
					},
					pagination: {
						el: '.pagination',
						clickable: true,
					},
				});
			},
			

		};

		Multifarious.init();

})(jQuery);

/*-----------------------------------------------------
	Fix Contact Form Submission
-----------------------------------------------------*/
// Contact Form Submission
function checkRequire(formId , targetResp){
    targetResp.html('');
    var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
    var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
    var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
    var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
    var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
    var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
    var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
    var check = 0;
    $('#er_msg').remove();
    var target = (typeof formId == 'object')? $(formId):$('#'+formId);
    target.find('input , textarea , select').each(function(){
        if($(this).hasClass('require')){
            if($(this).val().trim() == ''){
                check = 1;
                $(this).focus();
                $(this).parent('div').addClass('form_error');
                targetResp.html('You missed out some fields.');
                $(this).addClass('error');
                return false;
            }else{
                $(this).removeClass('error');
                $(this).parent('div').removeClass('form_error');
            }
        }
        if($(this).val().trim() != ''){
            var valid = $(this).attr('data-valid');
            if(typeof valid != 'undefined'){
                if(!eval(valid).test($(this).val().trim())){
                    $(this).addClass('error');
                    $(this).focus();
                    check = 1;
                    targetResp.html($(this).attr('data-error'));
                    return false;
                }else{
                    $(this).removeClass('error');
                }
            }
        }
    });
    return check;
}
$(".submitForm").on('click', function() {
    var _this = $(this);
    var targetForm = _this.closest('form');
    var errroTarget = targetForm.find('.response');
    var check = checkRequire(targetForm , errroTarget);
    
    if(check == 0){
       var formDetail = new FormData(targetForm[0]);
        formDetail.append('form_type' , _this.attr('form-type'));
        $.ajax({
            method : 'post',
            url : 'ajaxmail.php',
            data:formDetail,
            cache:false,
            contentType: false,
            processData: false
        }).done(function(resp){
            console.log(resp);
            if(resp == 1){
                targetForm.find('input').val('');
                targetForm.find('textarea').val('');
                errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
            }else{
                errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
            }
        });
    }
});
