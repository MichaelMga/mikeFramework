
<h1>Login</h1>

<form id="loginForm" action="/theoweb/bLogin" method="post">
  <input id="userInput" type="text" name="username">
  <input id="userPass" type="password" name="hash" >
</form>

</br>

<button onclick="checkUser()">Connection</button>

</br> </br>


<a href = "<?php echo rootUrl ?>forgottenPass">Mot de passe oublié</a>



<div id="errorDiv" style="color:red"></div>







<script>
  
  var errorDiv =  document.getElementById("errorDiv");
  var loginForm =  document.getElementById("loginForm");
  var userInput = document.getElementById("userInput");
  var userPass =  document.getElementById("userPass");



  window.onload = function(){

    userInput.addEventListener("keyup", function(){ initErrorMsg()})

  }


   function checkUser(){

    let xrq = new XMLHttpRequest();

    xrq.onload = function()
    {

      let response = JSON.parse(this.responseText);

       if(response.user != false){
          loginForm.submit();
       } else {
          errorDiv.innerHTML += "desolé, la combinaison mot de passe/nom d'utilisateur est incorrecte";
     }
    

   }

     xrq.open('POST', '<?php echo rootUrl ?>getUserForLoginAsync' , true);

     xrq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

     xrq.send("username=" + userInput.value + "&pass=" + userPass.value );


   }




   function initErrorMsg()
   {
    errorDiv.innerHTML = "";

   }



</script>