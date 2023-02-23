<?php define('ASSETS_URL', Yii::app()->theme->baseUrl); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Reklame Jatuh Tempo</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

			<!-- Widget ID (each widget will need unique ID)-->

			<!-- end widget -->

			<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="wid-i874t8735f87345" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
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
			<header role="heading">
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Pencarian Data</h2>

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
			</header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<form id="form-pendataan-restoran" class="smart-form">
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="number" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
												<option value="">-- Bulan --</option>
												<option value="1">Januari</option>
												<option value="2">Februari</option>
												<option value="3">Maret</option>
												<option value="4">April</option>
												<option value="5">Mei</option>
												<option value="6">Juni</option>
												<option value="7">Juli</option>
												<option value="8">Agustus</option>
												<option value="9">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
												<!-- <?php for ($i=1; $i<=12; $i++): ?>
													<option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?> -->
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-2">
										<label class="input">
											<input type="number" id="TBLPENDATAAN_TGLPAJAK" name="param[TBLPENDATAAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Rekening</p>
									</section>
									<section class="col col-md-4">
										<label class="select">
											<select class="select2" id="TBLREKENING_KODE" name="TBLREKENING_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<?php /* ?>
													<option selected="" value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
													<?php */ ?>
													<option selected="" value="<?php echo $list['TBLREKENING_KODE'] ?>"><?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Entry SPT</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="number" id="TBLDAFTREKLAME_THNENTRI" name="param[TBLDAFTREKLAME_THNENTRI]" value="" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="" id="TBLDAFTREKLAME_BLNENTRI" name="param[TBLDAFTREKLAME_BLNENTRI]">
												<option value="">-- Bulan --</option>
												<option value="1">Januari</option>
												<option value="2">Februari</option>
												<option value="3">Maret</option>
												<option value="4">April</option>
												<option value="5">Mei</option>
												<option value="6">Juni</option>
												<option value="7">Juli</option>
												<option value="8">Agustus</option>
												<option value="9">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
												<!-- <?php for ($i=1; $i<=12; $i++): ?>
													<option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
												<?php endfor ?> -->
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-2">
										<label class="input">
											<input type="number" id="TBLDAFTREKLAME_TGLENTRI" name="param[TBLDAFTREKLAME_TGLENTRI]" placeholder="Tanggal" maxlength="2">
										</label>
									</section>
								</div>


								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Reklame</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select id="TBLDAFTREKLAME_JNSREKLAME" name="param[TBLDAFTREKLAME_JNSREKLAME]">
											<option value="">-- Jenis --</option>
											<option value="T">Tetap</option>
											<option value="I">Insidentil</option>
											<option value="B">Berjalan</option>
											</select>
										</label>
									</section>
								</div>


								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Jatuh Tempo</p>
									</section>
								</div>

								<div class="row">

									<!-- <section class="col col-md-1">
										<label class="input">
											<input type="text" id="TBLPENDATAAN_THNPAJAK_TEMPO_AWAL" name="param[TBLPENDATAAN_THNPAJAK_TEMPO_AWAL]" placeholder="Tahun" maxlength="4">
										</label>
									</section>

									<section class="col col-md-1">
										<label class="select">
											<select class="" id="TBLPENDATAAN_BLNPAJAK_TEMPO_AWAL" name="param[TBLPENDATAAN_BLNPAJAK_TEMPO_AWAL]">
												<option value="">-- Bulan --</option>
												
											</select><i class="fa fa-square"></i>
										</label>
									</section>

									<section class="col col-md-1">
										<label class="input">
											<input value="" type="number" id="TBLPENDATAAN_TGLPAJAK_TEMPO_AWAL" name="param[TBLPENDATAAN_TGLPAJAK_TEMPO_AWAL]" placeholder="Tanggal" maxlength="2">
										</label>
									</section> -->

									<section class='col col-md-3'>
										<label class="input">
											<input id="TANGGAL_AWAL" class="datepicker" data-dateformat="dd-mm-yy">	
										</label>
									</section>

									<section class="col col-md-2" style="margin-left:-20px;">
										S / D
									</section>

									<section class='col col-md-3' style="margin-left:-100px">
										<label class="input">
											<input id="TANGGAL_AKHIR" class="datepicker" data-dateformat="dd-mm-yy">	
										</label>
									</section>
								</div>

							<footer>
								<div id="tbl_simpan">
									<!-- <button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-print"></i>&nbsp;Print Kecil
									</button> -->

									<button type="button" onclick="cetak2()" class="btn btn-sm btn-success">
										<i class="fa fa-print"></i>&nbsp;Cetak
									</button>
									
									<!-- <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
										<i class="fa fa-ban"></i>	Batal
									</button> -->
								</div>
							</footer>
						</form>

					</div>

				</div>
					<!-- end widget div -->

			</div>
		</article>
				<!-- WIDGET END -->
	</div>
		<!-- end row -->
</section>

<script type="text/javascript" src="<?= Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
<script type="text/javascript">
		pageSetUp();

		function valNum(n) {
			n = (typeof n == "undefined") ? "0" : n;
			return !isNaN(toAngka(n)) ? Number(toAngka(n)) : 0;
		}

		setPriceFormat();

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';


	function cetak2 () {
		var tahun_pajak = $("#TBLPENDATAAN_THNPAJAK").val();
		var bulan_pajak = $("#TBLPENDATAAN_BLNPAJAK").val();
		var tanggal_pajak = $("#TBLPENDATAAN_TGLPAJAK").val();
		var rekening_kode = $("#TBLREKENING_KODE").val();
		var tahun_entryspt = $("#TBLDAFTREKLAME_THNENTRI").val();
		var bulan_entryspt = $("#TBLDAFTREKLAME_BLNENTRI").val();
		var tanggal_entryspt = $("#TBLDAFTREKLAME_TGLENTRI").val();
		var jenis_pajak = $("#TBLDAFTREKLAME_JNSREKLAME").val();
		var tanggal_awal = $("#TANGGAL_AWAL").val();
		var tanggal_akhir = $("#TANGGAL_AKHIR").val();
		window.tahun_pajak = tahun_pajak;
		window.bulan_pajak = bulan_pajak;
		window.tanggal_pajak = tanggal_pajak;
		window.rekening_kode = rekening_kode;
		window.tahun_entryspt = tahun_entryspt;
		window.bulan_entryspt = bulan_entryspt;
		window.tanggal_entryspt = tanggal_entryspt;
		window.jenis_pajak = jenis_pajak;
		window.tanggal_awal = tanggal_awal;
		window.tanggal_akhir = tanggal_akhir;
		window.open('pendataan/cetak_reklame_jatuhtempo/cetakword?tahun_pajak='+window.tahun_pajak+'&bulan_pajak='+window.bulan_pajak+'&tanggal_pajak='+window.tanggal_pajak+'&rekening_kode='+window.rekening_kode+'&tahun_entryspt='+window.tahun_entryspt+'&bulan_entryspt='+window.bulan_entryspt+'&tanggal_entryspt='+window.tanggal_entryspt+'&jenis_pajak='+window.jenis_pajak+'&tanggal_awal='+window.tanggal_awal+'&tanggal_akhir='+window.tanggal_akhir);
	}
/*//form validation*/
</script>
<style type="text/css">
input.disabled, textarea.disabled {
	background: #e4e4e4!important;
}
</style>