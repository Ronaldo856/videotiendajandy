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
				 	<li><p><a href="<?php echo BASE_URL ?>?web/components/headertop">Entrar</a></p></li>
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
			   <div class="col-md-6 login-left">
			  	 <h3>Nuevos clientes</h3>
				 <p>Al crear una cuenta con nuestra tienda, usted será capaz de moverse a través del proceso de pago más rápido, almacenar varias direcciones de envío, ver y hacer un seguimiento de sus pedidos en su cuenta y más.</p>
				 <a class="acount-btn" href="<?php echo BASE_URL; ?>?view=registrar">Registrarme</a>
			   </div>
			   <div class="col-md-6 login-right">
			  	<h3>Clientes registrados</h3>
				<p>Si tiene una cuenta con nosotros, por favor inicie sesión.</p>
				<form action="<?php echo BASE_URL?>?view=initsessionC" method="post">
				  <div>
					<span>Documento de Identidad<label>*</label></span>
					<input type="text" name="userc"> 
				  </div>
				  <div>
					<span>Contraseña<label>*</label></span>
					<input type="password" name="pass"> 
				  </div>
				  <a class="forgot" href="#">¿Olvidó su contraseña?</a>
				  <input type="submit" class='acount-btn' style='outline: none;' border='0' value="Login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		     </div>
           </div>
    </div>
</div>