<?php

/**
 * Description of Product
 *
 * @author Mohit Kant Gupta
 */
class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model']);
    }

    private function isLogin() {
        return $this->session->userdata('email');
    }

    private function getFilteredSubCategory() {
        $list = ['' => '--Select Subcategory--'];
        $sub_categories = $this->admin_model->getAllSubCategory();
        foreach ($sub_categories as $sub_category) {
            $list[$sub_category['sub_category_id']] = $sub_category['sub_category_name'];
        }
        return $list;
    }

    private function getFilteredSubCategoryByCategoryId($category_id) {
        $list;
        $sub_categories = $this->admin_model->getSubCategoryByCategoryId($category_id);
        if (!empty($sub_categories)) {
            foreach ($sub_categories as $sub_category) {
                $list[$sub_category['sub_category_id']] = $sub_category['sub_category_name'];
            }
            return $list;
        } else {
            return 1;
        }
    }

    private function getFilteredCategory() {
        $list = ['' => '--Select Category--'];
        $categories = $this->admin_model->getCategory();
        foreach ($categories as $category) {
            $list[$category['category_id']] = $category['category_name'];
        }
        return $list;
    }

    public function getSubCategory() {
        $this->output->set_content_type('application/json');
        $category_id = $this->input->post('category_id');
        $list = $this->getFilteredSubCategoryByCategoryId($category_id);
        $this->output->set_output(json_encode(['sub_category' => $list]));
        return FALSE;
    }

    public function index() {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['script'] = 1;
        $data['title'] = 'Product';
        $data['category'] = $this->getFilteredCategory();
        $data['sub_category'] = $this->getFilteredSubCategory();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/product-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function get_product_wrapper() {
        $this->output->set_content_type('application/json');
        $category_id = $this->input->post('category_id');
        $sub_category_id = $this->input->post('sub_category_id');
        if (!empty($category_id) && (!empty($sub_category_id))) {
            $data['products'] = $this->admin_model->getProductByCategorySubCategoryId($category_id, $sub_category_id);
            $product_list = $this->load->view('admin/include/product-list', $data, true);
            $this->output->set_output(json_encode(['product_list' => $product_list]));
            return FALSE;
        } else if (!empty($category_id)) {
            $data['products'] = $this->admin_model->getProductByCategoryId($category_id);
            $product_list = $this->load->view('admin/include/product-list', $data, true);
            $this->output->set_output(json_encode(['product_list' => $product_list, 'sub_category' => $this->getFilteredSubCategoryByCategoryId($category_id)]));
            return FALSE;
        } else {
            $data['products'] = $this->admin_model->getProducts();
            $product_list = $this->load->view('admin/include/product-list', $data, true);
            $this->output->set_output(json_encode(['product_list' => $product_list]));
            return FALSE;
        }
    }

    public function add_product($id = null) {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        if (!empty($id)) {
            $data['product'] = $product = $this->admin_model->getProductById($id);
            $data['sub_category_id']= $this->admin_model->getSubcategoryIdByProductId($product['product_id']);
            $data['sub_categories']= $this->admin_model->getSubCategoryByCategoryId($product['category_id']);
        }
        $data['category'] = $this->getFilteredCategory();
        $data['title'] = 'Product';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/product-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doAddProduct() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_message('is_unique', 'This {field} field is already taken');
        $this->form_validation->set_rules('category_id', 'Category Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required|is_unique[product.title]');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('discount', 'Discount', 'numeric');
        $this->form_validation->set_rules('hsn_code', 'HSN Code', 'numeric');
        if ($this->input->post('discount')) {
            $this->form_validation->set_rules('discount_type', 'Discount Type', 'required');
        }
        if ($this->input->post('discount_type')) {
            $this->form_validation->set_rules('discount', 'Discount', 'required');
        }
        $this->form_validation->set_rules('descriptions', 'Description', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $main_image = $this->uploadMainImage();
        if ($main_image == 0) {
            $errors = $this->session->userdata('errors');
            $this->session->unset_userdata('errors');
            $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
            return FALSE;
        }
        $hover_image = $this->hoverImage();
        if ($hover_image == 0) {
            $errors = $this->session->userdata('errors');
            $this->session->unset_userdata('errors');
            $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
            return FALSE;
        }
        $result = $this->admin_model->doAddProduct($main_image, $hover_image);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Product added sucessfully', 'url' => base_url('admin/product')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Product did not added sucessfully.']));
            return FALSE;
        }
    }

    public function uploadMainImage() {
        $this->load->library('upload', $this->set_upload_options());
        if ($this->upload->do_upload('main_image')) {
            $upload_data = $this->upload->data();
            $resize_conf = array(
                'upload_path' => realpath('./uploads/product/'),
                'source_image' => $upload_data['full_path'],
                'new_image' => './uploads/product/' . $upload_data['file_name'],
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

    public function hoverImage() {
        $this->upload->initialize($this->set_upload_options());
        if ($this->upload->do_upload('hover_image')) {
            $upload_data = $this->upload->data();
            $resize_conf = array(
                'upload_path' => realpath('./uploads/product/'),
                'source_image' => $upload_data['full_path'],
                'new_image' => './uploads/product/' . $upload_data['file_name'],
                'create_thumb' => FALSE,
                'maintain_ratio' => TRUE,
                'quality' => '50%',
                'width' => '700',
                'height' => '1030'
            );
            $this->load->library('image_lib');
            $this->image_lib->initialize($resize_conf);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            } else {
                unlink($upload_data['file_path'] . '/' . $upload_data['file_name']);
                return $upload_data['file_name'];
            }
        } else {
            $this->session->set_userdata('errors', ['hover_image' => $this->upload->display_errors()]);
            return 0;
        }
    }

    public function doEditProduct($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('category_id', 'Category Name', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('discount', 'Discount', 'numeric');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('hsn_code', 'HSN Code', 'numeric');
        if ($this->input->post('discount')) {
            $this->form_validation->set_rules('discount_type', 'Discount Type', 'required');
        }
        if ($this->input->post('discount_type')) {
            $this->form_validation->set_rules('discount', 'Discount', 'required');
        }
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $product = $this->admin_model->getProductById($id);
        if (!empty($_FILES['main_image']['name'])) {
            $main_image = $this->uploadMainImage();
            if ($main_image == 0) {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
                return FALSE;
            }
        } else {
            $main_image = $product['main_image'];
        }
        if (!empty($_FILES['hover_image']['name'])) {
            $hover_image = $this->hoverImage();
            if ($hover_image == 0) {
                $errors = $this->session->userdata('errors');
                $this->session->unset_userdata('errors');
                $this->output->set_output(json_encode(['result' => -2, 'errors' => $errors]));
                return FALSE;
            }
        } else {
            $hover_image = $product['hover_image'];
        }
        $result = $this->admin_model->doEditProduct($main_image, $hover_image, $id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Product edited sucessfully', 'url' => base_url('admin/product')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }

    public function add_product_image($id) {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['product_id'] = $id;
        $data['title'] = 'Product';
        $data['images'] = $this->admin_model->getProductListImage($id);
        $data['hover_image'] = $this->admin_model->getProductHoverImage($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/product-add-image', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function delete_product($id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->doDeleteproduct($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Product Deleted Sucessfully', 'url' => base_url('admin/product')]));
            return FALSE;
        }
    }

    public function doUploadListImage($id) {
        $this->output->set_content_type('application/json');
        $this->load->library('upload');
        $count = count($_FILES['list_image']['size']);
        foreach ($_FILES as $key => $value) {
            for ($s = 0; $s < $count; $s++) {
                $_FILES['list_image']['name'] = $value['name'][$s];
                $_FILES['list_image']['type'] = $value['type'][$s];
                $_FILES['list_image']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['list_image']['error'] = $value['error'][$s];
                $_FILES['list_image']['size'] = $value['size'][$s];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('list_image');
                $upload_data = $this->upload->data();
                $this->admin_model->addProductListImages($id, $upload_data['file_name']);
                $resize_conf = array(
                    'upload_path' => realpath('./uploads/product/'),
                    'source_image' => $upload_data['full_path'],
                    'new_image' => './uploads/product/' . $upload_data['file_name'],
                    'create_thumb' => FALSE,
                    'maintain_ratio' => TRUE,
                    'quality' => '50%',
                    'width' => '700',
                    'height' => '1030'
                );
                $this->load->library('image_lib');
                $this->image_lib->initialize($resize_conf);
                $this->image_lib->resize();
                unlink($upload_data['file_path'] . '/' . $upload_data['file_name']);
            }
        }
        $this->output->set_output(json_encode(['result' => 1, 'url' => base_url('admin/add-product-image/' . $id)]));
        return FALSE;
    }

    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/product/thumb';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '204800';
        $config['overwrite'] = FALSE;
        $config['file_name'] = rand(11111, 99999);

        return $config;
    }

    public function deleteImage($image_id, $product_id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->deleteImage($image_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Image Deleted Sucessfully', 'url' => base_url('admin/add-product-image/' . $product_id)]));
            return FALSE;
        }
    }

    public function add_product_stock($id) {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['product_id'] = $id;
        $data['title'] = 'Product';
        $data['stock'] = $this->admin_model->getStockById($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/product-add-stock', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doEditStock($stock_id, $product_id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('small_slim', 'Slim', 'numeric');
        $this->form_validation->set_rules('small_regular', 'Regular', 'numeric');
        $this->form_validation->set_rules('medium_slim', 'Slim', 'numeric');
        $this->form_validation->set_rules('medium_regular', 'Regular', 'numeric');
        $this->form_validation->set_rules('large_slim', 'Slim', 'numeric');
        $this->form_validation->set_rules('large_regular', 'Regular', 'numeric');
        $this->form_validation->set_rules('xl_slim', 'Slim', 'numeric');
        $this->form_validation->set_rules('xl_regular', 'Regular', 'numeric');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditStock($stock_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Stock Updated sucessfully', 'url' => base_url('admin/add-product-stock/' . $product_id)]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Stock upto date']));
            return FALSE;
        }
    }

    public function limitedStock() {
        $data['limitedstocks'] = $this->admin_model->showLimitedStock();
        $data['title'] = 'Product';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/limited-stock', $data);
        $this->load->view('admin/commons/footer', $data);
    }

}
