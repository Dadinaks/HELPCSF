<?php

class LdapController extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('login_state'))
			redirect("Login");
	}

	public function ldap_control()
	{
		$data['ldap'] = $this->LdapModel->find();
		echo json_encode($data['ldap'][0]->ldap);
	}

	public function update_ldap()
	{
		$this->LdapModel->update();
		redirect($_SERVER['HTTP_REFERER']); 
	}
}