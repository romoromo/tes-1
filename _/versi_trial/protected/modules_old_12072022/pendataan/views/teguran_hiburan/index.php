<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Teguran SPTPD Pajak Hiburan</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-status_wp" 
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
					<h2>Form Pencarian data</h2>

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
										<p>Nomor Pokok </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-1">
										<label class="select">
											<label class="input">
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="masapajak_tahun" name="masapajak_tahun">
											</label>
										</label>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="masapajak_bulan" name="masapajak_bulan">
												<option value="01">Januari</option>
												<option value="02">Februari</option>
												<option value="03">Maret</option>
												<option value="04">April</option>
												<option value="05">Mei</option>
												<option value="06">Juni</option>
												<option value="07">Juli</option>
												<option value="08">Agustus</option>
												<option value="09">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<label class="checkbox pull-right">
											<input type="checkbox" name="checkbox">
											<i></i>
										</label>
									</section>
									<section class="col col-md-1">
										<label class="select">
											<select class="select2" id="masapajak_tanggal" name="masapajak_tanggal">
												<?php for ($i=1; $i <32 ; $i++) {  ?>
												<?php if ($i==date('d')): ?>
													<option selected="selected" value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php else: ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endif ?>
												<?php } ?>
											</select>
										</label>
									</section>		
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Rekening </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"></section>
									<section class="col col-md-3">
										<button type="button" class="btn btn-sm btn-sm btn-primary" onclick="cari()">
											<i class="fa  fa-search"></i>&nbsp;Cari
										</button>
									</section>
								</div>
						
								<header style="border-color: red;">Data Wajib Pajak</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama</p>
									</section>
									<section class="col col-md-6">
										<input class="form-control" disabled="disabled" type="text" id="nama_pemilik" name="nama_pemilik">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat</p>
									</section>
									<section class="col col-md-6">
										<textarea class="form-control" disabled="disabled" rows="4"></textarea>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor SPT</p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_spt" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_spt">
										</label>
									</section>
								</div>
								
							<div id="perhitungan" style="display:none">
								<header style="border-color: red;">Data Perhitungan</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Penjualan / Hari</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Jumlah Hari</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Penjualan / Bulan</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Keringanan</p>
									</section>
									<section class="col col-md-2">
										<input class="form-control" disabled="disabled" type="text" id="nama_pemilik" name="nama_pemilik">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Awal</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_awal" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_awal">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Tanggal Akhir</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_akhir" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_akhir">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Pembukuan</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>B</option>
											</select> <i></i> 
										</label>
									</section>
									<section class="col col-md-1">
										<p>Kas</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>K</option>
												<option>R</option>
											</select> <i></i> 
										</label>
									</section>
									<section class="col col-md-1">
										<p>Nota</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>N</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Pajak</p>
									</section>
									<section class="col col-md-3">
										<input class="form-control" disabled="disabled" type="text" id="nama_pemilik" name="nama_pemilik">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Bunga SPT</p>
									</section>
									<section class="col col-md-3">
										<input class="form-control" disabled="disabled" type="text" id="nama_pemilik" name="nama_pemilik">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Total Setor</p>
									</section>
									<section class="col col-md-3">
										<input class="form-control" disabled="disabled" type="text" id="nama_pemilik" name="nama_pemilik">
									</section>
								</div>
							</div>
							</fieldset>		
							<footer>
									<button type="button" class="btn btn-sm btn-primary" onclick="simpan()">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan
									</button>
									<button type="button" type="button" class="btn btn-sm btn-default" data-dismiss="modal">
										<i class="fa fa-ban"></i>	Batal
									</button>
								</div>
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
</section>


<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function cari () {
		$("#perhitungan").show();
	}

	
	function simpan () {
		$.smallBox({
			title : "Success",
			content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 1000			
		});
	}


</script>