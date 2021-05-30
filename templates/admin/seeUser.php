
<h1>Utilisateur : <?php echo $user->getPropertyValue("username")  ?></h1>

</br>

<h1> Projets en cours : </h1>

<?php 

   foreach($pendingProjects as $pendingProject )
   {

        echo $pendingProject ; 

        echo " <button>Voir projet </button>";

        echo "</br>";

   }

?>

</br>
</br>


<h1> Projets terminés (attente de paiement) : </h1>

<?php 

   foreach($waitingPaymentProjects as $waitingPaymentProject )
   {

        echo $waitingPaymentProject ; 

        echo " <button>Voir projet </button>";

        echo "</br>";

   }

?>

 </br> 
 </br>

   <h1> Projets terminés (paiement réalisé) : </h1>


   <?php 

foreach($doneProjects as $doneProject )
{

     echo $doneProject ; 

     echo " <button>Voir projet </button>";

     echo "</br>";

}

?>
