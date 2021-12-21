<?php

Class LdapModel extends CI_MOdel
{
	public function find()
	{
		$query = $this->db->get('ldap');
		return $query->result();
	}

	public function update()
	{
		$ldap = $this->input->post('check_ldap');
		return $this->db->update('ldap', ["ldap" => $ldap]);
	}
}