$('.checkbox').click(function(){

	if($('input.checkbox').is(':checked')){

		$('.theme').attr('href', 'css/dark.css');

	}else{

		$('.theme').attr('href', 'css/light.css');

	}

})