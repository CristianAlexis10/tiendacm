//menu 
$('#modal-login').click(function(){
	$('#modal-login-registro').toggle();	
});

$('#cerrar_modal').click(function(){
	$('#modal-login-registro').toggle();	
});

//login
$("#form--login").submit(function(e) {
    e.preventDefault();
    if ($(this).parsley().isValid()) {
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
                 if (result=='customer') {
                   location.href = 'maxirecargas';

                 }else  if (result==true) {
                      location.href = 'dashboard';
                  }
                  console.log(result);
               },
               error: function(result){
                  console.log(result);
               }
            });
  }
});








// var wea = document.getElementsByClassName('formulario');
// var label = document.getElementsByClassName('label');
// var input = document.getElementsByClassName('input');
// alert("hola");
//
// wea.addEventListener("focus",seleccion, true);
// wea.addEventListener("blur",sin_seleccion, true);
//
// function sin_seleccion() {
//   if (input.value=='') {
//     label.style.transition = "0.3s";
//     label.style.fontSize = "25px";
//     label.style.transform = "translateY(0px)";
//     label.style.color = "#000000";
//     input.style.borderBottom = "2px solid #000000";
//     input.style.transition = "0.3s";
//   }
// }
// function seleccion() {
//   label.style.transition = "0.3s";
//   label.style.transform = "translateY(-7px)";
//   label.style.fontSize = "15px";
//   label.style.color = "#02a88f";
//   input.style.borderBottom = "2px solid #02a88f";
//   input.style.transition = "0.3s";
// }
 