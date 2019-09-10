<?php

/**
 * Description of Abkasa
 *
 * @author Mohit Kant Gupta
 */
class Abkasa extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model(['abkasa_model', 'admin_model']);
        $this->load->library('facebook');
    }

    public function getClientDetail() {
        $client = $this->abkasa_model->getClientDetail($this->session->userdata('user_email'));
        return $client;
    }

    public function index() {
        if (!empty($this->session->userdata('user_email'))) {
            $data['client'] = $client = $this->getClientDetail();
            if ($client['is_verify'] == 0) {
                redirect(base_url('abkasa/verify-mobile'));
            }
        }
        $data['title'] = Title . '| Home';
        $data['designer_products']=$this->admin_model->getAllDesignerProduct();
        $data['special_product']=$this->admin_model->getSpecialProduct();
        $data['carousels']= $this->abkasa_model->getAllCarousel();
        $data['about']= $this->abkasa_model->getAbout();
        $data['products'] = $this->abkasa_model->getTopSellingProduct();
        $data['header']=1;
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/home', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function oauth2callback() {
        $google_data = $this->google->validate();
        $session_data = array(
            'name' => $google_data['name'],
            'email' => $google_data['email'],
            'source' => 'Google'
        );
        $email = $session_data['email'];
        $this->session->set_userdata('user_email', $email);
        $result = $this->abkasa_model->checkClient($email);
        if ($result) {
            if ($result['is_verify'] == 0) {
                redirect(base_url('abkasa/verify-mobile'));
            }
        } else {
            $this->abkasa_model->client_login($session_data);
            redirect(base_url('abkasa/verify-mobile'));
        }
        redirect(base_url('cart/getCartData'));
    }

    public function verify_mobile() {
        if (!$this->getClientDetail()) {
            redirect(base_url('abkasa'));
        }
        $data['title'] = Title . '| Mobile Verification';
        $data['client'] = $this->getClientDetail();
        $this->load->view('abkasa/verify-mobile', $data);
    }

    public function doVerifyMobile() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $mobile = $this->input->post('mobile');
        $otp_message = $this->abkasa_model->getOtpMessage();
        // $otp = '1234';
        $otp = rand('1111', '9999');
        $message=stripslashes($otp_message['message']);
        eval("\$message= \"$message\";");
        $url = "http://api.msg91.com/api/sendhttp.php?country=91&sender=ABKASA&route=4&mobiles=".$mobile."&authkey=257849Akn6hoGDG5c47130f&message=" . $message;
        file_get_contents($url);
        $result = $this->abkasa_model->updateMobile($this->session->userdata('user_email'), $otp);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'mobile' => $mobile]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Please try again!!']));
            return FALSE;
        }
    }

    public function doVerifyOtp() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('otp', 'otp', 'required|numeric');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->abkasa_model->doVerifyOtp();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('abkasa')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Incorrect Otp']));
            return FALSE;
        }
    }

    public function fbLogin() {
        if ($this->facebook->is_authenticated()) {
            $userProfile = $this->facebook->request('get', '/me?fields=id,name,email');
            // echo 'hello';
            // print_r($userProfile); die;
            if (!isset($userProfile['error'])) {
                $session_data['email'] = $userProfile['email'];
                $session_data['name'] = $userProfile['name'];
                $session_data['source'] = 'facebook';
                $email = $session_data['email'];
                $this->session->set_userdata('user_email', $email);
                $result = $this->abkasa_model->checkClient($email);
                if ($result) {
                    if ($result['is_verify'] == 0) {
                        redirect(base_url('abkasa/verify-mobile'));
                    }
                } else {
                    $this->abkasa_model->client_login($session_data);
                    redirect(base_url('abkasa/verify-mobile'));
                }
            } else {
                $this->facebook->destroy_session();
                redirect('abkasa');
            }
            redirect(base_url('cart/getCartData'));
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_email');
        // $this->session->sess_destroy();
       $this->session->unset_userdata('fb_access_token'); 
        redirect(base_url('abkasa'));
    }

    public function category($category_name) {
        $data['category']=$category = $this->abkasa_model->getCategoryIdByCategoryName(str_replace('-', ' ', $category_name));
        $data['sub_categories'] = $this->admin_model->getSubCategoryByCategoryId($category['category_id']);
        $data['title'] = Title . '| Category';
        $data['client'] = $this->getClientDetail();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/category', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function filter_product_list($category_name) {
        $this->output->set_content_type('application/json');
        $data['category'] = $category = $this->abkasa_model->getCategoryIdByCategoryName(str_replace('-', ' ', $category_name));
        $data['sub_categories'] = $this->admin_model->getSubCategoryByCategoryId($category['category_id']);
        $price_filter = $this->input->post('price_filter');
        $sleeve_filter = $this->input->post('sleeve_filter');
        if (!empty($price_filter) | !empty($sleeve_filter)) {
            $data['products'] = $this->abkasa_model->getPriceFilterProduct($category['category_id'], $price_filter, $sleeve_filter);
            $data['unique_products']= $this->abkasa_model->getUniquegetPriceFilterProduct($category['category_id'], $price_filter, $sleeve_filter);
        } else {
            $data['products'] = $this->abkasa_model->getProductByCategoryId($category['category_id']);
            $data['unique_products']=$unique= $this->abkasa_model->getUniqueProductByCategoryId($category['category_id']);
            // print_r($unique); die;
        }
        $filter_product = $this->load->view('abkasa/include/filter-product', $data, true);
        $this->output->set_output(json_encode(['filter_product' => $filter_product]));
        return FALSE;
    }

    public function shop() {
        $data['title'] = Title . '| shop';
        $data['client'] = $this->getClientDetail();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/shop', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function Product($product_name) {
        $product = $this->abkasa_model->getProductIdByProductName(str_replace('-', ' ', $product_name));
        $data['title'] = Title . '| Product-detail';
        $data['sub_categories'] = $this->admin_model->getAllSubCategory();
        $data['client'] = $this->getClientDetail();
        $data['product'] = $product_det = $this->admin_model->getProductById($product['product_id']);
        $data['product_images'] = $this->abkasa_model->getProductImagesBYProductId($product['product_id']);
        $data['stock'] = $this->admin_model->getStockById($product['product_id']);
        $data['products'] = $this->abkasa_model->getRelatedProduct($product_det['category_id']);
        
        $data['sizeGuide'] = $this->abkasa_model->getSizeGuide();
        
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/viewProduct', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function enterReferal() {
        $referal_by = $this->input->post('referal_by');
        $referal = $this->abkasa_model->checkReferal($referal_by);
        if ($referal) {
            $email = $this->session->userdata('email');
            $this->abkasa_model->updatePoints($referal_by);
            if ($this->abkasa_model->enter_Referal($email)) {
                $this->session->set_flashdata('feedback', "Points Added");
                redirect('abkasa');
            } else {
                $this->session->set_flashdata('feedback', "Failed to Add Points");
                redirect('abkasa');
            }
        } else {
            $this->session->set_flashdata('feedback', 'Invalid Referral Code. Please Enter valid Referral');
            redirect('abkasa');
        }
    }

    public function contact_us() {
        $data['title'] = Title . '| Contact-us';
        $data['client'] = $this->getClientDetail();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/contact-us', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function do_add_contact() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->abkasa_model->do_add_contact();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Your Response is saved with us. Will contact you soon!!']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => '']));
            return FALSE;
        }
    }

    public function frequently_asked_question() {
        $data['title'] = Title . '| FAQ';
        $data['client'] = $this->getClientDetail();
        $data['faqs'] = $this->admin_model->getAllFaq();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/faq', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function privacy_policy() {
        $data['title'] = Title . '| Privacy Policy';
        $data['client'] = $this->getClientDetail();
        $data['privacy'] = $this->admin_model->getPrivacyPolicy();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/privacy', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function return_policy() {
        $data['title'] = Title . '| Return Policy';
        $data['client'] = $this->getClientDetail();
        $data['return'] = $this->admin_model->getReturnPolicy();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/return', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function terms_and_condition() {
        $data['title'] = Title . '| Terms & Condition';
        $data['client'] = $this->getClientDetail();
        $data['term'] = $this->admin_model->getterms();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/terms', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }
  public function fit_guarantee() {
        $data['title'] = Title . '| Fit Guarantee';
        $data['client'] = $this->getClientDetail();
        $data['fit'] = $this->admin_model->getfit();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/fit-guarantee', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }
     public function special_design() {
        $data['title'] = Title . '| Special Designer';
        $data['client'] = $this->getClientDetail();
        $data['term'] = $this->admin_model->getterms();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/special-design', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }
     public function special_product() {
        $data['title'] = Title . '| Special Product';
        $data['client'] = $this->getClientDetail();
        // $data['specialpro'] = $this->admin_model->getspecial();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/special-product', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function about() {
        $data['title'] = Title . '| About-us';
        $data['client'] = $this->getClientDetail();
        $data['about']= $this->abkasa_model->getAbout();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/about', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }
    
   public function sizing() {
        $data['title'] = Title . '| Sizing';
        $data['client'] = $this->getClientDetail();
        $data['brands'] = $this->abkasa_model->getAllBrands();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/sizing', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function getSizeByBrand() {
        $this->output->set_content_type('application/json');
        $brand_id= $this->input->post('brand_id');
        $data['sizes']= $this->abkasa_model->getSizeByBrandId($brand_id);
        $size_list = $this->load->view('abkasa/include/size', $data, true);
        $this->output->set_output(json_encode(['size_list' => $size_list]));
        return FALSE;
    }
    
    public function getFitBySize(){
        $this->output->set_content_type('application/json');
        $size_id= $this->input->post('size_id');
        $data['fit']= $this->abkasa_model->getFitBySizeId($size_id);
        $fit_list = $this->load->view('abkasa/include/fit', $data, true);
        $this->output->set_output(json_encode(['fit_list' => $fit_list]));
        return FALSE;
    }
    
    public function addNewsletter(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->abkasa_model->addNewsletter();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Thanks For Subscribing The Newsletter']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong try again.']));
            return FALSE;
        }
    }
    
    public function shipping_policy(){
        $data['title'] = Title . '| Shipping-Policy';
        $data['client'] = $this->getClientDetail();
        $data['shipping'] = $this->admin_model->getshippingPolicy();
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/shipping', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }
    
    public function doAddConsultation(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->abkasa_model->doAddConsultation();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Your Response is saved with us. We will contact you soon.']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Something went wrong try again.']));
            return FALSE;
        }
    }

}
