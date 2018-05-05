<button id="alerta">alerta!</button>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>

<script type="text/javascript">
var msn = "hola";
function cerrarAlerta() {
  $(".wrapAlert").css("transform","translateX(-100%)");
}
function alerta(){
  $("body").append('<div class="wrapAlert" style="width: 350px;height: 150px;  position: absolute;  left: 0px;bottom: 50px;background: #fff;transform: translateX(-100%);transition: .3s;display: grid;grid-template-rows: 25px 125px;box-shadow: 0px 0px 20px -8px black;  padding: 10px;"><button class="alert" style="  width: 25px;  margin-left: 325px;  border: none;  cursor: pointer;  background: #fff;  outline: none;  font-weight: bold;" onclick="cerrarAlerta()">X</button></div>');
  $("p").remove();
  $("<p>"+ msn +"</p>").insertAfter(".alert");
  $(".wrapAlert").css("transform","translateX(0px)");
  setTimeout(function() {
    $(".wrapAlert").css("transform","translateX(-100%)");
    $("p").remove();
  },2000);
}
</script>
