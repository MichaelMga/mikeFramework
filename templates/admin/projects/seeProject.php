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
 
       if($status == "pendingAction"){

         echo " (statut: en cours)"; 
         
         echo "<a href='" .  . "'><button>Passer à fait</button></a>";
         echo "</br>";
 
       } else if($status == "doneAction") {

         echo " (statut: terminé)";  
         echo "<button>Repasser à en cours</button> ";
       
     } else {
 
         echo "erreur d'affichage, statut non reconnu";
       }
 
    }

  } else {

    echo "il n'y a pas encore d'actions enregistrées sur ce projet";
  }


?>






