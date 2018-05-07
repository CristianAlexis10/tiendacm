if (document.getElementById('img-product')) {
  var modalimg= document.getElementById('img-product');
  var startmodal = document.getElementById('cropp-img');
  var closeImg = document.getElementById('closeImg');
  startmodal.onclick = function() {
    modalimg.style.display = "flex"
  }
  closeImg.onclick = function(){
    modalimg.style.display="none"
  }
}
$uploadCrop = $('#wrap-upload').croppie({
    enableExif: true,
    viewport: {
        width: 250,
        height: 250
    },
    boundary: {
        width: 350,
        height: 350
    }
});
$('#addImage').attr("disabled",true);
//cada que se selecione un archivo carga
$('#upload').on('change', function () {
    $('#addImage').attr("disabled",false);
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        // console.log('imagen recortada');
      });

    }
    reader.readAsDataURL(this.files[0]);
});
//recortar
$('#addImage').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
    $.ajax({
      url: "cropp-products",
      type: "POST",
      data: {"image":resp},
      success: function (data) {
        html = '<img src="' + resp + '" />';
        $("#wrap-result").html(html);
        $("#img").val(data);
        $("#img-product").hide();
      }
    });
  });

  if (confirm("¿agregar esta imagen?")) {
      setTimeout(function(){
          $.ajax({
              url:"agregar-imagen",
              type:"post",
              dataType:"json",
              success:function(result){
                  if (result==true) {
                      location.reload();
                  }else{
                      console.log(result);
                  }
              },
              error:function(result){console.log(result);}
          });

      },200);
  }
});


//MODIFICAR producto
$("#frmUpdatePro").submit(function(e){
	e.preventDefault();
	 var data = [];
	$(".dataUpdate").each(function(){
		data.push($(this).val());
	});
	data.push($("#selectMul").val());
	data.push($("#selectMul2").val());
  console.log(data);
	$.ajax({
		url:"guardar-modificacion-producto",
		type:"post",
		dataType:"json",
		data:({data : data}),
		success:function(result) {
			alerta(result);
      console.log(result);
		},
		error:function(result){
			console.log(result);
		}
	});
});
//IMAGENES
$(".deleteImgProduct").click(function(){
  if (confirm("¿Eliminar esta imagen?")) {
      $.ajax({
        url:"eliminar-imagen",
        type:"post",
        dataType:"json",
        data:({data : this.id}),
        success:function(result){
          if (result==true) {
            location.reload();
          }else{
            $(".wrapp-img").after("<div class='message'>"+result+"</div>");
            setTimeout(function(){$("div.message").remove()},5000);
          }
        },
        error:function(result){console.log(result);}
      });
  }
});
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
