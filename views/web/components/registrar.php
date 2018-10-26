<div class="container">
	<div class="container_wrap">
		<div class="header_top">
		<div class="col-sm-3 logo"><a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.jpg" alt=""/></a></div>
		    <div class="col-sm-6 nav">
			  <ul>
				 <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.html"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.html"> </a> </span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.html"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.html"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.html"> </a></span></li>
				 <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.html"> </a></span></li>
			 </ul>
			</div>
			<div class="col-sm-3 header_right">
			   <ul class="header_right_box">
				 <li><img src="images/p1.png" alt=""/></li>
				 <li><p><a href="<?php echo BASE_URL ?>?view=entrar">Entrar</a></p></li>
				 <li class="last"><i class="edit"> </i></li>
				 <div class="clearfix"> </div>
			   </ul>
			</div>
			<div class="clearfix"> </div>
	      </div>
	      <div class="content">
      	     <div class="register">
		  	  <form> 
				 <div class="register-top-grid">
					<h3>Información Personal</h3>
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
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
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
				</form>
				<div class="clearfix"> </div>
				<div class="register-but">
				   <form>
					   <input type="submit" name="button" id="button" value="Enviar">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
           </div>
    </div>
</div>
<?php
if ($msj==1)
	echo '<p align="center" >Se ha Agregado  Correctamente';
if ($msj==2)
	echo '<p align="center"> Problemas al Agregar, favor Revisar';

?>