
<h1>Utilisateur : <?php echo $user->getPropertyValue("username")  ?></h1>

</br>

<h1> Projets en cours : </h1>

<?php 


 if(count($pendingProjects) > 0){

   foreach($pendingProjects as $pendingProject )
   {
        echo $pendingProject->getPropertyValue("name"); 
        echo "<a href='" . rootUrl  . "project?id=" . $pendingProject->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
        echo "</br>";

   }
 } else {


   echo "pas de projet en cours";



 }

?>

</br>
</br>


<h1> Projets terminés (attente de paiement) : </h1>

<?php 

 if(count($waitingPaymentProjects) > 0){
   foreach($waitingPaymentProjects as $waitingPaymentProject )
   {
        echo $waitingPaymentProject ; 
        echo "<a href='" . rootUrl  . "?id=" . $waitingPaymentProject->getPropertyValue("ID") . "'><button>Voir projet </button>";
        echo "</br>";
    }

  } else {

   echo "pas de projet impayé";
   
  }

?>


 <h1> Projets terminés (paiement réalisé) : </h1>


<?php 

   if(count($doneProjects) > 0){

     foreach($doneProjects as $doneProject ){

       echo $doneProject->getPropertyValue("name"); 
       echo "<a href='" . rootUrl  . "project?id=" . $doneProject->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
       echo "</br>";

    }

   } else {

      echo "<p>Pas de projet accomplis</p>";

  }



?>
