<?php //Skripta za prosledjivanje na stranu za prijavljivanje ako korisnik nije prijavljen i ako mu nije dodeljena sesija
session_start(); //Pocetak sesije
session_destroy(); //unistavanje sesije
echo "Uspesno odjavljeni";
?>
