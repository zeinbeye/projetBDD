<?php
//session_start();
//include "index.php";
//include('cadre2.php');
include('voyageur.php');

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

<html>
<head>
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="style.css" />
<style>
.corp2
{
height:400px;
width:500px;
border : 0px inset black;
position : absolute;
top : 235px;
left :250px;
background-color: #D9D9e8;
}

</style>
</head>

<body>

<?php
$sql='SELECT id_trans  FROM affiche_voyageur where id_trans =(select max(id_trans) from affiche_voyageur )';

$cherche = oci_parse($con, $sql);
//print_r( $stmt);
oci_execute($cherche);


?>

<pre>
<div class="corp2">
<form action="biellet.php" method="post" >
<FIELDSET><LEGEND align=top>Code du voyageur</LEGEND><pre>
Code          :         <select name="nomvoyageur"  ><?php while ($row = oci_fetch_assoc($cherche)){
 // print_r( $row);
echo '<option value="'.$row['ID_TRANS'].'">'.$row['ID_TRANS'].'</option>';
 }
?></select><br/><br/>
<input type="submit" name="Submit" value="OK" size="40" ></pre></fieldset></form><a href="voyageur.php">Revenir à la page principale!</a>
<?php
//}
if(isset($_POST['nomvoyageur'])){
$nomvoyageur=$_POST['nomvoyageur'];
?>
<tbody>
<fieldset> <center><b>Znb voyage</b>
Nouakchott Telephone: 33596263
</center>
 <?php
$sql="SELECT nom, tel,ville_dep,ville_arr, prix_billet,num_voy FROM a_transporter where id_trans = '$nomvoyageur'";              //option contient les info suplimentaire

$cherche = oci_parse($con, $sql);
//print_r( $stmt);
oci_execute($cherche);
 //while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
while ($row = oci_fetch_assoc($cherche))
{
echo '<center><table bgcolor="#D9D9e8" border="0" id="rounded-corner"  width=600px> <tr> <th scope="col" align="left"  >Nom :</th>
<td>'.$row['NOM'].'</td><th  align="left">Telephone  : </th><td>'.$row['TEL'].'</td></tr><tr><th  align="left">Ville_dep  :</th>
<td>'.$row['VILLE_DEP'].'</td> <th  align="left">Ville_arr  : </th><td>'.$row['VILLE_ARR'].'</td></tr><tr> <th  align="left">Prix  :
</th><td>'.$row['PRIX_BILLET'].'</td> <th  align="left">Num_voyage  : </th><td>'.$row['NUM_VOY'].'</td></tr></table></center>';
echo '<br/><br/><center><input type="submit" name="Submit" value="Imprimer" align="right"></center>';}?>
</fieldset></tbody>
<a href="biellet.php">Revenir à la page precedente !</a>
<?php

}

?>
</div>
</pre>
</body>
</html>