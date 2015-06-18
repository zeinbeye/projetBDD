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

<body>

<?php
$sql='SELECT id_trans  FROM affiche_colis where id_trans =(select max(id_trans) from affiche_colis)';
$cherche = oci_parse($con, $sql);
//print_r( $stmt);
oci_execute($cherche);


?>

<pre>
<div class="corp2">
<form action="ticket.php" method="post" >
<FIELDSET><LEGEND align=top>Code du colis</LEGEND><pre>
Code          :         <select name="nomvoyageur"  ><?php while ($row = oci_fetch_assoc($cherche)){
 // print_r( $row);
echo '<option value="'.$row['ID_TRANS'].'">'.$row['ID_TRANS'].'</option>';
 }
?></select><br/><br/>
<input type="submit" name="Submit" value="OK" size="40" ></pre></fieldset></form><a href="colis.php">Revenir à la page principale!</a>
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
$sql= "SELECT * FROM affiche_colis  where id_trans = '$nomvoyageur' ";
$cherche = oci_parse($con, $sql);
//print_r( $stmt);
oci_execute($cherche);
 //while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false) 
while ($row = oci_fetch_assoc($cherche))
{
echo '<center><table bgcolor="#D9D9e8" border="0" id="rounded-corner"  width=600px><tr><th scope="col" align="left" align="left"><font size="-1">Code_Bagages :</font></th>
<td><font size="-1" >'.$row['ID_TRANS'].'</font></td><th scope="col" class="rounded-q4" align="left"><font size="-1" >Num_voyage  :</font></th>
<td><font size="-1" >'.$row['NUM_VOY'].'</font></td></tr><tr><th scope="col" align="left" ><font size="-1">Nom_exp :</font></th>
<td><font size="-1" >'.$row['NOM_EXP'].'</font></td><th scope="col" class="rounded-q2" align="left"><font size="-1" >Telephone_exp  :</font></th>
<td><font size="-1" >'.$row['TEL_EXP'].'</font></td></tr><tr><th scope="col" align="left"><font size="-1" >Nom_dest  :</font></th>
<td><font size="-1" >'.$row['NOM_DEST'].'</font></td><th scope="col" align="left"><font size="-1" >Telephone_dest  :</font></th>
<td><font size="-1" >'.$row['TEL_DEST'].'</font></td></tr><tr><th scope="col" class="rounded-q2" align="left"><font size="-1" >Contenu  :</font></th>
<td><font size="-1" >'.$row['CONTENU'].'</font></td><th scope="col" class="rounded-q2" align="left"><font size="-1" >Nbr_pieces  :</font></th>
<td><font size="-1" >'.$row['NBR_PIECES'].'</font></td></tr><tr><th scope="col" class="rounded-q2" align="left"><font size="-1" >Ville_dep  :</font></th>
<td><font size="-1" >'.$row['VILLE_DEP'].'</font></td><th scope="col" class="rounded-q2" align="left"><font size="-1" >Ville_arr  :</font></th>
<td><font size="-1" >'.$row['VILLE_ARR'].'</font></td></tr><tr><th scope="col" class="rounded-q2" align="left"><font size="-1" >Prix  :</font></th>
<td><font size="-1" >'.$row['PRIX_BILLET'].'</font></td></tr></table></center><center><input type="submit" name="Submit" value="Imprimer" align="right"></center>';
}
 ?>
</fieldset></tbody>
<a href="ticket.php">Revenir à la page precedente !</a>
<?php
}
?>
</div>
</pre>

</body>
</html>