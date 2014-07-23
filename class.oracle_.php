<?php
error_reporting(NULL);
set_time_limit(9000);
class cms_conf_orcl{
	/*
	//QA
	var $HOST			= "192.168.200.190";
	var $PORT			= "1527";
	var $SID			= "QASYB";
	var $USER_NAME		= "PUNTOS";
	var $PASSWORD		= "PUNTOSQA";
	*/
	//PRODUCCION
	var $HOST			= "172.20.1.153";
	var $PORT			= "1521";
	var $SID			= "prodsbf";
	var $USER_NAME		= "puntos";
	var $PASSWORD		= "puntos";
}
?>
<?php
class cms_oracle{
	var $sid;
	var $connection;
	function __construct(){
		$config = new cms_conf_orcl();
		$this->USER_NAME = $config->USER_NAME;
		$this->PASSWORD = $config->PASSWORD;
		/* SET CONECTION */
		$host = $config->HOST;
		$port = $config->PORT;
		$sid = $config->SID;
		$this->sid="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT = $port)))(CONNECT_DATA =(SID=$sid)))";
	}
	/******************************/
	/* Param: in
	/* Rut: number
	/* DV: varchar2
	/* Param: out
	/* '00': Exito
	/* '02': Cliente no existe
	/* '99': Error no controlado
	/******************************/
	function logeo($set){
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid);
		
		$query = "begin adm_websitesb_pkg.logeo(";
		$query .= $set['rut'].",";
		$query .= "'".$set['dv']."',";
		$query .= ":Password,";
		$query .= ":Pregunta,";
		$query .= ":Respuesta,";
		$query .= ":Codigo_error,";
		$query .= ":Msg_error";
		$query .= "); end;";
		
		$stmt = OCIParse($connection, $query) or die ('Ocurrio un problema a ejecutar: '.$query);
		
