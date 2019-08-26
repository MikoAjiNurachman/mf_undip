<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pejabat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pejabat_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["table_pejabat"] = $this->pejabat_model->getAll();
        $this->load->view("pejabat/list", $data);
    }

    public function add()
    {
        $pejabat = $this->pejabat_model;
        $validation = $this->form_validation;
        $validation->set_rules($pejabat->rules());

        if ($validation->run()) {
            $pejabat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("pejabat/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('pejabat');
       
        $pejabat = $this->pejabat_model;
        $validation = $this->form_validation;
        $validation->set_rules($pejabat->rules());

        if ($validation->run()) {
            $pejabat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["table_pejabat"] = $pejabat->getById($id);
        if (!$data["table_pejabat"]) show_404();
        
        $this->load->view("pejabat/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pejabat_model->delete($id)) {
            redirect(site_url('pejabat'));
        }
    }
}