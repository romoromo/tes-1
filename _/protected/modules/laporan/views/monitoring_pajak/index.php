<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Monitoring Objek Pajak</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-monitoring-pajak" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
			>
			<header>
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Form Pencarian</h2>
			</header>
			<div>
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body no-padding">

					<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
						<fieldset>

							<div class="row">
								<section class="col col-md-1">
									<p>Jenis Pajak </p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" id="TREKENING_KODE" name="TREKENING_KODE">
											<option value="">-- Pilih Rekening --</option>
											<?php foreach ($data['rek'] as $list): ?>
												<option value="<?php echo $list['TBLREKENING_REKAYAT'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-1">
									Tahun
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" value="<?php echo date('Y'); ?>" type="number" id="tahun" name="tahun">
									</label>
								</section>
								<section class="col col-md-1">
									Bulan
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" id="bln" name="bln">
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
										</select>
										<!-- <i></i> -->
									</label>
								</section>
								<section class="col col-md-1">
									<p>Nomor Pokok</p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input class="input-sm" type="text" id="nopok" name="nopok">
									</label>
								</section>
							</div>

							<div class="row">
								<section class="col col-md-1">
									Tanggal Awal
								</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
	                                    <input type="text" id="tglawal" name="tglawal">
	                                </label>
								</section>

								<section class="col col-md-1">
									Tanggal Akhir
								</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" id="tglakhir" name="tglakhir">
                                </label>
								</section>

								<section class="col col-md-2">
									<a class="btn btn-sm btn-primary" onclick="cari()">
										Cari <i class="fa fa-search"></i>
									</a>
								</section>
							</div>

							<header></header>
							<br>

							<dir id="data-wajibpajak" style="display: none;">
								<div class="row">
									<section class="col col-md-1">
										Nama Usaha
									</section>
									<section class="col col-md-2">
										<span id="namausaha"></span>
	                                </label>
									</section>
									<section class="col col-md-1">
										Nama Pemilik
									</section>
									<section class="col col-md-2">
										<span id="namapemilik"></span>
	                                </label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-1">
										Alamat Usaha
									</section>
									<section class="col col-md-2">
										<span id="alamatusaha"></span>
	                                </label>
									</section>
									<section class="col col-md-1">
										Alamat Pemilik
									</section>
									<section class="col col-md-2">
										<span id="alamatpemilik"></span>
	                                </label>
									</section>
								</div>
							</dir>

						</fieldset>	
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

<section class="" id="form-detail-hotel" style="display: none;">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-form-restoran" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Form Detail Hotel</h2>
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
						<form id="form-data-restoran" class="smart-form">
							<fieldset>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Konsumen Harian</section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Ramai</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_ramai" name="jumlah_saat_ramai">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Normal</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_normal" name="jumlah_saat_normal">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Sepi</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_sepi" name="jumlah_saat_sepi">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Rata Rata</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_rata" name="jumlah_rata">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Omzet Harian</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" type="text" id="omzet_harian" name="omzet_harian">
										</label>
									</section>
								</div>

	

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pegawai</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_pegawai" name="jumlah_pegawai">
										</label>
									</section>
								</div>

							</fieldset>
							
							<footer id="footer_simpandata">
								<a id="btn-Simpan" onclick="simpandetailhotel()" href="javascript:void(0)" class="btn btn-sm btn-primary" style="float: left;">
									<i class="fa fa-save"></i> Simpan
								</a>
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

