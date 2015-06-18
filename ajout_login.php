<?php
include('cadre2.php');
include "index.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title></title>
  <h1><center></center></h1>
</head>
<body>
<form  name ="" method="post" action="">
<div class="corp">
<br /><br />
<center><h1>Ajouter un login</h1></center>
<br /><br />
<table  align="center" bgcolor= "#6699FF" width=500px border="0" cellpadding="2" cellspacing="0" >
<tr>
<td width="10%" align="left" ></td>
<td width="10%" align="left" ></td>
</tr>
<tr>
<td width="10%" align="left" > Pseudo :</td>
<td width="20%"><input type="text" name="pseudo" size="40"  /></td>
</tr>
<tr>
<td  width="10%"  align="leftt">mot de passe: </td>
<td width="20%" ><input type="text" name="mdp" size="40"></td>
</tr>
<tr>
<td  width="40%"  align="left">type :</td>
<td width="20%" ><input type="text" name="type" size="40"></td>
</tr>
<tr>
<td  width="10%"  align="left">Nom :</td>
<td width="20%" ><input type="text" name="nom" size="40"></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" name="Submit" value="Valider" size="10">
<input type="submit" name="annul" value="Annuler" size="10">

</td>
</tr>


</table>
</div>
  </form>
   <?php

if (isset($_POST['Submit']))
{
   	$S_pseudo=$_POST['pseudo'];
    $S_mot_passe=$_POST['mdp'];
	$S_type=$_POST['type'];
    $S_nom=$_POST['nom'];
       /*	$S_nom=1;
	$S_prenom=2;
	$S_tel=3;
	$S_nomVDep=4;
    $S_nomVArr=5;
	$S_numvoyage=6;
	$S_prixBillet=7; */

///////////////////////////////////
////////////////////////Ajout à la data base
$query ="INSERT INTO login (id_log,pseudo,passe,type,nom) VALUES(Seq_LOGIN_ID_LOG.NEXTVAL, '	$S_pseudo','$S_mot_passe','$S_type','$S_nom')";
?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT> <?php

$result= oci_parse($con,$query);
oci_execute($result,OCI_COMMIT_ON_SUCCESS);
//$result=odbc_execute($prepare);

//echo " le voyageur <Strong>$S_nom</Strong> a été rajouté avec succés, cliquer <a href='cadre.php'>ici</a><br>  pour revenir à la page d'accueil.";


if (isset($_POST['annul']))
{
	header ('location: cadre.php');
}


}



?>

</body>

</html>
