<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Ketikan BG</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-bg" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Setoran Pajak Lain - lain</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
							<fieldset>

								<div class="row">
									<section class="col col-md-2">
										Rekening
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" name="text_rekening" id="text_rekening">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama WP </p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" name="nama_wp" id="nama_wp">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama Bank</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="nama_bank" name="nama_bank">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>No Bukti Setor BG</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" name="no_bukti" id="no_bukti">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal BG</p>
									</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_bg" class="datepicker" data-dateformat="dd/mm/yy" id="tanggal_bg">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jumlah Stok</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="jumlah_stok" name="jumlah_stok">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Keterangan</p>
									</section>
									<section class="col col-md-4">
										<label class="textarea"> 										
											<textarea rows="3" name="info" id="info"></textarea> 
										</label>
									</section>
								</div>
							</fieldset>	
							<footer>
								<button class="btn btn-sm btn-primary" type="button" onclick="cetak()">Cetak Kartu</button>
								<button class="btn btn-sm btn-default" type="button">Batal</button>
							</footer>					
						</form>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->

</section><br>


<script type="text/javascript">
	pageSetUp();

		

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function cetak () {
		window.text_rekening = $("#text_rekening").val()!=null ? $("#text_rekening").val() : "";
		window.nama_wp = $("#nama_wp").val()!=null ? $("#nama_wp").val() : "";
		window.nama_bank = $("#nama_bank").val()!=null ? $("#nama_bank").val() : "";
		window.no_bukti = $("#no_bukti").val()!=null ? $("#no_bukti").val() : "";
		window.tanggal_bg = $("#tanggal_bg").val()!=null ? $("#tanggal_bg").val() : "";
		window.jumlah_stok = $("#jumlah_stok").val()!=null ? $("#jumlah_stok").val() : "";
		window.info = $("#info").val()!=null ? $("#info").val() : "";

		var text_rekening = window.text_rekening;
		var nama_wp = window.nama_wp;
		var nama_bank = window.nama_bank;
		var no_bukti = window.no_bukti;
		var tanggal_bg = window.tanggal_bg;
		var jumlah_stok = window.jumlah_stok;
		var info = window.info;


		window.open("<?= $this->URLMODUL ?>/cetak?text_rekening="+text_rekening+"&nama_wp="+nama_wp+"&nama_bank="+nama_bank+"&no_bukti="+no_bukti+"&tanggal_bg="+tanggal_bg+"&jumlah_stok="+jumlah_stok+"&info="+info);
	}


	function printSelected () {
		$('#datamodal').modal('show');
	}

	function enter() {
		$('#form_hotel').show();
	}

</script>