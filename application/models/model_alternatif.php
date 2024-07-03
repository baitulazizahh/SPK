<?php 

class Model_alternatif extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tb_alternatif');
    }

    public function input_data($data){
        return $this->db->insert('alternatif', $data);
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