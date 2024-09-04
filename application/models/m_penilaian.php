<?php 

class M_penilaian extends CI_Model{

    public function get_penilaian_with_nama()
    {
        
        $this->db->select('tb_user.nama, tb_penilaian.id_kriteria, tb_penilaian.nilai, tb_subkriteria.nama_subkriteria, tb_penilaian.id_permohonan,
        
        MAX(CASE WHEN tb_penilaian.id_kriteria = 48 THEN tb_subkriteria.nama_subkriteria END) AS c1,
        MAX(CASE WHEN tb_penilaian.id_kriteria = 49 THEN tb_subkriteria.nama_subkriteria END) AS c2,
        MAX(CASE WHEN tb_penilaian.id_kriteria = 50 THEN tb_subkriteria.nama_subkriteria END) AS c3,
        MAX(CASE WHEN tb_penilaian.id_kriteria = 51 THEN tb_subkriteria.nama_subkriteria END) AS c4,
        MAX(CASE WHEN tb_penilaian.id_kriteria = 52 THEN tb_subkriteria.nama_subkriteria END) AS c5,
        MAX(CASE WHEN tb_penilaian.id_kriteria = 56 THEN tb_subkriteria.nama_subkriteria END) AS c6');

        $this->db->from('tb_penilaian');
        // Join ke tb_permohonan untuk mendapatkan id_user
        $this->db->join('tb_permohonan', 'tb_permohonan.id_permohonan = tb_penilaian.id_permohonan');
        // Join ke tb_user untuk mendapatkan nama berdasarkan id_user
        $this->db->join('tb_user', 'tb_user.id_user = tb_permohonan.id_user');
        $this->db->join('tb_subkriteria', 'tb_subkriteria.id_subkriteria = tb_penilaian.id_subkriteria');

        $this->db->order_by('tb_penilaian.created_at', 'DESC');
        $this->db->group_by('tb_user.nama');
        $query = $this->db->get();
        return $query->result();
    }


 
   
      
}
?>