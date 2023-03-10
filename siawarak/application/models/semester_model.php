<?php 

class Semester_model extends CI_model{
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
    public function listSemester()
	{
		$query=$this->db->query("SELECT * FROM semester");
		return $query->result();
	}

    public $table ='semester';
    public $id ='id_thn_akad';
    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }
    
    // function to search data in semester table
    public function search($keyword)
    {
        $this->db->like('kode_semester',$keyword);
        $this->db->or_like('nama_semester',$keyword);
        return $this->db->get('semester')->result();
    }
}

