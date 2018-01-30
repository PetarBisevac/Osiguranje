<?php
error_reporting(0);//Iskljucivanje prikazivanje gresaka
$servername = "localhost";
$username = "id4356245_root";
$password = "petar123";
$database = "id4356245_osiguranje";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

$username = $_POST['dropdown'];

 if ($_POST['action']=='Deaktiviraj') {
    $sql =("SELECT * FROM users WHERE username = '$username' limit 1");//Stvaranje sintakse za sql upit da se poklope Ime i prezime, sifra
    $resultprovera = $conn->query($sql);//Pretvaranje u sql upit pomocu funkcije query()
        if (!$rowprovera =$resultprovera->fetch_assoc()){//Posto se radi o nizu potrebno je fetchovanje
          echo "Agent ne postoji u bazi podataka ili niste izabrali agenta";
        } else {
          if ($rowprovera['Ban']!='0') {
            echo "Agent je vec deaktiviran, probajte sa drugim agentom";
          }else {
            $sql = "UPDATE users SET Ban='1' WHERE username ='$username' limit 1";
            $result =$conn->query($sql);//Pretvaranje sintake $sqldva u sql upit
            echo "Agent je uspesno deaktiviran";
          }
        }
  }else if ($_POST['action']=='Aktiviraj') {
    $sqlprovera =("SELECT * FROM users WHERE username = '$username' limit 1");//Stvaranje sintakse za sql upit da se poklope Ime i prezime, sifra
    $resultprovera = $conn->query($sqlprovera);//Pretvaranje u sql upit pomocu funkcije query()
    if (!$rowprovera =$resultprovera->fetch_assoc()){//Posto se radi o nizu potrebno je fetchovanje
      echo "Agent ne postoji u bazi podataka ili niste izabrali agenta";
    } else {
      if ($rowprovera['Ban']=='0') {
        echo "Agent je vec aktivan, probajte sa drugim agentom";
      }else {
        $sql = "UPDATE users SET Ban='0' WHERE username ='$username' limit 1";
        $result =$conn->query($sql);//Pretvaranje sintake $sqldva u sql upit
        echo "Agent je uspesno akiviran";
      }
    }

  }else if ($_POST['action']=='Informacija') {
    $sql =("SELECT * FROM users WHERE username = '$username' limit 1");//Stvaranje sintakse za sql upit da se poklope Ime i prezime, sifra
    $result = $conn->query($sql);//Pretvaranje u sql upit pomocu funkcije query()
    if (!$row =$result->fetch_assoc()){//Posto se radi o nizu potrebno je fetchovanje
      echo "Agent ne postoji u bazi podataka ili niste izabrali agenta";
    } else {
       echo "Ime i prezime: ";
       echo $row['users'];
       echo "</br>";
       echo "Korisnicko ime: " ;
       echo $row['username'];
       echo "</br>";
       echo "Sifra: " ;
       echo $row['password'];
    }
  }

?>
