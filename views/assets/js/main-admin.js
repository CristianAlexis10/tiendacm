if (document.getElementById('cerrar_session')) {
	$('#cerrar_session').click(function(){
			$.ajax({
				url: "cerrar_session",
				type: "POST",
				dataType:'json',
				success: function(result){
					if (result==true) {
						location.href = 'tienda';
					}
				}
			});
	});
}
