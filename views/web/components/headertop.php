<div class="header_top">
    <div class="col-sm-3 logo"><a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>assets/images/logo.jpg" alt=""/></a></div>
    <div class="col-sm-6 nav">
       
    </div>
    <div class="col-sm-3 header_right">
        <ul class="header_right_box">
            <?php if(count($_SESSION) <= 0): ?>
				 	<li><p><a href="<?php echo BASE_URL ?>?view=entrar">Entrar</a></p></li>
				<?php else: ?>
					<li><p><?php echo models\usuarios::getProfile();?></p></li>
					<li><a href="<?php echo BASE_URL?>?view=logout1">Salir</a></li>
				<?php endif;?>
            <li class="last"><i class="edit"> </i></li>            
        </ul>
    </div>
    <div class="clearfix">&nbsp;</div>
</div>