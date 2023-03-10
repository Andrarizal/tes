<?php 

class Siswa_model extends CI_Model{
    public function tampil_data($table)
    {
        return $this->db->get($table);
    }
    public function ambil_id_siswa($id)
    {
        $hasil = $this->db->where('id',$id)->get('siswa');
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
        $this->db->like('nama_lengkap',$keyword);
        $this->db->or_like('nis',$keyword);
        $this->db->or_like('nama_kelas',$keyword);
        $this->db->or_like('alamat',$keyword);
        return $this->db->get('siswa')->result();
    }

    public function listSiswaWhrNip($kode)
        {
            // buat query join guru nip
            
            $this->db->select('siswa.*, kelas.nama_kelas as nama');
            $this->db->from('siswa');
            $this->db->join('kelas','siswa.nama_kelas=kelas.nama_kelas');
            $this->db->join('guru','guru.nama_guru=kelas.nama_wali');
            $this->db->where('guru.nama_guru', $kode);
            $query = $this->db->get();
            return $query->result();
        }

        // make function listSiswa to get data from siswa table
    public function listSiswa()
    {
        $this->db->select('siswa.*, kelas.nama_kelas as nama');
        $this->db->from('siswa');
        $this->db->join('kelas','siswa.nama_kelas=kelas.nama_kelas');
        $query = $this->db->get();
        return $query->result();
    }

    public function import_csv($data)
{
    foreach ($data as $row) {
        $siswa = array(
            'nis' => $row['nis'],
            'nama_lengkap' => $row['nama_lengkap'],
            'alamat' => $row['alamat'],
            'telepon' => $row['telepon'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => date('Y-m-d', strtotime($row['tanggal_lahir'])),
            'jenis_kelamin' => $row['jenis_kelamin'],
            'id_kelas' => $row['id_kelas']
        );
        $this->db->insert('siswa', $siswa);
    }
}

public function getData() {
    $this->db->select('nis, nama_lengkap, alamat, telepon, tempat_lahir, tanggal_lahir, jenis_kelamin, nama_kelas, photo');
    $this->db->from('siswa');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function insert_siswa($data) 
  {
    $this->db->insert('siswa', $data);
  }

//  make function get_all_image from database
public function get_all_image()
{
    $this->db->select('*');
    $this->db->from('siswa');
    $query = $this->db->get();
    return $query->result();
}

        

}
