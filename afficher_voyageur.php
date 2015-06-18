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

<div class="corp2">
<?php
//$data=mysql_query("select * from prof");
?>

<center><h1>Liste des voyageurs</h1></center>
<center><table  border="1" id="rounded-corner"  width=400px>
<thead><tr><?php //echo Edition();?>
 <th scope="col" align="left" >Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
 <th scope="col" class="rounded-q2">Telephone</th>
 <th scope="col" class="rounded-q2">Ville_dep</th>
 <th scope="col" class="rounded-q2">Ville_arr</th>
 <th scope="col" class="rounded-q2">Prix</th>
 <th scope="col" class="rounded-q2">Num_voyage</th>
 </tr></thead>
<tfoot>
<tr>
<td colspan="<?php //echo colspan(5,7); ?>"class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
 <tbody>

  <?php
 $sql = 'select * from  affiche_voyageur';
 //include("select.php");
$stmt = oci_parse($con, $sql);
//print_r( $stmt);

oci_execute($stmt);

//while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
while ($row = oci_fetch_assoc($stmt))
{
// print_r( $row);
echo '<tr><td>'.$row['NOM'].'</td><td>'.$row['TEL'].'</td><td>'.$row['VILLE_DEP'].'</td><td>'.$row['VILLE_ARR'].'</td><td>'.$row['PRIX_BILLET'].'</td><td>'.$row['NUM_VOY'].'</td></tr>';
}
?>

<?php
//while($a=mysql_fetch_array($data)){
?>
<tr><?php //if(isset($_SESSION['admin']) or isset($_SESSION['etudiant']) or isset($_SESSION['prof'])){
//echo '<tr><td><a href="modif_prof.php?modif_prof='.$a['numprof'].'">modifier</a></td><td><a href="modif_prof.php?supp_prof='.$a['numprof'].'" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cette entrée?\'));">supprimer</a></td>';}
//echo '<td>'.$a['nom'].'</td><td>'.$a['prenom'].'</td><td>'.$a['adresse'].'</td><td>'.$a['telephone'].'</td><td><a href="option_prof.php?matiere='.$a['numprof'].'">Voir</a><td><a href="option_prof.php?classe='.$a['numprof'].'">Voir</a></tr>';
//}
?>
</tbody>
</table></center>
<?php
//echo '<br/><br/><a href="index.php">Revenir à la page précédente !</a>';
?>
</div>
</body>
</html>
