<?php

class User_model extends CI_Model{
    public $table = 'users';
    public $id = 'id'; 

    public function ambil_data($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }
    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
    public function search($keyword)
    {
        $this->db->like('username',$keyword);
        $this->db->or_like('password',$keyword);
        $this->db->or_like('level',$keyword);
        return $this->db->get('user')->result();
    }
}