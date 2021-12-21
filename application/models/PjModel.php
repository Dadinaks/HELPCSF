<?php

Class PjModel extends CI_MOdel
{
	public function find($idTicket)
	{   
        $query = $this->db->where('idTicket', $idTicket)
		->get('pj_traitement');
        
        return $query->result();
	}

	public function findone($idPj)
	{   
        $query = $this->db->where('idPj', $idPj)
		->get('pj_traitement');
        
        return $query->result();
	}

	public function insert($pj)
	{
        $idTicket = $this->input->post('pj_id');

		return $this->db->insert('pj_traitement', ["pj" => $pj, "idTicket" => $idTicket]);
	}

	public function delete($pj)
	{
		$this->db->where('idPj', $pj);

		return $this->db->delete('pj_traitement');
	}
}