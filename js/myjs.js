$(document).ready(function() {
         
		 function parallaxScroll(){
			var scrolled = $(window).scrollTop();
			$('#parallax-bg1').css('top',(0-(scrolled*.25))+'px');
			$('#parallax-bg2').css('top',(0-(scrolled*.5))+'px');
			$('#parallax-bg3').css('top',(0-(scrolled*.75))+'px');
		}
		 
		$('.abbout').click(function(){
			$('html, body').animate({
				scrollTop:$('#about').offset().top-70
			}, 1000, function() {
				parallaxScroll(); // Callback is required for iOS
			});
			$('.active').removeClass('active');
			$(this).parent().addClass("active");
			return false;
		});
		
		$('.tteam').click(function(){
			$('html, body').animate({
				scrollTop:$('#team').offset().top-70
			}, 1000, function() {
				parallaxScroll(); // Callback is required for iOS
			});
			$('.active').removeClass('active');
			$(this).parent().addClass("active");
			return false;
		});
		
		
		$('.ccompanies').click(function(){
			$('html, body').animate({
				scrollTop:$('#companies').offset().top-70
			}, 1000, function() {
				parallaxScroll(); // Callback is required for iOS
			});
			$('.active').removeClass('active');
			$(this).parent().addClass("active");
			return false;
		});
		
		
		$('.ccontact').click(function(){
			$('html, body').animate({
				scrollTop:$('#contact').offset().top-70
			}, 1000, function() {
				parallaxScroll(); // Callback is required for iOS
			});
			$('.active').removeClass('active');
			$(this).parent().addClass("active");
			return false;
		});
		 
	});