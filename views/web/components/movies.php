<?php $peliculas = new \models\peliculas;?>
<div class="content">
    <div class="box_1">
      	 <h1 class="m_2">Nuestras Peliculas</h1>
		<div class="clearfix"> </div>
	</div>
    <div class="row">    
    <div class="col-md-12 grid_3">
        <div class="row">            
            <?php foreach($peliculas->listMovies() as $key => $value): ?>			    
            <div class="col-md-3 grid_5">
                <div class="col_2">
                    <ul class="list_4">		
                        <li>Pelicula : &nbsp;&nbsp;<div><?php echo $value['nombre_pelicula']; ?></li>
                        <li>Estado : &nbsp;&nbsp;<div><?php echo $peliculas->isAvaliable($value['estado_alquiler']); ?></li>
                        <li>Reserva : &nbsp;&nbsp;<div><?php echo $peliculas->isAvaliable($value['estado_reserva']); ?></li>
                        <li>Estreno : &nbsp;<span class="m_4"><?php echo $value['fecha_estreno']; ?></span> </li>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="m_5">
                        <a href="<?php echo BASE_URL; ?>?movie=<?php echo $value['id_peliculas']; ?>"><img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $value['imagen']; ?>" class="img-responsive" alt="" width="100%"/></a>
                    </div>
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
