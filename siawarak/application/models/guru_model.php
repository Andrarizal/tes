<?php 

class Guru_model extends CI_Model
{
    public $table = 'Guru';
    public $id = 'nip';
    public $order = 'DESC';

    public function tampil_data($table)
    {
        return $this->db->get($table);
    }
    public function tampil_guru($table)
    {
       return $this->db->get($table);
    }
    public function ambil_id_guru($id)
    {
        $hasil = $this->db->where('nip',$id)->get('guru');
        if($hasil->num_rows() > 0) {
            return $hasil->result();
        }else{
            return false;
        }
    }
    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function edit_data($where,$table)
    {
        return $this->db->get_where($table, $where);
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
    public function search($keyword)
    {
        $this->db->like('nama_guru',$keyword);
        $this->db->or_like('nip',$keyword);
        $this->db->or_like('pengampu',$keyword);
        $this->db->or_like('alamat',$keyword);
        return $this->db->get('guru')->result();
    }
}
