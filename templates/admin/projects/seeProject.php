<h1>Voici votre projet : <?php echo $project->getPropertyValue("name") ?></h1>

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
         
         echo "<a href='"  . rootUrl . "updateActionStatus?actionId=$id&newStatus=doneAction'><button>Passer à fait</button></a>";
         echo "</br>";
 
       } else if($status == "doneAction") {

         echo " (statut: terminé)";  
         echo "<button>Repasser à en cours</button> ";
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
</br>



<form action="<?php echo rootUrl ?>dbNewAction" method="post">
  
  <input name="action" type="text" placeholder="nouvelle action">
  <input name="projectId" type="hidden" value="<?php echo $_GET["id"] ?>">
  <input type="submit" value="créer action">
         
</form>
