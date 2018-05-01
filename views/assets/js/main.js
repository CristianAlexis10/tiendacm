//modal cart
if (document.getElementById("accordion")) {
	$( "#accordion" ).accordion();
	$('.datatable').DataTable();
}
function datosEnvio(){
	$.ajax({
		url:"cantidad-items",
		type:"post",
		dataType:"json",
		success:function(result){
			if (result>=1) {
				$('#wrapCart').toggle();
				$('#fondoModalCart').toggle();
			}else{
				alert("Selecciona  al menos un producto");
			}
		},
		error:function(result){
			console.log(result);
		}
	});

}
//validar correo
  $('#iniciar_se').attr('disabled',true);
$('#login-pass').focus(function(){
    var value = $('#login-email').val();
    if (value!='') {
	    $.ajax({
	      url: 'validar_correo',
	      type:'post',
	      dataType:'json',
	      data:'data='+value,
	  }).done(function(response){
       if(response==true) {
		    $(".message").remove();
		    $('#iniciar_se').attr('disabled',false);
	     }else{
	     	$(".message").remove();
		// $("#login-email").after("<div class='message'>Correo no valido</div>");
		$(".caja_contra").after("<div class='message'>Correo no valido</div>");
		$('#iniciar_se').attr('disabled',true);
	     }

	  });
    }else{
    	$(".message").remove();
    }
});
//login
$("#formulario-login").submit(function(e) {
    e.preventDefault();
            dataJson = [];
            $("input[name=data-login]").each(function(){
                structure = {};
                structure = $(this).val();
                dataJson.push(structure);
            });
            $.ajax({
              url: "validar-inicio-sesion",
              type: "POST",
               dataType:'json',
               data: ({data: dataJson}),
               success: function(result){
                  if (result=='admin') {
                      location.href = 'dashboard';
                  }else if(result=='customer'){
                      location.href = 'cliente';
                  }else{
                 	 // $('#login-pass').after('<div class="message">contraseña incorrecta</div>');
                 	 $('.caja_contra').after('<div class="message">contraseña incorrecta</div>');
                  setTimeout(function(){
                                $('div.message').remove();
                              }, 3000);
									// alert('Error en el usuario o contraseña');
                  }
               },
               error: function(result){
                  console.log(result);
               }
            });
});
// animaciones login
var registro = document.getElementById('registro');
var modal = document.getElementById('modal-login-registro');
var btn_registro = document.getElementById('btn_registro');
var btn_login = document.getElementById('btn_login');

btn_registro.onclick = function() {
	registro.classList.add('mover_registro');
	modal.classList.add('agrandar_modal');
}
$('#modal-login').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
});
$('#cerrar_modal').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
	registro.classList.remove('mover_registro');
	modal.classList.remove('agrandar_modal');
});
$('#fondo').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
	registro.classList.remove('mover_registro');
	modal.classList.remove('agrandar_modal');
});
$('.abrirEsaWea').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
});
//modales TIENDA
$('.wea').click(function() {
	$('.fondoModal').toggle();
	$('.wrap-modalDetalle').toggle();
      // console.log();
      var cod = this.id;
  $.ajax({
              url: "dataModal",
              type: "POST",
               dataType:'json',
               data: ({data: cod}),
               success: function(result){
                    // console.log(result);
                    $("#imgModal").attr("src","views/assets/img/products/"+result['pro_imagen']);
                    $("#nomModal").html(result['pro_nombre']);
                    $("#desModal").html(result['pro_des']);
                    $("#preModal").html('$ '+result['pro_precio']);
                                    $.ajax({
                                        url: "selectColor",
                                        type: "POST",
                                        dataType:'json',
                                        data: ({data:cod}),
                                        success: function(result){
                                            var selector = document.getElementById('selectModal');
                                            for (var i = 0; i < result.length; i++) {
                                                selector.options[i] = new Option(result[i].col_color,result[i].col_codigo);
                                            }
                                            // console.log(result);
                                        }
                                    });
                                    $.ajax({
                                        url: "selectTalla",
                                        type: "POST",
                                        dataType:'json',
                                        data: ({data:cod}),
                                        success: function(result){
                                            var selector = document.getElementById('selectTallasModal');
                                            for (var i = 0; i < result.length; i++) {
                                                selector.options[i] = new Option(result[i].tal_talla,result[i].tal_codigo);
                                            }
                                            // console.log(result);
                                        }
                                    });
                  }
               ,
               error: function(result){
                  console.log(result);
               }
            });
})


