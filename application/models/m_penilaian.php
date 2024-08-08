<?php 

class M_penilaian extends CI_Model{

    
    public function tampil_data() {
      
        $this->db->select('id_alternatif, nama_alternatif'); 
        $query = $this->db->get('tb_alternatif');
        return $query->result();

    }

    public function insert($data) {
        $this->db->insert('tb_penilaian', $data); // ganti 'tabel_perhitungan' dengan nama tabel Anda
    }
    
    public function get_penilaian(){
        $this->db->select('*');
    $this->db->from('tb_penilaian'); // pastikan nama tabel sesuai
    $query = $this->db->get();
    return $query->result(); // pastikan hasil query ada dan tidak kosong
        // $this->db->select('alternatif.nama_alternatif, penilaian.c1, penilaian.c2, penilaian.c3, penilaian,c4, penilaian.c5, penilaian.c6');
        // $this->db->from('tb_alternatif as alternatif');
        // $this->db->join('tb_penilaian as penilaian', 'alternatif.id_alternatif = penilaian.id_alternatif');
        // $query= $this->db->get();
        // return $query->result();
    }    
      
}
?>