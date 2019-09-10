<?php

/**
 * Description of abkasa_model
 *
 * @author Mohit Kant Gupta
 */
class abkasa_model extends CI_Model {

    //put your code here 
    //Shubham
    public function client_login($session_data) {
        $data = array(
            'name' => $session_data['name'],
            'email' => $session_data['email'],
            'source' => $session_data['source']
        );
        $this->db->insert('client', $data);
        $this->db->update('client', ['referral_code' => 'ABK_' . $this->db->insert_id()], ['client_id' => $this->db->insert_id()]);
        return $this->db->affected_rows();
    }

    // Mohit
    public function checkClient($email) {
        $query = $this->db->get_where('client', ['email' => $email]);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
        return 0;
    }

    public function getAllProduct() {
        $this->db->limit(3);
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function getClientDetail($email) {
        $query = $this->db->get_where('client', ['email' => $email]);
        return $query->row_array();
    }

    public function updateMobile($email, $otp) {
        $this->db->update('client', ['mobile' => $this->input->post('mobile'), 'otp' => $otp], ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function doVerifyOtp() {
        $query = $this->db->get_where('client', ['mobile' => $this->input->post('verify_mobile'), 'otp' => $this->input->post('otp')]);
        if ($query->num_rows() == 1) {
            $this->db->update('client', ['is_verify' => '1'], ['mobile' => $this->input->post('verify_mobile')]);
            return $this->db->affected_rows();
        }
        return 0;
    }

    public function getOrderByClientEmail($email) {
        $this->db->select('o.order_id,o.total,o.sub_total,o.date,o.payment_mode,o.status,o.order_status');
        $this->db->from('client c');
        $this->db->join('orders o', 'c.client_id=o.client_id');
        $this->db->where('c.email', $email);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getOrderedProducts($order_id) {
        $this->db->select('o.order_id,o.product_id,o.ordered_product_id,p.title,o.size_type,o.quantity,o.price,p.main_image,o.status,o.replacing_size');
        $this->db->from('ordered_product o');
        $this->db->join('product p', 'p.product_id=o.product_id');
        $this->db->where('o.order_id', $order_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getOrderByOrderId($order_id) {
        $query = $this->db->get_where('orders', ['order_id' => $order_id]);
        return $query->row_array();
    }

    public function updateAddress($email) {
        $data = array(
            'name' => $this->security->xss_clean($this->input->post('name')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'company_name' => $this->security->xss_clean($this->input->post('company_name')),
            'address' => $this->security->xss_clean($this->input->post('address')),
            'city' => $this->security->xss_clean($this->input->post('city')),
            'state' => $this->security->xss_clean($this->input->post('state')),
            'pincode' => $this->security->xss_clean($this->input->post('pincode')),
            'mobile' => $this->security->xss_clean($this->input->post('mobile')),
            'country' => $this->security->xss_clean($this->input->post('country'))
        );
        $this->db->update('client', $data, ['email' => $email]);
        return $this->db->affected_rows();
    }

    public function addToCart($data, $client) {
        $data['client_id'] = $client['client_id'];
        $this->db->insert('cart', $data);
        return $this->db->insert_id();
    }

    public function updateCart() {
        $this->db->update('cart', ['qty' => $this->input->post('qty')], ['id' => $this->input->post('id')]);
        return $this->db->affected_rows();
    }

    public function deleteCart() {
        $this->db->delete('cart', ['id' => $this->input->post('id')]);
        return $this->db->affected_rows();
    }

    public function getCartDetail($client) {
        $query = $this->db->get_where('cart', ['client_id' => $client['client_id']]);
        return $query->result_array();
    }

    public function emptyCart($client) {
        $this->db->delete('cart', ['client_id' => $client['client_id']]);
        return $this->db->affected_rows();
    }

    public function addOrder($client) {
        $data = array(
            'client_id' => $client['client_id'],
            'total' => $this->input->post('total'),
            'sub_total' => $this->input->post('sub_total'),
            'date' => date('d-m-Y'),
            'payment_mode' => $this->input->post('payment_mode'),
            'status' => 'Pending'
        );
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }

    public function addOrderedProduct($data) {
        $this->db->insert('ordered_product', $data);
        return $this->db->insert_id();
    }

    public function getStockValueByProductId($product_id, $size_type) {
        $this->db->select($size_type);
        $query = $this->db->get_where('stock', ['product_id' => $product_id]);
        return $query->row_array();
    }

    public function updateStockValue($product_id, $size_type, $quantity) {
        $this->db->update('stock', [$size_type => $quantity], ['product_id' => $product_id]);
        return $this->db->affected_rows();
    }

    public function doCancelOrderedProduct($ordered_product_id) {
        $this->db->update('ordered_product', ['status' => 'Canceled'], ['ordered_product_id' => $ordered_product_id]);
        $query = $this->db->get_where('ordered_product', ['ordered_product_id' => $ordered_product_id]);
        return $query->row_array();
    }

    public function checkReferralCode($client) {
        $val = '';
        $que = $this->db->get_where('client', ['referral_code' => $this->input->post('code'), 'client_id' => $client['client_id']]);
        //echo $this->db->last_query(); die;
        if ($que->num_rows() == 1) {
            return 0;
        } else {
            $q = $this->db->get_where('client', ['referred_by!=' => $val, 'client_id' => $client['client_id']]);
            if ($q->num_rows() == 1) {
                return 0;
            } else {
                $query = $this->db->get_where('client', ['referral_code' => $this->input->post('code')]);
                if ($query->num_rows() == 1) {
                    return $this->input->post('code');
                } else {
                    return 0;
                }
            }
        }
    }

    public function checkCouponCode() {
        $this->db->select('discount,discount_type,coupon_id,coupon_count');
        $query = $this->db->get_where('coupon', ['coupon_code' => $this->input->post('code')]);
        return $query->row_array();
    }

    public function addReferralCode($referral_code,$client) {
         $query = $this->db->get_where('client', ['referral_code' => $referral_code]);
        $row = $query->row_array();
        $discount = $this->input->post('discount_val');
        $this->db->set('points', 'points+' . $discount, false);
        $this->db->update('client', [], ['client_id' => $row['client_id']]);
        $this->db->update('client', ['referred_by' => $referral_code], ['client_id' => $client['client_id']]);
        return $this->db->affected_rows();
    }

    // public function add_referralPoints($referral_code,$client) {
    //     // $this->db->set('points', 'points+100', false);
    //     $this->db->update('client', ['referred_by' => $referral_code], ['client_id' => $client['client_id']]);
    //     return $this->db->affected_rows();
    // }

    public function addOrderCouponMapping($order_id, $coupon_id, $client) {
        $data = array(
            'coupon_id' => $coupon_id,
            'order_id' => $order_id,
            'client_id' => $client['client_id']
        );
        $this->db->insert('order_coupon_mapping', $data);
        return $this->db->insert_id();
    }

    public function getCouponCount($coupon_id, $client) {
        $query = $this->db->get_where('order_coupon_mapping', ['coupon_id' => $coupon_id, 'client_id' => $client['client_id']]);
        return $query->num_rows();
    }

    public function addToWishList($data, $client) {
        $data['client_id'] = $client['client_id'];
        $this->db->insert('wishlist', $data);
        return $this->db->insert_id();
    }

    public function showWishList($client) {
        $query = $this->db->select(' DISTINCT(p.title),p.main_image')
                ->where(['client_id' => $client['client_id']])
                ->from('wishlist w')
                ->join('product p', 'w.product_id = p.product_id')
                ->get();
        return $query->result_array();
    }

    public function cancel_order($order_id) {
        $this->db->update('orders', ['order_status' => 'Cancel'], ['order_id' => $order_id]);
        $this->db->update('ordered_product', ['status' => 'Canceled'], ['order_id' => $order_id]);
        return $this->db->affected_rows();
    }

    public function get_ordered_product_id($order_id) {
        $this->db->select('product_id,quantity,size_type,status');
        $query = $this->db->get_where('ordered_product', ['order_id' => $order_id]);
        return $query->result_array();
    }

    public function doReturnProduct($order_product_id, $order_id) {
        $this->db->update('ordered_product', ['status' => 'Returning'], ['ordered_product_id' => $order_product_id]);
        $this->db->update('orders', ['order_status' => 'Return'], ['order_id' => $order_id]);
        return $this->db->affected_rows();
    }

    public function checkStock($size) {
        $query = $this->db->get_where('ordered_product', ['ordered_product_id' => $this->input->post('order_product_id')]);
        $product = $query->row_array();
        $que = $this->db->get_where('stock', ['product_id' => $product['product_id']]);
        $stock = $que->row_array();
        $quantity = $product['quantity'];
        if ($quantity < $stock[$size]) {
            $old_size_quantity = $stock[$product['size_type']];
            $old_size_quantity+=$quantity;
            $this->db->update('stock',[$product['size_type']=>$old_size_quantity],['product_id'=>$product['product_id']]);
            $new_size_quantity=$stock[$size];
            $new_size_quantity-=$quantity;
            $this->db->update('stock',[$size=>$new_size_quantity],['product_id'=>$product['product_id']]);
            return $this->db->affected_rows();
        } else {
            return 0;
        }
    }

    public function doReplaceProduct() {
        $result = $this->db->get_where('ordered_product', ['size_type' => $this->input->post('size'), 'ordered_product_id' => $this->input->post('order_product_id')]);
        if ($result->num_rows() == 1) {
            return 0;
        }
        $data = array(
            'status' => 'Replacing',
            'replacing_size' => $this->input->post('size')
        );
        $this->db->update('ordered_product', $data, ['ordered_product_id' => $this->input->post('order_product_id')]);
        $this->db->update('orders', ['order_status' => 'Replace'], ['order_id' => $this->input->post('order_id')]);
        return $this->db->affected_rows();
    }

    public function addXXLEmail($product_id) {
        $data = array(
            'email' => $this->security->xss_clean($this->input->post('email')),
            'product_id' => $product_id,
            'size' => 'XXL'
        );
        $this->db->insert('product_request', $data);
        return $this->db->insert_id();
    }

    public function getSubCategoryIdBySubCategoryName($sub_category_name) {
        $query = $this->db->get_where('sub_category', ['sub_category_name' => $sub_category_name]);
        return $query->row_array();
    }

    public function getProductIdByProductName($product_name) {
        $this->db->select('product_id');
        $query = $this->db->get_where('product', ['title' => $product_name]);
        return $query->row_array();
    }

    public function getCategoryIdByCategoryName($category_name) {
        $query = $this->db->get_where('category', ['category_name' => $category_name]);
        return $query->row_array();
    }

    public function do_add_contact() {
        $data = array(
            'name' => $this->security->xss_clean($this->input->post('name')),
            'company' => $this->security->xss_clean($this->input->post('company')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'phone' => $this->security->xss_clean($this->input->post('phone'))
        );
        return $this->db->insert('contact_us', $data);
    }
    
    public function getAllCarousel(){
        $query= $this->db->get('carousel');
        return $query->result_array();
    }
    
    public function getProductImage($product_id){
        $this->db->select('main_image');
        $query= $this->db->get_where('product',['product_id'=>$product_id]);
        return $query->row_array();
    }
    
    public function getAbout(){
        $query= $this->db->get_where('about',['id'=>'1']);
        return $query->row_array();
    }
    
    public function getAllBrands(){
        $query= $this->db->get('brand');
        return $query->result_array();
    }
    
    public function getSizeByBrandId($brand_id){
        $query= $this->db->get_where('size',['brand_id'=>$brand_id]);
        return $query->result_array();        
    }
    
    public function getFitBySizeId($size_id){
        $query= $this->db->get_where('fit',['size_id'=>$size_id]);
        return $query->row_array();
    }

    
    public function addNewsletter(){
        $data = array(
            'email' => $this->security->xss_clean($this->input->post('email'))
        );
        $this->db->insert('newsletter', $data);
        return $this->db->insert_id();
    }
    
    public function getProductImagesBYProductId($product_id){
        $query=$this->db->get_where('product_image',['product_id'=>$product_id]);
        return $query->result_array();
    }
    
    public function doAddConsultation(){
        $data=array(
            'name' => $this->security->xss_clean($this->input->post('name')),
            'email' => $this->security->xss_clean($this->input->post('email')),
            'phone' => $this->security->xss_clean($this->input->post('phone')),
            'location' => $this->security->xss_clean($this->input->post('location')),
            'message' => $this->security->xss_clean($this->input->post('message'))
        );
        $this->db->insert('consultation',$data);
        return $this->db->insert_id();
    }
    
    public function getRelatedProduct($category_id){
        $this->db->from('product');
        $this->db->where('category_id',$category_id);
        $this->db->order_by('product_id', 'RANDOM');
        $this->db->limit(3);
        $query= $this->db->get();
        return $query->result_array();
    }
    
    public function getOtpMessage(){
        $query=$this->db->get_where('sms',['name'=>'otp']);
        return $query->row_array();
    }
    
    public function getTopSellingProduct(){
        $this->db->select('p.product_id,p.title,p.main_image,p.hover_image,p.price,s.*');
        $this->db->from('top_selling t');
        $this->db->join('product p', 'p.product_id=t.product_id');
        $this->db->join('stock s','s.product_id=p.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getOrderSms(){
        $query=$this->db->get_where('sms',['name'=>'Order Placed']);
        return $query->row_array();
    }
    
    public function getProductName($product_id){
        $this->db->select('title');
        $query=$this->db->get_where('product',['product_id'=>$product_id]);
        return $query->row_array();
    }
    
    public function getProductByCategoryId($category_id){
        $this->db->select('m.sub_category_id,p.product_id,p.title,p.price,p.main_image,p.hover_image,s.*');
        $this->db->from('sub_category_product_mapping m');
        $this->db->join('product p','m.product_id=p.product_id');
        $this->db->join('stock s','s.product_id=p.product_id');
        $this->db->where('p.category_id',$category_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getUniqueProductByCategoryId($category_id){
        $this->db->select('m.sub_category_id,p.product_id,p.title,p.price,p.main_image,p.hover_image,s.*');
        $this->db->from('sub_category_product_mapping m');
        $this->db->join('product p','m.product_id=p.product_id');
        $this->db->join('stock s','s.product_id=p.product_id');
        $this->db->where('p.category_id',$category_id);
        $this->db->group_by('p.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getPriceFilterProduct($category_id, $price_filter = null, $sleeve_filter = null) {
        $this->db->select('m.sub_category_id,p.product_id,p.title,p.price,p.main_image,p.hover_image,p.category_id,s.*');
        $this->db->from('sub_category_product_mapping m');
        $this->db->join('product p','m.product_id=p.product_id');
        $this->db->join('stock s','s.product_id=p.product_id');
        $this->db->where('p.category_id',$category_id);
        if (!empty($sleeve_filter)) {
            if ($sleeve_filter == 'short_sleeve') {
                $this->db->where('p.product_type', 0);
            } else if ($sleeve_filter == 'long_sleeve') {
                $this->db->where('p.product_type', 1);
            }
        }
        $this->db->where('p.category_id', $category_id);
        if (!empty($price_filter)) {
            $this->db->order_by("p.price", $price_filter);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getUniquegetPriceFilterProduct($category_id, $price_filter = null, $sleeve_filter = null) {
        $this->db->select('m.sub_category_id,p.product_id,p.title,p.price,p.main_image,p.hover_image,p.category_id,s.*');
        $this->db->from('sub_category_product_mapping m');
        $this->db->join('product p','m.product_id=p.product_id');
        $this->db->join('stock s','s.product_id=p.product_id');
        $this->db->where('p.category_id',$category_id);
        if (!empty($sleeve_filter)) {
            if ($sleeve_filter == 'short_sleeve') {
                $this->db->where('p.product_type', 0);
            } else if ($sleeve_filter == 'long_sleeve') {
                $this->db->where('p.product_type', 1);
            }
        }
        $this->db->where('p.category_id', $category_id);
        if (!empty($price_filter)) {
            $this->db->order_by("p.price", $price_filter);
        }
        $this->db->group_by('p.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getSizeGuide()
    {
        $this->db->limit(1);
        $query = $this->db->get('size_guide');
        return $query->result_array();
    }


}
