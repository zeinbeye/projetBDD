<?php



?>

<html>
<head>
	<title>Employe Management</title>
	<script language="JavaScript">

		function verif_matricule(){
		    var matricule	=document.getElementById("matricule").value;
		    var int_regexp=/^[0-9]{1,}$/;
		    if (!matricule.match(int_regexp))
		   	  {
		    	return false;
		      }
		    else return true;
		 }
function controlerData()  {
	if (!verif_matricule()){
		alert("le matricule est de type entier ");
	}
	else
	document.getElementById("entrprise").submit();
	}
</script>
</head>
<body>
<form  id='entrprise' name='entrprise' action='ajoutEmploye.php' method='post'>
<table border='2' >
<tr>
    <td> Nom </td>
    <td> <input type='text' name='nom'  id='nom' size="15"> </td>
    <td> Prénom </td>
    <td> <input type='text' name='prenom' id='prenom' size="15"  > </td>
  <td> Matricule </td>
    <td> <input type='text' name='matric' id="matricule" size="15"  > </td>
</tr >
<tr><td colspan='8' align='center'>
 <input type='button' name='valider' value='Enregistrer' onClick='controlerData()'></td>
</tr>
</table>
</form>

</body>
</html>