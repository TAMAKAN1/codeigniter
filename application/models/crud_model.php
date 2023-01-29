<?php

class crud_model extends CI_Model
{


    public function getAllProducts()
    {
        $query = $this->db->get('products');
        if ($query) {
            return $query->result();
        }
    }

    public function insertProduct($data){
       $query= $this->db->insert('products',$data);
    }
    public function update_product($data,$id){
        $this->db->where('id',$id);
        $query= $this->db->update('products',$data);
     }
     public function delete($id){
        $this->db->where('id',$id);
        $query= $this->db->delete('products');
     }
}


?>
