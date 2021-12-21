<?php

class DemandeModel extends CI_Model
{
    /*
     * Récupération des demandes d'avis : 
     *   - La condition WHERE de la requête existe si la fonction find()
     *     reçoit un parametre dans le Controlleur [find( $where )].
     */
    public function find($where = NULL){
        $user    = $this->session->userdata('id_utilisateur');
        $session = $this->session->userdata('role');

        $this->db->select('*')
            ->from('demande')
            ->join('utilisateur', 'utilisateur.idUtilisateur = demande.envoyeur', 'inner');
            
        
        if ($session == 3 || $session == 7) {
            $this->db->where("utilisateur.idUtilisateur", $user);
        }

        if ($where != NULL) {
            $this->db->where($where);
        }
        $this->db->order_by('demande.dateDemande', 'DESC');
        $query = $this->db->get();
        
        return $query->result();
    }

    public function insert($file = NULL)
    {
        date_default_timezone_set('Africa/Nairobi');
        $userActifs = $this->session->userdata('id_utilisateur');

        $data = array(
            'dateDemande' => date("Y-m-d H:i:s"),
            'envoyeur'    => $userActifs,
            'objet'       => $this->input->post('objet_message'),
            'fichier'     => $file,
            'contenu'     => $this->input->post('contenu_msg')
        );

        $this->db->insert('demande', $data);
    }

    /*
     * Mise à jour de la propriété statutDemande.
     */
    public function update($idDemande, $statut)
	{
		$this->db->where('idDemande', $idDemande);
		$this->db->update('demande', ['statutDemande' => $statut]);
	}

    /*
     * Compter le nombre des demandes : 
     * - La condition WHERE de la requête existe si la fonction count()
     *     reçoit un parametre dans le Controlleur [cont( $where )].
     */
    public function count($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
		$nombre = $this->db->count_all_results('demande');

		return $nombre;
    }
}