<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Pendaftaran Wajib Pajak Baru Badan</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-badan" 
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
					<h2>Form Entry</h2>

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
											<input class="input-sm" type="text" id="nomor_pokok" name="nomor_pokok">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Penerimaan </p>
									</section>
									<section class="col col-md-6">
										<label class="select">
											<select name="jenis_penerimaan">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Pajak</option>
												<option>Retribusi</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Golongan </p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select name="gol">
												<option>Badan Usaha</option>
											</select> <i></i> 
										</label>
									</section>
									<section class="col col-md-1">
										<p>Formulir </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
								</div>

								<header style="border-color: red;">Perorangan</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" type="text" id="nama" name="nama">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat</p>
									</section>
									<section class="col col-md-6">
										<label class="textarea"> 										
											<textarea rows="3" name="alamat" id="alamat"></textarea> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Rt/Rw </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nama" name="nama">
										</label>
									</section>
									<section class="col col-md-1">
										<p>No Telp </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="telp" name="telp">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="kec" id="kec" class="select2" placeholder="--- Pilih Kecamatan---">
												<option></option>
												<option>Tegalrejo</option>
												<option>Jetis</option>
												<option>Godokusumo</option>
												<option>Danurejan</option>
												<option>Ngampilan</option>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="kode_pos" name="kode_pos">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="desa" id="desa" class="select2" placeholder="--- Pilih Desa---">
												<option></option>
												<option>Kricak</option>
												<option>Karangwaru</option>
												<option>Tegalrejo</option>
												<option>Bener</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Kota</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="kota" name="kota">
										</label>
									</section>
								</div>

								<header style="border-color: red;">Badan Usaha</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" type="text" id="nama" name="nama">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat</p>
									</section>
									<section class="col col-md-6">
										<label class="textarea"> 										
											<textarea rows="3" name="alamat" id="alamat"></textarea> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Rt/Rw </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nama" name="nama">
										</label>
									</section>
									<section class="col col-md-1">
										<p>No Telp </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="telp" name="telp">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="kec" id="kec" class="select2" placeholder="--- Pilih Kecamatan---">
												<option></option>
												<option>Tegalrejo</option>
												<option>Jetis</option>
												<option>Godokusumo</option>
												<option>Danurejan</option>
												<option>Ngampilan</option>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="kode_pos" name="kode_pos">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="desa" id="desa" class="select2" placeholder="--- Pilih Desa---">
												<option></option>
												<option>Kricak</option>
												<option>Karangwaru</option>
												<option>Tegalrejo</option>
												<option>Bener</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Kota</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="kota" name="kota">
										</label>
									</section>
								</div>

								<header style="border-color: red;">Pendataan Pribadi</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Bidang Usaha </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="jenis_penerimaan">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Pajak Air Tanah</option>
												<option>Pajak Sarang Burung Walet</option>
												<option>Pajak BPHTB Tukarmenukar</option>
												<option>Pajak BPHTB Waris</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Pengukuhan </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker " data-dateformat="dd/mm/yy" id="tgl_pengukuhan">
										</label>
									</section>
									<section class="col col-md-2">
										<p>No Pengukuhan </p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="no_pengukuhan" name="no_pengukuhan">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Formulir Diterima </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_formulir" class="datepicker " data-dateformat="dd/mm/yy" id="tgl_formulir">
										</label>
									</section>
									<section class="col col-md-2">
										<p>Cara Perhitungan </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="cara_perhitungan">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Official Assessment</option>
												<option>Self Assessment</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Formulir Entry </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_formulir_entry" class="datepicker " data-dateformat="dd/mm/yy" id="tgl_formulir_entry">
										</label>
									</section>
								</div>

							</fieldset>		
							<footer>
									<button type="button" class="btn btn-sm btn-primary" onclick="simpan()">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan
									</button>
									<button type="button" class="btn btn-warning dropdown-toggle">
											<i class="fa fa-print"></i> Cetak Kartu
									</button>
									<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
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