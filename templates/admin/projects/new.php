

  <h1>Crée un projet</h1>

  </br>

        
    <input id="user" type="text" placeholder="trouve un utilisateur">
    <button onclick="searchUser()">Chercher</button>


    </br>
    </br>

   <form action="">
          
     <input type="text" placeholder="nom du projet">
     <input type="hidden">
     <input type="submit" value="créer projet">
     
   </form>






   <script>
   
       function searchUser(){

         let user = document.getElementById("user");
        
         xrq = new XMLHttpRequest(); 

         xrq.onload = function(){

                response = JSON.parse(this.responseText);

                if(response.foundUser == true){

                    alert("ok, utilisateur ajouté");

                } else {

                    alert("nous n'avons pas trouvé cet utilisateur");

                }
         }

          xrq.open('POST', '<?php echo rootUrl . "getUserAsync" ?>', true);
          xrq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xrq.send('username=' + user);

       }
   
   </script>