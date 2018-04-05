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
