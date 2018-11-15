<div class="container">
	<div class="container_wrap">
		<div class="header_top">
		<div class="col-sm-3 logo"><a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.jpg" alt=""/></a></div>
		    <div class="col-sm-6 nav">
			 
			</div>
			<div class="col-sm-3 header_right">
			   <ul class="header_right_box">
				 <li><img src="images/p1.png" alt=""/></li>
				 <?php if(count($_SESSION) <= 0): ?>
				 	<li><p><a href="<?php echo BASE_URL ?>?view=entrar">Entrar</a></p></li>
				<?php else: ?>
					<li><p><?php echo models\usuarios::getProfile();?></p></li>
					<li><a href="<?php echo BASE_URL?>?view=logout1">Salir</a></li>
				<?php endif;?>
				 <li class="last"><i class="edit"> </i></li>
				 <div class="clearfix"> </div>
			   </ul>
			</div>
			<div class="clearfix"> </div>
	      </div>
	      <div class="content">
      	     <div class="register">
		  	  <form action="<?php echo BASE_URL?>?view=creacliente" method="post">
				 <div class="register-top-grid">
					<h3>Información Personal Cliente</h3>
					 <div>
					 	<span>Documento<label>*</label></span>
						<input name="documento" type="text" id="documento">
					</div>
					<div>
						<span>Nombres<label>*</label></span>
						<input name="nombres" type="text" id="nombres"> 
					 </div>
					 <div>
						<span>Apellidos<label>*</label></span>
						<input name="apellidos" type="text" id="apellidos"> 
					 </div>
					 <div>
						 <span>Dirección<label>*</label></span>
						 <input name="direccion" type="text" id="direccion"> 
					 </div>
					 <div>
						 <span>Correo<label>*</label></span>
						 <input name="correo" type="text" id="correo">  
					 </div>
					 <div>
						 <span>Teléfono<label>*</label></span>
						 <input name="telefono" type="text" id="telefono"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Información de Inicio de Sesión</h3>
							 <div>
								<span>Contraseña<label>*</label></span>
								<input name="contrasena" type="text" id="contrasena">
							 </div>
							 <div>
								<span>Confirmar Contraseña<label>*</label></span>
								<input name="confirmarcontrasena" type="text" id="confirmarcontrasena">
							 </div>
							 <div class="clearfix"> </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">	
						   
					   <input type="submit" id="button" class='acount-btn' style='outline: none;' border='0' value="Enviar">
					   
					   	<?php if(isset($_GET['empty']) && $_GET['empty'] == 1): ?>
					   		<div class="alert alert-danger pull-right">Datos Obligtorios</div>
						<?php endif;?>
						<?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
					   		<div class="alert alert-success pull-right">Usuario Registrado Exitosamente</div>
						<?php endif;?>
						<?php if(isset($_GET['pass']) && $_GET['pass'] == 0): ?>
					   		<div class="alert alert-danger pull-right">Contraseñas no coinciden</div>
						<?php endif;?>

					   <div class="clearfix"> </div>
					   
				   </form>
				</div>
		   </div>
           </div>
    </div>
</div>