
<div id="searchResults">

</div>

<div id="paymentButtons">
     <button id="paidBtn" onclick='displayPaidProjects()'>payés</button>
     <button id="unpaidBtn" onclick='displayUnPaidProjects()'>impayés</button>
</div>



<div id="projectSideNav">

    <a onclick="displayPendingProjects()" id="pendingProjectsButton" class="projectSideNavA">Projets en cours</a>
    <a onclick="displayDoneProjects()" id="doneProjectsButton"  class="projectSideNavA">Projets terminés</a>

</div>


<div class="projectsContainerDiv" id="doneProjects">


  
   <?php 

    foreach($doneProjects as $project)
    {

      if($project->getPropertyValue("paid_amount") >= $project->getPropertyValue("total_amount")){

         echo "<div class='projectsContainerDivA paidProjects'>";

           echo "<div>" . $project->getPropertyValue("name") . "</div>";

           echo "<div><a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><img class='projectLinkImg' src='public/assets/img/folder.png'></a></div>";
         
         echo "</div>";

       } else {

         echo "<div class='projectsContainerDivA unPaidProjects'>";

           echo "<div>" . $project->getPropertyValue("name") . "</div>";
           echo "<div><a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><img class='projectLinkImg' src='public/assets/img/folder.png'></a></div>";

         echo "</div>";

       }

    }


?>




</div>

<div class="projectsContainerDiv" id="pendingProjects">


<?php 


  foreach($pendingProjects as $project)
  {

    if($project->getPropertyValue("paid_amount") >= $project->getPropertyValue("total_amount")){

      echo "<div class='projectsContainerDivA paidProjects'>";
    
         echo $project->getPropertyValue("name");
         echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><img class='projectLinkImg' src='public/assets/img/folder.png'></a>";

      echo "</div>";

    } else {

      echo "<div class='projectsContainerDivA unPaidProjects'>";
    
        echo $project->getPropertyValue("name");


        echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><img class='projectLinkImg' src='public/assets/img/folder.png'></a>";
      
      echo "</div>";

      
    }

  }

?>

</div>




<script>



   function displayPaidProjects(){

     hideUnPaidProjects();

     let paidProjects = document.querySelectorAll('.paidProjects');
     
     console.log(paidProjects);


      for(i=0; i < paidProjects.length; i++)
      {
        paidProjects[i].style.display = "flex";

      }

   }


   function hidePaidProjects()
   {

    let paidProjects = document.querySelectorAll('.paidProjects');
     
      for(i=0; i < paidProjects.length; i++)
      {
        paidProjects[i].style.display = "flex";

      }
      
   }


   
   function displayUnPaidProjects(){

        hidePaidProjects();

        let unPaidProjects = document.querySelectorAll('.unPaidProjects');

        for(i=0; i < unPaidProjects.length; i++)
        {
          unPaidProjects[i].style.display = "flex";
        }

        
 
   }


   function hideUnPaidProjects()
   {

    let unPaidProjects = document.querySelectorAll('.unPaidProjects');
     
      for(i=0; i < unPaidProjects.length; i++)
      {
        unPaidProjects[i].style.display = "none";

      }


   }



   function displayPendingProjects()
   {
      hideDoneProjects();

      displayPendingBtn();
      document.getElementById("pendingProjects").style.display = "flex";
   }



   function hideDoneProjects()
   {
      hideDoneBtn();
      document.getElementById("doneProjects").style.display = "none";

   }


   function displayDoneProjects()
   {
     hidePendingProjects();

     displayDoneBtn();
     document.getElementById("doneProjects").style.display = "flex";

   }



   function hidePendingProjects()
   {
      hidePendingBtn()
      document.getElementById("pendingProjects").style.display = "none";

   }
   


   function displayPendingBtn(){

        document.getElementById("pendingProjectsButton").style.background = "rgb(210, 204, 204)";

   }


   

   function hidePendingBtn(){

    document.getElementById("pendingProjectsButton").style.background = "rgb(220, 213, 213)";
 
  }


  function displayDoneBtn(){

        document.getElementById("doneProjectsButton").style.background = "rgb(210, 204, 204)";

   }




  function hideDoneBtn(){

      document.getElementById("doneProjectsButton").style.background = "rgb(220, 213, 213)";

  } 
 





</script>