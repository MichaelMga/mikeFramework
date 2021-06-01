

  <h1>Crée un projet</h1>

  </br>

        
    <input id="user" type="text" placeholder="trouve un utilisateur">
    <button onclick="searchUser()">Chercher</button>


    </br>
    </br>

   <form id="projectForm" action="<?php echo rootUrl . "dbNewProject" ?>" method="post">
          
     <input name="project" type="text" placeholder="nom du projet">
     <input id="userInput" value="false" name="user" type="hidden">
     
   </form>

   <button onclick="sendForm()">créer projet</button>









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