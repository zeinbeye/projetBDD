<?php
//include "index.php";
//include('cadre2.php');
include('voyage.php');
//sinclude('calendrier.htm');


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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<?php

if (isset($_POST['Submit']))
{
   	$S_num=$_POST['num'];
    $S_datedep=$_POST['datedep'];
	$S_datearr=$_POST['datearr'];
    $S_ville_dep=$_POST['ville_dep'];
    $S_ville_arr=$_POST['ville_arr'];
	$S_matricul_bus=$_POST['matricul_bus'];



///////////////////////////////////
////////////////////////Ajout à la data base
$query ="INSERT INTO voyages ( id_voy ,num_voyages ,date_dep ,date_arr ,ville_dep ,ville_arr ,matricule ) VALUES(Seq_voyages_id_voy.NEXTVAL,
'$S_num',TO_DATE('$S_datedep','DD/MM/YYYY HH24:MI'),TO_DATE('$S_datearr','DD/MM/YYYY HH24:MI'),'$S_ville_dep','$S_ville_arr','$S_matricul_bus')";
?>
<SCRIPT LANGUAGE="Javascript">	alert("Ajouté avec succés!"); </SCRIPT>

<?php

//$query ="INSERT INTO voyages ( id_voy ,num_voyages ,date_dep ,date_arr ,ville_dep ,ville_arr ,matricule ) VALUES('Seq_voyages_id_voy.NEXTVAL',
//'$S_num','$S_datedep’,'$S_datearr','$S_ville_dep','$S_ville_arr','$S_matricul_bus')";
$result= oci_parse($con,$query);
oci_execute($result,OCI_COMMIT_ON_SUCCESS);
//print_r($result);
//$result=odbc_execute($prepare);

//echo " le voyageur <Strong>$S_nom</Strong> a été rajouté avec succés, cliquer <a href='cadre.php'>ici</a><br>  pour revenir à la page d'accueil.";


if (isset($_POST['annul']))
{
	header ('location: cadre.php');
}
}
?>

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
<h1> <center> <font color="#669900">Ajouter des voyages</font> </center>  </h1>
<form action="#" method="post">
  <div>
    <label for="name">Numero du voyage :</label>
    <input type="text" id="name" name="num">
  </div>
   <div class="esp"></div>
   <div>
    <label for="name">Date de depart :</label>
    <input type="text" id="prenm" name="datedep">
  </div>
   <div class="esp"></div>
   <div>
    <label for="name">Date d'arriver :</label>
    <input type="text" id="prenm" name="datearr">
  </div>
   <div class="esp"></div>
<?php
 $sql = 'SELECT nom_ville  FROM villes';
 $stmt = oci_parse($con, $sql);
 oci_execute($stmt);
//while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
?>
  <div>
    <label for="mail">Ville dedepart :</label>
    <select <select name="ville_dep"  ><?php while ($row = oci_fetch_assoc($stmt)){
 // print_r( $row);
echo '<option value="'.$row['NOM_VILLE'].'">'.$row['NOM_VILLE'].'</option>';
 }
?></select>
  </div>
     <div class="esp"></div>
     <?php
//if (isset($_POST['Submit']))
//{
   	//$ville_dep=$_POST['ville_dep'];

 $sql = "SELECT nom_ville  FROM villes ";
 $stmt = oci_parse($con, $sql);
 oci_execute($stmt);
//while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)

?>
   <div>
    <label for="mail">Ville d'arriver :</label>
    <select <select name="ville_dep"  ><?php while ($row = oci_fetch_assoc($stmt)){
 // print_r( $row);
echo '<option value="'.$row['NOM_VILLE'].'">'.$row['NOM_VILLE'].'</option>';
 }
?></select>
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
