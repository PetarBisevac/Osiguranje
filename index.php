<?php
session_start();
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prijava</title>
    <link rel="stylesheet" href="agent.css">
  </head>
  <body>
    <form action = "login.php" method = "post" class="container">
      Ime:<br>
      <input type="text" name="ime" placeholder="Ime agenta"><br>
      Sifra: <br>
      <input type="password" name="sifra" placeholder="Sifra"><br>
      <input type="submit" name="prijava" value="Prijavi se"><br>
    </form>
    <div class="tabela">

    </div>
  </body>
</html>
