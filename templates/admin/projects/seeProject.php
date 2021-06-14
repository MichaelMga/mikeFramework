<h1>Voici votre projet : <?php echo $project->getPropertyValue("name") ?></h1>

<h1>Montant total à régler :</h1>

  <?php 

      echo "$totalAmount euros";

  ?>

</br>

<h1>Montant réglé :</h1>


<?php 

    echo "$paidAmount euros";

?>


</br>

<h1>Montant restant à régler :</h1>



<?php 

    echo "$leftAmount euros";

?>





</br>



<?php 


if($admin == true){


  if($projectStatus == "pending" )
  {
    echo '<h1>Projet en cours </h1>';
    echo "<a href='" . rootUrl . "updateProjectStatus?projectId=" . $_GET["id"] . "&newStatus=done'><button>Passer le projet en terminé</button></a>";

  } else {

    echo '<h1>Projet terminé </h1>';
    echo "<a href='" . rootUrl . "updateProjectStatus?projectId=" . $_GET["id"] . "&newStatus=pending'><button>Repasser le projet à en cours</button></a>";

  }

}


?>

<h1>Statut : en cours</h1>

<h1> Devis :</h1>


<?php 

   
  if(count($actions) > 0)
  {
    foreach($actions as $action)
    {
       echo $action->getPropertyValue("name");
       $status = $action->getPropertyValue("status");
       $id = $action->getPropertyValue("ID");
 
       if($status == "pendingAction"){

         echo " (statut: en cours)"; 

         if($admin == true){

                echo "<a href='"  . rootUrl . "updateActionStatus?actionId=$id&newStatus=doneAction'><button>Passer à fait</button></a>";
         }
         
         echo "</br>";
 
       } else if($status == "doneAction") {

         echo " (statut: terminé)"; 

         if($admin == true){

               echo "<a href='"  . rootUrl . "updateActionStatus?actionId=$id&newStatus=pendingAction'><button>Repasser à en cours</button></a>";

         }
         echo "</br>";

       
     } else {
 
         echo "erreur d'affichage, statut non reconnu";
         echo "</br>";

       }
 
    }

  } else {

    echo "il n'y a pas encore d'actions enregistrées sur ce projet";
  }


?>

</br>
</br>

<?php 

if($admin == true){

  echo "<form action='" . rootUrl ."dbNewAction' method='post'>
  
   <input name='action' type='text' placeholder='nouvelle action'>
   <input name='projectId' type='hidden' value=" . $_GET["id"] . ">
   <input type='submit' value='créer action'>
        
   </form>";

} else {

   if($leftAmount > 0){

    echo "</br>";


    echo "<form method='post' action = '" . rootUrl . "payment'>
             <input id='' type='hidden'>
             <input name='amount' value='$leftAmount' type='hidden'>
             <input name='projectId' value='$projectId' type='hidden'>
           <button>Payer la totalité du montant restant</button>
    
        </form> </br></br>

        <form method='post' action = '" . rootUrl . "payment'>
            <input name='amount' type='number'>
            <button>Payer une somme personalisée</button>
        </form>  </br></br>        
        "; 


   } else {

    echo "<div>Le prix a été réglé dans son intégralité. :)</div>";
   }
  

}

?>
