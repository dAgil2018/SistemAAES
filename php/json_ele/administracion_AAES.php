<?php 
	@session_start();
	include_once("../../Conexion/Conexion.php");
	$estado = '1';

	if (isset($_POST[variable]) && $_POST[variable]=='1') {	
		$query = "INSERT INTO asociacion_aaes(nombre,telefono,fax,contacto_operador,contacto_comercial,contacto_documentos,direccion,email)values(?,?,?,?,?,?,?,?)";

		try {
			$comando = Conexion::getInstance()->getDb()->prepare($query);
	        $comando->execute(array($_POST[nombre_asociacion],$_POST[telefono],$_POST[fax],$_POST[operador],$_POST[contacto_comercial],$_POST[contacto_documentos],$_POST[direccion],$_POST[email]));
	        echo json_encode(array("exito" => "1"));
	       
		} catch (Exception $ex) {
			 echo json_encode(array("error" => $ex));
		}
	}

?>