

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

    foundMessage = document.getElementById("foundUser");
   
       function searchUser(){

         let user = document.getElementById("user").value;
        
         xrq = new XMLHttpRequest(); 

         xrq.onload = function(){

                let response = JSON.parse(this.responseText);

                console.log(response);

                if(response.user != false){

                  alert('Nous avons trouvés ' + response.user);
                  

                } else {

                    alert('desolé, nous n avons pas trouvés cet utilisateur');
                }
         }

          xrq.open('POST', '<?php echo rootUrl . "getUserAsync" ?>', true);
          xrq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xrq.send('username=' + user);

       }
   
   </script>