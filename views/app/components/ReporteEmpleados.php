<div class="container">
	<div class="container_wrap">
		<div class="header_top">
		<div class="col-sm-3 logo"><a href="<?php echo BASE_URL; ?>?view=panel"><img src="<?php echo BASE_URL; ?>assets/images/logo.jpg" alt=""/></a></div>
		    <div class="col-sm-6 nav">
				<ul>
				<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Empleados"><a href="<?php echo BASE_URL; ?>?view=registro"> </a></span></li>
				<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Peliculas"><a href="<?php echo BASE_URL; ?>?view=registrope"> </a> </span></li>         
				<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Categorias"><a href="<?php echo BASE_URL; ?>?view=registroca"> </a></span></li>
				<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Reportes Peliculas"><a href="<?php echo BASE_URL; ?>?view=report"> </a></span></li>
				<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Reportes Empleados"><a href="<?php echo BASE_URL; ?>?view=reporte"> </a></span></li>
				<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Reportes Categorias"><a href="<?php echo BASE_URL; ?>?view=reportca"> </a></span></li>
				<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Reportes Cliente"><a href="<?php echo BASE_URL; ?>?view=reportcl"> </a></span></li>
				</ul>
			</div>
			<div class="col-sm-3 header_right">
			   <ul class="header_right_box">
				 <li><img src="images/p1.png" alt=""/></li>
				 <?php if(count($_SESSION) <= 0): ?>
				 	<li><p><a href="<?php echo BASE_URL ?>?view=entrarp">Entrar</a></p></li>
				<?php else: ?>
					<li><p><?php echo models\usuarioempleado::getProfile();?></p></li>
					<li><a href="<?php echo BASE_URL?>?view=logout">Salir</a></li>
				<?php endif;?>
				 <li class="last"><i class="edit"> </i></li>
				 <div class="clearfix"> </div>
			   </ul>
			</div>
			<div class="clearfix"> </div>
	      </div>
	      <div class="content">
      	     <div class="register">
		  	  <form action="<?php echo BASE_URL?>?view=reporte" method="post">
				 <div class="register-top-grid">
					<h3>Reportes Empleados</h3>
					 <div>
					 
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
					
					   </a>
					 </div>
				     <div class="clearfix"> </div>
					 </div>
				
				
					   
				   </form>
				</div>
				<!--- Lista  -->
				<div>
		   			<br><div id='title_videos' style='background: #b10000; width:137px; color: white; padding: 8px; border-top-left-radius: 16px; border-top-right-radius: 16px;'>[ Listado de Empleados ]</div>
					   <table style = 'width:100%;' >
					   		<thead style='background: #b10000;  color: white;   padding: 8px;'>
								<tr>
									<th style='width: 38%;  padding: 8px;'>Nombre</th><th style=' padding: 8px;'>Apellidos</th>
									<th style=' padding: 8px;'>Dirección</th><th style=' padding: 8px;'>telefono</th><th style=' padding: 8px;'>Cargo</th>
									<th style=' padding: 8px;'>Rol</th><th style=' padding: 8px;'>Operaciones</th>
								</tr>   
							</thead>
							<tbody>
								<?php
									 \models\empleado::consultarEmpleados();
									 \models\empleado::editaEmpleado();
								?>
															
								
							</tbody>
					   </table>
		   		</div>
		   </div>
           </div>

		   
    </div>
</div>