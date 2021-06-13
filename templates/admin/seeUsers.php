<style>


#foundUsers{

  height: 30%;
  width: 50%;
}

</style>


Voici vos utilisateurs </br></br>

<form>
   <input id="userInput" type="text" placeholder="utilisateur">
</form>


<div id="foundUsers">
</div>

</br></br>

<?php
  
  $usernames = [];

  foreach($users as $user){

    $usernames[] = $user->getPropertyValue("username");

    if( $user->getPropertyValue("username") != admin){

        echo $user->getPropertyValue("username");
        echo " <a  href='" . rootUrl . "user?id= " . htmlentities($user->getPropertyValue("ID")) . "'><button>voir</button></a>";
        echo "</br></br>";

    }

 }


 ?>




 <script>

      var userInput = document.getElementById("userInput");
      var usernames = <?php echo json_encode($usernames) ?>;

      var foundUsersDiv = document.getElementById("foundUsers");

   

      userInput.addEventListener("keyup", function(){

        findUserFromString(userInput.value);

      });

      function findUserFromString(string)
      {
    
               for(i=0; i < usernames.length; i++){


                   if(usernames[i].substring(0,string.length) == string){

                        console.log(usernames[i]);
                   } 

               }       
         }

 </script>