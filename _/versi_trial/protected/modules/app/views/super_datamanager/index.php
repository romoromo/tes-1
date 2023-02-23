<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> SUPER USER - Data Manajer</h4>
		</div>
	</div>
</div>



<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-ubah_pendaftaran" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"
			data-widget-sortable="false"			
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
					<h2>Form Pencarian</h2>

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
						<div class="alert alert-info"> 
								<fieldset>
								<div><b>NPWPD</b></div><hr><br>
									<div class="row">
										<section class="col col-md-2">
											<p>Nomor NPWPD</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Jenis Pajak </p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" name="JENIS_PAJAK" id="JENIS_PAJAK">
													<?php foreach ($data['tblrek'] as $list): ?>
													<option value="<?= $list['TBLREKENING_REKAYAT'] ?>">[<?= $list['TBLREKENING_KODE'] ?>] <?= $list['TBLREKENING_NAMAREKENING'] ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Masa Pajak </p>
										</section>
										<section class="col col-md-2">
											<label class="input">
												<input type="text" name="MASA_TAHUN" placeholder="yyyy" id="MASA_TAHUN" maxlength="4" value="<?= date('Y') ?>">
											</label>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="MASA_BULAN" id="MASA_BULAN">
													<option selected="" value="">-- Pilih Bulan --</option>
													<?php for($blnke=1; $blnke<=12; $blnke++): ?>
													<option value="<?= $blnke ?>"><?= LokalIndonesia::getBulan($blnke) ?></option>
													<?php endfor ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Tanggal Entri SPTPD</p>
										</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="TANGGAL_SPT" class="datepicker " data-dateformat="dd-mm-yy" placeholder="dd-mm-yyyy" id="TANGGAL_SPT">
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Golongan </p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" name="param[TBLDAFTAR_GOLONGAN]" id="TBLDAFTAR_GOLONGAN">
													<option selected="" value="">-- Silahkan Pilih --</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Badan Usaha</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select id="REFBADANUSAHA_ID" name="param[REFBADANUSAHA_ID]" class="select2">
													<option value="" selected="">-- Pilih Badan Usaha --</option>
													<?php foreach ($data['rek'] as $row_rek): ?>
														<option value="<?=$row_rek['REFBADANUSAHA_ID']; ?>"><?=$row_rek['REFBADANUSAHA_NAMA']; ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Status </p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" name="param[TBLDAFTAR_ISAKTIF]" id="TBLDAFTAR_ISAKTIF">
													<option selected="" value="">-- Silahkan Pilih --</option>
													<option value="Y">Aktif</option>
													<option value="T">Tidak Aktif</option>
												</select>
											</label>
										</section>
									</div>

									<div class=" hidden"><b>Pemilik / Perorangan</b></div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Nama</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKNAMA" name="param[TBLDAFTAR_PEMILIKNAMA]">
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Kecamatan</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select onchange="getKelurahan(this.value)" name="param[TBLKECAMATAN_IDPEMILIK]" id="TBLKECAMATAN_IDPEMILIK" class="select2" placeholder="--- Pilih Kecamatan---">
													<option value="" selected="">-- Pilih Kecamatan --</option>
													<?php foreach ($data['kec'] as $row_kec): ?>
														<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Kelurahan</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select name="param[TBLKELURAHAN_IDPEMILIK]" id="TBLKELURAHAN_IDPEMILIK" class="select2">
													<option value="">-- Pilih Kecamatan --</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Alamat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKALAMAT" name="param[TBLDAFTAR_PEMILIKALAMAT]">
											</label>
										</section>
									</div>

									<div class=" hidden"><b>Badan Usaha</b></div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Nama</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]">
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Kecamatan</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select onchange="getKelurahan2(this.value)" id="TBLKECAMATAN_IDBADANUSAHA" name="param[TBLKECAMATAN_IDBADANUSAHA]" class="select2">
													<option value="" selected="">-- Pilih Kecamatan --</option>
													<?php foreach ($data['kec'] as $row_kec): ?>
														<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
													<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Kelurahan</p>
										</section>
										<section class="col col-md-3">
											<label class="select"> <i class="icon-append fa fa-search"></i>
												<select name="param[TBLKELURAHAN_IDBADANUSAHA]" id="TBLKELURAHAN_IDBADANUSAHA" class="select2">
													<option value="">-- Pilih Kelurahan --</option>
												</select>
											</label>
										</section>
									</div>
									<div class="row hidden">
										<section class="col col-md-2">
											<p>Alamat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAALAMAT" name="param[TBLDAFTAR_BADANUSAHAALAMAT]">
											</label>
										</section>
									</div>
								</fieldset>	
							</div>	
							<footer>
								<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
									<i class="fa  fa-search"></i>&nbsp;Cari
								</button>
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

