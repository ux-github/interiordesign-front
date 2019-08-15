<div class="site-blocks-cover overlay inner-page" style="background-image: url(<?php echo $banner['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="sub-text">Our Awesome</span>
            <h1>Services</h1>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section site-block-3 bg-light">
      <div class="container">
	  	<div class="row">
			<div class="col-12 text-center">
				<span class="sub-title"><?php echo $services[0]['title']['rendered'];?></span>
				<p class="font-weight-bold text-black mb-5"><?php echo $services[0]['content']['rendered'];?></p>
			</div>
		</div>
        <div class="row">
          <div class="col-lg-12">
            <div class="row row-items">
			<?php 
				if (count($services[0]['acf']['sevices']) > 0) {
				foreach($services[0]['acf']['sevices'] as $kService=>$vService) {
			?>
              <div class="col-6">
                <a href="#" class="d-flex text-center feature active p-4 mb-4 bg-white">
                  <span class="align-self-center w-100">
                    <span class="d-block mb-3">
                      <i class="fa <?php echo $vService['service_icon'];?> fa-5x"></i>
                    </span>
                    <h3><?php echo $vService['service_title'];?></h3>
				  <p class="text-center"><?php echo $vService['service_description'];?></p>
				  </span>
                </a>
			  </div>
				<?php } } ?>
            </div>
          </div>
        </div>
      </div>
    </div>