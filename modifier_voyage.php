<?php
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

<?php







if(isset($_GET['modif_el'])){//modif_el qu'on a recupérer de l'affichage (modifier)
$id=$_GET['modif_el'];
$ligne=mysql_fetch_array(mysql_query("select * from eleve,classe where eleve.codecl=classe.codecl and numel='$id'"));
$nom=stripslashes($ligne['nomel']);
$prenom=stripslashes($ligne['prenomel']);
$date=stripslashes($ligne['date_naissance']);
$phone=stripslashes($ligne['telephone']);
$adresse=str_replace("<br />",' ',$ligne['adresse']);
$codecl=stripslashes($ligne['codecl']);
?>




<html>
<body>
<form  name ="saisir" method="post" action="#">
<div class="corp">
<center><h1>Ajouter des voyages</h1></center>
<br /><br />
<table  align="center" bgcolor= "#6699FF" width=600px border="0" cellpadding="2" cellspacing="0" >
<tr>
<td width="10%" align="left" ></td>
<td width="10%" align="left" ></td>
</tr>
<tr>
<td width="10%" align="left" > Numero du voyage :</td>
<td width="10%"><input type="text" name="num" size="60"  /></td>
</tr>
<tr>
<td  width="10%"  align="left">Date de depart :</td>
<td width="10%" ><input type="text" name="datedep" class="calendrier" size="60"></td>
</tr>
<tr>
<td  width="10%"  align="left">Date d'arrive :</td>
<td width="10%" ><input type="text" name="datearr" class="calendrier" size="60"></td>
</tr>



</table>
</div>
  </form>

</body>

</html>
