<div id="usernameDiv"><h1>Utilisateur : <?php echo $user->getPropertyValue("username")  ?></h1></div>


 <div id="seeUserHeadersDiv">


       <div class="seeUserHeadersDivA">
            
              <h2> Projets en cours : </h2>        
       </div>

        <div class="seeUserHeadersDivA">
               <div class="seeProjectTitleA"><h2> Projets terminés: </h2></div>
               <div  class="seeProjectTitleB"><h2>(attente de paiement) </h2></div>
        </div>

        <div class="seeUserHeadersDivA">
               <div class="seeProjectTitleA"><h2> Projets terminés: </h2></div>
               <div  class="seeProjectTitleB"><h2>(paiement réalisé) </h2></div>
        </div>

   
  </div>


  <div id="seeProjectHeadersDiv">

       <div class="seeProjectHeadersDivA">
             
        <?php 
 
          if(count($pendingProjects) > 0){

           foreach($pendingProjects as $pendingProject )
             {
                  echo "<div class='seeProjectHeadersDivAA'>";
                  echo "<div class='projectNameDiv'>" . $pendingProject->getPropertyValue("name") . "</div>"; 
                  echo "<div><a href='" . rootUrl  . "project?id=" . $pendingProject->getPropertyValue("ID") . "'><button class='seeProjectBtn'>Voir projet </button></a></div>";


                echo "</div></br>";

              }
    
           } else {

                 echo "pas de projet en cours";

              }

           ?>

       </div>

       <div class="seeProjectHeadersDivA">
          


<?php 

   if(count($waitingPaymentProjects) > 0){
      foreach($waitingPaymentProjects as $waitingPaymentProject )
     {
       echo "<div class='seeProjectHeadersDivAA'>";

       echo $waitingPaymentProject ; 
       echo "<a href='" . rootUrl  . "?id=" . $waitingPaymentProject->getPropertyValue("ID") . "'><button class='seeProjectBtn'>Voir projet </button>";
       echo "</div></br>";
   }

 } else {

  echo "<div style='background:none; justify-content:flex-start' class='seeProjectHeadersDivAA'>pas de projet impayé</div>";
  
 }

?>


       </div>

       <div class="seeProjectHeadersDivA">
            


    <?php 

      if(count($doneProjects) > 0){

        foreach($doneProjects as $doneProject ){

          echo "<div class='seeProjectHeadersDivAA'>";

          echo $doneProject->getPropertyValue("name"); 
          echo "<a href='" . rootUrl  . "project?id=" . $doneProject->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
          echo "</div></br>";

        }

      } else {

        echo "<div style='background:none; justify-content:flex-start' class='seeProjectHeadersDivAA'>Pas de projet accomplis</div>";

      }

      ?>

       </div>

   
  </div>






