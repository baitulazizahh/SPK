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
    
    public function update_data($where, $data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
        return $query->result();
    }
      
}
?>