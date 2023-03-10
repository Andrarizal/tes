<?php 
class Kelas_model extends CI_Model{
    public function tampil_data()
    {
       return $this->db->get('kelas');
    }
    public function input_data($data)
    {
        $this->db->insert('kelas', $data);
    }
    public function edit_data($where,$table)
    {
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

    public $table ='kelas';
    public $id ='nama_kelas';
    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function search($keyword)
    {
        $this->db->like('nama_kelas',$keyword);
        $this->db->or_like('nama_wali',$keyword);
        $this->db->or_like('kode_kelas',$keyword);
        return $this->db->get('kelas')->result();
    } 

    // function listKelas() to get all data from kelas table
    // public function listKelas()
    // {
    //     $query=$this->db->query("SELECT * FROM kelas");
    //     return $query->result();
    // }
    public function listKelas()
	{
		$this->db->select("kelas.nama_kelas as nama_kelas, kelas.nama_wali as nama_guru, guru.nip as nip_wali, kelas.kode_kelas as kode_kelas");
		$this->db->from('kelas');
		$this->db->join('guru','kelas.nama_kelas=guru.pengampu');
        $this->db->order_by('kelas.nama_kelas','ASC');
		$query = $this->db->get();
        return $query->result();
		$query=$this->db->query("SELECT * FROM kelas");
		return $query->result();
	}

 }
