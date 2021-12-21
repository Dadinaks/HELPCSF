<div class="row wow">
	<div class="col-5 col-xl-5 col-lg-5 col-md-5 col-sm-12">
		<div class="card testimonial-card">
			<div class="card-up default-color"></div>

			<div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img12.png'); ?>" class="rounded-circle" alt="icon">
			</div>

			<div class="card-body">
				<h4 class="card-title">Création d’une agence</h4>
				<hr>

				<div class="card-body">
					<?php echo form_open('Agence/Ajout'); ?>
						<div class="row justify-content-center">
							<div class="col-3">
								<div class="md-form">
									<input type="number" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" min="1" max="99999" id="code_ajout" name="code_ajout" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez renseigner le Code de l\'agence')" oninput="setCustomValidity('')">
									<label for="code">Code Agence</label>
									<small><?php echo form_error('code_ajout'); ?></small>
									<small id="validationCode" class="red-text"></small>
								</div>
							</div>
							<div class="col-5">
								<div class="md-form">
									<input type="text" id="agence_ajout" name="agence_ajout" class="form-control" required="" oninvalid="this.setCustomValidity('Veuillez renseigner le nom de l\'agence')" oninput="setCustomValidity('')">
									<label for="agence">Agence</label>
								</div>
							</div>
							<div class="md-form">
								<div class="col-2">
									<button id="save" class="btn btn-rounded btn-success btn-sm" disabled>Ajouter</button>
								</div>
							</div>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="col-7 col-xl-7 col-lg-7 col-md-7 col-sm-12">
		<div class="card testimonial-card">
			<div class="card-up default-color"></div>

			<div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img12.png'); ?>" class="rounded-circle" alt="icon">
			</div>

			<div class="card-body">
				<h4 class="card-title">Liste des agences</h4>
				<hr>

				<div class="card-body">
					<table class="table table-sm table-striped" id="tb_agence">
						<thead>
							<tr>
								<th class="font-weight-bold">Code agence</th>
								<th class="font-weight-bold">Agence</th>
								<th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($agences as $row) { ?>
							<tr>
								<td class="font-weight-bold"><?php echo $row->codeAgence; ?></td>
								<td><?php echo $row->agence; ?></td>
								<td>
									<a href="" class="btn-floating btn-sm btn-success" data-toggle="modal"
									   data-target="#modaleditLieu" data-keyboard="false" data-backdrop="static"
									   data-id="<?php echo $row->idAgence; ?>"
									   data-codeAgence="<?php echo $row->codeAgence; ?>"
									   data-agence="<?php echo $row->agence; ?>" data-tooltip="tooltip"
									   data-placement="bottom"
									   title="Modifier"><i class="fas fa-pencil-alt"></i></a>

									<a href="" class="btn-floating btn-sm btn-danger" data-toggle="modal"
									   data-target="#modaldeleteLieu" data-keyboard="false" data-backdrop="static"
									   data-id="<?php echo $row->idAgence; ?>" data-agence="<?php echo $row->agence; ?>"
									   data-count="<?php echo $this->UtilisateurModel->count('agence = ' . $row->idAgence) ?>"
									   data-tooltip="tooltip" data-placement="bottom"
									   title="Supprimer"><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>			
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal edit lieu -->
<div class="modal fade" id="modaleditLieu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img12.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Modifier Agence</h5>
				<hr>

				<?php echo validation_errors(); ?>
				<?php echo form_open('Agence/Modifier'); ?>
					<input type="hidden" name="idAgence" id="idAgence">
					<div class="md-form form-sm">
						<input type="text" name="codeAgence" id="codeAgence" class="form-control" disabled>
						<label for="codeAgence">Code Agence</label>
					</div>
					<div class="md-form form-sm">
						<input type="text" name="agence" id="agence" class="form-control" required>
						<label for="agence">Agence</label>
					</div>

					<button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Enregistrer</button>
					<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal edit lieu -->

<!-- Modal delete lieu -->
<div class="modal fade" id="modaldeleteLieu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img12.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
			</div>

			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Suppression de : <span class="agence_suppr text-danger font-weight-bold"></span></h5>
				<hr>

				<?php echo form_open('Agence/Supprimer'); ?>
					<input type='hidden' name='idAgence' id='idAgencedel'>
					<div class="deleteLieuForm"> </div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal delete lieu -->

<script type="text/javascript">
	/*function zeroFill(number, width)
	{
		width -= number.toString().length;
		if ( width > 0 )
		{
			return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
		}
		return number + ""; // always return a string
	}

	function maxLengthCheck(object)
	{
		if (object.value.length > object.max.length)
		object.value = object.value.slice(0, object.max.length)
	}
	
	function isNumeric(evt)
	{
		var theEvent = evt || window.event;
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode (key);
		var regex = /[0-9]|\./;
		if ( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
		}
	}*/
	function pad (str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	}

	$("#code_ajout").keyup(function(){
		var code = $(this).val();
		$.getJSON("<?php echo base_url("Agence/verifier/") ?>" + code, function(data){
			$("#validationCode").empty();
			
			if(data.check === 1){
				$("#validationCode").append("Le Code " + code +" existe deja.");
				$("#save").attr("disabled", true);
			} else {
				$("#save").attr("disabled", false);
			}
		});
	});

	$(document).ready(function () {
		$("#code_ajout").change(function() {
          var max = parseInt($(this).attr('max'));
          var min = parseInt($(this).attr('min'));
          if ($(this).val() > max)
          {
              $(this).val(max);
          }
          else if ($(this).val() < min)
          {
              $(this).val(min);
          }       
        });

        $('#modaleditLieu').on('show.bs.modal', function (e) {
	        var idAgence = $(e.relatedTarget).attr('data-id');
	        var codeAgence = $(e.relatedTarget).attr('data-codeAgence');
	        var agence = $(e.relatedTarget).attr('data-agence');

	        $(this).find('.modal-body #idAgence').val(idAgence);
	        $(this).find('.modal-body #codeAgence').val(codeAgence).trigger("change");
	        $(this).find('.modal-body #agence').val(agence).trigger("change");
	    });

	    $('#modaldeleteLieu').on('show.bs.modal', function (e) {
	        var idAgence = $(e.relatedTarget).attr('data-id');
	        var agence = $(e.relatedTarget).attr('data-agence');
	        var count  = $(e.relatedTarget).attr('data-count');

	        $(this).find('.modal-body #idAgencedel').val(idAgence);
	        $(this).find('.modal-body .agence_suppr').html(agence);

	        $(this).find('.deleteLieuForm').empty();
	        if (count > 0) {
	            $(this).find('.deleteLieuForm').append(
	                "<div>" +
	                "<p class='note note-danger'>" +
	                "<small class='font-weight-bold text-danger'>Note : </small>" +
	                "<small>Vous ne pouvez pas supprimer cette agence. Vous devriez d'abord supprimer les utilisateurs de cette agence.</small>" +
	                "</p>" +
	                "</div>" +

	                "<button data-dismiss='modal' class='btn btn-sm btn-rounded btn-light'><i class='fas fa-times mr-2'></i>Annuler</button>"
	            )
	        } else {
	            $(this).find('.deleteLieuForm').append(
	                '<div class="mb-3">' +
	                'Voulez-vous vraiment supprimer cette agence?' +
	                '</div>' +

	                '<button type="submit" class="btn btn-sm btn-rounded btn-danger"><i class="fas fa-trash-alt mr-2"></i>Supprimer</button>' +
	                '<button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>'
	            )
	        }
	    });

        $('#tb_agence').DataTable({
        	"columnDefs": [
	        	{
	        		"render": function ( data, type, row ) {
	        			return pad(row[0],5);
	        		},
	        		"targets": 0
	        	},
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
		    	"lengthMenu" : [5, 10, 15, 100]
		    });

        $('.dataTables_length').addClass('bs-select');
    });
</script>