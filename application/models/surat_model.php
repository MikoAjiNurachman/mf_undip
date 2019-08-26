<?php defined('BASEPATH') OR exit('No direct script access allowed');

class surat_model extends CI_Model
{
    private $_table = "table_surat";

    public $no_surat;
    public $perihal;
    public $ditujukan;
    public $penerima;
    public $file_surat;

    public function rules()
    {
        return [
            ['field' => 'perihal',
            'label' => 'perihal',
            'rules' => 'required'],

            ['field' => 'ditujukan',
            'label' => 'ditujukan',
            'rules' => 'required'],
            
            ['field' => 'penerima',
            'label' => 'penerima',
            'rules' => 'required']
        ];
    }

    private function uploadFile()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'docx|pdf';
        $config['file_name']            = $this->no_surat;
        $config['overwrite']            = true;
    // $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file_surat')) {
        return $this->upload->data("file_name");
        }
        return "default.docx";
    }

     private function deleteFile($no_surat)
     {
            $surat = $this->getById($no_surat);
    if ($surat->file_surat != "default.docx") {
        $filename = explode(".", $surat->file_surat)[0];
        return array_map('unlink', glob(FCPATH."upload/$filename.*"));
    }
     }

public function getAll()
{
    return $this->db->get($this->_table)->result();
}

public function getById($no_surat)
{
    return $this->db->get_where($this->_table, ["no_surat" => $no_surat])->row();
}

public function save()
{
    $post = $this->input->post();
    $this->no_surat = uniqid("AUTO_INCREMENT");
    $this->perihal = $post["perihal"];
    $this->ditujukan = $post["ditujukan"];
    $this->penerima = $post["penerima"];
    $this->file_surat = $this->uploadFile();
    $this->db->insert($this->_table, $this);
}

public function update()
{
    $post = $this->input->post();
    $this->no_surat = $post["no_surat"];
    $this->perihal = $post["perihal"];
    $this->ditujukan = $post["ditujukan"];
    $this->penerima = $post["penerima"];
    if (!empty($_FILES['file_surat']['name'])) {
        $this->file_surat = $this->uploadFile();
    }
    else {
        $this->file_surat = $post["old_file"];
    }
    $this->db->update($this->_table, $this, array('no_surat' => $post['no_surat']));
}

public function deleteUnSRC($no_surat)
{
    return $this->db->delete($this->_table, array("no_surat" => $no_surat));
}

public function delete($no_surat)
{
    $this->deleteFile($no_surat);
    return $this->db->delete($this->_table, array("no_surat" => $no_surat));
}
}