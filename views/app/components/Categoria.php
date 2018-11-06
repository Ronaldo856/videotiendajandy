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
		  	  <form action="<?php echo BASE_URL?>?view=creacategoria" method="post">
				 <div class="register-top-grid">
					<h3>Creación de Categorias</h3>
					 <div>
					 	<span>Nombre de la Categoria<label>*</label></span>
						<input name="nombrecategoria" type="text" id="nombrecategoria">
					</div>
					<div>
						<span>Fecha de Creación<label>*</label></span>
						<input name="fechacreacion" type="text" id="fechacreacion"> 
					 </div>
					 <div>
						<span>Creado Por:<label>*</label></span>
						<input name="creado" type="text" id="creado"> 
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label>
					   </a>
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
					   		<div class="alert alert-success pull-right">Categoria Registrada Exitosamente</div>
						<?php endif;?>
						<div class="clearfix"> </div>
					   
				   </form>
				</div>
				<!--- Lista de categorias -->
				<div>
		   			<br><div id='title_videos' style='background: #b10000; width:137px; color: white; padding: 8px; border-top-left-radius: 16px; border-top-right-radius: 16px;'>[ Lista de Categorías ]</div>
					   <table style = 'width:100%;' >
					   		<thead style='background: #b10000;  color: white;   padding: 8px;'>
								<tr>
									<th style='width: 78%;  padding: 8px;'>Categorias</th><th style=' padding: 8px;'>Fecha de Creacion</th><th style=' padding: 8px;'>Operaciones</th>
								</tr>   
							</thead>
							<tbody>
								<?php
									 \models\categorias::consultarCategorias();
									 
								?>
															
								
							</tbody>
					   </table>
		   		</div>
		   </div>
           </div>

		   
    </div>
</div>