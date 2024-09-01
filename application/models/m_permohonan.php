<?php 

class M_permohonan extends CI_Model{
    public function tampil_data(){
        $this->db->select('tb_user.id_user, tb_permohonan.*');
        $this->db->from('tb_permohonan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_permohonan.id_user');
        return $this->db->get()->result();
   
    }
    // public function getPermohonan($id_permohonan) {
    //     $this->db->where('id_permohonan', $id_permohonan);
    //     $query = $this->db->get('tb_permohonan');
    //     return $query->result();
    // }
    

    public function getRoles() {
        $query= $this->db->get('tb_role');
        return $query->result(); // Mengambil semua data role
    }
   
    public function input_data($data){
        return $this->db->insert('tb_permohonan', $data);
     }

  
 
}
?>