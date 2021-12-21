<?php

Class EchangeMessageModel extends CI_MOdel
{
	public function find($idEchange)
	{   
        $query = $this->db->select('*, concat(u.matricule, " - ", u.nom, " ", u.prenom) as utilisateur')
            ->from('echange_message m')
			->join('utilisateur u', 'u.idUtilisateur = m.idUtilisateur_message', 'inner')
			->where('idEchange_echange', $idEchange)
			->order_by('date_message')
		    ->get();
        
        return $query->result();
	}

	public function insert($file = NULL)
	{
		date_default_timezone_set('Africa/Nairobi');

        $data = array(
            'message' 	            => $this->input->post('message'),
			'date_message'          => date("Y-m-d H:i:s"),
			'pj_message'			=> $file,
            'idEchange_echange' 	=> $this->input->post('idMessage_echange'),
            'idUtilisateur_message' => $this->session->userdata('id_utilisateur')
        );

		return $this->db->insert('echange_message', $data);
	}

	public function delete($pj)
	{
		$this->db->where('idPj_message', $pj);

		return $this->db->delete('echange_message');
	}
}