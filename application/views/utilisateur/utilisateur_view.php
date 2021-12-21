<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img10.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">
                    Liste des utilisateurs 
                    <a href="" class="btn-floating btn-sm btn-info" data-toggle="modal" data-target="#modalUser" data-keyboard="false" data-backdrop="static" data-tooltip="tooltip" data-placement="bottom" title="Ajouter"><i class="fas fa-user-plus"></i></a>
                </h4>
                <hr>
                <div class="row text-center">
                    <div class="offset-6 col-6">
                        <div class="row">
                            <div class="offset-xl-5 offset-lg-5 offset-md-5 col-4 col-lg-4 col-md-4 col-sm-12">
                                <input list="agence_user" id="filtre_agence_user" name="agence_user" class="browser-default custom-select custom-select-sm" placeholder="-- Filtre Agence --" required>
                                <datalist id="agence_user">
                                    <?php $agence = $this->AgenceModel->find();
                                    foreach ($agence as $row): ?>
                                        <option value="<?php echo $row->agence; ?>"><?php echo $row->agence; ?></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>

                            <div class="col-3 col-3 col-lg-3 col-md-3 col-sm-12">
                                <select class="browser-default custom-select custom-select-sm" id="filtre_profil_user" required>
                                    <option class="font-weight-bold" selected disabled>-- Filtre Profil --</option>
                                    <option value="Tout">Tous</option>
                                    <?php $data['profiles'] = $this->ProfilModel->find();
                                    foreach ($data['profiles'] as $row) { ?>
                                        <option value="<?php echo $row->idProfil; ?>"><?php echo $row->role; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm table-striped" id="tb_utilisateur">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Matricule</th>
                                <th class="font-weight-bold">Nom et Prénom(s)</th>
                                <th class="font-weight-bold">E-mail</th>
                                <th class="font-weight-bold">Agence</th>
                                <th class="font-weight-bold">Direction</th>
                                <th class="font-weight-bold">Unité</th>
                                <th class="font-weight-bold">Poste</th>
                                <th class="font-weight-bold">Profil</th>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('utilisateur/modal_utilisateur'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        var tableau = $('#tb_utilisateur').DataTable({
            "order": [[1, "asc"]],
            "dom"    : 'Bfrtip',
        	"buttons": [
            	{
            		extend : 'excel',
					text   : 'Excel<i class="fas fa-download ml-2"></i>',
					className : 'btn btn-sm btn-rounded btn-warning'
				}
			],
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
            "lengthMenu" : [5, 10, 15, 100],
            "columns": [{
                    "title" : "Matricule",
                    "data"  : null,
                    "render": function (data, type, row, meta){
                            if (data.statutCompte == 'Désactivé') {
                                return data.matricule;
                            } else {
                                return '<span class="font-weight-bold">' + data.matricule + '</span>';
                            }
                        }
                }, {
                    "title" : "Nom et Prénom(s)",
                    "data"  : null,
                    "render": function (data, type, row, meta){
                            if (data.statutCompte == 'Désactivé') {
                                return data.nom + " " + data.prenom;
                            } else {
                                return '<span class="font-weight-bold">' + data.nom + ' ' + data.prenom + '</span>';
                            }
                        }
                }, {
                    "title" : "E-mail",
                    "data"  : "email"
                }, {
                    "title" : "Agence",
                    "data"  : "agence"
                }, {
                    "title" : "Direction",
                    "data"  : "direction"
                }, {
                    "title" : "Unité",
                    "data"  : "unite"
                }, {
                    "title" : "Poste",
                    "data"  : "poste"
                }, {
                    "title" : "Profil",
                    "data"  : "role"
                }, {
                    "title" : "Action",
                    "data"  : null,
                    "render": function (data, type, row, meta) {
                        var button = '';
                        if (data.statutCompte == 'Désactivé') {
                            button = '<a href="<?php echo base_url("Utilisateur/Activer/"); ?>' + data.idUtilisateur +'" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Activé"><i class="fas fa-user-check"></i></a>';
                        } else {
                            button = '<a href="<?php echo base_url("Utilisateur/Desactiver/"); ?>' + data.idUtilisateur +'" class="btn-floating btn-sm btn-danger" data-tooltip="tooltip" data-placement="bottom" title="Désactivé"><i class="fas fa-user-times mr-2"></i></a>';
                        }
                        return button + ' ' + '<a class="btn-floating btn-sm btn-info" data-toggle="modal" data-target="#modalEditUser" data-statut="'+ data.statutCompte +'" data-id="' + data.idUtilisateur + '"  data-matricule="' + data.matricule +'" data-nom="' + data.nom +'" data-prenom="' + data.prenom +'" data-email="' + data.email +'" data-agence="' + data.idAgence +'" data-direction="' + data.direction +'" data-unite="' + data.unite +'" data-poste="' + data.poste +'" data-profile="' + data.idProfil +'" data-tooltip="tooltip" data-placement="bottom" title="Modifier les informations" data-keyboard="false" data-backdrop="static"><i class="fas fa-user-edit mr-2"></i></a>';
                    }
                }
            ]
        });
        $('.dataTables_length').addClass('bs-select');

        $.getJSON("<?php echo base_url("Utilisateur/tableau_user") ?>", function(data){
            tableau.clear().draw();
            $.each(data.utilisateurs, function(key, utilisateur){
                tableau.row.add(utilisateur);
                tableau.draw();
            });
        });
       
        $("#filtre_agence_user").on("change", function() {
            var a    = $("#filtre_agence_user").val();
            var agence = a.replace(' ', '%20');

            $.getJSON("<?php echo base_url("Utilisateur/filtrer_par_agence/") ?>" + agence, function(data){
                tableau.clear().draw();
                $.each(data.agences, function(key, agence){
                    tableau.row.add(agence);
                    tableau.draw();
                });
            });
        });

        $("#filtre_profil_user").on("change", function() {
            if ($("#filtre_profil_user").val() != 'Tout'){
                $.getJSON("<?php echo base_url("Utilisateur/filtrer_par_profil/") ?>" + $("#filtre_profil_user").val(), function(data){
                    tableau.clear().draw();
                    $.each(data.profils, function(key, profil){
                        tableau.row.add(profil);
                        tableau.draw();
                    });
                });
            } else {
                $.getJSON("<?php echo base_url("Utilisateur/tableau_user") ?>", function(data){
                    tableau.clear().draw();
                    $.each(data.utilisateurs, function(key, utilisateur){
                        tableau.row.add(utilisateur);
                        tableau.draw();
                    });
                });
            }
        });
    });
</script>