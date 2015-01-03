<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $page_title ?></title>

	<?php require 'includes/view_css.php'; ?>
</head>
<body>
	
	
		<div class="container-fluid">

			<div class="row">
				<div class="bannerWrapper">
					<div class="bannerInner">
							<div class="col-md-12">
								<img src="<?php echo base_url('assets/img/banner.png')?>" alt="" class="img-responsive">
							</div>
					</div>
				</div>
			</div>
		
			<?php require 'includes/view_navbar.php'; ?>

			<?php require 'includes/view_secondary_navbar.php'; ?>


			<div class="row">
				<div class="container">
					<h1 style="font-weight:lighter;">Brands</h1>
					<hr style="border: 1px solid #EBEBEB;">
				</div>
			</div>
			
			<div class="row">
				<div class="brandsWrapper">
					<div class="brandsInner">
						<div class="container">

							<div class="row">

								<?php 
								$counter = 0; $col = ''; $three = true;
									foreach ($brands as $b):
										if ($three) { 
											$col = 'col-md-4';
											$counter++;
											if ($counter > 3) {
												$three = false;
												$counter = 0;
											}
										}
										if (!$three) {
											$col = 'col-md-3';
											$counter++;
											if ($counter > 3) {
												$three = true;
												$counter = 0;
											}
										}
								?>
									<div class="<?php echo $col?> brands">
										<img src="<?php echo base_url('assets/img').'/'.$b->brand_photo_url?>" alt="" class="img-responsive">
										<div class="content">
											<img src="<?php echo base_url('assets/img').'/'.$b->brand_url.'.png'?>" alt="" class="logo img-responsive">
											<p>
												<?php echo $b->brand_description; ?>
											</p>
											<a href="<?php echo site_url('brands').'/'.$b->brand_url?>" class="info">SHOP NOW</a>
										</div>
				
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="container">
					<hr style="border: 1px solid #EBEBEB;">
				</div>
			</div>

			<div class="row">
				<div class="writeupWrapper">
					<div class="writeupInner">

						<div class="container">
						
							<?php
								if(!empty($articles)){
		                    		foreach($articles as $p): ?>

		                    			<div class="col-md-6">
											<span class="title">
												<?php echo $p->article_title; ?>
											</span>
											<?php echo br(2) ?>
											<span class="article">
												<?php echo $p->article_content; ?>
											</span>

										</div>

		           					<?php endforeach;
		                    	}
							?>

						</div>
							
					</div>
				</div>
			</div>


			<div class="row">
				<div class="somedivWrapper">
					<div class="somedivInner">
						<div class="container">
							<div class="col-md-6 feature-text">
								<?php echo br(3) ?>
								<!-- <span class="title" style="color: #4F97E8;">SOME INTERESTING FEATURE</span><br>
								<span class="title">THAT WILL SURELY</span><br>
								<span class="title" style="color: #4F97E8;">BLOW YOUR MIND</span><br><br> -->
								<?php
									$title = '';
									$content = '';
									$photo_url = '';
									if(!empty($featurette)){
			                    		foreach($featurette as $p):
											$title = $p->fea_title;
											$content = $p->fea_content;
											$photo_url = $p->fea_photo_url;
			           					endforeach;
			                    	}
								?>

								<span class="title"> <?php echo $title?> </span>

								<span class="text"> <?php echo $content?> </span>
								<?php echo br(3) ?>
								<!-- <button class="btn btn-primary btn-lg">Some Button Here!</button> -->
							</div>
							
							<div class="col-md-6 feature-bg">
								<img src="<?php echo base_url('assets/featurette/'.$photo_url)?>" class="img-responsive" alt="">
							</div>
							

							</div>
					</div>
				</div>
			</div>
			
			<!-- END OF BRANDS BLOCK =======================================================================================-->
			
			<!-- Footer-->
			<div class="row">
				<div class="footerWrapper">
					<div class="footerInner">
						<div class="container">
							<?php include 'includes/view_footer.php'; ?>
						</div>
					</div>
				</div>
			</div>


			<!-- SCRIPTS SECTION ======================================================================================================= -->

				<!-- scripts-->
				<?php include 'includes/view_scripts.php'; ?>


				<!-- Modal login-->
				<?php include 'includes/view_login.php'; ?>

				<script>
					$(document).ready(function(){

						$('.anotherNav').css('background', 'rgba(0,0,0,0.7)');

						var lastScroll = 0;

						$(window).scroll(function(){

							var top = $(this).scrollTop();

							if (top >  470) {
								$('.anotherNav').css({
									'background' : '#474843',
									'transition' : '0.5s'
								});
								$('.redNav').removeClass('navbar-static-top');
								$('.redNav').addClass('navbar-fixed-top');
								$('.redNav').css('margin-top', '91px');
								$('.redNav').fadeOut('fast');
							}
							else {
								$('.anotherNav').css({
									'background' : 'rgba(0,0,0,0.7)',
									'transition' : '0.5s'
								});
								$('.redNav').removeClass('navbar-fixed-top');
								$('.redNav').addClass('navbar-static-top');
								$('.redNav').css('margin-top', '0');
								$('.redNav').stop().css('display', 'block');
							}

							

							if ($('.redNav').hasClass('navbar-fixed-top') && top < lastScroll) {
								$('.redNav').stop().css('display', 'block');
							}

							lastScroll = top;
						});
					});
					</script>
	
</body>
</html>