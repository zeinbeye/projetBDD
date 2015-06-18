<?php

//include "index.php";

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

?>
<?php
//if(isset($_GET['cherche_chauff'])){
//$retour='select distinct nom_chauff from chauffeurs'; // afficher les chauffeur

?>

<html>

<head>
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="table.css" />
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

</style>
</head>

<body>
<pre>
<div class="corp2">

<form action="chercher_voyageur.php" method="post" >
   <FIELDSET>
 <LEGEND align=top>Critere de recherche</LEGEND>
<pre>
Nom          :        <input type="text" name="nomvoyageur"><br/><br/>
<input type="submit" name="Submit" value="Chercher" size="40">
</pre></fieldset>
</form>
<a href="index.php">Revenir à la page principale!</a>

<?php
//}
if(isset($_POST['nomvoyageur'])){
  $nomvoyageur=$_POST['nomvoyageur'];



?>
<center><table bgcolor="#66CCFF" border="1" id="rounded-corner"  width=400px>
<thead><tr><?php //echo Edition();?>
 <th scope="col" align="left" >Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 <th scope="col" class="rounded-q2">Telephone</th>
 <th scope="col" class="rounded-q2">Ville_dep</th>
 <th scope="col" class="rounded-q2">Ville_arr</th>
 <th scope="col" class="rounded-q2">Prix</th>
 <th scope="col" class="rounded-q4">Num_voyage</th>
 </tr></thead>

<tbody>
 <?php
$sql="SELECT nom, tel,ville_dep,ville_arr, prix_billet,num_voy FROM a_transporter where nom LIKE '%$nomvoyageur%'";              //option contient les info suplimentaire

$cherche = oci_parse($con, $sql);
//print_r( $stmt);

oci_execute($cherche);

 //while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
while ($row = oci_fetch_assoc($cherche))
{
 //print_r( $row);
echo '<tr><td>'.$row['NOM'].'</td><td>'.$row['TEL'].'</td><td>'.$row['VILLE_DEP'].'</td><td>'.$row['VILLE_ARR'].'</td><td>'.$row['PRIX_BILLET'].'</td><td>'.$row['NUM_VOY'].'</td></tr>';
}

 ?>
  </tbody>
</table></center>
<a href="chercher_voyageur.php?cherche_eleve=true">Revenir à la page precedente !</a>
<?php

}

?>
</div>
</pre>
</body>
</html>