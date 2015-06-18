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

<html>
<head>
<link rel="stylesheet" media="screen" type="text/css" title="Essai" href="table.css" />

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
<div class="corp2">
<center><h1>Liste des chauffeurs</h1></center>
<center><table  border="1" id="rounded-corner"  width=500px>
<thead><tr><?php //echo Edition();?>
 <th scope="col" class="rounded-q1">Modifier</th>
  <th scope="col" class="rounded-q1">Suprimer</th>
 <th scope="col" class="<?php //echo rond(); ?>">Nom</th>
 <th scope="col" class="rounded-q2">Telephone</th>
 <th scope="col" class="rounded-q3">Adresse</th>
 </tr></thead>
<tfoot>

</tfoot>
 <tbody>

 <?php
 $sql = 'SELECT * FROM chauffeurs';
 //include("select.php");
$stmt = oci_parse($con, $sql);
//print_r( $stmt);

oci_execute($stmt);

//while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
while ($row = oci_fetch_assoc($stmt))
{
 //print_r( $row);
//echo '<tr><td><a href="#">modifier</a></td><td><a href="#" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cette entrée?\'));">supprimer</a></td></tr>';
echo '<tr><td><a href="modifier_chauff.php?modif_chauff='.$row['NOM_CHAUFF'].'">modifier</a></td><td>
<a href="modifier_chauff.php?sup_chauff='.$row['NOM_CHAUFF'].'" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cette entrée?\'));">supprimer</a></td>
<td>'.$row['NOM_CHAUFF'].'</td><td>'.$row['TEL_CHAUFF'].'</td><td>'.$row['ADRESSE_CHAUFF'].'</td></tr>';
}
?>

<?php
//while($a=mysql_fetch_array($data)){
?>
<?php //if(isset($_SESSION['admin'])){
//echo '<tr><td><a href="modif_prof.php?modif_prof='.$a['numprof'].'">modifier</a></td><td><a href="modif_prof.php?supp_prof='.$a['numprof'].'" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cette entrée?\'));">supprimer</a></td>';}
//}
?>
</tbody>
</table></center>
<?php
//echo '<br/><br/><a href="index.php">Revenir à la page précédente !</a>';
?>
</div>
</html>
