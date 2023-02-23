<?php defined('APP') or die('direct access not allowed!');  ?>
<?php //var_dump($data['register']); ?>
<html>
	<head>
		<title>Cetak Register <?= $data['register']['tblobyek_nama'] ?>  - <?= $data['register']['tblsetoran_registersetor'] ?> </title>
	</head>
	<body>
		<div style="font-size: 9pt; position: absolute;bottom: 150;right: 70;">
			<pre>
NO.REG  : <?= $data['register']['tblsetoran_nomorsetor'] ?> 
*** JML. BAY = RP. <?= LokalIndonesia::ribuan( $data['register']['tblsetoran_totalsetor']-$data['register']['tblsetoran_bungasetor'], false, 0 ) ?> 
	<?= strtotime($data['register']['tblsetoran_tglsetor']) ? date( 'd-M-Y', strtotime($data['register']['tblsetoran_tglsetor']) ) : '' ?>
			</pre>
		</div>
	</body>
</html>