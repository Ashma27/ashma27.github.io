<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site_setting
 *
 * @author Mohit Kant Gupta
 */
class Site_setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model']);
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
    }

    private function isLogin() {
        return $this->session->userdata('email');
    }

    public function faq() {
        $data['script'] = 1;
        $data['title'] = 'FAQ';
        $data['faqs'] = $this->admin_model->getAllFaq();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/faq-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function add_faq($id = '') {
        if (!empty($id)) {
            $data['faq'] = $this->admin_model->getFaqById($id);
        }
        $data['title'] = 'FAQ';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/faq-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function do_add_faq() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->do_add_faq();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'FAQ added sucessfully', 'url' => base_url('admin/faq')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'FAQ did not added sucessfully.']));
            return FALSE;
        }
    }

    public function do_edit_faq($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->do_edit_faq($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'FAQ edited sucessfully', 'url' => base_url('admin/faq')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }

    public function delete_faq($id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->doDeleteFaq($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'FAQ Deleted Sucessfully', 'url' => base_url('admin/faq')]));
            return FALSE;
        }
    }

    public function privacy_policy() {
        $data['title'] = 'privacy policy';
        $data['privacy'] = $this->admin_model->getPrivacyPolicy();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/privacy', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doEditPrivacy($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditPrivacy($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Privacy Policy edited sucessfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }

    public function return_policy() {
        $data['title'] = 'return policy';
        $data['return'] = $this->admin_model->getReturnPolicy();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/return', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doEditReturn($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditReturnPolicy($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Return Policy edited sucessfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }

    public function terms_and_condition() {
        $data['title'] = 'term and condition';
        $data['term'] = $this->admin_model->getterms();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/terms', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doEditTerm($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditTerms($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Terms & Condition edited sucessfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }

    public function carousel() {
        $data['script'] = 1;
        $data['title'] = 'carousel';
        $data['carousels'] = $this->admin_model->getCarousel();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/carousel-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function add_carousel($id = null) {
        if (!empty($id)) {
            $data['carousel'] = $this->admin_model->getCarouselById($id);
        }
        $data['title'] = 'carousel';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/carousel-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doAddCarousel() {
        $this->output->set_content_type('application/json');
        $image_url = $this->uploadImage();
        if ($image_url) {
            $result = $this->admin_model->doAddCarousel($image_url);
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Carousel added sucessfully', 'url' => base_url('admin/carousel')]));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Carousel did not added sucessfully.']));
                return FALSE;
            }
        } else {
            $errors = $this->session->userdata('errors');
            $this->session->unset_userdata('errors');
            $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
            return FALSE;
        }
    }
    
    public function doEditCarousel($id){
        $this->output->set_content_type('application/json');
        if (!empty($_FILES['image_url']['name'])) {
            $image_url = $this->uploadImage();
            if ($image_url==0) {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
                return FALSE;
            }
        }else{
            $carousel=$this->admin_model->getCarouselById($id);
            $image_url=$carousel['image_url'];
        }
        $result = $this->admin_model->doEditCarousel($id,$image_url);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Carousel edited sucessfully', 'url' => base_url('admin/carousel')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }
    
    public function uploadImage() {
        $config = array(
            'upload_path' => "./uploads/carousel/",
            'allowed_types' => "jpeg|jpg|png",
            'file_name' => rand(11111, 99999),
            'max_size' => "204800"
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image_url')) {
            $data = $this->upload->data();
            return $data['file_name'];
        } else {
            $this->session->set_userdata('errors', ['image_url' => $this->upload->display_errors()]);
            return 0;
        }
    }
    
    public function deleteCarousel($id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->dodeleteCarousel($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Category Deleted Sucessfully', 'url' => base_url('admin/carousel')]));
            return FALSE;
        }
    }
    
    public function about_us() {
        $data['title'] = 'About us';
        $data['about'] = $this->admin_model->getAboutUs();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/about-us', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function doEditAbout($id){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditAbout($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'About us edited sucessfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }
    
    public function shipping_policy() {
        $data['title'] = 'Shipping policy';
        $data['shipping'] = $this->admin_model->getshippingPolicy();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/shipping', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doEditShippingPolicy($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditShippingPolicy($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Shipping Policy edited sucessfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }
      public function fit_guarantee(){
        $data['title'] = 'fit guarantee';
        $data['fit']= $this->admin_model->getfit();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/fit-guarantee', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function doEditFit($id){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result= $this->admin_model->doEditFit($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Fit Guarantee edited sucessfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made']));
            return FALSE;
        }
    }


}
