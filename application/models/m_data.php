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
    public function get_last_kriteria_id()
    {
        // Query untuk mendapatkan id_kriteria terbesar
        $this->db->select('id');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_kriteria');
        
        return $query->row();
    }

  
 
}
?>