</section>
<!-- end widget grid -->


<!--Modal Salin-->
<div class="modal fade" id="form-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-edit"></i> Form Ubah Data
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-ubah-data">
					<fieldset>
						<div class="row">
							<section class="col col-md-2">
								<p>Nomor Pokok </p>
							</section>
							<section class="col col-md-6">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_NOPOK_edit" name="TBLDAFTAR_NOPOK_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Jenis Penerimaan </p>
							</section>
							<section class="col col-md-6">
								<label class="select">
									<select class="select2" id="TBLDAFTAR_JENISPENDAPATAN_edit" name="TBLDAFTAR_JENISPENDAPATAN_edit">
										<option selected="">== Silahkan Pilih ==</option>
										<option value="P">Pajak</option>
										<option value="R">Retribusi</option>
									</select>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Golongan </p>
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select class="select2" disabled="" name="TBLDAFTAR_GOLONGAN_edit" id="TBLDAFTAR_GOLONGAN_edit">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select> 
								</label>
							</section>
							<section class="col col-md-2">
								<p>Formulir </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_NOFORMULIR_edit" name="TBLDAFTAR_NOFORMULIR_edit">
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
									<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKNAMA_edit" name="TBLDAFTAR_PEMILIKNAMA_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Alamat</p>
							</section>
							<section class="col col-md-6">
								<label class="textarea"> 										
									<textarea rows="3" name="TBLDAFTAR_PEMILIKALAMAT_edit" id="TBLDAFTAR_PEMILIKALAMAT_edit"></textarea> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Rt/Rw </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKRTRW_edit" name="TBLDAFTAR_PEMILIKRTRW_edit">
								</label>
							</section>
							<section class="col col-md-2">
								<p>No Telp </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKTELP_edit" name="TBLDAFTAR_PEMILIKTELP_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Kecamatan</p>
							</section>
							<section class="col col-md-3">
								<label class="select"> <i class="icon-append fa fa-search"></i>
									<select onchange="getKelurahanedit(this.value)" id="TBLKECAMATAN_IDPEMILIK_edit" name="TBLKECAMATAN_IDPEMILIK_edit" class="select2">
										<option value="" selected="">-- Pilih Kecamatan --</option>
										<?php foreach ($data['kec'] as $row_kec): ?>
											<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
										<?php endforeach ?>
									</select>
								</label>
							</section>
							<section class="col col-md-2">
								<p>Kode Pos </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKKODEPOS_edit" name="TBLDAFTAR_PEMILIKKODEPOS_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Kelurahan</p>
							</section>
							<section class="col col-md-3">
								<label class="select"> <i class="icon-append fa fa-search"></i>
									<select name="TBLKELURAHAN_IDPEMILIK_edit" id="TBLKELURAHAN_IDPEMILIK_edit" class="select2">
										<option value="">-- Pilih Kelurahan --</option>
									</select>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">Kota</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKKOTA_edit" name="TBLDAFTAR_PEMILIKKOTA_edit">
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
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHANAMA_edit" name="TBLDAFTAR_BADANUSAHANAMA_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Alamat</p>
							</section>
							<section class="col col-md-6">
								<label class="textarea"> 										
									<textarea rows="3" name="TBLDAFTAR_BADANUSAHAALAMAT_edit" id="TBLDAFTAR_BADANUSAHAALAMAT_edit"></textarea> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Rt/Rw </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHA_edit" name="TBLDAFTAR_BADANUSAHA_edit">
								</label>
							</section>
							<section class="col col-md-2">
								<p>No Telp </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHATELP_edit" name="TBLDAFTAR_BADANUSAHATELP_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Kecamatan</p>
							</section>
							<section class="col col-md-3">
								<label class="select"> <i class="icon-append fa fa-search"></i>
									<select onchange="getKelurahanedit2(this.value)" id="TBLKECAMATAN_IDBADANUSAHA_edit" name="TBLKECAMATAN_IDBADANUSAHA_edit" class="select2">
										<option value="" selected="">-- Pilih Kecamatan --</option>
										<?php foreach ($data['kec'] as $row_kec): ?>
											<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
										<?php endforeach ?>
									</select>
								</label>
							</section>
							<section class="col col-md-2">
								<p>Kode Pos </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAKODEPOS_edit" name="TBLDAFTAR_BADANUSAHAKODEPOS_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Kelurahan</p>
							</section>
							<section class="col col-md-3">
								<label class="select"> <i class="icon-append fa fa-search"></i>
									<select name="TBLKELURAHAN_IDBADANUSAHA_edit" id="TBLKELURAHAN_IDBADANUSAHA_edit" class="select2">
										<option value="">-- Pilih Kelurahan --</option>
									</select>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">Kota</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAKOTA_edit" name="TBLDAFTAR_BADANUSAHAKOTA_edit">
								</label>
							</section>
						</div>

						<header style="border-color: red;">Pendataan Pribadi</header><br>
						<div class="row">
							<section class="col col-md-2">
								<p>Bidang Usaha </p>
							</section>
							<section class="col col-md-3">
								<label class="select"> <i class="icon-append fa fa-search"></i>
									<select id="REFBADANUSAHA_IDBADANUSAHA_edit" name="REFBADANUSAHA_IDBADANUSAHA_edit" class="select2" disabled="">
										<option value="" selected="">-- Pilih Badan Usaha --</option>
										<?php foreach ($data['rek'] as $row_rek): ?>
											<option value="<?=$row_rek['REFBADANUSAHA_ID']; ?>"><?=$row_rek['REFBADANUSAHA_NAMA']; ?></option>
										<?php endforeach ?>
									</select>
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Tanggal Pengukuhan </p>
							</section>
							<section class="col col-md-3">
								<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="TBLDAFTAR_TANGGALKUKUH_edit" class="datepicker " data-dateformat="dd/mm/yy" id="TBLDAFTAR_TANGGALKUKUH_edit">
								</label>
							</section>
							<section class="col col-md-2">
								<p>No Pengukuhan </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_NOKUKUH_edit" name="TBLDAFTAR_NOKUKUH_edit">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-md-2">
								<p>Tanggal Formulir Diterima </p>
							</section>
							<section class="col col-md-3">
								<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="TBLDAFTAR_TANGGALTERIMADAFTAR_edit" class="datepicker " data-dateformat="dd/mm/yy" id="TBLDAFTAR_TANGGALTERIMADAFTAR_edit">
								</label>
							</section>
							<section class="col col-md-2">
								<p>Cara Perhitungan </p>
							</section>
							<section class="col col-md-3">
								<label class="select">
									<select name="TBLDAFTAR_ISJENISPENDAFTARAN_edit" id="TBLDAFTAR_ISJENISPENDAFTARAN_edit">
										<option selected="" disabled="">== Silahkan Pilih ==</option>
										<option value="O">Official Assessment</option>
										<option value="S">Self Assessment</option>
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
									<input type="text" name="TBLDAFTAR_TANGGALENTRYDAFTAR_edit" class="datepicker " data-dateformat="dd/mm/yy" id="TBLDAFTAR_TANGGALENTRYDAFTAR_edit">
								</label>
							</section>
						</div>

					</fieldset>	

					<footer>
						<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="simpan()">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>							


			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<section id="widget-grid-tetapan" style="display: none;" class="">
	<div class="well well-sm well-light">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-orange" id="wid-id-fsdfgs12441278"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Data Grid</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body no-padding">
							<div id="button_manager">
								<p class="alert alert-warning">
									<button type="button" class="btn btn-default" disabled="disabled">
										<i class="fa fa-pencil"></i> Ubah Data
									</button>
									<button type="button" class="btn btn-default" disabled="disabled">
										<i class="fa fa-times"></i> Hapus Pendataan
									</button>
									<button type="button" class="btn btn-default" disabled="disabled">
										<i class="fa fa-times"></i> Hapus Ketetapan
									</button>
									<button type="button" class="btn btn-default" disabled="disabled">
										<i class="fa fa-times"></i> Hapus SSPD
									</button>
								</p>
							</div>
							<div id="kontrol_table" style="overflow-y: scroll;overflow-x: scroll;height: 300px;width: 100%;">
								<table id="dt_pipeline" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th width="10%" data-hide="phone"></th>
											<th width="5%" data-hide="phone">NO</th>
											<th width="25%" data-class="expand">Nama Pemilik</th>
											<th data-hide="phone">Nomor SPTPD</th>
											<th data-hide="phone, tablet">Nama Obyek</th>
											<th data-hide="phone, tablet">Lokasi Obyek</th>
											<th data-hide="phone, tablet">Kelurahan / Kecamatan</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>

