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

<?php
if(isset($_GET['modif_chauff'])){//modif_el qu'on a recupérer de l'affichage (modifier)
$id=$_GET['modif_chauff'];
$ligne="select * from chauffeurs where nom_chauff='$id'";
$cherche = oci_parse($con, $ligne);
//print_r( $stmt);
oci_execute($cherche);
//print_r($cherche);

$nom=stripslashes($cherche['nom_chauff']);
$phone=stripslashes($cherche['tel_chauff']);
$adresse=stripslashes($cherche['adresse_chauff']);
?>
<div class="corp">
<center><pre>
<form action="modifier_chauff.php" method="POST" >
   <FIELDSET>
 <LEGEND align=top>Modifier un chauffeurt</LEGEND>  <pre>
 <table  align="center" bgcolor= "#6699FF" width=500px border="0" cellpadding="2" cellspacing="0" >
<tr>
<td width="10%" align="left" ></td>
<td width="10%" align="left" ></td>
</tr>
<tr>
<td width="10%" align="left" > Nom :    <?php echo $nom; ?></td>
</tr>
<tr>
<td  width="10%"  align="leftt">Telephone: </td>
<td width="20%" ><input type="text" name="tel" size="40" value="<?php echo $phone; ?>"></td>
</tr>
<tr>
<td  width="10%"  align="left">Adresse :</td>
<td width="20%" ><input type="text" name="adresse" size="40" value="<?php echo $adresse; ?>"</td>
</tr>
<input type="submit" name="Submit" value="Valider" size="10">
<input type="hidden" name="id" value="<?php echo $id; ?>"><br/>
</pre></fieldset>
</form><a href="afficher_chauffeur.php?nomcl=<?php /*echo $ligne['nom']; */?>">Revenir à la page précédente !</a>
</div>
<?php
}
if(isset($_POST['adresse'])){
	if($_POST['adresse_chauff']!="" and $_POST['tel_chauff']!=""){
		$id=$_POST['id'];
		$phone=$_POST['tel_chauff'];
		$adresse=$_POST['adresse_chauff'];

        $sql="update chauffeurs set  adresse_chauff='$adresse', tel_chauff='$phone' where nom_chauff='$id'";
$cherche = oci_parse($con, $sql);
oci_execute($cherche);
 //print_r( $stmt);

		?> <SCRIPT LANGUAGE="Javascript">	alert("Modifié avec succés!"); </SCRIPT>
		<?php

	}
	else{
	?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champss"); </SCRIPT> <?php
	}
	//echo '<div class="corp"><br/><br/><a href="modif_eleve.php?modif_el='.$id.'">Revenir à la page precedente !</a></div>';
}
/*if(isset($_GET['supp_el'])){
$id=$_GET['supp_el'];
mysql_query("delete from eleve where numel='$id'");
mysql_query("delete from evaluation where numel='$id'");/*	Supprimier tous les entres en relation
mysql_query("delete from stage where numel='$id'");
mysql_query("delete from bulletin where numel='$id'");
?> <SCRIPT LANGUAGE="Javascript">	alert("Supprimé avec succés!"); </SCRIPT> <?php
echo '<br/><br/><a href="index.php?">Revenir à la page principale !</a>';
}*/
?>
</center></pre>

</body>
</html>