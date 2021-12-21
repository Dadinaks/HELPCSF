<?php

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function connexion()
	{
		$this->form_validation->set_rules('pseudo', 'Identifiant', 'trim|is_natural|required|max_length[5]', array('is_natural' => '<small>Le Matricule doit être un entier.</small>'));
		$this->form_validation->set_rules('mdp', 'Mot de passe', 'trim|required', array('required' => 'Mot de passe obligatoire.'));

		$data['ldap'] = $this->LdapModel->find();

		if ($data['ldap'][0]->ldap == 1){
			if ($this->form_validation->run() !== false) {
				$matricule = $this->input->post('pseudo');

				// Vérification de l'authentification
				$res = $this->UtilisateurModel->find("utilisateur.matricule =" . $matricule . " AND utilisateur.statutCompte ='Activé'");

				if ($res != false) {
					//user existe dans bdd
					$this->session->set_userdata('login_state', TRUE);
					$data = $res[0];
					$this->session->set_userdata('id_utilisateur', $data->idUtilisateur);
					$this->session->set_userdata('matricule', $data->matricule);
					$this->session->set_userdata('nom_utilisateur', $data->nom);
					$this->session->set_userdata('prenom_utilisateur', $data->prenom);
					$this->session->set_userdata('profil', $data->role);
					$this->session->set_userdata('role', $data->idProfil);

					//On redirige vers la page d'accueil
					redirect('Tableau_de_bord');
				} else {
					//Si User n'existe pas dans la bdd
					$this->session->set_flashdata('noconnect', "Vous n'êtes pas autorisé à accéder à cette application");
					redirect('Login');
				}
			}
		} else {
			if ( $this->form_validation->run() !== false ) {
				$matricule = $this->input->post('pseudo');
				
				// Eléments d'authentification LDAP
				$ldappass = $this->input->post('mdp');  // Mot de passe associé

				$ldapserver = "tnr.bniclm.com";
				$ldapport = 389;

				$ldaprdn = $matricule."@".$ldapserver;

				// Connexion au serveur LDAP
				$ldapconn = ldap_connect($ldapserver, $ldapport)
					or die("Impossible de se connecter au serveur LDAP.");
					
				//Note that you have to specify the protocol version prior to making a call to ldap_bind, when the server is expecting LDAP protocol version 3
				ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
				ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);	// Pour liaison avec l'AD

				ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);

				if ($ldapconn) {

					// Connexion au serveur LDAP
					$ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);

					// Vérification de l'authentification
					if ($ldapbind) {
						$res = $this->UtilisateurModel->find("utilisateur.matricule =" . $matricule . " AND utilisateur.statutCompte ='Activé'");
							
						if ( $res != false ) { 
							//user existe dans bdd
							$this->session->set_userdata('login_state', TRUE);
							$data = $res[0];
							$this->session->set_userdata('id_utilisateur', $data->idUtilisateur);
							$this->session->set_userdata('matricule', $data->matricule);
							$this->session->set_userdata('nom_utilisateur', $data->nom);
							$this->session->set_userdata('prenom_utilisateur', $data->prenom);
							$this->session->set_userdata('profil', $data->role);
							$this->session->set_userdata('role', $data->idProfil);

							//On redirige vers la page d'accueil
							redirect('Tableau_de_bord');
						}
						else{
							//Si User n'existe pas dans la bdd
							$this->session->set_flashdata('noconnect', "Vous n'êtes pas autorisé à accéder à cette application");
							redirect('login');
						}
					} else {
						$this->session->set_flashdata('noconnect', "Votre Mot de passe est incorrect");
						redirect('login');
					}
				}	
			}
		}
		$this->load->view('login');
	}
	
	public function deconnexion()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}
