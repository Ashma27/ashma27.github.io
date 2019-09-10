<?php

/**
 * Description of Admin_model
 *
 * @author Mohit Kant Gupta
 */
class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin() {
        $data = array(
            'email' => $this->security->xss_clean($this->input->post('email')),
            'password' => $this->security->xss_clean(hash('sha256', $this->input->post('password')))
        );
        $query = $this->db->get_where('admin', $data);
        return $query->row_array();
    }

    public function doChangePassword($email) {
        $data = array(
            'password' => hash('sha256', $this->security->xss_clean($this->input->post('password')))
        );
        $query = $this->db->get_where('admin', $data);
        if ($query->num_rows() > 0) {
            $this->db->update('admin', ['password' => hash('sha256', $this->security->xss_clean($this->input->post('confirmPassword')))], ['email' => $email]);
            return $this->db->affected_rows();
        } else {
            return -1;
        }
        return $query->row_array();
    }

    public function getCategory() {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function doAddCategory($image_url) {
        $data = array(
            'category_name' => $this->security->xss_clean($this->input->post('category_name')),
            'category_image' => $image_url,
            'category_description' => $this->security->xss_clean($this->input->post('category_description'))
        );
        $this->db->insert('category', $data);
        $this->db->insert('sub_category',['category_id'=>$this->db->insert_id(),'sub_category_name'=>'ALL']);
        return $this->db->insert_id();
    }

    public function getCategoryById($id) {
        $query = $this->db->get_where('category', ['category_id' => $id]);
        return $query->row_array();
    }

    public function doEditCategory($id, $image_url) {
        $data = array(
            'category_name' => $this->security->xss_clean($this->input->post('category_name')),
            'category_image' => $image_url,
            'category_description' => $this->security->xss_clean($this->input->post('category_description'))
        );
        $this->db->update('category', $data, ['category_id' => $id]);
        return $this->db->affected_rows();
    }

    public function doDeleteCategory($id) {
        $this->db->delete('category', ['category_id' => $id]);
        return $this->db->affected_rows();
    }

    public function getAllSubCategory() {
        $query = $this->db->get('sub_category');
        return $query->result_array();
    }

    public function getAllProduct() {
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function getProducts() {
        $this->db->select('p.product_id,p.title,p.price,p.main_image,p.hover_image');
        $this->db->from('product p');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProductByCategoryId($category_id) {
        $this->db->select('p.product_id,p.title,p.price,p.main_image,p.hover_image,p.category_id');
        $query = $this->db->get_where('product p', ['category_id' => $category_id]);
        return $query->result_array();
    }

    public function getProductByCategorySubCategoryId($category_id, $sub_category_id) {
        $this->db->select('p.product_id,p.title,p.price,p.main_image,p.hover_image');
        $this->db->from('sub_category_product_mapping m');
        $this->db->join('product p','m.product_id=p.product_id');
        $this->db->where('p.category_id',$category_id);
        $this->db->where('m.sub_category_id',$sub_category_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSubCategoryByCategoryId($category_id) {
        $query = $this->db->get_where('sub_category', ['category_id' => $category_id]);
        return $query->result_array();
    }

    public function doAddProduct($main_image,$hover_image) {
        $data = array(
            'category_id' => $this->security->xss_clean($this->input->post('category_id')),
            'title' => $this->security->xss_clean($this->input->post('title')),
            'price' => $this->security->xss_clean($this->input->post('price')),
            'discount' => $this->security->xss_clean($this->input->post('discount')),
            'discount_type' => $this->security->xss_clean($this->input->post('discount_type')),
            'description' => $this->input->post('descriptions'),
            'product_type' => $this->input->post('product_type'),
            'hsn_code' => $this->input->post('hsn_code'),
            'main_image' => $main_image,
            'hover_image' => $hover_image
        );
        $this->db->insert('product', $data);
        $product_id = $this->db->insert_id();
        $sub_category = $this->input->post('sub_category_id[]');
        if (!empty($sub_category)) {
            foreach ($sub_category as $sub) {
                $dat = array(
                    'sub_category_id' => $sub,
                    'product_id' => $product_id
                );
                $this->db->insert('sub_category_product_mapping', $dat);
            }
        }
        $this->db->insert('stock', ['product_id' => $product_id]);
        return $this->db->insert_id();
    }

    public function getProductById($id) {
        $query = $this->db->get_where('product', ['product_id' => $id]);
        return $query->row_array();
    }

    public function doEditProduct($main_image,$hover_image,$id) {
        $data = array(
            'category_id' => $this->security->xss_clean($this->input->post('category_id')),
            'title' => $this->security->xss_clean($this->input->post('title')),
            'price' => $this->security->xss_clean($this->input->post('price')),
            'discount' => $this->security->xss_clean($this->input->post('discount')),
            'discount_type' => $this->security->xss_clean($this->input->post('discount_type')),
            'description' => $this->input->post('descriptions'),
            'product_type' => $this->input->post('product_type'),
            'hsn_code' => $this->input->post('hsn_code'),
            'main_image' => $main_image,
            'hover_image' => $hover_image
        );
        $this->db->update('product', $data, ['product_id' => $id]);
        $sub_category = $this->input->post('sub_category_id[]');
        if (!empty($sub_category)) {
            $this->db->delete('sub_category_product_mapping',['product_id'=>$id]);
            foreach ($sub_category as $sub) {
                $dat = array(
                    'sub_category_id' => $sub,
                    'product_id' => $id
                );
                $this->db->insert('sub_category_product_mapping', $dat);
            }
        }
        return $this->db->affected_rows();
    }

    public function doDeleteproduct($id) {
        $this->db->delete('product', ['product_id' => $id]);
        return $this->db->affected_rows();
    }

    public function addProductMainImages($product_id, $image_url) {
        $data = array('main_image' => $image_url);
        $this->db->update('product', $data, ['product_id' => $product_id]);
        return $this->db->affected_rows();
    }

    public function addProductHoverImages($product_id, $image_url) {
        $data = array('hover_image' => $image_url);
        $this->db->update('product', $data, ['product_id' => $product_id]);
        return $this->db->affected_rows();
    }

    public function addProductListImages($id, $image_url) {
        $data = array(
            'product_id' => $id,
            'image_url' => $image_url
        );
        $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }

    public function getProductListImage($id) {
        $query = $this->db->get_where('product_image', ['product_id' => $id]);
        return $query->result_array();
    }

    public function getProductHoverImage($id) {
        $this->db->select('main_image,hover_image');
        $query = $this->db->get_where('product', ['product_id' => $id]);
        return $query->row_array();
    }

    public function deleteImage($image_id) {
        $this->db->delete('product_image', ['id' => $image_id]);
        return $this->db->affected_rows();
    }

    public function getStockById($id) {
        $query = $this->db->get_where('stock', ['product_id' => $id]);
        return $query->row_array();
    }

    public function checkStock() {
        $query = $this->db->or_where("small_slim <", 5)
                ->or_where("medium_slim <", 5)
                ->or_where("medium_regular <", 5)
                ->or_where("large_slim <", 5)
                ->or_where("large_regular <", 5)
                ->or_where("xl_slim <", 5)
                ->from('stock')
                ->get();
        return $query->num_rows();
    }

    public function showLimitedStock() {
        $query = $this->db->select('s.stock_id,p.title,p.price,p.product_id')
                ->or_where("small_slim <", 5)
                ->or_where("medium_slim <", 5)
                ->or_where("medium_regular <", 5)
                ->or_where("large_slim <", 5)
                ->or_where("large_regular <", 5)
                ->or_where("xl_slim <", 5)
                ->from('stock s')
                ->join('product p', 's.product_id=p.product_id')
                ->get();
        return $query->result_array();
    }

    public function doEditStock($id) {
        $data = array(
            'small_slim' => $this->security->xss_clean($this->input->post('small_slim')),
            'small_regular' => $this->security->xss_clean($this->input->post('small_regular')),
            'medium_slim' => $this->security->xss_clean($this->input->post('medium_slim')),
            'medium_regular' => $this->security->xss_clean($this->input->post('medium_regular')),
            'large_slim' => $this->security->xss_clean($this->input->post('large_slim')),
            'large_regular' => $this->security->xss_clean($this->input->post('large_regular')),
            'xl_slim' => $this->security->xss_clean($this->input->post('xl_slim')),
            'xl_regular' => $this->security->xss_clean($this->input->post('xl_regular'))
        );
        $this->db->update('stock', $data, ['stock_id' => $id]);
        return $this->db->affected_rows();
    }

    public function getCoupon() {
        $query = $this->db->get_where('coupon');
        return $query->result_array();
    }

    public function doAddCoupon() {
        $data = array(
            'coupon_code' => $this->security->xss_clean($this->input->post('coupon_code')),
            'coupon_count' => $this->security->xss_clean($this->input->post('coupon_count')),
            'discount' => $this->security->xss_clean($this->input->post('discount')),
            'discount_type' => $this->security->xss_clean($this->input->post('discount_type'))
        );
        $this->db->insert('coupon', $data);
        return $this->db->insert_id();
    }

    public function getCouponById($id) {
        $query = $this->db->get_where('coupon', ['coupon_id' => $id]);
        return $query->row_array();
    }

    public function doEditCoupon($id) {
        $data = array(
            'coupon_code' => $this->security->xss_clean($this->input->post('coupon_code')),
            'coupon_count' => $this->security->xss_clean($this->input->post('coupon_count')),
            'discount' => $this->security->xss_clean($this->input->post('discount')),
            'discount_type' => $this->security->xss_clean($this->input->post('discount_type'))
        );
        $this->db->update('coupon', $data, ['coupon_id' => $id]);
        return $this->db->affected_rows();
    }

    public function doDeletecoupon($id) {
        $this->db->delete('coupon', ['coupon_id' => $id]);
        return $this->db->affected_rows();
    }

    public function getCouponByOrderId($order_id) {
        $this->db->select('c.discount,discount_type');
        $this->db->from('order_coupon_mapping o');
        $this->db->join('coupon c', 'o.coupon_id=c.coupon_id');
        $this->db->where('o.order_id', $order_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function productCount() {
        $query = $this->db->get('product');
        return $query->num_rows();
    }

    public function countTodaySale() {
        $query = $this->db->get_where('orders', ['date' => date('d-m-Y')]);
        return $query->num_rows();
    }

    public function monthlySale() {
        $this->db->where('date >=', date('01' . '-m-Y'));
        $this->db->where('date <=', date('d-m-Y'));
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    public function totalSale() {
        $query = $this->db->get_where('orders');
        return $query->num_rows();
    }

    public function soldOutProduct() {
        $this->db->select('count(o.product_id) as count, o.product_id,p.title,p.price,p.main_image,p.hover_image');
        $this->db->from('orders ord');
        $this->db->join('ordered_product o','ord.order_id=o.order_id');
        $this->db->join('product p', 'o.product_id=p.product_id');
        $this->db->where('ord.status','Delivered');
        $this->db->where('ord.order_status',NULL);
        $this->db->group_by('o.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    /* Shubham */

    public function getsubCategory() {
        $this->db->select('sub_category.sub_category_id,category.category_name,sub_category.sub_category_name');
        $this->db->from('sub_category');
        $this->db->join('category', 'category.category_id=sub_category.category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function doAddsubCategory() {
        $data = array(
            'category_id' => $this->security->xss_clean($this->input->post('category_id')),
            'sub_category_name' => $this->security->xss_clean($this->input->post('sub_category_name'))
        );
        $this->db->insert('sub_category', $data);
        return $this->db->insert_id();
    }

    public function doDeletesubCategory($id) {
        $this->db->delete('sub_category', ['sub_category_id' => $id]);
        return $this->db->affected_rows();
    }

    public function getsubCategoryById($id) {
        $query = $this->db->get_where('sub_category', ['sub_category_id' => $id]);
        return $query->row_array();
    }

    public function doEditsubCategory($id) {
        $data = array(
            'category_id' => $this->security->xss_clean($this->input->post('category_id')),
            'sub_category_name' => $this->security->xss_clean($this->input->post('sub_category_name'))
        );
        $this->db->update('sub_category', $data, ['sub_category_id' => $id]);
        return $this->db->affected_rows();
    }

    public function getOrder() {
        $this->db->select('o.order_id,o.total,o.status,c.name,o.date,o.order_status');
        $this->db->from('orders o');
        $this->db->join('client c', 'o.client_id=c.client_id');
        $this->db->order_by('o.order_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFilteredOrder($order_type) {
        $this->db->select('o.order_id,o.total,o.status,c.name,o.date,o.order_status');
        $this->db->from('orders o');
        $this->db->join('client c', 'o.client_id=c.client_id');
        $this->db->where('o.order_status', $order_type);
        $this->db->order_by('o.order_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getorderById($id) {
        $this->db->select('o.sub_total,o.order_id,o.total,o.status,c.name,c.city,c.state,c.email,c.mobile,c.address,c.pincode,o.date,o.payment_mode,o.order_status');
        $this->db->from('orders o');
        $this->db->join('client c', 'o.client_id=c.client_id');
        $this->db->where('o.order_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getOrderedProducts($order_id) {
        $this->db->select('p.title,p.hsn_code,o.size_type,o.quantity,o.price,o.status,o.replacing_size,o.ordered_product_id');
        $this->db->from('ordered_product o');
        $this->db->join('product p', 'p.product_id=o.product_id');
        $this->db->where('o.order_id', $order_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function changeReplacingProductStatus($ordered_product_id){
        $this->db->update('ordered_product',['status'=>'Replaced'],['ordered_product_id'=>$ordered_product_id]);
        return $this->db->affected_rows();
    }
    
    public function getOrderedProductById($orderedProductId){
        $query=$this->db->get_where('ordered_product',['ordered_product_id'=>$orderedProductId]);
        return $query->row_array();
    }

    public function changeOrderStatus($order_id) {
        $this->db->update('orders', ['status' => $this->input->post('status')], ['order_id' => $order_id]);
        return $this->db->affected_rows();
    }

    public function getCustomer() {
        $this->db->order_by('client_id', 'DESC');
        $query = $this->db->get('client');
        return $query->result_array();
    }

    public function changeOrderProductStatus($ordered_product_id) {
        $this->db->update('ordered_product', ['status' => $this->input->post('status')], ['ordered_product_id' => $ordered_product_id]);
        return $this->db->affected_rows();
    }
    
    

    public function do_add_faq() {
        $data = array(
            'title' => $this->security->xss_clean($this->input->post('title')),
            'description' => $this->security->xss_clean($this->input->post('description')),
        );
        $this->db->insert('faq',$data);
        return $this->db->insert_id();
    }
    
    public function getAllFaq(){
        $query=$this->db->get('faq');
        return $query->result_array();
    }
    
    public function getFaqById($id){
        $query=$this->db->get_where('faq',['faq_id'=>$id]);
        return $query->row_array();
    }
    
    public function do_edit_faq($id){
        $data = array(
            'title' => $this->security->xss_clean($this->input->post('title')),
            'description' => $this->security->xss_clean($this->input->post('description')),
        );
        $this->db->update('faq',$data,['faq_id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function doDeleteFaq($id){
        $this->db->delete('faq', ['faq_id' => $id]);
        return $this->db->affected_rows();
    }
    
    public function getPrivacyPolicy(){
        $query= $this->db->get_where('privacy',['id'=>'1']);
        return $query->row_array();
    }
    
    public function doEditPrivacy($id){
        $data = array(
            'description' => $this->security->xss_clean($this->input->post('description')),
        );
        $this->db->update('privacy',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function getReturnPolicy(){
        $query= $this->db->get_where('return_policy',['id'=>'1']);
        return $query->row_array();
    }
    
    public function doEditReturnPolicy($id){
        $data = array(
            'description' => $this->security->xss_clean($this->input->post('description')),
        );
        $this->db->update('return_policy',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function getterms(){
        $query= $this->db->get_where('terms',['id'=>'1']);
        return $query->row_array();
    }
    
    public function doEditTerms($id){
         $data = array(
            'description' => $this->security->xss_clean($this->input->post('description')),
        );
        $this->db->update('terms',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function filterLowToHigh(){
        $this->db->from("product");
        $this->db->order_by("price", "asc");
        $query = $this->db->get(); 
        return $query->result();
    }
    
    public function getPriceFilterProduct($category_id,$price_filter=null,$sleeve_filter=null){
        $this->db->select('product_id,title,price,main_image,hover_image,category_id,sub_category_id');
        $this->db->from("product");
        if(!empty($sleeve_filter)){
            if($sleeve_filter=='short_sleeve'){
                $this->db->where('product_type',0);
            }else if($sleeve_filter=='long_sleeve'){
                $this->db->where('product_type',1);
            }
        }
        $this->db->where('category_id',$category_id);
        if(!empty($price_filter)){
            $this->db->order_by("price", $price_filter);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getCarousel(){
        $query=$this->db->get('carousel');
        return $query->result_array();
    }
    
    public function getCarouselById($id){
        $query= $this->db->get_where('carousel',['carousel_id'=>$id]);
        return $query->row_array();
    }
    
    public function doAddCarousel($image_url){
        $data=array(
            'name'=> $this->security->xss_clean($this->input->post('name')),
            'image_url'=>$image_url
        );
        $this->db->insert('carousel',$data);
        return $this->db->insert_id();
    }
    
    public function doEditCarousel($id,$image_url){
        $data=array(
            'name'=> $this->security->xss_clean($this->input->post('name')),
            'image_url'=>$image_url
        );
        $this->db->update('carousel',$data,['carousel_id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function dodeleteCarousel($id){
        $this->db->delete('carousel', ['carousel_id' => $id]);
        return $this->db->affected_rows();
    }
    
    public function getAboutUs(){
        $query= $this->db->get_where('about',['id'=>'1']);
        return $query->row_array();
    }
    
    public function doEditAbout($id){
        $data = array(
            'description' => $this->security->xss_clean($this->input->post('description')),
        );
        $this->db->update('about',$data,['id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function getAllBrands() {
        $query = $this->db->get('brand');
        return $query->result_array();
    }

    public function doAddBrand() {
        $data = array(
            'brand_name' => $this->security->xss_clean($this->input->post('brand_name'))
        );
        $this->db->insert('brand', $data);
        return $this->db->insert_id();
    }

    public function getBrandById($id) {
        $query = $this->db->get_where('brand', ['brand_id' => $id]);
        return $query->row_array();
    }

    public function doEditBrand($id) {
        $data = array(
            'brand_name' => $this->security->xss_clean($this->input->post('brand_name'))
        );
        $this->db->update('brand', $data, ['brand_id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteBrand($id) {
        $this->db->delete('brand', ['brand_id' => $id]);
        return $this->db->affected_rows();
    }

    public function doAddSize($brand_id) {
        $data = array(
            'size_number' => $this->security->xss_clean($this->input->post('size_number')),
            'brand_id' => $brand_id
        );
        $this->db->insert('size', $data);
        $this->db->insert('fit', ['size_id' => $this->db->insert_id()]);
        return $this->db->insert_id();
    }

    public function getSizeByBrandId($id) {
        $query = $this->db->get_where('size', ['brand_id' => $id]);
        return $query->result_array();
    }

    public function doUpdateFit($size_id) {
        $data = array(
            'slim' => $this->input->post('slim'),
            'regular' => $this->input->post('regular'),
            'slim_value' => $this->input->post('slim_value'),
            'regular_value' => $this->input->post('regular_value')
        );
        $this->db->update('fit',$data,['size_id'=>$size_id]);
        return $this->db->affected_rows();
    }
    
    public function getFitBySizeId($size_id){
        $query= $this->db->get_where('fit',['size_id'=>$size_id]);
        return $query->row_array();
    }
    
    public function deleteSize($size_id){
        $this->db->delete('fit',['size_id'=>$size_id]);
        $this->db->delete('size',['size_id'=>$size_id]);
        return $this->db->affected_rows();
    }
    
    public function getshippingPolicy(){
        $query= $this->db->get_where('shipping_policy',['id'=>'1']);
        return $query->row_array();
    }
    
    public function doEditShippingPolicy($id){
        $data = array(
            'description' => $this->input->post('description')
        );
        $this->db->update('shipping_policy', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    
    public function getNewsletter(){
        $query= $this->db->get('newsletter');
        return $query->result_array();
    }
    
    public function getAllConsultation(){
        $query= $this->db->get('consultation');
        return $query->result_array();
    }
    
    public function getAllSms(){
        $query= $this->db->get('sms');
        return $query->result_array();
    }
    
    public function doAddSms(){
        $data=array(
            'name'=>$this->security->xss_clean($this->input->post('name')),
            'message'=> $this->input->post('message')
        );
        $this->db->insert('sms',$data);
        return $this->db->insert_id();
    }
    
    public function getSmsById($id){
        $query= $this->db->get_where('sms',['id'=>$id]);
        return $query->row_array();
    }
    
    public function doEditSms($id){
        $data=array(
            'name'=>$this->security->xss_clean($this->input->post('name')),
            'message'=> $this->input->post('message')
        );
        $this->db->update('sms', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    
    public function doDeleteSms($id){
        $this->db->delete('sms',['id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function getAllTopSelling(){
        $this->db->select('p.title,p.main_image,t.id');
        $this->db->from('top_selling t');
        $this->db->join('product p','p.product_id=t.product_id');
        $query= $this->db->get();
        return $query->result_array();
    }
    
    public function doAddTopSelling(){
        $data=array(
            'product_id'=> $this->input->post('product_id')
        );
        $this->db->insert('top_selling',$data);
        return $this->db->insert_id();
    }
    
    public function deleteTopSelling($id){
        $this->db->delete('top_selling',['id'=>$id]);
        return $this->db->affected_rows();
    }
    
    public function getConsultationById($id){
        $query= $this->db->get_where('consultation',['id'=>$id]);
        return $query->row_array();
    }
    
    public function getCustomerById($id){
        $query= $this->db->get_where('client',['client_id'=>$id]);
        return $query->row_array();
    }
    
    public function getProcessingSms(){
        $query=$this->db->get_where('sms',['name'=>'processing']);
        return $query->row_array();
    }
    
    public function getUserByOrderId($order_id){
        $this->db->select('c.mobile');
        $this->db->from('orders o');
        $this->db->join('client c','o.client_id=c.client_id');
        $this->db->where('o.order_id',$order_id);
        $query= $this->db->get();
        return $query->row_array();
    }
    
    public function getOutForDeliverySms(){
        $query=$this->db->get_where('sms',['name'=>'out for delivery']);
        return $query->row_array();
    }
    
    public function getDeliveredSms(){
        $query=$this->db->get_where('sms',['name'=>'delivered']);
        return $query->row_array();
    }
    
    public function cancelOrder($order_id){
        $this->db->update('orders',['order_status'=>'Cancel'],['order_id'=>$order_id]);
        return $this->db->affected_rows();
    }
    
    public function getfit(){
        $query=  $this->db->get_where('fit_guarantee',['id'=>'1']);
        return $query->row_array();
    }
    
    public function doEditFit($id){
        $data = array(
            'description' => $this->input->post('description')
        );
        $this->db->update('fit_guarantee', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    
    public function getSubcategoryIdByProductId($product_id) {
        $this->db->select('sub_category_id');
        $query = $this->db->get_where('sub_category_product_mapping', ['product_id' => $product_id]);
        return $query->result_array();
    }
    
    public function getCancelSms(){
        $query = $this->db->get_where('sms', ['name' => 'cancel']);
        return $query->row_array();
    }
    
    public function douploads($main_image)
    {
        $data=array(
            'image_url'=> $main_image
        );
         $this->db->update('size_guide', $data, ['size_id' => 1]);
         return $this->db->affected_rows();
    }
    
    public function getAllDesignerProduct(){
        $query=$this->db->get('designer_product');
        return $query->result_array();
    }
    
    public function getDesignerProductById($product_id){
        $query = $this->db->get_where('designer_product', ['product_id' => $product_id]);
        return $query->row_array();
    }
    
    public function doAddDesignerProduct($image_url){
        $data=array(
            'image_url'=> $image_url,
            'text'=>$this->security->xss_clean($this->input->post('text'))
        );
        $this->db->insert('designer_product',$data);
        return $this->db->insert_id();
    }
    
    public function doEditDesignerProduct($product_id, $image_url){
        $data=array(
            'image_url'=> $image_url,
            'text'=>$this->security->xss_clean($this->input->post('text'))
        );
        $this->db->update('designer_product', $data, ['product_id' => $product_id]);
        return $this->db->affected_rows();
    }
    
    public function deleteDesignerProduct($product_id){
        $this->db->delete('designer_product',['product_id'=>$product_id]);
        return $this->db->affected_rows();
    }
    
    public function getSpecialProduct(){
        $query = $this->db->get_where('special_product', ['product_id' => '1']);
        return $query->row_array();
    }
    
    public function doEditSpecialProduct($image_url){
        $data=array(
            'image_url'=> $image_url,
            'product_url'=>$this->security->xss_clean($this->input->post('product_url'))
        );
        $this->db->update('special_product', $data, ['product_id' => '1']);
        return $this->db->affected_rows();
    }
    
    
}
