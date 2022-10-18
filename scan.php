<div class="wrapper">
            <div class="row">
				
				
				
                <div class="col-md-12">
				
				<form action="ingresar.php" method="post" class="form-horizontal" style="border-radius: 5px;padding:10px;background:#fff;" id="divvideo">
                     <i class="glyphicon glyphicon-barcode"></i> <label>ESCANEAR CÓDIGO DE BARRAS AQUÍ</label><p></p>
                    <input  type="number" name="RAID" id="text" placeholder="scanear el DNI" class="form-control" >
					
                </form>
				 <div class="row">
						<div class="col-md-12">
						 <label style="color:#fff">Legend: </label>
						 <label class="label label-Success">A tiempo</label>
						<label class="label label-warning">Registro a Fuera de horario</label>
							
							<label class="label label-danger">Error al registrar</label>
						</div>
				</div>
					<br>	
				<div class="row">	
					<div class="col-md-12">
					<?php
					if(isset($_SESSION['error'])){
					  echo "
						<div id='alert' class='alert alert-danger' style='background:#eb3b5a;color:#fff;border:none'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-warning'></i> Error!</h4>
						  ".$_SESSION['error']."
						</div>
					  ";
					  unset($_SESSION['error']);
					}
					if(isset($_SESSION['success'])){
					  echo "
						<div id='alert' class='alert alert-success' style='background:#20bf6b;color:#fff;border:none'>
						  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						  <h4><i class='icon fa fa-check'></i> Correcto!</h4>
						  ".$_SESSION['success']."
						</div>
					  ";
					  unset($_SESSION['success']);
					}
					if(isset($_SESSION['warning'])){
						echo "
						  <div id='alert' class='alert alert-warning' style='background:#F46623;color:#fff;border:none'>
							<button type='button' class='close' data-dismiss='warning' aria-hidden='true'>&times;</button>
							<h4><i class='icon fa fa-check'></i> Advertencia!</h4>
							".$_SESSION['warning']."
						  </div>
						";
						unset($_SESSION['warning']);
					  }
					
				  ?>
				  </div>
				  </div>
                </div>
				
            </div>			
           </div>