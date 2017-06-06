<?php
	function conexionString()
	{
		$xml=simplexml_load_file("conexion_db_centralizado.xml");
		
		/* INTENTA CONECTAR LOCALMENTE */
		
		if ($xml->pswl == '-')
		{
			$conn= mysqli_connect($xml->hostl,$xml->userl,"",$xml->dbl);
		}
		else
		{
			$conn= mysqli_connect($xml->hostl,$xml->userl,$xml->pswl,$xml->dbl);
		}
		
		return $conn;
	}

	function obtenNoVuelta()
	{
		date_default_timezone_set("America/Mexico_City");

		$fecha = date("Y-m-d");
		
		$conexion = conexionString();
		
		echo $conexion->connect_error;
		
		$sql = "SELECT id_vuelta FROM vueltas ".
			   "INNER JOIN cortes ".
			   "ON (cortes.id_corte = vueltas.cortes_id_corte )".
			   "WHERE (cortes.fecha_corte =". "'".$fecha."')";
		
		$resultado = $conexion->query($sql); 
		
		$vuelta = $resultado->num_rows + 1;
		
		$conexion->close();
		
		return $vuelta;
		
	}
	
	function inicializaCorte()
	{
		$conexion = conexionString();
		
		echo $conexion->connect_error;
		
		date_default_timezone_set("America/Mexico_City");

		$fecha = date("Y-m-d");
		
		$sql = "SELECT id_corte FROM cortes ".
			   "WHERE (fecha_corte =". "'".$fecha."')";
		
		$resultado = $conexion->query($sql); 
		
		if ($resultado->num_rows == 0)
		{
			$sql = "INSERT INTO cortes VALUES (NULL,"."'".$fecha."',"."0)";
		
				$resultado = $conexion->query($sql); 
		
		}
		$conexion->close();
	}
	
	

?>