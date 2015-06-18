<?php

include('cadre.php');

?>

<html>
 <head>
 <link rel="stylesheet" href="stylelog.css"/>
<!-- Include CSS File Here -->
<script src="login.js.js"></script>
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style.css" />



<script>

$(document).ready(function(){

    $("#submit").click(function{

        $.post(
            'login.php', // Un script PHP que l'on va créer juste après
            {
                login : $("#email").val();  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                password : $("#password").val();
            },

            function(data){ // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard
            },

            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
         );

    });

});

</script>


 </head>
<body>
<form class="form" method="post" action="#" >
<div class="corp">
<div class="container">
<div class="main">
<h2>Connexion a la base</h2></br> </br>
<label>Login :</label>
<input type="text" name="demail" id="email">
<label>Password :</label>
<input type="password" name="password" id="password">
<input type="submit" name="login" id="login" value="Connecter">
</div>



<?php
               if(isset($_POST["login"]))
                {  //echo "hhh";
                   $nom=$_POST["demail"];
                   $pass=$_POST["password"];
                  //if(isset($_POST["demail"])&& isset($_POST["password"]))
                  //{
                    if($nom && $pass){
                       if($nom=="toutou" && $pass=="13024"){
                         echo '<SCRIPT LANGUAGE="Javascript">	alert("Vous etes connecte!"); </SCRIPT>';

                         } else echo '<SCRIPT LANGUAGE="Javascript">alert("Login ou mot de passe incorrect !"); </SCRIPT>';

                       }
                     else echo '<SCRIPT LANGUAGE="Javascript">	alert("Il remplr toute les champs!"); </SCRIPT>';
                  }
              // }
         ?>

         <?php

    /**
     * Nous créons deux variables : $username et $password qui valent respectivement "Sdz" et "salut"


    $username = "admin";
    $password = "admin";

    if( isset($_POST['demail']) && isset($_POST['password']) ){

        if($_POST['demail'] == $username && $_POST['password'] == $password){ // Si les infos correspondent...
            session_start();
            $_SESSION['user'] = $username;
            echo "Success";
        }
        else{ // Sinon
            echo "Failed";
        }

    } */

?>
</div>
</div>
</form>
</body>
</html>