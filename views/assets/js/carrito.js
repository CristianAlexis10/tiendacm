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
          }else{
            alerta(result);
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

function RealizarPedido(){
    $.ajax({
        url:"realizar-pedido",
        type:"post",
        dataType:"json",
        data:({dir:$("#dir").val(), cel:$("#cel").val(), fecha:$(".fecha")[0].value , ciudad:$("#ciudad").val()}),
        success:function(result) {
          if (result==true) {
            $("#confirmOrder")[0].reset();
              location.href= "mi-perfil";
          }else{
              $("#confirmOrder").append("<div class='alert-message'>"+result+"</div>");
              setTimeout(function(){
                $("div.alert-message").remove();
              },3000);
          }
        },
        error:function(result) {
          console.log(result);
        }
    });
}

function cerrarAlerta() {
  $(".wrapAlert").css("transform","translateX(-100%)");
}
function alerta(msn){
  $("body").append('<div class="wrapAlert" style="width: 350px;height: 150px;  position: fixed;  left: 0px;bottom: 50px;background: #fff;transform: translateX(-100%);transition: .3s;display: grid;grid-template-rows: 25px 125px;box-shadow: 0px 0px 20px -8px black;  padding: 10px;"><button class="alert" style="  width: 25px;  margin-left: 325px;  border: none;  cursor: pointer;  background: #fff;  outline: none;  font-weight: bold;" onclick="cerrarAlerta()">X</button></div>');
  $("p").remove();
  $("<p>"+ msn +"</p>").insertAfter(".alert");
  $(".wrapAlert").css("transform","translateX(0px)");
  setTimeout(function() {
    $(".wrapAlert").css("transform","translateX(-100%)");
    $("p").remove();
  },2000);
}
