<?php
	require_once 'conn.php';
	include('timezone.php');
    if(!empty($_POST['RAID'])){
        $RAID =$_POST['RAID'];
		$date = $timestamp->format('Y-m-d');
		$year = $timestamp->format('Y');
		$time = $timestamp->format('Y-m-d H:i:s');
		$sql = "SELECT * FROM miembros WHERE DNI = '$RAID'";
		$query = $conn->query($sql);
		if($query->num_rows < 1){
			$_SESSION['error'] = 'NO existe Usuario con el numero de DNI '.$RAID;
		}else{
				$row = $query->fetch_assoc();
				$id = $row['DNI'];
				$NombreApp=$row['Nombres'].' '.$row['Apellidos'];
				$sql ="SELECT * FROM registros WHERE miembros_DNI='$id' AND FechaRegistro='$date' AND ESTADO='0'";
				$query=$conn->query($sql);
				//seleccinar el turno segun el dni
				$sql2 = "SELECT mt.miembros_DNI,t.idTurno,t.descripcion,h.idHorario,h.HoraIn,h.plazo_int_ini,h.plazo_int_fin,h.HoraOunt,h.plazo_out_ini,h.plazo_out_fin FROM miembros_has_turno AS mt 
				INNER JOIN turno AS t ON
				mt.turno_idTurno =t.idTurno
				INNER JOIN horario AS h 
				ON t.horario_idHorario = h.idHorario
				WHERE mt.miembros_DNI=$id";
				$query2 = $conn->query($sql2);
					
                //aca se deve evaluar row de registros 
				while ($row2 = $query2->fetch_assoc()){
					$desde=$row2['plazo_int_ini'];
					$SalidaAnti=$row2['plazo_out_ini'];
					$hora_actual=$time = $timestamp->format('H:i:s'); 
				 if($desde >= $hora_actual || $SalidaAnti >= $hora_actual ){
					$desde=$row2['plazo_int_ini'];
					$hasta=$row2['plazo_int_fin'];
					$horaSalida=$row2['HoraOunt'];
					$SalidaAnti=$row2['plazo_out_ini'];
					$horaEn=$row2['HoraIn'];
				 }
				
				}
				if($query->num_rows>0){
					
                    if ($hora_actual>=$horaSalida){
						$sql = "UPDATE registros SET HoraSalida='$time', ESTADO='1',detalle_salida=1 WHERE miembros_DNI='$id' AND FechaRegistro='$date'";
						$query=$conn->query($sql);
						$_SESSION['success'] = 'Salida registrada: '.$NombreApp.' : '.$time;
					}
					elseif($hora_actual >= $SalidaAnti && $SalidaAnti < $horaSalida ){
						$sql = "UPDATE registros SET HoraSalida='$time', ESTADO='1',detalle_salida=5 WHERE miembros_DNI='$id' AND FechaRegistro='$date'";
						$query=$conn->query($sql);
					    $_SESSION['warning'] = 'Salida registrada Antes de Tiempo: '.$NombreApp.' : '.$time;
					}
					else{
						$_SESSION['error'] = "ya registro su ingreso su horario de salida es :".$horaSalida;
					}	
				}
				else
				{
					$res=ValidarHorario($horaEn, $desde, $hasta,$hora_actual);
					switch ($res) {
						case "atiempo":
							$sql = "INSERT INTO registros(FechaRegistro,HoraIngreso,Year,detalle_ingreso,ESTADO,miembros_DNI)
							 VALUES('$date','$time','$year',1,0,'$id')";
							
							if (mysqli_query($conn, $sql)) {
								$_SESSION['success'] = 'Asistencia Registrada: '.$NombreApp.' : '.$time;
							} else {
								$_SESSION['error'] = $conn->error;
							}	
							break;
						case "tarde":
							$sql = "INSERT INTO registros(FechaRegistro,HoraIngreso,Year,detalle_ingreso,ESTADO,miembros_DNI)
							 VALUES('$date','$time','$year',2,0,'$id')";
							
							if (mysqli_query($conn, $sql)) {
								$_SESSION['warning'] = 'Asistencia tarde: '.$NombreApp.' : '.$time;
							} else {
								$_SESSION['error'] = $conn->error;
							}	
							break;
						case "noregistrar":
							$_SESSION['error'] = "No tienes Programado Ningun ingreso a esta Hora: ".$time;
						break;
						
					}
		          }	
				
	    }

	}
	else{
		$_SESSION['error'] = 'Escanee el código de barras de su DNI';
    }     
	 function ValidarHorario($horaEn, $desde, $hasta,$hora_actual){			
		if ($hora_actual >= $desde && $hora_actual < $horaEn ) {
			$resp="atiempo";
		}
		elseif($hora_actual > $horaEn && $hora_actual < $hasta){
			
			$resp="tarde";
		}
		else{
			$resp="noregistrar";
		}
		return $resp;
		
	}
header("location: index.php");
	   
$conn->close();
?>