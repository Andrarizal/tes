<?php

class Jadwal_model extends CI_model{

    public $table = 'jadwal';
    public $id = 'kode_jadwal';

    public function insert($data)
	{
		$this->db->insert('jadwal', $data);
        
	}

    public function get_by_id($id)
    {
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function update($data, $kode_kls, $kode_jadwal)
    {
        $this->db->set($data);
        $this->db->where('kode_kls', $kode_kls);
		$this->db->where('kode_jadwal', $kode_jadwal);
		$this->db->update('jadwal', $data);
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
    public function listJadwal()
	{
        
		// $this->db->select('jadwal.*, mapel.nama as nm, kelas.nama as nam, guru.nama as nmg, guru.nip as nip');
        // $this->db->from('jadwal');
        // $this->db->join('kelas','jadwal.kode_kelas=kelas.kode');
        // $this->db->join('mapel','jadwal.kode_mp=mapel.kode');
        // $this->db->join('guru','guru.kode_mp=mapel.kode');
        // $query = $this->db->get();
        // return $query->result();

		// SELECT * FROM `jadwal`
		// INNER JOIN kelas
    	// ON jadwal.kode_kelas = kelas.kode
    
    	// INNER JOIN guru
    	// ON guru.kode_kelas = kelas.kode

		$this->db->select('kelas.nama_kelas as nama, guru.nama_guru as namguru, guru.nip as nip, jadwal.*');
		$this->db->from('jadwal');
		$this->db->join('kelas','jadwal.kode_kelas=kelas.kode_kelas');
		$this->db->join('guru','guru.nama_kelas=kelas.nama_kelas');
		$query = $this->db->get();
        return $query->result();
	}
    public function tampil_data()
    {
       return $this->db->get('kelas');
    }
    public function getJadwalWhereId($where)
	{
		$this->db->select('jadwal.*, mapel.nama_mapel as mapel, semester.nama_semester as semester, kelas.nama_kelas as kelas');
        $this->db->from('jadwal');
        $this->db->join('mapel','jadwal.kode_mp=mapel.kode_mapel');
        $this->db->join('semester','jadwal.kode_smt=semester.kode_semester');
        $this->db->join('kelas','jadwal.kode_kls=kelas.kode_kelas');
        $this->db->where('jadwal.kode_kls', $where);
        $query = $this->db->get();
        return $query->result();
	}
    // make function getJadwal(kode_jadwal) to get data from database
    public function getJadwal($kode_jadwal)
    {
        $this->db->select('jadwal.*');
        $this->db->from('jadwal');
        $this->db->where('jadwal.kode_jadwal', $kode_jadwal);
        $query = $this->db->get();
        if($query->num_rows()>0){
            		foreach ($query->result() as $value) {
            			$data=array(
                            'kode_jadwal' => $value->kode_jadwal,       
            				'kode_mp' => $value->kode_mp,
            				'kode_kls' => $value->kode_kls,
            				'kode_smt' => $value->kode_smt,
            				'hari' => $value->hari,
            				'waktu_awal' => $value->waktu_awal,
                            'waktu_akhir' => $value->waktu_akhir,
        
            			);
            		}
            	}
        return $data;
    }
    
    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->like('kode_jadwal',$keyword);
        $this->db->or_like('kode_mp',$keyword);
        $this->db->or_like('kode_kls',$keyword);
        $this->db->or_like('kode_smt',$keyword);
        $this->db->or_like('hari',$keyword);
        $this->db->or_like('waktu_awal',$keyword);
        $this->db->or_like('waktu_akhir',$keyword);
        return $this->db->get()->result();
    }
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

}