<?php 

class M_penilaian extends CI_Model{

    public function tampil_data() {
        
            $this->db->select('tb_penilaian.*, tb_alternatif.nama_alternatif');
            $this->db->from('tb_penilaian');
            $this->db->join('tb_alternatif', 'tb_penilaian.id = tb_alternatif.id'); // Pastikan kolom yang dijoin sesuai
            $query = $this->db->get();
            return $query;
        
  
    }

    


    // public function input_data($data){
    //      return $this->db->insert('tb_penilaian', $data);
    //  }

    //  public function hapus_data($data){
    //     $this->db->where('id_penilaian', $id_penilaian['id_penilaian']);
    //     $this->db->delete($data);
    // }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    // public function update_data($where, $data,$table){
    //     $this->db->where($where);
    //     $this->db->update($table, $data);
    // }
 
}
?>