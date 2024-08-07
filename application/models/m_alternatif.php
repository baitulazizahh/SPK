<?php 

class M_alternatif extends CI_Model{
    public function tampil_data(){
        // return $this->db->get('tb_alternatif');
        $query = $this->db->get('tb_alternatif');
    return $query->result(); 
    }

    public function input_data($data){
        return $this->db->insert('tb_alternatif', $data);
     }

    public function hapus_data($where, $table){
       
        $this->db->delete($table,$where,);
    }
    public function update_data($where, $data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
 
}
?>