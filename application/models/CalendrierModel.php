<?php

class CalendrierModel extends CI_model
{
	public function find($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}

	public function insert($table)
	{
		if ($table == 'ferie') {
			$data = array(
				'title' => $this->input->post('title_ferie'),
				'start' => $this->input->post('start_ferie')
			);
		} else {
			$idProfile = $this->input->post('profil');
			$jur 	   = $this->input->post('juristes');

			$this->db->select('nom, prenom');
			$this->db->from('utilisateur');
			$this->db->where('idUtilisateur', $jur);
			$query = $this->db->get();

			foreach ($query->result() as $row) {
				$juristes = $row->nom . ' ' . $row->prenom;
			}

			if ($idProfile == 1) {
				$couleur = 'rgb(0, 200, 81)';
			} elseif ($idProfile == 2) {
				$couleur = 'rgb(255, 187, 51)';
			} elseif ($idProfile == 3) {
				$couleur = 'rgb(51, 181, 229)';
			} else {
				$couleur = 'rgb(28, 35, 49)';
			}

			$data = array(
				'title'			  => 'Congé : ' . $juristes,
				'start'  		  => $this->input->post('date_debut_conge'),
				'end' 			  => $this->input->post('date_fin_conge'),
				'color' 		  => $couleur,
				'backgroundColor' => $couleur
			);
		}


		return $this->db->insert($table, $data);
	}

	/**
	 *	- Ne jamais appeler cette fontion svp...
	 */
	public function insertFerieDefault()
	{
		date_default_timezone_set('Africa/Nairobi');
		$year = 2018;

		while ($year <= 2037) {
			$data = array(
				array(
					'title' => 'Nouvel an',
					'start' => $year . '-01-01'
				),
				array(
					'title' => 'Journée internationale de la femme',
					'start' => $year . '-03-08'
				),
				array(
					'title' => 'Commémoration 1947',
					'start' => $year . '-03-29'
				),
				array(
					'title' => 'Fête du Travail',
					'start' => $year . '-05-01'
				),
				array(
					'title' => 'Fête de l\'independance',
					'start' => $year . '-06-26'
				),
				array(
					'title' => 'Assomption de la Sainte Vierge',
					'start' => $year . '-08-15'
				),
				array(
					'title' => 'Toussaint',
					'start' => $year . '-11-01'
				),
				array(
					'title' => 'Noël',
					'start' => $year . '-12-25'
				),
				array(
					'title' => 'Pâque',
					'start' =>  date("Y-m-d", easter_date($year))
				),
				array(
					'title' => 'Lundi de Pâque',
					'start' =>  date("Y-m-d", strtotime('+1 day', easter_date($year)))
				),
				array(
					'title' => 'Ascension',
					'start' =>  date("Y-m-d", strtotime('+39 day', easter_date($year)))
				),
				array(
					'title' => 'Pentecôte',
					'start' =>  date("Y-m-d", strtotime('+49 day', easter_date($year)))
				),
				array(
					'title' => 'Lundi de Pentecôte',
					'start' =>  date("Y-m-d", strtotime('+50 day', easter_date($year)))
				)
			);

			$this->db->insert_batch('ferie', $data);
			$year++;
		}
	}

}