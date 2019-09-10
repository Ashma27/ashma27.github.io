<?php

/**
 * Description of Cart
 *
 * @author Mohit Kant Gupta
 */
class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('google');
        $this->load->model(['abkasa_model', 'admin_model']);
        $this->load->library('facebook');
    }

    public function getClientDetail() {
        $client = $this->abkasa_model->getClientDetail($this->session->userdata('user_email'));
        return $client;
    }

    public function get_cart_count() {
        $this->output->set_content_type('application/json');
        $cart_count = $this->load->view('abkasa/include/cart-count', '', true);
        $this->output->set_output(json_encode(['cart_count' => $cart_count]));
        return FALSE;
    }

    public function get_cart_list() {
        $this->output->set_content_type('application/json');
        $data['client'] = $this->getClientDetail();
        $cart_list = $this->load->view('abkasa/include/cart-list', $data, true);
        $this->output->set_output(json_encode(['cart_list' => $cart_list]));
        return FALSE;
    }

    public function getCartData() {
        $list = $this->cart->contents();
        $carts = $this->abkasa_model->getCartDetail($this->getClientDetail());
        if (!empty($carts)) {
            foreach ($carts as $cart) {
                $data = array(
                    'id' => $cart['id'],
                    'qty' => $cart['qty'],
                    'price' => $cart['price'],
                    'name' => $cart['name'],
                    'size' => $cart['size'],
                    'image'=>$cart['image']
                );
                $this->cart->insert($data);
            }
        }
        if (count($list) != 0) {
            $this->insertCartData();
        }
        redirect(base_url('abkasa'));
    }

    public function insertCartData() {
        $this->abkasa_model->emptyCart($this->getClientDetail());
        foreach ($this->cart->contents() as $cart) {
            $data = array(
                'id' => $cart['id'],
                'qty' => $cart['qty'],
                'price' => $cart['price'],
                'name' => $cart['name'],
                'size' => $cart['size'],
                'image'=>$cart['image']
            );
            $this->abkasa_model->addToCart($data, $this->getClientDetail());
        }
        return 1;
    }

    public function checkout() {
        if(empty($this->session->userdata('user_email'))){
            redirect(base_url('abkasa'));
        }
        if(empty($this->cart->contents())){
            redirect(base_url('abkasa'));
        }
        $data['google_url'] = $this->google->get_login_url();
        $data['fb_url'] = $this->facebook->login_url();
        $data['sub_categories'] = $this->admin_model->getAllSubCategory();
        $data['products'] = $this->admin_model->getAllProduct();
        $data['title'] = Title . '| Check out';
        $data['client'] = $this->getClientDetail();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/checkout', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function getDiscount() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('code', 'Code', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $client=$this->getClientDetail();
        
        $result = $this->abkasa_model->checkReferralCode($client);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'referral_code' => $result]));
            return FALSE;
        } else {
            $res = $this->abkasa_model->checkCouponCode();
            if ($res) {
                $count = $this->abkasa_model->getCouponCount($res['coupon_id'], $this->getClientDetail());
                if ($res['coupon_count'] > $count) {
                    $this->output->set_output(json_encode(['result' => 2, 'discount' => $res['discount'], 'discount_type' => $res['discount_type'], 'coupon_id' => $res['coupon_id']]));
                    return FALSE;
                } else {
                    $this->output->set_output(json_encode(['result' => -1, 'msg' => 'This coupon is used before']));
                    return FALSE;
                }
            }
        }
        $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Sorry Your code is either invalid or expired']));
        return FALSE;
    }

    public function addReferralPoints() {
        $referral_code = $this->input->post('referral_code');
        if (!empty($referral_code)) {
            $this->abkasa_model->addReferralCode($referral_code,$this->getClientDetail());
        }
        return 1;
    }

    public function addOrderedProduct($order_id) {
        $product_id = $this->input->post('product_id[]');
        $size = count($product_id);
        $size_type = $this->input->post('size_type[]');
        $qty = $this->input->post('qty[]');
        $price = $this->input->post('price[]');
        for ($i = 0; $i < $size; $i++) {
            $data = array(
                'order_id' => $order_id,
                'product_id' => $product_id[$i],
                'size_type' => $size_type[$i],
                'quantity' => $qty[$i],
                'price' => $price[$i]
            );
            $this->abkasa_model->addOrderedProduct($data);
            $quan = $this->abkasa_model->getStockValueByProductId($product_id[$i], $size_type[$i]);
            $quantity = $quan[$size_type[$i]] - $qty[$i];
            $this->abkasa_model->updateStockValue($product_id[$i], $size_type[$i], $quantity);
            $this->abkasa_model->emptyCart($this->getClientDetail());
        }
        return 1;
    }

    
    public function sendOrderSms($order_id){
        $price =$this->input->post('total');
        $sms= $this->abkasa_model->getOrderSms();
        $product_id = $this->input->post('product_id[]');
        $product_title=$this->abkasa_model->getProductName($product_id[0]);
        $order_id=$order_id;
        $product=$product_title['title'];
        $message=stripslashes($sms['message']);
        eval("\$message= \"$message\";");
        $user= $this->getClientDetail();
        $mobile= $user['mobile'];
        $url = "http://api.msg91.com/api/sendhttp.php?country=91&sender=ABKASA&route=4&mobiles=".$mobile."&authkey=257849Akn6hoGDG5c47130f&message=" . $message;
        file_get_contents($url);
        return 1;
    }
    
    public function add_order() {
        
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $payment = $this->input->post('payment_mode');

        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        if (empty($this->input->post('terms'))) {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Please select terms and condition']));
            return FALSE;
        }
        if ($payment == 'COD') {
            $Razorpay_payment_id = 'NULL';
            $this->abkasa_model->updateAddress($this->session->userdata('user_email'));
            $this->addReferralPoints();
            $order_id = $this->abkasa_model->addOrder($this->getClientDetail(), $Razorpay_payment_id);
            $this->addOrderedProduct($order_id);
            $coupon_id = $this->input->post('coupon_id');
            if (!empty($coupon_id)) {
                $this->abkasa_model->addOrderCouponMapping($order_id, $coupon_id, $this->getClientDetail());
            }
         //   $result=$this->sendOrderSms($order_id);
            $this->session->set_userdata('order_id',$order_id);
            $this->cart->destroy();
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('cart/sucess')]));
            return FALSE;
            
        }
        else if ($payment == 'Points'){
            $Razorpay_payment_id = 'NULL';

            $points = $this->abkasa_model->getPointsById($this->session->userdata('user_email'));
                        
            if($points['points'] >= $this->input->POST('total'))
            {
                $remainingPoints = $points['points'] - $this->input->POST('total');
                if (!empty($remainingPoints)) {
                  $this->abkasa_model->updatesPointsById($this->session->userdata('user_email'), $remainingPoints);
                }
                $this->abkasa_model->updateAddress($this->session->userdata('user_email'));
                $this->addReferralPoints();
                $order_id = $this->abkasa_model->addOrder($this->getClientDetail(), $Razorpay_payment_id);
                $this->addOrderedProduct($order_id);
                $coupon_id = $this->input->post('coupon_id');
                if (!empty($coupon_id)) {
                    $this->abkasa_model->addOrderCouponMapping($order_id, $coupon_id, $this->getClientDetail());
                }
                $this->session->set_userdata('order_id',$order_id);
                $this->cart->destroy();
                $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('cart/sucess')]));
                return FALSE;
            }
            else
                {
                   $this->output->set_output(json_encode(['result' => -2, 'msg' => 'Sorry!! you dont have enough points']));
            return FALSE;
                }
        }
        else if($payment == 'Online'){

            $data['name'] = $this->input->POST('name');
            $data['email'] = $this->input->POST('email');
            $data['company_name'] = $this->input->POST('company_name');
            $data['country'] = $this->input->POST('country');
            $data['address'] = $this->input->POST('address');
            $data['city'] = $this->input->POST('city');
            $data['state'] = $this->input->POST('state');
            $data['pincode'] = $this->input->POST('pincode');
            $data['mobile'] = $this->input->POST('mobile');
            $data['sub_total'] = $this->input->POST('sub_total');
            $data['total'] = $this->input->POST('total');
            $data['payment_mode'] = $this->input->POST('payment_mode');
            $data['product_id'] = $this->input->post('product_id[]');
            $data['size'] = count($data['product_id']);
            $data['size_type'] = $this->input->post('size_type[]');
            $data['qty'] = $this->input->post('qty[]');
            $data['price'] = $this->input->post('price[]');
            $data['referral_code']=$this->input->post('referral_code');
            $data['coupon_id']=$this->input->post('coupon_id');
            $data['discount_val']=$this->input->post('discount_val');
            $this->session->set_userdata('data', $data);
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('cart/payment')]));
            return FALSE;
        }
    }

