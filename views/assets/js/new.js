var news = new Object;
var indice = 0;
//modal crear titulo
$("#crearTitulo").click(function(){
  $("#modalNewEntry").show();
});
//guardar Titulo
$("#nuevoTitulo").submit(function(e){
  e.preventDefault();
  $("#NOTICIA").append("<h1 class='noticia-titulo add"+indice+"' >"+$("#addTitle").val()+"</h1>");
  $("#NOTICIA").append("<p class='eliminar-add add"+indice+"'' onclick='eliminarAdd("+indice+")'>Eliminar</p>");
  news[indice]={type:"title",conten:"hola"};
  indice++;
  $("#modalNewEntry").hide();
  $("#addTitle").val("");
  console.log(news);
});

//modal crear parrafo
$("#crearParrafo").click(function(){
  $("#modalNewParrafo").show();
});
//guardar parrafo
$("#nuevoParrafo").submit(function(e){
  e.preventDefault();
  $("#NOTICIA").append("<p class='noticia-parrafo add"+indice+"''>"+$("#parrafo").val()+"</p>");
  $("#NOTICIA").append("<p class='eliminar-add add"+indice+"'' onclick='eliminarAdd("+indice+")'>Eliminar</p>");
  news[indice]={type:"parrafo",conten:$("#parrafo").val()};
  indice++;
  $("#modalNewParrafo").hide();
  $("#parrafo").val("");
  console.log(news);
});

//modal crear parrafo 2 columnas
$("#crearParrafo2").click(function(){
  $("#modalNewParrafo2").show();
});
//guardar parrafo 2 columnas
$("#nuevoParrafo2").submit(function(e){
  e.preventDefault();
  $("#NOTICIA").append("<div class='container-parrafo add"+indice+"''><p class='parrafo-izq'>"+$("#parrafo2").val()+"</p><p class='parrafo-der'>"+$("#parrafo22").val()+"</p></div>");
  $("#NOTICIA").append("<p class='eliminar-add add"+indice+"'' onclick='eliminarAdd("+indice+")'>Eliminar</p>");
  news[indice]={type:"parrafo2",conten1:$("#parrafo2").val(),conten2:$("#parrafo22").val()};
  indice++;
  $("#modalNewParrafo2").hide();
  $("#parrafo2").val("");
  $("#parrafo22").val("");
  console.log(news);
});

//modal crear imagen
$("#crearImagen").click(function(){
  $("#newImg").show();
});
//guardar parrafo
$("#formuploadajaxNoticia").submit(function(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajaxNoticia"));
      $.ajax({
            url: "subir-noticia",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                $("#formuploadajaxNoticia").append("<div class='message'>subiendo...</div>");
            },
            success:function(result){
						        if (result[0]==true) {
                        $("#newImg").hide();
                        $("#NOTICIA").append("<div class='noticia-img add"+indice+"''><img class='img-no' src='views/assets/img/news/"+result[1]+"'></div>");
                        $("#NOTICIA").append("<p class='eliminar-add add"+indice+"'' onclick='eliminarAdd("+indice+")'>Eliminar</p>");
                        news[indice]={type:"img",conten:result[1]};
                        indice++;
                        $("#formuploadajaxNoticia")[0].empty();
                        console.log(news);
                    }
            },
            error:function(result){
							$("div.message").remove();
							console.log(result);
							$("#formuploadajaxNoticia").after("<div class='message'>" + result+"</div>");
							setTimeout(function(){$("div.message").remove();},4000);
            }
      });
  });
function eliminarAdd(id){
  $(".add"+id).remove();
  delete  news[id];
  console.log(news);
}
