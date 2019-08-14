<div class="site-blocks-cover overlay inner-page" style="background-image: url(<?php echo $banner['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="sub-text">Know Us</span>
            <h1>About Us</h1>
          </div>
        </div>
      </div>
    </div>  
    <!-- <div class="site-section about-section">
      <div class="container">
        <div class="row align-items-center mb-5 pb-5">
          <div class="col-lg-7 img-years mb-5 mb-lg-0">
            <img src="images/about_1.png" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto">
            <span class="sub-title">Architectural Design</span>
            <h3 class="mb-4">Architectural Design Co.</h3>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate fuga ipsum commodi aliquid aspernatur reiciendis enim cum voluptas id itaque, asperiores modi, voluptatibus sed voluptate nulla et ratione aliquam! Quaerat.</p>
            <p><a href="#" class="btn btn-primary btn-lg rounded-0">Read More About Us</a></p>
          </div>
        </div>

        
      </div>
    </div>
    
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <span class="sub-title">Meet Our Team</span>
            <h2 class="font-weight-bold text-black mb-5">Our Team</h2>
          </div>
        </div>
        <div class="row">

          <div class="col-lg-3 col-md-6 mb-4">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_1.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2>Cloe Marena</h2>
              <span class="sub-title">Architect</span>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-4">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_2.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2>Nathalie Channie</h2>
              <span class="sub-title">Designer</span>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2>Will Turner</h2>
              <span class="sub-title">Designer</span>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-4">
            <div class="person">
              <div class="bio-img">
                <figure>
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid">
                </figure>
                <div class="social">
                  <a href="#"><span class="icon-facebook"></span></a>
                  <a href="#"><span class="icon-twitter"></span></a>
                  <a href="#"><span class="icon-instagram"></span></a>
                </div>
              </div>
              <h2>Nicolas Stainer</h2>
              <span class="sub-title">Engineer</span>
            </div>
          </div>

        </div>
      </div>
    </div> -->


    <div class="site-half" style="margin-top: 20px;">
      <div class="img-bg-1" style="background-image: url('<?php echo $profile[0]['featured_image']['url'];?>');"></div>
      <div class="container">
        <div class="row no-gutters align-items-stretch">
          <div class="col-md-12 col-lg-7 ml-lg-auto py-5">
            <span class="sub-title">Architectural Design</span>
            <h2 class="font-weight-bold text-black font-secondary mb-4"><?php echo $profile[0]['title']['rendered'];?></h2>
            <?php echo $profile[0]['content']['rendered'];?>
          </div>
        </div>
      </div>
    </div>