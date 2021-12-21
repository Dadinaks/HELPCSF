<?php

class Agence extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
	}

	public function index()
	{
		$data['agences'] = $this->AgenceModel->find();
		$session = $this->session->userdata('profil');

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
			case 'Responsable CSF' :
			case 'CSF' :
				$this->layout->set_theme('template_csf');
				break;
		}
		
        $this->layout->set_titre('Agence');
	    $this->layout->view('Agence/agence_view', $data);
	}

	public function Ajout()
	{
		$params = array(
			array(
                'field' => 'code_ajout',
                'label' => 'Code Agence',
				'rules' => 'trim|required|is_unique[agence.codeAgence]|min_length[1]|max_length[99999]'
			),
			array(
                'field' => 'agence_ajout',
                'label' => 'Agence',
                'rules' => 'trim|required'
			)
		);
		$this->form_validation->set_rules($params);
		$this->form_validation->set_message('is_unique[agence.codeAgence]', '<small class="red-text">Ce Code exist deja dans la Base de données.</small>');

		if ($this->form_validation->run()) {
			$this->AgenceModel->insert();

			redirect(base_url('Agence'));
		} else {
			redirect(base_url('Agence'));
		}
	}

	public function Modifier()
	{
		$this->AgenceModel->update();

		redirect(base_url('Agence'));
	}

	public function Supprimer()
	{
		$this->AgenceModel->delete();

		redirect(base_url('Agence'));
	}

	public function verifier($code_agence){
		$data['check'] = $this->AgenceModel->count("codeAgence =" . $code_agence);

		echo json_encode($data);
	}

}