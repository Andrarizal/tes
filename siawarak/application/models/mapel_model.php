<?php 

class Mapel_model extends CI_model{ 
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function ambil_kode_mapel($kode)
    {
        $result = $this->db->where('kode_mapel', $kode)->get('mapel');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
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
    public function listMapel()
	{
		$query=$this->db->query("SELECT * FROM mapel");
		return $query->result();
	}
    public function search($keyword)
    {
        $this->db->like('nama_mapel',$keyword);
        $this->db->or_like('kode_mapel',$keyword);
        return $this->db->get('mapel')->result();
    }
}

