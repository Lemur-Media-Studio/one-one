		var visible = 1;
	
		function intercambia() {
					
			if(visible) { visible = 0; $('#loader').css({opacity:0}); }
			else { visible = 1; $('#loader').css({opacity:1}); }
		}
				
		var intervalID = setInterval(intercambia, 200);
	
		jQuery(document).ready(function() {			

			var ventana_ancho = $(window).width();
			menuOpen = false;

			jQuery('#slick_home').slick({ autoplay: true, autoplaySpeed: 5000, arrows: false, dots: true, pauseOnHover: false, fade: true, cssEase: 'linear' });
			 
			if(ventana_ancho>900)  $('#slick_organizations').slick( { slidesToShow: 3, slidesToScroll: 1, autoplay: true, autoplaySpeed: 4000, arrows: false, dots: false  });
			else $('#slick_organizations').slick( { slidesToShow: 2, slidesToScroll: 1, autoplay: true, autoplaySpeed: 4000, dots:false, arrows: true });

			jQuery('#slick_suppliers').slick({ autoplay: true, autoplaySpeed: 5000, arrows: true, dots: false, pauseOnHover: false });
			
			jQuery(".menu").click(function(e) {
	
	  			e.preventDefault();
	  			jQuery(".nav").fadeIn(200); 
	  			jQuery(".social").fadeIn(200); 
	  			jQuery(".menu").hide(); 
		  		jQuery(".close").show();
		  		menuOpen = true; 
	
			});		

			jQuery(".close").click(function(e) {
	
	  			e.preventDefault();
	  			jQuery(".nav").hide(); 
	  			jQuery(".social").hide(); 
	  			jQuery(".menu").show(); 
		  		jQuery(".close").hide();
		  		menuOpen = false;
	
			});		

		jQuery(".scroll").click(function(event){
			
			event.preventDefault();
			var full_url = this.href;
			var parts = full_url.split("#");
			var trgt = parts[1];
			var target_offset = $("#"+trgt).offset();
			var target_top = target_offset.top - 90;
			jQuery('html, body').animate({scrollTop:target_top}, 500);
				
			if(ventana_ancho<900) {
	  			jQuery(".nav").hide(); 
	  			jQuery(".social").hide(); 
	  			jQuery(".menu").show(); 
		  		jQuery(".close").hide();; 
		  		menuOpen = false;
			}
						
		});

	
		});

		jQuery(window).load(function(){ 

			$(".pre-load-web").fadeOut(300,function() { $(this).remove(); });
			$('.header').addClass( 'fadeInDown animated'); 
			$('.home_titulo').addClass( 'fadeInRight animated'); 
			
		})	
