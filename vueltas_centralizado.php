
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
 			
  			echo utf8_encode('Captura de Efectivo: ');

  			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

  			$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 			
  			echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
  			
 			echo '<p class="titulo2" style="text-align: center;">';
 			
 			echo "Vuelta No. ".obtenNoVuelta();
 			
 			echo'</p>';
  		?>
 	
 		<form action="">
 		
 			<table class="tableClass">
 				<tr>
 					<td class="tdClassMenor">
 						$1000.00
 					</td>
 					<td class="tdClassMenor"	>
 						<input type="number" value="0" name="mil" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$500.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="quinientos" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$200.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="doscientos" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$100.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="cien" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$50.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="cincuenta" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 			
 				<tr>
 					<td class="tdClassMenor">
 						$20.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="veinte" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$10.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="diez" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$5.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="cinco" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$2.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="dos" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$1.00
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="peso" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$0.50
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="cincuentaCent" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$0.20
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="veinteCent" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 				<tr>
 					<td class="tdClassMenor">
 						$0.10
 					</td>
 					<td class="tdClassMenor">
 						<input type="number" value="0" name="diezCent" class="tdClassMenor" style="border:none;width:150px">
 					</td>
 				</tr>
 			</table>
 		
 			<p style="text-align: center;">
 		
 				<input type="submit" value="Guardar" class="titulo2" >
 		
 			</p>
 		</form>	

	</div>  
</body>

</html>

