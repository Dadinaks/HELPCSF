<?php foreach ($echange as $row) : ?>
    <div class="jumbotron grey lighten-4">
        <h4 class="card-title h4 pb-2 text-center">
            <strong>Echange sur le ticket numéro : <span id="numeroTicket" class="teal-text"><?php echo $row->numTicket ?></span></strong>
        </h4>

		<div class="row">
			<!-- Echange -->
			<div class="col-7 col-xl-7 col-lg-7 col-md-7 col-sm-12">
				<div class="jumbotron">
					<div class="text-center"><h3>Echange</h3></div>
					<hr>

					<div style="background-color : rgba(255, 255, 154, 0.7); padding : 12px 12px 12px 12px; margin : 8px 8px 8px 8px; border-radius : 10px">
						<div class="d-flex justify-content-between">
							<small class="font-weight-bold" style="margin-bottom: 5px;"><u>Objet :</u> <?php echo $row->objet_echange; ?> </small>

							<small class="text-muted" style="margin-bottom: 5px;"><?php echo date('d/m/Y, H:i', strtotime($row->dateEnvoie)); ?></small>
						</div>
						<div>
							<small>
								<?php if($row->pj_echange != NULL) :
									$pj = explode(',', $row->pj_echange);
													
									foreach ($pj as $file) :
								?>
								<a href="<?php echo base_url('/assets/Fichiers/'. $file); ?>" target="_blank"><i class="fas fa-paperclip mr-1"></i><?php echo $file; ?></a>
								<?php
									endforeach; 
								endif; ?>
							</small>
							<small class="text-muted" style="margin-bottom: 0px;"> <?php echo $row->contenu_echange; ?> </small>
						</div>
					</div>
					<hr>
					
					<div class="row mb-2" style="max-height: 600px; width:100%; overflow-y: scroll;">
						<?php
						$data['messages'] = $this->EchangeMessageModel->find($this->uri->segment(3));
						$matricule = $this->session->userdata('matricule');
						foreach ($data['messages'] as $message) :
							$matricul_verif = strpos($message->utilisateur, $matricule);

							if ($matricul_verif === false) {
						?>
						<div class="col-lg-10 col-md-10 col-sm-12" style="padding-right: 0px;">
							<div style="background-color : rgba(102, 255, 178, 0.6); padding : 12px 12px 12px 12px; margin : 8px 8px 8px 8px; border-radius : 10px">
								<div class="d-flex justify-content-between">
									<small class="font-weight-bold" style="margin-bottom: 5px;"> <?php echo $message->utilisateur; ?> </small>
									
									<small class="text-muted" style="margin-bottom: 5px;"><?php echo date('d/m/Y, H:i', strtotime($message->date_message)); ?></small>
								</div>
								
								<div>
									<small>
										<?php if($message->pj_message != NULL) :
											$pj = explode(',', $message->pj_message);
													
											foreach ($pj as $file) :
										?>
											<a href="<?php echo base_url('/assets/Fichiers/'. $file); ?>" target="_blank"><i class="fas fa-paperclip mr-2"></i><?php echo $file; ?></a>
										<?php
											endforeach; 
										endif; ?>
									</small>
									<small class="text-muted" style="margin-bottom: 0px;"> <?php echo $message->message; ?> </small>
								</div>			
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-12" style="padding-right: 0px;">
						</div>
						<?php } else { ?>	
						<div class="col-lg-10 offset-lg-2 col-md-10 offset-md-2 col-sm-12"  style="padding-left: 0px;">
							<div style="background-color : rgba(224, 224, 224, 0.6); padding : 12px 12px 12px 12px; margin : 8px 8px 8px 8px; border-radius : 10px">
								<div class="d-flex justify-content-between">
									<small class="font-weight-bold" style="margin-bottom: 5px;"> <?php echo $message->utilisateur; ?> </small>

									<small class="text-muted" style="margin-bottom: 5px;"><?php echo date('d/m/Y, H:i', strtotime($message->date_message)); ?></small>
								</div>

								<div>
									<small>
										<?php if($message->pj_message != NULL) :
											$pj = explode(',', $message->pj_message);
													
											foreach ($pj as $file) :
										?>
											<a href="<?php echo base_url('/assets/Fichiers/'. $file); ?>" target="_blank"><i class="fas fa-paperclip mr-1"></i><?php echo $file; ?></a>
										<?php
											endforeach; 
										endif; ?>
									</small>
									<small class="text-muted" style="margin-bottom: 0px;"> <?php echo $message->message; ?> </small>
								</div>
							</div>
						</div>
						<?php }
						endforeach; ?>
					</div>
					<hr>

					<?php echo form_open_multipart('Echange/envoie_message'); ?>
						<input type="hidden" name="idMessage_echange" value="<?php echo $this->uri->segment(3); ?>">
						<input type="hidden" name="idTicket_message" value="<?php echo $row->idTicket; ?>">

						<div class="input-group mb-2">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="pj_message" name="pj_message[]" aria-describedby="pj_message" multiple>
								<label class="custom-file-label text-left" for="pj_message1">Choisir un ou plusieurs fichier(s) inferieur à 2Mo</label>
							</div>
						</div>
						<small id="error_uploadFile" class="red-text font-weight-bold"></small>

						<textarea class="form-control" name="message" id="message" cols="80" rows="3"></textarea>

						<div class="text-right">
							<button type="submit" class="btn btn-success btn-sm btn-rounded" id="send" data-tooltip="tooltip" data-placement="bottom" title="Envoyer le message d'échange"><i class="fas fa-paper-plane mr-2"></i>Envoyer</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
			<!-- /.Echange -->
			
			<div class="col-5 col-xl-5 col-lg-5 col-md-5 col-sm-12">
				<div class="jumbotron">
					<div class="text-center"><h3>Contenu de la demande d'avis</h3></div>
					<hr>

					<h5 class="font-weight-bold text-monospace" id="objet_ticket"><?php echo $row->objet; ?></h5><br>
					<?php if($row->fichier != NULL) :
						$pj = explode(',', $row->fichier);
						foreach ($pj as $file) :
					?>
					<a href="<?php echo base_url('/assets/Fichiers/'. $file); ?>" target= "_blank"><i class="fas fa-paperclip mr-2"></i><?php echo $file; ?></a>
					<?php
						endforeach;
					endif; ?>
					<hr class="my-4">

					<div style="max-height: 500px; overflow-y: scroll;"><p class="text-monospace" ><?php echo $row->contenu; ?></p></div>
				</div>
				
				<div class="text-right">
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-rounded btn-sm btn-info"><i class="fas fa-arrow-left mr-2"></i>Retour</a>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<script type="text/javascript">
	ClassicEditor
        .create(document.querySelector('#message'))
        .catch(error => {
            console.error( error );
		});
		
    //Animations initialization
    new WOW().init();
    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'Ko', 'Mo', 'Go', 'To'];
        if (bytes == 0) return '0 Byte';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
                                    
    $('#pj_message').bind('change', function() {
    	$("#error_uploadFile").empty();
        var total = 0;
        for (var i = 0; i < this.files.length; i++){
            total += this.files[i].size;
        }

        if ( total > 5000000){
            $("#error_uploadFile").append(
                "La pièce jointe ne doit pas dépasser de 5Mo. La taille de votre fichier est " + bytesToSize(total)
            );
            $("#send").attr("disabled", true);
    	} else {
            $("#send").attr("disabled", false);
        }
    });
             
    $('#modalDemande').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });

    $(function () {
        $("[data-tooltip='tooltip']").tooltip()
    });
</script>