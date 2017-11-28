	$('#cerrar_session').click(function(){
			$.ajax({
				url: "cerrar-sesion",
				type: "POST",
				dataType:'json',
				success: function(result){
					if (result==true) {
						location.href = 'landing';
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
	$('#btn-productos').click(function(){
		$('#reg-productos').toggle();
		$('#list-productos').toggle();
	})
	// var btnProductos = document.getElementById('btn-productos')
	// var regProductos = document.getElementById('reg-productos')
	// var listProductos = document.getElementById('list-productos')


// $("#frmNewCat").submit(function(e) {
//     e.preventDefault();
//             dataJson = [];
//             $("input[name=data-newCat]").each(function(){
//                 structure = {};
//                 structure = $(this).val();
//                 dataJson.push(structure);
//             });
//             $.ajax({
//               url: "nueva-categoria",
//               type: "POST",
//                dataType:'json',
//                data: ({data: dataJson}),
//                success: function(result){
//                	if (result==true) {
//                		$("#frmNewCat").after('<div class="message">Registrado Existosamente</div>');
//                	   	$("input[name=data-newCat]").val(' ');
//                	   	window.location.reload();
//                	}else{
//                		$("#frmNewCat").after('<div class="message">'+result+'</div>');
//                	}
//                	setTimeout(function(){
//                                 $('div.message').remove();
//                               }, 2000);
//                },
//                error: function(result){
//                   console.log(result);
//                }
//             });
// });
