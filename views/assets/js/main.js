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
                  }
               },
               error: function(result){
                  console.log(result);
               }
            });
});
