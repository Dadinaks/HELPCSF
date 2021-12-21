
<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img7.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            <div class="card-body">
                <h4 class="card-title">Insertion Suivi DOS</h4>
                <hr>

                <div class="row">
                    <div class="col-10 offset-1">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('DOS/inserer'); ?>
                            <div class="row mb-5">
                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <div class="md-form form-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                        <input type="text" name="reference_dos" id="reference_dos" class="form-control" required>
                                        <label for="reference_dos">Référence DOS</label>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-10 col-lg-10">
                                    <div class="md-form form-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                        <input type="text" name="lienpartage_dos" id="lienpartage_dos" class="form-control" required>
                                        <label for="lienpartage_dos">Référence partage</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-left mb-5">
                                <h5 class="font-weight-bold">Information DOS</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="md-form form-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                            <input type="text" name="origine_dos" id="origine_dos" class="form-control" required>
                                            <label for="origine_dos">origine</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6 offset-3">
                                        <select class="browser-default custom-select custom-select-sm mb-4" id="csf_dos" name="csf_dos" required>
                                            <option class="font-weight-bold" selected disabled>-- Sélectioner le saisisseur --</option>
                                            <?php 
                                            $data['csf'] = $this->UtilisateurModel->find("profil.idProfil in (1, 2)");
                                            foreach ($data['csf'] as $csf) { ?>
                                            <option value="<?php echo $csf->idUtilisateur; ?>"><?php echo $csf->info_user; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-3 mt-3 mb-3"><input type="text" name="dateinfoavisDG" id="dateinfoavisDG" placeholder="Date Info/Avis DG" class="form-control form-control-sm" autocomplete="off"></div>
                                    <div class="col-3 mt-3 mb-3"><input type="text" name="dateSamifin" id="dateSamifin" placeholder="Date Envoie SAMIFIN" class="form-control form-control-sm" autocomplete="off"></div>
                                </div>
                            </div>

                            <div class="text-left">
                                <h5 class="font-weight-bold">Information Client</h5>
                                <hr>
                                <div class="row">
                                    <!-- Left -->
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="md-form form-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                                    <input type="text" name="Codecli_dos" id="Codecli_dos" class="form-control" autocomplete="off" required>
                                                    <label for="Codecli_dos">Code Client</label>
                                                </div>
                                            </div>

                                            <div class="col-7">
                                                <div class="md-form form-sm" style="margin-bottom: 0px;margin-top: 0px;">
                                                    <input type="text" name="nomcli_dos" id="nomcli_dos" class="form-control" autocomplete="off" required>
                                                    <label for="nomcli_dos">Nom Client</label>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div id="addcli" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Ajouter un autre client"><i class="fas fa-plus"></i></div>
                                            </div>
                                        </div>                                        
                                        <div id="cli"></div>

                                        <div class="md-form form-sm">
                                            <input type="text" name="typeoperation_dos" id="typeoperation_dos" class="form-control" required>
                                            <label for="typeoperation_dos">Type d'opération</label>
                                        </div>
                                        
                                        <div class="mb-3">    
                                            <label class="font-weight-bold text-muted">Motif : </label>
                                            <textarea name="motif_dos" id="motif_dos" rows="10" cols="80"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-8" >
                                                <div class="md-form" style="margin-bottom: 0px;margin-top: 0px;">
                                                    <input type="number" step="0.01" name="montant_dos" id="montant_dos" class="form-control" required>
                                                    <label for="montant_dos">Montant</label>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <select class="browser-default custom-select custom-select-sm mb-4" id="devis_dos" name="devis_dos" required>
                                                    <option class="font-weight-bold" selected disabled>-- Devise --</option>
                                                    <option> MGA </option>
                                                    <option> EUR </option>
                                                    <option> USD </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8"><label class="font-weight-bold text-muted">Mail pour mise en oeuvre par UO des décision :</label></div>
                                            <div class="col-4 mb-3"><input type="text" name="datemailuo" id="datemailuo" placeholder="Date du mail UO" class="form-control form-control-sm" autocomplete="off"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8"><label class="font-weight-bold text-muted">Date de la rupture de la relation :</label></div>
                                            <div class="col-4 mb-3"><input type="text" name="daterupture" id="daterupture" placeholder="Date de rupture" class="form-control form-control-sm" autocomplete="off"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8"><label class="font-weight-bold text-muted">Date de suspension de la rupture de la relation :</label></div>
                                            <div class="col-4 mb-3"><input type="text" name="datesusp" id="datesusp" placeholder="Date de suspension" class="form-control form-control-sm" autocomplete="off"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8"><label class="font-weight-bold text-muted">Date d'insertion code oposition 17 :</label></div>
                                            <div class="col-4 mb-3"><input type="text" name="dateopp" id="dateopp" placeholder="Date Code oposition 17" class="form-control form-control-sm" autocomplete="off"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8"><label class="font-weight-bold text-muted">Date d'insertion watchlist :</label></div>
                                            <div class="col-4 mb-3"><input type="text" name="datewatch" id="datewatch" placeholder="Date d'insertion watchlist" class="form-control form-control-sm" autocomplete="off"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right -->
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3"><label class="font-weight-bold text-muted">Date de décision :</label></div>
                                            <div class="col-5 mb-3"><input type="text" name="datedecision" id="datedecision" placeholder="Date de décision" class="form-control form-control-sm" autocomplete="off"></div>
                                        </div>

                                        <div class="mb-4">    
                                            <label class="font-weight-bold text-muted">Détail décision : </label>
                                            <textarea name="detail_decision_dos" id="detail_decision_dos" rows="10" cols="80"></textarea>
                                        </div>

                                        <div class="mb-4">    
                                            <label class="font-weight-bold text-muted">Argument décision : </label>
                                            <textarea name="argument_decision_dos" id="argument_decision_dos" rows="10" cols="80"></textarea>
                                        </div>

                                        <div class="mb-4">    
                                            <label class="font-weight-bold text-muted">Suivis décision et observation : </label>
                                            <textarea name="decision_observation_dos" id="decision_observation_dos" rows="10" cols="80"></textarea>
                                        </div>

                                        <div class="mb-2">    
                                            <label class="font-weight-bold text-muted">Motif de suspension : </label>
                                            <textarea name="motif_suspension_dos" id="motif_suspension_dos" rows="10" cols="80"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Enregistrer</button>
                            <a href="<?php echo base_url('DOS'); ?>" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</a>
                        <?php echo form_close(); ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(function() {
        $("#dateinfoavisDG").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#dateSamifin").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#datemailuo").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#daterupture").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#datesusp").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#datedecision").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#dateopp").datepicker({ dateFormat: 'dd/mm/yy' });
        $("#datewatch").datepicker({ dateFormat: 'dd/mm/yy' }); 
    });

    ClassicEditor
        .create(document.querySelector('#motif_dos'))
        .catch(error => {
            console.error( error );
        });
    
    ClassicEditor
        .create(document.querySelector('#detail_decision_dos'))
        .catch(error => {
            console.error( error );
        });

    ClassicEditor
        .create(document.querySelector('#argument_decision_dos'))
        .catch(error => {
            console.error( error );
        });

    ClassicEditor
        .create(document.querySelector('#decision_observation_dos'))
        .catch(error => {
            console.error( error );
        });

    ClassicEditor
        .create(document.querySelector('#motif_suspension_dos'))
        .catch(error => {
            console.error( error );
        });

    function ajout(){
        var nb = $("#Codecli_dos").val();
        $('#cli').append(       
            '<div class="row" id="a_'+ nb +'">' +
            '<div class="col-3">' +
            '<div class="md-form form-sm" style="margin-bottom: 0px;margin-top: 0px;">' +
            '<input type="text" name="Codecli_dos" id="Codecli_dos_' + nb + '" value="' + $("#Codecli_dos").val() + '" class="form-control c" required disabled>' +
            '</div>' +
            '</div>' +
            '<div class="col-7">' +
            '<div class="md-form form-sm" style="margin-bottom: 0px;margin-top: 0px;">' +
            '<input type="text" name="nomcli_dos" id="nomcli_dos_' + nb + '" value="' + $("#nomcli_dos").val() + '" class="form-control c" required disabled>' +
            '</div>' +
            '</div>' +
            '<div class="col-2">' +
            '<div class="btn-floating btn-sm btn-danger" onClick="suppr('+ nb +')" data-tooltip="tooltip" data-placement="bottom" title="supprimer un autre client"><i class="fas fa-trash"></i></div>' +
            '</div>' +
            '</div>'
        );
        $("#Codecli_dos").val("");
        $("#nomcli_dos").val("");
    }
    
    function suppr(id){
        $('#a_' + id).remove();
    }

    $('#addcli').on('click', ajout);
</script>