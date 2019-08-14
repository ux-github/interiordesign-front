<div class="site-blocks-cover overlay inner-page" style="background-image: url(<?php echo $banner['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-10">
          <span class="sub-text">Our Awesome</span>
          <h1>Project</h1>
        </div>
      </div>
    </div>
  </div>  

  <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <?php
              if (count($post->acf->image_gallery) > 0) {
                foreach ($post->acf->image_gallery as $kImage=>$vImages) {
            ?>
            <div class="img-border">
              <img src="<?php echo $vImages->image_gallery;?>" alt="Image" class="img-fluid">
            </div>
            <?php } } ?>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="font-weight-bold text-black mb-5"><?php echo $post->title->rendered;?></h2>
            <div class="accordion" id="accordionExample">
              
              <h2 class="mb-0 border rounded mb-2">
                <button class="btn " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Detail Project
                </button>
              </h2>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                <?php echo $post->content->rendered;?>
                </div>
              </div>
            
              <h2 class="mb-0 border rounded mb-2">
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Project Date
                </button>
              </h2>
             
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <p><?php echo $post->acf->project_date;?></p>
                </div>
              </div>
           
              <h2 class="mb-0 border rounded mb-2">
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Category
                </button>
              </h2>
              
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <p><?php echo $post->acf->project_category;?></p>
                </div>
              </div>            
            </div>

          </div>
        </div>
      </div>
    </div>