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
      url: "cropp-category",
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
//enviar
$("#frmNewCat").submit(function(e){
  e.preventDefault();
  $.ajax({
    url:"nueva-categoria",
    type:"post",
    dataType:"json",
    data:({data:$("#name").val()}),
    success:function(result){
      if (result==true) {
        location.reload();
      }else{
        $("#frmNewCat").after("<div class='alert'>"+result+"</div>");
        setTimeout(function(){$("div.alert").remove()},3000);
      }
    },
    error:function(result){
      console.log(result);
    }
  });
});
