// solo numeros
$('input[type=number]').keydown(function(e){
    // console.log(e.keyCode);
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
});

// solo letras
$('input[type=text]').keydown(function(e){
    tecla = e.key;
    if (tecla==8){
        return true;
    }
    patron =/[a-zA-Z0-9ñÑ\s#@.,-_]/;
    return patron.test(tecla);
});
function eliminarLetras(e){
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
//eliminar combinacion ctrl+shift+i
shortcut.add("Ctrl+Shift+i",function() {
    var tecla = window.event;
    console.log(window.event);
    if (tecla == 73) {
        console.log("yo");
    }
},{
  'type':'keydown',
  'propagate':false,
  'target':document
});
//eliminar F12
shortcut.add("F12",function() {
    var tecla = window.event;
    console.log(window.event);
    if (tecla == 73) {
        console.log("yo");
    }
},{
  'type':'keydown',
  'propagate':false,
  'target':document
});
//ver codigo fuente
shortcut.add("Ctrl+u",function() {
    var tecla = window.event;
    if (tecla.key=="u") {
        tecla.returnValue=false;
    }

},{
  'type':'keydown',
  'propagate':false,
  'target':document
});
//eliminar click derecho
$(function(){
    $(document).bind("contextmenu",function(e){
        alert("Función desactivada");
        return false;
    });
});
