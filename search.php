<?php
$servername = "localhost";
$username = "id4343270_root";
$password = "aurumit";
$database = "id4343270_osiguranje";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$output = '';


if(isset($_POST['searchVal'])){
	$searchq= $_POST['searchVal'];
	//$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

	$query = mysqli_query($conn, "SELECT * FROM korisnici
			LEFT JOIN veza
			ON korisnici.ID=veza.IDdovedenihKorisnika WHERE (`Ime` LIKE '%".$searchq."%') OR (`Prezime` LIKE '%".$searchq."%') OR (`BrojTelefona` LIKE '%".$searchq."%') OR (`postojeciKorisnik` LIKE '%".$searchq."%') ") or die(mysqli_error());
	$count=mysqli_num_rows($query);
	if($count == 0){
		$output='Nema pretrazenog agenta';
	}else{
		$output.='<table style="width:100%;border-collapse: collapse; table-layout: fixed;">
  <tr>
    <th>Redni Broj</th>
    <th>Ime</th>
    <th>Prezime</th>
	<th>Broj Telefona</th>
	<th>Doveden preko</th>
  </tr>';
		while($row = mysqli_fetch_array( $query)){
			$fname = $row['Ime'];
			$lname = $row['Prezime'];
			$broj = $row['BrojTelefona'];
			$veza = $row['postojeciKorisnik'];
			$id=$row['ID'];
			//IF ($veza.=$id) $new =$row ['Ime'];
			$output.='<table  style="width:100%; border-collapse: collapse;  text-align: center; "> <td>' .$id.'</td> <td>'.$fname.'</td> <td>'.$lname.'</td><td> '.$broj.'</td><td> '.$veza.'</td></table>';
		}
	}
}


echo($output);
?>
