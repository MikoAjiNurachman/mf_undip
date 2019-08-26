<?php defined('BASEPATH') OR exit('No direct script access allowed');

class arsip_model extends CI_Model
{
    private $_table = "table_arsip";

     private function deleteFile($id_arsip)
     {
            $surat = $this->getById($id_arsip);
    if ($surat->file_surat != "default.docx") {
        $filename = explode(".", $surat->file_surat)[0];
        return array_map('unlink', glob(FCPATH."upload/$filename.*"));
    }
     }

public function getAll()
{
    return $this->db->get($this->_table)->result();
}

public function getById($id_arsip)
{
    return $this->db->get_where($this->_table, ["id_arsip" => $id_arsip])->row();
}

public function delete($id_arsip)
{
    $this->deleteFile($id_arsip);
    return $this->db->delete($this->_table, array("id_arsip" => $id_arsip));
}
}