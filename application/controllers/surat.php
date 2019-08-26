<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("surat_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["table_surat"] = $this->surat_model->getAll();
        $this->load->view("surat/list", $data);
    }

    public function add()
    {
        $surat = $this->surat_model;
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("surat/new_form");
    }

    public function edit($no_surat = null)
    {
        if (!isset($no_surat)) redirect('surat');
       
        $surat = $this->surat_model;
        $validation = $this->form_validation;
        $validation->set_rules($surat->rules());

        if ($validation->run()) {
            $surat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["table_surat"] = $surat->getById($no_surat);
        if (!$data["table_surat"]) show_404();
        
        $this->load->view("surat/edit_form", $data);
    }

    public function delete($no_surat=null)
    {
        if (!isset($no_surat)) show_404();
        
        if ($this->surat_model->delete($no_surat)) {
            redirect(site_url('surat'));
        }
    }
    public function arsip($no_surat=null)
    {
        $simpan =  $this->db->get_where('table_surat',["no_surat" => $no_surat])->row();
        if ($this->db->insert('table_arsip',$simpan)) {
            $this->surat_model->deleteUnSRC($no_surat);
            redirect(base_url('surat'));
        }
    }
}