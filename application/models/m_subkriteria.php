<?php 

class M_subkriteria extends CI_Model{
  


        public function get_all_kriteria() {
            return $this->db->get('tb_kriteria')->result();
        }
    
        public function get_all_subkriteria() {
            return $this->db->get('tb_subkriteria')->result();
        }
    
        public function input_data($data, $table) {
            $this->db->insert($table, $data);
        }
        public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
    
}
?>