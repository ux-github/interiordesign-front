<div class="site-blocks-cover overlay inner-page" style="background-image: url(<?php echo $banner['image'];?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-10">
            <span class="sub-text">Get In Touch</span>
            <h1>Contact Us</h1>
          </div>
        </div>
      </div>
    </div>  

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12 col-lg-12">
          
            <h2 class="site-heading text-black mb-5"><?php echo $contact[0]['title']['rendered'];?></h2>
			<div><?php echo $contact[0]['content']['rendered'];?></div>
			<form id="form-inquiry" lass="p-5 bg-white" action="contact_us/submit_inquiry">
			  <input type="hidden" name="<?=$csrf['name'];?>_inquiry" id="<?=$csrf['name'];?>_inquiry" value="<?=$csrf['hash'];?>"/>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" name="name-inquiry" id="name-inquiry" required="true" class="form-control" placeholder="Full Name">
                </div>
			  </div>
			  <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Phone</label>
                  <input name="phone-inquiry" id="phone-inquiry" required="true" type="number" class="form-control" placeholder="Phone">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email"  name="email-inquiry" id="email-inquiry" required="true" class="form-control" placeholder="Email Address">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea name="message-inquiry" id="message-inquiry" required="true" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
				  <button type="submit" id="btn-submit-inquiry" required="true" data-loading-text="Loading..."  class="btn btn-primary rounded-0 btn-lg">Send</button>
                </div>
              </div>
			  <br>
			  <div id="alert-inquiry-success" style="display:none;" class="alert alert-success alert-inquiry" role="alert"></div>
			  <div id="alert-inquiry-failed" style="display:none;" class="alert alert-danger alert-inquiry" role="alert"></div>
  
            </form>
          </div>
        </div>
      </div>
    </div>
