<?php


class Utilisateur extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
	}

	public function index()
	{
		$this->layout->set_theme('template_admin');
		$this->layout->set_titre('Utilisateur');
		$this->layout->view('utilisateur/utilisateur_view');
	}

	public function tableau_user(){
		$data['utilisateurs'] = $this->UtilisateurModel->find();
		echo json_encode($data);
	}

	public function inserer_Utilisateur()
	{
		$this->form_validation->set_rules('matricule_utilisateur', 'matricule', 'trim|is_unique[utilisateur.matricule]|min_length[1]|required');
        $this->form_validation->set_rules('nom_utilisateur', 'nom', 'trim|required');
        $this->form_validation->set_rules('prenom_utilisateur', 'prenom', 'trim|required');
        $this->form_validation->set_rules('email_utilisateur', 'email', 'trim|valid_email|required');
        $this->form_validation->set_rules('agence_utilisateur', 'agence', 'trim|required');
        $this->form_validation->set_rules('direction_utilisateur', 'direction', 'trim|required');
        $this->form_validation->set_rules('unite_utilisateur', 'unite', 'trim|required');
        $this->form_validation->set_rules('poste_utilisateur', 'poste', 'trim|required');
        $this->form_validation->set_rules('profile_utilisateur', 'profil', 'trim|required');
 
        if ($this->form_validation->run()) {
			$this->UtilisateurModel->insert();
		}
		redirect(base_url('Utilisateur'));
	}

	public function modifier_Utilisateur()
	{
		$this->UtilisateurModel->update();
		redirect(base_url('Utilisateur'));
	}

	public function Activer($idUtilisateur)
	{
		$this->UtilisateurModel->update($idUtilisateur, 'Activé');
		redirect(base_url('Utilisateur'));
	}

	public function Desactiver($idUtilisateur)
	{
		$this->UtilisateurModel->update($idUtilisateur, 'Désactivé');
		redirect(base_url('Utilisateur'));
	}

	public function verif_matricul($matricule){
		$data['verifie'] = $this->UtilisateurModel->count('matricule =' . $matricule);
		echo json_encode($data);
	}

	public function filtrer_par_profil($idProfil){
		$data['profils'] = $this->UtilisateurModel->find("profil.idProfil =" . $idProfil);
		echo json_encode($data);
	}

	public function filtrer_par_agence($agence){
		$a  = preg_replace('~%20~', ' ', $agence);
		$id = $this->AgenceModel->find("agence = '" . $a . "'");
		$data['agence'] = $this->UtilisateurModel->find("agence.idAgence = " . $id[0]->idAgence);
		echo json_encode($data);
	}
}