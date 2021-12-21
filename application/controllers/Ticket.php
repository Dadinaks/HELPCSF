<?php

class Ticket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
	}
	
	public function select($where)
	{
		$data = $this->TicketModel->find('ticket.idTicket = '. $where);
		echo json_encode($data);
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *											Reçu
	 *-----------------------------------------------------------------------------------------
	 */
    public function Recus()
    {
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Reçu"', 'ticket.dateReception');
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

        $this->layout->set_titre('Ticket Reçus');
	    $this->layout->view('Ticket/recu', $data);
	}
	
	public function Accepter_ticket()
	{
		$idDemande   = $this->input->post('demandeAccept_confirm');
		$idDemandeur = $this->input->post('demandeur_confirm');
		$this->TicketModel->insert('Reçu', $idDemande, $idDemandeur);
		$this->DemandeModel->update($idDemande, 'Recu');
		
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find('demande.idDemande = ' . $idDemande);
		$data['ticket'] = $this->TicketModel->find('ticket.idDemande =' . $idDemande);	

		$config ['protocol']  = 'smtp';
		$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
		$config ['smtp_port'] = 25;//25;
		$config ['charset']   = 'utf-8';
		$config ['mailtype']  = 'text';
		$config ['wordwrap']  = TRUE;
		
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
		$this->email->to($email_envoyeur['envoyeur'][0]->email);
		$this->email->subject("[HELPCSF]Demande Recu");
		$this->email->message(
			'Bonjour,
Nous accusons réception de votre demande sous l\'objet : "' . $data['ticket'][0]->objet . '", elle peut être consultée dans la liste des demandes reçues.

Veuillez ne pas répondre à ce mail.

Cordialement.'
		);
		$this->email->send();

		redirect(base_url('Ticket/recus'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *										Refusés
	 *-----------------------------------------------------------------------------------------
	 */
	public function Refuses()
    {
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Refusé"', 'ticket.dateRefus');
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

        $this->layout->set_titre('Ticket Refusés');
        $this->layout->view('Ticket/refuse', $data);
	}

	public function Refuser_ticket()
	{
		$this->TicketModel->insert('Refusé');
		$this->DemandeModel->update($this->input->post('demandeRefus_confirm'), 'Refuse');
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find('demande.idDemande = '. $this->input->post('demandeRefus_confirm'));
		$data['ticket'] = $this->TicketModel->find('ticket.idDemande ='. $this->input->post('demandeRefus_confirm'));

		$config ['protocol']  = 'smtp';
		$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
		$config ['smtp_port'] = 25;//25;
		$config ['charset']   = 'utf-8';
		$config ['mailtype']  = 'text';
		$config ['wordwrap']  = TRUE;
		
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
		$this->email->to($email_envoyeur['envoyeur'][0]->email);
		$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Demande Refusé");
		$this->email->message(
			'Bonjour,
Votre demande sous l\'objet : "' . $data['ticket'][0]->objet . '" est refusé.
Vous pouvez la consulté dans la liste des dossiers refusé :
	* Numéro : ' . $data['ticket'][0]->numTicket . '
	* Objet  : ' . $data['ticket'][0]->objet . '
	* Motif  : ' . $data['ticket'][0]->motif . '

Veuillez ne pas répondre à ce mail.

Cordialement.'
		);
		$this->email->send();

		redirect(base_url('ticket/Refuses'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *										Abandonnés
	 *-----------------------------------------------------------------------------------------
	 */
	public function Abandon()
	{
		$data['tickets'] = $this->TicketModel->findAbandon();
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

        $this->layout->set_titre('Ticket Abandonnés');
	    $this->layout->view('Ticket/adandon', $data);
	}

	public function Abandonner($params = NULL)
	{
		$idTicket = $this->input->post('idTicket_abandonner');
		$idDemande = $this->input->post('idDemande_abandonner');
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find('demande.idDemande = '. $idDemande);

		if ($params != NULL) {
			$this->TicketModel->update($idTicket, 'Abandonné', $this->session->userdata('id_utilisateur'));
			$this->DemandeModel->update($idDemande, 'Abandonné');
			
			$data['ticket'] = $this->TicketModel->find('ticket.idDemande ='. $idDemande);

			$config ['protocol']  = 'smtp';
			$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
			$config ['smtp_port'] = 25;//25;
			$config ['charset']   = 'utf-8'; 
			$config ['mailtype']  = 'text';
			$config ['wordwrap']  = TRUE;

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
			$this->email->to($email_envoyeur['envoyeur'][0]->email);
			$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Demande Abandonné");
			$this->email->message(
				'Bonjour,
Votre demande sous l\'objet : "' . $data['ticket'][0]->objet . '" est abandonné.
Vous pouvez la consulté dans la liste des dossiers abandonné :
	* Numéro : ' . $data['ticket'][0]->numTicket . '
	* Objet  : ' . $data['ticket'][0]->objet . '
	* Motif  : ' . $data['ticket'][0]->motif . '

Veuillez ne pas répondre à ce mail.

Cordialement.'
			);
			$this->email->send();	
		} else {
			$this->TicketModel->insert('Abandonnée');
			$this->DemandeModel->update($idDemande, 'Abandonné');

			$data['ticket'] = $this->TicketModel->find('ticket.idDemande ='. $idDemande);

			$config ['protocol']  = 'smtp';
			$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
			$config ['smtp_port'] = 25;//25;
			$config ['charset']   = 'utf-8'; 
			$config ['mailtype']  = 'text';
			$config ['wordwrap']  = TRUE;

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");
			$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
			$this->email->to($email_envoyeur['envoyeur'][0]->email);
			$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Demande Abandonné");
			$this->email->message(
				'Bonjour,
Vous avez abandonné votre demande sous l\'objet : "' . $data['ticket'][0]->objet . '".
Vous pouvez la consulté dans la liste des dossiers abandonné :
	* Numéro : ' . $data['ticket'][0]->numTicket . '
	* Objet  : ' . $data['ticket'][0]->objet . '
	* Motif : ' . $data['ticket'][0]->motif . '

Veuillez ne pas répondre à ce mail.

Cordialement.'
			);
			$this->email->send();

			$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
			$this->email->to("Cedrick.RAVOAHANGINIAINA@bni.mg");
			$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Demande Abandonné par le demandeur : ". $email_envoyeur['envoyeur'][0]->email);
			$this->email->message(
				'Bonjour,
La demande sous l\'objet : "' . $data['ticket'][0]->objet . '" a été abandonner par le demandeur.
Vous pouvez la consulté dans la liste des dossiers abandonné :
	* Numéro : ' . $data['ticket'][0]->numTicket . '
	* Objet  : ' . $data['ticket'][0]->objet . '
	* Date d\'abondon : ' . date('	d/m/Y, H:i', strtotime($data['ticket'][0]->dateAbandon)) . '
	* Motif : ' . $data['ticket'][0]->motif . '

Veuillez ne pas répondre à ce mail.

Cordialement.'
			);
			$this->email->send();
		}

		redirect(base_url('ticket/Abandon'));
	}


	/*
	 *-----------------------------------------------------------------------------------------
	 *											FAQ
	 *-----------------------------------------------------------------------------------------
	 */
	public function Faq()
    {
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Faq"', 'ticket.dateFaq');
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

        $this->layout->set_titre('Ticket redirigé vers F.A.Q');
	    $this->layout->view('Ticket/faq', $data);
	}

    public function Rediriger_faq($idDemande, $idDemandeur)
	{
		$lien_faq = "http://sp-web-pr/Lists/FAQ/Flat.aspx?RootFolder=%2FLists%2FFAQ%2FFAQ%20JURIDIQUETHEME%20ch%C3%A8ques%2C%20soci%C3%A9t%C3%A9s%20commerciales%2C%20suret%C3%A9s%20et%20les%20incidents%20de%20compte&FolderCTID=0x0120020018B2C7DB8F82724E98C046A6F3EE0D7B";
		$this->TicketModel->insert('Faq', $idDemande, $idDemandeur);
		$this->DemandeModel->update($idDemande, 'faq');
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find('demande.idDemande = '. $idDemande);
		$data['ticket'] = $this->TicketModel->find('ticket.idDemande ='. $idDemande);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
		$config ['smtp_port'] = 25;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'text';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
		$this->email->to($email_envoyeur['envoyeur'][0]->email);
		$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Demande redirigé vers F.A.Q");
		$this->email->message(
			'Bonjour,
Veuillez consulter la reponse de votre demande sur le  lien suivant : 
'. $lien_faq .'
				
NB :
	* N\'oubliez pas de renseigner votre matricule et mot de passe.
	* Vous pouvez la consulté dans la liste des dossiers redirigé vers F.A.Q sous le numero : ' . $data['ticket'][0]->numTicket . '
	* Veuillez ne pas répondre à ce mail.
	
Cordialement.'
		);
		$this->email->send();

		redirect(base_url('ticket/Faq'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *										Terminé
	 *-----------------------------------------------------------------------------------------
	 */
	public function Termines()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Terminé"', 'id');
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

        $this->layout->set_titre('Ticket terminés');
	    $this->layout->view('Ticket/termine', $data);
	}


	/*
	 *-----------------------------------------------------------------------------------------
	 *								En cours de traitement
	 *-----------------------------------------------------------------------------------------
	 */
	public function Encours()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Encours"', 'id');
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

        $this->layout->set_titre('Ticket en cours de traitement');
	    $this->layout->view('Ticket/encours', $data);
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *								À valider
	 *-----------------------------------------------------------------------------------------
	 */
	public function Validation()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "A_Validé"', 'id');
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

        $this->layout->set_titre('Ticket à validers');
	    $this->layout->view('Ticket/a_valider', $data);
	}

	public function Valider($idTicket, $valideur)
	{
		$this->TicketModel->update($idTicket);
		$this->TicketModel->update($idTicket, 'Terminé', $valideur);
		
		$data['ticket'] = $this->TicketModel->find('ticket.idTicket = '. $idTicket, 'id');
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find('demande.idDemande = ' . $data['ticket'][0]->idDemande);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
		$config ['smtp_port'] = 25;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'text';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
		$this->email->to($email_envoyeur['envoyeur'][0]->email);
		$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Ticket terminé");
		$this->email->message(
			'Bonjour,
Votre demande sous l\'objet : "' . $data['ticket'][0]->objet . '" est Terminé.
Vous pouvez la consulté dans la liste des dossiers terminé :
	* Numéro : ' . $data['ticket'][0]->numTicket . '
	* Objet  : ' . $data['ticket'][0]->objet . '

Veuillez ne pas répondre à ce mail.

Cordialement.'
		);
		$this->email->send();	

		redirect(base_url('ticket/Termines'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *								À réviser
	 *-----------------------------------------------------------------------------------------
	 */
	public function Revision()
	{
		$data['tickets'] = $this->TicketModel->find('ticket.statutTicket = "Révisé"', 'id');
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

        $this->layout->set_titre('Ticket à réviser');
	    $this->layout->view('Ticket/revises', $data);
	}

	public function Reviser($idTicket)
	{
		$this->TicketModel->update($idTicket, 'Révisé');

		redirect(base_url('ticket/Validation'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *									Traitement
	 *-----------------------------------------------------------------------------------------
	 */
	public function  Traitement($idTicket, $visualiser = NULL)
	{
		$data['ticket'] = $this->TicketModel->find('ticket.idTicket = '. $idTicket, $idTicket);
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

        $this->layout->set_titre('Traitement du ticket');
	    $this->layout->view('Ticket/traitement', $data);
	}

	public function Traiter($idTicket)
	{
		$userActif = $this->session->userdata('id_utilisateur');
		$this->TicketModel->update($idTicket, 'Encours', $userActif);
		
		$data['ticket'] = $this->TicketModel->find('ticket.idTicket = '. $idTicket);
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find('demande.idDemande = ' . $data['ticket'][0]->idDemande);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
		$config ['smtp_port'] = 25;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'text';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
		$this->email->to($email_envoyeur['envoyeur'][0]->email);
		$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Demande prise en charge");
		$this->email->message(
			'Bonjour,
Votre demande est prise en charge sous le numéro : ' . $data['ticket'][0]->numTicket . '.
Nous reviendrons vers vous dans 2 jours ouvrés.
Vous pouvez la consulté dans la liste des dossiers prise en charge :
	* Numéro : ' . $data['ticket'][0]->numTicket . '
	* Objet  : ' . $data['ticket'][0]->objet . '

Veuillez ne pas répondre à ce mail.

Cordialement.'
		);
		$this->email->send();

        redirect(base_url('ticket/Traitement/' . $idTicket));
	}

	public function Assigner()
	{
		$userAssigned = $this->input->post('assigner');
		$idTicket 	  = $this->input->post('idTicket_assigner');

		$this->TicketModel->update($idTicket, 'Encours', $userAssigned);
		
		$data['ticket'] = $this->TicketModel->find('ticket.idTicket = '. $idTicket);
		$email_envoyeur['envoyeur'] = $this->DemandeModel->find('demande.idDemande = ' . $data['ticket'][0]->idDemande);

		$config ['protocol']  = 'smtp'; 
		$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
		$config ['smtp_port'] = 25;//25;
		$config ['charset']   = 'utf-8'; 
		$config ['mailtype']  = 'text';
		$config ['wordwrap']  = TRUE;

		$this->email->initialize($config);

		$this->email->set_newline("\r\n");
		$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
		$this->email->to($email_envoyeur['envoyeur'][0]->email);
		$this->email->subject("[HELPCSF : ". $data['ticket'][0]->numTicket ."]Demande prise en charge");
		$this->email->message(
			'Bonjour,
Votre demande est prise en charge sous le numéro : ' . $data['ticket'][0]->numTicket . '.
Nous vous tiendrons informé dans ' . $data['ticket'][0]->delai . ' jour(s).
Vous pouvez la consulté dans la liste des dossiers prise en charge :
	* Numéro : ' . $data['ticket'][0]->numTicket . '
	* Objet  : ' . $data['ticket'][0]->objet . '

Veuillez ne pas répondre à ce mail.

Cordialement.'
		);
		$this->email->send();

		redirect(base_url('ticket/Recus'));
	}

	public function Reassigner()
	{
		$userAssigned = $this->input->post('assigner');
		$idTicket 	  = $this->input->post('idTicket_assigner');

		$this->TicketModel->update($idTicket, 'Encours', $userAssigned);

		redirect(base_url('ticket/Encours'));
	}

	public function Enregistrer($idTicket, $save = NULL)
	{
		switch ($save){
			case 'Consulter' :
				$this->form_validation->set_rules('contenu_traitement', 'Contenu', 'required');
				if ($this->form_validation->run()) {
					$this->TicketModel->update($idTicket);
				}
				redirect(base_url('Ticket/Traitement/' . $idTicket . '/Consulter'));
				break;
			
			case 'Reviser' :
				$this->form_validation->set_rules('contenu_traitement', 'Contenu', 'required');
				if ($this->form_validation->run()) {
					$this->TicketModel->update($idTicket);
				}
				redirect(base_url('Ticket/Traitement/' . $idTicket . '/Reviser'));
				break;
			
			default :
				$this->form_validation->set_rules('contenu_traitement', 'Contenu', 'required');
				if ($this->form_validation->run()) {
					$this->TicketModel->update($idTicket);
				}
				redirect(base_url('Ticket/Traitement/' . $idTicket));
		}
		
	}

	public function Soumettre($idTicket)
	{
		$this->TicketModel->update($idTicket);
		$this->TicketModel->update($idTicket, 'A_Validé');

		redirect(base_url('Ticket/Validation'));
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *						Visualisation du ticket : F.A.Q, Refusés, Reçus, ...
	 *-----------------------------------------------------------------------------------------
	 */
	public function Visualiser($idTicket, $statut = NULL)
	{
		switch ($statut) {
			case 'Encours' :
				$data['ticket'] = $this->TicketModel->find('ticket.idTicket = '. $idTicket);
				redirect(base_url('Ticket/Traitement/' . $idTicket . '/Voir'));
				break;
			case 'Termine' :
				$data['ticket'] = $this->TicketModel->find('ticket.idTicket = '. $idTicket);
				redirect(base_url('Ticket/Traitement/' . $idTicket . '/Termine'));
				break;
			case 'Abandonne' :
				$data['ticket'] = $this->TicketModel->find('ticket.idTicket =' .$idTicket);
				redirect(base_url('Ticket/Traitement/' . $idTicket . '/Abandonne'));
				break;
			case 'faq' || 'refuse' || 'recu' || 'abandon' :
				$data = $this->TicketModel->find('ticket.idTicket =' .$idTicket);
				break;
		}
		
		echo json_encode($data);
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *											Notification
	 *-----------------------------------------------------------------------------------------
	 */
	public function Notification()
	{
		$data['recu'] 	  = $this->TicketModel->count('Reçu');
		$data['avalider'] = $this->TicketModel->count('A_Validé');
		$data['revision'] = $this->TicketModel->count('Révisé');
		$data['Encours']  = $this->TicketModel->count('Encours');
		$data['total'] 	  = $data['recu'] + $data['avalider'] + $data['revision'] + $data['Encours'];

		echo json_encode($data);
	}

	public function jour_ouvre($date, $jourOuvre)
	{
		$data['ferie'] = $this->CalendrierModel->find('ferie');
		
		$days  = array();
		$ferie = array();
		$i 	   = 0;

		foreach($data['ferie'] as $row){
			$ferie[] = $row->start;
		}
			
		while($i < $jourOuvre){
			$date_tmp = date("Y-m-d", strtotime($i . ' weekdays' , $date));
			if(in_array($date_tmp , $ferie)) {
				$jourOuvre++;
			} else {
				$days[] = $date_tmp;
			}
			$i++;
		}

		return $days;
	}

	public function Notification_retard_recu()
	{
		date_default_timezone_set('Africa/Nairobi');

		$data['ticket'] = $this->TicketModel->find('ticket.statutTicket = "Reçu"', 'ticket.dateReception');	
		$now  = date("Y-m-d H:i");

		foreach ($data['ticket'] as $row) {
			$recu[]     = date("Y-m-d H:i", strtotime($row->dateReception));
			$recuTime[] = date("H:i", strtotime($row->dateReception));
			$ticket[] 	= $row->numTicket;
		}

		for ($i = 0; $i < count($recu); $i++){
			$date = $recu[$i];
			$jour_ouvre[$recu[$i]]  = self::jour_ouvre(strtotime($date), 5);
			$dateAddOneDay 			= $jour_ouvre[$recu[$i]][1] . ' ' . $recuTime[$i];

			if($now == $dateAddOneDay){
				$config ['protocol']  = 'smtp'; 
				$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
				$config ['smtp_port'] = 25;//25;
				$config ['charset']   = 'utf-8'; 
				$config ['mailtype']  = 'text';
				$config ['wordwrap']  = TRUE;
		
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
				$this->email->to("Cedrick.RAVOAHANGINIAINA@bni.mg");
			
				$this->email->subject("[HELPCSF : " . $ticket[$i] . "]Retard de 24h");
			
				$this->email->message(
					'Bonjour,
Le ticket numéro : ' . $ticket[$i] . ' est en retard de 24h.

Veuillez ne pas répondre à ce mail.

Cordialement.'
				);
				$notif['notif_mail'] = $this->email->send();
				
				echo json_encode($notif);
			} else {
				$notif['notif_mail'] = "aucun";
				echo json_encode($notif);
			}
		}
	}

	public function Notification_retard_traitement()
	{
		date_default_timezone_set('Africa/Nairobi');

		$data['ticket'] = $this->TicketModel->find('ticket.statutTicket = "Reçu"', 'ticket.dateReception');	
		$now  = date("Y-m-d H:i");

		foreach ($data['ticket'] as $row) {
			$recu[]     = date("Y-m-d H:i", strtotime($row->dateReception));
			$recuTime[] = date("H:i", strtotime($row->dateReception));
			$ticket[] 	= $row->numTicket;
		}

		for ($i = 0; $i < count($recu); $i++){
			$date = $recu[$i];
			$jour_ouvre[$recu[$i]]  = self::jour_ouvre(strtotime($date), 5);
			$dateAddOneDay 			= $jour_ouvre[$recu[$i]][1] . ' ' . $recuTime[$i];

			if($now == $dateAddOneDay){
				$config ['protocol']  = 'smtp'; 
				$config ['smtp_host'] = '10.161.65.60';//"10.161.65.60";
				$config ['smtp_port'] = 25;//25;
				$config ['charset']   = 'utf-8'; 
				$config ['mailtype']  = 'text';
				$config ['wordwrap']  = TRUE;
		
				$this->email->initialize($config);
				$this->email->set_newline("\r\n");
				$this->email->from("outil.helpcsf@bni.mg", "Gestion HELPCSF");
				$this->email->to("Cedrick.RAVOAHANGINIAINA@bni.mg"/*"BNI_DRJC_JCSF_JUR@bni.mg"*/);
			
				$this->email->subject("[HELPCSF : " . $ticket[$i] . "]Retard de 24h");
			
				$this->email->message(
					"Bonjour, <br>
					Le ticket numéro : " . $ticket[$i] . " est en retard de 24h.
					<br>
					<b><u>NB :</b></u> <span style='color : #F1004A;'>Veuillez ne pas répondre à ce mail.</span>
		    		<br><br>Cordialement."
				);
				$notif['notif_mail'] = $this->email->send();
				
				echo json_encode($notif);
			} else {
				$notif['notif_mail'] = "aucun";
				echo json_encode($notif);
			}
		}
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *											Delai de réalisation
	 *-----------------------------------------------------------------------------------------
	 */
	public function delai_realisation()
	{
		
	}

	/*
	 *-----------------------------------------------------------------------------------------
	 *											Test
	 *-----------------------------------------------------------------------------------------
	 */
	public function test() 
	{
		
	}

}