$(document).ready(function(){

		$('#chips').addClass('active');
		$('#chipss').css('display','block');

		$('#chips').click(function(){
			$(this).addClass('active');
			$('#chocolate').removeClass('active');
			$('#chipss').css('display','block');
			$('#bars').css('display','none');

		});

		$('#chocolate').click(function(){
			$(this).addClass('active');
			$('#chips').removeClass('active');
			$('#bars').css('display','block');
			$('#chipss').css('display','none');

		});

	});