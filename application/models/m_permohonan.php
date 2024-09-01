<?php 

class M_permohonan extends CI_Model{
    public function tampil_data(){
        $this->db->select('tb_user.id_user, tb_permohonan.*');
        $this->db->from('tb_permohonan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_permohonan.id_user');
        return $this->db->get()->result();
   
    }

    public function getRoles() {
        $query= $this->db->get('tb_role');
        return $query->result(); // Mengambil semua data role
    }
   
    public function input_data($data){
        return $this->db->insert('tb_user', $data);
     }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_data($where, $data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    public function getUser($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tb_user');
        return $query->row(); // Mengembalikan satu baris data
    }

    public function update_profil($where, $data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
 
}
?>