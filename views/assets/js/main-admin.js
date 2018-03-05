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
		$('#add_categoria').click(function() {
			$('#background').toggle();
			$('#reg_categoria').toggle();
		});
		$('#modalCategoryCancel').click(function() {
			$('#background').toggle();
			$('#reg_categoria').toggle();
		});
	}
//modal registro de videos
var addVideo = document.getElementById('addVideo');
var wrapModalVideo = document.getElementById('wrapModalVideo');
var fondoModalVideo = document.getElementById('fondoModalVideo');

$('#addVideo').click(function() {
	$('#fondoModalVideo').toggle();
	$('#wrapModalVideo').toggle();
})
$('#cancelarVideo').click(function() {
	$('#fondoModalVideo').toggle();
	$('#wrapModalVideo').toggle();
})

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
var nada= 1;
//controles videos dashboard
// $("#id0").attr("autoplay",true);
// $('video').trigger('play');
// setTimeout(function(){
// 	//
//
//
// },3000);
$(".play").css("display","block");
$(".stop").css("display","none");
$(".btnPlay").click(function() {
	//comensar
	var Padrevideo = $(this).siblings()[0];
	var video = $(Padrevideo).children()[0].id;
	$('#'+video).trigger('play');
	// ocultar boton
	var play = $(this).children()[0].id;
	var padreStop = $(this).siblings()[4];
	var stop = $(padreStop).children()[0].id;
	$("#"+play).css("display","none");
	$("#"+stop).css("display","block");
});


$(".btnStop").click(function() {
	var Padrevideo = $(this).siblings()[0];
	var video = $(Padrevideo).children()[0].id;
	$('#'+video).trigger('pause');
	// ocultar boton
	var stop = $(this).children()[0].id;
	var padreStop = $(this).siblings()[4];
	var play = $(padreStop).children()[0].id;
	$("#"+play).css("display","block");
	$("#"+stop).css("display","none");
});
// $(".btnPlay").click(function() {
// 	if (video.paused) {
// 		video.play();
//
// 	}else{
// 		video.pause();
// 		$(".fa-play").css("display","block");
// 		$(".fa-pause").css("display","none");
// 	}
// });
// $(".btnFull").click(function() {
// 	if (video.webkitRequestFullscreen) {
// 		video.webkitRequestFullscreen ();
// 	}
// });
//subir videos
$("#formuploadajax").submit(function(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    //agregar mas a la variable $_POST
    // formData.append("nada", "valor");
      $.ajax({
            url: "subir-video",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $("#formuploadajax").after("<div class='message'>subiendo...</div>");
            },
            success:function(result){
							if (result==true) {
										$("div.message").remove();
										$("#formuploadajax").after("<div class='message'>Subido Exitosamente</div>");
										setTimeout(function(){
											$("div.message").remove();
											$("#fondoModalVideo").toggle();
											$("#wrapModalVideo").toggle();
											$("#formuploadajax")[0].reset();
											location.reload();
										},3000);
							}else{
								$("div.message").remove();
								console.log(result);
								$("#formuploadajax").after("<div class='message'>Respuesta: " + result+"</div>");
								setTimeout(function(){$("div.message").remove();},2000);
							}
            },
            error:function(result){
              console.log(result);
            }
      });
  });


//modal actualizacion de categoria

$(".updateCatBtn").click(function() {
	$(".modalUpdateCategory").toggle();
});
$(".modalUpdateCategoryBtnC").click(function() {
	$(".modalUpdateCategory").toggle();
})
