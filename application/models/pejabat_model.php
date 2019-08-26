<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pejabat_model extends CI_Model
{
    private $_table = "table_pejabat";

    public $id;
    public $nama;
    public $jabatan;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'jabatan',
            'rules' => 'required']
        ];
    }


public function getAll()
{
    return $this->db->get($this->_table)->result();
}

public function getById($id)
{
    return $this->db->get_where($this->_table, ["id" => $id])->row();
}

public function save()
{
    $post = $this->input->post();
    $this->id = uniqid("AUTO_INCREMENT");
    $this->nama = $post["nama"];
    $this->jabatan = $post["jabatan"];
    $this->db->insert($this->_table, $this);
}

public function update()
{
    $post = $this->input->post();
    $this->id = $post["id"];
    $this->nama = $post["nama"];
    $this->jabatan = $post["jabatan"];
    $this->db->update($this->_table, $this, array('id' => $post['id']));
}

public function delete($id)
{
    return $this->db->delete($this->_table, array("id" => $id));
}
}