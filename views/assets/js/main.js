//menu
$('#modal-login').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
});
$('#cerrar_modal').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
});
$('#fondo').click(function(){
	$('#modal-login-registro').toggle();
	$('#fondo').toggle();
});
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
btn_login.onclick = function() {
	registro.classList.remove('mover_registro');
	modal.classList.remove('agrandar_modal');
}
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
                    $("#preModal").html(result['pro_precio']);
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
                                            console.log(result);
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
// carrito de compras

// var btnCarrito = document.getElementById('btnCart');
// var cartCompra = document.getElementById('cartCompra');
//
// btnCarrito.onclick = function() {
// 	cartCompra.style.transform = 'translateX(0%)';
// }

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
		$("#newEmail").after("<div class='message'>Correo no valido</div>");
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
                  $('#5').after('<div class="message">'+result+'</div>');
                  setTimeout(function(){
                                $('div.message').remove();
                              }, 3000);
               },
               error: function(result){
                  console.log(result);
               }
            });
});