<section class="" id="form-detail-hiburan" style="display: none;">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-form-restoran" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Form Detail Hiburan</h2>
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
						<form id="form-data-restoran" class="smart-form">
							<fieldset>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jenis Hiburan</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jenis_hiburan" name="jenis_hiburan">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jam Operasional</section>
									<section class="col col-md-2" style="margin-left: 2%;">Buka</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control timepicker" type="text" id="jam_buka" name="jam_buka">
										</label>
									</section>
									<section class="col col-md-2">Tutup</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control timepicker" type="text" id="jam_tutup" name="jam_tutup">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Konsumen Harian</section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Ramai</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_ramai" name="jumlah_saat_ramai">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Normal</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_normal" name="jumlah_saat_normal">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Sepi</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_sepi" name="jumlah_saat_sepi">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Rata Rata</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_rata" name="jumlah_rata">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										Menggunakan Tiket
									</section>
									<div class="col col-6 inline-group">
										<label class="radio">
											<input type="radio" name="isTiket" id="isTiket" value="Y">
											<i></i> Ya
										</label>
										<label class="radio">
											<input type="radio" name="nonTiket" id="nonTiket" value="N">
											<i></i> Tidak
										</label>
									</div>
								</div>

								<div class="row">
									<section class="col col-md-2">
										Sistem Member
									</section>
									<div class="col col-6 inline-group">
										<label class="radio">
											<input type="radio" name="isMember" id="isMember" value="Y">
											<i></i> Ya
										</label>
										<label class="radio">
											<input type="radio" name="nonMember" id="nonMember" value="N">
											<i></i> Tidak
										</label>
									</div>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Member</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_member" name="jumlah_member">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Tarif Member</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" type="text" id="tarif_member" name="tarif_member">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Sistem Pembayaran</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="sistem_pembayaran" name="sistem_pembayaran">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Omzet Bulanan</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" type="text" id="omzet_bulanan" name="omzet_bulanan">
										</label>
									</section>
								</div>

	

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pegawai</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_pegawai" name="jumlah_pegawai">
										</label>
									</section>
								</div>

							</fieldset>
							
							<footer id="footer_simpandata">
								<a id="btn-Simpan" onclick="simpandetailhotel()" href="javascript:void(0)" class="btn btn-sm btn-primary" style="float: left;">
									<i class="fa fa-save"></i> Simpan
								</a>
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

<div class="row" id="form-hotel" style="display: none;">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-orange" id="wid-id-form-hotel" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
            	<h2>&nbsp;Form Data Kamar</h2>                    
            </header>
            <div>
            	<div class="jarviswidget-editbox">
            	</div>
            	<div class="widget-body no-padding">
            		<p class="alert alert-info"> 
                    <button class="btn btn-primary" onclick="tambahdatahotel()">
                    <i class="fa fa-plus"></i> Tambah Data
                    </button>
                    </p>
            		<div id="tabel_laporan" class="">
            		</div>
            	</div>
            </div>
        </div>
    </article>
</div>

<section class="" id="form-restoran" style="display: none;">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-form-restoran" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Form Data Restoran</h2>
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
						<form id="form-data-restoran" class="smart-form">
							<fieldset>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jam Monitoring</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control timepicker" type="text" id="jam_monitoring_awal" name="jam_monitorin_awal">
										</label>
									</section>
									<section class="col col-md-2">S/D</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control timepicker" type="text" id="jam_monitoring_akhir" name="jam_monitoring_akhir">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Meja</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_meja" name="jumlah_meja">
										</label>
									</section>
									<section class="col col-md-2">Jumlah Kursi</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_kursi" name="jumlah_kursi">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Tarif Rata-Rata</section>
									<section class="col col-md-2" style="margin-left: 2%;">Makanan</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" type="text" id="makanan" name="makanan">
										</label>
									</section>
									<section class="col col-md-2">Minuman</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" type="text" id="minuman" name="minuman">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jam Operasional</section>
									<section class="col col-md-2" style="margin-left: 2%;">Buka</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control timepicker" type="text" id="jam_buka" name="jam_buka">
										</label>
									</section>
									<section class="col col-md-2">Tutup</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control timepicker" type="text" id="jam_tutup" name="jam_tutup">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Konsumen Harian</section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Ramai</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_ramai" name="jumlah_saat_ramai">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Normal</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_normal" name="jumlah_saat_normal">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Saat Sepi</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_saat_sepi" name="jumlah_saat_sepi">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"></section>
									<section class="col col-md-2" style="margin-left: 2%;">Rata Rata</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_rata" name="jumlah_rata">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Omzet Harian</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" type="text" id="omzet_harian" name="omzet_harian">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Konsumen Saat Monitoring</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_konsumen_monitoring" name="jumlah_konsumen_monitoring">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Pegawai</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_pegawai" name="jumlah_pegawai">
										</label>
									</section>
								</div>

							</fieldset>
							
							<footer id="footer_simpandata">
								<a id="btn-Simpan" onclick="simpanresto()" href="javascript:void(0)" class="btn btn-sm btn-primary" style="float: left;">
									<i class="fa fa-save"></i> Simpan
								</a>
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

</section>

