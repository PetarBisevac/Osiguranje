<?php
error_reporting(0);//Iskljucivanje prikazivanje gresaka
session_start();//Pocetak sesije
$conn = mysqli_connect("localhost", "id4356245_root", "petar123", "id4356245_osiguranje");//Konektovanje na bazu podataka
if (!$conn) {//Ispitivanje konekcije
  die("Connection Failed: ".mysqli_connect_error());//Ako nije uspela izbaci poruku
}
     $Ime = $_POST['username'];//Upisivanje u promenljivu podatke Imena i Prezimena
     $Pass =$_POST['password'];//Upisivanje u promenljivu podatke sifre

     $sql =("SELECT * FROM users WHERE username = '$Ime' AND password = '$Pass' limit 1");//Stvaranje sintakse za sql upit da se poklope Ime i prezime, sifra
     $result = $conn->query($sql);//Pretvaranje u sql upit pomocu funkcije query()
     if (!$row =$result->fetch_assoc()){//Posto se radi o nizu potrebno je fetchovanje
      echo "Ne postoji korisnik sa unesenim vrednostima";
     } else {
      $_SESSION['index'] = TRUE;
      if (!isset($_SESSION['submit'])) {
        if ($_POST['password'] == $row['password']) {
          if ($row['admins'] != "0") {
            $_SESSION['loggedinManager'] = TRUE;
            echo "redirectHM";
          }else {
            if ($row['Ban'] != "0") {
              echo "Vas nalog je deaktiviran, za vise informacija kontaktirajte menadzera";
            }else {
              $_SESSION['loggedinAgent'] = TRUE;
              echo "redirectA";
            }
          }
        }

      }

   }
?>
