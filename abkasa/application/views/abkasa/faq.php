<section class="Faqs boxs privacymgt">
    <div class="container">
        <div class="faqinner boxs">
            <h2>Faqs</h2>
            <?php
            if(!empty($faqs)){
                foreach($faqs as $faq){
            ?>
            <div class="tab boxs" data-id="<?php echo $faq['faq_id']; ?>">
                <h4><?php echo $faq['title']; ?> <i class="fa fa-chevron-down" aria-hidden="true"></i></h4> 
                <div class="tabs" id="tab<?php echo $faq['faq_id']; ?>">
                    <?php echo $faq['description']; ?>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>