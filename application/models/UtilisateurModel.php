<?php

class UtilisateurModel extends CI_Model
{
	public function find($where = NULL)
	{
        $this->db->select('*, concat(utilisateur.matricule, " - ", utilisateur.nom, " ", utilisateur.prenom) as info_user')
            ->from('utilisateur')
            ->join('profil', 'profil.idProfil = utilisateur.profil', 'inner')
            ->join('agence', 'agence.idAgence = utilisateur.agence', 'inner');
        if ($where != NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get();
    
        return $query->result();
	}

    public function insert()
    {
        $query =  $this->db->select('idAgence')
            ->from('agence')
            ->where('agence', $this->input->post('agence_utilisateur'))
            ->get();
            
        $agence['agence'] = $query->result();
        
        $data = array(
            'matricule'     => $this->input->post('matricule_utilisateur'),
            'nom'           => $this->input->post('nom_utilisateur'),
            'prenom'        => $this->input->post('prenom_utilisateur'),
            'email'         => $this->input->post('email_utilisateur'),
            'agence'        => $agence['agence'][0]->idAgence,
            'direction'     => $this->input->post('direction_utilisateur'),
            'unite'         => $this->input->post('unite_utilisateur'),
            'poste'         => $this->input->post('poste_utilisateur'),
            'profil'        => $this->input->post('profile_utilisateur'),
            'statutCompte'  => 'Activé'
        );

        return $this->db->insert('utilisateur', $data);
    }

    public function update($idUtilisateur = NULL, $statut = NULL)
    {
        if ($statut != NULL) {
            $data = array(
                'statutCompte' => $statut
            );
        } else {
            $idUtilisateur = $this->input->post('idUtilisateur_utilisateur');

            $data = array(
                'matricule' => $this->input->post('matricule_utilisateur'),
                'nom'       => $this->input->post('nom_utilisateur'),
                'prenom'    => $this->input->post('prenom_utilisateur'),
                'email'     => $this->input->post('email_utilisateur'),
                'agence'    => $this->input->post('agence_utilisateur'),
                'direction' => $this->input->post('direction_utilisateur'),
                'unite'     => $this->input->post('unite_utilisateur'),
                'poste'     => $this->input->post('poste_utilisateur'),
                'profil'    => $this->input->post('profile_utilisateur')
            );
        }
        
        $this->db->where('idUtilisateur', $idUtilisateur);

        return $this->db->update('utilisateur', $data);
    }

    public function count($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
        $nb = $this->db->count_all_results('utilisateur');

        return $nb;
    }

}