<?php
session_start();
if (!isset($_SESSION['loggedinAgent'])) {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header('location: index.php');
} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agent</title> <!-- Postavljanje naziva kartice -->

    <link rel="stylesheet" href="agent.css"><!-- Povezivanje agent.css fajla sa html -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /><!-- Povezivanje bootstrap.min.css fajla sa html -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> <!-- Ubacivanje skripte Jquery -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>



    <script type="text/javascript"> //Skripta za slanje podataka serveru i dobijanje povratnog odg
      function formSubmit(){
          $.ajax({
            type: 'POST',
            url: 'signUpClients.php',
            data:$('#frmBox').serialize(),
            success:function(response){
              if (response.match(/redirect/)) {
                window.location.replace('agent.php');
              }else {
                $('#message').html(response);
              }
            }
          });

          return false;
      }
    </script>
    <script type="text/javascript"> //Skripta za slanje podataka serveru i dobijanje povratnog odg
      function formSubmitlogout(){
          $.ajax({
            type: 'POST',
            url: 'logout.php',
            data:$('#frmBox').serialize(),
            success:function(response){
              if (response.match(/Uspesno odjavljeni/)) {
                window.location.replace('index.php');
              }
            }
          });

          return false;
      }
    </script>
    <script type="text/javascript">
   function validate(evt) {
     var theEvent = evt || window.event;
     var key = theEvent.keyCode || theEvent.which;
     key = String.fromCharCode( key );
     var regex = /[0-9]|\./;
     if( !regex.test(key) ) {
       theEvent.returnValue = false;
       if(theEvent.preventDefault) theEvent.preventDefault();
     }
   }

   </script>


  <script type="text/javascript">
  function empty() {
  var x;
  x = document.getElementById("phoneNumber").value;
  y = document.getElementById("fullname").value;
  z = document.getElementById("adresa").value;
  if ((x == "") || (y == "")) {
      alert("Ne smete ostaviti prazno polje");
      return false;
  };
}
  </script>

  </head>
  <body><!-- Pocetak body-a -->

<div class="opisForme" style="color:white;">
  <h1>Dodavanje novog klijenta:</h1>
   <div class="subopisForme">

     <form action = "signUpClients.php" id="frmBox"  method = "POST" onsubmit="return formSubmit();"><!-- Napravljena forma cija je akcija da preusmeri podatke na signup.php skriptu -->
       <input type="text" name="fullname" id="fullname"  placeholder="Ime i prezime klijenta" style="color:black;"><!-- Input polje za unos imena i prezimena -->
       <input type="number" name="phoneNumber" id="phoneNumber" placeholder="Broj telefona"  style="color:black;" onkeypress='validate(event)'><!-- Input polje za unos sifre -->
       <input type="text" name="adresa" id="adresa" placeholder="Adresa klijenta"  style="color:black; width:500px">
       <input type="submit" name="dodaj" value="Dodaj klijenta" onClick="return empty()" style="cursor: pointer; color:black; margin-top: 37px;"><br><br><br><!-- Dugme za prosledjivanje podataka  -->
       <div class="container">
         <div class="row">
           <select name="dropdown" class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option>Dodaj referencu</option>
             <?php
                 $connection = new mysqli("localhost", "root", "","novoosiguranje");
                 $sql = mysqli_query($connection, "SELECT clientsPN FROM clients");
                 while ($row = $sql->fetch_assoc()){
                 echo "<option value=\"".$row['clientsPN']."\">" . $row['clientsPN'] . "</option>";
                 }
             ?>
           </select>
           <select name="dropdownopstina" class="selectpicker" data-show-subtext="true" data-live-search="true">
            <option>Opstina</option>
             <?php
                 $connection = new mysqli("localhost", "root", "","novoosiguranje");
                 $sql = mysqli_query($connection, "SELECT opstina FROM bgopstine");
                 while ($row = $sql->fetch_assoc()){
                 echo "<option value=\"".$row['opstina']."\">" . $row['opstina'] . "</option>";
                 }
             ?>
           </select>

           </div>
       </div>
     </form>
     <form method = "POST" action="logout.php" onsubmit="return formSubmitlogout();"><!-- Forma za odjavljivanje korisnika -->
       <input type="submit" name="logout" value="Odjava" style="cursor: pointer; color:black;"> <!-- Dugme za prosledjivanje podataka  -->
     </form>
     </br>

     <div id="message" class="message"><!-- Div username korisnika -->
     </div><!-- Zatvaranje Diva -->

   </div>
</div>

  </body>
</html>
