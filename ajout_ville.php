<?php
//include "index.php";
include('ville.php');
//include('cadre2.php');

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
   	$S_ville=$_POST['ville'];
    $S_distance=$_POST['distance'];
///////////////////////////////////
////////////////////////Ajout à la data base
$query ="INSERT INTO villes ( id_ville ,nom_ville ,distance ) VALUES(Seq_villes_id_ville.NEXTVAL, '$S_ville','$S_distance')";
?>
<SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT>
<?php
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style1.css" />
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style.css" />

 <style>
.corp2
{
height:400px;
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

</head>

<body>

<div class="corp2">
<h1> <center> <font color="#669900">Ajouter des bus</font> </center>  </h1>
<form action="#" method="post">
  <div>
    <label for="name">Nom_ville :</label>
    <input type="text" id="name" name="ville">
  </div>
   <div class="esp"></div>
   <div>
    <label for="name">Distance :</label>
    <input type="number" id="distance" name="distance" maxlength="4">
  </div>
   <div class="esp"></div>
   <div class="esp"></div>
  <div class="button">
  <button type="submit" name="Submit">Valider</button>
  <button type="submit" name="annul" >Annuler</button>
  </div>
</form>
</div>



</body>

</html>