//Shubham Code start
    public function payment() {
        
        $data = $this->session->userdata('data');
        $this->load->view('abkasa/payment', $data);
    }

    public function onlinepayment() {
        $this->output->set_content_type('application/json');
        $Razorpay_payment_id = $this->input->post('razorpay_payment_id');
        $this->abkasa_model->updateAddress($this->session->userdata('user_email'));
        $this->addReferralPoints();
        $order_id = $this->abkasa_model->addOrder($this->getClientDetail(), $Razorpay_payment_id);
        //$result=$this->sendOrderSms($order_id);
        $this->session->set_userdata('order_id',$order_id);
        $this->addOrderedProduct($order_id);
        $coupon_id = $this->input->post('coupon_id');
        if (!empty($coupon_id)) {
            $this->abkasa_model->addOrderCouponMapping($order_id, $coupon_id, $this->getClientDetail());
        }
        $this->session->unset_userdata('data');
        $this->cart->destroy();
        redirect(base_url('cart/sucess'));
    }

    //shubham code end
    public function sucess() {
        if (empty($this->session->userdata('user_email'))) {
            redirect(base_url('abkasa'));
        }
        $data['title'] = Title . '| Success';
        $data['client'] = $this->getClientDetail();
        $data['google_login_url'] = $this->google->get_login_url();
        $data['sub_categories'] = $this->admin_model->getAllSubCategory();
        $data['order_id']=$order_id= $this->session->userdata('order_id');
        $this->sendMail($order_id);
        $this->session->unset_userdata('order_id');
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/sucess', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }
    
    public function sendMail($order_id) {
        $client=$this->getClientDetail();
        $invoice = base_url('admin/order/invoice/' . $order_id);
        $this->load->library('email');
        $this->email->set_mailtype("html");
        $this->email->from('info@abkasa.com');
        $this->email->to($client['email']);
        $this->email->subject('Invoice');

        //Email content
        $htmlContent = '<p>Download your invoice here</p>'. $invoice;

        $this->email->message($htmlContent);
        //Send email
        $res = $this->email->send();
        if ($res) {
            return 1;
        } else {
            return 1;
        }
    }

    public function addXXLEmail($product_id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => 'Please Enter the email']));
            return FALSE;
        }
        $result = $this->abkasa_model->addXXLEmail($product_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Thanks for let us know. We will contact you soon']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }

    //put your code here Shubham

    public function addToCart() {
        
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('viewsize', 'Size View', 'required');
        $viewsize = $this->input->post('viewsize');
        $this->form_validation->set_rules('size', 'Size', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => 'Please Select the size']));
            return FALSE;
        }
        $size;
        if ($viewsize == 'small' || $viewsize == 'xl') {
            $size = 'slim';
        } else {
            $size = $this->input->post('size');
        }
        $product= $this->abkasa_model->getProductImage($this->input->post('product_id'));
        $data = array(
            'id' => $this->input->post('viewsize') . '_' .$size . '_' . $this->input->post('product_id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
            'size' => $this->input->post('viewsize') . '_' . $size,
            'image' => $product['main_image']
        );
        $this->cart->insert($data);
        if (!empty($this->session->userdata('user_email'))) {
            $this->abkasa_model->addToCart($data, $this->getClientDetail());
        }
        $this->output->set_output(json_encode(['result' => 1]));
        return FALSE;
    }

    public function displayCart() {
        $data['fburl'] = $this->facebook->login_url();
        $data['client'] = $this->getClientDetail();
        $data['google_login_url'] = $this->google->get_login_url();
        $this->load->view('abkasa/displayCart', $data);
    }

    public function updateCart() {
        $this->output->set_content_type('application/json');
        $qty = $this->input->post('qty');
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty' => $qty
        );
        $this->cart->update($data);
        if (!empty($this->session->userdata('user_email'))) {
            $this->abkasa_model->updateCart();
        }
        $this->output->set_output(json_encode(['result' => 1]));
        return FALSE;
    }

    public function deleteCart($row_id) {
        $this->output->set_content_type('application/json');
        $this->cart->update(['rowid' => $row_id, 'qty' => 0]);
        if (!empty($this->session->userdata('user_email'))) {
            $this->abkasa_model->deleteCart();
        }
        $this->output->set_output(json_encode(['result' => 1]));
        return FALSE;
    }

    public function addToWishList() {
        $data = array(
            'product_id' => $this->input->post('product_id'),
        );
        if (!empty($this->session->userdata('user_email'))) {
            $this->abkasa_model->addToWishList($data, $this->getClientDetail());
        }
        redirect('cart/displayWishList');
    }

    public function displayWishList() {
        $data['fburl'] = $this->facebook->login_url();
        $data['client'] = $this->getClientDetail();
        $data['google_login_url'] = $this->google->get_login_url();
        $data['wishlist'] = $this->abkasa_model->showWishList($this->getClientDetail());
        $this->load->view('abkasa/displayWishlist', $data);
    }

}
