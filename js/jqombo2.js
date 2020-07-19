$(function (){
	//Default values
	$.get('ajax2.php', {cod: 0}, function(data){$('#motivosCombo').html(data)}); // Carga Ciudad default

	$('#especialidad').change(function(){
		var cod = $('#especialidad').val(); //Captura COD del estado
		$.get('ajax2.php', {cod: cod}, function(data){$('#motivosCombo').html(data)});
	});
});