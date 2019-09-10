<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sizing
 *
 * @author Mohit Kant Gupta
 */
class Sizing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model','abkasa_model']);
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
    }

    private function isLogin() {
        return $this->session->userdata('email');
    }

    public function index($id = NULL) {
        if (!empty($id)) {
            $data['brand'] = $this->admin_model->getBrandById($id);
        }
        $data['script'] = 1;
        $data['title'] = 'Brand';
        $data['brands'] = $this->admin_model->getAllBrands();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/brand-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doAddBrand() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required|is_unique[brand.brand_name]');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doAddBrand();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Brand added sucessfully', 'url' => base_url('admin/brand')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Brand did not added sucessfully.']));
            return FALSE;
        }
    }

    public function doEditBrand($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditBrand($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Brand edited sucessfully', 'url' => base_url('admin/brand')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }

    public function deleteBrand($id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->deleteBrand($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Brand Deleted Sucessfully', 'url' => base_url('admin/brand')]));
            return FALSE;
        }
    }

    public function size($id) {
        $data['title'] = 'Size';
        $data['script'] = 1;
        $data['brand'] = $this->admin_model->getBrandById($id);
        $data['sizes'] = $this->admin_model->getSizeByBrandId($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/size', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doAddSize($brand_id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('size_number', 'Size Number', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doAddSize($brand_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Size Added sucessfully', 'url' => base_url('admin/size/' . $brand_id)]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Size did not added sucessfully.']));
            return FALSE;
        }
    }

    public function deleteSize($size_id, $brand_id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->deleteSize($size_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Size Deleted Sucessfully', 'url' => base_url('admin/size/' . $brand_id)]));
            return FALSE;
        }
    }

    public function fit($size_id, $brand_id) {
        $data['title'] = 'Fit';
        $data['script'] = 1;
        $data['size_id'] = $size_id;
        $data['brand_id'] = $brand_id;
        $data['fit'] = $this->admin_model->getFitBySizeId($size_id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/fit', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doUpdateFit($size_id) {
        $this->output->set_content_type('application/json');
        $slim = $this->input->post('slim');
        $regular = $this->input->post('regular');
        if ($slim == '1') {
            $this->form_validation->set_rules('slim_value', 'Slim', 'required');
        }
        if ($regular == '1') {
            $this->form_validation->set_rules('regular_value', 'Regular', 'required');
        }
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doUpdateFit($size_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Fit updated sucessfully']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }
    
    public function newsletter() {
        $data['script'] = 1;
        $data['title'] = 'Newsletter';
        $data['newsletters'] = $this->admin_model->getNewsletter();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/newsletter', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function home_consultation() {
        $data['script'] = 1;
        $data['title'] = 'Home Consultation';
        $data['consultations'] = $this->admin_model->getAllConsultation();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/consultation', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function single_home_consultation($id) {
        $data['script'] = 1;
        $data['title'] = 'Home Consultation';
        $data['consultation'] = $this->admin_model->getConsultationById($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/single-consultation', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function top_selling_product(){
        $data['script'] = 1;
        $data['top_selling_script']=2;
        $data['title'] = 'Top Selling';
        $data['top_sellings'] = $this->admin_model->getAllTopSelling();
        $data['products']= $this->admin_model->getAllProduct();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/top-selling-view',$data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function doAddTopSelling(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('product_id', 'Product Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doAddTopSelling();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Top Selling Added sucessfully', 'url' => base_url('admin/top-selling')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Top Selling did not added sucessfully.']));
            return FALSE;
        }
    }
    
    public function deleteTopSelling($id){
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->deleteTopSelling($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Top selling product removed Sucessfully', 'url' => base_url('admin/top-selling')]));
            return FALSE;
        }
    }
   
   public function size_guide()
   {
        $data['script'] = 1;
        $data['title'] = 'Size Guide';
        $data['sizeGuide'] = $this->abkasa_model->getSizeGuide();
        
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/size-guide', $data);
        $this->load->view('admin/commons/footer', $data);
   }
   
   public function sizeGuideDoUpload()
   {
       $this->output->set_content_type('application/json');
       $main_image = $this->uploadMainImage();
       
       if ($main_image == 0) {
            $errors = $this->session->userdata('errors');
            $this->session->unset_userdata('errors');
            $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
            return FALSE;
        }
        else
        {
            $result = $this->admin_model->douploads($main_image);
     
            if ($result==TRUE) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Size Guide added sucessfully','url'=> base_url('admin/size-guide')]));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Size Guide did not added sucessfully.']));
                return FALSE;
            }
        }
   }
   
    public function uploadMainImage() {
        $this->load->library('upload', $this->set_upload_options());
        if ($this->upload->do_upload('size_image')) {
            $upload_data = $this->upload->data();
            $resize_conf = array(
                'upload_path' => realpath('./uploads/size_guide/'),
                'source_image' => $upload_data['full_path'],
                'new_image' => './uploads/size_guide/' . $upload_data['file_name'],
                'create_thumb' => FALSE,
                'maintain_ratio' => TRUE,
                'quality' => '50%',
                'width' => '700',
                'height' => '1030'
            );
            $this->load->library('image_lib', $resize_conf);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            } else {
                unlink($upload_data['file_path'] . '/' . $upload_data['file_name']);
                return $upload_data['file_name'];
            }
        } else {
            $this->session->set_userdata('errors', ['main_image' => $this->upload->display_errors()]);
            return 0;
        }
    }
    
    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/size_guide/thumb';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '204800';
        $config['overwrite'] = FALSE;
        $config['file_name'] = rand(11111, 99999);

        return $config;
    }
}
