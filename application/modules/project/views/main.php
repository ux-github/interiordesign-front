<div class="site-blocks-cover overlay inner-page" style="background-image: url(<?php echo $banner['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="sub-text">Our Awesome</span>
            <h1>Projects</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h2 class="font-weight-bold text-black mb-5">Our Projects</h2>
          </div>
        </div>
        <div class="row mb-5">
          <?php 
            if (count($projects) > 0) {
            foreach($projects as $kProject=>$vProject) {
          ?>
          <div class="col-lg-4 col-md-6 mb-4 project-entry">
            <div class="border-box">
              <a href="<?php echo site_url('project/' . $vProject->slug . '-' . $vProject->id);?>" class="d-block figure figure-index">
                <img src="<?php echo $vProject->featured_image->url;?>" alt="Image" class="img-fluid">
              </a>
              <div class="border-padding">
                <h3 class="mb-0"><a href="<?php echo site_url('project/' . $vProject->slug . '-' . $vProject->id);?>"><?php echo $vProject->title->rendered;?></a></h3>
                <span class="text-muted"><?php echo $vProject->acf->project_category;?></span>
              </div>
            </div>
          </div>
          <?php } } ?>
        </div>
        <?php 
        // var_dump($total_post[0]);die;
          if ($total_post[0] > count($projects)) {
        ?>
        <div class="row mt-5 text-center">
          <div class="col-12">
            <p><a href="<?php echo base_url('news.html/?page='.($page+1).($keyword !== NULL ? '&search='.$keyword : ""));?>" class="btn btn-primary btn-lg rounded-0">More Projects</a></p>
          </div>
        </div>
        <?php } ?>
      </div>
      </div>
    </div>
