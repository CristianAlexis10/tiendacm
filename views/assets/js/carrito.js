var cantidad = 0;
//cantidad del producto
$("#moreCant").click(function(){
  cantidad++;
  $("#cant").html(cantidad);
});
$("#minusCant").click(function(){
  if (cantidad>0) {
    cantidad=cantidad-1;
    $("#cant").html(cantidad);
  }
});
//cantidad
$("#cant").dblclick(function(){

});
//boton de agregar
$(".addItemShop").click(function(){
  var color = $("#selectModal").val();
  var talla = $("#selectTallasModal").val();
  var img =   $("#imgModal")[0].currentSrc;
  var pro_nom = $("#nomModal")[0].innerHTML;
  var pro_cantidad = cantidad;
  var data = {"color":color,"talla":talla,"imagen":img,"pro_nombre":pro_nom,"cantidad":cantidad};
  cantidad = 0;
  // $(".wrap-items-carrito").append('<div class="item-carrito"> <div class="item-cart-img">  <img src="'+img+'" alt="">  </div><div class="info-item-cart">  <div class="item-cart" id="nombre"><h2><span>producto:</span>'+pro_nom+'</h2>  </div><div class="item-cart" id="cantidad"><h2><span>cantidad:</span>'+pro_cantidad+'</h2></div><div class="item-cart" id="valor"><h2><span>precio:</span></h2>  </div></div><div class="info-item-cart"><div class="item-cart" id="color"><h2><span>color:</span>'+color+'</h2></div><div class="item-cart" id="talla">  <h2><span>talla:</span>'+talla+'</h2></div>  <div class="item-cart"><button type="button" name="button" class="restar-carrito"><i class="fa fa-times-circle" aria-hidden="true"></i>  eliminar</button></div>  </div></div>');
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
