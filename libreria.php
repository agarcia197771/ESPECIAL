<?php

	function conexionString()
	{
		$xml=simplexml_load_file("conexion.xml");
		
		/* INTENTA CONECTAR LOCALMENTE */
		
		if ($xml->pswl == '-')
		{
			$conn= mysqli_connect($xml->hostl,$xml->userl,"",$xml->dbl);
		}
		else
		{
			$conn= mysqli_connect($xml->hostl,$xml->userl,$xml->pswl,$xml->dbl);
		}
		
		/* INTENTA CONECTAR REMOTAMENTE CON SERVIDOR WEB */
		
		if (mysqli_connect_errno()) 
		{
			$conn= mysqli_connect($xml->hostr,$xml->userr,$xml->pswr,$xml->dbr);
			
			if (mysqli_connect_errno()) 
			{
				$conn=0;
			}
		}
		
		return $conn;
	}

	function listaSucursales()
	{
		
		$conexion = conexionString();
		
		echo $conexion->connect_error;
		
		$sql = 'SELECT id_suc, nom_suc FROM sucursal';
		
		$resultado = $conexion->query($sql); 
		
		
		if ($resultado->num_rows > 0) 
		{
			if (isset($_COOKIE["sucursal_default"]))
			{
			  echo '<select class="titulo1" name="sucursal" '.'value="'.$_COOKIE["sucursal_default"].'">';
			}
			else
			{
			  echo '<select class="titulo1" name="sucursal" '.'value="1">';
			}
    		while($row = $resultado->fetch_assoc()) 
    		{echo $_COOKIE["sucursal_default"];
    			if ($_COOKIE["sucursal_default"] == $row["id_suc"])
    			{
        			echo '<option value="'.$row["id_suc"].'" selected>' . $row["nom_suc"]. '</option>';
    			}
    			else
    			{
    				echo '<option value="'.$row["id_suc"].'">' . $row["nom_suc"]. '</option>';
    			}
    		}
			
    		$_SESSION['inicios']=10;
    		
    		echo '</select>';
		}
		
		
	}

	function enviaMorralla($sucursal,$centavos,$peso,$dospesos)
	{
	  	
		$conexion = conexionString();

		echo $conexion->connect_error;
	
		date_default_timezone_set("America/Mexico_City");

		$fecha = date("Y-m-d");
		
		$sql = "SELECT id_se FROM sucursal_efectivo WHERE ((fecha_se = "."'".$fecha."')AND(Sucursal_id_suc = ".$sucursal."))";

		$resultado = $conexion->query($sql); 
		
		if ($resultado->num_rows != 0)
		{
			$sql = "DELETE FROM sucursal_efectivo WHERE ((fecha_se = "."'".$fecha."')AND(Sucursal_id_suc = ".$sucursal."))";
		
			$resultado = $conexion->query($sql); 
		
		}
		 
		$sql = "INSERT INTO sucursal_efectivo VALUES (NULL,".$sucursal.",83,"."'".$fecha."',".$centavos.")";
		
		$resultado = $conexion->query($sql); 
		
		$sql = "INSERT INTO sucursal_efectivo VALUES (NULL,".$sucursal.",84,"."'".$fecha."',".$peso.")";
		
		$resultado = $conexion->query($sql); 
		
		$sql = "INSERT INTO sucursal_efectivo VALUES (NULL,".$sucursal.",85,"."'".$fecha."',".$dospesos.")";
		
		$resultado = $conexion->query($sql); 
		
		$_SESSION['envio'] = 'La existecia fue enviada el día '.$fecha.' a las '.date("h:i:s"); 
		
		echo '<script>window.location.href = "http://www.panaderialaespecial.com/test/";</script>';
				
	
	}

	function muestraMorralla()
	{
		$conexion = conexionString();
			
		date_default_timezone_set("America/Mexico_City");

		$fecha = date("Y-m-d");
		
		$sql = "SELECT nom_suc, efectivo_id_efe, cantidad_se FROM sucursal_efectivo ".
				"INNER JOIN sucursal ". 
				"ON sucursal_efectivo.Sucursal_id_suc = sucursal.id_suc ". 
				"WHERE (fecha_se = "."'".$fecha."') ".
				"ORDER BY  nom_suc, efectivo_id_efe ASC";

		$resultado = $conexion->query($sql); 

		echo '<table class="tableClass" style="font-size:25px;font-family:arial;width:250px;margin-left:auto;margin-right:auto;margin-bottom:50px">';
		$titulo=0;
		while($row = mysqli_fetch_row($resultado)) 
		{
			$titulo++;
			if ($titulo == 1)
			{
				echo '<tr>';
				echo '<td colspan="2" style="text-align:center;border:solid;background-color:#ff6600">';
				echo 'Sucursal '.$row[0];
				echo '</td>';
  				echo '</tr>';
  			}
  			if ($titulo == 3)
			{
				$titulo =0;
			}
			
  			echo '<tr>';
				echo '<td style="text-align:center">';
				echo $row[1];
				echo '</td>';
				echo '<td style="text-align:center">';
				echo $row[2];
				echo '</td>';
  			echo '</tr>';
  			
		}
		
		echo "</table>";
		
	}

?>