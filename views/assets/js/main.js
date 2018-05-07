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
				alerta("Selecciona  al menos un producto");
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
		// $(".caja_contra").after("<div class='message'>Correo no valido</div>");
		alerta("Correo no valido");
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
                 			alerta("contraseña incorrecta");
                  }
               },
               error: function(result){
                  console.log(result);
               }
            });
});
// animaciones login

$('#modal-login').click(function(){
	$('#modal-login-registro').css("display","grid");
	$("#login").css("display","grid");
	$("#registro").css("display","none");
});
$('#cerrar_modal').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
});
$('#btn_registro').click(function(){
	$("#login").css("display","none");
	$("#registro").css("display","grid");
});
$("#btn_login").click(function() {
	$("#login").css("display","grid");
	$("#registro").css("display","none");
})
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
                                    $.ajax({
                                        url: "selectImagenes",
                                        type: "POST",
                                        dataType:'json',
                                        data: ({data:cod}),
                                        success: function(result){
                                            for (var i = 0; i < result.length; i++) {
																							$(".imagesPro").append("<img class='mySlides' src='views/assets/img/products/"+result[i][1]+"'>");
                                            }
																						$(".mySlides").hide();
																						$(".primerSlider").show();
                                            console.log(result);
                                        }
                                    });
                  }
               ,
               error: function(result){
                  console.log(result);
               }
            });
});

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
										// $('#5').after('<div class="message">Registardo con exito</div>');
										alerta("Registardo con exito");
										$("#frmNew")[0].reset();
									}else{
										// $('#5').after('<div class="message">'+result+'</div>');
										alerta(result);
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
					alerta(result);
				}
			},
			error:function(result){console.log(result);}
		});
	}else{
		alerta("Por favor completar todos los campos.");
	}
});

// modal detalle pedido

$(".opneModalPedido").click(function() {
	$.ajax({
    url:"ver-pedido-vista",
    type:"post",
    dataType:"json",
    data:({data:this.id}),
    success:function(result){
      if (result.length>0) {
				$(".dataTables_empty").remove();
            //añadir tds
            var i = 0;
            $.each(result,function(){
              var tds=$("#tabla tr:first td").length;
              var trs=$("#tabla tr").length;
              var nuevaFila="<tr class='itemResult'>";
              nuevaFila+="<td>"+result[i].nombre+"</td>";
              nuevaFila+="<td>"+result[i].color+"</td>";
              nuevaFila+="<td>"+result[i].talla+"</td>";
              nuevaFila+="<td>"+result[i].cant+"</td>";
              nuevaFila+="</tr>";
              $("#tabla").append(nuevaFila);
              i++;
            });

      }
      },
    error:function(result){
      console.log(result);
    }
  });
	$(".wrapModalPedido").css("display","flex");
})
$("#closePedido").click(function() {
	$(".wrapModalPedido").css("display","none");
})
function cerrarAlerta() {
  $(".wrapAlert").css("transform","translateX(-100%)");
}
function alerta(msn){
  $("body").append('<div class="wrapAlert" style="width: 350px;height: 150px;  position: fixed;  left: 0px;bottom: 50px;background: #fff;transform: translateX(-100%);transition: .3s;display: grid;grid-template-rows: 25px 125px;box-shadow: 0px 0px 20px -8px black;  padding: 10px;"><button class="alert" style="  width: 25px;  margin-left: 325px;  border: none;  cursor: pointer;  background: #fff;  outline: none;  font-weight: bold;" onclick="cerrarAlerta()">X</button></div>');
  $("p").remove();
  $("<p>"+ msn +"</p>").insertAfter(".alert");
  $(".wrapAlert").css("transform","translateX(0px)");
  setTimeout(function() {
    $(".wrapAlert").css("transform","translateX(-100%)");
    $("p").remove();
  },2000);
}
// responsive menu
function confirmDeletePedido(id){
	if (confirm("¿Realmente deseas eliminar este pedido?")) {
		$.ajax({
			url:"eliminar-pedido",
			type:"post",
			dataType:"json",
			data:({data:id}),
			success:function(result){
				if (result==true) {
					alerta("eliminado Exitosamente.");
					setTimeout(function(){location.reload();},2500);
				}else{
					alerta(result);
				}
			},
			error:function(result){console.log(result);}
		});

	}
}
