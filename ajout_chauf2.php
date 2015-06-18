 <?php
 //include('ajout_chauff.php');
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

?>
<?php

if (isset($_POST['Submit']))
{
   	$S_nom=$_POST['nom_chauf'];
    $S_tel=$_POST['matricule'];
	$S_adresse=$_POST['adresse'];
       /*	$S_nom=1;
	$S_prenom=2;
	$S_tel=3;
	$S_nomVDep=4;
    $S_nomVArr=5;
	$S_numvoyage=6;
	$S_prixBillet=7; */

///////////////////////////////////
////////////////////////Ajout à la data base
//$query ="INSERT INTO chauffeurs (Nom_chauff,Tel_chauff,Adresse_chauff) VALUES('$S_nom', '$S_tel','$S_adresse')";
$query ="begin AJOUT_CHAUFFEUR('$S_nom', '$S_tel','$S_adresse');end;";
?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT> <?php

$result= oci_parse($con,$query);
oci_execute($result,OCI_COMMIT_ON_SUCCESS);
//$result=odbc_execute($prepare);

//echo " le voyageur <Strong>$S_nom</Strong> a été rajouté avec succés, cliquer <a href='cadre.php'>ici</a><br>  pour revenir à la page d'accueil.";


if (isset($_POST['annul']))
{
	header ('location: cadre2.php');
}


}



?>