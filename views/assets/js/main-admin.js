	$('#cerrar_session').click(function(){
			$.ajax({
				url: "cerrar-sesion",
				type: "POST",
				dataType:'json',
				success: function(result){
					if (result==true) {
						location.href = 'inicio';
					}
				}
			});
	});
	//modales dashboard
if (document.getElementById('add_categoria')) {
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

}





$(document).ready(function(){
    $('.datatable').DataTable();
});



$("#frmCT").submit(function(e) {
    e.preventDefault();
    color = [];
    talla = [];

    $("input[name=color]").each(function(){
        if ($(this).prop("checked")) {
            color.push($(this).val());
        }
    });
    $("input[name=talla]").each(function(){
        if ($(this).prop("checked")) {
            talla.push($(this).val());
        }
    });



$.ajax({
              url: "guardar-color-producto-talla",
              type: "POST",
               dataType:'json',
               data: ({colores: color , tallas: talla}),
               success: function(result){

   		 // console.log(result);
                 if (result==true) {
                   location.href = 'gestion-producto';
                    return;
                 }else{
	                  $('#frmCT').after('<div class="message-red">'+result+'</div>');
	                  setTimeout(function(){
	                     $('div.message-red').remove();
	                   }, 2000);

                 }
               },
               error: function(result){
                  console.log(result);
               }
            });

});



//eliminar
 function confirmDelete(value){
         var ya = false;
    	if(confirm('¿Eliminar este registro?')){
            $.ajax({
    	      url: 'eliminar-producto',
    	      type:'post',
    	      dataType:'json',
    	      data:'data='+value,
    	  }).done(function(response){
              console.log(response);
              if (response==true) {
              	location.reload();
              }else{
	              $("#list-productos").after("<div class='message'>"+response+"</div>");
	              setTimeout(function(){
	                 $('div.message').remove();
	               }, 2000);
              }
    	  });
    		return true;
    	}else{
    		return false;
    	}
    }

//TALLAS  Y MARCAS
$("#update-tallas").submit(function(e) {
    e.preventDefault();
    color = [];
    talla = [];
	col = false;
	tal = false;
    $("input[name=color]").each(function(){
        if ($(this).prop("checked")) {
            color.push($(this).val());
			col = true;
        }
    });
    $("input[name=talla]").each(function(){
        if ($(this).prop("checked")) {
            talla.push($(this).val());
			tal = true;
        }
    });
if (col==false) {
	$('#update-tallas').after('<div class="message-red">Seleccione al menos una color</div>');
    setTimeout(function(){
  	 $('div.message-red').remove();
     }, 2000);
	 return;
}
if (tal==false) {
	$('#update-tallas').after('<div class="message-red">Seleccione al menos una talla</div>');
    setTimeout(function(){
  	 $('div.message-red').remove();
     }, 2000);
	  return;
}
$.ajax({
              url: "modificar-color-producto-talla",
              type: "POST",
               dataType:'json',
               data: ({colores: color , tallas: talla}),
               success: function(result){

   		 // console.log(result);
                 if (result==true) {
                   location.href = 'gestion-producto';
                    return;
                 }else{
	                  $('#update-tallas').after('<div class="message-red">'+result+'</div>');
	                  setTimeout(function(){
	                     $('div.message-red').remove();
	                   }, 2000);

                 }
               },
               error: function(result){
                  console.log(result);
               }
            });

});














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
