<?php

class Demande_d_avis extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
    }
    
    public function index()
    {
        $data['demandes'] = $this->DemandeModel->find('demande.statutDemande = "Envoyé"');
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
        
        $this->layout->set_titre('Demande d\'avis');
        $this->layout->view('Demande/demande_view', $data);
    }

    public function consulter($id)
    {
        $data['demande'] = $this->DemandeModel->find('demande.idDemande ='. $id);
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
        
        $this->layout->set_titre('Demande d\'avis');
        $this->layout->view('Demande/consulter_demande', $data);
    }

    public function statut_demande($idDemande)
	{
		$data = $this->DemandeModel->update($idDemande, 'Recu');
		echo json_encode($data);
	}

    /*
     *-----------------------------------------------------------------------------------------
     *                                          Demandeur
     *-----------------------------------------------------------------------------------------
     */
    public function Demande()
    {
        $data['demandes'] = $this->DemandeModel->find('demande.statutDemande = "Envoyé"');
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
        
        $this->layout->set_titre('Demande envoyé');
        $this->layout->view('Demande/demandeur_view', $data);
    }
	
	public function demander()
	{
		$data = [];
		
		$count = count($_FILES['fichier_message']['name']);
		
		for($i=0;$i<$count;$i++)
		{
			if(!empty($_FILES['fichier_message']['name'][$i])){
				$_FILES['file']['name'] 	= $_FILES['fichier_message']['name'][$i];
				$_FILES['file']['type'] 	= $_FILES['fichier_message']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['fichier_message']['tmp_name'][$i];
				$_FILES['file']['error'] 	= $_FILES['fichier_message']['error'][$i];
				$_FILES['file']['size'] 	= $_FILES['fichier_message']['size'][$i];
  
				$config['upload_path']   = './assets/Fichiers/';
				$config['allowed_types'] = '*';
				$config['max_size']      = 5000;
				$config['file_name'] 	 = $_FILES['fichier_message']['name'][$i];
			
				$this->upload->initialize($config);

				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
			
					$data['totalFiles'][] = $filename;
				}
				
			}
		}

		// Insertion des PJ dans la base.
		if (!empty($data['totalFiles'])) {
			$pj = implode(',', $data['totalFiles']);
			$this->DemandeModel->insert($pj);
		} else {
			$this->DemandeModel->insert();
		}
		redirect(base_url('Demande_d_avis/demande'));
	}

    /* 
     * ------------------------------------------------------------------
     *                        Notification Badge
     * ------------------------------------------------------------------
     */
    public function notification()
    {
        $data['nombre'] = $this->DemandeModel->count('statutDemande = "Envoyé"');
        
		echo json_encode($data);
    }

}