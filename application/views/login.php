<!DOCTYPE html>
<html>
<head>
	<title>Gestion HELPCSF - Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login/css/bootstrap.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Login/css/style.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Fontawesome5.11.2/css/all.min.css'); ?>"/>
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/Images/BNI_icon.png'); ?>"/>
	<script type="text/javascript" src="<?php echo base_url('assets/Login/js/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/Login/js/bootstrap.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/Fontawesome5.11.2/js/all.min.js'); ?>"></script>
</head>

<body>
<div class="text-right" style="margin-top: 5px; margin-right: 20px; color : rgb(0, 153, 153)"><small>V1.0 <a href="<?php echo base_url('assets/Guide/HELPJUR-Manuel utilisation_V1.pdf'); ?>" target = "_blank"><i class="far fa-question-circle"></i> Aide </a></small></div>
<div class='container'>
	<form class="form-horizontal" method="post" action="<?php echo site_url('login/connexion'); ?>">
		<fieldset>
			<div class="card">
				<!--<h2 class='login-title'>Login</h2>-->
				<div class='login-title'><img src="<?php echo base_url('assets/Images/logo.png') ?>" style="width:300px"/></div>
				<span id="instru">Entrez vos identifiants</span>
				<div class="form-group-perso">
					<input type="text" id='pseudo' name='pseudo' autofocus required="" class="form-control"
						   placeholder="Matricule" autocomplete="off">
					<span style="color : rgb(250, 0, 0)"><?php echo form_error('pseudo'); ?></span>
				</div>
				<div class="form-group-perso">
					<input type="password" id='mdp' name='mdp' class="form-control" required=""
						   placeholder="Mot de passe" autocomplete="off">
					<?php echo form_error('mdp'); ?>
				</div>
				<div class="form-group-perso">
					<button class="btn btn-primary btn-block" type='submit'>SE CONNECTER</button>
				</div>
			</div>
		</fieldset>
	</form>
	<?php if ($this->session->flashdata('noconnect')) { ?>

		<div class="alert alert-error text-center">
			<strong style="color : rgb(250, 0, 0)"> <?php echo $this->session->flashdata('noconnect'); ?> </strong>
		</div>

	<?php } ?>

	<div align="center" style="padding-top : 50px">
		<strong>
			Pour toutes demandes d'absence, intérim ou paramétrage de profil et assistance, veuillez vous adresser à "<span style="color : rgb(0, 153, 153)">BNI_DRJC_PRO@bni.mg</span>" (<span style="color : rgb(0, 153, 153)">poste : 4968</span> ou <span style="color : rgb(0, 153, 153)">poste : 4969</span>) et mettre en copie "<span style="color : rgb(0, 153, 153)">BNI_HELPCSF@bni.mg</span>".
		</strong>
	</div>

</div>
</body>
</html>
