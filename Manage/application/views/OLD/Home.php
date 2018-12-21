<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<style>
	
	.owl-item cloned{
		width:0;
	}
	.one{
		border:1px solid #ddd;
		height:300px;
		margin-top:-160px;
		background:#fafafa;
		border-radius:5px;
	}
	#lang_icon{
		margin-right:0;
	}
	
	label {
		font-weight:5;
	}
	
	.wrap{
		
	}
	
	</style>
</head>
	
<body>
	 <section class="wrap" style="margin-top:160px;" id='classify'>
	 <hr>
        <h1>Welcome to Library</h1>
		<?php
			echo $images[0]['image_name'];
		?>
        <!-- accordion -->
        <div class="accordion">
            <!-- 1 -->
            <div class="accordion__section">
                <div class="accordion__titlebox" data-href="#accordion-1">
                    <div class="accordion__icon">
                        <span class="plus">+</span>
                        <span class="minus">—</span>
                    </div>
                    <div class="accordion__title">Classic Collection</div>
                </div>

                <div id="accordion-1" class="accordion__content">
									
					<div class='main' style='margin-top:-10px;'>
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class='card one'>	
								</div>
							</div>
						</div>
					</div>
					<!--Carsenal for div inside the home-> classic collection-->
                </div>
            </div>
            <!-- / -->
            <!-- 2 -->
            <div class="accordion__section">
                <div class="accordion__titlebox" data-href="#accordion-2">
                    <div class="accordion__icon">
                        <span class="plus">+</span>
                        <span class="minus">—</span>
                    </div>
                    <div class="accordion__title">Premium Collection</div>
                </div>

                <div id="accordion-2" class="accordion__content">
					<div class='main' style='margin-top:-10px;'>
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class='card one'>	
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            <!-- / -->
            <!-- 3 -->
            <div class="accordion__section">
                <div class="accordion__titlebox" data-href="#accordion-3">
                    <div class="accordion__icon">
                        <span class="plus">+</span>
                        <span class="minus">—</span>
                    </div>
                    <div class="accordion__title">Top 10 Collection</div>
                </div>

                <div id="accordion-3" class="accordion__content">
                  <div class='main' style='margin-top:-10px;'>
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class='card one'>	
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            <!-- / -->
            <!-- 4 -->
            <div class="accordion__section">
                <div class="accordion__titlebox" data-href="#accordion-4">
                    <div class="accordion__icon">
                        <span class="plus">+</span>
                        <span class="minus">—</span>
                    </div>
                    <div class="accordion__title">Recently Added</div>
                </div>

                <div id="accordion-4" class="accordion__content">
                   <div class='main' style='margin-top:-10px;'>
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class='card one'>	
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            <!-- / -->
            <!-- 5 -->
            <div class="accordion__section">
                <div class="accordion__titlebox" data-href="#accordion-5">
                    <div class="accordion__icon">
                        <span class="plus">+</span>
                        <span class="minus">—</span>
                    </div>
                    <div class="accordion__title">Most Viewed Collection</div>
                </div>

                <div id="accordion-5" class="accordion__content">
                   <div class='main' style='margin-top:-10px;'>
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class='card one'>	
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            <!-- / -->
            <!-- 6 -->
            <div class="accordion__section">
                <div class="accordion__titlebox" data-href="#accordion-6">
                    <div class="accordion__icon">
                        <span class="plus">+</span>
                        <span class="minus">—</span>
                    </div>
                    <div class="accordion__title">Collection for Kids</div>
                </div>

                <div id="accordion-6" class="accordion__content">
                  <div class='main' style='margin-top:-10px;'>
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class='card one'>	
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
            <!-- / -->
            <!-- 7 -->
        
        </div>
        <!-- / -->

    </section>
	
<!--Login-->

<?php
	$this->load->view('Models/login_model');
	$this->load->view('Models/register_model');
	$this->load->view('Models/help_model');
?>

	
</body>
</html>