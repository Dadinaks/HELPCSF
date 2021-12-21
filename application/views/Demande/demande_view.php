<div class="row wow">
    <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
        <div class="card testimonial-card">
            <div class="card-up default-color"></div>

            <div class="avatar mx-auto white">
				<img src="<?php echo base_url('assets/Images/img1.png'); ?>" class="rounded-circle" alt="icon">
            </div>
            
            <div class="card-body">
                <h4 class="card-title">Liste des demandes d'avis</h4>
                <hr>

                <div class="">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th class="font-weight-bold">Demandeur</th>
                                <th class="font-weight-bold">Objet</th>
                                <th class="font-weight-bold">Date de reception</th>
                                <th class="font-weight-bold">Fichier attacher</th>
                                <th class="font-weight-bold"><i class="fas fa-cog mr-2"></i>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($demandes as $row) : ?>
                            <tr>
                                <td>
                                    <span class="font-weight-bold"><?php echo $row->nom . ' ' . $row->prenom; ?></span><br>                                    
                                    <small class="text-muted"><?php echo $row->direction . '/' . $row->unite . '/' . $row->poste; ?></small>                      
                                </td>
                                <td class="text-left">
                                    <?php
                                    /* if (strlen($row->objet) > 40)  :
                                        var_dump(strlen($row->objet));
                                        var_dump(str_pad($row->objet, 40, "...", STR_PAD_RIGHT));
                                    else:
                                        $row->objet;
                                    endif; */
                                    echo $row->objet;
                                    ?>
                                </td>
                                <td><?php echo date('d/m/Y, H:i', strtotime($row->dateDemande)); ?></td>
                                <td class="text-left">
                                    <?php if($row->fichier != NULL) :
                                                $pj = explode(',', $row->fichier);
                                                foreach ($pj as $file) :
                                        ?>
                                        <a href="<?php echo base_url('/assets/Fichiers/'. $file); ?>" target="_blank"><i class="fas fa-paperclip mr-2"></i><?php echo $file; ?></a>
                                        <?php
                                                endforeach; 
                                            endif; ?>
                                    </td>
                                <td>
                                    <a href="<?php echo base_url('demande_d_avis/consulter/'. $row->idDemande); ?>" class="btn-floating btn-sm btn-success" data-tooltip="tooltip" data-placement="bottom" title="Consulter"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>