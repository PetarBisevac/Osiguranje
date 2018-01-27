<?php
session_start();
if (!isset($_SESSION['loggedinManager'])) {
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header('location: index.php');
}
 ?>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Menadzer</title><!-- Postavljanje naziva kartice -->
     <link rel="stylesheet" href="index.css"><!-- Povezivanje agent.css fajla sa html -->
     <link rel="stylesheet" href="changePassword.css"><!-- Povezivanje agent.css fajla sa html -->
     <link rel="stylesheet" href="print.css"><!-- Povezivanje agent.css fajla sa html -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
     <link href="http://cdn-na.infragistics.com/igniteui/2017.2/latest/css/themes/infragistics/infragistics.theme.css" rel="stylesheet" />
     <link href="http://cdn-na.infragistics.com/igniteui/2017.2/latest/css/structure/infragistics.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" /> <!-- Povezivanje bootstrap.treeview.min.css fajla sa html -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> <!-- Ubacivanje skripte Jquery -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> <!-- Ubacivanje skripte Jquery -->
     <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
     <script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
     <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
     <script src="https://www.igniteui.com/js/external/FileSaver.js"></script>
     <script src="https://www.igniteui.com/js/external/Blob.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/infragistics.core.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/infragistics.lob.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_core.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_collections.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_text.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_io.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_ui.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.documents.core_core.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_collectionsextended.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.excel_core.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_threading.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.ext_web.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.xml.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.documents.core_openxml.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.excel_serialization_openxml.js"></script>
     <script type="text/javascript" src="http://cdn-na.infragistics.com/igniteui/2017.2/latest/js/modules/infragistics.gridexcelexporter.js"></script>





     <script type="text/javascript"> //Skripta za slanje podataka serveru i dobijanje povratnog odg
       function formSubmitlogout(){
           $.ajax({
             type: 'POST',
             url: 'logout.php',
             data:$('#frmBoxLogout').serialize(),
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
       $(function(){
        $('.ctaChangeAgent').click(function(){
          $('.overlayChangeAgent').show();
          return false;
        });

        $('.closebtnChangeAgent').click(function(){
          $('.overlayChangeAgent').hide();
        });
       });
     </script>
     <script type="text/javascript">
       $(function(){
        $('.ctaAddAgent').click(function(){
          $('.overlayAddAgent').show();
          return false;
        });

        $('.closebtnAddAgent').click(function(){
          $('.overlayAddAgent').hide();
        });
       });
     </script>
     <script type="text/javascript">
       $(function(){
        $('.ctaChangePassword').click(function(){
          $('.overlayChangePassword').show();
          return false;
        });

        $('.closebtnChangePassword').click(function(){
          $('.overlayChangePassword').hide();
        });
       });
     </script>
     <script type="text/javascript">
       $(function(){
        $('.ctaPrint').click(function(){
          $('.overlayPrint').show();
          return false;
        });

        $('.closebtnPrint').click(function(){
          $('.overlayPrint').hide();
        });
       });
     </script>


     <script type="text/javascript"> //Skripta za slanje podataka serveru i dobijanje povratnog odg
       function formSubmitAddAgent(){
           $.ajax({
             type: 'POST',
             url: 'signUpAgents.php',
             data:$('#frmBoxAddAgent').serialize(),
             success:function(response){
               $('#messageAddAgent').html(response);
             }
           });
           var form = document.getElementById('frmBoxAddAgent').reset();
           return false;
       }
     </script>

   <script type="text/javascript">
   function emptyAddAgent() {
   var x;
   x = document.getElementById("password").value;
   y = document.getElementById("fullname").value;
   if ((x == "") || (y == "")) {
       alert("Ne smete ostaviti prazno polje");
       return false;
   };
 }
   </script>

<script type="text/javascript"> //Skripta za slanje podataka serveru i dobijanje povratnog odg
     function formSubmitIzbaciPodatke(){
         $.ajax({
           type: 'POST',
           url: 'IzmenaAgenataMulti.php',
           data:$('#izbaciPodatke').serialize(),
           success:function(response){
             $('#divizbaciPodatke').html(response);
           }
         });
         return false;
     }
</script>

<script type="text/javascript"> //Skripta za slanje podataka serveru i dobijanje povratnog odg
  function formSubmitChangePassword(){
      $.ajax({
        type: 'POST',
        url: 'changePassword.php',
        data:$('#changePasswordForm').serialize(),
        success:function(response){
          $('#messageChangePassword').html(response);
        }
      });
      return false;
  }
</script>
<script type="text/javascript">
function emptyChangePassword() {
var x;
x = document.getElementById("changePassword").value;
y = document.getElementById("confirmChangePassword").value;
if ((x == "") || (y == "")) {
    alert("Ne smete ostaviti prazno polje");
    return false;
}else if (x!=y) {
  alert("Sifre moraju biti iste");
  return false;
}

}
</script>

<script>//Skripta u koju se smesta rezultat kreiranog stabla, rezultat dolzi iz fetch.php skripte
$(document).ready(function(){
 $.ajax({
   url: "print.php",
   method:"POST",
   dataType: "json",
   success: function(data)
   {
  var $searchableTree = $('#treeview').treeview({data: data});

  var selectors = {
     'tree': '#treeview',
     'input': '#input-search',
     'reset': '#btn-clear-search'
 };
 var lastPattern = ''; // closure variable to prevent redundant operation

 // collapse and enable all before search //
 function reset(tree) {
     tree.collapseAll();
     tree.enableAll();
 }
 function collectUnrelated(nodes) {
   var unrelated = [];
   $.each(nodes, function (i, n) {
       if (!n.searchResult && !n.state.expanded) { // no hit, no parent
           unrelated.push(n.nodeId);
       }
       if (!n.searchResult && n.nodes) { // recurse for non-result children
           $.merge(unrelated, collectUnrelated(n.nodes));
       }
   });
   return unrelated;
}
// search callback
var search = function (e) {
  var pattern = $(selectors.input).val();
  if (pattern === lastPattern) {
      return;
  }
  lastPattern = pattern;
  var tree = $(selectors.tree).treeview(true);
  reset(tree);
  if (pattern.length < 3) { // avoid heavy operation
      tree.clearSearch();
  } else {
      tree.search(pattern);
      // get all root nodes: node 0 who is assumed to be
      //   a root node, and all siblings of node 0.
      var roots = tree.getSiblings(0);
      roots.push(tree.getNode(0));
      //first collect all nodes to disable, then call disable once.
       //  Calling disable on each of them directly is extremely slow!
      var unrelated = collectUnrelated(roots);
      tree.disableNode(unrelated, {silent: true});
  }
};

// typing in search field
$(selectors.input).on('keyup', search);

// clear button
$(selectors.reset).on('click', function (e) {
  $(selectors.input).val('');
  var tree = $(selectors.tree).treeview(true);
  reset(tree);
  tree.clearSearch();
});


   }
 });

});
</script>

<script>
    function PrintMe() {//Funkcija za stampanje stabla korisnika
       var disp_setting="toolbar=yes,location=no,";
       disp_setting+="directories=yes,menubar=yes,";
       disp_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
       var content_vlue = document.getElementById('treeview').innerHTML;
       var docprint=window.open("","",disp_setting);
       docprint.document.open();
       docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
       docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
       docprint.document.write('<head><title>My Title</title> <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />');
       docprint.document.write('<style type="text/css">body{ margin:0px;} #treeview{display: block; } .indent{margin-left:30px} .node-icon{padding-left: 5px;}');
       docprint.document.write('</style>');
       docprint.document.write('</head><body onLoad="self.print()">');
       docprint.document.write(content_vlue);
       docprint.document.write('</');
       docprint.document.write('body></html>');
       docprint.document.close();
       docprint.focus();
    }//Skripta za stampanje stabla
</script>


   </head>
   <body><!-- Pocetak body-a -->
     <div class="opisFormeHM">
       <h1>Izaberite funkciju:</h1>
       <div class="subopisFormeHM" class=".col-9" >
       <input type="button"  class="ctaAddAgent" name="DodajAgenta" value="Dodaj agenta"><br><!-- Dugme za prosledjivanje podataka  -->
       <input type="button" class="ctaChangeAgent" name="IzmeniAgenta" value="Izmeni agenta"><br><!-- Dugme za prosledjivanje podataka  -->
       <input type="button" class="ctaPrint" name="Stampa" value="Stampa"><br><!-- Dugme za prosledjivanje podataka  -->
       <form action = "logout.php" id="frmBoxLogout" onsubmit="return formSubmitlogout();"><!-- Napravljena forma cija je akcija da preusmeri podatke na login.php skriptu -->
         <input type="submit" name="logout" value="Odjava"><br><!-- Dugme za prosledjivanje podataka  -->
       </form>
       </div>
     </div>

     <!-- AddAgent -->
     <div class="overlayAddAgent">

       <div class="opisFormeAddAgent">
         <h1>Dodavanje novog agenta:</h1>
          <div class="subopisFormeAddAgent">

            <form action = "signUpAgents.php" id="frmBoxAddAgent"  method = "POST" onsubmit="return formSubmitAddAgent();">
              <p> &nbsp Ime i prezime: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Sifra:</p>
              <input type="text" name="fullname" id="fullname"  placeholder="Ime agenta"><!-- Input polje za unos imena i prezimena -->
              <input type="password" name="password" id="password" placeholder="Sifra"><!-- Input polje za unos sifre -->
              <input type="submit" name="dodaj" value="Dodaj agenta" onClick="return emptyAddAgent()" style="cursor: pointer;"><br><br><br><!-- Dugme za prosledjivanje podataka  -->
              <button type="button" name="button" class="closebtnAddAgent">Pocetna strana</button> <!-- Dugme za prosledjivanje podataka  -->
            </form>
            </br>

            <div id="messageAddAgent" class="messageAddAgent"><!-- Div username korisnika -->
            </div><!-- Zatvaranje Diva -->

          </div>
       </div>
     </div>


  <!--ChangeAgent-->
   <div class="overlayChangeAgent">
     <div class="opisFormeChangeAgent">
       <h1>Izaberite agenta: </h1>
       <div class="subopisFormeChangeAgent" class="clear">

         <form action = "IzmenaAgenataMulti.php" id="izbaciPodatke"  method = "POST" onsubmit="return formSubmitIzbaciPodatke()">
           <div class="container">
             <div class="row">
               <select name="dropdown" class="selectpicker" data-show-subtext="true" data-live-search="true">
                 <style  media="screen">
                 </style>

                <option>Agenti</option>
                 <?php
                     $connection = new mysqli("localhost", "root", "","novoosiguranje");
                     $sql = mysqli_query($connection, "SELECT users, username FROM users");
                     while ($row = $sql->fetch_assoc()){
                     echo "<option value=\"".$row['username']."\">" . $row['users']. " ". $row['username'] . "</option>";
                     }
                 ?>
               </select>
               <label class="containerRadio">Informacija
                 <input type="radio" value="Informacija" checked="checked" name="action">
                 <span class="checkmark"></span>
               </label>
               <label class="containerRadio">Deaktiviraj
                 <input type="radio" value="Deaktiviraj" name="action">
                 <span class="checkmark"></span>
               </label>
               <label class="containerRadio">Aktiviraj
                 <input type="radio" value="Aktiviraj"name="action">
                 <span class="checkmark"></span>
               </label>
               <input type="submit" name="bilosta" value="Aktiviraj funkciju" class="dugme"><!-- Dugme za prosledjivanje podataka  -->
             </div>
           </div>

         </form>

           <div id="divizbaciPodatke"  class="divizbaciPodatke"style="color: white; margin-top: 40px;" ><!-- Div informacija o podacima agenata -->
           </div><!-- Zatvaranje Diva -->
           <button style="color: black!important; margin-top:60px; margin-left: 80px" class="ctaChangePassword closebtnChangeAgent" type="button" name="button">Promenite sifru agentu</button>
           <button style="color: black!important;" type="button" class="closebtnChangeAgent" type="button" name="button">Pocetna strana</button>
       </div>
     </div>
   </div>

  <!--Print -->

  <!-- ChangePassword -->


  <div class="overlayChangePassword">
    <div class="opisFormeChangePassword">
      <h1>Izabrati koriniska za novu sifru</h1>
      <div class="subopisFormeChangePassword">

        <form action = "changePassword.php" id="changePasswordForm"  method = "POST" onsubmit="return formSubmitChangePassword()">
          <div class="container">
            <div class="row">
              <select name="dropdown" class="selectpicker" data-show-subtext="true" data-live-search="true">
                <style  media="screen">
                </style>

               <option>Agenti</option>
                <?php
                    $connection = new mysqli("localhost", "root", "","novoosiguranje");
                    $sql = mysqli_query($connection, "SELECT users, username FROM users");
                    while ($row = $sql->fetch_assoc()){
                    echo "<option value=\"".$row['username']."\">" . $row['users']. " ". $row['username'] . "</option>";
                    }
                ?>
              </select>
            </div>
          </div>
          <input type="password" name="changePassword" id="changePassword"  style="margin-top: 50px; color:black; font-style: italic;" placeholder="Nova sifra">
          <input type="password" name="confirmChangePassword" id="confirmChangePassword"  placeholder="Potvrdite sifru" style="margin-top: 10px; color:black; font-style: italic;"><!-- Dugme za prosledjivanje podataka  -->
          <input type="submit" name="promeniSifru" value="Promeni Sifru" style="margin-top: 10px; color:black;" onclick=" return emptyChangePassword()">
        </form>
        <input style="color: black!important;" class="closebtnChangePassword" type="button" name="nazad" value="Pocetna strana"></br>
      </div>
    </div>
    <div id="messageChangePassword" class="message">

    </div>
  </div>

  <div class="overlayPrint">
    <div class="opisFormePrint">
      <div class="subopisFormePrint">
        <input style="cursor: pointer;" class="closebtnPrint" type="button" name="nazad" value="Pocetna strana"/><br><!-- Dugme za prosledjivanje podataka  -->
        <input type="button" name="stampaj" value="Stampaj stablo" onclick="PrintMe()" style="color: black;">


                    <div class="form-group">
                      <label for="input-search" class="sr-only">Search Tree:</label>
                      <input  type="input" class="form-control" id="input-search" placeholder="Type to search..." value="">
                    </div>
                    <button type="button" class="btn btn-success" id="btn-search">Search</button>
                    <button type="button" class="btn btn-default" id="btn-clear-search">Clear</button>

        <h2 align="center" style="color:white;font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;">STABLO KLIJENATA </h2>
    </div>
  </div>

    <div class="container" style="width:900px;">
     <br /><br />
     <div id="treeview"></div><!-- Div u kome se smesta stablo korisnika -->
    </div>
  </div>



   </body>
 </html>
