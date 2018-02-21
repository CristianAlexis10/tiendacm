// var cantidad = 0;
// //cantidad del producto
// $("#moreCant").click(function(){
//   cantidad++;
//   $("#cant").html(cantidad);
// });
// $("#minusCant").click(function(){
//   if (cantidad>0) {
//     cantidad=cantidad-1;
//     $("#cant").html(cantidad);
//   }
// });
//cantidad
// $("#cant").dblclick(function(){
//
// });
//boton de agregar
$(".addItemShop").click(function(){
  var pro_cantidad = $("#cant").val();
  var color = $("#selectModal").val();
  var talla = $("#selectTallasModal").val();
  var img =   $("#imgModal")[0].currentSrc;
  var pro_nom = $("#nomModal")[0].innerHTML;
  if (pro_cantidad>0) {
      var data = {"color":color,"talla":talla,"imagen":img,"pro_nombre":pro_nom,"cantidad":pro_cantidad};
      cantidad = 0;
      $("#cant").html(cantidad);
      $.ajax({
        url:"agregar-producto-carrito",
        type:"post",
        dataType:"json",
        data:({data:data}),
        success:function(result){
          if (result==true) {
            $("#cartCompra").remove();
            $(".refresh").load("index.php?c=config&a=cart");

            setTimeout(function(){
              $('.fondoModal').toggle();
              $('.wrap-modalDetalle').toggle();
              $("#cartCompra").css({"display":"block"});
            },100);
          }
        },
        error:function(result){console.log(result);},
      });
  }else{
    $('button.addItemShop').after("<div class='alert-message'>Por favor selecciona la cantidad.</div>");
    setTimeout(function(){
      $("div.alert-message").remove();
    },3000);
    $("#cant").val(1);
  }
});
//eliminar item
function eliminarItem(id){
  // var id = $(this).attr('class')[0];
  $("#"+id).remove();
  $("#"+id).remove();
  $.ajax({
    url:"eliminar-producto-carrito",
    type:"post",
    dataType:"json",
    data:({data:id}),
    success:function(result){
      console.log(result);
    },
    error:function(result){console.log(result);}
  });
}
//realizar pedido
$("#confirmOrder").submit(function(e){
  e.preventDefault();
  if ($("#dir").val()!="" && $("#cel").val()!="" && $("#fecha").val()!="" ) {
      $.ajax({
        url:"realizar-pedido",
        type:"psot",
        dataType:"json",
        data:({dir:$("#dir").val(), cel:$("#cel").val(), fecha:$("#fecha").val()}),
        success:function(result) {
          console.log(result);
        },
        error:function(result) {
          console.log(result);
        }
      });
  }else{
    $("#confirmOrder").after("<div class='alert-message'>Campos requeridos.</div>");
    setTimeout(function(){
      $("div.alert-message").remove();
    },3000);
  }
});
