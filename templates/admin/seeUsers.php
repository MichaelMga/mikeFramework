<style>



</style>


Voici vos utilisateurs </br></br>

<form>
   <input id="findUserInput" type="text" placeholder="utilisateur">
</form>


<div id="foundUsers">
</div>

</br></br>

<div id="usersDiv">  
  
 <?php

    $usernames = [];
    $userIds = [];

    foreach($users as $user){

      $usernames[] = $user->getPropertyValue("username");
      $userIds[] = $user->getPropertyValue("ID");

      if( $user->getPropertyValue("username") != admin){
          echo "<div class='usersDivA'>";
          echo $user->getPropertyValue("username");
          echo "<a  href='" . rootUrl . "user?id=" . htmlentities($user->getPropertyValue("ID")) . "'><button>voir</button></a>";
          echo "</div></br></br>";


       }

    }

  ?>




</div>




 <script>

      var findUserInput = document.getElementById("findUserInput");
      var usernames = <?php echo json_encode($usernames) ?>;
      var userIds = <?php echo json_encode($userIds) ?>;

      var foundUsersDiv = document.getElementById("foundUsers");

      var foundUsersArray = [];



  

      findUserInput.addEventListener("keyup", function(){

        findUserFromString(findUserInput.value);

      });

      function findUserFromString(string)
      {


        let found = 0;

        initFoundUsers();

        setTimeout(() => {

          
          for(i=0; i < usernames.length; i++){
            


                if(usernames[i].substring(0,string.length) == string && foundUsersArray.includes(usernames[i]) == false && string != ""){

                     foundUsersArray.push(usernames[i]);
                     foundUsersDiv.innerHTML += "<a class='foundUsersA' href='<?php echo rootUrl ?>user?id=" + userIds[i] + "'><div>" + usernames[i] + "</div></a>"; 
                     found++;
 
               }

           }  

          
        }, 100);
         
         }


   function initFoundUsers()
   {
     foundUsersDiv.innerHTML = "";
     foundUsersArray = [];

   }

 </script>