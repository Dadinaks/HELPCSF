<?php

class AgenceModel extends CI_Model
{
	public function find($where = NULL)
	{
        if ($where != NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get('agence');
        
        return $query->result();
    }

    public function insert()
    {
        $data = array(
        	'codeAgence' => $this->input->post('code_ajout'),
            'agence' 	 => $this->input->post('agence_ajout')
        );

        return $this->db->insert('agence', $data);
    }

    public function update()
    {
        $data = array(
            'agence' 	 => $this->input->post('agence')
        );
        $this->db->where('idAgence', $this->input->post('idAgence'));

        return $this->db->update('agence', $data);
    }

    public function delete()
	{
		$this->db->where('idagence', $this->input->post('idAgence'));

		return $this->db->delete('agence');
    }
    
    public function count($where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
        $nb = $this->db->count_all_results('agence');

        return $nb;
    }
}