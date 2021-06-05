<h1>Your projects</h1>
<br/><br/>

<input id="projectInput" type="text" placeholder="Find your project">
<button>Chercher</button>

<div id="searchResults">

</div>


<br/><br/>

<h3>Projets en cours</h3>

<br/><br/>
  <?php 

    foreach($doneProjects as $project)
    {

        echo $project->getPropertyValue("name");
        echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
        echo "</br>";

    }


  ?>
  <br/><br/>


<h3>Projets terminés (paiement réalisé)</h3>

<br/><br/>

<?php 


  foreach($pendingProjects as $project)
  {
    echo $project->getPropertyValue("name");
    echo "<a href='" . rootUrl  . "project?id=" . $project->getPropertyValue("ID") . "'><button>Voir projet </button></a>";
    echo "</br>";

  }

?>

<br/><br/>

<h3> Projets terminés (en attente de paiement) </h3>

<br/><br/>



<script>


   var searchResults = document.getElementById("searchResults");
   
   var projectInput = document.getElementById("projectInput");

   projectInput.addEventListener("keyup", function(){showSearchResult()});


   function showSearchResult()
   {
       //ajax

       let xrq = new XMLHttpRequest();

       xrq.onload = function()
       {
         alert("project sent!");
       }

       xrq.open('POST', '<?php echo rootUrl ?>getProjectsFromJson' , true);

       xrq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");


       xrq.send("projectString= myString");

       searchResults.innerHTML = "" ;
   
   }


</script>