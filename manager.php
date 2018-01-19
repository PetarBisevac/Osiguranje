<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agent</title>
    <link rel="stylesheet" href="agent.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
    </script>
    <script type="text/javascript">
    	function searchq(){
    		var searchTxt = $("input[name='Pretraga']").val();

    		$.post("search.php", {searchVal: searchTxt}, function(output){
    			$("#output").html(output);
    	});
    	}
	</script>
    <script type="text/javascript">
        function printData()
            {
               var divToPrint=document.getElementById("output");
               var htmlToPrint = '' +
                  '<style type="text/css">' +
                  'table td {' +
                  'margin-left: auto;' +
                  'margin-right: auto;' +
                  'border-bottom: 2px ridge black;' +
                  'width: 100px;' +
                  'text-align: center;' +
                  '}' +
                  '</style>';
              htmlToPrint += divToPrint.outerHTML;
               newWin= window.open("");
               newWin.document.write(htmlToPrint);
               newWin.print();
               newWin.close();
            }
    </script>
  </head>
  <body>
    <form action = "signup.php" method = "POST" class="container">
      Ime:<br>
      <input type="text" name="imee"  placeholder="Ime agenta"><br>
      Prezime:<br>
      <input type="text" name="prezimee" placeholder="Prezime agenta"><br>
      Broj telefona: <br>
      <input type="text" name="brTelefona" placeholder="Broj telefona agenta"><br>
      Sifra: <br>
      <input type="password" name="sifraa" placeholder="Sifra"><br>
      <input type="submit" name="dodaj" value="Dodaj agenta"><br>
    </form>
    <form action = "" method = "POST" class="container">
   <input type="text" name="Pretraga" placeholder="Pretraga" onkeydown="searchq()" onclick="searchq()"><br>
    <input type="submit" value="Sakrij tabelu" onclick="searchq(),return false" />
    <input type="submit" name="stampaj" value="Stampaj" onclick="printData()"><br>
    </form>
    <form class="container" action="logout.php">
      <input type="submit" name="logout" value="Odjava" >
    </form>
    <div id="output">

    </div>


  </body>
</html>
