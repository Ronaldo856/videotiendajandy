<?php $peliculas = new \models\peliculas;?>
<div class="content">
    <div class="box_1">
      	 <h1 class="m_2">Nuestras Peliculas</h1>
		<div class="clearfix"> </div>
	</div>
    <div class="box_2">    
    <div class="col-md-5 grid_3">
        <div class="row">            
            <?php foreach($peliculas->listMovies() as $key => $value): ?>			    
            <div class="col-md-6 grid_7">
                <div class="col_2">
                    <ul class="list_4">		
                        <li>Estado : &nbsp;&nbsp;<div><i class="fa fa-check-circle"></i> Disponible</div></li>
                        <li>Estreno : &nbsp;<span class="m_4"><?php echo $value['fecha_estreno']; ?></span> </li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="m_5"><a href="#"><img src="<?php echo BASE_URL; ?>assets/images/pic3.jpg" class="img-responsive" alt=""/></a></div>
                </div>
                <div>&nbsp;</div>      
            </div>            
            <?php endforeach; ?>                 
            <div class="clearfix"> </div>
            </div>			   
        </div>
    </div>
    <div class="clearfix"> </div>
    
</div>
