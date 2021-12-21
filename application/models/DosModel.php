<?php

class DosModel extends CI_Model
{
    public function find()
    {
        $query = $this->db->select('*, concat(u.matricule, " - ", u.nom, " ", u.prenom) as info_saisisseur')
            ->from('dos')
            ->join('utilisateur u', 'u.idUtilisateur = dos.saisisseur', 'inner')
            ->get();
        
        return $query->result();
    }

     public function insert()
     {        
        $data = array(
            'reference'             => $this->input->post('reference_dos'),
            'lien_partage'          => $this->input->post('lienpartage_dos'),
            'origine'               => $this->input->post('origine_dos'),
            'date_info_avis_dg'     => date('Y-m-d', strtotime($this->input->post('dateinfoavisDG'))),
            'date_envoi_samifin'    => date('Y-m-d', strtotime($this->input->post('dateSamifin'))),
            'saisisseur'            => $this->input->post('csf_dos'),
            'code_client'           => $this->input->post('Codecli_dos'),
            'nom_client'            => $this->input->post('nomcli_dos'),
            'type_operation'        => $this->input->post('typeoperation_dos'),
            'motif'                 => $this->input->post('motif_dos'),
            'montant_en_jeu'        => $this->input->post('montant_dos'),
            'devise'                => $this->input->post('devis_dos'),
            'date_decision'         => date('Y-m-d', strtotime($this->input->post('datedecision'))),
            'detail_decision'       => $this->input->post('detail_decision_dos'),
            'argument_decision'     => $this->input->post('argument_decision_dos'),
            'date_mail_decision'    => date('Y-m-d', strtotime($this->input->post('datemailuo'))),
            'date_rupture_relation' => date('Y-m-d', strtotime($this->input->post('daterupture'))),
            'date_suspension'       => date('Y-m-d', strtotime($this->input->post('datesusp'))),
            'Motif_suspension'      => $this->input->post('motif_suspension_dos'),
            'date_watchlist'        => date('Y-m-d', strtotime($this->input->post('datewatch'))),
            'date_code_opp_17'      => date('Y-m-d', strtotime($this->input->post('dateopp'))),
            'suivi'                 => $this->input->post('decision_observation_dos')
        );

        return $this->db->insert('dos', $data);
     }
}