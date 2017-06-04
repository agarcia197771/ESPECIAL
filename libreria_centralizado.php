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

	function obtenNoVuelta($fecha)
	{
		$conexion = conexionString();
		
		echo $conexion->connect_error;
		
		$sql = "SELECT id_vuelta FROM vueltas ".
			   "INNER JOIN cortes ".
			   "ON (cortes.id_corte = vueltas.cortes_id_corte )".
			   "WHERE (cortes.fecha_corte =". "'".$fecha."')";
		
		$resultado = $conexion->query($sql); 

		echo $resultado->num_rows;
		
	}

?>