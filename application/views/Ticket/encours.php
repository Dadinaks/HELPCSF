<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img8.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2 || $this->session->userdata('role') == 3 || $this->session->userdata('role') == 5) {  ?>
                <h4 class="card-title">Liste des tickets en cours de traitement</h4>
                <?php } else {  ?>
                    <h4 class="card-title">Liste des tickets prises en charge</h4>
                <?php } ?>
                <hr>

                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped" id="tb_encours">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Numéro</th>
                                <th class="font-weight-bold">Saisisseur</th>
                                <th class="font-weight-bold">Objet</th>
                                <th class="font-weight-bold">Date de Traitement</th>
                                <th class="font-weight-bold">Date de réception</th>
                                <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) {  ?>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                                <?php }  ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($tickets as $row) : ?>
                            <tr>
                                <td><span class="font-weight-bold"><?php echo $row->numTicket; ?></span></td>
                                <td><span class="font-weight-bold"><?php echo $row->info_saisisseur; ?></span></td>
                                <td class="text-left"><?php echo $row->objet; ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateEncours)); ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateDemande)); ?></td>
                            
                            <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) {  ?>
                                <td>
                                    <?php
                                    $matricul_verif = strpos($row->info_saisisseur, $this->session->userdata('matricule'));
                                    if ($matricul_verif === false) {
                                    ?>
                                    <a href="<?php echo base_url('Ticket/traitement/' . $row->id . '/Voir'); ?>" class="btn-floating btn-sm btn-info" data-tooltip="tooltip" data-placement="bottom" title="Visualiser"><i  class="far fa-eye"></i></a>
                                    <?php } else { ?>
                                    <a href="<?php echo base_url('Ticket/traitement/' . $row->id); ?>" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Traiter le ticket"><i class="fas fa-tasks"></i></a>
                                    <?php } ?>

                                    <?php if ($this->session->userdata('role') == 1) { ?>
                                    <a class="btn-floating btn-sm btn-amber" data-toggle="modal" data-target="#modalAssigner" data-keyboard="false" data-backdrop="static" data-id="<?php echo $row->id; ?>" data-numTicket="<?php echo $row->numTicket; ?>" data-tooltip="tooltip" data-placement="bottom" title="Réassigner à un autre juriste"><i class="fas fa-user-tag"></i></a>
                                    <?php } ?>

                                    <a class="btn-floating btn-sm btn-danger" data-toggle="modal" data-target="#modalAbandonner" data-keyboard="false" data-backdrop="static" data-id="<?php echo $row->id; ?>" data-demande="<?php echo $row->idDemande; ?>" data-numTicket="<?php echo $row->numTicket; ?>" data-tooltip="tooltip" data-placement="bottom" title="Abandonner le ticket"><i class="fas fa-times"></i></a>
                                </td>
                            <?php } ?>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Assigner Utilisateur -->
<div class="modal fade" id="modalAssigner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img6.png') ?>" alt="avatar" class="rounded-circle img-responsive">
            </div>
            
			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Assigner le ticket numéro :<br><span class="font-weight-bold numTicket"></span> à </h5>
				<hr>

				<?php echo form_open('Ticket/Reassigner'); ?>
                    <input type="hidden" id="idTicket_assigner" name="idTicket_assigner">

                    <div class="pb-3">
                        <select id="assigner" name="assigner" class="browser-default custom-select custom-select-sm" required>
                            <option class="font-weight-bold" selected disabled>-- Séléction CSF --</option>
                            <?php
                            $data['utilisateur'] = $this->UtilisateurModel->find('utilisateur.profil in (1,2)');

                            foreach ($data['utilisateur'] as $utilisateur): ?>
                                <option value="<?php echo $utilisateur->idUtilisateur; ?>">
                                    <?php echo $utilisateur->matricule; ?> - <?php echo $utilisateur->nom; ?> <?php echo $utilisateur->prenom; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Valider</button>
                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Assigner Utilisateur -->

<!-- Modal Abandonner -->
<div class="modal fade" id="modalAbandonner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?php echo base_url('assets/Images/img5.png') ?>" alt="icon" class="rounded-circle img-responsive">
            </div>

            <div class="modal-body text-center mb-1">
                <h5 class="mt-1 mb-2">Abandonner le ticket numéro : <span class="font-weight-bold text-danger objet"></span>
                </h5>
                <hr>

                <?php echo form_open('Ticket/Abandonner/encours'); ?>
                    <input type="hidden" id="idTicket_abandonner" name="idTicket_abandonner">
                    <input type="hidden" id="idDemande_abandonner" name="idDemande_abandonner">
                    <div class="md-form">
                        <textarea id="motif_abandon" name="motif_abandon" class="md-textarea form-control" rows="4" required></textarea>
                        <label for="motif_abandon">Motifs d'abandon</label>
                    </div>

                    <button type="submit" class="btn btn-sm btn-rounded btn-danger"><i class="fas fa-times mr-2"></i>Abandonner</button>
                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Abandonner -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#modalAssigner').on('show.bs.modal', function (e) {
            var idTicket  = $(e.relatedTarget).attr('data-id');
            var numticket = $(this).find('.numTicket');

            $.getJSON("<?php echo base_url("Ticket/select/") ?>" + idTicket, function(data){
                $.each(data, function (key, value) {
                    numticket.text(value.numTicket);
                });
            });

            $(this).find('.modal-body #idTicket_assigner').val(idTicket);
            
        });

        $('#modalAbandonner').on('show.bs.modal', function (e) {
            var idTicket  = $(e.relatedTarget).attr('data-id');
            var idDemande = $(e.relatedTarget).attr('data-demande');
            var objet     = $(e.relatedTarget).attr('data-numTicket');

            $(this).find('.modal-body #idTicket_abandonner').val(idTicket);
            $(this).find('.modal-body #idDemande_abandonner').val(idDemande);
            $(this).find('.objet').text(objet);
        });

        $('#tb_encours').DataTable({
            "order": [[5, "desc"]],
            "language" : {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
                "sInfo":           "_START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty":      "0 à 0 sur 0 élément",
                "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Eléments à afficher _MENU_",
                "sLoadingRecords": "Chargement...",
                "sProcessing":     "Traitement...",
                "sSearch":         "<i class='fas fa-search'></i>",
                "sZeroRecords":    "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst":    "Premier",
                    "sLast":     "Dernier",
                    "sNext":     "Suivant",
                    "sPrevious": "Précédent"
                },
                 "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            },
            "pageLength" : 5,
            "lengthMenu" : [5, 10, 15, 100]
        });
        $('.dataTables_length').addClass('bs-select');
    });

	$('#modalAbandonner').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
	});
</script>