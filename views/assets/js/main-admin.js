	$('#cerrar_session').click(function(){
			$.ajax({
				url: "cerrar-sesion",
				type: "POST",
				dataType:'json',
				success: function(result){
					if (result==true) {
						location.href = 'tienda';
					}
				}
			});
	});
