<?php



//include('index.php');






/*
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
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style.css" />

<body>

<div class="corp"></div>

<marquee><font color="#FFFFFF"> VOTRE TEXTE</font></marquee>
<div class="pib">
<marquee> <img src="corp.PNG"   alt="toutou"/></marquee>
 	</div>
<div class="menu">

<LEGEND align=top><font color="#FFFF00">&nbsp;&nbsp;<u><b>Menu</b></u></font></LEGEND><br />
         <div id="cssmenu1" >
         <ul class="niveau1">
			<li><a href="voyage.php" title="Link 1" class="fly">Voyades</a></li>
			<li><a href="voyageur.php" title="Link 2">Voyageurs</a></li>
            <li><a href="colis.php">Colis</a></li>
			<li><a href="ville.php" title="Link 4">Villes</a></li>
			<li><a href="bus.php">Bus</a></li>
            <li><a href="chauffeur.php">Chauffeurs</a></li>

		</ul>
         </div>
          	</div>


<div class="pib"> nbnbnb</div>

<div class="pied"><font color= "#FFFF00"><br/><center>&reg; 2015 ESP </center></font></div>

<div class="connexion2"><LEGEND align=top><font color="#FFFF00">&nbsp;&nbsp;<u><b><a href="cadre.php"  style=" color: #FFFF00">Déconnecter</a></b></u></font></LEGEND><br /></div>


</body>
</html>

