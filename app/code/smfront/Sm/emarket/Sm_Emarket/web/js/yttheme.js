define( [ "jquery" ], function ( $ ) {
	$( document ).ready(function() {
		// Megamenu
		$('.sm_megamenu_menu > li > div').parent().addClass('parent-item');
		
		// Box full width
		var full_width = $('body').innerWidth();
		$('.full-content').css({'width':full_width});

		$( window ).resize(function() {
			var full_width = $('body').innerWidth();
			$('.full-content').css({'width':full_width});
		});
		
		// Fix hover on IOS
		$('body').bind('touchstart', function() {}); 
		
		
		// FIX LOI IE INDEX 10
		
		function fixWidth(){
			if($('.header-style-10').length && $('.home-page-10').length && full_width > 768){
				var header_width = $('.header-wrapper > .container').width();
				$('#maincontent').css({'width':header_width+60, 'display':'block'});
				$('.header-wrapper').css({'width':header_width+60, 'display':'block'});
			}
		}
		
		fixWidth();
		
		$( window ).resize(function() {
			fixWidth();
		});
	
		 
	});
	$( document ).ready(function() {
		$(".topbar-close").click(function(){
             $(".coupon-code").slideToggle();
         });
             $(".button").on('click',function(){
                if($('.button').hasClass('active')){
                    $('.button').removeClass('active');
                }else{
                    $('.button').removeClass('active');
                    $('.button').addClass('active');
            }
        });
        $(".button-header").click(function(){
			$(this).toggleClass("active").next().slideToggle("medium");
		});  
		$(".header-login").click(function(){
			$(".toplinks-wrapper").toggleClass("active").slideToggle("medium");
		});  
		// Drop Account
		$( ".my-accounts span" ).click(function() {
			$('ul.links').slideToggle(200);
			$(this).toggleClass('active');
		});	
			
	});
	$( document ).ready(function() {
				function scroll_to(div){
					$('html, body').animate({
						scrollTop: $(div).offset().top-80
					},800);
				}
				$(".list_diemneo ul li").each(function(){
					$(this).click(function(){
						$('.list_diemneo ul li').removeClass("active");
						$(this).addClass("active");
						var neoindext=$(this).index()+1;
						scroll_to(".title_neo"+neoindext);
						var neodiv = (".title_neo"+neoindext);
						console.log(neodiv);
						var x = $(neodiv).position();
						$(".custom-scoll").css("top",x.top);
						return true;
					});
				});
			});
		$( document ).ready(function() {
				var windowswidth = $(window).width();
				var containerwidth = $('.container').width();
				var widthcss = (windowswidth-containerwidth)/2-70;
				
				var rtl = jQuery( 'body' ).hasClass( 'rtl' );
				if( !rtl ) {
					jQuery(".custom-scoll").css("left",widthcss);
				}else{
					jQuery(".custom-scoll").css("right",widthcss);
				}
				var x = $(".title_neo3").position();
				
			});
	
// col left home 1

$( document ).ready(function() {
		 if($('#col-left').length) {
            $('.left-button').on('click', function(){
                if($('#col-left').hasClass('active')){
                    $(this).find('.overlay').fadeOut(250);
                    $('#col-left').removeClass('active');
                    $('body').removeClass('show-sidebar');
                } else {
                    $('#col-left').addClass('active');
                    $(this).find('.overlay').fadeIn();
                    $('body').addClass('show-sidebar');
                }
            });
        }

 });




});