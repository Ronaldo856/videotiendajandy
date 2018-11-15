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
		  	  <form action="<?php echo BASE_URL?>?view=updatecategoria" method="post">
				 <div class="register-top-grid">
					<h3>Creación de Categorias</h3>
					<div>
					 	<span>Codigo<label>*</label></span>
						 <input name="codigo" type="hidden" id="codigo"  value = "<?php echo $id_categoria;?>"> 
						<input  type="text"  disabled  value = "<?php echo $id_categoria;?>">
					</div>
					 <div>
					 	<span>Nombre de la Categoria<label>*</label></span>
						<input name="nombrecategoria" type="text" id="nombrecategoria" value = "<?php echo $nombre_categoria;?>">
					</div>
					<div>
						<span>Fecha de Creación<label>*</label></span>
						<input name="fechacreacion" type="date" id="fechacreacion" value = "<?php echo $fecha_creacion;?>"> 
					 </div>
					 <div>
						<span>Creado Por:<label>*</label></span>
						<input name="creado" type="text" id="creado" value ="<?php echo $creado_por;?>"> 
					 </div>
					 <div class="clearfix"> </div>
					 </div>
				
				<div class="clearfix"> </div>
				<div class="register-but">	
						   
					   <input type="submit" id="button" class='acount-btn' style='outline: none;' border='0' value="Realizar Cambios">
					   
					   				   
				   </form>
				</div>
			
								
		   		
		   </div>
           </div>

		   
    </div>
</div>