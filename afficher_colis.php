<?php
//session_start();
//include "index.php";
//include('cadre2.php');
include('colis.php');
//include('calendrier.htm');


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
left :230px;
background-color: #D9D9e8;
}

</style>
</head>
<body>
<div class="corp2">
<center><h1>Liste des colis</h1></center>
<table align="left"  border="1" id="rounded-corner"  width=400px>
<thead><tr><?php //echo Edition();?>
<th scope="col" align="left" > <font size="-1" >Code</font></th>
 <th scope="col" align="left" > <font size="-1" >Nom_exp</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Tele_exp</font></th>
  <th scope="col" align="left"><font size="-1" >Nom_dest</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Tele_dest</font></th>
  <th scope="col" class="rounded-q2"><font size="-1" >Contenu</font></th>
   <th scope="col" class="rounded-q2"><font size="-1" >Nbr_pieces</font></th>
  <th scope="col" class="rounded-q2"><font size="-1" >Prix</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Ville_dep</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Ville_arr</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >voyage</font></th>

 </tr></thead>
<tfoot>
<tr>
<td><font size="-1" ></font></td>
<td colspan="<?php //echo colspan(5,7); ?>"class="rounded-foot-left"><em>&nbsp;</em></td>
<td class="rounded-foot-right">&nbsp;</td>
</tr>
</tfoot>
 <tbody>

 <?php
 $sql = 'select * from  affiche_colis';
 //include("select.php");
$stmt = oci_parse($con, $sql);
//print_r( $stmt);

oci_execute($stmt);

//while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
while ($row = oci_fetch_assoc($stmt))
{
// print_r( $row);                                                nom_exp, tel_exp, nom_dest, tel_dest,contenu,nbr_pieces,prix_billet,ville_dep, ville_arr, num_voy
echo '<tr><td><font size="-1" >'.$row['ID_TRANS'].'</font></td><td><font size="-1" >'.$row['NOM_EXP'].'</font></td><td><font size="-1" >'.$row['TEL_EXP'].'</font></td><td><font size="-1" >'.$row['NOM_DEST'].'</font></td><td><font size="-1" >'.$row['TEL_DEST'].'</font></td><td><font size="-1" >'.$row['CONTENU'].'</font></td><td><font size="-1" >'.$row['NBR_PIECES'].'</font></td><td><font size="-1" >'.$row['PRIX_BILLET'].'</font></td><td><font size="-1" >'.$row['VILLE_DEP'].'</font></td><td><font size="-1" >'.$row['VILLE_ARR'].'</font></td><td><font size="-1" >'.$row['NUM_VOY'].'</font></td></tr>';
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
</table>
<?php
//echo '<br/><br/><a href="index.php">Revenir à la page précédente !</a>';
?>
</div>
</body>
</html>
