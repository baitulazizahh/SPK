<?php 

class M_penilaian extends CI_Model{

    
    public function tampil_data() {
        // $this->db->select('id, nama_alternatif'); // Pastikan untuk memilih id
        // $query = $this->db->get('penilaian');
        // return $query->result();  
        $this->db->select('tb_alternatif.id as id_penilaian, tb_alternatif.nama_alternatif');
        $this->db->from('tb_alternatif');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_penilaian() {
        $this->db->select('id, id_alternatif'); // Pastikan untuk memilih id
        $query = $this->db->get('penilaian');
        return $query->result();
    }
    // Contoh fungsi di model
        public function get_all_subkriteria_grouped() {
            $result = $this->db->get('tb_subkriteria')->result();
            $grouped = [];
            foreach ($result as $sub) {
                $grouped[$sub->id_kriteria][] = $sub;
            }
            return $grouped;
        }

        public function get_kriteria() {
            $query = $this->db->get('tb_kriteria');
            return $query->result();
        }
    
        public function get_subkriteria() {
            $query = $this->db->get('tb_subkriteria');
            return $query->result();
        }
    
        public function get_alternatif() {
            $query = $this->db->get('tb_alternatif');
            return $query->result();
        }
        
    public function insert($data) {
        $this->db->insert('tb_penilaian', $data); // ganti 'tabel_perhitungan' dengan nama tabel Anda
    }

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