$('.fondoModal').click(function() {
     $('#selectModal').empty();
     $('#selectTallasModal').empty();
	$('.fondoModal').toggle();
	$('.wrap-modalDetalle').toggle();
})

$('#menu-res').click(function(){
	$('#caja--menu').toggle();
});

$('#btnCarrito').click(function() {
	$('#cartCompra').toggle();
})

//Registro
$('#contrasena').focus(function(){
    var value = $('#newEmail').val();
    if (value!='') {
	    $.ajax({
	      url: 'validar_correo',
	      type:'post',
	      dataType:'json',
	      data:'data='+value,
	  }).done(function(response){
       if(response!=true) {
		    $(".message").remove();
		    $('#btn_regis').attr('disabled',false);
	     }else{
	     	$(".message").remove();
		$("#debajo").after("<span class='message'>Correo no valido</span>");
		$('#btn_regis').attr('disabled',true);
	     }

	  });
    }else{
    	$(".message").remove();
    }
});
$("#frmNew").submit(function(e) {
    e.preventDefault();
            dataJson = [];
            $(".dataNewUser").each(function(){
                structure = {};
                structure = $(this).val();
                dataJson.push(structure);
            });
			console.log(dataJson);
            $.ajax({
              url: "guardar-usuario",
              type: "POST",
               dataType:'json',
               data: ({data: dataJson}),
               success: function(result){
                  console.log(result);
									if (result=="Registardo con exito") {
										$('#5').after('<div class="message">Registardo con exito</div>');
										$("#frmNew")[0].reset();
									}else{
										$('#5').after('<div class="message">'+result+'</div>');
									}
                  setTimeout(function(){
                                $('div.message').remove();
                              }, 3000);
															// document.getElementById('1').value = "";
															// document.getElementById('2').value = "";
															// document.getElementById('newEmail').value = "";
															// document.getElementById('contrasena').value = "";
															// document.getElementById('5').value = "";
															// registro.classList.remove('mover_registro');
															// modal.classList.remove('agrandar_modal');
															// alert(result);
               },
               error: function(result){
                  console.log(result);
               }
            });
});


$(".añadirCarro").click(function(){
	var hermanos = $(this).siblings();
	console.log(hermanos[0].innerText);
});

// modal VIDEOS
var pauseVideo = document.getElementById('pauseVideo');

$(".watchVideo").click(function() {
	$("#wrapPlayVideo").toggle();
	$("#backgroundVideo").toggle();
	var url = $($($($(this).children()[0])[0]).children()[0]).children()[0].src;
	 pauseVideo.src = url;
	pauseVideo.play();
});
$("#wrapPlayVideo").click(function() {
	$("#wrapPlayVideo").toggle();
	$("#backgroundVideo").toggle();
	pauseVideo.pause();
});
// galeria
if (document.getElementById("imgModal")) {
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}
	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) {slideIndex = 1}
		if (n < 1) {slideIndex = x.length}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";
		}
		x[slideIndex-1].style.display = "block";
	}
}

$("#datosPersonales").submit(function(e){
	e.preventDefault();
	var data = [];
	if ($("#nombre").val() != "" && $("#ape1").val() != "" && $("#ape2").val() != "" && $("#correo").val() != "" && $("#direccion").val() != ""  && $("#celular").val() != "") {
			data.push($("#nombre").val());
			data.push($("#ape1").val());
			data.push($("#ape2").val());
			data.push($("#correo").val());
			data.push($("#direccion").val());
			data.push($("#ciu").val());
			data.push($("#celular").val());
		$.ajax({
			url:"actualizar-datos-personales",
			type:"post",
			dataType:"json",
			data:({data:data}),
			success:function(result){
				if (result==true) {
						location.reload();
				}else{
					alert(result);
				}
			},
			error:function(result){console.log(result);}
		});
	}else{
		alert("Por favor completar todos los campos.");
	}
});

//modales noticias
if ($("#new1")) {	
	$("#closeNew1").click(function() {
		$("#modalNew1").css("display","none");
	});
	$("#new1").click(function() {
		$("#modalNew1").css("display","flex");
	});
}
