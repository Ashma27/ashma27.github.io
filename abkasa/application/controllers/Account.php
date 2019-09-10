<?php

/**
 * Description of Account
 *
 * @author Mohit Kant Gupta
 */
class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->isLogin()) {
            redirect(base_url('abkasa'));
        }
        $this->load->model(['abkasa_model', 'admin_model']);
        $this->load->library('facebook');
    }

    private function isLogin() {
        return $this->session->userdata('user_email');
    }

    public function getClientDetail() {
        $client = $this->abkasa_model->getClientDetail($this->isLogin());
        return $client;
    }

    public function getOrderedProduct() {
        $orders = $this->abkasa_model->getOrderByClientEmail($this->isLogin());
        $list = [];
        foreach ($orders as $order) {
            $list[] = array('order_id' => $order['order_id'],
                'total' => $order['total'],
                'sub_total' => $order['sub_total'],
                'date' => $order['date'],
                'payment_mode' => $order['payment_mode'],
                'status' => $order['status'],
                'order_status' => $order['order_status'],
                'ordered_products' => $this->abkasa_model->getOrderedProducts($order['order_id']),
                'coupon' => $this->admin_model->getCouponByOrderId($order['order_id'])
            );
        }
        return $list;
    }

    public function index() {
        $data['title'] = Title . '| Account';
        $data['account'] = '1';
        $data['client'] = $this->getClientDetail();
        $data['orders'] = $this->getOrderedProduct();
        $data['sub_categories'] = $this->admin_model->getAllSubCategory();
        $this->load->view('abkasa/my-account', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function cancel_order_model($order_id) {
        $this->output->set_content_type('application/json');
        $data['ordered_product'] = $this->abkasa_model->getOrderedProducts($order_id);
        $ordered_product = $this->load->view('abkasa/include/cancel-order', $data, TRUE);
        $this->output->set_output(json_encode(['ordered_product_list' => $ordered_product]));
        return FALSE;
    }

    public function doCancelOrderedProduct($ordered_product_id) {
        $this->output->set_content_type('application/json');
        $product = $this->abkasa_model->doCancelOrderedProduct($ordered_product_id);
        $quan = $this->abkasa_model->getStockValueByProductId($product['product_id'], $product['size_type']);
        $quantity = $quan[$product['size_type']] + $product['quantity'];
        $this->abkasa_model->updateStockValue($product['product_id'], $product['size_type'], $quantity);
        $this->output->set_output(json_encode(['result' => 1]));
        return FALSE;
    }

    public function returnProduct($order_id) {
        $data['title'] = Title . '| Return/Replace Product';
        $data['account'] = '1';
        $data['client'] = $this->getClientDetail();
        $data['orders'] = $this->getOrderedProduct();
        $data['sub_categories'] = $this->admin_model->getAllSubCategory();
        $data['ordered_product'] = $this->abkasa_model->getOrderedProducts($order_id);
        $this->load->view('abkasa/commons/header', $data);
        $this->load->view('abkasa/replace-product', $data);
        $this->load->view('abkasa/commons/footer', $data);
    }

    public function doReturnProduct($ordered_product_id, $order_id) {
        $this->output->set_content_type('application/json');
        $result = $this->abkasa_model->doReturnProduct($ordered_product_id, $order_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Some thing went wrong. Please try again.']));
            return FALSE;
        }
    }

    public function replaceProduct($product_id, $order_product_id, $order_id) {
        $this->output->set_content_type('application/json');
        $data['stock'] = $this->admin_model->getStockById($product_id);
        $data['order_product_id'] = $order_product_id;
        $data['order_id'] = $order_id;
        $stock_list = $this->load->view('abkasa/product-modal', $data, TRUE);
        $this->output->set_output(json_encode(['stock_list' => $stock_list]));
        return FALSE;
    }

    public function doReplaceProduct() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('size', 'Size', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => 'Please Select the size that you want to replace']));
            return FALSE;
        }
        $res=$this->abkasa_model->checkStock($this->input->post('size'));
        if(!$res){
            $this->output->set_output(json_encode(['result' => 0, 'errors' => 'Limited stock available for the size']));
            return FALSE;
        }
        $result = $this->abkasa_model->doReplaceProduct();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'error' => 'Please Select another size you already have this one']));
            return FALSE;
        }
    }

    public function cancel_order($order_id) {
        $ordered_product = $this->abkasa_model->get_ordered_product_id($order_id);
        foreach ($ordered_product as $product) {
            if ($product['status'] != 'Canceled') {
                $quan = $this->abkasa_model->getStockValueByProductId($product['product_id'], $product['size_type']);
                $quantity = $quan[$product['size_type']] + $product['quantity'];
                $this->abkasa_model->updateStockValue($product['product_id'], $product['size_type'], $quantity);
            }
        }
        $this->abkasa_model->cancel_order($order_id);
        redirect(base_url('account'));
    }

    public function updateAddress() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('pincode', 'Pincode', 'required');
        $this->abkasa_model->updateAddress($this->session->userdata('user_email'));
        redirect(base_url('Account'));
    }

}
