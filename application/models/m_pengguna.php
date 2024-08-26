<?php 

class M_pengguna extends CI_Model{
    public function tampil_data(){
        $this->db->select('tb_role.role, tb_user.id_role, tb_user.nama, tb_user.email');
        $this->db->from('tb_user');
        $this->db->join('tb_role', 'tb_role.id_role = tb_user.id_role');
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
 
}
?>