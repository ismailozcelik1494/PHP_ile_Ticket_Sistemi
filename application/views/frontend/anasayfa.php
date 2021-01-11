<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-tofit=no">
	<title>PHP - İpsizcambaz Destek Formu</title>
	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Style CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assests/FrontEnd/'); ?>style.css">
	<link rel="icon" href="//www.ipsizcambaz.com/cdn/assets/images/favicon.png" type="image/x-icon">
</head>
<body class="arkaplan">
	<img src="<?php echo base_url('assests/FrontEnd/'); ?>Upload/ipsizcambaz.png">
	<?php $this->load->view('admin/include/alert'); ?>
    <div class="container">
	<!-- <button class="btn btn-warning" id="getir">İpsizcambaz Ekibi İletişim</button> -->
	<div class="col-md-1">
	<div class="ana-cizgi">

	<?php
		for ($sayi = 1; $sayi <= 13; $sayi++){ ?>
		<?php echo "<div class='dikey-cizgi" . $sayi . "'></div>" ?>
		<?php }
		?>
		</div>
	</div>

	<div class="container2">
	<div class="col-md-11">
	<div class="col-md-7">
	<div class="row">
	<h3 class="baslik" id="baslik">İpsizcambaz Ekibi</h3>
	</div>


	<div class="cizgi"> 
	<img src="<?php echo base_url('assests/FrontEnd/'); ?>Upload/cizgi.png">
	</div>

	<div class="row">
	<div class="logo">
	<img src="<?php echo base_url('assests/FrontEnd/'); ?>Upload/ipsizcambazlogo.png">
	</div>
	</div>

	<div class="cizgi1"> 
	<img src="<?php echo base_url('assests/FrontEnd/'); ?>Upload/cizgi.png">
	</div>

	</div>

	<div class="col-md-5">
	<?php
	for ($sayi = 1; $sayi <= 3; $sayi++){ ?>
	<?php echo "<div class='yatay-kutu" . $sayi . "'></div>" ?>
	<?php }
	?>
	</div>

	</div>

	<div class="col-md-11">
	<div class="row">
	<div class="" id="adres">
		<p>Hacettepe Teknokent Yerleşkesi</p>
		<p>Üniversiteler Mah. 1596. Cd. Safir Blokları E Blok No:33</p>
		<p>Çankaya / ANKARA</p>
	</div>
	</div>
	<div class="row">
		<div class="alt-bilgi">
			<div class="col-md-5">
			<h5 class="eposta">E-Posta:</h5>
			</div>
			<div class="col-md-4">
				
			<h5 class="eposta1"><a href="<?php echo base_url('view/anasayfa/mail_gonder'); ?>" target="_blank">destek@ipsizcambaz.com</a></h5>
			</div>
		</div>
	</div>

	<div class="row">
	<div class="alt-bilgi">
			<div class="col-md-5">
			<h5 class="cagri-merkez">Çağrı Merkezi:</h5>
			</div>
			<div class="col-md-4">
			<h5 class="cagri-merkez1">0(850) 305 09 09</h5>
			</div>
		</div>
	</div>

	<div class="row">
	<div class="alt-bilgi">
			<div class="col-md-5">
			<h5 class="faks">Faks (PBX):</h5>
			</div>
			<div class="col-md-4">
			<h5 class="faks1">0(312) 299 23 30</h5>
			</div>
		</div>
	</div>

	<div class="row">
	<div class="alt-bilgi">
			<div class="col-md-5">
			<h5 class="genel">Genel Müdürlük:</h5>
			</div>
			<div class="col-md-4">
			<h5 class="genel1">0(312) 299 23 29</h5>
			</div>
		</div>
	</div>

	  <div class="row">
		<div class="alt-bilgi">
				<div class="col-md-5">
				<h5 class="web-adres">Web Adresi:</h5>
				</div>
				<div class="col-md-4">
				<h5 class="web-adres1"><a href="http://www.ipsizcambaz.com" target="_blank">www.ipsizcambaz.com</a></h5>
				</div>
			</div>
		</div>

	  </div>
   </div>
</div>
</body>
    <!-- Bootstrap JS CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- Jquery JS CDN -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<!--
	<script>
	$(document).ready(function(){
		$("#getir").click(function(){
			$("#baslik").text("İpsizcambaz Ekibi");
	});
	});
	</script>
	-->
</html>