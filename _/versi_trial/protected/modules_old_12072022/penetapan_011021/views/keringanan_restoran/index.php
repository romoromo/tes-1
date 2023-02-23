<?php define('ASSETS_URL',$data['theme_baseurl']); ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file fa-fw"></i> Keringanan Pajak Restoran</h4>
		</div>
	</div>
</div>

<section class="widget-grid">
	<div class="jarviswidget jarviswidget-color-teal" id="wid-id-akdjs" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>Pencarian Data</h2>
		</header>
		<div>
			<div class="jarviswidget-editbox">
			</div>
			<div class="widget-body">
				<div class="tab-content">
					<form class="smart-form" id="form-pendataan-airtanah">
						<fieldset>
							<div class="row">
								<section class="col col-md-2">
									<p>No. Pokok WP</p>
								</section>
								<section class="col col-md-4">
									<label class="input">
										<input type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK" placeholder="Ketik Nomor Pokok WP">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Masa Pajak</p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK">
									</label>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
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
										</select><i></i>
									</label>
								</section>
								
								<section class="col col-md-1">
									<label class="checkbox pull-right">
										<input type="checkbox" id="cbx_checkbox" name="cbx_checkbox">
										<i></i>
									</label>
								</section>
								
								<section class="col col-md-2">
									<label class="input">
										<input type="number" id="TBLPENDATAAN_TGLPAJAK" name="TBLPENDATAAN_TGLPAJAK">
									</label>
								</section>

								<section class="col col-md-2">
									<button class="btn btn-sm btn-default" type="button" onclick="cekPernahDaftar()">
										<i class="fa fa-forward"></i> Proses
									</button>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Rekening</p>
								</section>
								<section class="col col-md-4">
									<label class="select">
										<select class="select2" id="REKENING_KODE" name="REKENING_KODE" disabled="">
											<option value="">-- Pilih Rekening --</option>
										</select>
									</label>
								</section>
							</div>
						</fieldset>

						<fieldset>
							<h4><strong>Data Wajib Pajak</strong></h4><br>
							<div class="row">
								<section class="col col-md-2">
									<p>Nama</p>
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input style="background: #ddd!important;" class="form-control disabled" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]" disabled="disabled">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Alamat</p>
								</section>
								<section class="col col-md-5" >
									<label class="textarea" >
										<textarea style="background: #ddd!important;" class="form-control disabled" rows="4" id="TBLDAFTAR_BADANUSAHAALAMAT" name="param[TBLDAFTAR_BADANUSAHAALAMAT]" disabled="disabled"></textarea>
									</label>
								</section>
							</div>

						</fieldset>

						<fieldset>
							<h4><strong>Data Perhitungan</strong></h4><br>
							<div class="row">
								<section class="col col-md-2">
									<p>Penjualan / Hari</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input style="background: #ddd!important;" class="form-control disabled" type="text" id="PENJUALAN_HARI" name="param[PENJUALAN_HARI]" disabled="disabled">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Jumlah Hari</p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input style="background: #ddd!important;" class="form-control disabled" type="text" id="JUMLAH_HARI" name="param[JUMLAH_HARI]" disabled="disabled">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Penjualan / Bulan</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input style="background: #ddd!important;" class="form-control disabled" type="text" id="PENJUALAN_BULAN" name="param[PENJUALAN_BULAN]" disabled="disabled">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Keringanan</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input class="form-control" type="text" id="JMLKERINGANAN" name="param[JMLKERINGANAN]">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Tanggal Awal</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTTANAH_TGLMULAIJUAL" name="TBLDAFTTANAH_TGLMULAIJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Tanggal Akhir</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTTANAH_TGLAKHIRJUAL" name="TBLDAFTTANAH_TGLAKHIRJUAL" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Pajak</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input class="form-control disabled" type="text" id="PAJAK" name="param[PAJAK]" disabled="disabled">
									</label>
								</section>
								<section class="col col-md-2">
									<p>Bunga SPT</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input class="form-control disabled" type="text" id="BUNGASPT" name="param[BUNGASPT]" disabled="disabled">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p><strong>TOTAL SETOR</strong></p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input style="background: #ddd!important;" class="form-control disabled" type="text" id="TOTALSETOR" name="param[TOTALSETOR]" disabled="disabled">
									</label>
								</section>
							</div>

						</fieldset>

						<fieldset>
							<h4><strong>Dokumentasi Tanggal</strong></h4><br>
							<div class="row">
								<section class="col col-md-2">
									<p>Tgl. Terima SPT</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTTANAH_TGLTERIMA" name="TBLDAFTTANAH_TGLTERIMA" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Tgl. Batas SPT</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTTANAH_TGLBATASSPTPD" name="TBLDAFTTANAH_TGLBATASSPTPD" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									<p>Tgl. Entry SPT </p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<i class="icon-append fa fa-calendar"></i>
										<input type="text" id="TBLDAFTTANAH_TGLENTRI" name="TBLDAFTTANAH_TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-2">
									Cara Penghitungan 
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select id="hit_carapenghitungan" name="hit_carapenghitungan" class="select2">
											<option selected="" disabled="">Silahkan Pilih</option>
											<option value="S">S | Self Assesment</option>
											<option value="O" selected="">O | Official Assesment</option>
										</select> 
									</label>
								</section>
							</div>
						</fieldset>

						<footer id="footer-pajak-hiburan">
							<section class="col col-md-2">&nbsp;</section>
							<section class="col col-md-2">
								<button class="btn btn-sm btn-primary pull-left" type="submit">
									<i class="fa fa-save"></i>&nbsp;Simpan
								</button>
							</section>

						</footer>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	pageSetUp();
</script>