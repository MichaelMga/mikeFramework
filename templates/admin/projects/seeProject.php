


<?php 

if($admin == true){

  echo "<div id='newActionFormContainer'>";

  echo "<form style='display:flex; flex-direction:row; width:100%' action='" . rootUrl ."dbNewAction' method='post'>
  
   <input name='action' type='text' placeholder='nouvelle action'>
   <input name='projectId' type='hidden' value=" . $_GET["id"] . ">
   <input id='submitActionBtn' type='submit' value='créer une action'>
        
   </form>";

  echo "</div>";


}  

?>


<div id="seeProjectContainer">


    <div id="seeProjectContainerA">

    <div id="seeProjectContainerAB">

           <div id="projectNameContainer" class="seeProjectContainerABA"> Projet : <?php echo $project->getPropertyValue("name") ?> </div>

      
                
            <?php 


              if($admin == true){
  
                                                                                                                                                               
               echo "<div class='seeProjectContainerABA'>";

               if($projectStatus == "pending" )
                {
                  echo '<div class="seeProjectContainerABAA"><h4> Statut : </h4> en cours </div> ';
                  echo "<div class='seeProjectContainerABAA'><a href='" . rootUrl . "updateProjectStatus?projectId=" . $_GET["id"] . "&newStatus=done'><button id='projectDoneBtn'>Passer le projet en terminé</button></a></div>";
                  
                } else {

                     echo '<div class="seeProjectContainerABAA"><h4> Statut : </h4> terminé </div>';
                     echo "<div class='seeProjectContainerABAA'><a href='" . rootUrl . "updateProjectStatus?projectId=" . $_GET["id"] . "&newStatus=pending'><button id='projectDoneBtn'>Repasser le projet à en cours</button></a></div>";     

               }


               echo "</div>";




         } else {

          if($leftAmount > 0){

            echo "<div  class='seeProjectContainerABB'>";
        
        
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
        
            echo "</div>";
        
        
           } else {
        
            echo "<div>Le prix a été réglé dans son intégralité. :)</div>";


           }



         }


          ?>

    </div>


     <div id="paymentInfoDiv">
        <div id="paymentInfoDivA">
         <div id="paymentInfoDivAA">Montant restant à régler</div>
           <div id="paymentInfoDivAB">
           <?php 
               echo "$leftAmount  £";
            ?>
        </div>
    </div>

    <div id="paymentInfoDivB">
       <div id="paymentInfoDivBA">
            <div id="paymentInfoDivBAA">Montant total :</div>
            <div id="paymentInfoDivBAB">
               <?php 
                 echo "$totalAmount  £";
               ?>
            </div>
        </div>
        <div id="paymentInfoDivBB">
            <div id="paymentInfoDivBAA">Montant réglé :</div>
            <div id="paymentInfoDivBAB">
               <?php 
                 echo "$paidAmount £";
               ?>
             </div>
          </div>
       </div>
    </div>



    </div>

 
    <div id="seeProjectContainerB">

    
   <div id='actionsDiv'>

   <?php 

   
  if(count($actions) > 0)
  {
    foreach($actions as $action)
    {
       echo "<div class='actionsDivA'>";

       echo "<div id='actionsDivAA'>" . $action->getPropertyValue("name");
       $status = $action->getPropertyValue("status");
       $id = $action->getPropertyValue("ID");
 
       if($status == "pendingAction"){

         echo " (statut: en cours)</div>"; 

         if($admin == true){

                echo "<div id='actionsDivAB'><a href='"  . rootUrl . "updateActionStatus?actionId=$id&newStatus=doneAction'><button>Passer à fait</button></a></div>";
         }
         
 
       } else if($status == "doneAction") {

         echo " (statut: terminé)</div>"; 

         if($admin == true){

               echo "<div id='actionsDivAB'><a href='"  . rootUrl . "updateActionStatus?actionId=$id&newStatus=pendingAction'><button>Repasser à en cours</button></a></div>";

         }

       
     } else {
 
         echo "erreur d'affichage, statut non reconnu";
         echo "</br>";

       }


       echo "</div>";

 
    }

  } else {

    echo "il n'y a pas encore d'actions enregistrées sur ce projet";
  }


?>


   </div>



    </div>

</div>






</br></br>
