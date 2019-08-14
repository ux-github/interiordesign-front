<div class="site-blocks-cover overlay inner-page" style="background-image: url(<?php echo $banner['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-10">
          <span class="sub-text">Our Awesome</span>
          <h1>Blogs</h1>
        </div>
      </div>
    </div>
  </div>  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <span class="sub-title">Writen by: <?php echo $author->name;?></span>
          <h2 class="font-weight-bold text-black mb-5"><?php echo $post->title->rendered;?></h2>
        </div>
      </div>
      <!-- Blog detail -->
      <div class="col-lg-12 mb-12 mb-lg-0">
        <!-- <div class="img-border">
          <img src="images/img_3.jpg" alt="Image" class="img-fluid">
        </div> -->
        <div class="card-body">
          <?php echo $post->content->rendered;?>
          <hr>
          <div class="blog-share">
            <span class="mb-2">Share: </span>
              <div id="share"></div>
              <input type="hidden" id="detail-blog-url" value="<?php echo current_url();?>">
            </div>
          </div>
        </div>
      </div>
    </div>