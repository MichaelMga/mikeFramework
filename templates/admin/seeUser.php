<h1>Utilisateur : <?php echo $user->getPropertyValue("username")  ?></h1>

</br>

  <div id="seeUserHeadersDiv">


       <div class="seeUserHeadersDivA">
            
              <h2> Projets en cours : </h2>        
       </div>

        <div class="seeUserHeadersDivA">
              <h2> Projets terminés (attente de paiement) : </h2>
        </div>

        <div class="seeUserHeadersDivA">
                <h2> Projets terminés (paiement réalisé) : </h2>
        </div>

   
  </div>


  <div id="seeProjectHeadersDiv">

       <div class="seeProjectHeadersDivA"></div>

       <div></div>

       <div></div>

   
  </div>




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
