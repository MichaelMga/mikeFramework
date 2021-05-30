

Here are your users :
</br>

<?php

 global $users;


  foreach($users as $user){

    if( $user->getPropertyValue("username") != admin){
        echo $user->getPropertyValue("username");

    }

 }


 ?>