
<html>
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>RA | Asistencia SEDE - TARMA</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<link rel="stylesheet" href="css/buttons.dataTables.min.css">
    </head>
    <body style="background:#eee">
        <nav class="navbar" style="background:#fff">
		  <div class="container-fluid">
			<div class="navbar-header cont-header">
			
			</div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
			  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Mantenimiento <span class="caret"></span></a>
				<ul class="dropdown-menu">
				  <li><a href="#"><span class="glyphicon glyphicon-user"></span> MIEMBROS</a></li>
				  <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> NUEVO MIEMBRO</a></li>
				  <li><a href="registro.php"><span class="glyphicon glyphicon-calendar"></span> REGISTRO</a></li>

				</ul>
			  </li>
			  <li><a href="#"><span class="glyphicon glyphicon-align-justify"></span> Reportes</a></li>
              <li><a href="index.php"><span class="glyphicon glyphicon-time"></span> Check Ingreso</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrase</a></li>
			  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
			</ul>
		  </div>
		</nav>
       <div class="container">
            <div class="row">
                <div class="col-md-12">
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Success!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
				  ?>

                </div>
				
                <div class="col-md-12">
				<div style="border-radius: 5px;padding:10px;background:#fff;">
               <p>Lista de Registros</p>
			   <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
						<td>Nombres</td>
						<td>DNI</td>
						<td>CARGO</td>
						<td>NIVEL</td>
						<td>INGRESO</td>
						<td>SALIDA</td>
						<td>FECHA</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						require_once 'conn.php';
						$date = date('Y-m-d');
                        if($conn->connect_error){
                            die("Connection failed" .$conn->connect_error);
                        }
                           $sql ="SELECT re.FechaRegistro as fecha,re.HoraIngreso as ingreso,re.HoraSalida as salida,re.miembros_DNI as dni,concat(m.Nombres, '', m.Apellidos) as datos,c.Descripcion as cargo,n.Descripcion as nivel FROM registros AS re 
						   INNER JOIN miembros as m ON
						   re.miembros_DNI= m.DNI
						   INNER JOIN cargo c ON
						   m.cargo_idCargo = c.idCargo
						   INNER JOIN nivel n ON
						   m.nivel_idNivel = n.idNivel
						   INNER JOIN sede s ON
						   m.sede_idsede= s.idsede
						   WHERE s.idsede=1";
                           $query = $conn->query($sql);
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $row['datos'];?></td>
                                <td><?php echo $row['dni'];?></td>
								<td><?php echo $row['cargo'];?></td>
                                <td><?php echo $row['nivel'];?></td>
								<td><?php echo $row['ingreso'];?></td>
                                <td><?php echo $row['salida'];?></td>
                                <td><?php echo $row['fecha'];?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
				  
                </div>
				
                </div>
				
            </div>
						
        </div>
		<script>
			function Export()
			{
				var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
				if(conf == true)
				{
					window.open("export.php",'_blank');
				}
			}
		</script>				
    
		<script src="plugins/jquery/jquery.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

		<script src="js/dataTables.buttons.min.js"></script>
		<script src="js/jszip.min.js"></script>
		<script src="js/pdfmake.min.js"></script>
		<script src="js/vfs_fonts.js"></script>
		<script src="js/buttons.html5.min.js"></script>
		<script src="js/buttons.print.min.js"></script>	
		<script>
			$(document).ready(function() {
			$('#example1').DataTable( {
				dom: 'Bfrtip',
				buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
			} );
		} );
		</script>
		
    </body>
</html>