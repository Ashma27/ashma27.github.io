<?php
/**
 * Description of Coupon
 *
 * @author Mohit Kant Gupta
 */
class Coupon extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model']);
        if(!$this->isLogin()){
            redirect(base_url('admin'));
        }
    }
    
    private function isLogin() {
        return $this->session->userdata('email');
    }
    
    public function index(){     
        $data['script']=1;
        $data['title'] = 'Coupon';
        $data['coupons'] = $this->admin_model->getCoupon();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/coupon-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function add_coupon($id=null){
        if(!empty($id)){
            $data['coupon']= $this->admin_model->getCouponById($id);
        }
        $data['title'] = 'Coupon';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/coupon-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function doAddCoupon() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required|is_unique[coupon.coupon_code]');
        $this->form_validation->set_rules('coupon_count', 'Coupon Count', 'required|numeric');
        $this->form_validation->set_rules('discount', 'Discount', 'required');
        $this->form_validation->set_rules('discount_type', 'Discount Type', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doAddCoupon();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1,'msg'=>'Coupon added sucessfully', 'url' => base_url('coupon')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Coupon did not added sucessfully.']));
            return FALSE;
        }
    }
    
    public function doEditCoupon($id){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'required');
        $this->form_validation->set_rules('coupon_count', 'Coupon Count', 'required|numeric');
        $this->form_validation->set_rules('discount', 'Discount', 'required');
        $this->form_validation->set_rules('discount_type', 'Discount Type', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditCoupon($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1,'msg'=>'Coupon Edited sucessfully', 'url' => base_url('coupon')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }
    
    public function delete_coupon($id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->doDeletecoupon($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Product Deleted Sucessfully', 'url' => base_url('admin/coupon')]));
            return FALSE;
        }
    }
    
}
