<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Ubah Data Pendaftaran</h4>
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
												<input class="input-sm" type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Penerimaan </p>
										</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" name="param[TBLDAFTAR_JENISPENDAPATAN]" id="TBLDAFTAR_JENISPENDAPATAN">
													<option selected="" value="">-- Silahkan Pilih --</option>
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
									<div class="row">
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
									<div class="row">
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

									<div><b>Pemilik / Perorangan</b></div><hr><br>
									<div class="row">
										<section class="col col-md-2">
											<p>Nama</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKNAMA" name="param[TBLDAFTAR_PEMILIKNAMA]">
											</label>
										</section>
									</div>
									<div class="row">
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
									<div class="row">
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
									<div class="row">
										<section class="col col-md-2">
											<p>Alamat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" maxlength="100" type="text" id="TBLDAFTAR_PEMILIKALAMAT" name="param[TBLDAFTAR_PEMILIKALAMAT]">
											</label>
										</section>
									</div>

									<div><b>Badan Usaha</b></div><hr><br>
									<div class="row">
										<section class="col col-md-2">
											<p>Nama</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]">
											</label>
										</section>
									</div>
									<div class="row">
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
									<div class="row">
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
									<div class="row">
										<section class="col col-md-2">
											<p>Alamat</p>
										</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="input-sm" maxlength="100" type="text" id="TBLDAFTAR_BADANUSAHAALAMAT" name="param[TBLDAFTAR_BADANUSAHAALAMAT]">
											</label>
										</section>
									</div>
								</fieldset>	
							</div>
							<fieldset>	
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Pengukuhan </p>
									</section>
									<section class="col col-md-4">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker " data-dateformat="dd-mm-yy" id="tgl_pengukuhan">
										</label>
									</section>
								</div>
							</fieldset>		
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
									<select class="select2" onchange="setRekening(this.value)" name="TBLDAFTAR_GOLONGAN_edit" id="TBLDAFTAR_GOLONGAN_edit">
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
								<p>NIK </p>
							</section>
							<section class="col col-md-6">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_NIK_edit" name="TBLDAFTAR_NIK_edit">
								</label>
							</section>
						</div>
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
									<textarea rows="3" maxlength="100" name="TBLDAFTAR_PEMILIKALAMAT_edit" id="TBLDAFTAR_PEMILIKALAMAT_edit"></textarea> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Rt/Rw </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKRTRW_edit" name="TBLDAFTAR_PEMILIKRTRW_edit" maxlength="5">
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
                               <p>Provinsi</p>
                            </section>
                            <section class="col col-md-3">
                                <label class="select">
                                <select id="TBLPROVINSI_KODE" name="TBLPROVINSI_KODE" class="select2">
                                        <option value="">=== Pilih Provinsi ===</option>
                                        <?php foreach ($data['provinsi'] as $row_prov): ?>
                                            <option value="<?=$row_prov['TBLPROVINSI_KODE']; ?>"><?=$row_prov['TBLPROVINSI_NAMA']; ?></option>
                                        <?php endforeach ?>
                                        <option value="0" selected="">LUAR DAERAH</option>
                                    </select>
                                </label>
                            </section>
						</div>
						<div class="row">
							 <section class="col col-md-2">
                               <p>Kabupaten</p>
                            </section>
                            <section class="col col-md-3">
                                <label class="select">
                                <select id="TBLKABUPATEN_KODE" name="TBLKABUPATEN_KODE" class="select2" onchange="$('input[id=TBLDAFTAR_PEMILIKKOTA_edit]').val(this[selectedIndex].text);">
                                        <option value="">=== Pilih Kabupaten ===</option>
										<option value="0">LUAR KOTA</option>
                                    </select>
                                </label>
                            </section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Kecamatan</p>
							</section>
							<section class="col col-md-3">
								<label class="select">
                                <select id="TBLKECAMATAN_KODE" name="TBLKECAMATAN_KODE" class="select2">
                                        <option value="" >=== Pilih Kecamatan ===</option>
										<option value="0">LUAR KOTA</option>
                                    </select>
                                </label>
							</section>
							<section class="col col-md-1">
								<p>Kode Pos </p>
							</section>
							<section class="col col-md-2">
                                <label for="address" class="input">
                                    <input type="text" id="TBLDAFTAR_PEMILIKKODEPOS_edit" name="TBLDAFTAR_PEMILIKKODEPOS_edit">
                                </label>
							</section>
						</div>

						<div class="row">
							<section class="col col-md-2">
								<p>Kelurahan</p>
							</section>
							<section class="col col-md-3">
								<label class="select">
                                    <select id="TBLKELURAHAN_KODE" name="TBLKELURAHAN_KODE" class="select2">
                                        <option value="">=== Pilih Kelurahan ===</option>
										<option value="0">LUAR KOTA</option>
                                    </select>
                                </label>
							</section>
						</div>
						<div class="row" style="display:none;">
							<section class="col col-md-2">Kota</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_PEMILIKKOTA_edit" value="KOTA YOGYAKARTA" name="TBLDAFTAR_PEMILIKKOTA_edit">
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
									<textarea rows="3" maxlength="100" name="TBLDAFTAR_BADANUSAHAALAMAT_edit" id="TBLDAFTAR_BADANUSAHAALAMAT_edit"></textarea> 
								</label>
							</section>
						</div>
						<div class="row">
									<section class="col col-md-2">
										<p>Izin Usaha </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" maxlength="100" type="text" id="TBLDAFTAR_NIB" name="TBLDAFTAR_NIB">
										</label>
									</section>
								</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Rt/Rw </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHARTRW_edit" name="TBLDAFTAR_BADANUSAHARTRW_edit">
								</label>
							</section>
							<section class="col col-md-2">
								<p>No Telp </p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHATELPAREA_edit" name="TBLDAFTAR_BADANUSAHATELPAREA_edit">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
                               <p>Provinsi</p>
                            </section>
                            <section class="col col-md-3">
                                <label class="select">
                                <select id="TBLPROVINSI_KODEBU_edit" name="TBLPROVINSI_KODEBU_edit" class="select2">
                                        <option value="">=== Pilih Provinsi ===</option>
                                        <?php foreach ($data['provinsi'] as $row_prov): ?>
                                            <option value="<?=$row_prov['TBLPROVINSI_KODE']; ?>"><?=$row_prov['TBLPROVINSI_NAMA']; ?></option>
                                        <?php endforeach ?>
                                        <option value="0" selected="">LUAR DAERAH</option>
                                    </select>
                                </label>
                            </section>
						</div>
						<div class="row">
							 <section class="col col-md-2">
                               <p>Kabupaten</p>
                            </section>
                            <section class="col col-md-3">
                                <label class="select">
                                <select id="TBLKABUPATEN_KODEBU_edit" name="TBLKABUPATEN_KODEBU_edit" class="select2" onchange="$('input[id=TBLDAFTAR_BADANUSAHAKOTA_edit]').val(this[selectedIndex].text);">
                                        <option value="">=== Pilih Kabupaten ===</option>
										<option value="0">LUAR KOTA</option>
                                    </select>
                                </label>
                            </section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>Kecamatan</p>
							</section>
							<section class="col col-md-3">
								<label class="select">
                                <select id="TBLKECAMATAN_KODEBU_edit" name="TBLKECAMATAN_KODEBU_edit" class="select2">
                                        <option value="" >=== Pilih Kecamatan ===</option>
										<option value="0">LUAR KOTA</option>
                                    </select>
                                </label>
							</section>
							<section class="col col-md-1">
								<p>Kode Pos </p>
							</section>
							<section class="col col-md-2">
                                <label for="address" class="input">
                                    <input type="text" id="TBLDAFTAR_BADANUSAHAKODEPOS_edit" name="TBLDAFTAR_BADANUSAHAKODEPOS_edit">
                                </label>
							</section>
						</div>

						<div class="row">
							<section class="col col-md-2">
								<p>Kelurahan</p>
							</section>
							<section class="col col-md-3">
								<label class="select">
                                    <select id="TBLKELURAHAN_KODEBU_edit" name="TBLKELURAHAN_KODEBU_edit" class="select2">
                                        <option value="">=== Pilih Kelurahan ===</option>
										<option value="0">LUAR KOTA</option>
                                    </select>
                                </label>
							</section>
							<section class="col col-md-1">
								<p>E - Mail</p>
							</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_EMAIL" name="TBLDAFTAR_EMAIL">
								</label>
							</section>
						</div>
						<?php /*?><div class="row">
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
									<select name="TBLKELURAHAN_IDBADANUSAHA_edit" id="TBLKELURAHAN_IDBADANUSAHA_edit" class="select2" onchange="getKodepos2(this.value)">
										<option value="">-- Pilih Kelurahan --</option>
									</select>
								</label>
							</section>
						</div><?php */?>
						<div class="row" style="display:none;">
							<section class="col col-md-2">Kota</section>
							<section class="col col-md-3">
								<label class="input">
									<input class="input-sm" type="text" id="TBLDAFTAR_BADANUSAHAKOTA_edit" name="TBLDAFTAR_BADANUSAHAKOTA_edit" value="KOTA YOGYAKARTA">
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
									<select id="REFBADANUSAHA_IDBADANUSAHA_edit" name="REFBADANUSAHA_IDBADANUSAHA_edit" class="select2">
										<option value="" selected="">-- Pilih Badan Usaha --</option>
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
									<input type="text" name="TBLDAFTAR_TANGGALKUKUH_edit" class="datepicker " data-dateformat="dd-mm-yy" id="TBLDAFTAR_TANGGALKUKUH_edit">
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
									<input type="text" name="TBLDAFTAR_TANGGALTERIMADAFTAR_edit" class="datepicker " data-dateformat="dd-mm-yy" id="TBLDAFTAR_TANGGALTERIMADAFTAR_edit">
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
									<input type="text" name="TBLDAFTAR_TANGGALENTRYDAFTAR_edit" class="datepicker " data-dateformat="dd-mm-yy" id="TBLDAFTAR_TANGGALENTRYDAFTAR_edit">
								</label>
							</section>
						</div>

					</fieldset>	

					<footer>
						<button type="button" class="btn btn-primary" onclick="simpan()">
							Simpan
						</button>
						<button type="button" class="btn btn-warning dropdown-toggle" disabled="disabled" id="CETAK_KARTU">
							<i class="fa fa-print"></i> Cetak Kartu
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
						<p class="alert alert-info"> 
							<button type="button" class="btn btn-default" onclick="cetak()">
								<i class="fa fa-print"></i> Cetak Daftar
							</button>	
							<button type="button" class="btn btn-default" onclick="cetak_status()">
								<i class="fa fa-print"></i> Cetak Daftar Status
							</button>					
						</p>
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

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendaftaran/ubah_data/autocompletewp',

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
			$.ajax({
				url: 'pendaftaran/ubah_data/GetData',
				type: 'POST',
				data:  {
						TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
						, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").select2('val')
						, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
						, REFBADANUSAHA_ID: $("#REFBADANUSAHA_ID").select2('val')
						, TBLDAFTAR_ISAKTIF: $("#TBLDAFTAR_ISAKTIF").val()
						, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
						, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").select2('val')
						, TBLKELURAHAN_IDPEMILIK: $("#TBLKELURAHAN_IDPEMILIK").select2('val')
						, TBLDAFTAR_PEMILIKALAMAT: $("#TBLDAFTAR_PEMILIKALAMAT").val()
						, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
						, TBLKECAMATAN_IDBADANUSAHA: $("#TBLKECAMATAN_IDBADANUSAHA").select2('val')
						, TBLKELURAHAN_IDBADANUSAHA: $("#TBLKELURAHAN_IDBADANUSAHA").select2('val')
						, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
					},
				success: function(respon) {
					$('#kontrol_table').html(respon);
		            $("#kontrol_table").prepend('<div align="center">'+LOADER+'');
		            $(".loader_img").fadeOut(1000);
				}
			});
			
			$('#widget-grid-tetapan').show('fast');
		// }
	}


	function cetak() {
		var param = jQuery.param(
		{
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").select2('val')
			, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
			, REFBADANUSAHA_ID: $("#REFBADANUSAHA_ID").select2('val')
			, TBLDAFTAR_ISAKTIF: $("#TBLDAFTAR_ISAKTIF").val()
			, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
			, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").select2('val')
			, TBLKELURAHAN_IDPEMILIK: $("#TBLKELURAHAN_IDPEMILIK").select2('val')
			, TBLDAFTAR_PEMILIKALAMAT: $("#TBLDAFTAR_PEMILIKALAMAT").val()
			, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
			, TBLKECAMATAN_IDBADANUSAHA: $("#TBLKECAMATAN_IDBADANUSAHA").select2('val')
			, TBLKELURAHAN_IDBADANUSAHA: $("#TBLKELURAHAN_IDBADANUSAHA").select2('val')
			, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
		}
		);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendaftaran/ubah_data/cetak?' + param);
	}

	function cetak_status() {
		var param = jQuery.param(
		{
			TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
			, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").select2('val')
			, TBLDAFTAR_GOLONGAN: $("#TBLDAFTAR_GOLONGAN").val()
			, REFBADANUSAHA_ID: $("#REFBADANUSAHA_ID").select2('val')
			, TBLDAFTAR_ISAKTIF: $("#TBLDAFTAR_ISAKTIF").val()
			, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
			, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").select2('val')
			, TBLKELURAHAN_IDPEMILIK: $("#TBLKELURAHAN_IDPEMILIK").select2('val')
			, TBLDAFTAR_PEMILIKALAMAT: $("#TBLDAFTAR_PEMILIKALAMAT").val()
			, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
			, TBLKECAMATAN_IDBADANUSAHA: $("#TBLKECAMATAN_IDBADANUSAHA").select2('val')
			, TBLKELURAHAN_IDBADANUSAHA: $("#TBLKELURAHAN_IDBADANUSAHA").select2('val')
			, TBLDAFTAR_BADANUSAHAALAMAT: $("#TBLDAFTAR_BADANUSAHAALAMAT").val()
		}
		);
		window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendaftaran/ubah_data/cetak_status?' + param);
	}

	jQuery(document).ready(function($) {
		//loadDataTable();
	});

	function loadDataTable() {
		var param = {

		};

		$.ajax({
			url: 'pendaftaran/ubah_data/cari',
			type: 'POST',
			data: $("#form-cari").serialize()+'&'+jQuery.param(param),
		})
		.done(function(respon) {
			console.log("success");
			$("#kontrol_table").html(respon);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

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
	
	jQuery(document).ready(function($) {
		$.fn.modal.Constructor.prototype.enforceFocus = function () {}; //paksa select2 bisa search
	});
	
	function edit(id) {

		// if (CARI_NOPOK=='') {
		// 	notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
		// }
		// else {
		// 	$('#footer-hiburan').hide('fast');
		// 	$("html, body").animate({ scrollTop: 800 }, "slow");
		// 	$("#r_perhitungan").slideDown(500);
			
		// 	$('#form-data-perhitungan').hide('fast');

			$.ajax({
				url: 'pendaftaran/ubah_data/getdataedit',
				type: 'POST',
				dataType: 'json',
				data: {
					id:id
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

							$('#TBLDAFTAR_NIK_edit').val(respon.TBLDAFTAR_NIK);
   							$('#TBLDAFTAR_JENISPENDAPATAN_edit').select2('val',respon.TBLDAFTAR_JENISPENDAPATAN);
							
							$('#TBLDAFTAR_PEMILIKNAMA_edit').val(respon.TBLDAFTAR_PEMILIKNAMA);
							$('#TBLDAFTAR_PEMILIKALAMAT_edit').val(respon.TBLDAFTAR_PEMILIKALAMAT);
							$('#TBLDAFTAR_PEMILIKRTRW_edit').val(respon.TBLDAFTAR_PEMILIKRTRW);
							$('#TBLDAFTAR_PEMILIKTELP_edit').val(respon.TBLDAFTAR_PEMILIKTELP);
							$('#TBLDAFTAR_NOFORMULIR_edit').val(respon.TBLDAFTAR_NOFORMULIR);
							$('#TBLDAFTAR_EMAIL').val(respon.TBLDAFTAR_EMAIL);
							$('#TBLDAFTAR_NIB').val(respon.TBLDAFTAR_NIB);
							$('#TBLDAFTAR_PEMILIKTELP_edit').val(respon.TBLDAFTAR_PEMILIKTELP);
						
							$('#TBLDAFTAR_PEMILIKKODEPOS_edit').val(respon.TBLDAFTAR_PEMILIKKODEPOS);
							if(respon.TBLKELURAHAN_IDPEMILIK>'0' && respon.TBLPROVINSI_KODE=='0'){
								getkodebykd(respon.TBLKELURAHAN_IDPEMILIK);
							}else{
								$('#TBLPROVINSI_KODE').select2('val',respon.TBLPROVINSI_KODE);
								if(respon.TBLKABUPATEN_KODE=='0'){$('#TBLKABUPATEN_KODE').select2('val',respon.TBLKABUPATEN_KODE);}else{getkabupaten('TBLKABUPATEN_KODE', respon.TBLPROVINSI_KODE, respon.TBLKABUPATEN_KODE);}
								if(respon.TBLKECAMATAN_KODE=='0'){$('#TBLKECAMATAN_KODE').select2('val',respon.TBLKECAMATAN_KODE);}else{getkecamatan('TBLKECAMATAN_KODE', respon.TBLKABUPATEN_KODE, respon.TBLKECAMATAN_KODE);}
								if(respon.TBLKELURAHAN_KODE=='0'){$('#TBLKELURAHAN_KODE').select2('val',respon.TBLKELURAHAN_KODE);}else{getkelurahan('TBLKELURAHAN_KODE', respon.TBLKECAMATAN_KODE, respon.TBLKELURAHAN_KODE);}
								$('#TBLDAFTAR_PEMILIKKODEPOS_edit').val(respon.TBLDAFTAR_PEMILIKKODEPOS);
							}
							//setkodepos('TBLDAFTAR_PEMILIKKODEPOS_edit', respon.TBLKECAMATAN_KODE, respon.TBLKELURAHAN_KODE);							

							$('#TBLKECAMATAN_IDPEMILIK_edit').select2('val',respon.TBLKECAMATAN_IDPEMILIK);
							getKelurahanedit(respon.TBLKECAMATAN_IDPEMILIK);
							setTimeout(function() {
								$('#TBLKELURAHAN_IDPEMILIK_edit').select2('val',respon.TBLKELURAHAN_IDPEMILIK);
							}, 1500);
							$('#TBLDAFTAR_PEMILIKKOTA_edit').val(respon.TBLDAFTAR_PEMILIKKOTA);
							
							$('#TBLDAFTAR_BADANUSAHANAMA_edit').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#TBLDAFTAR_BADANUSAHAALAMAT_edit').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
							$('#TBLDAFTAR_BADANUSAHARTRW_edit').val(respon.TBLDAFTAR_BADANUSAHARTRW);
							$('#TBLDAFTAR_BADANUSAHATELPAREA_edit').val(respon.TBLDAFTAR_BADANUSAHATELPAREA);

							
							$('#TBLDAFTAR_BADANUSAHAKODEPOS_edit').val(respon.TBLDAFTAR_BADANUSAHAKODEPOS);
							
							if(respon.TBLKELURAHAN_IDBADANUSAHA>'0' && respon.TBLPROVINSI_KODEBU=='0'){
								getkodebykdbu(respon.TBLKELURAHAN_IDBADANUSAHA);
							}else{
								$('#TBLPROVINSI_KODEBU_edit').select2('val',respon.TBLPROVINSI_KODEBU);
								if(respon.TBLKABUPATEN_KODEBU=='0'){$('#TBLKABUPATEN_KODEBU_edit').select2('val',respon.TBLKABUPATEN_KODEBU);}else{getkabupatenbu('TBLKABUPATEN_KODEBU_edit', respon.TBLPROVINSI_KODEBU, respon.TBLKABUPATEN_KODEBU);}
								if(respon.TBLKECAMATAN_KODEBU=='0'){$('#TBLKECAMATAN_KODEBU_edit').select2('val',respon.TBLKECAMATAN_KODEBU);}else{getkecamatanbu('TBLKECAMATAN_KODEBU_edit', respon.TBLKABUPATEN_KODEBU, respon.TBLKECAMATAN_KODEBU);}
								if(respon.TBLKELURAHAN_KODEBU=='0'){$('#TBLKELURAHAN_KODEBU_edit').select2('val',respon.TBLKELURAHAN_KODEBU);}else{getkelurahanbu('TBLKELURAHAN_KODEBU_edit', respon.TBLKECAMATAN_KODEBU, respon.TBLKELURAHAN_KODEBU);}
								$('#TBLDAFTAR_PEMILIKKODEPOS_edit').val(respon.TBLDAFTAR_PEMILIKKODEPOS);
							}

							//$('#TBLKECAMATAN_IDBADANUSAHA_edit').select2('val',respon.TBLKECAMATAN_IDBADANUSAHA);
							//getKelurahanedit2(respon.TBLKECAMATAN_IDBADANUSAHA);
							//setTimeout(function() {
							//$('#TBLKELURAHAN_IDBADANUSAHA_edit').select2('val',respon.TBLKELURAHAN_IDBADANUSAHA);
							//}, 500);
							//getkodebykd2(respon.TBLKELURAHAN_IDBADANUSAHA);
							
							
							$('#TBLDAFTAR_BADANUSAHAKOTA_edit').val(respon.TBLDAFTAR_BADANUSAHAKOTA);

							if(respon.TBLDAFTAR_TAHUNKUKUH>80){
							TBLDAFTAR_TANGGALKUKUH_edit = respon.TBLDAFTAR_TANGGALKUKUH +'-'+ respon.TBLDAFTAR_BULANKUKUH +'-19'+ respon.TBLDAFTAR_TAHUNKUKUH;
							} else {
							TBLDAFTAR_TANGGALKUKUH_edit = respon.TBLDAFTAR_TANGGALKUKUH +'-'+ respon.TBLDAFTAR_BULANKUKUH +'-20'+ respon.TBLDAFTAR_TAHUNKUKUH;
							}
							$('#TBLDAFTAR_TANGGALKUKUH_edit').val(TBLDAFTAR_TANGGALKUKUH_edit);

							if(respon.TBLDAFTAR_TAHUNTERIMADAFTAR>80){
							TBLDAFTAR_TANGGALTERIMADAFTAR_edit = respon.TBLDAFTAR_TANGGALTERIMADAFTAR +'-'+ respon.TBLDAFTAR_BULANTERIMADAFTAR +'-19'+ respon.TBLDAFTAR_TAHUNTERIMADAFTAR;
							} else {
							TBLDAFTAR_TANGGALTERIMADAFTAR_edit = respon.TBLDAFTAR_TANGGALTERIMADAFTAR +'-'+ respon.TBLDAFTAR_BULANTERIMADAFTAR +'-20'+ respon.TBLDAFTAR_TAHUNTERIMADAFTAR;
							}
							$('#TBLDAFTAR_TANGGALTERIMADAFTAR_edit').val(TBLDAFTAR_TANGGALTERIMADAFTAR_edit);
							
							if(respon.TBLDAFTAR_TAHUNENTRYDAFTAR>80){
							TBLDAFTAR_TANGGALENTRYDAFTAR_edit = respon.TBLDAFTAR_TANGGALENTRYDAFTAR +'-'+ respon.TBLDAFTAR_BULANENTRYDAFTAR +'-19'+ respon.TBLDAFTAR_TAHUNENTRYDAFTAR;
							} else {
							TBLDAFTAR_TANGGALENTRYDAFTAR_edit = respon.TBLDAFTAR_TANGGALENTRYDAFTAR +'-'+ respon.TBLDAFTAR_BULANENTRYDAFTAR +'-20'+ respon.TBLDAFTAR_TAHUNENTRYDAFTAR;
							}
							$('#TBLDAFTAR_TANGGALENTRYDAFTAR_edit').val(TBLDAFTAR_TANGGALENTRYDAFTAR_edit);

							$('#TBLDAFTAR_NOKUKUH_edit').val(respon.TBLDAFTAR_NOKUKUH);

							$('#TBLDAFTAR_GOLONGAN_edit').select2('val',respon.TBLDAFTAR_GOLONGAN);
							// setRekening(respon.TBLDAFTAR_GOLONGAN)
							// setTimeout(function() {
							// $('#REFBADANUSAHA_IDBADANUSAHA_edit').select2('val',respon.REFBADANUSAHA_IDBADANUSAHA);
							// }, 500);

							setRekening(respon.TBLDAFTAR_GOLONGAN, respon.REFBADANUSAHA_IDBADANUSAHA);

							$('#TBLDAFTAR_ISJENISPENDAFTARAN_edit').val(respon.TBLDAFTAR_ISJENISPENDAFTARAN);
														

							// $("#edit").modal('show');
						// }
					// }
				}
			});

			$("#form-edit").modal('show');
		
		// }
		
	}

	function setRekening(val, idbu) {
		$("#REFBADANUSAHA_IDBADANUSAHA_edit").select2('val', '');
		$.ajax({
			url: 'pendaftaran/ubah_data/setRekening',
			type: 'POST',
			dataType: 'html',
			data: {
				value: val
			},
			success: function(respon) {
				//setSelectList('#TBLDAFTAR_GOLONGAN_edit', 'Pilih Golongan', respon);
				$("#REFBADANUSAHA_IDBADANUSAHA_edit").html(respon);
				if(idbu!=null) {
					$("#REFBADANUSAHA_IDBADANUSAHA_edit").select2('val', idbu);
				}
			}
		})
	}

	// getAnu(id, iddb) {
	// 	ajax {

	// 		setselectlist(anu)
	// 		if(iddb!=null) {
	// 			$("#idselect2").select2('val', iddb);
	// 		}
	// 	}
	// }

	function getKelurahan(val) {
		$.ajax({
			url: 'pendaftaran/ubah_data/getKelurahan',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDPEMILIK').html(respon);
			}
		})
	}

	function getKelurahanedit(val) {
		$.ajax({
			url: 'pendaftaran/ubah_data/getKelurahanedit',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDPEMILIK_edit').html(respon);
			}
		})
	}

	/*function getKelurahanedit2(val) {
		$.ajax({
			url: 'pendaftaran/ubah_data/getKelurahanedit2',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDBADANUSAHA_edit').html(respon);
			}
		})
	}*/

	/*function getKelurahan2(val) {
		$.ajax({
			url: 'pendaftaran/ubah_data/getKelurahan2',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDBADANUSAHA_edit').html(respon);
			}
		})
	}*/

	function getKodepos2(val) {
		$.ajax({
			url: 'pendaftaran/wp_pribadi/getKodepos2',
			type: 'POST',
			dataType: 'json',
			data: {value: val},
			success: function(respon) {
				$('#TBLDAFTAR_BADANUSAHAKODEPOS_edit').val(respon.kodepos);
			}
		})
	}
	
	$("#TBLPROVINSI_KODE").change(function(event) {
        getkabupaten('TBLKABUPATEN_KODE', $("#TBLPROVINSI_KODE").select2('val'));
        setComboList('TBLKECAMATAN_KODE', 'Kecamatan', []);
        setComboList('TBLKELURAHAN_KODE', 'Kelurahan', []);
        $("#TBLKABUPATEN_KODE").select2('val', '');
        $("#TBLKECAMATAN_KODE").select2('val', '');
        $("#TBLKELURAHAN_KODE").select2('val', '');
    });

	$("#TBLPROVINSI_KODEBU_edit").change(function(event) {
        getkabupatenbu('TBLKABUPATEN_KODEBU_edit', $("#TBLPROVINSI_KODEBU_edit").select2('val'));
        setComboList('TBLKECAMATAN_KODEBU_edit', 'Kecamatan', []);
        setComboList('TBLKELURAHAN_KODEBU_edit', 'Kelurahan', []);
        $("#TBLKABUPATEN_KODEBU_edit").select2('val', '');
        $("#TBLKECAMATAN_KODEBU_edit").select2('val', '');
        $("#TBLKELURAHAN_KODEBU_edit").select2('val', '');
    });

    $("#TBLKABUPATEN_KODE").change(function(event) {
        getkecamatan('TBLKECAMATAN_KODE', $("#TBLKABUPATEN_KODE").select2('val'));
        setComboList('TBLKELURAHAN_KODE', 'Kelurahan', []);
        $("#TBLKECAMATAN_KODE").select2('val', '');
        $("#TBLKELURAHAN_KODE").select2('val', '');
    });

    $("#TBLKABUPATEN_KODEBU_edit").change(function(event) {
        getkecamatanbu('TBLKECAMATAN_KODEBU_edit', $("#TBLKABUPATEN_KODEBU_edit").select2('val'));
        setComboList('TBLKELURAHAN_KODEBU_edit', 'Kelurahan', []);
        $("#TBLKECAMATAN_KODEBU_edit").select2('val', '');
        $("#TBLKELURAHAN_KODEBU_edit").select2('val', '');
    });

    $("#TBLKECAMATAN_KODE").change(function(event) {
        getkelurahan('TBLKELURAHAN_KODE', $("#TBLKECAMATAN_KODE").select2('val'));
        $("#TBLKELURAHAN_KODE").select2('val', '');
    });

    $("#TBLKECAMATAN_KODEBU_edit").change(function(event) {
        getkelurahanbu('TBLKELURAHAN_KODEBU_edit', $("#TBLKECAMATAN_KODEBU_edit").select2('val'));
        $("#TBLKELURAHAN_KODEBU_edit").select2('val', '');
    });

    $("#TBLKELURAHAN_KODE").change(function(event) {
        setkodepos('TBLDAFTAR_PEMILIKKODEPOS_edit', $("#TBLKECAMATAN_KODE option:selected").attr('nama'), $("#TBLKELURAHAN_KODE option:selected").attr('nama') );
    });

    $("#TBLKELURAHAN_KODEBU_edit").change(function(event) {
        setkodepos('TBLDAFTAR_BADANUSAHAKODEPOS_edit', $("#TBLKECAMATAN_KODEBU_edit option:selected").attr('nama'), $("#TBLKELURAHAN_KODEBU_edit option:selected").attr('nama') );
    });

	function getkabupaten(elm, provkode, kabkode) {
        if (elm==null) {
            elm = 'TBLKABUPATEN_KODE';
        }
        setComboList(elm, 'Kabupaten', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kabkota_by_prov',
            type: 'POST',
            dataType: 'json',
            data: {id: provkode},
            success: function (respon) {
                setComboList(elm, 'Kabupaten', respon);
                if (kabkode != null){
                    $("#" + elm).select2('val', kabkode);
				} 
            }
        });
    }       

	function getkabupatenbu(elm, provkode, kabkode) {
        if (elm==null) {
            elm = 'TBLKABUPATEN_KODEBU_edit';
        }
        setComboList(elm, 'Kabupaten', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kabkota_by_provbu',
            type: 'POST',
            dataType: 'json',
            data: {id: provkode},
            success: function (respon) {
                setComboList(elm, 'Kabupaten', respon);
                if (kabkode != null){
                    $("#" + elm).select2('val', kabkode);
				} 
            }
        });
    }       

    function getkecamatan(elm, kabkode, keckode) {
        if (elm==null) {
            elm = 'TBLKECAMATAN_KODE';
        }
        setComboList(elm, 'Kecamatan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kec_by_kabkota',
            type: 'POST',
            dataType: 'json',
            data: {id: kabkode},
            success: function (respon) {
                setComboList(elm, 'Kecamatan', respon);
                if (keckode != null) 
                    $("#" + elm).select2('val', keckode);
            }
        });
    }

    function getkecamatanbu(elm, kabkode, keckode) {
        if (elm==null) {
            elm = 'TBLKECAMATAN_KODEBU_edit';
        }
        setComboList(elm, 'Kecamatan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kec_by_kabkotabu',
            type: 'POST',
            dataType: 'json',
            data: {id: kabkode},
            success: function (respon) {
                setComboList(elm, 'Kecamatan', respon);
                if (keckode != null) 
                    $("#" + elm).select2('val', keckode);
            }
        });
    }

    function getkelurahan(elm, keckode, kelkode) {
        if (elm==null) {
            elm = 'TBLKELURAHAN_KODE';
        }
        setComboList(elm, 'Kelurahan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kel_by_kec',
            type: 'POST',
            dataType: 'json',
            data: {id: keckode},
            success: function (respon) {
                setComboList(elm, 'Kelurahan', respon);
                if (kelkode != null) 
                    $("#" + elm).select2('val', kelkode);
            }
        });
    }

    function getkelurahanbu(elm, keckode, kelkode) {
        if (elm==null) {
            elm = 'TBLKELURAHAN_KODEBU_edit';
        }
        setComboList(elm, 'Kelurahan', []);
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kel_by_kecbu',
            type: 'POST',
            dataType: 'json',
            data: {id: keckode},
            success: function (respon) {
                setComboList(elm, 'Kelurahan', respon);
                if (kelkode != null) 
                    $("#" + elm).select2('val', kelkode);
            }
        });
    }

    function getkodebykd(kd) {
        $.ajax({
            url: 'pendaftaran/ubah_data/GetKodeKel',
            type: 'POST',
            dataType: 'json',
            data: {kd: kd},
            success: function (respon) {
				$('#TBLPROVINSI_KODE').select2('val',respon.TBLPROVINSI_KODE);
                getkabupaten('TBLKABUPATEN_KODE', respon.TBLPROVINSI_KODE, respon.TBLKABUPATEN_KODE);
				getkecamatan('TBLKECAMATAN_KODE', respon.TBLKABUPATEN_KODE, respon.TBLKECAMATAN_KODE)
				getkelurahan('TBLKELURAHAN_KODE', respon.TBLKECAMATAN_KODE, respon.TBLKELURAHAN_KODE);
				setkodepos('TBLDAFTAR_PEMILIKKODEPOS_edit', respon.TBLKECAMATAN_NAMA, respon.TBLKELURAHAN_NAMA);
            }
        });
    }

    function getkodebykdbu(kd) {
        $.ajax({ //
            url: 'pendaftaran/ubah_data/GetKodeKelbu',
            type: 'POST',
            dataType: 'json',
            data: {kd: kd},
            success: function (respon) {
				$('#TBLPROVINSI_KODEBU_edit').select2('val',respon.TBLPROVINSI_KODE);
                getkabupatenbu('TBLKABUPATEN_KODEBU_edit', respon.TBLPROVINSI_KODE, respon.TBLKABUPATEN_KODE);
				getkecamatanbu('TBLKECAMATAN_KODEBU_edit', respon.TBLKABUPATEN_KODE, respon.TBLKECAMATAN_KODE)
				getkelurahanbu('TBLKELURAHAN_KODEBU_edit', respon.TBLKECAMATAN_KODE, respon.TBLKELURAHAN_KODE);
				setkodepos('TBLDAFTAR_BADANUSAHAKODEPOS_edit', respon.TBLKECAMATAN_NAMA, respon.TBLKELURAHAN_NAMA);
            }
        });
    }

    function getkodebykd2(kd) {
        $.ajax({
            url: 'pendaftaran/ubah_data/GetKodeKel',
            type: 'POST',
            dataType: 'json',
            data: {kd: kd},
            success: function (respon) {
				setkodepos('TBLDAFTAR_BADANUSAHAKODEPOS_edit', respon.TBLKECAMATAN_NAMA, respon.TBLKELURAHAN_NAMA);
            }
        });
    }

    function setkodepos(elm, kec, kel) {
        $.ajax({
            url: '<?= Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kodepos_by_kec_kel',
            type: 'POST',
            dataType: 'json',
            data: {
                kec: kec
                , kel: kel
            },
            success:function (respon) {
                $('#' + elm).val(respon.POSTAL_CODE);
            }
        });
    }


	var pagefunction = function() {

		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				desktop : 2800,
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

		/* END BASIC */
	};

	// load related plugins
	loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});
	
	function simpan() {
		var addparam = {
			kodekec : $('#TBLKECAMATAN_KODE option:selected').attr('kodekec')
			,kodekel : $('#TBLKELURAHAN_KODE option:selected').attr('kodekel')
			,kodekecbu : $('#TBLKECAMATAN_KODEBU_edit option:selected').attr('kodekec')
			,kodekelbu : $('#TBLKELURAHAN_KODEBU_edit option:selected').attr('kodekel')
		};
		$.ajax({
			url: 'pendaftaran/ubah_data/Simpan',
			type: 'post',
			dataType: "json",
			data:  $("#form-ubah-data").serialize()+'&'+jQuery.param(addparam),
			success: function(data) {
				if (data.status=="success") {
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					$('#CETAK_KARTU').removeAttr('disabled');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});
	}


</script>




