<div class="container">
    <div class="container_wrap">
    <?php \controllers\views::addView('web/components/headertop'); ?>		
    <div class="content">
      	   <div class="movie_top">
      	         <div class="col-md-9 movie_box">
                        <div class="grid images_3_of_2">
                        	<div class="movie_image">
                                <span class="movie_rating">5.0</span>
                                <img src="<?php echo BASE_URL; ?>assets/uploads/<?php echo $data['imagen']; ?>" class="img-responsive" alt="" width="100%"/>
                            </div>
                            <div class="movie_rate">
                            	<div class="rating_desc"><p>Your Vote :</p></div>
                            	<form action="" class="sky-form">
							     <fieldset>					
								   <section>
								     <div class="rating">
										<input type="radio" name="stars-rating" id="stars-rating-5">
										<label for="stars-rating-5"><i class="icon-star"></i></label>
										<input type="radio" name="stars-rating" id="stars-rating-4">
										<label for="stars-rating-4"><i class="icon-star"></i></label>
										<input type="radio" name="stars-rating" id="stars-rating-3">
										<label for="stars-rating-3"><i class="icon-star"></i></label>
										<input type="radio" name="stars-rating" id="stars-rating-2">
										<label for="stars-rating-2"><i class="icon-star"></i></label>
										<input type="radio" name="stars-rating" id="stars-rating-1">
										<label for="stars-rating-1"><i class="icon-star"></i></label>
									 </div>
								  </section>
							    </fieldset>
						  	   </form>
						  	   <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="desc1 span_3_of_2">
                        	<p class="movie_option"><strong>Pais: </strong><a href="#">Established</a>, <a href="#">USA</a></p>
                        	<p class="movie_option"><strong>Año: </strong><?php echo $data['fecha_estreno']; ?></p>
                        	<p class="movie_option"><strong>Categoria: </strong><a href="#"><?php echo $data['nombre_categoria']; ?></a></p>
                        	<p class="movie_option"><strong>Fecha de Estreno: </strong><?php echo $data['fecha_estreno']; ?></p>
							<p class="movie_option"><strong>Estado: </strong><?php echo $instance->isAvaliable($data['estado_alquiler']); ?></p>
                            <div class="down_btn"><a class="btn1" href="<?php echo BASE_URL; ?>?alquilar=<?php echo \controllers\session::sessionExist(); ?>"><span> </span>Alquilar</a></div>
                         </div>
                        <div class="clearfix"> </div>
                        <p class="m_4"><?php echo $data['sinopsis']; ?></p>
		                <form method="post" action="contact-post.html">
							<div class="to">
		                     	<input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
							 	<input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" style="margin-left:3%">
							</div>
							<div class="text">
			                   <textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message:</textarea>
			                </div>
			                <div class="form-submit1">
					           <input name="submit" type="submit" id="submit" value="Submit Your Message"><br>
					        </div>
							<div class="clearfix"></div>
                 		</form>		                
                      </div>
                      </div>
                      <div class="col-md-3">
                      	<div class="movie_img"><div class="grid_2">
							<img src="<?php echo BASE_URL; ?>assets/images/pic6.jpg" class="img-responsive" alt="">
							<div class="caption1">
									<ul class="list_5 list_7">
							    		<li><i class="icon5"> </i><p>3,548</p></li>
							    	</ul>
							    	<i class="icon4 icon6 icon7"> </i>
							    	<p class="m_3">Guardians of the Galaxy</p>
							</div>
						    </div>
						   </div>
                      	  <div class="grid_2 col_1">
							<img src="<?php echo BASE_URL; ?>assets/images/pic2.jpg" class="img-responsive" alt="">
							<div class="caption1">
								<ul class="list_3 list_7">
						    		<li><i class="icon5"> </i><p>3,548</p></li>
						    	</ul>
						    	<i class="icon4 icon7"> </i>
						    	<p class="m_3">Guardians of the Galaxy</p>
							</div>
						   </div>
						    <div class="grid_2 col_1">
							<img src="<?php echo BASE_URL; ?>assets/images/pic9.jpg" class="img-responsive" alt="">
							<div class="caption1">
								<ul class="list_3 list_7">
						    		<li><i class="icon5"> </i><p>3,548</p></li>
						    	</ul>
						    	<i class="icon4 icon7"> </i>
						    	<p class="m_3">Guardians of the Galaxy</p>
							</div>
						   </div>
		               </div> 
                      <div class="clearfix"> </div>
                  </div>
           </div>
    </div>
</div>