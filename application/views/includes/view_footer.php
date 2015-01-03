			<div class="row">
				<div class="container">
					<hr style="border: 1px solid #EBEBEB;">
				</div>
			</div>
			
			
			<div class="row">
				<div class="footerWrapper">
					<div class="footerInner">
						<div class="container">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<span class="title">OUR CATEGORIES</span>
									</div>
									<div class="col-md-12">
										<?php
											if(!empty($specific_categories)){
					                    		foreach($specific_categories as $p):?>
													<div class="col-md-3">
														<?php echo $p->spec_cat_name.br();?>
													</div>
					           					<?php endforeach;
					                    	}else{?>
													<div class="col-md-3">
														No Categories Yet
													</div>
					           					<?php
					                    	}
										?>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<?php echo br(2)?>
										<span class="title">LATEST PRODUCTS</span>
									</div>
									<div class="col-md-12">
										<?php
											if(!empty($latest_products)){
					                    		foreach($latest_products as $p):?>
													<div class="col-md-3">
														<?php echo $p->prod_name.br();?>
													</div>
					           					<?php endforeach;
					                    	}else{?>
													<div class="col-md-3">
														No Products Yet
													</div>
					           					<?php
					                    	}
										?>
									</div>
								</div>

							</div>

							<div class="col-md-4">
								<?php echo br(1)?>
								<span class="title">MEET US ON</span><br>
								<img src="<?php echo base_url('assets/icons/facebook.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Spotify.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/twitter.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Tumblr.png')?>" alt="">

								<?php echo br(3)?>
								<span class="title">PAYMENT OPTIONS</span><br>
								<img src="<?php echo base_url('assets/icons/payment.png')?>" alt="">

								<?php echo br(3)?>
								<span class="title">DELIVERY BY</span><br>
								<img src="<?php echo base_url('assets/icons/delivery.png')?>" alt="">
							</div>
							

							<div class="col-md-8 footer-links">
								<?php echo br(3)?>
								<ul>
									<li><a href="<? echo site_url('home/about')?>">About</a></li>
									<li><a href="<? echo site_url('home/contact')?>">Contact</a></li>
									<!-- <li>Help</li>
									<li>Privacy</li> -->
									<li class="last"><a href="<? echo site_url('home/terms_of_sale')?>">Terms of Service</a></li>
								</ul>

							</div>
							
							<div class="col-md-4">
								<?php echo br(3)?>
								© 2014 Kueenie
							</div>
						</div> <!-- container -->


					</div>
				</div>
			</div>

			<div class="row">
				<div class="container">
					<hr style="border: 1px solid #EBEBEB;">
				</div>
			</div>