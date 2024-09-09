<?php 

class M_hasil extends CI_Model{
    public function tampil_data(){
        $this->db->select('tb_hasil.*, tb_penilaian.id_permohonan, tb_user.nama');
        $this->db->from('tb_hasil');
        $this->db->join('tb_penilaian', 'tb_hasil.id_permohonan = tb_penilaian.id_permohonan');
        $this->db->join('tb_permohonan', 'tb_penilaian.id_permohonan = tb_permohonan.id_permohonan');
        $this->db->join('tb_user', 'tb_permohonan.id_user = tb_user.id_user');
        $this->db->order_by('tb_hasil.hasil', 'DESC');
        $this->db->group_by('tb_user.nama');
        return $this->db->get()->result();
    }

    public function insertHasil($data) {
        $this->db->insert('tb_hasil', $data);
    }
}
?>