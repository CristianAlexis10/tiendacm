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
	//modales dashboard
	var fondo = document.getElementById('fondo');
	var add_categoria = document.getElementById('add_categoria');
	var categoria = document.getElementById('reg_categoria');

	add_categoria.onclick = function() {
		fondo.style.display = "inherit";
		categoria.style.display = "inherit";
	}
	fondo.onclick = function() {
		fondo.style.display = "none";
		categoria.style.display = "none";
	}
