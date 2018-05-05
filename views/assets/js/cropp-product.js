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
      url: "croppProducts2",
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
$("#frmNewProduct").submit(function(e){
  e.preventDefault();
   var jsonData = [];
   $(".dataNewProd").each(function(){
     jsonData.push(this.value);
   });
   if (confirm("¿Registrar el producto con un valor de "+new Intl.NumberFormat().format(jsonData[1]))) {
      $.ajax({
        url:"guardar-producto",
        type:"post",
        dataType:"json",
        data:({data:jsonData , color : $("#selectMul2").val() , tallas: $("#selectMul").val()}),
        success:function(result){
          if (result==true) {
            location.reload();
          }else{
            $("#frmNewProduct").after("<div class='alert'>"+result+"</div>");
          }
          setTimeout(function(){$("div.alert").remove()},3000);
        },
        error:function(result){
          console.log(result);
        }
      });
    }
});
