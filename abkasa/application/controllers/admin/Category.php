<?php

/**
 * Description of Category
 *
 * @author Mohit Kant Gupta
 */
class Category extends CI_Controller {

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

    public function index() {
        $data['script'] = 1;
        $data['title'] = 'Category';
        $data['categories'] = $this->admin_model->getCategory();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/category-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function addCategory($id = null) {
        if (!empty($id)) {
            $data['category'] = $this->admin_model->getCategoryById($id);
        }
        $data['title'] = 'Category';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/category-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doAddCategory() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required|is_unique[category.category_name]');
        $this->form_validation->set_rules('category_description', 'Category description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $image_url = $this->uploadImage();
        if ($image_url) {
            $result = $this->admin_model->doAddCategory($image_url);
            if ($result) {
                $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Category added sucessfully', 'url' => base_url('admin/category')]));
                return FALSE;
            } else {
                $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Category did not added sucessfully.']));
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
            'upload_path' => "./uploads/category/thumb",
            'allowed_types' => "jpeg|jpg|png",
            'file_name' => rand(11111, 99999),
            'max_size' => "204800"
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('category_image')) {
            $upload_data = $this->upload->data();
            $resize_conf = array(
                'upload_path' => realpath('./uploads/category/'),
                'source_image' => $upload_data['full_path'],
                'new_image' => './uploads/category/'. $upload_data['file_name'],
                'create_thumb' => FALSE,
                'maintain_ratio' => TRUE,
                'quality' => '50%',
                'width'=>'431',
                'height'=>'554'
            );
            $this->load->library('image_lib',$resize_conf);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            } else {
                unlink($upload_data['file_path'].'/'.$upload_data['file_name']);
                return $upload_data['file_name'];
            }
            
        } else {
            $this->session->set_userdata('errors', ['category_image' => $this->upload->display_errors()]);
            return 0;
        }
    }

    public function doEditCategory($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('category_name', 'Category Name', 'required');
        $this->form_validation->set_rules('category_description', 'Category description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        if (!empty($_FILES['category_image']['name'])) {
            $image_url = $this->uploadImage();
            if ($image_url==0) {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
                return FALSE;
            }
        }else{
            $catgory=$this->admin_model->getCategoryById($id);
            $image_url=$catgory['category_image'];
        }
        $result = $this->admin_model->doEditCategory($id,$image_url);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Category edited sucessfully', 'url' => base_url('admin/category')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }

    public function deleteCategory($id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->doDeleteCategory($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Category Deleted Sucessfully', 'url' => base_url('admin/category')]));
            return FALSE;
        }
    }

    /* Shubham */

    public function subCategory() {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['script'] = 1;
        $data['title'] = 'Sub Category';
        $data['subcategories'] = $this->admin_model->getsubCategory();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/subCategory-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function addSubCategory($id = null) {
        if (!empty($id)) {
            $data['sub_category'] = $this->admin_model->getsubCategoryById($id);
        }
        $data['title'] = 'Sub Category';
        $data['categories'] = $this->admin_model->getCategory();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/subcategory-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doAddsubCategory() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('category_id', 'Category Name', 'required');
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doAddsubCategory();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Sub Category added sucessfully', 'url' => base_url('admin/subCategory')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Sub Category did not added sucessfully.']));
            return FALSE;
        }
    }

    public function doEditsubCategory($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('category_id', 'Category Name', 'required');
        $this->form_validation->set_rules('sub_category_name', 'Category Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditsubCategory($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Sub Category edited sucessfully', 'url' => base_url('admin/subCategory')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }

    public function deletesubCategory($id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->doDeletesubCategory($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Sub Category Deleted Sucessfully', 'url' => base_url('admin/subCategory')]));
            return FALSE;
        }
    }

}
