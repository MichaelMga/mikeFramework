




<div id="loginPageContainer">


<div id="loginHeader">

  <div id="loginHeaderA"><img src="public/assets/img/profile.png"></div>

  <div id="loginHeaderB"><h1>Connectez-vous</h1></div>

</div>


  <form id="loginForm" action="/theoweb/bLogin" method="post">
    <input class="loginFormA" id="userInput" type="text" name="username">
    <input class="loginFormA" id="userPass" type="password" name="hash" >
  </form>

  <button id="loginBtn" onclick="checkUser()">Je me connecte</button>

</div>

</br>





<div id="errorDiv" style="color:red"></div>



<div id="loginBottomDiv">
      
   <div  class="loginBottomDivA"><a href="register">Vous n'êtes pas inscrit?</a></div>


</div>





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