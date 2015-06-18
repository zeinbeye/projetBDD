<?php

//include "index.php";

//include "index.php";
include('voyage.php');

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

<form action="chercher_voyage.php" method="post" >
   <FIELDSET>
 <LEGEND align=top>Critere de recherche</LEGEND>
<pre>
Numero du voyage   :        <input type="text" name="nomvoyage"><br/><br/>
<input type="submit" name="Submit" value="Chercher" size="40">
</pre></fieldset>
</form>
<a href="index.php">Revenir à la page principale!</a>

<?php
//}
if(isset($_POST['nomvoyage'])){
  $nomvoyage=$_POST['nomvoyage'];



?>
<center><table bgcolor="#66CCFF" border="1" id="rounded-corner"  width=400px>
<thead><tr><?php //echo Edition();?>
 <th scope="col"  align="left">Num_voyage</th>
 <th scope="col" class="rounded-q2">Date_dep</th>
 <th scope="col" class="rounded-q2">Date_arr</th>
 <th scope="col" class="rounded-q2">Ville_dep</th>
 <th scope="col" class="rounded-q2">Ville_arr</th>
 <th scope="col" class="rounded-q2">Matricul_bus</th>
 </tr></thead>

<tbody>
 <?php
$sql="SELECT * FROM affich_voyage where num_voyages ='$nomvoyage'";   //option contient les info suplimentaire

$cherche = oci_parse($con, $sql);
//print_r( $stmt);

oci_execute($cherche);

 //while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
while ($row = oci_fetch_assoc($cherche))
{
 //print_r( $row);
echo '<tr><td>'.$row['NUM_VOYAGES'].'</td><td>'.$row['DATE_DEP'].'</td><td>'.$row['DATE_ARR'].'</td><td>'.$row['VILLE_DEP'].'</td><td>'.$row['VILLE_ARR'].'</td><td>'.$row['MATRICULE'].'</td></tr>';
}

 ?>
  </tbody>
</table></center>
<a href="chercher_voyage.php?cherche_eleve=true">Revenir à la page precedente !</a>
<?php

}

?>
</div>
</pre>
</body>
</html>