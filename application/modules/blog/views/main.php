<div class="site-blocks-cover overlay inner-page" style="background-image: url(<?php echo $banner['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="sub-text">Our Awesome</span>
            <h1>News</h1>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <span class="sub-title">News &amp; Update</span>
            <h2 class="font-weight-bold text-black mb-5">Our Blog Posts</h2>
          </div>
        </div>
        <div class="row mb-5">
		  <?php 
		    if (count($blog) > 0) {
			  foreach($blog as $kBlog=>$vBlog) {
		  ?>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 post-entry">
            <div class="border-box">
              <a href="<?php echo site_url('news/' . $vBlog->slug . '-' . $vBlog->id);?>" class="d-block figure">
                <img src="<?php echo $vBlog->featured_image->url;?>" alt="Image" class="img-fluid">
              </a>
              <div class="border-padding">
                <span class="text-muted d-block mb-2"><?php echo date('M d, Y', strtotime($vBlog->date));?></span>
                <h3><a href="<?php echo site_url('news/' . $vBlog->slug . '-' . $vBlog->id);?>"><?php echo $vBlog->title->rendered;?> </a></h3>
                <span class="mb-2"><i class="icon-eye"></i> <?php echo ((int)$vBlog->post_views == 0 ? 1 : (int)$vBlog->post_views);?> Views</span>
              </div>
            </div>
		  </div>
		  <?php } } ?>
		</div>
        <?php 
        // var_dump($total_post[0]);die;
          if ($total_post[0] > count($blog)) {
        ?>
        <div class="row mt-5 text-center">
          <div class="col-12">
            <p><a href="<?php echo base_url('news.html/?page='.($page+1).($keyword !== NULL ? '&search='.$keyword : ""));?>" class="btn btn-primary btn-lg rounded-0">More Posts</a></p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>