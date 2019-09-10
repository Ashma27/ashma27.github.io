<?php

/**
 * Description of Admin
 *
 * @author Mohit Kant Gupta
 */
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model']);
    }

    private function isLogin() {
        return $this->session->userdata('email');
    }

    public function index() {
        if($this->isLogin()){
            redirect(base_url('admin/dashboard'));
        }
        $data['title'] = 'Admin Login';
        $this->load->view('admin/index', $data);
    }

    public function checkLogin() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->checkLogin();
        if ($result) {
            $this->session->set_userdata('email', $result['email']);
            $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin/dashboard'), 'msg' => 'Loading!! Please Wait']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Invalid username or password']));
            return FALSE;
        }
    }

    public function dashboard() {
        if(!$this->isLogin()){
            redirect(base_url('admin'));
        }
        $data['title'] = 'Dashboard';
        $data['stocks'] = $this->admin_model->checkStock();
        $data['product_count']= $this->admin_model->productCount();
        $data['todaySale']= $this->admin_model->countTodaySale();
        $data['monthlySale']= $this->admin_model->monthlySale();
        $data['totalSale']= $this->admin_model->totalSale();
        $data['soldOutProduct']= $this->admin_model->soldOutProduct();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function changePassword(){ 
        if(!$this->isLogin()){
            redirect(base_url('admin'));
        }
        $data['title'] = 'Dashboard';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/changePassword', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function doChangePassword() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[newPassword]');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doChangePassword($this->isLogin());
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Password changes sucessfully.']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Password is not correct']));
            return FALSE;
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('admin'));
    }

}
