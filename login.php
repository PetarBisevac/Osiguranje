<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost", "id4343270_root", "petar123", "id4343270_osiguranje"); 
if (!$conn) {
  die("Connection Failed: ".mysqli_connect_error());
}
     $Ime = $_POST['ime'];
     $pass =$_POST['sifra'];

     $sql =("SELECT * FROM korisnici WHERE Ime = '$Ime' AND Sifra = '$pass' limit 1");
     $result = $conn->query($sql);
     if (!$row =$result->fetch_assoc()){
        //echo "Pogresna sifra!";
     } else {
        $_SESSION['ID'] = $row['ID'];
        $IDkorisnik= $_SESSION['ID'];
        if ($_SESSION['ID']=="1") {
          header("Location: manager.php");
        }else {
          header("Location: agent.php");
        }
   }
?>
