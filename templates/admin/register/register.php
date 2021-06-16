</br> </br> 

<h1>Créez un compte en 30 secondes!</h1>

<form id="registerForm" action="bRegister" method="post">
   <input id="usernameInput" class="registerFormA" type="text" name="username" placeholder="Nom d'utilisateur">
   <input id="emailInput" class="registerFormA"  type="text" name="hash" placeholder="Mail">
   <input class="registerFormA" type="text" name="hash" placeholder="Nom">
   <input class="registerFormA" type="text" name="hash" placeholder="Prénom">
   <input class="registerFormA" type="password" name="hash" placeholder="Mot de passe">
   <input class="registerFormA" type="password" name="hash" placeholder="Confirmation mot de passe">
   <input id="submitBtn" class="registerFormA" type="submit" value="Je m'incris">
</form>




<script>



var formValidity = true;

var submitInterval;

var allValidationsMade = false;

var usernameInput = document.getElementById("usernameInput");

var emailInput = document.getElementById("emailInput");

var registerForm = document.getElementById("registerForm");


window.onload = function(){
   
   document.getElementById("submitBtn").addEventListener("click", function(event){
   
   event.preventDefault();

   checkValidity();

   })

}


  function checkValidity()
  {

     launchSubmitInterval();

     //fields filled

      checkForMissingFields();
     //valid password (votre mot de passe doit avoir une longueur d'au moins 6 éléments)


     //validMail

       //checkAvailableCredentials();

        
   

  }




  function launchSubmitInterval()
  {

    submitInterval = setInterval(

       function(){

           if(allValidationsMade == true){


              if(formValidity == true ) {

                  registerForm.submit();

  
              } else {

                 clearInterval(submitInterval);
                   
              }
 
           } 

        }, 500

      )

  }


  function checkThatAllinputsAreFilled()
  {




  }





  function checkAvailableUsername(){
     
    xrq = new XMLHttpRequest();

    xrq.onload = function()
    {

       let response = JSON.parse(this.responseText);

        if(response.availableUser == "none"){

             formValidity = false;
             clearInterval(submitInterval);

             alert("desolé, ce nom d'utilisateur est déjà utilisé");

             return;

        } 




        checkAvailableMail();

    }


    xrq.open("POST", "<?php echo rootUrl ?>checkAvailableUsername");
    xrq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xrq.send("username=" + usernameInput.value);

  }


  function checkAvailableMail(){
     
     xrq = new XMLHttpRequest();
 
     xrq.onload = function()
     {
 
        let response = JSON.parse(this.responseText);


         if(response.availableMail == "none"){
 
              formValidity = false;
              clearInterval(submitInterval);
 
              alert("desolé, ce mail est déjà utilisé");
 
         } else {


              allValidationsMade = true;

          }


     }
 
 
     xrq.open("POST", "<?php echo rootUrl ?>checkAvailableMail");
     xrq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xrq.send("mail=" + emailInput.value);
 
   }




  function checkForMissingFields()
  {
   for(i=0; i < registerForm.children.length; i++){

      if(registerForm.children[i].value.length == 0)
      {
       alert('veuillez remplir chaque champ, s il vous plait');

       formValidity = false;
       clearInterval(submitInterval);

       return;

      }

     }

     checkForValidMail();


  }





  function checkForValidMail()
  {
     
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emailInput.value) == false)
    {
       alert("You have entered an invalid email address!");
       
       formValidity = false;
       clearInterval(submitInterval);
       return;

       
   }

   
      checkAvailableUsername();


  }




  function checkAvailableCredentials(){


  }


</script>


