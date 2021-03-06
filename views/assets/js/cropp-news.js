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
// cropp editar
var modalimg2= document.getElementById('img-product2');
var startmodal2 = document.getElementById('cropp-img2');
var closeImg2 = document.getElementById('closeImg2');
startmodal2.onclick = function() {
  modalimg2.style.display = "flex"
}
closeImg2.onclick = function(){
  modalimg2.style.display="none"
}

$uploadCrop2 = $('#wrap-upload2').croppie({
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
$('#upload2').on('change', function () {
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop2.croppie('bind', {
        url: e.target.result
      }).then(function(){
        // console.log('imagen recortada');
      });

    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result2').on('click', function (ev) {
  $uploadCrop2.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
    $.ajax({
      url: "cropp-news",
      type: "POST",
      data: {"image":resp},
      success: function (data) {
        html = '<img src="' + resp + '" />';
        $("#wrap-result2").html(html);
        $("#img2").val(data);
        $("#img-product2").hide();
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