<div class="modal fade" id="modal-tambahdata-hotel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    <i class="fa  fa-fw fa-file"></i> Isian Data Hotel
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form class="smart-form" id="form-data-hotel">
                    <fieldset>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Klasifikasi</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="klasifikasi" id="klasifikasi"></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Tarif</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control  format-rupiah" type="text" name="tarif" id="tarif" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Jumlah Kamar</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="jumlah_kamar" id="jumlah_kamar" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Tersedia</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="tersedia" id="tersedia" ></input>
                                </label>
                            </section>
                        </div>

                        <div class="row">
                            <section class="col col-sm-3">
                                <p>Terjual</p>
                            </section>
                            <section class="col col-sm-9">
                                <label for="address" class="input">
                                    <input class="form-control" type="text" name="terjual" id="terjual" ></input>
                                </label>
                            </section>
                        </div>

                    </fieldset>
                </form>
                <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Batal
					</button>
					<button type="button" onclick='simpankamarhotel()' class="btn btn-primary" id="simpan" >
						Simpan
					</button>
				</div>                       
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugin/jquery-priceformat/jquery.price_format.2.0.min.js"></script>
<script type="text/javascript">
	pageSetUp();

	$('#tarif, #makanan, #minuman, #omzet_harian').change(function(event) {
		setPriceFormat();
	});

	$('#TREKENING_KODE').change(function(event) {
		$('#tglawal').val('');
		$('#tglakhir').val('');
		$('#nopok').val('');
		$('#bln').select2('val','');
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/bootstrap-timepicker.min.js", runTimePicker);
	function runTimePicker() {
		$('.timepicker').timepicker({
			showMeridian: false,
		});
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPhotel();
	});

	function generateAutocompleteWPhotel() {
		$('#nopok').autocomplete({
			serviceUrl: 'penyetoran/entrisetoranpajakhotel/autocomplete',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#nopok').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	 $("#tglawal").datepicker({
        defaultDate: "+1w",
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        //changeYear: true,
        numberOfMonths: 2,
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        onClose: function (selectedDate) {
            $("#tglakhir").datepicker("option", "minDate", selectedDate);
        }

    });
    $("#tglakhir").datepicker({
        defaultDate: "+1w",
        dateFormat : "dd-mm-yy",
        changeMonth: true,
        //changeYear: true,
        numberOfMonths: 2,
        prevText: '<i class="fa fa-chevron-left"></i>',
        nextText: '<i class="fa fa-chevron-right"></i>',
        onClose: function (selectedDate) {
            $("#tglawal").datepicker("option", "maxDate", selectedDate);
        }
    });

	function cari() {

		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglawal = $('#tglawal').val();
		var tglakhir = $('#tglakhir').val();

		if (rekkode!='' && tahun!='' && bln!='' && nopok!='' && tglawal!='' && tglakhir!='') {

			$.ajax({
	            url: 'laporan/monitoring_pajak/Getdata',
	            type: 'POST',
	            dataType: 'json',
	            data: {
	            	rekkode:rekkode,
					tahun:tahun,
					bln:bln,
					nopok:nopok,
					tglawal:tglawal,
					tglakhir:tglakhir,
	            },
	            success: function (respon) {

	            	var	datawp = respon.wp;
					$('#data-wajibpajak').show();

					$('#namausaha').html(datawp.TBLDAFTAR_BADANUSAHANAMA);
					$('#namapemilik').html(datawp.TBLDAFTAR_BADANUSAHAALAMAT);
					$('#alamatusaha').html(datawp.TBLDAFTAR_PEMILIKNAMA);
					$('#alamatpemilik').html(datawp.TBLDAFTAR_PEMILIKALAMAT);

					if (rekkode==1) {
						$('#form-hotel').show();
						$('#form-detail-hotel').show();
						$('#form-detail-hiburan').hide();
						$('#form-restoran').hide();
						GetDetailHotel(tahun,bln,nopok);
						LoadTableHotel(rekkode,tahun,bln,nopok,tglawal,tglakhir);
						reloadDT('dt_basic');
					} else if (rekkode==2) {
						GetDataResto(tahun,bln,nopok);
						$('#form-restoran').show();
						$('#form-hotel').hide();
						$('#form-detail-hotel').hide();
						$('#form-detail-hiburan').hide();
					}

	            }
	        }); 
	    } else {
	    	notifikasi('Informasi','Mohon isikan data dengan lengkap','failed',1,0);
	    }
	}

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function LoadTableHotel(rekkode,tahun,bln,nopok,tglawal,tglakhir) {
		$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
		$.ajax({
            url: 'laporan/monitoring_pajak/GetTabelHotel',
            type: 'POST',
            dataType: 'html',
            data: {
            	rekkode:rekkode,
				tahun:tahun,
				bln:bln,
				nopok:nopok,
				tglawal:tglawal,
				tglakhir:tglakhir,
            },
            success: function (respon) {
				$("#tabel_laporan").html(respon);
				$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(1000);
            }
        });
	}

	function GetDetailHotel(tahun,bln,nopok) {
		window.cmd = 'edit';
		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();

		$.ajax({
            url: 'laporan/monitoring_pajak/GetdetailHotel',
            type: 'POST',
            dataType: 'json',
            data: {
				tahun:tahun
            	,bln:bln
            	,nopok:nopok
            },
            success: function (respon) {
            	$('#jam_monitoring_awal').val(respon.JAM_MONITORING_AWAL);
            	$('#jam_monitoring_akhir').val(respon.JAM_MONITORING_AKHIR);
				$('#jumlah_meja').val(respon.JML_MEJA);
				$('#jumlah_kursi').val(respon.JML_KURSI);
				$('#makanan').val(respon.TARIF_MAKANAN);
				$('#minuman').val(respon.TARIF_MINUMAN);
				$('#jam_buka').val(respon.JAM_BUKA);
				$('#jam_tutup').val(respon.JAM_TUTUP);
				$('#jumlah_saat_ramai').val(respon.JML_KONSUMEN_RAMAI);
				$('#jumlah_saat_normal').val(respon.JML_KONSUMEN_NORMAL);
				$('#jumlah_saat_sepi').val(respon.JML_KONSUMEN_SEPI);
				$('#jumlah_rata').val(respon.JML_KONSUMEN_RATA);
				$('#omzet_harian').val(respon.JML_OMZET);
				$('#jumlah_konsumen_monitoring').val(respon.JML_KONSUMEN_REALTIME);
				$('#jumlah_pegawai').val(respon.JML_PEGAWAI);
				setPriceFormat();
            }
        });
	}

	function tambahdatahotel() {
		$('#modal-tambahdata-hotel').modal('show');
		$('#klasifikasi').val('');
		$('#tarif').val('');
		$('#jumlah_kamar').val('');
		$('#tersedia').val('');
		$('#terjual').val('');
		window.cmd = 'tambah';
		window.id  = '';
	}

	function editdatahotel(id) {
		window.cmd = 'edit';
		$.ajax({
            url: 'laporan/monitoring_pajak/GetdataHotel',
            type: 'POST',
            dataType: 'json',
            data: {
            	id:id
            },
            success: function (respon) {
            	$('#modal-tambahdata-hotel').modal('show');
				$('#klasifikasi').val(respon.KLASIFIKASI_KMR);
				$('#tarif').val(respon.TARIF_KMR);
				$('#jumlah_kamar').val(respon.JUMLAH_KMR);
				$('#tersedia').val(respon.JUMLAH_TERSEDIA);
				$('#terjual').val(respon.JUMLAH_TERJUAL);
				window.id = respon.TBLMONITORING_HOTEL_ID;
				setPriceFormat();
            }
        });
	}

	function hapusdatahotel(id) {
		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglawal = $('#tglawal').val();
		var tglakhir = $('#tglakhir').val();

		$.SmartMessageBox({
			title : "Informasi Penghapusan Data", // judul Smart Alert
			content : "Apakah data ini akan dihapus?", // konten dari smart alert
			buttons : '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'laporan/monitoring_pajak/HapusDetailHotel',
					type: 'POST',
					dataType: 'json',
					data: {
						id : id
					},
					success: function (respon) {
		            	if (respon.pesan=='success') {
		            		notifikasi('Informasi','Data berhasil dihapus','success',1,0);
		            		LoadTableHotel(rekkode,tahun,bln,nopok,tglawal,tglakhir);
		            	} else {
		            		notifikasi('Informasi','Data gagal dihapus','failed',1,0);
		            	}
		            }
				})
			}
		});
	}

	

	function simpankamarhotel() {
		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglawal = $('#tglawal').val();
		var tglakhir = $('#tglakhir').val();

		$.ajax({
            url: 'laporan/monitoring_pajak/SimpanKamarHotel',
            type: 'POST',
            dataType: 'json',
            data: $("#form-data-hotel").serialize()+'&rekkode='+rekkode+'&tahun='+tahun+'&bln='+bln+'&nopok='+nopok+'&tglawal='+tglawal+'&tglakhir='+tglakhir+'&cmd='+window.cmd+'&id='+window.id,
            success: function (respon) {
            	if (respon.pesan=='success') {
            		notifikasi('Informasi','Data berhasil disimpan','success',1,0);
            		$('#modal-tambahdata-hotel').modal('hide');
            		LoadTableHotel(rekkode,tahun,bln,nopok,tglawal,tglakhir);
            	} else {
            		notifikasi('Informasi','Data gagal disimpan','failed',1,0);
            	}
            }
        });
	}

	function GetDataResto(tahun,bln,nopok) {
		window.cmd = 'edit';
		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();

		$.ajax({
            url: 'laporan/monitoring_pajak/GetdataResto',
            type: 'POST',
            dataType: 'json',
            data: {
				tahun:tahun
            	,bln:bln
            	,nopok:nopok
            },
            success: function (respon) {
            	$('#jam_monitoring_awal').val(respon.JAM_MONITORING_AWAL);
            	$('#jam_monitoring_akhir').val(respon.JAM_MONITORING_AKHIR);
				$('#jumlah_meja').val(respon.JML_MEJA);
				$('#jumlah_kursi').val(respon.JML_KURSI);
				$('#makanan').val(respon.TARIF_MAKANAN);
				$('#minuman').val(respon.TARIF_MINUMAN);
				$('#jam_buka').val(respon.JAM_BUKA);
				$('#jam_tutup').val(respon.JAM_TUTUP);
				$('#jumlah_saat_ramai').val(respon.JML_KONSUMEN_RAMAI);
				$('#jumlah_saat_normal').val(respon.JML_KONSUMEN_NORMAL);
				$('#jumlah_saat_sepi').val(respon.JML_KONSUMEN_SEPI);
				$('#jumlah_rata').val(respon.JML_KONSUMEN_RATA);
				$('#omzet_harian').val(respon.JML_OMZET);
				$('#jumlah_konsumen_monitoring').val(respon.JML_KONSUMEN_REALTIME);
				$('#jumlah_pegawai').val(respon.JML_PEGAWAI);
				setPriceFormat();
            }
        });
	}

	function simpanresto() {

		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglawal = $('#tglawal').val();
		var tglakhir = $('#tglakhir').val();

		$.ajax({
            url: 'laporan/monitoring_pajak/SimpanDetailResto',
            type: 'POST',
            dataType: 'json',
            data: $("#form-data-restoran").serialize()+'&rekkode='+rekkode+'&tahun='+tahun+'&bln='+bln+'&nopok='+nopok+'&tglawal='+tglawal+'&tglakhir='+tglakhir,
            success: function (respon) {
            	if (respon.pesan=='success') {
            		notifikasi('Informasi','Data berhasil disimpan','success',1,0);
            	} else {
            		notifikasi('Informasi','Data gagal disimpan','failed',1,0);
            	}
            }
        });
	}

	function simpandetailhotel() {

		var rekkode = $('#TREKENING_KODE').select2('val');
		var tahun = $('#tahun').val();
		var bln = $('#bln').select2('val');
		var nopok = $('#nopok').val();
		var tglawal = $('#tglawal').val();
		var tglakhir = $('#tglakhir').val();

		$.ajax({
            url: 'laporan/monitoring_pajak/SimpanDetailHotel',
            type: 'POST',
            dataType: 'json',
            data: $("#form-data-restoran").serialize()+'&rekkode='+rekkode+'&tahun='+tahun+'&bln='+bln+'&nopok='+nopok+'&tglawal='+tglawal+'&tglakhir='+tglakhir,
            success: function (respon) {
            	if (respon.pesan=='success') {
            		notifikasi('Informasi','Data berhasil disimpan','success',1,0);
            	} else {
            		notifikasi('Informasi','Data gagal disimpan','failed',1,0);
            	}
            }
        });
	}

</script>
