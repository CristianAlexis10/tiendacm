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
            .animate({ width: "48px" })
            .find( "img" )
              .animate({ height: "36px" });
        });
        var pro_codigo =  $item.context.childNodes[9].value;
        var pro_cantidad = $item.context.childNodes[11].value;
        var pro_color = $item.context.childNodes[13].value;
        // console.log( $item.context.childNodes[13].value);
        pedidoTotal[pro_codigo]={'cant':pro_cantidad,'color':pro_color};

 
        console.log(pedidoTotal);
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
          .css( "width", "96px")
          .append( trash_icon )
          .find( "img" )
            .css( "height", "72px" )
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