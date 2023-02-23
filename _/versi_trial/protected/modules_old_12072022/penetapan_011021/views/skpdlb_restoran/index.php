<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
		<h4><i class="fa fa-file-text-o"></i> SKPDLB - Pajak Restoran </h4>
		</div>
	</div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="" >

	<!-- row -->
	<div class="row">


		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-332etsdgtdfg" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data</h2>
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
						<form id="form_sumber_pajak" class="smart-form" novalidate="">
							<div class="alert alert-block alert-success ng-scope">
								<fieldset style="background: #cde0c4;">
									<header style="margin: -2% 0% 0% 0%;background: #cde0c4;">Validasi Penyetoran</header><br>
									<div class="row">
										<section class="col col-md-1">Tahun</section>
										<section class="col col-md-2">
											<label class="input">
												<input type="text" name="masapajak_tahun" id="masapajak_tahun">
											</label>
										</section>
										<section class="col col-md-1">Bulan Pajak</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" name="masapajak_bulan" id="masapajak_bulan">
													<option value="0">== Silahkan Pilih ==</option>
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
												</select>
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-1">Nomor Pokok</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak" autocomplete="on">
											</label>
										</section>
										<section class="col col-md-1">Tanggal</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="tgl" class="datepicker" data-dateformat="dd/mm/yy" id="tgl">
											</label>
										</section>
										<section class="col col-md-1">
											<a onclick="cari()" class="btn btn-sm btn-primary">Enter</a>
										</section>
									</div>
								</fieldset>
							</div>
							<fieldset>
								<div class="row">
								<section class="col col-md-12"><h4 align="center"><b>Entry SKPDLB Pajak Restoran</b></h4></section>
								</div>
								<header style="margin: -6px;">Perorangan</header><br>
								<div class="row">
									<section class="col col-md-2">Nama</section>
									<section class="col col-md-5" style="margin-left: 2%;">
										<label class="input">
											<input style="background: #e4e4e4;" class="form-control" type="text" id="res_nama" name="res_nama" disabled="disabled">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Alamat</section>
									<section class="col col-md-5" style="margin-left: 2%;">
										<label class="textarea">
											<textarea style="background: #e4e4e4;" class="form-control" rows="4" id="res_alamat_wp" name="res_alamat_wp" disabled="disabled"></textarea>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Rekening</section>
									<section class="col col-md-5" style="margin-left: 2%;">
										<label class="input">
											<input style="background: #e4e4e4;" class="form-control" type="text" id="nama_subrekening" name="nama_subrekening" disabled="disabled">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"><b>Ketetapan Pajak SKPD</b></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pajak</section>
									<section class="col col-md-5">
										<label class="input">
											<input  style="background: #e4e4e4;" class="input-sm format-rupiah" type="text" id="res_jumlah_pajak_tetap_wp" name="res_jumlah_pajak_tetap_wp" disabled="disabled">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"><b>Setoran Pajak SSPD</b></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"> Pajak Terhutang</section>
									<section class="col col-md-5">
										<label class="input">
											<input type="text" name="name">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Masa Pajak Awal</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="hit_tanggalawal" name="hit_tanggalawal">
												<option value="0">== Silahkan Pilih ==</option>
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
											</select> 
										</label>
									</section>
									<section class="col col-md-1">Masa Pajak Akhir</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="hit_tanggalakhir" name="hit_tanggalakhir">
												<option value="0">== Silahkan Pilih ==</option>
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
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"><b>Pemeriksaan Pajak</b></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Nomor Pemeriksaan</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="nmr_pemeriksaan" name="nmr_pemeriksaan">
										</label>
									</section>
									<section class="col col-md-1">Tgl Periksa</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_pemeriksaan" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_pemeriksaan">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pajak</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control" type="text" id="nmr_pemeriksaan" name="nmr_pemeriksaan">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"><b>Kurang Bayar (SKPDLB)</b></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Nomor SKPDLB</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="nmr_skpdkb" name="nmr_skpdkb">
										</label>
									</section>
									<section class="col col-md-1">Tgl SKPDLB</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_skpdkb" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_skpdkb">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Kekurangan</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_kekurangan" name="jumlah_kekurangan">
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<div>
									<button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-save"></i>&nbsp;Simpan
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

</section>
<!-- end widget grid -->


<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>