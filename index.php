<html>
  <head>
    <meta charset="utf-8">
    <title>Prijava</title><!-- Postavljanje naziva kartice -->
    <link rel="stylesheet" href="index.css"><!-- Povezivanje agent.css fajla sa html -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript"> //Skripta za slanje podataka serveru i dobijanje povratnog odg
      function formSubmitloginBox(){
          $.ajax({
            type: 'POST',
            url: 'login.php',
            data:$('#loginBox').serialize(),
            success:function(response){
              if (response.match(/redirectHM/)) {
                window.location.replace('homeManager.php');
              }else if (response.match(/redirectA/)) {
                window.location.replace('Agent.php');
              }else {
                $('#message').html(response);
              }
            }
          });
          var form = document.getElementById('loginBox').reset();
          return false;
      }
    </script>

    <script type="text/javascript">
    function empty() {
    var x;
    x = document.getElementById("password").value;
    y = document.getElementById("username").value;
    if ((x == "") || (y == "")) {
        alert("Ne smete ostaviti prazno polje");
        return false;
    };
  }
    </script>

  </head>
  <body><!-- Pocetak body-a -->
    <div class="opisForme">
      <h1>Prijava</h1>
      <div class="subopisForme" >
        <form action = "login.php" id="loginBox" method="POST" onsubmit="return formSubmitloginBox()"><!-- Napravljena forma cija je akcija da preusmeri podatke na login.php skriptu -->
          <p>Korisnicko ime: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Sifra:</p>
          <input type="text" name="username" id="username" placeholder="Vase korisnicko ime"><!-- Input polje za unos imena i prezimena -->
          <input type="password" name="password" id="password" placeholder="Sifra"><!-- Input polje za unos sifre -->
          <input type="submit" style="cursor:pointer;" name="submitLogin" value="Prijavi se" onClick="return empty()"><br><!-- Dugme za prosledjivanje podataka  -->
        </form>
      </div>
    </div>
    <div id="message" class="message"><!-- Div u kome se smesta rezultat pretrage -->
    </div><!-- Zatvaranje Diva -->
  </body>
</html>
