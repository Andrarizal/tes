<?php

class Presensi_model extends CI_model{
    public function search($keyword)
    {
        $this->db->like('nama_kelas',$keyword);
        $this->db->or_like('nama_wali',$keyword);
        $this->db->or_like('kode_kelas',$keyword);
        return $this->db->get('kelas')->result();
    } 

    public function listPresensi()
    {
        $this->db->select("presensi.id_presensi as id_presensi, presensi.nis as nis, siswa.nama_siswa as nama_siswa, presensi.tanggal as tanggal, presensi.keterangan as keterangan");
        $this->db->from('presensi');
        $this->db->join('siswa','presensi.nis=siswa.nis');
        $this->db->order_by('presensi.id_presensi','ASC');
        $query = $this->db->get();
        return $query->result();
        $query=$this->db->query("SELECT * FROM presensi");
        return $query->result();
    }
  
    public function get_presensi_by_nis($nis) {
        // Mengambil data presensi berdasarkan NIS siswa
        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->join('mapel','presensi.kode_mp=mapel.kode_mapel');
        $this->db->join('semester','presensi.kode_semester=semester.kode_semester');
        $this->db->join('tahun_akademik','presensi.kode_ta=tahun_akademik.kode_tahunakademik');
        $this->db->where('nis', $nis);
        $query = $this->db->get();

        // Mengembalikan data presensi dalam bentuk array of object
        return $query->result();
    }

    public function insertPresensi($data,$table)
    {
        $this->db->insert($table,$data);
    }

    // make function editPresensi to update data from presensi table where id_presensi
    public function get_presensi_by_id($id) {
        $this->db->where('id_presensi', $id);
        $query = $this->db->get('presensi');
        return $query->row();
    }

    public function getPresensi($id)
{
    $this->db->where('id_presensi', $id);
    $query = $this->db->get('presensi');

    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return null;
    }
}

// make function updatePresensi($where, $data, 'presensi')
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    // make function deletePresensi to delete data from presensi table where id_presensi
    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getData() {
        $this->db->select('*');
        $this->db->from('presensi');
        $query = $this->db->get();
        return $query->result_array();
      }


    
//     select `siswa`.`nis` as `nis_siswa`, `mapel`.`kode_mapel` as `kode_mapel`, `presensi`.`kode_mp` , `mapel`.`nama_mapel`, `tahun_akademik`.`kode_tahunakademik`, `presensi`.`pertemuan`, `presensi`.`tanggal`, `presensi`.`ijin`, `presensi`.`alpha`, `presensi`.`sakit`
// from `presensi`
// INNER join `siswa` on `presensi`.`nis`=`siswa`.`nis`
// INNER join `mapel` on `presensi`.`kode_mp`=`mapel`.`kode_mapel`
// inner join `semester` on `presensi`.`kode_semester`=`semester`.`kode_semester`
// inner join `tahun_akademik` on `presensi`.`kode_ta`=`tahun_akademik`.`kode_tahunakademik`
// where `presensi`.`nisn`;
}

