
<html>
	<head>
		 <link rel="stylesheet" href="style.css">
		 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		 <?php 
		 	include 'libreria_centralizado.php';
		 ?>
	</head>

<body>
 
 	<div class="divCentral">
 	
 		<?php 
  			echo '<p class="titulo2" style="text-align: center;">';
 			
  			echo utf8_encode('Resumen del corte del d�a: ');

  			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 			
  			echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
  		
 			echo'</p>';
 			
 			inicializaCorte();
  		?>
 		
 		<form action="vueltas_centralizado.php" method="post" style="width:250px;border:solid;margin-left:auto;margin-right: auto">
			<input type="submit" value="Capturar Efectivo" style="font-size: 30px">
		</form>
		
		

	</div>  
</body>

</html>

