			<div class="row">

				<div class="navbar navbar-default redNav" role="navigation">
					<div class="container">
						<div class="row">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
								<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								
							</div>
						</div>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo site_url()?>">Home</a></li>
								<li><a href="<?php echo site_url('home/about')?>">About</a></li>
								<li><a href="<?php echo site_url('home/contact')?>">Contact Us</a></li>
							</ul>
							
							<ul class="nav navbar-nav navbar-right">
								<!-- <li><a href="#">Wishlist</a></li> -->
								<li><a href="<? echo base_url('products/confirm_payment')?>">Confirm Payment</a></li>
								<? if(!$this->session->userdata('kueenie_cust_id')){ ?>
										<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
										<li><a href="<? echo base_url('home/register')?>">Register</a></li>

								<?	}else{ ?>
										<li class="dropdown">
								          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
								          <ul class="dropdown-menu">
								            <li><a href="<? echo site_url('home/profile')?>">My Account</a></li>
								            <li class="divider"></li>
								            <li><a href="<? echo site_url('home/logout')?>" id="btnLogout">Logout</a></li>
								          </ul>
								        </li>

								<? 	} ?>
								
								 	
							</ul>
						</div>
						<!--/.nav-collapse-->


				    </div>
				</div>
				
			</div> 