		OCIBindByName($stmt, ":Password" ,$Password, 250)			or die('Variable no enlazada');
		OCIBindByName($stmt, ":Pregunta" ,$Pregunta, 250)			or die('Variable no enlazada');
		OCIBindByName($stmt, ":Respuesta" ,$Respuesta, 250)			or die('Variable no enlazada');
		OCIBindByName($stmt, ":Codigo_error" ,$Codigo_error, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Msg_error" ,$Msg_error, 250)			or die('Variable no enlazada');
		OCIExecute($stmt) or die('No se ejecuto el procedimiento almacenado'.$query);
		$return = Array(
			$Password,
			$Pregunta,
			$Respuesta,
			$Codigo_error,
			$Msg_error
		);
		
		OCIFreeStatement($stmt);
		
		return $return;
	}
	function regiones(){
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid) or die('Ocurrio un error de conexion');
		$query = "Select * from regiones";
	}
	function tb_ciudad(){
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid) or die('Ocurrio un error de conexion');
		$query = "select * from tb_ciudad";
	}
	function vm_comunas_chile(){
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid) or die('Ocurrio un error de conexion');
		$query = "Select * from  vm_comunas_chile";
	}
	function consulta_cli($set){
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid);
		
		$query = "begin adm_websitesb_pkg.consulta_cli(";
		$query .= $set['rut'].",";
		$query .= "'".$set['dv']."',";
		$query .= ":Nombre1,";
		$query .= ":Nombre2,";
		$query .= ":Apellido_Paterno,";
		$query .= ":Apellido_Materno,";
		$query .= ":Fecha_Nacimiento,";
		$query .= ":Sexo,";
		$query .= ":Direccion,";
		$query .= ":Numero,";
		$query .= ":Depto_block,";
		$query .= ":Comuna,";
		$query .= ":Region,";
		$query .= ":Telefono_fijo,";
		$query .= ":Telefono_celular,";
		$query .= ":mail,";
		$query .= ":Estado_civil,";
		$query .= ":Password,";
		$query .= ":Pregunta,";
		$query .= ":Respuesta,";
		$query .= ":Codigo_Error,";
		$query .= ":Mensaje_Error";
		$query .= "); end;";
		$stmt = OCIParse($connection, $query) or die ('Ocurrio un problema a ejecutar: '.$query);
		
		OCIBindByName($stmt, ":Nombre1" ,$Nombre1, 250)						or die('Variable no enlazada');
		OCIBindByName($stmt, ":Nombre2" ,$Nombre2, 250)						or die('Variable no enlazada');
		OCIBindByName($stmt, ":Apellido_Paterno" ,$Apellido_Paterno, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Apellido_Materno" ,$Apellido_Materno, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Fecha_Nacimiento" ,$Fecha_Nacimiento, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Sexo" ,$Sexo, 250)							or die('Variable no enlazada');
		OCIBindByName($stmt, ":Direccion" ,$Direccion, 250)					or die('Variable no enlazada');
		OCIBindByName($stmt, ":Numero" ,$Numero, 250)						or die('Variable no enlazada');
		OCIBindByName($stmt, ":Depto_block" ,$Depto_block, 250)				or die('Variable no enlazada');
		OCIBindByName($stmt, ":Comuna" ,$Comuna, 250)						or die('Variable no enlazada');
		OCIBindByName($stmt, ":Region" ,$Region, 250)						or die('Variable no enlazada');
		OCIBindByName($stmt, ":Telefono_fijo" ,$Telefono_fijo, 250)			or die('Variable no enlazada');
		OCIBindByName($stmt, ":Telefono_celular" ,$Telefono_celular, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":mail" ,$mail, 250)							or die('Variable no enlazada');
		OCIBindByName($stmt, ":Estado_civil" ,$Estado_civil, 250)			or die('Variable no enlazada');
		OCIBindByName($stmt, ":Password" ,$Password, 250)					or die('Variable no enlazada');
		OCIBindByName($stmt, ":Pregunta" ,$Pregunta, 250)					or die('Variable no enlazada');
		OCIBindByName($stmt, ":Respuesta" ,$Respuesta, 250)					or die('Variable no enlazada');
		OCIBindByName($stmt, ":Codigo_Error" ,$Codigo_Error, 250)			or die('Variable no enlazada');
		OCIBindByName($stmt, ":Mensaje_Error" ,$Mensaje_Error, 250)			or die('Variable no enlazada');
		
		OCIExecute($stmt) or die('No se ejecuto el procedimiento almacenado'.$query);
		
		$return = Array(
			$Nombre1,
			$Nombre2,
			$Apellido_Paterno,
			$Apellido_Materno,
			$Fecha_Nacimiento,
			$Sexo,
			$Direccion,
			$Numero,
			$Depto_block,
			$Comuna,
			$Region,
			$Telefono_fijo,
			$Telefono_celular,
			$mail,
			$Estado_civil,
			$Password,
			$Pregunta,
			$Respuesta,
			$Codigo_Error,
			$Mensaje_Error
		);
		
		OCIFreeStatement($stmt);
		
		return $return;

	}
	function registro($set){
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid);
		if(!$connection){
			return false;
		}
		/* 
		/* $set->provincia
		/* $set->password
		/* $set->info
		/* $set->sms
		*/
		$query = "begin ";
		$query .= "adm_websitesb_pkg.inscribe_cli(";
		$query .= $set['rut'].",";
		$query .= "'".$set['DV']."',";
		$query .= "'".$set['primer_nombre']."',";
		$query .= "'".$set['segundo_nombre']."',";
		$query .= "'".$set['apellido_paterno']."',";
		$query .= "'".$set['apellido_materno']."',";
		$query .= "to_date('".$set['fecha_nacimiento']."', 'dd-mon-yyyy'),";
		$query .= "'".$set['sexo']."',";
		$query .= "'".$set['calle']."',";
		$query .= "'".$set['user_numero']."',";
		$query .= "'".$set['depto']."',";
		$query .= "'".$set['comuna']."',";
		$query .= "'".$set['region']."',";
		$query .= "'".$set['telefono_fijo']."',";
		$query .= "'".$set['telefono_celular']."',";
		$query .= "'".$set['email']."',";
		$query .= "'".$set['estado_civil']."',";
		$query .= "'".$set['password']."',";
		$query .= "'primer nombre',";
		$query .= "'".$set['primer_nombre']."',";
		$query .= ":Codigo_Error,";
		$query .= ":Mensaje_Error);";
		$query .= "end;";
		
		$stmt = OCIParse($connection, $query) or die ('Ocurrio un problema a ejecutar: '.$query);
		
		OCIBindByName($stmt, ":Codigo_error" ,$Codigo_error, 250)	or die('Variable no enlazada');
		
		OCIBindByName($stmt, ":Mensaje_Error" ,$Mensaje_Error, 250)	or die('Variable no enlazada');
		
		OCIExecute($stmt) or die('No se ejecuto el procedimiento almacenado'.$query);
		$return = Array(
			$Codigo_error,
			$Mensaje_Error
		);
		OCIFreeStatement($stmt);
		return $return;
	}
	function actualizar($set){
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid);
		if(!$connection){
			return false;
		}
		
		$query = "begin ";
		$query .= "adm_websitesb_pkg.actualiza_cli (";
			$query .= $set['rut'].",";
			$query .= "'".$set['DV']."',";
			$query .= "'".$set['nombre']."',";
			$query .= "'".$set['apellido_paterno']."',";
			$query .= "'".$set['apellido_materno']."',";
			$query .= "to_date('".$set['fecha_nacimiento']."', 'dd-mon-yyyy'),";
			$query .= "'".$set['sexo']."',";
			$query .= "'".$set['direccion']."',";
			$query .= "'".$set['comuna']."',";
			$query .= "'".$set['region']."',";
			$query .= "'".$set['telefono_fijo']."',";
			$query .= "'".$set['telefono_celular']."',";
			$query .= "'".$set['email']."',";
			$query .= "'".$set['estado_civil']."',";
			$query .= "'".$set['password']."',";
			$query .= "'primer nombre',";
			$query .= "'".$set['primer_nombre']."',";
			$query .= ":Codigo_error,";
			$query .= ":Mensaje_Error);";
		$query .= "end;";
		
		$stmt = OCIParse($connection, $query) or die ('Ocurrio un problema a ejecutar: '.$query);
		OCIBindByName($stmt, ":Codigo_error" ,$Codigo_error, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Mensaje_Error" ,$Mensaje_Error, 250)	or die('Variable no enlazada');
		OCIExecute($stmt) or die('No se ejecuto el procedimiento almacenado'.$query);
		$return = Array(
			$Codigo_error,
			$Mensaje_Error
		);
		OCIFreeStatement($stmt);
		return $return;
	}
	
	function getPuntos($set){
		/* 
		/* $set->rut
		*/
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid);
		if(!$connection){
			return false;
		}
		
		$query = "begin ";
		$query .= "adm_comunidadsb_pkg.consulta_puntos (";
			$query .= $set['rut'].",";
			$query .= ":Saldo_disponible,";
			$query .= ":Saldo_total,";
			$query .= ":Saldo_x_vencer,";
			$query .= ":Mensaje_Error);";
		$query .= "end;";
		
		$stmt = OCIParse($connection, $query) or die ('Ocurrio un problema a ejecutar: '.$query);
		
		OCIBindByName($stmt, ":Saldo_disponible" ,$Saldo_disponible, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Saldo_total" ,$Saldo_total, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Saldo_x_vencer" ,$Saldo_x_vencer, 250)	or die('Variable no enlazada');
		OCIBindByName($stmt, ":Mensaje_Error" ,$Mensaje_Error, 250)	or die('Variable no enlazada');
		
		OCIExecute($stmt) or die('No se ejecuto el procedimiento almacenado'.$query);
		$return = Array(
			$Saldo_disponible,
			$Saldo_total,
			$Saldo_x_vencer
		);
		OCIFreeStatement($stmt);
		return $return;
	}
	function getPedido($set){
		/* 
		/* $set->rut
		*/
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid);
		if(!$connection){
			return false;
		}
		
		$query = "begin ";
		$query .= "Recvta_fonofarmacia_internet.GetInfoCliente(";
			$query .= $set['rut'].",";
			$query .= $set['dv'].",";
			$query .= ":p_registro,";
			$query .= ":p_msg_rsp,";
			$query .= ":p_cod_error,";
			$query .= ":p_msg_error);";
		$query .= "end;";
		
		$stmt = OCIParse($connection, $query) or die ('Ocurrio un problema a ejecutar: '.$query);
		
		OCIBindByName($stmt,":p_registro" ,$p_registro, 250)   or die   ('Can not bind variable');
		OCIBindByName($stmt,":p_msg_rsp" ,$p_msg_rsp, 650)   or die   ('Can not bind variable');
		OCIBindByName($stmt,":p_cod_error" ,$p_cod_error, 650)   or die   ('Can not bind variable');
		OCIBindByName($stmt,":p_msg_error" ,$p_msg_error, 650)   or die   ('Can not bind variable');
		
		OCIExecute ($stmt)  or die('No se ejecuto el procedimiento almacenado'.$query);
		
		$return = Array(
			strtoupper($p_registro),
			trim(substr($p_registro, 0, 30)),
			trim(substr($p_registro, 30, 30)),
			trim(substr($p_registro, 60, 20)), 
			trim(substr($p_registro, 80, 20)), 
			(int)substr($p_registro, 100, 10),
			substr($p_registro, 110, 1),
			trim(substr($p_registro, 111,60)),
			trim(substr($p_registro, 171, 10)),
			trim(substr($p_registro, 181, 10)),
			trim(substr($p_registro, 191, 20)),
			trim(substr($p_registro, 211, 20)),
			$p_msg_rsp
		);
		OCIFreeStatement($stmt);
		return $return;
	}
	
	function generaPedidoCliente($set){
		
		$connection = OCILogon($this->USER_NAME, $this->PASSWORD, $this->sid);
		if(!$connection){
			return false;
		}
		
		$cabecera=str_pad(trim($set['nombre']),30).
		str_pad($set['apellido'],30).
		str_pad($set['telefono1'],20).
		str_pad($set['telefono2'],20).
		str_pad($set['rut'], 10, "0", STR_PAD_LEFT).
		str_pad($set['dv'],1).
		str_pad($set['calle'],60).
		str_pad($set['numero'],10).
		str_pad($set['depto'],10).
		str_pad($set['region'],20).
		str_pad($set['comuna'],20);
		
		$detalle = str_pad(count($set['productos']), 3, "0", STR_PAD_LEFT);
		$conteo=1;
		foreach($set['productos'] AS $producto){
			$detalle .= str_pad("$conteo", 3, "0", STR_PAD_LEFT);
			$detalle .= str_pad($producto['producto'], 60, " ");
			$detalle .= str_pad($producto['cantidad'], 3, "0", STR_PAD_LEFT);
			$conteo++;
		}
		$query = "begin ";
		$query .= "Recvta_fonofarmacia_internet.GeneraPedidoCliente(";
			$query .= "'".$cabecera."',";
			$query .= "'".$detalle."',";
			$query .= ":p_msg_rsp,";
			$query .= ":p_cod_error,";
			$query .= ":p_msg_error);";
		$query .= "end;";
		
		$stmt = OCIParse($connection, $query) or die ('Ocurrio un problema a ejecutar : '.$query);
		OCIBindByName($stmt,":p_msg_rsp" ,$p_msg_rsp, 650)   or die   ('Can not bind variable'); 
		OCIBindByName($stmt,":p_cod_error" ,$p_cod_error, 650)   or die   ('Can not bind variable'); 		
		OCIBindByName($stmt,":p_msg_error" ,$p_msg_error, 650)   or die   ('Can not bind variable'); 				
		OCIExecute ($stmt)  or die('No se ejecuto el procedimiento almacenado'.$query); 
        OCIFreeStatement($stmt);

	 	return Array($p_msg_rsp, $p_cod_error, $p_msg_error);
	}
}
?>