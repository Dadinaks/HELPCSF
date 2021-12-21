<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img17.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">Liste des échanges interne</h4>
                <hr>

                <div class="">
                    <table class="table table-sm table-striped" id="tb_echange">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Envoyeur</th>
                                <th class="font-weight-bold">Ticket concerner</th>
                                <th class="font-weight-bold">Objet d'echange</th>
                                <th class="font-weight-bold">Date de réception</th>
                                <th class="font-weight-bold">Fichier attacher</th>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                             <?php foreach ($echanges as $row) : ?>
                            <tr>
                                <td class="font-weight-bold"><?php echo $row->info_Envoyeur; ?></td>
                                <td class="font-weight-bold"><?php echo $row->numTicket; ?></td>
                                <td class="text-left"><?php echo $row->objet_echange; ?></td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateEnvoie)); ?></td>
                                <td class="text-left">
                                    <?php if($row->pj_echange != NULL) :
                                                $pj = explode(',', $row->pj_echange);
                                                foreach ($pj as $file) :
                                        ?>
                                        <a href="<?php echo base_url('/assets/Fichiers/'. $file); ?>" target="_blank"><i class="fas fa-paperclip mr-2"></i><?php echo $file; ?></a>
                                        <?php
                                                endforeach; 
                                            endif; ?>
                                    </td>
                                <td>
                                    <a href="<?php echo base_url('Echange/message/' . $row->idEchange); ?>" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Consulter"><i class="fas fa-eye"></i></a>
                                </td-->
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tb_echange').DataTable({
            "order": [[3, "desc"]],
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