//menu
$('#modal-login').click(function(){
	$('#modal-login-registro').toggle();
});

$('#cerrar_modal').click(function(){
	$('#modal-login-registro').toggle();
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
		$("#login-email").after("<div class='message'>Correo no valido</div>");
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
                 	 $('#login-pass').after('<div class="message">contraseña incorrecta</div>');
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
//carrito
var carrito = document.getElementById('btn_car_compra');
var carrito_items = document.getElementById('contenedor-objetos');

carrito.onclick = function() {
	carrito_items.classList.toggle("open");
}
//responsive
 var menu = document.getElementById('caja--menu');
 var menuRes = document.getElementById('menu-res');

menuRes.onclick = function() {
	menu.style.transform = 'translateX(-100%)';
}

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
