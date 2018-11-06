<div class="container">
	<div class="container_wrap">
		<div class="header_top">
		<div class="col-sm-3 logo"><a href="<?php echo BASE_URL; ?>?view=panel"><img src="<?php echo BASE_URL; ?>assets/images/logo.jpg" alt=""/></a></div>
		    <div class="col-sm-6 nav">
			  <ul>
			<li><span class="simptip-position-bottom simptip-movable" data-tooltip="Empleados"><a href="<?php echo BASE_URL; ?>?view=registro"> </a></span></li>
            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Peliculas"><a href="<?php echo BASE_URL; ?>?view=registrope"> </a> </span></li>         
            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Categorias"><a href="<?php echo BASE_URL; ?>?view=registroca"> </a></span></li>
            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="Reportes"><a href="<?php echo BASE_URL; ?>?view=report"> </a></span></li>
			 </ul>
			</div>
			<div class="col-sm-3 header_right">
			   <ul class="header_right_box">
				 <li><img src="images/p1.png" alt=""/></li>
				 <li><p><a href="<?php echo BASE_URL ?>?view=entrarp">Entrar</a></p></li>
				 <li class="last"><i class="edit"> </i></li>
				 <div class="clearfix"> </div>
			   </ul>
			</div>
			<div class="clearfix"> </div>
	      </div>
	      <div class="content">
      	     <div class="register">
		  	  <form action="<?php echo BASE_URL?>?view=creaempleado" method="post">
				 <div class="register-top-grid">
					<h3>Registro de Peliculas</h3>
					 <div>
						<span>Nombre de la Pelicula<label>*</label></span>
						<input name="nombrepelicula" type="text" id="nombrepelicula"> 
					 </div>
					 <div>
						<span>Fecha de Estreno<label>*</label></span>
						<input name="fechaestreno" type="text" id="fechaestreno"> 
					 </div>
					 <div>
						 <span>Duración<label>*</label></span>
						 <input name="duracion" type="text" id="duracion"> 
					 </div>
					 <div>
						 <span>Sinopsis<label>*</label></span>
						 <input name="sinopsis" type="text" id="sinopsis"> 
					 </div>
                     <div>
						 <span>Imagen<label>*</label></span>
						 <input name="imagen" type="text" id="imagen">  
					 </div>
                     <div>
						 <span>Estado de Alquiler<label>*</label></span>
						 <input name="estadoalquiler" type="text" id="estadoalquiler">  
					 </div>
                     <div>
						 <span>Estado de Reserva<label>*</label></span>
						 <input name="estadoreserva" type="text" id="estadoreserva">  
					 </div>
                     <div>
						 <span>Fecha de Registro<label>*</label></span>
						 <input name="fecharegistro" type="text" id="fecharegistro">  
					 </div>
                     <div>
						 <span>Creado Por:<label>*</label></span>
						 <input name="creado" type="text" id="creado">  
					 </div>
                     <div>
					 <span>Seleccionar Categoria<label>*</label></span>
					 <select name="categoria" class="form-control">
					 	<option value"">Seleccionar una Opción</option>
						 <?php \models\cargo::agregaCategoria(); ?>
   					 </select>
					 </div>
		
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
					 </div>
				     				
                        <div class="clearfix"> </div>
                        <div class="register-but">	
						   
					   <input type="submit" id="button" class='acount-btn' style='outline: none;' border='0' value="Enviar">
					   
					   	<?php if(isset($_GET['empty']) && $_GET['empty'] == 1): ?>
					   		<div class="alert alert-danger pull-right">Datos Obligtorios</div>
						<?php endif;?>
						<?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
					   		<div class="alert alert-success pull-right">Pelicula Registrada Exitosamente</div>
						<?php endif;?>
						<div class="clearfix"> </div>
					   
				   </form>
				</div>
		   </div>
           </div>
    </div>
</div>