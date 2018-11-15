<div class="container">
	<div class="container_wrap">
		<div class="header_top">
		<div class="col-sm-3 logo"><a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.jpg" alt=""/></a></div>
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
		  	  <form action="<?php echo BASE_URL?>?view=updatecliente" method="post">
				 <div class="register-top-grid">
					<h3>Información del Cliente</h3>
					 <div>
					 	<span>Documento<label>*</label></span>
						<input name="documento" type="text" id="documento" value="<?php echo $id_cliente;?>">
					</div>
					<div>
						<span>Nombres<label>*</label></span>
						<input name="nombres" type="text" id="nombres" value="<?php echo $nombres;?>" > 
					 </div>
					 <div>
						<span>Apellidos<label>*</label></span>
						<input name="apellidos" type="text" id="apellidos" value="<?php echo $apellidos;?>"> 
					 </div>
					 <div>
						 <span>Dirección<label>*</label></span>
						 <input name="direccion" type="text" id="direccion" value="<?php echo $direccion;?>"> 
					 </div>
					 <div>
						 <span>Correo<label>*</label></span>
						 <input name="correo" type="text" id="correo"value="<?php echo $correo;?>">  
					 </div>
					 <div>
						 <span>Teléfono<label>*</label></span>
						 <input name="telefono" type="text" id="telefono"value="<?php echo $telefono;?>"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 
					   </a>
					 </div>
				     
				
				<div class="clearfix"> </div>
				<div class="register-but">	
						   
					   <input type="submit" id="button" class='acount-btn' style='outline: none;' border='0' value="Enviar">
					   
					   	

					   <div class="clearfix"> </div>
					   
				   </form>
				</div>
		   </div>
           </div>
    </div>
</div>