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

<form action="chercher_colis.php" method="post" >
   <FIELDSET>
 <LEGEND align=top>Critere de recherche</LEGEND>
<pre>
Code de colis         :        <input type="text" name="code"><br/><br/>
<input type="submit" name="Submit" value="Chercher">
</pre></fieldset>
</form>
<a href="index.php">Revenir à la page principale!</a>

<?php
//}
if(isset($_POST['code'])){
  $code=$_POST['code'];



?>
<center><table bgcolor="#66CCFF" border="1" id="rounded-corner"  width=400px>
<thead><tr><?php //echo Edition();?>
<th scope="col" align="left" > <font size="-1" >Code_Bagages</font></th>
 <th scope="col" align="left" > <font size="-1" >Nom_exp</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Telephone_exp</font></th>
  <th scope="col" align="left"><font size="-1" >Nom_dest</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Telephone_dest</font></th>
  <th scope="col" class="rounded-q2"><font size="-1" >Contenu</font></th>
   <th scope="col" class="rounded-q2"><font size="-1" >Nbr_pieces</font></th>
  <th scope="col" class="rounded-q2"><font size="-1" >Prix</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Ville_dep</font></th>
 <th scope="col" class="rounded-q2"><font size="-1" >Ville_arr</font></th>
 <th scope="col" class="rounded-q4"><font size="-1" >Num_voyage</font></th>

 </tr></thead>

<tbody>
 <?php
$sql="SELECT nom_exp, tel_exp, nom_dest, tel_dest,contenu,nbr_pieces,prix_billet,ville_dep, ville_arr, num_voy,id_trans FROM a_transporter where id_trans = '$code'";              //option contient les info suplimentaire

$cherche = oci_parse($con, $sql);
//print_r( $stmt);

oci_execute($cherche);

 //while (($row = oci_fetch_array($stmt, OCI_ASSOC)) != false)
while ($row = oci_fetch_assoc($cherche))
{
 //print_r( $row);
echo '<tr><td><font size="-1" >'.$row['ID_TRANS'].'</font></td><td><font size="-1" >'.$row['NOM_EXP'].'</font></td><td><font size="-1" >'.$row['TEL_EXP'].'</font></td><td><font size="-1" >'.$row['NOM_DEST'].'</font></td><td><font size="-1" >'.$row['TEL_DEST'].'</font></td><td><font size="-1" >'.$row['CONTENU'].'</font></td><td><font size="-1" >'.$row['NBR_PIECES'].'</font></td><td><font size="-1" >'.$row['PRIX_BILLET'].'</font></td><td><font size="-1" >'.$row['VILLE_DEP'].'</font></td><td><font size="-1" >'.$row['VILLE_ARR'].'</font></td><td><font size="-1" >'.$row['NUM_VOY'].'</font></td></tr>';
}

 ?>
  </tbody>
</table></center>
<a href="chercher_colis.php?cherche_eleve=true">Revenir à la page precedente !</a>
<?php

}

?>
</div>
</pre>
</body>
</html>