
<form action="<?php echo base_url('cart/onlinepayment'); ?>" method="post">

    <?php
    $amt = $total;
    $money = $amt * 100;
   
foreach ($this->cart->contents() as $cart) {
    $id = explode('_', $cart['id']);
    ?>
   <!--data-key="rzp_test_zvzcxR5yqcgPK7"-->
    
    <input type="hidden" name="name" value="<?php echo $name ?>" />
    <input type="hidden" name="email" value="<?php echo $email ?>" />
    <input type="hidden" name="company_name" value="<?php echo $company_name ?>" />
    <input type="hidden" name="country" value="<?php echo $country ?>" />
    <input type="hidden" name="address" value="<?php echo $address ?>" />
    <input type="hidden" name="city" value="<?php echo $city ?>" />
    <input type="hidden" name="state" value="<?php echo $state ?>" />
    <input type="hidden" name="pincode" value="<?php echo $pincode ?>" />
    <input type="hidden" name="mobile" value="<?php echo $mobile ?>" />
    <input type="hidden" name="payment_mode" value="<?php echo $payment_mode ?>" />
    <input type="hidden" name="total" value="<?php echo $total ?>" />
    <input type="hidden" name="sub_total" value="<?php echo $sub_total ?>" />
    <input type="hidden" name="product_id[]" value="<?php echo end($id); ?>"/>
    <input type="hidden" name="qty[]" value="<?php echo $cart['qty']; ?>"/>
    <input type="hidden" name="size_type[]" value="<?php echo $cart['size']; ?>"/>
    <input type="hidden" name="price[]" value="<?php echo $cart['price']; ?>"/>
    <input type="hidden" name="referral_code" value="<?php echo $referral_code; ?>"/>
    <input type="hidden" name="coupon_id" value="<?php echo $coupon_id; ?>"/>
    <input type="hidden" name="discount_val" value="<?php echo $discount_val; ?>"/>
<?php  }
?>
<script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_live_iZWsTFAXPSlKYe"
        data-amount="<?php echo $money; ?>"
        data-buttontext="Try Again"
        data-name="ABKASA"
        data-description="Purchase Description"
        data-image="<?php echo base_url('public/image/logoicon.png') ?>"
        data-prefill.name=""
        data-prefill.email=""
        data-theme.color="#5B0E0E"
    ></script>
</form>
<a href="<?php echo base_url('cart/checkout');?>">Back</a>
<script src="<?php echo base_url('public/js/jquery.min.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $("form").submit();
    });
</script>
