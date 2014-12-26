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
								<div class="col-md-12">
									<span class="title">OUR CATEGORIES</span>
								</div>
								<div class="col-md-12">
									<?php
										if(!empty($specific_categories)){
				                    		foreach($specific_categories as $p):?>
												<div class="col-md-3">
													<?echo $p->spec_cat_name.br();?>
												</div>
				           					<?endforeach;
				                    	}else{?>
												<div class="col-md-3">
													No Categories Yet
												</div>
				           					<?
				                    	}
									?>
									<!-- <div class="col-md-3">
										Bags<br>
										Shoes<br>
										Jeans<br>
										Shirts<br>
										Underwear<br>
									</div>
									<div class="col-md-3">
										Cars<br>
										House & Lot<br>
										Condo Unit<br>
										Appliances<br>
										Furniture<br>
									</div>
									<div class="col-md-3">
										Gardening<br>
										Pets<br>
										Outdoor<br>
										Indoor<br>
										Aesthetics<br>
									</div>
									<div class="col-md-3">
										Sports<br>
										Hobbies<br>
										Extreme<br>
										School<br>
										Office<br>
									</div> -->
								</div>

							</div>
							<div class="col-md-4">
							<?php echo br(2)?>
								<span class="title">MEET US ON</span><br>
								<img src="<?php echo base_url('assets/icons/facebook.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Spotify.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/twitter.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Tumblr.png')?>" alt="">
							</div>
							
							<div class="col-md-8">
								<div class="col-md-12">
								<?php echo br(2)?>
									<span class="title">LATEST PRODUCTS</span>
								</div>
								<div class="col-md-12">
									<?php
										if(!empty($latest_products)){
				                    		foreach($latest_products as $p):?>
												<div class="col-md-3">
													<?echo $p->prod_name.br();?>
												</div>
				           					<?endforeach;
				                    	}else{?>
												<div class="col-md-3">
													No Products Yet
												</div>
				           					<?
				                    	}
									?>
									<!-- <div class="col-md-3">
										Bags<br>
										Shoes<br>
										Jeans<br>
										Shirts<br>
										Underwear<br>
									</div>
									<div class="col-md-3">
										Cars<br>
										House & Lot<br>
										Condo Unit<br>
										Appliances<br>
										Furniture<br>
									</div>
									<div class="col-md-3">
										Gardening<br>
										Pets<br>
										Outdoor<br>
										Indoor<br>
										Aesthetics<br>
									</div>
									<div class="col-md-3">
										Sports<br>
										Hobbies<br>
										Extreme<br>
										School<br>
										Office<br>
									</div> -->
								</div>

							</div>

							<div class="col-md-4">
								<?php echo br(2)?>
								<span class="title">PAYMENT OPTIONS</span><br>
								<img src="<?php echo base_url('assets/icons/facebook.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Spotify.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/twitter.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Tumblr.png')?>" alt="">
								<?php echo br(3)?>
								<span class="title">DELIVERY BY</span><br>
								<img src="<?php echo base_url('assets/icons/facebook.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Spotify.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/twitter.png')?>" alt="">
								<img src="<?php echo base_url('assets/icons/Tumblr.png')?>" alt="">
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