<div id="dialog-message" title="" align="center" style="width: 300px; display:none;">
	<img id="loadinginfo" src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memproses...">
	<p>Mohon tunggu sampai proses transfer selesai</p>
</div>

<script type="text/javascript">
	
	pageSetUp();
	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'app/super_datamanager/autocompletewp',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	function cari() {

			$("html, body").animate({ scrollTop: 800 }, "slow");
			$("#widget-grid-tetapan").slideDown(600);
			$("#kontrol_table").html(LOADER).fadeIn(400);
			$("#button_manager button").prop('disabled',1);
			$.ajax({
				url: 'app/super_datamanager/GetData',
				type: 'POST',
				data: $("#form_sumber_pajak").serialize(),
				success: function(respon) {
					$('#kontrol_table').html(respon);
					
		            $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
		            $(".loader_img").fadeOut(1000);
				}
			});
			
			$('#widget-grid-tetapan').show('fast');
		// }
	}

	$(document).ready(function() {
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
	});

	jQuery(document).ready(function($) {
		//loadDataTable();
	});

	jQuery(document).ready(function($) {
		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
		$("#dialog-message").modal('hide');
		$("#dialog-message").dialog({
			autoOpen : false,
			modal : true,
			title: "Mentransfer Data",
		});

		setPriceFormat();
	});

	function loadingTransfer(ev) {
		/*ev{open|close}*/
		$('#dialog-message').dialog(ev);
		$(".ui-dialog-titlebar-close").hide();
	}

	function edit(id) {
		$.ajax({
			url: 'app/super_datamanager/getdataedit',
			type: 'POST',
			dataType: 'json',
			data: {
				TBLDAFTAR_NOPOK : id
					// ,bulan : $('#masapajak_bulan').select2('val')
					// ,tahun : $('#masapajak_tahun').val()
				},
				success: function(respon) {
					/*if (respon.data=='ada') {
						if (respon==false) {
							notifikasi('Data yang anda cari tidak ditemukan', 'Data dengan nomor '+$('#nomor_pajak').val()+' Tidak ditemukan', 'failed', 1,0);
						} else {
							notifikasi('Data yang anda cari tidak sudah pernah diinputkan', 'Data dengan nomor '+$('#nomor_pajak').val()+' Sudah Pernah Diinputkan', 'failed', 1,0);
						}
					} else {
						if (respon==false) {
							notifikasi('Data yang anda cari tidak ditemukan', 'Data dengan nomor '+$('#nomor_pajak').val()+' Tidak ditemukan', 'failed', 0,0);
						} else {*/
							// $("#form-edit").html(respon);

							$('#TBLDAFTAR_NOPOK_edit').val(respon.TBLDAFTAR_NOPOK);
							$('#TBLDAFTAR_JENISPENDAPATAN_edit').select2('val',respon.TBLDAFTAR_JENISPENDAPATAN);
							
							$('#TBLDAFTAR_PEMILIKNAMA_edit').val(respon.TBLDAFTAR_PEMILIKNAMA);
							$('#TBLDAFTAR_PEMILIKALAMAT_edit').val(respon.TBLDAFTAR_PEMILIKALAMAT);
							$('#TBLDAFTAR_PEMILIKRTRW_edit').val(respon.TBLDAFTAR_PEMILIKRTRW);
							$('#TBLDAFTAR_PEMILIKTELP_edit').val(respon.TBLDAFTAR_PEMILIKTELP);

							$('#TBLKECAMATAN_IDPEMILIK_edit').select2('val',respon.TBLKECAMATAN_IDPEMILIK);
							getKelurahanedit(respon.TBLKECAMATAN_IDPEMILIK);
							setTimeout(function() {
								$('#TBLKELURAHAN_IDPEMILIK_edit').select2('val',respon.TBLKELURAHAN_IDPEMILIK);
							}, 500);
							$('#TBLDAFTAR_PEMILIKKOTA_edit').val(respon.TBLDAFTAR_PEMILIKKOTA);
							
							$('#TBLDAFTAR_BADANUSAHANAMA_edit').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#TBLDAFTAR_BADANUSAHAALAMAT_edit').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
							$('#TBLDAFTAR_BADANUSAHA_edit').val(respon.TBLDAFTAR_BADANUSAHA);
							$('#TBLDAFTAR_BADANUSAHATELP_edit').val(respon.TBLDAFTAR_BADANUSAHATELP);
							$('#TBLDAFTAR_BADANUSAHAKODEPOS_edit').val(respon.TBLDAFTAR_BADANUSAHAKODEPOS);

							$('#TBLKECAMATAN_IDBADANUSAHA_edit').select2('val',respon.TBLKECAMATAN_IDBADANUSAHA);
							getKelurahanedit2(respon.TBLKECAMATAN_IDBADANUSAHA);
							setTimeout(function() {
								$('#TBLKELURAHAN_IDBADANUSAHA_edit').select2('val',respon.TBLKELURAHAN_IDBADANUSAHA);
							}, 500);

							$('#TBLDAFTAR_BADANUSAHAKOTA_edit').val(respon.TBLDAFTAR_BADANUSAHAKOTA);

							TBLDAFTAR_TANGGALKUKUH_edit = respon.TBLDAFTAR_TANGGALKUKUH +'/'+ respon.TBLDAFTAR_BULANKUKUH +'/20'+ respon.TBLDAFTAR_TAHUNKUKUH;
							$('#TBLDAFTAR_TANGGALKUKUH_edit').val(TBLDAFTAR_TANGGALKUKUH_edit);

							TBLDAFTAR_TANGGALTERIMADAFTAR_edit = respon.TBLDAFTAR_TANGGALTERIMADAFTAR +'/'+ respon.TBLDAFTAR_BULANTERIMADAFTAR +'/20'+ respon.TBLDAFTAR_TAHUNTERIMADAFTAR;
							$('#TBLDAFTAR_TANGGALTERIMADAFTAR_edit').val(respon.TBLDAFTAR_TANGGALTERIMADAFTAR_edit);
							
							TBLDAFTAR_TANGGALENTRYDAFTAR_edit = respon.TBLDAFTAR_TANGGALENTRYDAFTAR +'/'+ respon.TBLDAFTAR_BULANENTRYDAFTAR +'/20'+ respon.TBLDAFTAR_TAHUNENTRYDAFTAR;
							$('#TBLDAFTAR_TANGGALENTRYDAFTAR_edit').val(respon.TBLDAFTAR_TANGGALENTRYDAFTAR_edit);

							$('#TBLDAFTAR_NOKUKUH_edit').val(respon.TBLDAFTAR_NOKUKUH);

							$('#TBLDAFTAR_GOLONGAN_edit').val(respon.TBLDAFTAR_GOLONGAN);
							$('#REFBADANUSAHA_IDBADANUSAHA_edit').select2('val',respon.REFBADANUSAHA_IDBADANUSAHA);

							$('#TBLDAFTAR_ISJENISPENDAFTARAN_edit').val(respon.TBLDAFTAR_ISJENISPENDAFTARAN);

							// $("#edit").modal('show');
						// }
					// }
				}
			});

		$("#form-edit").modal('show');
		
	}


	function hapus(id) {
		window.id = id;
		window.cmd = "hapus";
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah anda yakin akan menghapus Data Perusahaan ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					type: 'POST',
					data: {id: id},
					success: function  (respon) {
						if (respon=='success') 
							notifikasi("Sukses","Data berhasil dihapus","success");
						else
							notifikasi("Gagal","Data gagal dihapus","failed");
					}
				});

			}

		});
		
	}

	function putuskan(elm) {
		// $("#button_manager").html('');
		window.elm_putus = elm;
		$("#button_manager button").prop('disabled',1);
		$.ajax({
			url: 'app/super_datamanager/button',
			type: 'POST',
			data: {code: $(elm).val()},
		})
		.done(function(respon) {
			$("#button_manager").html(respon);
		})
		.fail(function(jqXHR, exception) {
			handelErr(jqXHR, exception);
		})
		.always(function() {
			console.log("complete");
		});
		
	}

</script>