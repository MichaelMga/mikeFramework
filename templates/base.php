<html>

  <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href= "public/assets/main.css">
       <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
       <script src="https://js.stripe.com/v3/"></script>
       <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap" rel="stylesheet">
  </head>

   <body>
  
     <header> 
     
       <div id="navBar">


          <div id="navBarA">

             <a href="<?php echo rootUrl ?>"><img src="public/assets/img/theologo.png"></a>

          </div>


          <div  id="navBarB">


          <?php

 
             if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){


                if($_SESSION["username"] == admin){
                    echo "<a href='" . rootUrl . "projects'><img class='navImg' src='public/assets/img/foldernav.png'></a>";
                    echo "<a href='" . rootUrl . "newProject'><img class='newProjectImg' src='public/assets/img/newProject.png'></a>";
                 } 

                 echo "<a href='" . rootUrl . "bLogout'><img class='navImg' src='public/assets/img/logout.png'></a>";

  
             } else {
                echo "<a href='" . rootUrl . "login'><img class='navImg' src='public/assets/img/login.png'></a>"; 
                echo "<a href='" . rootUrl . "register'><img class='navImg' src='public/assets/img/registerNav.png'></a>";
             }


 
          ?>   
 


          </div>

       



       </div>

    </header>


   <main>
   
