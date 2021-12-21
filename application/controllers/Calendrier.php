<?php 

class Calendrier extends Ci_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
	}

	public function index()
	{
		$data['ferie'] = $this->CalendrierModel->find('ferie');
		$data['Conge'] = $this->CalendrierModel->find('conge');

		foreach ($data['ferie'] as $key => $value) {
			$data['data'][$key]['title'] 		   = $value->title;
			$data['data'][$key]['start'] 		   = $value->start;
			$data['data'][$key]['editable'] 	   = $value->editable;
			$data['data'][$key]['color'] 		   = $value->color;
			$data['data'][$key]['backgroundColor'] = $value->backgroundColor;
			$data['data'][$key]['textColor'] 	   = $value->textColor;
		}

		foreach ($data['Conge'] as $key => $value) {
			$data['data'][$key]['title'] 		   = $value->title;
			$data['data'][$key]['start'] 		   = $value->start;
			$data['data'][$key]['end'] 			   = $value->end;
			$data['data'][$key]['editable'] 	   = $value->editable;
			$data['data'][$key]['color'] 		   = $value->color;
			$data['data'][$key]['backgroundColor'] = $value->backgroundColor;
			$data['data'][$key]['textColor'] 	   = $value->textColor;
		}

		$session = $this->session->userdata('profile');

		Switch ($session){
			case 'Administrateur' :
				$this->layout->set_theme('template_admin');
				break;
			case 'Demandeur' :
				$this->layout->set_theme('template_demandeur');
				break;
			case 'Observateur' :
				$this->layout->set_theme('template_observateur');
				break;
			case 'Directeur Juridique' :
			case 'Senior' :
			case 'Junior' :
				$this->layout->set_theme('template_juriste');
				break;
		}

        $this->layout->set_titre("Evenements");
		$this->layout->view('Calendriers/calendrier_view', $data);
	}

	public function Inserer($table)
	{
		$this->CalendrierModel->insert($table);
		redirect(base_url('Calendrier'));
	}

	public function Utilisateur($idProfil)
	{
		$data = $this->UtilisateurModel->find('utilisateur.profil = ' . $idProfil . ' AND utilisateur.statutCompte = "Activé"');
		echo json_encode($data);
	}


	/**************************************************************************************************************
	 	NE JAMAIS EXECCUTER SVP... Merci 
	 	
	 	Ce code fait un boucle de 2019 à 2037 des jours fériés ci-desous :
	 	- Nouvel an
		- Journée internationale de la femme
		- Commémoration 1947
		- Fête du Travail
		- Fête de l'independance
		- Assomption de la Sainte Vierge
		- Toussaint
		- Noël
		- Pâque
		- Lundi de Pâque
		- Ascenssion
		- Pentecote
		- Lundi de Pentecote
	**************************************************************************************************************/

	public function Attention(){
		$this->CalendrierModel->insertFerieDefault();
	}
	/**************************************************************************************************************
	**************************************************************************************************************/
	
}