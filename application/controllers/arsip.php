<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("arsip_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["table_arsip"] = $this->arsip_model->getAll();
        $this->load->view("arsip/list", $data);
    }

    public function delete($id_arsip=null)
    {
        if (!isset($id_arsip)) show_404();
        
        if ($this->arsip_model->delete($id_arsip)) {
            redirect(site_url('arsip'));
        }
    }
}