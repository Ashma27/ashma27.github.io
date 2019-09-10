<?php

/**
 * Description of Product
 *
 * @author Mohit Kant Gupta
 */
 
class Special extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model']);
    }

    private function isLogin() {
        return $this->session->userdata('email');
    }
    
    public function index() {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['script'] = 1;
        $data['title'] = 'designer Product';
        $data['products']=$this->admin_model->getAllDesignerProduct();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/designer-product-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function addDesignerProduct($product_id=null){
        if (!empty($product_id)) {
            $data['product'] = $this->admin_model->getDesignerProductById($product_id);
        }
        $data['title'] = 'designer Product';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/designer-product-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function doAddDesignerProduct(){
        $this->output->set_content_type('application/json');
        $image_url = $this->uploadImage();
        if ($image_url) {
            $result = $this->admin_model->doAddDesignerProduct($image_url);
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Designer Product added sucessfully', 'url' => base_url('admin/designer-product')]));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Designer Product did not added sucessfully.']));
                return FALSE;
            }
        } else {
            $errors = $this->session->userdata('errors');
            $this->session->unset_userdata('errors');
            $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
            return FALSE;
        }
    }
    
    public function uploadImage() {
        $config = array(
            'upload_path' => "./uploads/carousel/thumb",
            'allowed_types' => "jpeg|jpg|png",
            'file_name' => rand(11111, 99999),
            'max_size' => "204800"
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image_url')) {
            $upload_data = $this->upload->data();
            $resize_conf = array(
                'upload_path' => realpath('./uploads/carousel/'),
                'source_image' => $upload_data['full_path'],
                'new_image' => './uploads/carousel/'. $upload_data['file_name'],
                'create_thumb' => FALSE,
                'maintain_ratio' => TRUE,
                'quality' => '50%',
                'width'=>'1583',
                'height'=>'956'
            );
            $this->load->library('image_lib',$resize_conf);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            } else {
                unlink($upload_data['file_path'].'/'.$upload_data['file_name']);
                return $upload_data['file_name'];
            }
            
        } else {
            $this->session->set_userdata('errors', ['image_url' => $this->upload->display_errors()]);
            return 0;
        }
    }
    
    public function doEditDesignerProduct($product_id){
        if (!empty($_FILES['image_url']['name'])) {
            $image_url = $this->uploadImage();
            if ($image_url == 0) {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
                return FALSE;
            }
        } else {
            $catgory = $this->admin_model->getDesignerProductById($product_id);
            $image_url = $catgory['image_url'];
        }
        $result = $this->admin_model->doEditDesignerProduct($product_id, $image_url);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Designer Product edited sucessfully', 'url' => base_url('admin/designer-product')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }
    
    public function deleteDesignerProduct($product_id){
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->deleteDesignerProduct($product_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Designer Product Deleted Sucessfully', 'url' => base_url('admin/designer-product')]));
            return FALSE;
        }
    }
    
    public function special_product(){
        $data['product']=$this->admin_model->getSpecialProduct();
        $data['title'] = 'Special Product';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/special-product', $data);
        $this->load->view('admin/commons/footer', $data);
    }
    
    public function doEditSpecialProduct(){
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('product_url', 'Product Url', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        if (!empty($_FILES['image_url']['name'])) {
            $image_url = $this->uploadImage();
            if ($image_url == 0) {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
                return FALSE;
            }
        } else {
            $product = $this->admin_model->getSpecialProduct();
            $image_url = $product['image_url'];
        }
        $result = $this->admin_model->doEditSpecialProduct($image_url);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Special Product edited sucessfully', 'url' => base_url('admin/special-product')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }
    
    
}    