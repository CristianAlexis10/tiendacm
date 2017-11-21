var pedidoTotal = [];

$(function() {
    // guardar la galeria y contenedor en variables
    var $gallery = $( "#gallery" ),
      $trash = $( "#contenedor-objetos" );
    // hacer que los elementos de la galeria sean arratrables
    $( "li", $gallery ).draggable({
      cancel: "a.fa,input,select", // si se presiona un icono no se activara el arrastre
      revert: "invalid", //volver a la posicion inicial si no se suelta en el contenedor
      containment: "document",
      helper: "clone",//para que se clone mientras de arrartra (no obligatorio)
      cursor: "move"
    });

    //hacer que el contenedor acepte los elementos droppable
    $trash.droppable({
      cancel: "#confirm-order",
      accept: "#gallery > li",
      classes: {
        "ui-droppable-active": "ui-state-highlight"//efecto cada que se seleciona un droppable
      },
      drop: function( event, ui ) {
        deleteImage( ui.draggable );
        // var pro_codigo = ui.draggable.context.childNodes[11].value;
        // var pro_cantidad = ui.draggable.context.childNodes[13].value;
        // var pro_color = ui.draggable.context.childNodes[15].value;

        // pedidoTotal[pro_codigo]={'cant':pro_cantidad,'color':pro_color};

        // console.log(pedidoTotal);
        // // desabilitar botones
        // $('#'+ui.draggable.context.childNodes[13].id).attr('disabled',true);
        // $('#'+ui.draggable.context.childNodes[15].id).attr('disabled',true);
        // console.log();
        // var nn = $().val();
         // console.log(nn);  //TRAER EL VALOR DE LO QUE SE ARRASTRO
      }
    });

    // dejar que la galeria acepte los elementos del contenedor de objetos
    $gallery.droppable({
      accept: "#contenedor-objetos li",
      classes: {
        "ui-droppable-active": "custom-state-active"
      },
      drop: function( event, ui ) {
        recycleImage( ui.draggable );//para obtener el valor es igual que arriba
       //  // console.log('codigo: '+ui.draggable.context.childNodes[11].value);
       //  var codigo = ui.draggable.context.childNodes[11].value;

       //  $('#'+ui.draggable.context.childNodes[13].id).attr('disabled',false);
       //  $('#'+ui.draggable.context.childNodes[15].id).attr('disabled',false);

       // pedidoTotal.splice(codigo, 1);

       //  console.log(pedidoTotal);
      }
    });

    // eliminar imagen
        // recycle_icon el que aparece una vez se elimina
    var recycle_icon = "<a href='' title='Eliminar del pedido' class='fa fa-minus-circle'></a>";
    function deleteImage( $item ) {
      $item.fadeOut(function() {
        var $list = $( "ul", $trash ).length ?
          $( "ul", $trash ) :
          $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );

        $item.find( "a.fa-cart-plus" ).remove();
        $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
          $item
            .animate({ width: "250px" })
            .find( "img" )
              .animate({ height: "100px" });
        });
        //valores de las cantidades
        var pro_codigo =  $item.context.childNodes[11].id;
        var clases_cantidad =  $('#'+pro_codigo).attr("class");
        clases_cantidad = clases_cantidad.split(" ");
        var cantidades = [];
        $("."+clases_cantidad[1]).each(function(){

            cantidades.push($(this).val());
        });
        //valores de los colores
        var pro_color =  $item.context.childNodes[13].id;
        var clases_colores =  $('#'+pro_color).attr("class");
        clases_colores = clases_colores.split(" ");
        var colores = [];
        $("."+clases_colores[0]).each(function(){

            colores.push($(this).val());
        });
        //valores de las tallas
        var pro_talla =  $item.context.childNodes[15].id;
        var clases_tallas =  $('#'+pro_talla).attr("class");
        clases_tallas = clases_tallas.split(" ");
        var tallas = [];
        $("."+clases_tallas[0]).each(function(){
            tallas.push($(this).val());
        });
        // console.log(tallas);




        pro_codigo =  $item.context.childNodes[9].value;
        // var pro_cantidad = $item.context.childNodes[11].value;
        // var pro_color = $item.context.childNodes[13].value;
        // var pro_talla = $('#'+$item.context.childNodes[15].id).val();
        // pedidoTotal[pro_codigo]={'pro_codigo':pro_codigo,'cantidades':cantidades,'colores':colores,'pro_talla':tallas};
        var cantidad_colores_tallas = [];
        var conta = (cantidades.length-1);
        while(conta>=0){
            cantidad_colores_tallas.push({'cantidad':cantidades[conta],'color':colores[conta],'talla':tallas[conta]});
            conta = conta-1;
        }

        pedidoTotal[pro_codigo]={'pro_codigo':pro_codigo,'detalles':cantidad_colores_tallas};
        // console.log(pedidoTotal);
        // desabilitar botones
        $('#'+$item.context.childNodes[11].id).attr('disabled',true);
        $('#'+$item.context.childNodes[13].id).attr('disabled',true);
      });
    }

  // reciclar imagen
    var trash_icon = "<a href='' title='Agregar al carrirto' class='fa fa-cart-plus'></a>";
    function recycleImage( $item ) {
      $item.fadeOut(function() {
        $item
          .find( "a.fa-minus-circle" )
            .remove()
          .end()
          .css( "width", "200px")
          .append( trash_icon )
          .find( "img" )
            .css( "height", "200px" )
          .end()
          .appendTo( $gallery )
          .fadeIn();

            var codigo = $item.context.childNodes[9].value;
            $('#'+$item.context.childNodes[11].id).attr('disabled',false);
            $('#'+$item.context.childNodes[13].id).attr('disabled',false);

            delete pedidoTotal[codigo];

            console.log(pedidoTotal);
      });
    }

    // Resolve the icons behavior with event delegation
    $( "ul.gallery > li" ).on( "click", function( event ) {
      var $item = $( this ),
        $target = $( event.target );

      if ( $target.is( "a.fa-cart-plus" ) ) {
        deleteImage( $item );
      } else if ( $target.is( "a.fa-minus-circle" ) ) {
        recycleImage( $item );
      }

      return false;
    });
  } );

$('.dame').click(function(){
  alert('ya dio');
});

$('#confirm-order').click(function(){
   $.ajax({
              url: "realizar-pedido",
              type: "POST",
               dataType:'json',
               data: ({data: pedidoTotal}),
               success: function(result){
                 console.log(result);
               },
               error: function(result){
                  console.log(result);
               }
            });
});

$('.otroP').click(function(){
    // encontrar la clase
    var hermanos = $('#'+this.id).siblings('input,select');
    var id_input = hermanos[1].id;
    var clase = $('#'+id_input).attr("class");
    clase = clase.split(" ")
    $('#'+this.id).before('cantidad: <input type="number"  value="0" class="input-number-pro '+clase[1]+'">');
    // traer clase del select
    var id_select = hermanos[2].id;
    var clase_select = $('#'+id_select).attr("class");
    clase_select = clase_select.split(" ");
    $('#'+this.id).before(' <select class="'+clase_select[0]+'"><option value="blanco">Blanco</option> <option value="rojo">rojo</option>   </select>');

    //traer clase de la talla
    var id_select_talla = hermanos[3].id;
    var clase_select_talla = $('#'+id_select_talla).attr("class");
    clase_select_talla = clase_select_talla.split(" ");
    $('#'+this.id).before(' <select class="'+clase_select_talla[0]+'"><option value="m">M</option><option value="x">X</option></select>');


    hermanos = $('#'+this.id).siblings('input,select')
    // console.log(hermanos);

});
