<?php
require 'login.php';
$output = '';
if(isset($_POST['searchVal'])){
	$searchq= $_POST['searchVal'];
	//$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
	$IDkorisnik= $_SESSION['ID'];
	$query = mysqli_query($conn, "SELECT * FROM korisnici
			INNER JOIN veza
			ON korisnici.ID=veza.IDpostojecihKorisnika WHERE (IDpostojecihKorisnika = '$IDkorisnik') AND ((`dovedenKorisnik` LIKE '%".$searchq."%') OR (`BrojTelefona` LIKE '%".$searchq."%') OR (`postojeciKorisnik` LIKE '%".$searchq."%')) ") or die(mysqli_error());
	$count=mysqli_num_rows($query);
	if($count == 0){
		$output='Nema pretrazenog agenta';
	}else{
		$output.='<table style="width:100%;border-collapse: collapse; table-layout: fixed;">
  <tr>
    <th>Ime i prezime</th>
		<th>Broj Telefona</th>
  </tr>';
		while($row = mysqli_fetch_array( $query)){
			$fname = $row['dovedenKorisnik'];
			$lname = $row['Prezime'];
			$broj = $row['brTelefonDovedenogKorisnika'];

			//IF ($veza.=$id) $new =$row ['Ime'];

			$output.='<table  style="width:100%; border-collapse: collapse;  text-align: center; ">  <td>'.$fname.'</td> <td> '.$broj.'</td></table>';
		}
	}
}


echo($output);
?>
