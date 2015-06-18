<?php
include('chauffeur.php');
//include "index.php";
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
?> <SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT>

<?php

$result= oci_parse($con,$query);
oci_execute($result,OCI_COMMIT_ON_SUCCESS);
//echo $result;
//$result=odbc_execute($prepare);

//echo " le voyageur <Strong>$S_nom</Strong> a été rajouté avec succés, cliquer <a href='cadre.php'>ici</a><br>  pour revenir à la page d'accueil.";


if (isset($_POST['annul']))
{
	header ('location: cadre2.php');
}


}

//echo '<scrpit type="text/javascript">';

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style1.css" />
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style.css" />

 <style>
.corp2
{
height:300px;
width:500px;
border : 0px inset black;
position : absolute;
top : 265px;
left :400px;
background-color: #D9D9e8;
}
form {
  /* Just to center the form on the page */
  margin: 0 auto;
  width: 500px;


  /* To see the limits of the form */
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

.esp{
  margin-top: 1em;
}
.esp2{
  margin-top: 5em;
}

label {
  /* To make sure that all label have the same size and are properly align */
  display: inline-block;
  width: 130px;
  text-align: right;
}

input, textarea {
  /* To make sure that all text field have the same font settings
     By default, textarea are set with a monospace font */
  font: 1em sans-serif;

  /* To give the same size to all text field */
  width: 300px;

  -moz-box-sizing: border-box;
       box-sizing: border-box;

  /* To harmonize the look & feel of text field border */
  border: 1px solid #999;
}

input:focus, textarea:focus {
  /* To give a little highligh on active elements */
  border-color: #000;
}

textarea {
  /* To properly align multiline text field with their label */
  vertical-align: top;

  /* To give enough room to type some text */
  height: 5em;

  /* To allow users to resize any textarea vertically
     It works only on Chrome, Firefox and Safari */
  resize: vertical;
}

.button {
  /* To position the buttons to the same position of the text fields */
  padding-left: 90px; /* same size as the label elements */
}

button {
  /* This extra magin represent the same space as the space between
     the labels and their text fields */
  margin-left: .5em;
}

</style>


<script language="JavaScript">

		function verif_matricule(){
		    var matricule	=document.getElementById("matricule").value;
		    var int_regexp=/^[0-9]{1,}$/;
		    if (!matricule.match(int_regexp))
		   	  {
		    	return false;
		      }
		    else return true;
		 }
function controlerData()  {
	if (!verif_matricule()){
		alert("le matricule est de type entier ");
        return false;
	}
	else
	document.getElementById("entrprise").submit();
    return true;
	}
</script>


</head>
<body>
<form  id='entrprise' name='entrprise' action="ajout_chauff.php" method='post' onsubmit=' return controlerData()'>
<div class="corp2">
<h1> <center> <font color="#669900">Ajouter des chauffeurs</font> </center>  </h1>
  <div>
    <label for="name">Nom :</label>
    <input type="text" id="name" name="nom_chauf">
  </div>
   <div class="esp"></div>
   <div>
    <label for="name">Telephone:</label>
    <input type="text" id="matricule" name="matricule" maxlength="8">
  </div>
   <div class="esp"></div>
   <div>
    <label for="name">Adresse :</label>
    <input type="text" id="prenm" name="adresse">
  </div>
   <div class="esp"></div>
   <div class="esp"></div>
  <div class="button">
  <button type="submit" name="Submit" >Valider</button>
  <button type="submit" name="annul" >Annuler</button>
  </div>

</div>
</form>


</body>

</html>
