//menu
$('#modal-login').click(function(){
	$('#modal-login-registro').toggle();
});

$('#cerrar_modal').click(function(){
	$('#modal-login-registro').toggle();
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
                 	console.log(result);
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
var carrito = document.getElementById('btn_car_compra');
var carrito_items = document.getElementById('contenedor-objetos');

carrito.onclick = function() {
	carrito_items.classList.toggle("open");
}
//slider
// var slideIndex = 0;
// showSlides();
//
// function showSlides() {
// 	var i;
// 	var slides = document.getElementsByClassName('imagen');
// 	var indi = document.getElementsByClassName('indicador');
// 	for (i = 0; i < slides.length; i++) {
// 		slides[i].style.display = "none";
// 	}
// 	slideIndex++;
// 	if (slideIndex > slides.length) {slideIndex = 1}
// 	for (i = 0; i < indi.length; i++) {
// 		indi[i].className = indi[i].className.replace(" active","");
// 	}
// 	slides[slideIndex - 1].style.display = "block";
// 	indi[slideIndex - 1].classNamea += " active";
// 	setTimeout(showSlides, 1000);
// }
