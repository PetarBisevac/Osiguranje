<?php //Skripta za upis agenata
error_reporting(0);//Iskljucivanje prikazivanje gresaka
$conn = mysqli_connect("localhost", "root", "", "novoosiguranje");
if (!$conn) {//Provera konekcije ako nije uspesna
  echo "Ne uspesna konekcija sa bazom";//Objavi ovu poruku
}
	$Ime = $_POST['fullname'];//Upisivanje u promenljivu podatke Imena i Prezimena
	$Pass =$_POST['password'];//Upisivanje u promenljivu podatke sifre

  //Koji korisnik je u pitanju
  $IDkorisnik= $_SESSION['ID'];//Upisivanje sesije u promenljivu
  $sqldva = ("SELECT ID FROM users ORDER BY ID DESC limit 1");//Stvaranje sintakse za sql upit da se poklopi ID sa ulogovanim korisnikom
  $resultdva =$conn->query($sqldva);//Pretvaranje sintake $sqldva u sql upit
  $rowdva = $resultdva->fetch_assoc();//Posto se radi o nizu potrebno je fetchovanje


  //Generisanje username-a
  $a=substr($Ime,0,1); //predefinisana funkcija
  $str = strtolower($Ime);
  $string = str_replace(' ', '', $str);
  $d=date('d'); //Uzimanje dana
  $invID = str_pad($row['ID'], 4,'0',STR_PAD_LEFT);
  $username = $string.$d.$rowdva['ID'];

  //Ubacivanje agenata
 	$sql = "INSERT INTO users (users, username, password, admins) VALUES ('$Ime', '$username', '$Pass','0')";//Stvaranje sintakse za sql upit da se upisu novi korisnici
  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;//Uzimanje ID-a poslednjeg unetog korisnika
    echo "Korisnicko ime agenta je: $username";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
