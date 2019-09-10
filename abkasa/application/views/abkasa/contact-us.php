<section class="contact boxs privacymgt">
    <div class="container">
        <div class="contactinner boxs">
            <h2>contact us</h2>
            <div class="col-lg-8">
                <div id="error_msg"></div>
                <div class="contact_left boxs">
                    <form action="<?php echo base_url('do-add-contact'); ?>" method="post" id="do-add-contact">
                        <div class="form-group boxs">
                            <label>Name*</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group boxs">
                            <label>Company</label>
                            <input type="text" id="company" name="company" class="form-control">
                        </div>
                        <div class="form-group boxs">
                            <label>Email*</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group boxs">
                            <label>Phone*</label>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="form-group boxs">
                            <button type="submit" class="btn">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="contact_right boxs">
                    <div class="Aboutdoinner boxs">
                        <h6><i class="fa fa-envelope" aria-hidden="true"></i></h6>
                        <p><b>Website :</b><a href="javascript:void(0)" target="_blank"> www.abkasa.com</a></p>
                        <p><b>Email Address :</b> <a href="mailto:info@abkasa.com"> info@abkasa.com</a></p>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="map boxs">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.409480637446!2d77.38927341451001!3d28.617487182423705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceff90fa5fafb%3A0x3ebe611df73b7817!2sDesignoweb+Technologies+PVT.+LTD.!5e0!3m2!1sen!2sin!4v1545478608229" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>-->
    </div>
</section>