<?php

class ProfilModel extends CI_Model
{
	public function find($where = NULL)
	{
		if ($where != NULL) {
			$this->db->where($where);
		}
		
        $query = $this->db->get('profil');
        
        return $query->result();
    }
}