<?php //Skripta za upis agenata

$conn = mysqli_connect("localhost", "root", "", "novoosiguranje");
if (!$conn) {//Provera konekcije ako nije uspesna
  echo "Ne uspesna konekcija sa bazom";//Objavi ovu poruku
}
	$Ime = $_POST['fullname'];//Upisivanje u promenljivu podatke Imena i Prezimena
	$Phone =$_POST['phoneNumber'];//Upisivanje u promenljivu podatke broja
  $referenca = $_POST['dropdown'];//Upisivanje u promenljivu podatke dropdown
  $opstina = $_POST['dropdownopstina'];//Upisivanje u promenljivu podatke dropdown
  $adresa = $_POST['adresa'];


  //Koji korisnik je u pitanju
  $sqldva = ("SELECT * FROM clients WHERE clientsPN ='$referenca' limit 1");//Stvaranje sintakse za sql upit da se poklopi ID sa ulogovanim korisnikom
  $resultdva =$conn->query($sqldva);//Pretvaranje sintake $sqldva u sql upit
  $rowdva = $resultdva->fetch_assoc();//Posto se radi o nizu potrebno je fetchovanje
  $referencaDVA= $rowdva['ID'];
  $punareferenca = $rowdva['clientsPN'];
  $clientsIme = $rowdva['clients'];
  $clientsphone = $rowdva['phoneNumber'];
  $prevara = $rowdva['ID'];




  //Ubacivanje agenata
 	$sql = "INSERT INTO clients (clients, phoneNumber, clientsPN, adresa, opstina, reference, punareferenca) VALUES ('$Ime', '$Phone', '".$Ime."  ".$Phone." ".$opstina."', '$adresa', '$opstina', '$referencaDVA', '$punareferenca')";//Stvaranje sintakse za sql upit da se upisu novi korisnici
  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;//Uzimanje ID-a poslednjeg unetog korisnika
    //echo "Klijent je uspesno dodat, referenca: $clientsIme";
     // referenca poslednjeg unetog klijenta zalepiti ovdje, ostalo je magija xDDD
     $prevara = $rowdva['ID']; // referenca poslednjeg unetog klijenta zalepiti ovdje, ostalo je magija xDDD
     function recur_count($prevara){
     global $conn;
     $update1= "update clients set brPreporucenih=brPreporucenih +1 where ID=$prevara;";
     $izvrsi1= $conn->query($update1);
     $sql1 = "select * from clients where ID=$prevara";
     $resultPrevare = $conn->query($sql1);
     if($resultPrevare->num_rows>0){

        while($row1[] = $resultPrevare->fetch_assoc()) {
             $Item = $row;
             $json = json_encode($Item);
         }

     }else {
  echo "No Results Found.";
  }
    $dadsa=$row1[0]['reference'];
    if($dadsa>0){
    recur_count($dadsa);
        }else{
  }

 }
    recur_count($prevara);
    $sqlBrPreporucenih = ("SELECT * FROM clients");
    $resultBrPreporucenih =$conn->query($sqlBrPreporucenih);
    //Posto se radi o nizu potrebno je fetchovanje
    $i=0;
    while ($rowBrPreporucenih[$i] = $resultBrPreporucenih->fetch_assoc()) {
      $jedan = $rowBrPreporucenih[$i]['brPreporucenih'];
      $jedanstring = strval($jedan);
      $dva = $rowBrPreporucenih[$i]['clients'];
      $tri = $rowBrPreporucenih[$i]['phoneNumber'];
      $cetiri = $rowBrPreporucenih[$i]['ID'];
      $pet = $rowBrPreporucenih[$i]['adresa'];
      $sest = $rowBrPreporucenih[$i]['opstina'];
      $spojeno = $jedanstring." ".$dva." ".$tri." ".$pet." ".$sest;
      $update2= ("UPDATE clients SET clientsPN='$spojeno' WHERE ID = '$cetiri'");
      $resultUPDATEClients =$conn->query($update2);//Pretvaranje sintake $sqldva u sql upit
      $i++;
    }
     echo "redirect";
  } else {
    echo "Klijent sa vasim $Phone brojem telefona vec postoji u bazi, ukucajte drugi broj i pokusajte ponovo.";
}


?>
