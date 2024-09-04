<?php 

class M_penilaian extends CI_Model{

    
    public function tampil_data() {
        $this->db->select('tb_alternatif.id_alternatif, tb_alternatif.nama_alternatif, tb_penilaian.*');
        $this->db->from('tb_alternatif');
        $this->db->join('tb_penilaian', 'tb_penilaian.id_alternatif = tb_alternatif.id_alternatif', 'left');
        return $this->db->get()->result();
      
    }
    public function insert($data) {
        $this->db->insert('tb_penilaian', $data); // ganti 'tabel_perhitungan' dengan nama tabel Anda
    }

     // Function untuk mengambil penilaian berdasarkan id_alternatif
     public function getPenilaianByAlternatif($id_alternatif) {
        $this->db->where('id_alternatif', $id_alternatif);
        return $this->db->get('tb_penilaian')->result();
    }


 
   
      
}
?>