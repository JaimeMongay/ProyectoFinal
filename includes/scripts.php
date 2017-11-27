<!-- VALIDACION DE CAMPOS VACIOS -->
 <script>
function validaralta()
{
    valor = true;
  $("#aviso1").hide("slow");
  $("#aviso2").hide("slow");
  $("#aviso3").hide("slow");
  $("#aviso4").hide("slow");
  $("#aviso5").hide("slow");
  $("#aviso6").hide("slow");
  $("#aviso7").hide("slow");
  $("#aviso10").hide("slow");
  
  if (document.altaUsuario.nombre.value == ""){
    $("#aviso1").show("slow");
      valor = false;
  }
  if (document.altaUsuario.email.value == ""){
    $("#aviso2").show("slow");
      valor = false;
  }
  if (document.altaUsuario.email2.value == ""){
    $("#aviso3").show("slow");
      valor = false;
  }
  if (document.altaUsuario.password.value == ""){
    $("#aviso5").show("slow");
      valor = false;
  }
  if (document.altaUsuario.password2.value == ""){
    $("#aviso6").show("slow");
      valor = false;
  }

  // VALIDAR QUE HACE EL CHECK EN ACEPTAR LAS CONDICIONES DE USO
  if (document.altaUsuario.intAcepto.checked == false)
    {
      $("#aviso10").show("slow");
         valor = false;
   }


  //FIN DE ERRORES DE EMAIL Y CONTRASEÑAS PARA QUE SEAN IGUALES
  if (document.altaUsuario.email.value != document.altaUsuario.email2.value){
    $("#aviso4").show("slow");
      valor = false;
  }
  if (document.altaUsuario.password.value != document.altaUsuario.password2.value){
    $("#aviso7").show("slow");
      valor = false;
  }

  return valor;
}
//VALIDAR ALTA-PISTA
function validaraltapista()
{
    valor = true;
  $("#avisopista1").hide("slow");

  if (document.altapista.Nombre.value == ""){
    $("#avisopista1").show("slow");
      valor = false;
  }
  return valor;

}
// validación de campos vacios del acceso.
function validaracceso()
{
    valid = true;
  $("#aviso8").hide("slow");
  $("#aviso9").hide("slow");
  //COLORES
  if (document.formAcceso.email.value == ""){
    $("#aviso8").show("slow");
      valid = false;
  }
  if (document.formAcceso.password.value == ""){
    $("#aviso9").show("slow");
      valid = false;
  }
  
  return valid;
}

</script>

<!-- EVITAR COPIAR Y PEGAR EN CAMPOS -->
<script>
window.onload = function() {
 var myInput = document.getElementById("email2");
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}

window.onload = function() {
 var myInput = document.getElementById("password2");
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}


// Genera una clave aleatoria 
//function aleatoriedad() { 
  //  $caracteres = "abcdefghijklmnopqrstuvwxyz1234567890"; 
    //$nueva_clave = ""; 
    //for ($i = 5; $i < 35; $i++) { 
     //   $nueva_clave .= $caracteres[rand(5,35)]; 
   // };
   // return $nueva_clave; 
//};




function validaralta2()
{
    valor = true;
  $("#aviso1").hide("slow");
  $("#aviso2").hide("slow");
  $("#aviso3").hide("slow");
  $("#aviso4").hide("slow");
  $("#aviso5").hide("slow");
  $("#aviso6").hide("slow");
  $("#aviso7").hide("slow");
  
  
  if (document.altaUsuario.nombre.value == ""){
    $("#aviso1").show("slow");
      valor = false;
  }
  if (document.altaUsuario.email.value == ""){
    $("#aviso2").show("slow");
      valor = false;
  }
  if (document.altaUsuario.email2.value == ""){
    $("#aviso3").show("slow");
      valor = false;
  }
  if (document.altaUsuario.password.value == ""){
    $("#aviso5").show("slow");
      valor = false;
  }
  if (document.altaUsuario.password2.value == ""){
    $("#aviso6").show("slow");
      valor = false;
  }

  
  //FIN DE ERRORES DE EMAIL Y CONTRASEÑAS PARA QUE SEAN IGUALES
  if (document.altaUsuario.email.value != document.altaUsuario.email2.value){
    $("#aviso4").show("slow");
      valor = false;
  }
  if (document.altaUsuario.password.value != document.altaUsuario.password2.value){
    $("#aviso7").show("slow");
      valor = false;
  }

  return valor;
}
</script>




