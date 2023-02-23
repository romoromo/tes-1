<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> DAFTAR WAJIB PAJAK BADAN / PEMILIK USAHA</h4>
		</div>
	</div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<?php include_once 'form-cari.php'; ?>

	<?php include_once 'div-daftar-pajak.php'; ?>

</section>

<?php include_once 'form-npwpd.php'; ?>
<?php include_once 'form-pemilik.php'; ?>

<script type="text/javascript" src="<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>

<div id="dialog-message" title="" align="center" style="width: 300px;">
	<img id="loadinginfo" src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memproses...">
	<p>Mohon tunggu sampai proses selesai</p>
</div>

<script type="text/javascript">
	$("#dialog-message").dialog({
		autoOpen : false,
		modal : true,
		title: "Memproses Data",
	});

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function cari_pemohon () {
		$("#form_perorangan").show();
		$("#lengkap_ktp").show();
		detailIzinPemohon(1);

	}

	function cari_npwp () {
		$("#form_perorangan").show();
		$("#lengkap_npwp").show();
		detailIzinPemohon(1);

	}

	function cari_imb () {
		$("#form_imb").show();
	}
</script>