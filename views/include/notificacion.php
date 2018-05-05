<button id="alerta">alerta!</button>
<div class="wrapAlert">
  <button class="alert">X</button>
</div>

<script type="text/javascript">

var msn = "hola";

$("#alerta").click(function() {
  $("p").remove();
  $("<p>"+ msn +"</p>").insertAfter(".alert");
  $(".wrapAlert").css("transform","translateX(0px)");
  setTimeout(function() {
    $(".wrapAlert").css("transform","translateX(-100%)");
    $("p").remove();
  },2000);
});
$(".alert").click(function() {
  $(".wrapAlert").css("transform","translateX(-100%)");
});

</script>

<style>
.wrapAlert{
  width: 350px;
  height: 150px;
  position: absolute;
  left: 0px;
  bottom: 50px;
  background: #fff;
  transform: translateX(-100%);
  transition: .3s;
  display: grid;
  grid-template-rows: 25px 125px;
  box-shadow: 0px 0px 20px -8px black;
  padding: 10px;
}
.alert{
  width: 25px;
  margin-left: 325px;
  border: none;
  cursor: pointer;
  background: #fff;
  outline: none;
  font-weight: bold;
}
</style>
