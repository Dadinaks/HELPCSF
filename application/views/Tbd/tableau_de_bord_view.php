<style type="text/css">
	.shadow-textarea textarea.form-control::placeholder {
		font-weight: 300;
	}

	.shadow-textarea textarea.form-control {
		padding-left: 0.8rem;
	}

	.bg-grena{
		background-color: #BF2C36;
	}

	.bg-orange{
		background-color: #F77E04;
	}

	.bg-vert{
		background-color: #117D09;
	}
</style>

<script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/dataTables.buttons.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/buttons.flash.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/jszip.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/pdfmake.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/vfs_fonts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/buttons.html5.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/buttons.print.min.js'); ?>"></script>

<ul class="nav nav-tabs md-tabs" id="myTabMD" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Tableau de bord</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Tous les Tickets</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" id="contact-tab-md" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md" aria-selected="false">Graphe</a>
	</li>
</ul>

<div class="tab-content card pt-4 grey lighten-3" id="myTabContentMD">
	<!-- Tab 1 -->
	<div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
		<div class="mt-3">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<!-- card count -->
					<div class="row">
						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo base_url('ticket/Termines'); ?>">
							<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-archive fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title font-weight-bold text-right">Terminé</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Terminé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo base_url('ticket/Recus'); ?>">
							<div class="card text-white bg-default mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-alt fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">Reçu</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Reçu'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo base_url('ticket/Encours'); ?>">
							<div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-signature fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">Encours</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Encours'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo base_url('ticket/Revision'); ?>">
							<div class="card text-white bg-orange mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-contract fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">A réviser</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Révisé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12 offset-lg-1 offset-md-1" href="<?php echo base_url('ticket/Validation'); ?>">
							<div class="card text-white bg-vert mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-import fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">A valider</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('A_Validé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo base_url('ticket/Refuses'); ?>">
							<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-excel fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">Refusé</h5>
											<p class="card-text text-white text-right"><?php echo $this->TicketModel->count('Refusé'); ?></p>
										</div>
									</div>
								</div>
							</div>
						</a>

						<a class="col-lg-3 col-md-3 col-sm-12" href="<?php echo base_url('ticket/Abandon'); ?>">
							<div class="card text-white bg-grena mb-3" style="max-width: 20rem;">
								<div class="card-body">
									<div class="row">
										<div class="col-2">
											<p class="card-text text-white">
												<i class="fas fa-file-excel fa-4x"></i>
											</p>
										</div>
										<div class="col-10">
											<h5 class="card-title text-right">Abandonné</h5>
											<p class="card-text text-white text-right">
											<?php 
												$abandon = $this->TicketModel->count('Abandonné') + $this->TicketModel->count('Abandonnée');
												echo $abandon; 
											?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</a>
						
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="card mb-3">
								<div class="card-header font-weight-bold">Nombre de tickets traités</div>

								<div class="card-body">
									<div class="row">
										<div class="col-6 offset-3">
											<select class="browser-default custom-select custom-select-sm mb-4" name="" id="statutTicket">
												<option class="font-weight-bold" selected disabled>-- Filtrer par statut --</option>
												<option value="Tout">Tous</option>
												<option value="Termine">Terminé</option>
												<option value="Encours">En cours de traitement</option>
												<option value="Revise">A réviser</option>
												<option value="A_Valide">A Validé</option>
												<option value="Refuse">Refusé</option>
												<option value="Abandonne">Abandonné</option>
											</select>
										</div>
									</div>

									<table id="dtnbTicket" class="table table-sm table-striped" cellspacing="0" width="100%">
										<thead class="">
										<tr>
											<th class="font-weight-bold">Equipe CSF</th>
											<th class="font-weight-bold">Nombre de Ticket(s)</th>
										</tr>
										</thead>

										<tbody id="nbTicket" class="rgba-white-light">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /.card count -->
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="row">
						<!-- <div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card mb-3">
								<div class="card-header font-weight-bold">Nombre de Tickets traités</div>
								<div class="card-body">
									<canvas id="csf"></canvas>
								</div>
							</div>
						</div> -->

						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card mb-3">
								<div class="card-header font-weight-bold">Pourcentage de tickets par statut</div>
								<div class="card-body">
									<canvas id="tic"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</div>

  	<!-- Tab 2 -->
  	<div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
  		<h4 class="text-center mt-4 font-weight-bold">Liste de tous les tickets</h4>

  		<div class="row">
			  <div class="col-6 offset-6">
			    <div class="row">
					<div class="col-3">
						<select class="browser-default custom-select custom-select-sm mb-4" name="" id="dateStatut">
							<option class="font-weight-bold" selected disabled>-- Date à rechercher --</option>
							<option value="Tout">Tous</option>
							<option value="dateReception">Date de réception</option>
							<option value="dateTermine">Date de validation</option>
							<option value="dateEncours">Date de traitement</option>
							<option value="dateRevise">Date de revision</option>
							<option value="dateAvantValidation">Date de transmission</option>
							<option value="dateRefus">Date de refus</option>
							<option value="dateAbandon">Date d'abandon</option>
						</select>
					</div>

					<div class="col-3"><input type="text" name="date1" id="date1" placeholder="Date Début" class="form-control form-control-sm" autocomplete="off" disabled></div>

					<div class="col-3"><input type="text" name="date2" id="date2" placeholder="Date Fin" class="form-control form-control-sm" autocomplete="off" disabled></div>

					<div class="col-3"><button class="btn btn-sm btn-rounded btn-default" id="rd" style="margin-top: 0px;"><i class="fas fa-search mr-2"></i>rechercher</button></div>
				</div>
		  	</div>
  		</div>

  		<div class="table-responsive text-nowrap">
  			<table id="dtall" class="table table-sm table-striped" id="tb_avalide">
  				<thead>
  					<tr>
  						<th class="font-weight-bold">Numéro du Ticket</th>
  						<th class="font-weight-bold">Demandeur</th>
  						<th class="font-weight-bold">Objet</th>
  						<th class="font-weight-bold">Date de réception</th>
  						<th class="font-weight-bold">Statut</th>
  						<th class="font-weight-bold">Délai de traitement</th>
  						<th class="font-weight-bold">Date de traitement</th>
  						<th class="font-weight-bold">Date de validation</th>
  						<th class="font-weight-bold">Date de transmission</th>
  						<th class="font-weight-bold">Date de revision</th>
  						<th class="font-weight-bold">Date de refus</th>
  						<th class="font-weight-bold">Date d'abandon</th>
  						<th class="font-weight-bold">Saisisseur</th>
  						<th class="font-weight-bold">Valideur</th>
  					</tr>
  				</thead>

  				<tbody id="tball" class="text-center"></tbody>
  			</table>
		</div>
		  
		<!-- Modal Afficher -->
		<div class="modal fade" id="modalAfficher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<img src="<?php echo base_url('assets/Images/img4.png') ?>" alt="icon" class="rounded-circle img-responsive">
					</div>
					
					<div class="modal-body text-center mb-1">
						<h5 class="mt-1 mb-2">Contenu du ticket numéro: <span class="font-weight-bold text-danger numTicket"></span></h5>
						<hr>

						<div class="text-left" id="contenu">

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal Afficher -->
  	</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {
		// tableau tab 1 Nombre de tickets traités par csf
		var tbl_dtnbTicket = $('#dtnbTicket').DataTable({
            "order": [[1, "desc"]],
		    "columns": [{
			    	"title": "CSF",
			        "data": "csf",
			        "class" : "font-weight-bold"
			    }, {
			        "title": "Nombre de Ticket(s)",
			        "data": "nb"
				}],
			"searching": false,
            "language" : {
                "sEmptyTable":     "Aucune donnée disponible dans le tableau",
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
			"pageLength"  : 5,
			"bPaginate": true,
			"bLengthChange": false,
			"bFilter": true,
			"bInfo": false,
			"bAutoWidth": false
		});

	    $.getJSON("<?php echo base_url("Tableau_de_bord/nombre_ticket_csf") ?>", function(data){
			tbl_dtnbTicket.clear().draw();
			$.each(data.nombres, function(key, nombre){
				tbl_dtnbTicket.row.add(nombre);	
				tbl_dtnbTicket.draw();
			});
		});

	    $("#statutTicket").on('change', function(){
	    	if ($("#statutTicket").val() == 'Tout'){
	    		$.getJSON("<?php echo base_url("Tableau_de_bord/nombre_ticket_csf") ?>", function(data){
					tbl_dtnbTicket.clear().draw();
					$.each(data.nombres, function(key, nombre){
						tbl_dtnbTicket.row.add(nombre);	
						tbl_dtnbTicket.draw();
					});
				});
	    	} else {
	    		$.getJSON("<?php echo base_url("Tableau_de_bord/nombre_ticket_csf/") ?>" + $("#statutTicket").val(), function(data){
					tbl_dtnbTicket.clear().draw();
					$.each(data.nombres, function(key, nombre){
						tbl_dtnbTicket.row.add(nombre);	
						tbl_dtnbTicket.draw();
					});
				});
	    	}
	    });




	    /*//graphe
	    var ctxP = document.getElementById("csf").getContext('2d');
	    var myPieChart = new Chart(ctxP, {
	        type: 'pie',
	        data: {
	            labels: ["Responsable CSF", "CSF"],

	            datasets: [{
	                data: [
						<?php //echo $this->TicketModel->countby('Responsable CSF'); ?>,
						<?php //echo $this->TicketModel->countby('CSF'); ?>,
	                ],

	                backgroundColor: ["#04C932", "#FFCD00"],
	                hoverBackgroundColor: ["#04C932", "#FFCD00"]
	            }]
	        },
	        options: {
	            responsive: true
	        }
	    });*/

	    // Calcul pourcentage
	    var termine 	= (parseInt(<?php echo $this->TicketModel->count('Terminé'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(0);
	    var recu 		= (parseInt(<?php echo $this->TicketModel->count('Reçu'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(0);
	    var encours 	= (parseInt(<?php echo $this->TicketModel->count('Encours'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(0);
	    var refuse 		= (parseInt(<?php echo $this->TicketModel->count('Refusé'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(0);
	    var abandonne 	= (parseInt(<?php echo $this->TicketModel->count('Abandonné') + $this->TicketModel->count('Abandonnée'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(0);
	    var revise	 	= (parseInt(<?php echo $this->TicketModel->count('Revise'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(0);
	    var a_valide 	= (parseInt(<?php echo $this->TicketModel->count('A_Valide'); ?>) * 100 / parseInt(<?php echo $this->TicketModel->count(); ?>)).toFixed(0);

	    var ctxP = document.getElementById("tic").getContext('2d');
	    var myPieChart = new Chart(ctxP, {
	        type: 'pie',
	        data: {
	            labels: [ "Terminé", "Reçu", "En cours", "Refusé", "Abandonné", "A reviser", "A valider"],

	            datasets: [{
	                data: [termine, recu, encours, refuse, abandonne, revise, a_valide],
	                backgroundColor: ["#04C932", "#2BBBAD", "#FFBB33", "#FF3547", "#BF2C36", "#F77E04", "#117D09"],
	                hoverBackgroundColor: ["#04C932", "#2BBBAD", "#FFBB33", "#FF3547", "#BF2C36", "#F77E04", "#117D09"]
	            }]
	        },
	        options: {
	            responsive: true,
				tooltips: {
					callbacks: {
						label: function(tooltipItem, data) {
							var dataset = data.datasets[tooltipItem.datasetIndex];
							var data 	= dataset.data[tooltipItem.index];
							return data + "%";
						}
					}
	        	}
			}
	    });






	    // tableau tab 2 Tous les tickets
	    //tab 2
        var tableau = $('#dtall').DataTable({
			"order"  : [[0, "desc"]],
			"dom"    : 'Bfrtip',
        	"buttons": [
            	{
            		extend : 'excel',
					text   : 'Excel<i class="fas fa-download ml-2"></i>',
					className : 'btn btn-sm btn-rounded btn-warning'
				}
			],
		    "columns": [{
			    	"title" : "Numéro du Ticket",
			        "data"  : null,
			        "class" : "font-weight-bold",
					"render": function ( data, type, row, meta ) {
						var numero = '';
						var statut = data.statutTicket;

						switch (statut){
							case "Terminé" :
								numero = '<a href="<?php echo base_url("Ticket/Visualiser/" ); ?>' + data.idTicket + '/Termine">'+ data.numTicket  +' </a>';
								break;
							case "Reçu" :
								numero = '<a href="" data-toggle="modal" data-target="#modalAfficher" data-stat="recu" data-keyboard="false" data-backdrop="static" data-id="' + data.idTicket + '" data-numTicket="' + data.numTicket + '">'+ data.numTicket  +' </a>';
								break;
							case "Encours" :
								numero = '<a href="<?php echo base_url("Ticket/traitement/" ); ?>' + data.idTicket + '/Voir">'+ data.numTicket  +' </a>';
								break;
							case "A_Validé" :
								numero = data.numTicket;
								break;
							case "Abandonné" :
								numero = '<a href="<?php echo base_url("Ticket/traitement/"); ?>' + data.idTicket + '/Abandonne">'+ data.numTicket  +' </a>';
								break;
							case "Abandonnée" :
								numero = '<a data-toggle="modal" data-target="#modalAfficher" data-stat="abandon" data-keyboard="false" data-backdrop="static"data-id="' + data.idTicket + '" data-numTicket="' + data.numTicket + '">'+ data.numTicket  +' </a>';
								break;
							case "Refusé" :
								numero = '<a data-toggle="modal" data-target="#modalAfficher" data-stat="refuse" data-keyboard="false" data-backdrop="static"data-id="' + data.idTicket + '" data-numTicket="' + data.numTicket + '">'+ data.numTicket  +' </a>';
								break;
							case "Révisé" :
								numero = data.numTicket;
								break;

							default:
							numero = data.numTicket;
						}
						return numero;
					}
			    }, {
			        "title": "Demandeur",
					"data" : "demandeur",
					"class": "text-left"
			    }, {
			        "title": "Objet",
			        "data" : null,
					"class": "text-left",
					"render": function ( data, type, row, meta ) {
						var objet = '';
						var obj   = data.objet;
						obj.length > 40 ? objet = '...'.padStart(40, obj) :	objet = obj;
						return objet;
					}
			    }, 	{
			        "title": "Date de réception",
					"data" : "dateReception"
			    }, {
			        "title": "Statut",
			        "data" : "statutTicket",
					"render" : function ( data, type, row, meta ) {
						var a      = "";
						var statut = data;

						switch (statut){
							case "A_Validé" :
								a = '<span class="white-text bg-vert font-weight-bold" style="padding : 3px; border-radius: 3px;">A valider</span>';
								break;
							case "Terminé" :
								a = '<span class="white-text bg-success font-weight-bold" style="padding : 3px; border-radius: 3px;">Terminé</span>';
								break;
							case "Reçu" :
								a = '<span class="white-text bg-default font-weight-bold" style="padding : 3px; border-radius: 3px;">Reçu</span>';
								break;
							case "Abandonné" :
								a = '<span class="white-text bg-grena font-weight-bold" style="padding : 3px; border-radius: 3px;">Abandonné</span>';
								break;
							case "Abandonnée" :
								a = '<span class="white-text bg-grena font-weight-bold" style="padding : 3px; border-radius: 3px;">Abandonné</span>';
								break;
							case "Refusé" :
								a = '<span class="white-text bg-danger font-weight-bold" style="padding : 3px; border-radius: 3px;">Refusé</span>';
								break;
							case "Encours" :
								a = '<span class="white-text bg-warning font-weight-bold" style="padding : 3px; border-radius: 3px;">En cours de traitement</span>';
								break;
							case "Révisé" :
								a = '<span class="white-text bg-orange font-weight-bold" style="padding : 3px; border-radius: 3px;">A reviser</span>';
								break;
						}
                        return  a 
                    } 
			    }, {
			        "title": "Délai de traitement",
					"data" : "delai_1"
			    }, {
			        "title": "Date de traitement",
			        "data" : "dateEncours"
			    }, {
			        "title": "Date de validation",
					"data" : "dateTermine"
			    }, {
			        "title": "Date de transmission",
			        "data" : "dateAvantValidation"
			    }, {
			        "title": "Date de revision",
			        "data" : "dateRevise"
			    }, {
			        "title": "Date de refus",
			        "data" : "dateRefus"
			    }, {
			        "title": "Date d'abandon",
			        "data" : "dateAbandon"
			    }, {
			        "title": "Saisisseur",
			        "data" : "saisisseur",
					"class": "text-left"
			    }, {
			        "title": "Valideur",
					"data" : "valideur",
					"class": "text-left"
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
            "pageLength" : 10,
			"lengthMenu" : [5, 10, 15, 20, 25, 50, 100],
			"bAutoWidth": false
        });
        $('.dataTables_length').addClass('bs-select');

        $.getJSON("<?php echo base_url("Tableau_de_bord/recuperer_tous_ticket") ?>", function(data){
        	tableau.clear();
			$.each(data.tickets, function(key, ticket){
				tableau.row.add(ticket);	
				tableau.draw();
			});
		});

		$(function() {
			$("#date1").datepicker({ dateFormat: 'dd/mm/yy' });
			$("#date2").datepicker({ dateFormat: 'dd/mm/yy' });
		});

		$("#dateStatut").on("change", function() {
			var dateStatut = $("#dateStatut").val();

			if(dateStatut != 'Tout'){			
				$("#date1").attr("disabled", false);
				$("#date2").attr("disabled", false);
			} else {
				$("#date1").val("");
				$("#date2").val("");
				$("#date1").attr("disabled", true);
				$("#date2").attr("disabled", true);

				$.getJSON("<?php echo base_url("Tableau_de_bord/recuperer_tous_ticket") ?>", function(data){
					tableau.clear().draw();
					$.each(data.tickets, function(key, ticket){
						tableau.row.add(ticket);	
						tableau.draw();
					});
				});
			}
		});

		$("#rd").on("click", function(){
			var d1    = $("#date1").val();
			var d2 	  = $("#date2").val();
			var str1  = d1.replace('/', '-');
			var str2  = d2.replace('/', '-');
			var date1 = str1.replace('/', '-');
			var date2 = str2.replace('/', '-');
			var dateStatut = $("#dateStatut").val();
			
			$.getJSON("<?php echo base_url("Tableau_de_bord/entre_2_date/") ?>" + dateStatut + '/' + date1 + '/' + date2 , function(data){
				tableau.clear().draw();
				$.each(data.tickets, function(key, ticket){
					tableau.row.add(ticket);	
					tableau.draw();
				});
			});
		});
	});	
</script>