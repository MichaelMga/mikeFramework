  <style>

      body{
        background: rgb(237, 233, 233);

      }



  </style>



  <div id="projectTopLogo">
   
        <img id="topProjectImg" src="public/assets/img/suitcase.png" alt="">

  </div>

  
  <div id="newProjectContainer">
       
    <div id="findProjectUserDiv"> 
       <input id="user" type="text" placeholder="trouve un utilisateur">
       <button onclick="searchUser()">+</button>
    </div>



    <form id="projectForm" action="<?php echo rootUrl . "dbNewProject" ?>" method="post">

      <input id="newProjectInput" name="totalPrice" type="number" placeholder="montant de la prestation (modifiable)">
      <input id="projectName" name="project" type="text" placeholder="nom du projet">
      <input id="userInput" value="false" name="username" type="hidden">
     
    </form>

   <button id="createProjectButton" onclick="sendForm()">créer projet</button>


  </div>
        









   <script>


    var userInput = document.getElementById("userInput");



    var projectForm = document.getElementById("projectForm");


   
       function searchUser(){

         let user = document.getElementById("user").value;
        
         xrq = new XMLHttpRequest(); 

         xrq.onload = function(){

                let response = JSON.parse(this.responseText);

                console.log(response);
 

                if(response.user != false){

                    userInput.value = response.user;


                  alert('Nous avons trouvés ' + response.user);
                } else {

                    userInput.value = "false";

                    alert('desolé, nous n avons pas trouvés cet utilisateur');
                }
         }

          xrq.open('POST', '<?php echo rootUrl . "getUserAsync" ?>', true);
          xrq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xrq.send('username=' + user);

       }



       function sendForm()
       {
           if(userInput.value != "false" ){

                projectForm.submit();


           } else {
               
               alert("choisis un utilisateur valide");

           }


       }
   
   </script>