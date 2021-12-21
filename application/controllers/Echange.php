<?php

class Echange extends CI_Controller
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
		$data['echanges'] = $this->EchangeModel->find('statutbox = "I" and statutEchangebox = "O"');

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
		
        $this->layout->set_titre('Echange interne');
        $this->layout->view('Echange/liste_echange', $data);
	}
	
	public function message($idEchange)
	{
		$session = $this->session->userdata('profil');
		$data['echange'] = $this->EchangeModel->find('echange.idEchange = ' . $idEchange, 'ticket.idTicket');

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

		$this->layout->set_titre('Echange interne');
        $this->layout->view('Echange/echange_ticket', $data);
	}

	public function envoie_message()
	{
		$data = [];
		$count = count($_FILES['pj_message']['name']);
		
		for($i=0;$i<$count;$i++)
		{
			if(!empty($_FILES['pj_message']['name'][$i])){
				$_FILES['file']['name'] 	= $_FILES['pj_message']['name'][$i];
				$_FILES['file']['type'] 	= $_FILES['pj_message']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['pj_message']['tmp_name'][$i];
				$_FILES['file']['error'] 	= $_FILES['pj_message']['error'][$i];
				$_FILES['file']['size'] 	= $_FILES['pj_message']['size'][$i];
  
				$config['upload_path']   = './assets/Fichiers/';
				$config['allowed_types'] = '*';
				$config['max_size']      = 5000;
				$config['file_name'] 	 = $_FILES['pj_message']['name'][$i];
			
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
			$this->EchangeMessageModel->insert($pj);
		} else {
			$this->EchangeMessageModel->insert();
		}

		/*$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
		$config ['smtp_port'] = 25;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'text';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$idTicket = $this->input->post('idTicket_message');
		$ticket['ticket'] = $this->EchangeModel->find('echange.idEchange = ' . $idEchange . ' and ticket.idTicket = ' . $idTicket, 'ticket.idTicket');

		$this->email->set_newline("\r\n");
		$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
		$this->email->to($email_envoyeur['envoyeur'][0]->email);
			$this->email->subject("[HELPCSF] : Echange sur le ticket numero : ". $ticket['ticket'][0]->numTicket ."");
			$this->email->message(
'Bonjour,
Nous vous avison que vous avez une echange concernant le ticket numéro : "' . $ticket['ticket'][0]->numTicket . '"
Veillez vous connécter sur l\'outil HELPCSF sur ce lien pour répondre :
	* 

Veuillez ne pas répondre à ce mail.

Cordialement.'
		);
		$this->email->send();*/
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function nouvel_echange()
	{
		$data = [];
		$count = count($_FILES['pj_echange']['name']);
		
		for($i=0;$i<$count;$i++)
		{
			if(!empty($_FILES['pj_echange']['name'][$i])){
				$_FILES['file']['name'] 	= $_FILES['pj_echange']['name'][$i];
				$_FILES['file']['type'] 	= $_FILES['pj_echange']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['pj_echange']['tmp_name'][$i];
				$_FILES['file']['error'] 	= $_FILES['pj_echange']['error'][$i];
				$_FILES['file']['size'] 	= $_FILES['pj_echange']['size'][$i];
  
				$config['upload_path']   = './assets/Fichiers/';
				$config['allowed_types'] = '*';
				$config['max_size']      = 5000;
				$config['file_name'] 	 = $_FILES['pj_echange']['name'][$i];
			
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
			$this->EchangeModel->insert($pj);
		} else {
			$this->EchangeModel->insert();
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}