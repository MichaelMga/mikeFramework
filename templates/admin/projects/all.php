<h1>Vos projets</h1>


<div id="searchResults">

</div>

<div id="paymentButtons">
     <button onclick='displayPaidProjects()'>payés</button>
     <button onclick='displayUnPaidProjects()'>impayés</button>
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

        echo $project->getPropertyValue("name");
        echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
        
        echo "</div>";

       } else {

        echo "<div class='projectsContainerDivA unPaidProjects'>";



         echo $project->getPropertyValue("name");
         echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
         echo "</br>";

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
         echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><button>Voir projet </button></a>";

         echo "</div>";


    } else {

      echo "<div class='projectsContainerDivA unPaidProjects'>";
    
      echo $project->getPropertyValue("name");
      echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
      
      echo "</div>";



      
    }

  }

?>

</div>

<br/><br/>

<br/><br/>



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
      document.getElementById("pendingProjects").style.display = "flex";
   }



   function hideDoneProjects()
   {
      document.getElementById("doneProjects").style.display = "none";


   }


   function displayDoneProjects()
   {
     hidePendingProjects();
     document.getElementById("doneProjects").style.display = "flex";

   }



   function hidePendingProjects()
   {
      document.getElementById("pendingProjects").style.display = "none";

   }





</script>