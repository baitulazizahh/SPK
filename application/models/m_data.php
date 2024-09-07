<?php 

class M_data extends CI_Model{
    public function tampil_data(){
        return $this->db->get('tb_kriteria')->result();
    }

    public function input_data($data){
        return $this->db->insert('tb_kriteria', $data);
     }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_data($where, $data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function getBobotKriteria() {
        $query = $this->db->get('tb_kriteria'); // Adjust the table name if necessary
        return $query->result_array(); // Return as associative array
    }
  
 
}
?>