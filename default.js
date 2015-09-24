$(document).ready(function() {
	/*
	$('.dial').animate({borderSpacing: -45}, {
		step: function(now,fx) {
			$(this).css('-webkit-transform','rotate('+now+'deg)');
			$(this).css('-moz-transform','rotate('+now+'deg)');
			$(this).css('transform','rotate('+now+'deg)');
		},
		duration:'slow'
	},'linear');
	*/

	$('.dial').rotate({animateTo:-45});

	$('.s1').mouseover(function(){
		$('.logo').attr('src','image/logoEnTo.png');
	}).mouseout(function(){
		$('.logo').attr('src','image/logoEn.png');
	});

	$('.s2').mouseover(function(){
		$('.dial').rotate({animateTo:45});
		$('.arrow2').addClass('blue');
		$('.arrow_pointer2').addClass('blue');
		$('.require').attr('src','image/requireToEn.png');
	}).mouseout(function(){
		$('.arrow2').removeClass('blue');
		$('.arrow_pointer2').removeClass('blue');
		$('.require').attr('src','image/requireEn.png');
	});

	$('.s3').mouseover(function(){
		$('.dial').rotate({animateTo:225});
		$('.arrow3').addClass('green');
		$('.arrow_pointer3').addClass('green');
		$('.service').attr('src','image/serviceToEn.png');
	}).mouseout(function(){
		$('.arrow3').removeClass('green');
		$('.arrow_pointer3').removeClass('green');
		$('.service').attr('src','image/serviceEn.png');
	});

	$('.s4').mouseover(function(){
		$('.dial').rotate({animateTo:135});
		$('.arrow4').addClass('yellow');
		$('.arrow_pointer4').addClass('yellow');
		$('.tip').attr('src','image/tipToEn.png');
	}).mouseout(function(){
		$('.arrow4').removeClass('yellow');
		$('.arrow_pointer4').removeClass('yellow');
		$('.tip').attr('src','image/tipEn.png');
	});


	$('.home').click(function(){
		$('html, body').animate({
			scrollTop: 0
		}, 2000);
	});

	$('.require').click(function(){
		$('html, body').animate({
			scrollTop: $("#page2").offset().top - 20
		}, 2000);
	});

	$('.service').click(function(){
		$('html, body').animate({
			scrollTop: $("#page3").offset().top
		}, 2000);
	});

	$('.tip').click(function(){
		$('html, body').animate({
			scrollTop: $("#page4").offset().top
		}, 2000);
	});

	$('.home').mouseover(function(){
		$('.h').addClass('h_h');
	}).mouseout(function(){
		$('.h').removeClass('h_h');
	});

	$('.require').mouseover(function(){
		$('.r').addClass('r_h');
	}).mouseout(function(){
		$('.r').removeClass('r_h');
	});

	$('.service').mouseover(function(){
		$('.s').addClass('s_h');
	}).mouseout(function(){
		$('.s').removeClass('s_h');
	});

	$('.tip').mouseover(function(){
		$('.t').addClass('t_h');
	}).mouseout(function(){
		$('.t').removeClass('t_h');
	});

	$(window).scroll(function() {
		var top = $(document).scrollTop();			// document top when scrolled
		var border = $('#page2').offset().top-30;

		if(top >= border ){
			$('aside').fadeIn();
		}else{
			$('aside').fadeOut();
		}
	});

	/* tooltip */
	$('.pop').each(function() {
		$(this).on('focusin', function() {
			$(this).next().show();
		}).on('focusout', function() {
			$(this).next().hide();
		});
	});
});

