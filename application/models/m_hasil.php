<?php 

class M_hasil extends CI_Model{
    public function tampil_data(){
        $this->db->select('tb_hasil.nilai, tb_alternatif.nama_alternatif');
        $this->db->from('tb_hasil');
        $this->db->join('tb_alternatif', 'tb_hasil.id_alternatif = tb_alternatif.id_alternatif');
        $this->db->order_by('tb_hasil.nilai', 'DESC');
        return $this->db->get()->result();
    }
}
?>