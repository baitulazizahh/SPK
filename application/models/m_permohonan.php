<?php 

class M_permohonan extends CI_Model{
    public function tampil_data(){
        $this->db->select('tb_user.id_user, tb_user.nama,tb_permohonan.*');
        $this->db->from('tb_permohonan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_permohonan.id_user');
        $this->db->order_by('tb_permohonan.date_created', 'DESC');
        return $this->db->get()->result();
    } 
 

    public function getPermohonan($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tb_permohonan');
        return $query->result(); 
    }

    public function getPermohonanbyID($id_permohonan) {
        $this->db->where('id_permohonan', $id_permohonan);
        $query = $this->db->get('tb_permohonan');
        return $query->result(); 
    }
    

    public function checkUserDuplicate($id_user, $created) {
        $this->db->where('id_user', $id_user);
        $this->db->where('created', $created);  
        $query = $this->db->get('tb_permohonan');
        
        if ($query->num_rows() > 0) {
            return true;  // Jika ada data, berarti sudah ada pengajuan pada periode ini
        } else {
            return false;  // Jika tidak ada data, berarti belum ada pengajuan
        }
    }

    public function getRoles() {
        $query= $this->db->get('tb_role');
        return $query->result(); // Mengambil semua data role
    }
   
    public function input_data($data){
        return $this->db->insert('tb_permohonan', $data); // insert permohonan
     }

     public function hapus_data($where, $table){
        $this->db->delete($table,$where,);
        
    }

    // Bagian admin
    public function insert($data) {
        $this->db->insert('tb_penilaian', $data); // insert penilaian
    }

    public function is_penilaian_exist($id_permohonan)
    {
        $this->db->where('id_permohonan', $id_permohonan);
        $query = $this->db->get('tb_penilaian');
    
        return $query->num_rows() > 0;
    }
    
    


    
    

  
 
}
?>