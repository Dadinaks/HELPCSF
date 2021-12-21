<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion HELPCFS - <?php echo $titre; ?></title>
        <link rel="icon" type="image/jpg" href="<?php echo base_url('assets/Images/BNI_icon.png'); ?>">
        
        <!-- FontAwesome (icon) -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Fontawesome5.11.2/css/all.css'); ?>">
        <!-- /.FontAwesome (icon) -->

        <!-- MDBootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/mdb.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/mdb.lite.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/compiled-4.8.10.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/style.css'); ?>">

        <!-- addons dataTable -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/addons/datatables.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/addons/datatables-select.min.css'); ?>">

        <!-- module annimation -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/MDB4.8.10/css/modules/animations-extended.min.css'); ?>">

        <!-- Jquery-ui -->
        <link rel="stylesheet" href="<?php echo base_url('assets/MDB4.8.10/css/jquery-ui.css'); ?>">
        <!-- /.MDBootstrap -->
        <style>
            body {
                display: flex;
                min-height: 100vh;
                flex-direction: column;
            }

            main {
                flex: 1 0 auto;
            }
        </style>
    </head>

    <body class="teal lighten-5">
        <!-- Script Jquery -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/jquery-3.4.1.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/jquery-ui.js'); ?>"></script>
        <!-- /.Script Jquery -->

        <!-- CKEditor -->
        <script src="<?php echo base_url('assets/ckeditor/build-config.js'); ?>"></script>
        <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
        <!-- /.CKEditor -->
        
        <!-- JavaScript MDBootstrap -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/popper.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/mdb.min.js'); ?>"></script>
        
        <!-- moment -->
        <!--script type="text/javascript" src="<?php //echo base_url('assets/MDB4.8.10/js/moment.js'); ?>"></script-->
        <!-- /.moment -->

        <!-- addons dataTable -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/datatables.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/addons/datatables-select.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/css/addons/dataTables.buttons.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/css/addons/buttons.flash.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/css/addons/jszip.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/css/addons/pdfmake.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/css/addons/vfs_fonts.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/css/addons/buttons.html5.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/css/addons/buttons.print.min.js'); ?>"></script>
        
        <!-- module WOW, Chart -->
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/modules/wow.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/MDB4.8.10/js/modules/chart.js'); ?>"></script>
        <!-- /.JavaScript MDBootstrap -->
        
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
                <div class="container-fluid">
                    <img src="<?php echo base_url('assets/Images/logo.png'); ?>" height="40px" alt="logo BNI Madagascar">

                    <!-- Collapse -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- /.Collapse -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item <?php if ($this->uri->segment(1) == "Tableau_de_bord") { echo "active"; } ?>">
                                <a class="nav-link waves-effect" href="<?php echo base_url('Tableau_de_bord'); ?>">Tableau de bord</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="dropdown_ticket" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tickets
                                    <?php $nb = $this->TicketModel->count('Reçu') + $this->TicketModel->count('A_Validé') + $this->TicketModel->count('Révisé'); 
                                    if ($nb != NULL) { ?>
                                        <span class="badge badge-pill badge-danger" id="new_ticket"></span>
                                    <?php } ?>
                                </a>
                                
                                <div class="dropdown-menu dropdown-default" aria-labelledby="dropdown_ticket">
                                    <a class="dropdown-item <?php if ($this->uri->segment(2) == "Recus") { echo "active"; } ?>" href="<?php echo site_url('ticket/Recus'); ?>">
                                        <span class="mr-5 <?php if ($this->uri->segment(2) == "Recus") { echo "white-text"; } ?>"><i class="fas fa-file-alt mr-2"></i>Demande(s) Reçue(s)</span>
                                    </a>

                                    <a class="dropdown-item <?php if ($this->uri->segment(2) == "Encours") { echo "active"; } ?>" href="<?php echo site_url('ticket/Encours'); ?>">
                                        <span class="mr-5 <?php if ($this->uri->segment(2) == "Encours") { echo "white-text"; } ?>"><i class="fas fa-file-signature mr-1"></i>Demande(s) Prise(s) en charge </span>
                                    </a>

                                    <a class="dropdown-item <?php if ($this->uri->segment(2) == "Refuses") { echo "active"; } ?>" href="<?php echo site_url('ticket/Refuses'); ?>">
                                        <span class="<?php if ($this->uri->segment(2) == "Refuses") { echo "white-text"; } ?>"><i class="fas fa-file-excel mr-2"></i>Demande(s) Refusée(s)</span>
                                    </a>

                                    <a class="dropdown-item <?php if ($this->uri->segment(2) == "Abandon") { echo "active"; } ?>" href="<?php echo site_url('ticket/Abandon'); ?>">
                                        <span class="<?php if ($this->uri->segment(2) == "Abandon") { echo "white-text"; } ?>"><i class="fas fa-file-excel mr-2"></i>Demande(s) Abandonnée(s)</span>
                                    </a>

                                    <a class="dropdown-item <?php if ($this->uri->segment(2) == "Termines") { echo "active"; } ?>" href="<?php echo site_url('ticket/Termines'); ?>">
                                        <span class="<?php if ($this->uri->segment(2) == "Termines") { echo "white-text"; } ?>"><i class="fas fa-file-archive mr-2"></i>Demande(s) Terminée(s)</span>
                                    </a>
                                </div>
                            </li-->
                        </ul>

                        <!-- Right -->
				        <ul class="navbar-nav nav-flex-icons">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="dropdown_demande" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-tooltip="tooltip" data-placement="bottom" title="Demande d'avis"><i class="fas fa-comments"></i></a>
                                
                                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="dropdown_demande">
                                    <a href="" class="dropdown-item" data-toggle="modal" data-target="#modalDemande" data-keyboard="false" data-backdrop="static"><i class="far fa-comment-dots mr-2"></i>Saisir une demande</a>

                                    <a class="dropdown-item <?php if ($this->uri->segment(2) == "Demande") { echo "active"; } ?>" href="<?php echo base_url('Demande_d_avis/Demande'); ?>">
                                        <span class="<?php if ($this->uri->segment(2) == "Demande") { echo "white-text"; } ?>"><i class="fas fa-paper-plane mr-2"></i>Demande envoyée</span>
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item" data-tooltip="tooltip" data-placement="bottom" title="Liste des échanges interne">
                                <a href="<?php echo base_url('Echange'); ?>" class="nav-link"><i class="fas fa-comment-dots"></i></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="dropdown_utilisateur" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-tooltip="tooltip" data-placement="bottom" title="Parametre"><i class="fas fa-user-cog"></i></a>
                                
                                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="dropdown_utilisateur">
                                    <a href="">
                                        <small>
                                            <?php echo $this->session->userdata('nom_utilisateur') . ' ' . $this->session->userdata('prenom_utilisateur'); ?> 
                                            (<span class="grey-text"><?php echo $this->session->userdata('profil'); ?></span>)
                                        </small>
                                    </a>
                                    <hr>

                                    <a class="dropdown-item" href="<?php echo base_url('login/deconnexion'); ?>"><i class="fas fa-power-off mr-2"></i>Se déconnecter</a>
                                </div>
                            </li>

                            <li class="nav-item" data-tooltip="tooltip" data-placement="bottom" title="Aide">
                                <a href="<?php echo base_url('assets/Guide/HELPJUR-Manuel utilisation_V1.pdf'); ?>" target = "_blank" class="nav-link"><i class="far fa-question-circle"></i></a>
                            </li>
				        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="pt-5 mx-lg-5">
            <section class="container-fluid mt-5 mb-2">
                <?php 
                    if (isset($theme_commande)) { 
                        echo $output;
                    } else { 
                        echo $output;
                    } 
                ?>
            </section>

            <section>
                <!-- Modal nouvelle demande -->
                <div class="modal fade" id="modalDemande" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal modal-avatar modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <img src="<?php echo base_url('assets/Images/img15.png'); ?>" alt="avatar" class="rounded-circle img-responsive">
                            </div>

                            <div class="modal-body text-center mb-1">
                                <h5 class="mt-1 mb-2">Nouvelle demande</h5>
                                <hr>

                                <?php echo form_open_multipart('Demande_d_avis/demander'); ?>
                                    <div class="md-form">
                                        <input type="text" id="objet_message" name="objet_message" class="form-control" autocomplete="off" required>
                                        <label for="objet_message">Objet</label>
                                    </div>

                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fichier_message" name="fichier_message[]" aria-describedby="fichier_message" multiple>
                                            <label class="custom-file-label text-left" for="fichier_message1">Choisir un/plusieurs fichier(s)</label>
                                        </div>
                                    </div>
                                    
                                    <small id="error_uploadFile" class="red-text font-weight-bold"></small>

                                    <div class="md-form">
                                        <textarea name="contenu_msg" id="contenu_msg" rows="10" cols="80" required></textarea>
                                    </div>

                                    <button type="submit" id="send" class="btn btn-sm btn-rounded btn-success"><i class="fas fa-check mr-2"></i>Envoyer</button>
                                    <button data-dismiss="modal" class="btn btn-sm btn-rounded btn-light"><i class="fas fa-times mr-2"></i>Annuler</button>
                                <?php echo form_close(); ?>

                                <script type="text/javascript">
                                    CKEDITOR.replace('contenu_msg', {
                                        language : 'fr',
                                        uiColor  : '#e0f2f1'
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.Modal nouvelle demande -->
            </section>
        </main>

        <!-- Pieds de la page -->
        <footer class="fixe-bottom page-footer font-small rgba-cyan-slight">
            <div class="footer-copyright text-center py-3">© 2019 Copyright: <span  class="font-weight-bold">Gestion HELPJUR</span></div>
        </footer>
        <!-- /.Pieds de la page -->

        <script type="text/javascript">
            //Animations initialization
            new WOW().init();
            function bytesToSize(bytes) {
                var sizes = ['Bytes', 'Ko', 'Mo', 'Go', 'To'];
                if (bytes == 0) return '0 Byte';
                var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
                
                return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
            }
                                    
            $('#fichier_message').bind('change', function() {
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
    </body>
</html>
