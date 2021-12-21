<?php

class DOS extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
    }

    public function index()
    {
        $session = $this->session->userdata('profil');
		$data['dos'] = $this->DosModel->find();

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
		
        $this->layout->set_titre('Suivie DOS');
        $this->layout->view('DOS/view_dos', $data);
	}
	
	public function nouveau()
	{
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

		$this->layout->set_titre('Suivie DOS');
        $this->layout->view('DOS/ajout_dos');
	}

	public function inserer()
	{
		$this->DosModel->insert();

		redirect(base_url('DOS'));
	}
}