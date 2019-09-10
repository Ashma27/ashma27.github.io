<section class="sizingp boxs " >
    <div class="container">
        <div class="sizingbox">
            <div class="col-sm-6">
                <h2>Find My size</h2>
                <div class="selectsizing">
                    <form class="formleft boxs">
                        <div class="boxs sizebox"> <label class="brandlabel">What brand do you usually wear?</label>
                            <select class="brand_wrap form-control" data-url="<?php echo base_url('abkasa/getSizeByBrand') ?>">
                                <?php if(!empty($brands)){
                                    foreach($brands as $brand){
                                ?>
                                <option value="<?php echo $brand['brand_id'] ?>"><?php echo $brand['brand_name'] ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div id="size-wrapper"></div>
                        <div id="fit-wrapper"></div>
                    </form>
                </div>
             
                <div class="visitstudio boxs">
                       <h2>Visit Our Studio</h2>
                    <p>33/21, Site-2, Loni Road, Mohan Nagar, Industrial Area Ghaziabad-201007</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3500.17347004692!2d77.37620430420066!3d28.68445705363114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1549457644422" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-sm-6">
                <h2>Home Consultation</h2>
                <p>Our Made-to-Measure specialists will help you find the right style from a range of over 1,000 fabrics and get you measured for an impeccable fit.</p>
                <div class="selectsizing rightsize">
                    <div class="boxs sizebox">
                        <div class="contact_left boxs">
                            <form method="post" action="<?php echo base_url('abkasa/doAddConsultation'); ?>" id="add-consultation">
                                <div class="form-group boxs">
                                    <label>Name*</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group boxs">
                                    <label>Email*</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group boxs">
                                    <label>Phone*</label>
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Location*</label>
                                    <select name="location" id="location" class="form-control">
                                        <option value="">--Select Location--</option>
                                        <option value="delhi">Delhi</option>
                                        <option value="NCR">NCR</option>
                                    </select>
                                </div>
                                 <div class="form-group boxs">
                                    <label>Message*</label>
                                    <textarea rows="6" name="message" id="message" class="form-control"></textarea>
                                </div>
                                <div class="form-group boxs">
                                    <button type="submit" class="btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>