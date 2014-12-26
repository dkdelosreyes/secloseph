<div class="row">
				<div class="navbar navbar-fixed-top navbar-inverse anotherNav" role="navigation">
					<div class="container">
						<div class="row">
							<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo site_url()?>">
								<img src="<?php echo base_url('assets/img/secretcloset2.png')?>" style="width:250px">
								<?php //echo img(base_url('assets/img/secretcloset.png'))?>
							</a>

						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo site_url('category/newarrivals')?>">NEW ARRIVALS</a></li>
								<li><a href="<?php echo site_url('category/women')?>">WOMEN</a></li>
								<li><a href="<?php echo site_url('category/men')?>">MEN</a></li>
							</ul>
							<form class="navbar-form navbar-left" role="search">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search">
								</div>
								<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search"></span></button>
							</form>

							<ul class="nav navbar-nav navbar-right">
								<li><a class="bag"><span class="cart-items"><?php echo $this->cart->total_items()?></span></a></li>
								<li><a href="<?php echo site_url('cart')?>">
									
								
									<?php echo nbs(10) ?>MY CART 
								</a></li>
							</ul>
						</div><!--/.nav-collapse -->
						</div>
			
					</div>

				</div>

</div>

