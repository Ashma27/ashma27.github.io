<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sms
 *
 * @author Mohit Kant Gupta
 */
class Sms extends CI_Controller {

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
        $data['title'] = 'SMS';
        $data['smss'] = $this->admin_model->getAllSms();
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/sms-view', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function add_sms($id=null) {
        $data['script'] = 1;
        $data['title'] = 'SMS';
        if(!empty($id)){
            $data['sms']= $this->admin_model->getSmsById($id);
        }
        $this->load->view('admin/commons/header', $data);
        $this->load->view('admin/commons/navbar', $data);
        $this->load->view('admin/sms-add', $data);
        $this->load->view('admin/commons/footer', $data);
    }

    public function doAddSms() {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doAddSms();
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'SMS added sucessfully', 'url' => base_url('admin/sms')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'SMS did not added sucessfully.']));
            return FALSE;
        }
    }
    
    public function doEditSms($id) {
        $this->output->set_content_type('application/json');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->output->set_output(json_encode(['result' => 0, 'errors' => $this->form_validation->error_array()]));
            return FALSE;
        }
        $result = $this->admin_model->doEditSms($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'SMS Edited sucessfully', 'url' => base_url('admin/sms')]));
            return FALSE;
        } else {
            $this->output->set_output(json_encode(['result' => -1, 'msg' => 'No changes were made.']));
            return FALSE;
        }
    }
    
    public function doDeleteSms($id){
        $this->output->set_content_type('application/json');
        $result = $this->admin_model->doDeleteSms($id);
        if ($result) {
            $this->output->set_output(json_encode(['result' => 1, 'msg' => 'SMS Deleted Sucessfully', 'url' => base_url('admin/sms')]));
            return FALSE;
        }
    }

}
