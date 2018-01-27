<?php
 $servername = "localhost";
$username = "root";
$password = "";
$database = "novoosiguranje";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

$username = $_POST['dropdown'];
$password = $_POST['changePassword'];
$confirmPassword = $_POST['confirmChangePassword'];
  $sqlprovera =("SELECT * FROM users WHERE username = '$username' limit 1");//Stvaranje sintakse za sql upit da se poklope Ime i prezime, sifra
  $resultprovera = $conn->query($sqlprovera);//Pretvaranje u sql upit pomocu funkcije query()
  if (!$rowprovera =$resultprovera->fetch_assoc()){//Posto se radi o nizu potrebno je fetchovanje
    echo "Agent ne postoji u bazi podataka";
  } else {

      $sql = "UPDATE users SET password='$password' WHERE username ='$username' limit 1";
      $result =$conn->query($sql);//Pretvaranje sintake $sqldva u sql upit
      echo "Sifra je uspesno promenjena";
    }
// Close connection
mysqli_close($conn);
?>
