<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img7.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">
                    Suivis DOS
                    <a href="<?php echo base_url('DOS/nouveau'); ?>" class="btn-floating btn-sm btn-info" data-tooltip="tooltip" data-placement="bottom" title="Ajouter"><i class="fas fa-plus"></i></a>
                </h4>

                <hr>

                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped" id="tb_dos">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Référence</th>
                                <!--th class="font-weight-bold">LIEN VERS PARTAGE</th-->
                                <th class="font-weight-bold">Origine</th>
                                <th class="font-weight-bold">Date Info/Avis DG</th>
                                <th class="font-weight-bold">Date envoi SAMIFIN</th>
                                <th class="font-weight-bold">Saisisseur</th>
                                <th class="font-weight-bold">Code Client</th>
                                <th class="font-weight-bold">Nom Client</th>
                                <!--th class="font-weight-bold">TYPE OPERATIONS</th-->
                                <!--th class="font-weight-bold">MOTIF</th>
                                <th class="font-weight-bold">MONTANT EN JEU</th>
                                <th class="font-weight-bold">DEVISE (Au choix : MGA, USD, EUR)</th-->
                                <th class="font-weight-bold">DATE DE DECISION</th>
                                <!--th class="font-weight-bold">DETAILS DECISION</th>
                                <th class="font-weight-bold">ARGUMENTS DE LA DECISION</th>
                                <th class="font-weight-bold">Mail pour mise en œuvre par les UO des décisions</th>
                                <th class="font-weight-bold">DATE RUPTURE DE LA RELATION</th>
                                <th class="font-weight-bold">DATE DE SUSPENSION DE LA RUPTURE DE LA RELATION</th>
                                <th class="font-weight-bold">MOTIFS DE LA SUSPENSION</th>
                                <th class="font-weight-bold">DATE INSERTION WATCHLIST</th>
                                <th class="font-weight-bold">DATE INSERTION CODE OPPOSITION</th>
                                <th class="font-weight-bold">Suivi décisions et observations</th-->
                                <?php $session = $this->session->userdata('role');
                                    if ($session != 4 ){ ?>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($dos as $row) : ?>
                            <tr>
                                <td><?php echo $row->reference; ?></td>
                                <td><?php echo $row->origine; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row->date_info_avis_dg)); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row->date_envoi_samifin)); ?></td>
                                <td><?php echo $row->saisisseur; ?></td>
                                <td><?php echo $row->code_client; ?></td>
                                <td><?php echo $row->nom_client; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row->date_decision)); ?></td>
                                <td></td>
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
        $('#tb_dos').DataTable({
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