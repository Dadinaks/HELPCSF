<?php

class EchangeModel extends CI_Model
{
    public function find($where = NULL, $groupby = NULL)
    {
        $user    = $this->session->userdata('id_utilisateur');
        $session = $this->session->userdata('role');
        
		$this->db->select('*, concat(e.matricule, " - ", e.nom, " ", e.prenom) as info_Envoyeur, concat(r.matricule, " - ", r.nom, " ", r.prenom) as info_receveur')
			->from('echangeBox')
            ->join('ticket', 'ticket.idTicket = echangeBox.idTicketBox', 'left')
            ->join('demande', 'demande.idDemande = ticket.idDemande', 'left')
			->join('echange', 'echange.idEchange = echangeBox.idEchange', 'left')
			->join('utilisateur e', 'e.idUtilisateur = echange.idUtilisateur_1', 'left')
			->join('utilisateur r', 'r.idUtilisateur = echange.idUtilisateur_2', 'left');

		//condition where
		if ($where != NULL) {
			$this->db->where($where);
		}
		
		if ($session == 3) {
            $this->db->where("r.idUtilisateur", $user);
        }

		//condition orderby
		if ($groupby != NULL) {
			$this->db->group_by($groupby);
		}
        $query = $this->db->get();
        
        return $query->result();
	}

	public function insert($file = NULL)
	{
		date_default_timezone_set('Africa/Nairobi');
		
		$data = array(
			'idTicket'	  	  => $this->input->post('idTicket_echange'),
			'objet_echange'   => $this->input->post('objet_echange'),
			'pj_echange' 	  => $file,
			'contenu_echange' => $this->input->post('contenu_echange'),
			'idUtilisateur_1' => $this->session->userdata('id_utilisateur'),
			'idUtilisateur_2' => $this->input->post('receveur_echange'),
			'dateEnvoie'	  => date("Y-m-d H:i:s")
		);

		return $this->db->insert('echange', $data);
	}
}