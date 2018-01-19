<?php
include 'login.php';
//$conn = mysqli_connect("localhost", "root", "", "osiguranje");
if (!$conn) {
  echo "Ne uspesna konekcija sa bazom";
}
	$Ime = $_POST['imee'];
	$Prezime = $_POST['prezimee'];
	$BrojTelefona = $_POST['brTelefona'];
	$pass =$_POST['sifraa'];
  $IDkorisnik= $_SESSION['ID'];

 	$sql = "INSERT INTO korisnici (Ime, Prezime, BrojTelefona, Sifra) VALUES ('$Ime', '$Prezime', '$BrojTelefona','$pass')";
  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  $sqlID = ("SELECT ID FROM korisnici WHERE ID = '$last_id' limit 1");
  $resultID =$conn->query($sqlID);
  $rowID = $resultID->fetch_assoc();
  $sqldva = ("SELECT Ime, Prezime, ID FROM korisnici WHERE ID = '$IDkorisnik' limit 1");
  $resultdva =$conn->query($sqldva);
  $row = $resultdva->fetch_assoc();
  $sqldovedenKorisnik = ("SELECT Ime, Prezime FROM korisnici WHERE ID = '$last_id' limit 1");
  $resultdovedenKorisnik =$conn->query($sqldovedenKorisnik);
  $rowdovedenKorisnik = $resultdovedenKorisnik->fetch_assoc();
  $sqltri = "INSERT INTO veza (postojeciKorisnik, dovedenKorisnik, IDdovedenihKorisnika, IDpostojecihKorisnika, brTelefonDovedenogKorisnika) VALUES ( '".$row['Ime']." ".$row['Prezime']."', '".$rowdovedenKorisnik['Ime']." ".$rowdovedenKorisnik['Prezime']."', '".$rowID['ID']."', '".$row['ID']."','$BrojTelefona')";
  $resulttri = $conn->query($sqltri);
  if ($IDkorisnik=="1") {
    header("Location: manager.php");
  }else {
      header("Location: agent.php");
  }
?>
