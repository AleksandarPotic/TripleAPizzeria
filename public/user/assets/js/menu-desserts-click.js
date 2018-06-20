$(document).ready(function(){
	$('#icecream').addClass('active');
	$('#icecreams').css('display','block');

	$('#icecream').click(function(){
		$(this).addClass('active');
		$('#milk').removeClass('active');
		$('#ben').removeClass('active');
		$('#mobilebutton').removeClass('active');
		$('#icecreams').css('display','block');
		$('#bens').css('display','none');
		$('#milkshakes').css('display','none');
		$('#haagens').css('display','none');
	});

	$('#milk').click(function(){
		$(this).addClass('active');
		$('#icecream').removeClass('active');
		$('#ben').removeClass('active');
		$('#mobilebutton').removeClass('active');
		$('#milkshakes').css('display','block');
		$('#bens').css('display','none');
		$('#icecreams').css('display','none');
		$('#haagens').css('display','none');
	});

	$('#ben').click(function(){
		$(this).addClass('active');
		$('#icecream').removeClass('active');
		$('#milk').removeClass('active');
		$('#mobilebutton').removeClass('active');
		$('#bens').css('display','block');
		$('#icecreams').css('display','none');
		$('#milkshakes').css('display','none');
		$('#haagens').css('display','none');
	});

	$('#mobilebutton').click(function(){
		$(this).addClass('active');
		$('#icecream').removeClass('active');
		$('#ben').removeClass('active');
		$('#milk').removeClass('active');
		$('#haagens').css('display','block');
		$('#bens').css('display','none');
		$('#milkshakes').css('display','none');
		$('#icecreams').css('display','none');
	});
});