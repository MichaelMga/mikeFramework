<h1>Voici votre projet : <?php echo $project->getPropertyValue("name") ?></h1>

<h1>Statut : en cours</h1>

<h1> Devis :</h1>


<?php 

   
   foreach($actions as $action)
   {
      echo $action->getPropertyValue("name");
      $status = $action->getPropertyValue("status");

      if($status == "pendingAction"){

        echo "<button>Repasser à fait</button>";
        echo "</br>";

      } else if($status == "doneAction") {

        echo "<button>Repasser à fait</button> ";
      
    } else {

        echo "erreur d'affichage, statut non reconnu";
      }

   }

?>






