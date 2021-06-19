

<div id="leftHomeDiv">
      <div class="leftHomeDivA">
              <div class="leftHomeDivAA">
                   <div class="leftHomeDivAAA">
                          <img class="homeImg" src="public/assets/img/cash.png">
                   </div>
              </div>
              <div class="leftHomeDivAB">
                   <div class="leftHomeDivABA"> Cash total encaissé </div>
                   <div class="leftHomeDivABB">£ 2500</div>
               </div>
     </div>

         <div class="leftHomeDivA">
             <div class="leftHomeDivAA">
                   <div class="leftHomeDivAAA">
                        <img class="homeImg" src="public/assets/img/finance.png">
                   </div>
              </div>
              <div class="leftHomeDivAB">
                   <div class="leftHomeDivABA">Total cash dû</div>
                   <div class="leftHomeDivABB"> 275 £</div>
               </div>
     </div>
     <div class="leftHomeDivA">
             <div class="leftHomeDivAA">
                   <div class="leftHomeDivAAA">
                      <img class="homeImg" src="public/assets/img/users.png">
                   </div>
              </div>
              <div class="leftHomeDivAB">
                   <div class="leftHomeDivABA">Nombre d'utilisateurs</div>
                   <div class="leftHomeDivABB"> 125</div>
               </div>
     </div>
</div>



<div id="rightHomeDiv">

      <div class="rightHomeDivA">
          <div class="rightHomeDivAA">
              <div class="rightHomeDivAAA">
                    <img class="homeImg" src="public/assets/img/test.png">
              </div>
          </div>
          <div class="rightHomeDivAB">
                  <div class="rightHomeDivABA">Projets en cours</div>
                  <div class="rightHomeDivABB">17</div>            
          </div>
      </div>

      <div class="rightHomeDivA">
          <div class="rightHomeDivAA">
                <div class="rightHomeDivAAA">
                   <img class="homeImg" src="public/assets/img/valid.png">
                </div>
          </div>
          <div class="rightHomeDivAB">
                  <div class="rightHomeDivABA">Total projets accomplis</div>
                  <div class="rightHomeDivABB">55</div>       
          </div>
      </div>

</div>



<div id='usersLogo'>
    <img class="userImg" src="public/assets/img/user.png">
</div>

<form>
   <input id="findUserInput" type="text" placeholder="Trouves tes utilisateurs">
</form>


<div id="foundUsers">
</div>

</br></br>

<div id="usersDiv">  
  
 <?php

    $usernames = [];
    $userIds = [];

    foreach($users as $user){

      $usernames[] = $user->getPropertyValue("username");
      $userIds[] = $user->getPropertyValue("ID");

    }

  ?>



</div>




 <script>

      var findUserInput = document.getElementById("findUserInput");
      var foundUsers =  document.getElementById("foundUsers");
      var usernames = <?php echo json_encode($usernames) ?>;
      var userIds = <?php echo json_encode($userIds) ?>;

      var foundUsersDiv = document.getElementById("foundUsers");

      var foundUsersArray = [];



  

      findUserInput.addEventListener("keyup", function(){

        findUserFromString(findUserInput.value);

      });

      function findUserFromString(string)
      {


        let found = 0;

        initFoundUsers();

        setTimeout(() => {

          
          for(i=0; i < usernames.length; i++){
            


                if(usernames[i].substring(0,string.length) == string && foundUsersArray.includes(usernames[i]) == false && string != ""){

                     foundUsersArray.push(usernames[i]);
                     foundUsersDiv.innerHTML += "<a class='foundUsersA' href='<?php echo rootUrl ?>user?id=" + userIds[i] + "'><div>" + usernames[i] + "</div></a>"; 
                     found++;

               }

               
           }  



           if(found > 0)
           { 
            foundUsers.style.display = "flex";

           }

          
        }, 100);
         
     }


   function initFoundUsers()
   {
     foundUsersDiv.innerHTML = "";
     foundUsersArray = [];
     foundUsers.style.display = "none";


   }

 </script>