

Voici vos utilisateurs </br></br>


<form action="">
   <input type="text" placeholder="rechercher un utilisateur">
   <input type="submit" value="chercher">

</form>


</br></br>


<?php


  foreach($users as $user){

    if( $user->getPropertyValue("username") != admin){
        echo $user->getPropertyValue("username");

        echo " <button>voir</button>";

        echo "</br></br>";

    }

 }


 ?>