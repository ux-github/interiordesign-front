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
        <div class="col-12 text-center">
          <h2 class="font-weight-bold text-black mb-5"><?php echo $post->title->rendered;?></h2>
        </div>
      </div>
      <div class="nonloop-block-13 owl-carousel detail-carousel">
        <?php
          if (count($post->acf->image_gallery) > 0) {
            foreach ($post->acf->image_gallery as $kImage=>$vImages) {
        ?>
        <div class="carousel-images">
          <a href="javascript:void(0)" class="d-block figure figure-index" onclick="setImage(<?php echo $kImage;?>)">
            <img src="<?php echo $vImages->image_gallery;?>" id="image-detail-<?php echo $kImage;?>" alt="Image">
          </a>
        </div>
        <?php } } ?>
      </div>
    </div>
  </div>

  <div class="site-section site-block-3 bg-light">
      <div class="container">
        <div class="row">
            <div class="col-lg-12 ml-auto">
              <h2 class="font-weight-bold text-black mb-5">Detail <?php echo $post->title->rendered;?></h2>
              <div class="accordion" id="accordionExample">
                
                <h2 class="mb-0 border rounded mb-2">
                  <button class="btn text-collapsed" type="button" data-toggle="collapse" data-target="#collapse-description" aria-expanded="true" aria-controls="collapse-description">
                    About The Project
                  </button>
                </h2>

                <div id="collapse-description" class="collapse show" aria-labelledby="heading-description" data-parent="#accordionExample">
                  <div class="card-body">
                    <?php echo $post->content->rendered;?>
                  </div>
                </div>
                <?php
                  unset($post->acf->image_gallery);
                  foreach($post->acf as $kProject=>$vProject) {
                ?>
                <h2 class="mb-0 border rounded mb-2">
                  <button class="btn collapsed text-collapsed" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $kProject;?>" aria-expanded="false" aria-controls="collapse-<?php echo $kProject;?>">
                    <?php echo humanize($kProject);?>
                  </button>
                </h2>
               
                <div id="collapse-<?php echo $kProject;?>" class="collapse" aria-labelledby="heading-<?php echo $kProject;?>" data-parent="#accordionExample">
                  <div class="card-body">
                    <p><?php echo $vProject;?></p>
                  </div>
                </div>
                <?php }  ?>
              </div>
            </div>
        </div>
      </div>
    </div>


    <!-- Modal box -->
    <div class="modal fade" id="projectimg-modal" tabindex="-1" role="dialog" aria-labelledby="image-slide-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </div>
          <div class="modal-body">
            <img id="project-image-modal" alt="Image" class="img-fluid modal-body-image">
          </div>
        </div>
      </div>
    </div>
