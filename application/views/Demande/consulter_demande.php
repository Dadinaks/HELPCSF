<?php foreach ($demande as $row) : ?>
<div class="row">
    <div class="col-12 col-xl-12 col-lg-12 col-sm-12 col-sm-12 mb-3">
        <div class="card">
            <div class="card-header">
                <span class="float-right">le <?php echo date('d/m/Y à H:i', strtotime($row->dateDemande)); ?></span>
                <span>
                    De : <?php echo $row->nom . ' ' . $row->prenom; ?><br>
                    <small class="text-muted"><?php echo $row->direction . '/' . $row->unite . '/' . $row->poste; ?></small>
                </span>
            </div>
            
            <div class="card-body">
                <strong>Objet : <span class="text-muted"><?php echo $row->objet; ?></span></strong><br>
                <?php if($row->fichier != NULL) :
                        $pj = explode(',', $row->fichier);
                        foreach ($pj as $file) :
                ?>
                            <a href="<?php echo base_url('/assets/Fichiers/'. $file); ?>" target="_blank"><i class="fas fa-paperclip mr-2"></i><?php echo $file; ?></a>
                <?php
                        endforeach; 
                    endif; ?>
                <hr>

                <div class="overflow-auto mb-2">
                    <p><?php echo $row->contenu; ?></p>
                </div>
                <hr>
                
                <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) { ?>
                <div class="text-center">
                    <a href="" class="btn btn-sm btn-success btn-rounded" data-id="<?php echo $row->idDemande; ?>" data-idDemandeur="<?php echo $row->idUtilisateur; ?>" data-toggle="modal" data-target="#modalAccepter" data-keyboard="false" data-backdrop="static"><i class="fas fa-check mr-2"></i>Accepter</a>
                    <a href="" class="btn btn-sm btn-danger btn-rounded" data-id="<?php echo $row->idDemande; ?>" data-idDemandeur="<?php echo $row->idUtilisateur; ?>" data-toggle="modal" data-target="#modalRefuser" data-keyboard="false" data-backdrop="static"><i class="fas fa-times mr-2"></i>Refuser</a>
                    <!--a href="" class="btn btn-sm btn-default btn-rounded" data-toggle="modal" data-target="#modalconfirmationFaq" data-keyboard="false" data-backdrop="static"><i class="fas fa-comments mr-2"></i>F.A.Q</a-->
                    <a href="<?php echo base_url('demande_d_avis'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
                </div>
                <?php } else { ?>
                    <div class="text-right">
                        <a href="<?php echo base_url('demande_d_avis/demande'); ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal Accepter -->
<div class="modal fade" id="modalAccepter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img2.png'); ?>" alt="icon"
					 class="rounded-circle img-responsive">
            </div>
            
			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Création du ticket</h5>
                <hr>

                <?php echo form_open('Ticket/accepter_ticket'); ?>
                    <input type="hidden" name="demandeAccept" id="idDemande">
                    <input type="hidden" name="demandeur" id="demandeur">
                    
                    <button type="button" class="btn btn-sm btn-rounded btn-success" data-toggle="modal" data-target="#modalconfirmationAccepter" data-keyboard="false" data-backdrop="static"><i class="fas fa-check mr-2"></i>Valider</button>
                    <!-- <button type="submit" id="btn-accepter" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Valider</button> -->
                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
                <?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- ./Modal Accepter -->

<!-- Modal Refuser -->
<div class="modal fade" id="modalRefuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<img src="<?php echo base_url('assets/Images/img2.jpg'); ?>" alt="icon" class="rounded-circle img-responsive">
            </div>
            
			<div class="modal-body text-center mb-1">
				<h5 class="mt-1 mb-2">Refuser la demande</h5>
				<hr>

				<?php echo form_open('Ticket/refuser_ticket'); ?>
                    <input type="hidden" name="demandeRefus" id="IdDemande">
                    <input type="hidden" name="demandeur" id="demandeurRefus">

                    <div class="md-form">
                        <textarea id="motif" name="motif" class="md-textarea form-control" rows="4" required></textarea>
                        <label for="motif">Motifs de refus</label>
                    </div>
                    
                    <button type="button" class="btn btn-sm btn-rounded btn-danger" data-toggle="modal" data-target="#modalconfirmationRefuser" data-keyboard="false" data-backdrop="static"><i class="fas fa-times mr-2"></i>Refuser</button>
                    <!-- <button type="submit" id="btn-refuser" class="btn btn-sm btn-rounded btn-danger"><i class="fas fa-times mr-2"></i>Refuser</button> -->
                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- /Modal Refuser -->

<?php foreach ($demande as $row) : ?>
<!-- Modal confirmation accepter -->
<div class="modal fade" id="modalconfirmationAccepter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">      
            <div class="modal-body">
            <h5 class="font-weight-bold">Confirmation</h5>
                <hr>
                <div>Etes-vous sûre d'accepter cette demande?</div>
                <div>
                <?php echo form_open('Ticket/accepter_ticket'); ?>
                    <input type="hidden" name="demandeAccept_confirm" id="demandeAccept_confirm">
                    <input type="hidden" name="demandeur_confirm" id="demandeur_confirm">
                    <input type="hidden" name="tache_confirm" id="tache_confirm">
                    
                    <div class="text-right">
                        <button class="btn btn-sm btn-rounded btn-success">Oui</button>
                        <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-danger">Non</button>
                    </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal confirmation accepter -->

<!-- Modal confirmation refuser -->
<div class="modal fade" id="modalconfirmationRefuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">      
            <div class="modal-body">
            <h5 class="font-weight-bold">Confirmation</h5>
                <hr>
                <div>Etes-vous sûre de refuser cette demande?</div>
                <div>
                <?php echo form_open('Ticket/refuser_ticket'); ?>
                    <input type="hidden" name="demandeRefus_confirm" id="demandeRefus_confirm">
                    <input type="hidden" name="motif_confirm" id="motif_confirm">
                    <input type="hidden" name="demandeur_confirm" id="demandeur_confirm">
                    
                    <div class="text-right">
                        <button class="btn btn-sm btn-rounded btn-success">Oui</button>
                        <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-danger">Non</button>
                    </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Modal confirmation refuser -->

<!-- Modal confirmation faq -->
<div class="modal fade" id="modalconfirmationFaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">      
            <div class="modal-body">
                <h5 class="font-weight-bold">Confirmation</h5>
                <hr>
                <div>Etes-vous sûre de diriger cette demande vers la foire aux questions?</div>
            </div>
      
            <div class="text-right">
                
                <a href="<?php echo base_url('ticket/rediriger_faq/'. $row->idDemande .'/'. $row->idUtilisateur ); ?>" class="btn btn-sm btn-rounded btn-success">Oui</a>
                
                <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-danger">Non</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal confirmation faq -->
<?php endforeach; ?>

<script type="text/javascript">
    /*function Recu($id) {
        $.ajax({
            url: '<?php //echo base_url('Demande_d_avis/statut_demande/') ?>' + $id,
            type: 'GET',
            dataType: 'json',

            success: function (data) {
                clearInterval(nouvelle_demande);
                clearInterval(notification_ticket);
                clearInterval(Notification_retard_recu);
            },
            error: function (xhr, ajaxOptions, thrownError, error) {
            }
        });
    }*/

    $('#modalAccepter').on('show.bs.modal', function (e) {
        var idDemande = $(e.relatedTarget).attr('data-id');
        var demandeur = $(e.relatedTarget).attr('data-idDemandeur');

        $(this).find('.modal-body #idDemande').val(idDemande);
        $(this).find('.modal-body #demandeur').val(demandeur);
        //$('#btn-accepter').on('click', Recu(idDemande));
    });

    $('#modalconfirmationAccepter').on('show.bs.modal', function () {
        var idDemande = $('#idDemande').val();
        var demandeur = $('#demandeur').val();
        var categorie = $('#categorie').val();
        var tache     = $('#tache').val();

        $(this).find('.modal-body #demandeAccept_confirm').val(idDemande);
        $(this).find('.modal-body #demandeur_confirm').val(demandeur);
        $(this).find('.modal-body #tache_confirm').val(tache);
        //$('#btn-accepter').on('click', Recu(idDemande));
    });

    $('#modalRefuser').on('show.bs.modal', function (e) {
        var idDemande = $(e.relatedTarget).attr('data-id');
        var demandeur = $(e.relatedTarget).attr('data-idDemandeur');
        console.log('demandeur :' + demandeur);

        $(this).find('.modal-body #IdDemande').val(idDemande);
        $(this).find('.modal-body #demandeurRefus').val(demandeur);
        //$('#btn-refuser').on('click', Recu(idDemande));
    });

    $('#modalconfirmationRefuser').on('show.bs.modal', function () {
        var idDemande = $('#IdDemande').val();
        var demandeur = $('#demandeurRefus').val();
        var motif     = $('#motif').val();

        console.log('demandeur :' + demandeur);
        $(this).find('.modal-body #demandeRefus_confirm').val(idDemande);
        $(this).find('.modal-body #motif_confirm').val(motif);
        $(this).find('.modal-body #demandeur_confirm').val(demandeur);
        //$('#btn-accepter').on('click', Recu(idDemande));
    });

    $('#categorie').on('change', function () {
        var idcategorie = $(this).val();

        if (idcategorie) {
            $.ajax({
                url: '<?php  echo base_url('Categorie_Tache/tache_par_categorie/');?>' + idcategorie,
                type: 'GET',
                dataType: 'json',

                success: function (data) {
                    $('select[name="tache"]').empty();
                    $('select[name="tache"]').append('<option class="font-weight-bold" selected disabled> -- Séléction Tâche -- </option>');
                    $.each(data, function (key, value) {
                        $('select[name="tache"]').append('<option value="' + value.idTache + '">' + value.tache + '</option>');
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' : ' + thrownError);
                }
            });
        } else {
            $('select[name="tache"]').empty();
        }
    });
    
	$('#modalRefuser').on('hidden.bs.modal', function () {
		$(this).find('form').trigger('reset');
	});
</script>