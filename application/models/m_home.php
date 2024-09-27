<?php 

class M_home extends CI_Model{
    public function total_user(){
        return $this->db->count_all('tb_user');
    }

    public function total_kriteria(){
        return $this->db->count_all('tb_kriteria');
    }

    public function total_permohonan(){
        return $this->db->count_all('tb_permohonan');
    }
    public function total_penilaian(){
        $this->db->select('COUNT(DISTINCT id_permohonan) as total'); 
        $query = $this->db->get('tb_penilaian');
    
        // Mengembalikan hasil sebagai integer
        return $query->row()->total;
    }
}
?>