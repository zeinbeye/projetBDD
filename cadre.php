<?php



//include('index.php');


/* 
$con=oci_connect("nb_proj","nb_proj","(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = Orcl)
    )
  )

");
if($con)
echo "vous etes connectes";
else
echo "non connecte";



if(isset($_POST['mdp'])){
if($_POST['mdp']!="" and $_POST['pseudo']!=""){
	$mdp=$_POST['mdp'];
	$pseudo=$_POST['pseudo'];
	$nb="select count(*) as nb,type,nom from login where pseudo='$pseudo' and passe='$mdp'";
    //include("select.php");
$stmt = oci_parse($con, $nb);
//print_r( $stmt);
oci_execute($stmt);
	if($nb['nb']==1){
		if($nb['type']=="admin")
			$_SESSION['admin']=$nb['nom'];
		else if($nb['type']=="emp")
			$_SESSION['emp']=$nb['nom'];
	}
	else{
	?>	<SCRIPT LANGUAGE="Javascript">alert("Login ou mot de passe incorrect");</SCRIPT> 	<?php
	}
	}
	else{
	?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");	</SCRIPT> 	<?php
	}
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
 <link rel="stylesheet" href="stylelog.css"/>
<!-- Include CSS File Here -->
<script src="login.js.js"></script>


<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style.css" />

<style>

.esp{
  margin-top: 1em;
}
.esp2{
  margin-top: 5em;
}


</style>
 </head>
<body>

 <div class="corp"></div>
<marquee><font color="#FFFFFF"> VOTRE TEXTE</font></marquee>
</div>
</div>
<div class="menu">

<LEGEND align=top><font color="#FFFF00">&nbsp;&nbsp;<u><b>Menu</b></u></font></LEGEND><br />
         <div id="cssmenu1" >
         <ul class="niveau1">
			<li><a href="#" title="Link 1" class="fly">Voyades</a></li>
			<li><a href="#" title="Link 2">Voyageurs</a></li>
            <li><a href="#">Colis</a></li>
			<li><a href="#" title="Link 4">Villes</a></li>
			<li><a href="#">Bus</a></li>
            <li><a href="#">Chauffeurs</a></li>

		</ul>
         </div>
          	</div>


<div class="pib">

<div class="esp2"></div>
 nbnbnb
 <marquee> WENNI TOUTOU</marquee>
<marquee> <img src="chercher.png" alt="toutou"/></marquee>
</div>
<div class="connexion2"><LEGEND align=top><font color="#FFFF00">&nbsp;&nbsp;<u><b><a href="login.php"  style=" color: #FFFF00">Connecter</a></b></u></font></LEGEND><br /></div>

<div class="pied"><font color= "#FFFF00"><br/><center>&reg; 2015 ESP </center></font></div>
</body>
</html>

