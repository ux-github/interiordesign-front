    <footer class="site-footer border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Navigation</h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Team</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Membership</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-5">
                        <h3 class="footer-heading mb-4">Popular News</h3>
                        <div class="block-25">
                            <ul class="list-unstyled">
                                <?php
                                    if (count($this->popular_posts) > 0) {
                                        foreach ($this->popular_posts as $kPopularPosts=>$vPopularPosts) {
                                ?>
                                <li class="mb-3">
                                    <a href="#" class="d-flex">
                                        <figure class="image mr-4">
                                        <img src="<?php echo $vPopularPosts['featured_image']['url'];?>" alt="" class="img-fluid">
                                        </figure>
                                        <div class="text">
                                        <span class="small text-uppercase date"><?php echo date('M d, Y', strtotime($vPopularPosts['date']));?></span>
                                        <h3 class="heading font-weight-light"><?php echo $vPopularPosts['title']['rendered'];?></h3>
                                        </div>
                                    </a>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="mb-5">
                        <h3 class="footer-heading mb-2">We really want you to want us.</h3>
                        <p>If you received this email by mistake, simple delete it.</p>
                        <form id="subscript-form" action="<?php echo base_url('email-subscript');?>" method="post">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" id="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>
                            <div class="input-group mb-3">
                                <input type="email" required="true" name="email" class="form-control border-white text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit" id="button-email-subscript" data-loading-text="Loading...">Send</button>
                            </div>
                            </div>
                        </form>
                        <div class="alert alert-success" id="alert-inquiry-success" style="display:none;">
                            
                        </div>
                        <div class="alert alert-danger" id="alert-inquiry-failed" style="display:none;">
                            
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">Follow Us</h3>
                        <div>
                            <a href="<?php echo $this->profile['acf']['facebook'];?>" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="<?php echo $this->profile['acf']['twitter'];?>" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="<?php echo $this->profile['acf']['instagram'];?>" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="<?php echo $this->profile['acf']['linkedin'];?>" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                Copyright &copy;2019 All rights reserved 
                </p>
            </div>
        </div>
    </footer>
</div>
<!--/ End Footer -->
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="<?php echo base_url('assets/themes/js/jquery-ui.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/popper.min.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/owl.carousel.min.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/jquery.stellar.min.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/jquery.countdown.min.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/jquery.magnific-popup.min.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/bootstrap-datepicker.min.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/aos.js');?>"></script>
        <script src="<?php echo base_url('assets/themes/js/main.js');?>"></script>
        <?php echo $this->load->view('template/includes/custom_footer_js');?>
        <script>
        $(document).ready(function() {
            $("#subscript-form").submit(function(e){
                var url = $(this).attr('action');
                var data = $('form').serialize();
                var btn = $("#button-email-subscript").button('loading');
                console.log(url);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function(data){
                        $("#"+data.csrfName).val(data.csrfHash);
                        if (data.status === 200) {
                            $("#alert-inquiry-success").text(data.message).show();
                        } else {
                            $("#alert-inquiry-failed").text(data.message).show();
                        }
                        btn.button('reset');
                        $("#email").val('');
                    },
                    error: function(error) {
                        $("#"+error.csrfName).val(error.csrfHash);
                        $("#alert-inquiry-failed").text('Oops sory something wrong, please try again later').show();
                        btn.button('reset');
                        $("#email").val('');
                    }
                });
                setTimeout(function(){$(".alert-inquiry").hide(); }, 5000);
                e.preventDefault();
            });
        });
        </script>
    </body>
</html>
