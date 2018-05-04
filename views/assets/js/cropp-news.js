var modalimg= document.getElementById('img-product');
var startmodal = document.getElementById('cropp-img');
var closeImg = document.getElementById('closeImg');
startmodal.onclick = function() {
  modalimg.style.display = "flex"
}
closeImg.onclick = function(){
  modalimg.style.display="none"
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
      url: "cropp-news",
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
//crear
$("#registrarNew").submit(function(e){
  e.preventDefault();
  $.ajax({
    url:"nueva-noticia",
    type:"post",
    dataType:"json",
    data:({title:$("#title").val(),des:$("#preview").val(),img:$("#img").val()}),
    success:function(result){
      console.log(result);
      if (result==true) {
        location.href="crear-noticia";
      }else{
        $("#registrarNew").append("<div class='alert'>"+result+"</div>");
        setTimeout(function(){$("div.alert").remove()},3000);
      }
    },
    error:function(result){
      console.log(result);
    }
  });
});
