<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img7.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">Liste des tickets à valider</h4>
                <hr>

                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped" id="tb_avalide">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Numéro</th>
                                <th class="font-weight-bold">Saisisseur</th>
                                <th class="font-weight-bold">Objet</th>
                                <th class="font-weight-bold">Date fin de Traitement</th>
                                <th class="font-weight-bold">Date de réception</th>
                                <?php $session = $this->session->userdata('role');
                                    if ($session != 4 ){ ?>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($tickets as $row) : ?>
                            <tr>
                                <td><span class="font-weight-bold"><?php echo $row->numTicket; ?></span></td>
                                <td><span class="font-weight-bold"><?php echo $row->info_saisisseur; ?></span></td>
                                <td class="text-left"><?php echo $row->objet; ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateAvantValidation)); ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateDemande)); ?></td>
                                <td>
                                    <?php 
                                    $profil = $this->session->userdata('role');
                                    if ($profil != 4){
                                        if($profil == 1){ ?>
                                        <a href="<?php echo base_url('Ticket/traitement/' . $row->id . '/Consulter'); ?>" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Consulter le ticket pour valider"><i class="fas fa-check"></i></a>
                                        <?php   } else {  ?>
                                        <a href="<?php echo base_url('Ticket/traitement/' . $row->id . '/Consulter'); ?>" class="btn-floating btn-sm btn-info" data-tooltip="tooltip" data-placement="bottom" title="Consulter le ticket pour valider"><i class="fas fa-eye"></i></a>
                                        <?php   }
                                    } ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tb_avalide').DataTable({
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
</script>