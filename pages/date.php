<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  /*$( function() {
    $( "#datepicker" ).datepicker();
  } );
  */
  
	window.moveTo(0,0);
    window.resizeTo(screen.width,screen.height);   
  function teste(){
	 var campo = document.getElementById('teste').value;
	 var n     = campo.length;
	 //alert(n);
	 
	 if(n > 10){
		window.open('', '_self', ''); window.close(); 
	 }
	
  } 
  
  function tabClose() {
	close();
}
  </script>
</head>
<body>
 <button onclick="tabClose()">Close Window</button>
 <input type="text" id="teste" onkeyup="teste();" />
<p>Date: <input type="text" id="datepicker"></p>
 
 
</body>
</html>