<?php

/**
 * Description of Order
 *
 * @author Mohit Kant Gupta
 */
class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['admin_model', 'abkasa_model']);
    }

    private function isLogin() {
        return $this->session->userdata('email');
    }

    public function index() {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['script'] = 1;
        $data['title'] = 'Order';
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/order-list', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function order_detail($order_id) {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['script'] = 1;
        $data['title'] = 'Order';
        $data['order'] = $order = $this->admin_model->getorderById($order_id);
        $data['total'] = $this->getIndianCurrency($order['total']);
        $data['ordered_products'] = $this->admin_model->getOrderedProducts($order_id);
        $data['coupon'] = $this->admin_model->getCouponByOrderId($order_id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/order-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function invoice($order_id) {
        $this->load->helper('pdf_helper');
        $data['order'] = $order = $this->admin_model->getorderById($order_id);
        $data['total'] = $this->getIndianCurrency($order['total']);
        $data['ordered_products'] = $this->admin_model->getOrderedProducts($order_id);
        $data['coupon'] = $this->admin_model->getCouponByOrderId($order_id);
        $this->load->view('admin/invoice', $data);
    }

    public function getIndianCurrency($number) {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else {
                $str[] = null;
            }
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return $Rupees . $paise;
    }

    public function sendOrderSms($order_id) {
        $status = $this->input->post('status');
        $user = $this->admin_model->getUserByOrderId($order_id);
        $mobile = $user['mobile'];
        $message = '';
        if ($status == 'Processing') {
            $message = $this->admin_model->getProcessingSms();
        } else if ($status == 'Out_for_delivery') {
            $message = $this->admin_model->getOutForDeliverySms();
        } else if ($status == 'Delivered') {
            $message = $this->admin_model->getDeliveredSms();
        }
        $msg = $message['message'];
//        $url = "http://api.msg91.com/api/sendhttp.php?country=91&sender=ABKASA&route=4&mobiles=" . $mobile . "&authkey=257849Akn6hoGDG5c47130f&message=" . $msg;
//        file_get_contents($url);
        return 1;
    }

    public function changeOrderStatus($order_id) {
        $this->output->set_content_type('application/json');
        $this->sendOrderSms($order_id);
        $result = $this->admin_model->changeOrderStatus($order_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Status updated sucessfully!!']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Try Again']));
            return FALSE;
        }
    }

    public function cancelOrder($order_id) {
        $this->output->set_content_type('application/json');
        $ordered_product = $this->abkasa_model->get_ordered_product_id($order_id);
        foreach ($ordered_product as $product) {
            if ($product['status'] != 'Canceled') {
                $quan = $this->abkasa_model->getStockValueByProductId($product['product_id'], $product['size_type']);
                $quantity = $quan[$product['size_type']] + $product['quantity'];
                $this->abkasa_model->updateStockValue($product['product_id'], $product['size_type'], $quantity);
            }
        }
        $result = $this->abkasa_model->cancel_order($order_id);
        $user = $this->admin_model->getUserByOrderId($order_id);
        $mobile = $user['mobile'];
        $message = $this->admin_model->getCancelSms();
        $msg = $message['message'];
        $url = "http://api.msg91.com/api/sendhttp.php?country=91&sender=ABKASA&route=4&mobiles=" . $mobile . "&authkey=257849Akn6hoGDG5c47130f&message=" . $msg;
        file_get_contents($url);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Order Canceled sucessfully!!']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Try Again']));
            return FALSE;
        }
    }

    public function customer() {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['script'] = 1;
        $data['title'] = 'Customer';
        $data['customers'] = $this->admin_model->getCustomer();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/customer-list', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function single_customer($id) {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['title'] = 'Customer';
        $data['customer'] = $this->admin_model->getCustomerById($id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/single-customer', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function getOrderWrapper() {
        $this->output->set_content_type('application/json');
        $order_type = $this->input->post('order_type');
        if (!empty($order_type)) {
            $data['orders'] = $this->admin_model->getFilteredOrder($order_type);
        } else {
            $data['orders'] = $this->admin_model->getorder();
        }
        $order_list = $this->load->view('admin/include/order-list', $data, true);
        $this->output->set_output(json_encode(['order_list' => $order_list]));
        return FALSE;
    }

    public function change_ordered_status($order_id) {
        if (!$this->isLogin()) {
            redirect(base_url('admin'));
        }
        $data['script'] = 1;
        $data['title'] = 'Ordered Product Status';
        $data['order'] = $this->admin_model->getorderById($order_id);
        $data['ordered_products'] = $this->admin_model->getOrderedProducts($order_id);
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/ordered-product-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function changeOrderProductStatus($ordered_product_id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->changeOrderProductStatus($ordered_product_id);
        $product = $this->admin_model->getOrderedProductById($ordered_product_id);
        $quan = $this->abkasa_model->getStockValueByProductId($product['product_id'], $product['size_type']);
        $quantity = $quan[$product['size_type']] + $product['quantity'];
        $this->abkasa_model->updateStockValue($product['product_id'], $product['size_type'], $quantity);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Status updated sucessfully!!', 'url' => '1']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Try Again']));
            return FALSE;
        }
    }

    public function changeReplacingProductStatus($ordered_product_id) {
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->changeReplacingProductStatus($ordered_product_id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'Status updated sucessfully!!', 'url' => '1']));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'Try Again']));
            return FALSE;
        }
    }

}
