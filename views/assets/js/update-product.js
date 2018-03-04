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
//cada que se selecione un archivo carga
$('#upload').on('change', function () {
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
$('.upload-result').on('click', function (ev) {
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
	$.ajax({
		url:"guardar-modificacion-producto",
		type:"post",
		dataType:"json",
		data:({data : data}),
		success:function(result) {
			$("#frmUpdatePro").after("<div class='message'>"+result+"<div>");
			setTimeout(function(){$("div.message").remove()},3000)
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

//agregar
$("#addImage").click(function() {
  if (confirm("¿agregar esta imagen?")) {
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
  }
});
