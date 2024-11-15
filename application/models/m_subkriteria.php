<?php 

class M_subkriteria extends CI_Model{
  
        public function get_all_kriteria() {
            return $this->db->get('tb_kriteria')->result();
        }
    
        public function get_all_subkriteria() {
            return $this->db->get('tb_subkriteria')->result();
        }
        
        public function get_subkriteria_by_kriteria($id_kriteria) {
            $this->db->where('id_kriteria', $id_kriteria);
            return $this->db->get('tb_subkriteria')->result();
        }

        public function get_all_subkriteria_grouped() {
            $result = $this->db->get('tb_subkriteria')->result();
            $grouped = [];
            foreach ($result as $sub) {
                $grouped[$sub->id_kriteria][] = $sub;
            }
            return $grouped;
        }

        public function input_data($data, $table) {
            $this->db->insert($table, $data);
        }
        public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function update_data($id_subkriteria, $data) {
            $this->db->where('id_subkriteria', $id_subkriteria);
            return $this->db->update('tb_subkriteria', $data);
        }

        public function getSubkriteriaByNama($nama_kriteria)
        {
            $this->db->select('*');
            $this->db->from('tb_subkriteria');
            $this->db->join('tb_kriteria', 'tb_subkriteria.id_kriteria = tb_kriteria.id');
            $this->db->where('tb_kriteria.nama_kriteria', $nama_kriteria);
            $query = $this->db->get();
            return $query->result();
        }

        public function get_by_kriteria_and_nilai($id_kriteria, $nilai) {
            $this->db->where('id_kriteria', $id_kriteria);
            $this->db->where('nama_subkriteria', $nilai); // Misalkan nilai permohonan cocok dengan nama subkriteria
            return $this->db->get('tb_subkriteria')->row();
        }
        

        
    
}
?>