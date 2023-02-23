<?php define('ASSETS_URL', Yii::app()->theme->baseUrl); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Entry Pendataan Pajak Reklame Tetap 2016</h4>
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

			<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="wid-87sd5dr87asf" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
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

						<form id="form-pendataan-reklame2016_tetap" class="smart-form">
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>No. Pokok WP</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input type="text" id="TBLDAFTAR_NOPOK" name="param[TBLDAFTAR_NOPOK]" placeholder="Ketik Nomor Pokok WP">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pendaftaran Izin Reklame</p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input type="text" id="TBLDAFTREKLAME_NODAFTARIZIN" 
											name="param[TBLDAFTREKLAME_NODAFTARIZIN]" placeholder="Ketik Nomor Pendaftaran dari Perizinan">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Masa Pajak</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="text" id="TBLPENDATAAN_THNPAJAK" name="param[TBLPENDATAAN_THNPAJAK]" value="<?= date('Y') ?>" placeholder="Tahun" maxlength="4">
										</label>
									</section>
									
									<div style="display: none;">
										<section class="col col-md-2">
											<label class="select">
												<select class="" id="TBLPENDATAAN_BLNPAJAK" name="param[TBLPENDATAAN_BLNPAJAK]">
													<option selected="" value="0">-- Bulan --</option>
													<?php for ($i=1; $i<=12; $i++): ?>
														<option <?php echo $i==(int)date('m') ? 'selected' : '' ?> value="<?= $i ?>"><?= LokalIndonesia::getBulan($i) ?></option>
													<?php endfor ?>
												</select><i class="fa fa-square"></i>
											</label>
										</section>

										<section class="col col-md-2">
											<label class="input">
												<input value="0" type="number" id="TBLPENDATAAN_TGLPAJAK" name="param[TBLPENDATAAN_TGLPAJAK]" placeholder="Tanggal" maxlength="2">
											</label>
										</section>
									</div>

									<section class="col col-md-2">
										<button class="btn btn-sm btn-default" type="button" onclick="cekBlokSistemIzin();">
											<i class="fa fa-forward"></i> Proses
										</button>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Lokasi</p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input value="" type="number" id="TBLPENDATAAN_PAJAKKE" name="param[TBLPENDATAAN_PAJAKKE]" placeholder="Lokasi" maxlength="10">
										</label>
									</section>
								</div>

								<!-- FORM WP -->
								<header>Data Wajib Pajak</header><span>&nbsp;</span>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama</p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control disabled" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="param[TBLDAFTAR_BADANUSAHANAMA]" disabled="disabled">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Alamat</section>
									<section class="col col-md-5">
										<label class="textarea">
											<textarea class="form-control disabled" rows="4" id="TBLDAFTAR_BADANUSAHAALAMAT" name="param[TBLDAFTAR_BADANUSAHAALAMAT]" disabled="disabled"></textarea>
										</label>
									</section>
								</div>
								<div class="row hidden">
									<section class="col col-md-2">
										<p>No SPT </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" type="text" id="wp_input_no_spt" name="wp_input_no_spt">
										</label>
									</section>
								</div>
								<div class="row hidden">
									<section class="col col-md-2">
										<p>Tanggal SPT </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input value="<?= date('d-m-Y') ?>" type="text" name="wp_input_tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="wp_input_tgl_spt">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Rekening</p>
									</section>
									<section class="col col-md-5">
										<label class="select">
											<select class="select2" id="TREKENINGSUB_KODE" name="TREKENINGSUB_KODE">
												<option value="">-- Pilih Rekening --</option>
												<?php foreach ($data['rek'] as $list): ?>
													<option value="<?php echo $list['TREKENING_KODE'] ?>" tarif="<?php echo $list['TARIF'] ?>" tarif1="<?php echo $list['TARIF1'] ?>" satuan="<?php echo $list['SATUAN'] ?>">[<?php echo $list['TREKENING_KODE'] ?>] <?php echo $list['TREKENING_NAMA'] ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>

								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Reklame menurut Simperizinan</p>
									</section>
									<section class="col col-md-5">
										<p id="jenis_reklame"></p>
									</section>
									
								</div>
								<!-- //FORM WP -->
							</fieldset>

							<fieldset id="form-data-perhitungan" style="display: none;">

								<!-- TABS -->
								<div class="widget-body">
									<ul id="myTabReklame" class="nav nav-tabs bordered">
										<li class="active">
											<a href="#tabrek1" onclick="$('#footer_reklame').show();" data-toggle="tab">Pendataan Reklame</a>
										</li>
										<li>
											<a id="link_tabrek2" href="#tabrek2" onclick="$('#div_tabrek2').show();$('#footer_reklame').hide();setTabPerhitungan();" data-toggle="tab"> Perhitungan Pajak</a>
										</li>
									</ul>
									<div id="myTabReklameContent" class="tab-content padding-10">
										<div class="tab-pane fade in active" id="tabrek1">
											<!-- TAB 1 -->
											<div class="row">
												<section class="col col-md-2">
													<p>Penempatan</p>
												</section>
												<section class="col col-md-4">
													<label class="input">
														<input placeholder="Penempatan" class="input-sm" type="text" id="TBLDAFTREKLAME_PENEMPATAN" name="param[TBLDAFTREKLAME_PENEMPATAN]">
													</label>
												</section>
												<section class="col col-md-2">
													<p>TGL Izin</p>
												</section>
												<section class="col col-md-2">
													<label class="input">
														<input value="<?= date('d-m-Y') ?>" class="input-sm datepicker" data-dateformat="dd-mm-yy" type="text" id="TBLDAFTREKLAME_TGLIZIN" name="param[TBLDAFTREKLAME_TGLIZIN]">
													</label>
												</section>
											</div>
											
											<div class="row">
												<section class="col col-md-2">
													<p>Permohonan</p>
												</section>
												<section class="col col-md-4">
													<label class="select">
														<select class="input-sm" id="TBLDAFTREKLAME_PERMOHONAN" name="param[TBLDAFTREKLAME_PERMOHONAN]">
															<option selected="" disabled="" value=""></option>
															<option value="Baru">Baru</option>
															<option value="Perpanjangan">Perpanjangan</option>
														</select><i></i>
													</label>
												</section>

												<section class="col col-md-2">
													<p>Nomor Pendaftaran Izin Reklame</p>
												</section>
												<section class="col col-md-4">
													<label style="font-weight: bold;" class="TBLDAFTREKLAME_NODAFTARIZIN"></label>
												</section>

											</div>
											
											<div class="row">
												<section class="col col-md-2">
													<p>No. SPT</p>
												</section>
												<section class="col col-md-4">
													<label class="input">
														<input class="input-sm" type="number" id="TBLDAFTREKLAME_NOSPTD" name="param[TBLDAFTREKLAME_NOSPTD]">
													</label>
												</section>
												<section class="col col-md-2">
													<p>TGL SPT</p>
												</section>
												<section class="col col-md-2">
													<label class="input">
														<input value="<?= date('d-m-Y') ?>" class="input-sm datepicker" data-dateformat="dd-mm-yy" type="text" id="TBLDAFTREKLAME_TGLSPTPD" name="param[TBLDAFTREKLAME_TGLSPTPD]">
													</label>
												</section>
											</div>
											
											<div class="row">
												<section class="col col-md-2">
													<p>Keterangan</p>
												</section>
												<section class="col col-md-8">
													<label class="input">
														<input class="input-sm" type="text" id="TBLDAFTREKLAME_KETERANGAN1" name="param[TBLDAFTREKLAME_KETERANGAN1]">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-md-2">
													<p>&nbsp;</p>
												</section>
												<section class="col col-md-8">
													<label class="input">
														<input class="input-sm" type="text" id="TBLDAFTREKLAME_KETERANGAN2" name="param[TBLDAFTREKLAME_KETERANGAN2]">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Jumlah Reklame</p>
												</section>
												<section class="col col-md-3">
													<label class="input">
														<input value="" class="input-sm" type="number" id="TBLDAFTREKLAME_JMLHREKLAME" name="param[TBLDAFTREKLAME_JMLHREKLAME]">
													</label>
												</section>
												<section class="col col-md-2">
													<p>Jenis Reklame</p>
												</section>
												<section class="col col-md-3">
													<label class="select">
														<select disabled="" id="TBLDAFTREKLAME_JNSREKLAME" name="param[TBLDAFTREKLAME_JNSREKLAME]">
														<option value="T" selected="">T</option>
														<option value="I">I</option>
														</select><i></i>
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Kel. Jalan</p>
												</section>
												<section class="col col-md-3">
													<label class="select">
														<select id="TBLDAFTREKLAME_SKORKAWASAN" name="param[TBLDAFTREKLAME_SKORKAWASAN]">
														<option selected="" disabled="" value=""></option>
														<?php foreach ($data['list_kelasjalanskorkawasan'] as $list): ?>
														<option value="<?= $list['RREKKAWASAN_SKOR'] ?>" skor="<?= $list['RREKKAWASAN_SKOR'] ?>"><?= $list['RREKKAWASAN_NAMA'] ?> [<?= $list['RREKKAWASAN_SKOR'] ?>]</option>
														<?php endforeach ?>
														</select><i></i>
													</label>
												</section>
												<section class="col col-md-2">
													<p>Jenis Tarif Reklame</p>
												</section>
												<section class="col col-md-3">
													<label class="select">
														<select id="RREKJNSREKTARIF_ID" name="param[RREKJNSREKTARIF_ID]">
														<option selected="" disabled="" value=""></option>
														<?php foreach ($data['list_jnsrektrf'] as $list): ?>
														<option value="<?= $list['RREKJNSREKTARIF_ID'] ?>" kolom="<?= $list['RREKJNSREKTARIF_FIELDTARIF'] ?>"><?= $list['RREKJNSREKTARIF_NAMA'] ?></option>
														<?php endforeach ?>
														</select><i></i>
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>&nbsp;</p>
												</section>
												<section class="col col-md-3">
													&nbsp;
												</section>
												<section class="col col-md-2">
													<p>Jenis Posisi Reklame</p>
												</section>
												<section class="col col-md-3">
													<label class="select">
														<select id="RREKJNSPOSISI_ID" name="param[RREKJNSPOSISI_ID]">
														<option selected="" disabled="" value=""></option>
														<?php foreach ($data['list_jnsposisi'] as $list): ?>
														<option value="<?= $list['RREKJNSPOSISI_ID'] ?>"><?= $list['RREKJNSPOSISI_NAMA'] ?></option>
														<?php endforeach ?>
														</select><i></i>
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>SD Pandang</p>
												</section>
												<section class="col col-md-3">
													<label class="select">
														<select id="REFSUDUTPANDANG_SKOR" name="param[REFSUDUTPANDANG_SKOR]">
														<option selected="" disabled="" value=""></option>
														<?php foreach ($data['list_sdpandang'] as $list): ?>
														<option value="<?= $list['RREKSUDUTPANDANG_SKOR'] ?>" skor="<?= $list['RREKSUDUTPANDANG_SKOR'] ?>"><?= $list['RREKSUDUTPANDANG_NAMA'] ?> [<?= $list['RREKSUDUTPANDANG_SKOR'] ?>]</option>
														<?php endforeach ?>
														</select><i></i>
													</label>
												</section>
												<section class="col col-md-2">
													<p>Kd Jalan</p>
												</section>
												<section class="col col-md-3">
													<label class="select">
														<select class="select2" id="REFJALAN_ID" name="param[REFJALAN_ID]">
														<option value=""></option>
														<?php foreach ($data['list_jalan'] as $list): ?>
														<option value="<?= $list['RREKJALAN_KODE'] ?>" namajalan="<?= $list['RREKJALAN_NAMAJALAN'] ?>">[<?= $list['RREKJALAN_KODE'] ?>] <?= $list['RREKJALAN_NAMAJALAN'] ?></option>
														<?php endforeach ?>
														</select>
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Tinggi Rek.</p>
												</section>
												<section class="col col-md-3">
													<label class="input">
														<input class="input-sm" type="number" id="TBLDAFTREKLAME_TINGGIREKLAME" name="param[TBLDAFTREKLAME_TINGGIREKLAME]">
													</label>
												</section>
												<section class="col col-md-2">
													<p>Ketinggian</p>
												</section>
												<section class="col col-md-3">
													<label class="select">
														<select id="REFKETINGGIAN_SKOR" name="param[REFKETINGGIAN_SKOR]">
														<option selected="" disabled="" value=""></option>
														<?php foreach ($data['list_ketinggian'] as $list): ?>
														<option skor="<?= $list['RREKKETINGGIAN_SKOR'] ?>" value="<?= $list['RREKKETINGGIAN_SKOR'] ?>"><?= $list['RREKKETINGGIAN_NAMA'] ?> [<?= $list['RREKKETINGGIAN_SKOR'] ?>]</option>
														<?php endforeach ?>
														</select><i></i>
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Panjang</p>
												</section>
												<section class="col col-md-3">
													<label class="input">
														<input class="input-sm" type="number" id="TBLDAFTREKLAME_PANJANG" name="param[TBLDAFTREKLAME_PANJANG]">
													</label>
												</section>
												<section class="col col-md-2">
													<p>Lebar</p>
												</section>
												<section class="col col-md-3">
													<label class="input">
														<input class="input-sm" type="number" id="TBLDAFTREKLAME_LEBAR" name="param[TBLDAFTREKLAME_LEBAR]">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Isi Reklame</p>
												</section>
												<section class="col col-md-8">
													<label class="input">
														<input class="input-sm" type="text" id="TBLDAFTREKLAME_ISIREKLAME" name="param[TBLDAFTREKLAME_ISIREKLAME]">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Keringanan</p>
												</section>
												<section class="col col-md-1">
													<div class="input-group">
														<label class="input">
															<input class="input-sm" type="text" id="TBLDAFTREKLAME_PCRINGAN" name="param[TBLDAFTREKLAME_PCRINGAN]">
														</label>
														<span class="input-group-addon">%</span>
													</div>
												</section>
												<section class="col col-md-2"></section>
												<section class="col col-md-2">
													<p>Perpanjangan ke</p>
												</section>
												<section class="col col-md-1">
													<label class="input">
														<input class="input-sm" type="text" id="TBLDAFTREKLAME_NOSPT" name="param[TBLDAFTREKLAME_NOSPT]">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Nilai Kontrak</p>
												</section>
												<section class="col col-md-8">
													<label class="input">
														<input class="input-sm format-rupiah" type="text" id="TBLDAFTREKLAME_NILAIKONTRAK" name="param[TBLDAFTREKLAME_NILAIKONTRAK]">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p>Tanggal Awal</p>
												</section>
												<section class="col col-md-3">
													<label class="input">
														<input class="input-sm datepicker" data-dateformat="dd-mm-yy" type="text" id="TBLDAFTREKLAME_TGLMULAIREKLAME" name="param[TBLDAFTREKLAME_TGLMULAIREKLAME]">
													</label>
												</section>
												<section class="col col-md-2">
													<p>Tanggal Akhir</p>
												</section>
												<section class="col col-md-3">
													<label class="input">
														<input class="input-sm datepicker" data-dateformat="dd-mm-yy" type="text" id="TBLDAFTREKLAME_TGLAKHIRREKLAME" name="param[TBLDAFTREKLAME_TGLAKHIRREKLAME]">
													</label>
												</section>
											</div>

											<div class="row hidden">
												<section class="col col-md-2">
													<p>Lama Pemasangan</p>
												</section>
												<section class="col col-md-1">
													<label class="input">
														<input readonly="" class="input-sm disabled" type="text" id="TBLDAFTREKLAME_JUMLAHHARI" name="param[TBLDAFTREKLAME_JUMLAHHARI]">
													</label>
												</section>
												<section class="col col-md-2">
													<p></p>
												</section>
												<section class="col col-md-3">
													<label class="input">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2">
													<p></p>
												</section>
												<section class="col col-md-3">
												</section>
												<section class="col col-md-2">
													<button type="button" id="btnHitung" class="btn btn-lg btn-default">HITUNG <i class="fa fa-bolt"></i></button>
												</section>
												<section class="col col-md-3">
													
												</section>
											</div>
											<!-- //TAB 1 -->
										</div>

										<div class="tab-pane fade in" id="tabrek2">
											<div class="row">
												<label class="label label-primary txt-color-white font-lg label-rumus">A. Perhitungan Nilai Strategis (NS) = Perkalian antara bobot dan skor dari semua faktor nilai strategis (NS) dengan HDPP</label>
											</div>

											<div class="row">
												<section class="col col-md-2 font-md">
													<p>Nilai Strategis (NS)</p>
												</section>
												<section class="col col-md-5 font-md">
													= ( <span class="TBLDAFTREKLAME_SKORKAWASAN"></span> x <span class="RREKBOBOT_KJALAN"></span>
													<input type="hidden" name="param[RREKBOBOT_KJALAN]" id="RREKBOBOT_KJALAN"> % ) + ( <span class="REFSUDUTPANDANG_SKOR"></span> x <span class="RREKBOBOT_SUDUTPANDANG"></span>
													<input type="hidden" name="param[RREKBOBOT_SUDUTPANDANG]" id="RREKBOBOT_SUDUTPANDANG"> % ) 
													+ ( <span class="REFKETINGGIAN_SKOR"></span> x <span class="RREKBOBOT_KETINGGIAN"></span>
													<input type="hidden" name="param[RREKBOBOT_KETINGGIAN]" id="RREKBOBOT_KETINGGIAN"> % ) x HDPP
												</section>
											</div>
											
											<div class="row">
												<section class="col col-md-2 font-md">
													<p>&nbsp;</p>
												</section>
												<section class="col col-md-4 font-md">
													<label class="col col-sm-1">=</label>
													<label class="col col-md-3 text-align-right bobot1"></label>
													<label class="col col-md-3 text-align-right bobot2"></label>
													<label class="col col-md-3 text-align-right bobot3"></label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-2 font-md">
													<p>&nbsp;</p>
												</section>
												<section class="col col-md-4 font-md">
													<label class="col col-sm-1">=</label>
													<label class="col col-md-5 text-align-right TBLDAFTREKLAME_RPTARIF"></label>
													<input type="hidden" name="param[TBLDAFTREKLAME_RPTARIF]" id="TBLDAFTREKLAME_RPTARIF"> 
													<label class="col col-md-5 TBLDAFTREKLAME_NILAISTRATEGIS"></label>
													<input type="hidden" name="param[TBLDAFTREKLAME_NILAISTRATEGIS]" id="TBLDAFTREKLAME_NILAISTRATEGIS"> 
												</section>
											</div>

											<br>

											<div class="row">
												<label class="label label-primary txt-color-white font-lg label-rumus">B. Perhitungan Nilai Sewa Reklame (NSR) = HDPP x NS x Luas x Jumlah x Periode Pasang</label>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>Nilai Strategis (NS) X HDPP</p>
												</section>
												<section class="col col-md-4 font-md">
													= <span class="TBLDAFTREKLAME_RPTARIF"></span> X <span class="TBLDAFTREKLAME_NILAISTRATEGIS"></span>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>&nbsp;</p>
												</section>
												<section class="col col-md-4 font-md">
													= <span class="TBLDAFTREKLAME_NSL"></span>
												</section>
											</div>
										
											<div class="row">
												<section class="col col-md-3 font-md">
													<p>Pajak Reklame</p>
												</section>
												<section class="col col-md-6 font-md">
													<label class="col col-sm-1">=</label>
													<label class="col col-md-2 text-align-right TBLDAFTREKLAME_NSL"></label>
													<input type="hidden" name="param[TBLDAFTREKLAME_NSL]" id="TBLDAFTREKLAME_NSL" value="">
													<label class="col col-sm-1">X</label>
													<label class="col col-md-2 text-align-right TBLDAFTREKLAME_LUAS"></label>
													<label class="col col-sm-1">X</label>
													<label class="col col-md-2 text-align-right TBLDAFTREKLAME_JMLHREKLAME"></label>
													<label class="col col-sm-1">X</label>
													<label class="col col-md-2 text-align-right "></label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>&nbsp;</p>
												</section>
												<section class="col col-md-5 font-md">
													<label class="col col-sm-1">=</label>
													<label class="col col-md-5 text-align-right TBLDAFTREKLAME_NILAISEWA"></label> 
													<input type="hidden" name="param[TBLDAFTREKLAME_NILAISEWA]" id="TBLDAFTREKLAME_NILAISEWA" value="">
													<label class="col col-sm-1">X</label>
													<label class="col col-md-2 text-align-right TBLDAFTREKLAME_PERSENTARIF">25</label>%
													<input type="hidden" name="param[TBLDAFTREKLAME_PERSENTARIF]" id="TBLDAFTREKLAME_PERSENTARIF" value="25">
												</section>
											</div>

											<div class="row">
												<label class="label label-primary txt-color-white font-lg label-rumus">C. Perbandingan Perhitungan Pajak </label>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>Perhitungan Berdasarkan Index</p>
												</section>
												<section class="col col-md-2 font-md text-align-right">
													= <span class="TBLDAFTREKLAME_PAJAKINDEX"></span>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>Perhitungan Berdasar Nilai Kontrak</p>
												</section>
												<section class="col col-md-2 font-md text-align-right">
													= <span class="TBLDAFTREKLAME_NILAIKONTRAK"></span>
													<hr style="border-bottom: 2px solid #000;">
												</section>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>Pajak Reklame</p>
												</section>
												<section class="col col-md-2 font-md text-align-right">
													= <span class="TBLDAFTREKLAME_PAJAK"></span>
												</section>
											</div>
											<br>

											<div class="row">
												<label class="label label-primary txt-color-white font-lg label-rumus">D. Keringanan Pajak dan Denda </label>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>Keringanan</p>
												</section>
												<section class="col col-md-2 font-md text-align-right">
													<label>
														<input type="text" readonly="" class="disabled" value="" name="">
													</label>
												</section>
											</div>

											<div class="row">
												<section class="col col-md-3 font-md">
													<p>Denda</p>
												</section>
												<section class="col col-md-2 font-md text-align-right">
													<label>
														<input type="text" readonly="" class="disabled" value="" name="">
													</label>
												</section>
											</div>

											<div class="row bold">
												<section class="col col-md-3 font-md">
													<p>Bayar</p>
												</section>
												<section class="col col-md-3 font-xl">
													= <span class="text-align-right TBLDAFTREKLAME_PAJAK"></span>
													<input type="hidden" name="param[TBLDAFTREKLAME_PAJAK]" id="TBLDAFTREKLAME_PAJAK">
												</section>
											</div>
											<br>
										</div>
									</div>
								</div>
								<!-- //TABS -->
								
								
							</fieldset>

							<fieldset id="form-dokumentasi-tanggal" style="display: none;">
								<h4><strong>Dokumentasi Tanggal</strong></h4><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Tgl. Terima SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<i class="icon-append fa fa-calendar"></i>
											<input value="<?= date('d-m-Y') ?>" type="text" id="TBLDAFTREKLAME_TGLTERIMA" name="param[TBLDAFTREKLAME_TGLTERIMA]" class="datepicker" data-dateformat="dd-mm-yy">
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
											<input value="10-<?= (date('m')+1)<10 ? '0' . (date('m')+1) : (date('m')+1) ?>-<?= date('Y') ?>" type="text" id="TBLDAFTREKLAME_TGLBATASSPTPD" name="param[TBLDAFTREKLAME_TGLBATASSPTPD]" class="datepicker" data-dateformat="dd-mm-yy">
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
											<input value="<?= date('d-m-Y') ?>" type="text" id="TBLDAFTREKLAME_TGLENTRI" name="param[TBLDAFTREKLAME_TGLENTRI]" class="datepicker" data-dateformat="dd-mm-yy">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-2">
										<p>Cara Penghitungan</p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select id="" name="">
												<option value="">-- Silakan Pilih --</option>
												<option value="S">S</option>
												<option value="O" selected="">O</option>
											</select><i></i>
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<div id="tbl_simpan">
									<button id="btnsimpan" type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan
									</button>
									<button type="button" class="btn btn-sm btn-default" onclick="selesai()">
										<i class="fa fa-ban"></i>	Batal
									</button>
									<button id="btncetakizin" type="button" class="btn btn-sm btn-warning" disabled="" onclick="cetakIzinReklame()">
										<i class="fa fa-print"></i>&nbsp;Cetak Izin Reklame
									</button>
									<button id="btncetakjabong" type="button" class="btn btn-sm btn-success" disabled="" onclick="cetakJabong()">
										<i class="fa fa-print"></i>&nbsp;Cetak Jabong
									</button>
									<button id="btncetakpengambilan" type="button" class="btn btn-sm btn-default" disabled="" onclick="cetakPengambilan()">
										<i class="fa fa-print"></i>&nbsp;Cetak Perintah Pengambilan
									</button>
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
	<script type="text/javascript" src="<?= Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js"></script>
	<script type="text/javascript">
		function setMoment() {
			moment.locale('id');
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
			setMoment();
		});

		pageSetUp();

		function valNum(n) {
			n = (typeof n == "undefined") ? "0" : n;
			return !isNaN(toAngka(n)) ? Number(toAngka(n)) : 0;
		}

		$("#TBLDAFTREKLAME_KETERANGAN1, #TBLDAFTREKLAME_KETERANGAN2, #TBLDAFTREKLAME_PENEMPATAN, #TBLDAFTREKLAME_NODAFTARIZIN").keyup(function(evt){
			$(evt.target).val($(evt.target).val().toUpperCase())
		})

		setPriceFormat();

		LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

		loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteWP();
		});

		function generateAutocompleteWP() {
			$('#TBLDAFTAR_NOPOK').autocomplete({
				serviceUrl: 'pendataan/reklame2016_tetap_integrasi/autocompletewp',

				onSelect: function (suggestion) {
					window.id = suggestion.data;
					window.nopokok = suggestion.TBLDAFTAR_NOPOK;
					window.nama = suggestion.TNPWPD_MILIKNAMA;
					window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
					window.alamat = suggestion.TNPWPD_MILIKALAMAT;
					window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
					$(this).val(suggestion.value);
					$('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);
					$('#TBLDAFTAR_BADANUSAHANAMA').val(nama);
					$('#TBLDAFTAR_BADANUSAHAALAMAT').val(alamat);

				}
				,showNoSuggestionNotice : true
				,noCache : true
				,noSuggestionNotice : "Tidak ditemukan hasil"
			});
		}

		function cekBlokSistemIzin() {
			var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var TBLPENDATAAN_PAJAKKE = $('#TBLPENDATAAN_PAJAKKE').val();
			var TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
			var TBLDAFTREKLAME_NODAFTARIZIN = $('#TBLDAFTREKLAME_NODAFTARIZIN').val();
			if (TBLDAFTAR_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
			} else {
				if (TBLDAFTREKLAME_NODAFTARIZIN!='') {
					getDataReklame(function() {
						// by callback jika sudah selesai load
						if (window.status_bloksistem != 1) {
							notifikasi('Informasi','Data perizinan reklame belum final','failed',1,0);
						} else {
							cekPernahDaftar();
						}
					});
					// setTimeout(function() {
					// 	if (window.status_bloksistem != 1) {
					// 		notifikasi('Informasi','Data perizinan reklame belum final','failed',1,0);
					// 	} else {
					// 		cekPernahDaftar();
					// 	}
					// }, 500);
				} else {
					cekPernahDaftar();
				}

			}
		}

		function cekPernahDaftar() {
			var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var TBLPENDATAAN_PAJAKKE = $('#TBLPENDATAAN_PAJAKKE').val();
			var TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();

				$.ajax({
					url: 'pendataan/reklame2016_tetap_integrasi/CekPernahDaftar',
					type: 'POST',
					dataType: 'json',
					data: {
						 NOPOKOK: TBLDAFTAR_NOPOK
						,THNPAJAK: TBLPENDATAAN_THNPAJAK
						,PAJAKKE: TBLPENDATAAN_PAJAKKE
					},
					success : function (respon) {
						if (respon.status=='sudah') {
							$.SmartMessageBox({
								title : "Informasi", // judul Smart Alert
								content : "Data dengan Nomor Pokok "+TBLDAFTAR_NOPOK+", Masa Pajak Tahun "+TBLPENDATAAN_THNPAJAK+" dengan pendataan ke "+TBLPENDATAAN_PAJAKKE+" sudah pernah didata. <br> Apakah anda ingin mengubah data ini?", // konten dari smart alert
								buttons : '[Tidak][Ya]' // pengaturan tombol
								}, function(ButtonPressed) {
									if (ButtonPressed === "Ya") {
									cari();
								}
							});
							return false;
						}
						else{
							cari();
						}
					}
				});
			
		
		}
		
		function cari() {
			var TBLDAFTAR_NOPOK = $('#TBLDAFTAR_NOPOK').val();
			var TBLPENDATAAN_PAJAKKE = $('#TBLPENDATAAN_PAJAKKE').val();
			var TBLPENDATAAN_THNPAJAK = $('#TBLPENDATAAN_THNPAJAK').val();
			if (TBLDAFTAR_NOPOK=='') {
				notifikasi('Informasi','Mohon isikan No Pokok WP','failed',1,0);
				window.state_cari = 'hitung';
				return false;
			}
			else{
				$('#footer-resto').hide('fast');
				$("html, body").animate({ scrollTop: $("#TBLDAFTAR_BADANUSAHANAMA").offset().top-100 }, "slow");
				$("#form-dokumentasi-tanggal").slideDown(600);

				$('#form-data-perhitungan').hide('fast');
				$.ajax({
					url: 'pendataan/reklame2016_tetap_integrasi/getdata',
					type: 'POST',
					dataType: 'json',
					data: {
						nopok: btoa(TBLDAFTAR_NOPOK)
						,tblpendataan_pajakke: btoa(TBLPENDATAAN_PAJAKKE)
						,tahun: btoa(TBLPENDATAAN_THNPAJAK)
						,bulan: btoa(TBLPENDATAAN_BLNPAJAK)
					},
					success: function(respon) {
						if (respon.data=='proses selanjutnya') {
							notifikasi('Maaf', 'Data sudah diproses ke tahap berikutnya', 'failed', 1,0);

							window.state_cari = 'edit';
							// $("#TREKENINGSUB_KODE").select2('readonly', true);
							$("#TBLDAFTREKLAME_SKORKAWASAN").val(respon['TBLDAFTREKLAME_SKORKAWASAN']);
							
							$.each(respon, function(kolom, val) {
								$('#' + kolom).val(respon[kolom]);
								$('#' + kolom).select2('val', respon[kolom]);
							});
							$("#TBLDAFTREKLAME_PERMOHONAN").val($.trim(respon['TBLDAFTREKLAME_PERMOHONAN']));
							$("#TBLDAFTREKLAME_NOSPTD").val($.trim(respon['TBLDAFTREKLAME_NOSPTD']));
							window.PERSENPAJAK = respon.TREKENING_TARIF;
							TGLIZIN=respon.TBLDAFTREKLAME_TGLIZIN;
							BLNIZIN=respon.TBLDAFTREKLAME_BLNIZIN;
							THNIZIN=respon.TBLDAFTREKLAME_THNIZIN;
							$('#TBLDAFTREKLAME_TGLIZIN').val(isikiri(TGLIZIN, '00')+'-'+isikiri(BLNIZIN, '00')+'-20'+THNIZIN);

							TGLSPTPD=respon.TBLDAFTREKLAME_TGLSPTPD;
							BLNSPTPD=respon.TBLDAFTREKLAME_BLNSPTPD;
							THNSPTPD=respon.TBLDAFTREKLAME_THNSPTPD;
							$('#TBLDAFTREKLAME_TGLSPTPD').val(isikiri(TGLSPTPD, '00')+'-'+isikiri(BLNSPTPD, '00')+'-20'+THNSPTPD);

							TGLBATASSPTPD=respon.TBLDAFTREKLAME_TGLBATASSPTPD;
							BLNBATASSPTPD=respon.TBLDAFTREKLAME_BLNBATASSPTPD;
							THNBATASSPTPD=respon.TBLDAFTREKLAME_THNBATASSPTPD;
							//$('#TBLDAFTREKLAME_TGLBATASSPTPD').val(isikiri(TGLBATASSPTPD, '00')+'-'+isikiri(BLNBATASSPTPD, '00')+'-20'+THNBATASSPTPD);

							$('#TBLDAFTREKLAME_TGLBATASSPTPD').val(TGLBATASSPTPD+'-<?= sprintf('%02d', date('m')+1) ?>-<?= date('Y') ?>');
							TGLENTRI=respon.TBLDAFTREKLAME_TGLENTRI;
							BLNENTRI=respon.TBLDAFTREKLAME_BLNENTRI;
							THNENTRI=respon.TBLDAFTREKLAME_THNENTRI;
							$('#TBLDAFTREKLAME_TGLENTRI').val(isikiri(TGLENTRI, '00')+'-'+isikiri(BLNENTRI, '00')+'-20'+THNENTRI);
							// $('#TBLDAFTREKLAME_TGLENTRI').val('<?= date('d-m-Y')?>');
							TGLTERIMA=respon.TBLDAFTREKLAME_TGLTERIMA;
							BLNTERIMA=respon.TBLDAFTREKLAME_BLNTERIMA;
							THNTERIMA=respon.TBLDAFTREKLAME_THNTERIMA;
							$('#TBLDAFTREKLAME_TGLTERIMA').val(isikiri(TGLTERIMA, '00')+'-'+isikiri(BLNTERIMA, '00')+'-20'+THNTERIMA);

							TGLAWAL=respon.TBLDAFTREKLAME_TGLMULAIREKLAME;
							BLNAWAL=respon.TBLDAFTREKLAME_BLNMULAIREKLAME;
							THNAWAL=respon.TBLDAFTREKLAME_THNMULAIREKLAME;
							$('#TBLDAFTREKLAME_TGLMULAIREKLAME').val(isikiri(TGLAWAL, '00')+'-'+isikiri(BLNAWAL, '00')+'-20'+THNAWAL);

							TGLAKHIR=respon.TBLDAFTREKLAME_TGLAKHIRREKLAME;
							BLNAKHIR=respon.TBLDAFTREKLAME_BLNAKHIRREKLAME;
							THNAKHIR=respon.TBLDAFTREKLAME_THNAKHIRREKLAME;
							$('#TBLDAFTREKLAME_TGLAKHIRREKLAME').val(isikiri(TGLAKHIR, '00')+'-'+isikiri(BLNAKHIR, '00')+'-20'+THNAKHIR);
							// $('#TBLDAFTREKLAME_TGLTERIMA').val('<?= date('d-m-Y')?>');
							$('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#TREKENINGSUB_KODE').select2('val', '4.1.1.4.' + respon.TBLDAFTREKLAME_REKJENIS);
							// $('#form-dokumentasi-tanggal').show('fast');
							// $('#footer-resto').show('fast');
							setMasaPajak();
							window.state_cari = 'hitung';
							HitungPajak();

							// disabled attribute kolom/tombol, data dimunculkan walaupun sudah ditetapkan/disetor

							$("#TBLDAFTREKLAME_PENEMPATAN").attr('disabled', true);
							$("#btnsimpan").attr('disabled', true);

						} else if (respon.data=='ada') {
							getDataReklame();
							window.state_cari = 'edit';
							// $("#TREKENINGSUB_KODE").select2('readonly', true);
							$("#TBLDAFTREKLAME_SKORKAWASAN").val(respon['TBLDAFTREKLAME_SKORKAWASAN']);
							
							$.each(respon, function(kolom, val) {
								$('#' + kolom).val(respon[kolom]);
								$('#' + kolom).select2('val', respon[kolom]);
							});
							$("#TBLDAFTREKLAME_PERMOHONAN").val($.trim(respon['TBLDAFTREKLAME_PERMOHONAN']));
							$("#TBLDAFTREKLAME_NOSPTD").val($.trim(respon['TBLDAFTREKLAME_NOSPTD']));
							window.PERSENPAJAK = respon.TREKENING_TARIF;
							TGLIZIN=respon.TBLDAFTREKLAME_TGLIZIN;
							BLNIZIN=respon.TBLDAFTREKLAME_BLNIZIN;
							THNIZIN=respon.TBLDAFTREKLAME_THNIZIN;
							$('#TBLDAFTREKLAME_TGLIZIN').val(isikiri(TGLIZIN, '00')+'-'+isikiri(BLNIZIN, '00')+'-20'+THNIZIN);

							TGLSPTPD=respon.TBLDAFTREKLAME_TGLSPTPD;
							BLNSPTPD=respon.TBLDAFTREKLAME_BLNSPTPD;
							THNSPTPD=respon.TBLDAFTREKLAME_THNSPTPD;
							$('#TBLDAFTREKLAME_TGLSPTPD').val(isikiri(TGLSPTPD, '00')+'-'+isikiri(BLNSPTPD, '00')+'-20'+THNSPTPD);

							TGLBATASSPTPD=respon.TBLDAFTREKLAME_TGLBATASSPTPD;
							BLNBATASSPTPD=respon.TBLDAFTREKLAME_BLNBATASSPTPD;
							THNBATASSPTPD=respon.TBLDAFTREKLAME_THNBATASSPTPD;
							$('#TBLDAFTREKLAME_TGLBATASSPTPD').val(isikiri(TGLBATASSPTPD, '00')+'-'+isikiri(BLNBATASSPTPD, '00')+'-20'+THNBATASSPTPD);

							// $('#TBLDAFTREKLAME_TGLBATASSPTPD').val(TGLBATASSPTPD+'-<?= sprintf('%02d', date('m')+1) ?>-<?= date('Y') ?>');
							TGLENTRI=respon.TBLDAFTREKLAME_TGLENTRI;
							BLNENTRI=respon.TBLDAFTREKLAME_BLNENTRI;
							THNENTRI=respon.TBLDAFTREKLAME_THNENTRI;
							$('#TBLDAFTREKLAME_TGLENTRI').val(isikiri(TGLENTRI, '00')+'-'+isikiri(BLNENTRI, '00')+'-20'+THNENTRI);
							// $('#TBLDAFTREKLAME_TGLENTRI').val('<?= date('d-m-Y')?>');
							TGLTERIMA=respon.TBLDAFTREKLAME_TGLTERIMA;
							BLNTERIMA=respon.TBLDAFTREKLAME_BLNTERIMA;
							THNTERIMA=respon.TBLDAFTREKLAME_THNTERIMA;
							$('#TBLDAFTREKLAME_TGLTERIMA').val(isikiri(TGLTERIMA, '00')+'-'+isikiri(BLNTERIMA, '00')+'-20'+THNTERIMA);

							TGLAWAL=respon.TBLDAFTREKLAME_TGLMULAIREKLAME;
							BLNAWAL=respon.TBLDAFTREKLAME_BLNMULAIREKLAME;
							THNAWAL=respon.TBLDAFTREKLAME_THNMULAIREKLAME;
							$('#TBLDAFTREKLAME_TGLMULAIREKLAME').val(isikiri(TGLAWAL, '00')+'-'+isikiri(BLNAWAL, '00')+'-20'+THNAWAL);

							TGLAKHIR=respon.TBLDAFTREKLAME_TGLAKHIRREKLAME;
							BLNAKHIR=respon.TBLDAFTREKLAME_BLNAKHIRREKLAME;
							THNAKHIR=respon.TBLDAFTREKLAME_THNAKHIRREKLAME;
							$('#TBLDAFTREKLAME_TGLAKHIRREKLAME').val(isikiri(TGLAKHIR, '00')+'-'+isikiri(BLNAKHIR, '00')+'-20'+THNAKHIR);
							// $('#TBLDAFTREKLAME_TGLTERIMA').val('<?= date('d-m-Y')?>');
							$('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							$('#TREKENINGSUB_KODE').select2('val', '4.1.1.4.' + respon.TBLDAFTREKLAME_REKJENIS);

							$('.TBLDAFTREKLAME_NODAFTARIZIN').text(respon.TBLDAFTREKLAME_NODAFTARIZIN)

							// $('#form-dokumentasi-tanggal').show('fast');
							// $('#footer-resto').show('fast');
							setMasaPajak();
							window.state_cari = 'hitung';
							HitungPajak();
						} else {
							getDataReklame();
							// $('#TBLDAFTREKLAME_TGLBATASSPTPD').val('10-<?= sprintf('%02d', date('m')+1) ?>-<?= date('Y') ?>');
							$('#TBLDAFTREKLAME_TGLBATASSPTPD').val(typeof respon.TGL_BATAS!='undefined' ? respon.TGL_BATAS : '10-<?= sprintf('%02d', date('m')+1) ?>-<?= date('Y') ?>');
							$('#TBLDAFTREKLAME_TGLENTRI').val('<?= date('d-m-Y')?>');
							$('#TBLDAFTREKLAME_TGLTERIMA').val('<?= date('d-m-Y')?>');
						}

						/*if (respon.data=='ada') {
							// $("#TREKENINGSUB_KODE").select2('readonly', true);
							$.each(respon, function(kolom, val) {
								$('#' + kolom).val(respon[kolom]);
								$('#' + kolom).select2('val', respon[kolom]);
							});
							window.PERSENPAJAK = respon.TREKENING_TARIF;
							TGLBATASSPTPD=respon.TBLDAFTREKLAME_TGLBATASSPTPD;
							BLNBATASSPTPD=respon.TBLDAFTREKLAME_BLNBATASSPTPD;
							THNBATASSPTPD=respon.TBLDAFTREKLAME_THNBATASSPTPD;
							// $('#TBLDAFTREKLAME_TGLBATASSPTPD').val(TGLBATASSPTPD+'-'+BLNBATASSPTPD+'-20'+THNBATASSPTPD);
							$('#TBLDAFTREKLAME_TGLBATASSPTPD').val('10-<?php //=sprintf('%02d', date('m')+1) ?>-<?php //=date('Y') ?>');
							TGLENTRI=respon.TBLDAFTREKLAME_TGLENTRI;
							BLNENTRI=respon.TBLDAFTREKLAME_BLNENTRI;
							THNENTRI=respon.TBLDAFTREKLAME_THNENTRI;
							// $('#TBLDAFTREKLAME_TGLENTRI').val(TGLENTRI+'-'+BLNENTRI+'-20'+THNENTRI);
							$('#TBLDAFTREKLAME_TGLENTRI').val('<?php //=date('d-m-Y')?>');
							TGLTERIMA=respon.TBLDAFTREKLAME_TGLTERIMA;
							BLNTERIMA=respon.TBLDAFTREKLAME_BLNTERIMA;
							THNTERIMA=respon.TBLDAFTREKLAME_THNTERIMA;
							// $('#TBLDAFTREKLAME_TGLTERIMA').val(TGLTERIMA+'-'+BLNTERIMA+'-20'+THNTERIMA);
							$('#TBLDAFTREKLAME_TGLTERIMA').val('<?php //=date('d-m-Y')?>');
							$('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
							// $('#form-dokumentasi-tanggal').show('fast');
							// $('#footer-resto').show('fast');
							setMasaPajak();
						}*/

						$('#form-data-perhitungan').show('fast');
						$('#footer-resto').show('fast');
					}
				});

			}

		}

function setMasaPajak() {
	$("#TBLDAFTREKLAME_MULAI").val('');
	$("#TBLDAFTREKLAME_AKHIR").val('');
	thn = $("#TBLPENDATAAN_THNPAJAK").val();
	bln = $("#TBLPENDATAAN_BLNPAJAK").val();
	// c = $("#tbltransaksiketetapan_notransaksi").val();
	if (thn!='' && bln!='') {
		/*el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_rupiahdenda, #tbltransaksiketetapan_pajak";
		jQuery.each(el.split(', '), function(index, val) {
		  $(val).val($(val)[0].defaultValue);
		});*/
		window.cmdp = 'tambah';
		window.idtranskttap = 0;
		masapajak = moment([thn,(bln-1)]);
		$("#TBLDAFTREKLAME_MULAI").val(masapajak.format('L'));
		$("#TBLDAFTREKLAME_AKHIR").val(masapajak.endOf('month').format('L'));
		$("#TBLDAFTREKLAME_JUMLAHHARIJUAL").val( masapajak.endOf('month').format('L').split('-')[0]-1 );
		// if (c!='') {
		// isSudahPendataan(thn, bln, c);
		// }
	}
}

function HitungPajak() {
	var persenpajak = (window.PERSENPAJAK/100);
	var BOBOTREK = <?= CJSON::encode($data['refbobotreklame']); ?>
	/*hitung*/
	bobotkawasan = ( skorkaw = valNum($("#TBLDAFTREKLAME_SKORKAWASAN option:selected").val()) ) * (BOBOTREK['RREKBOBOT_KJALAN']/100);
	bobotsudutpandang = (skorsdpnd = $("#REFSUDUTPANDANG_SKOR option:selected").val()) * (BOBOTREK['RREKBOBOT_SUDUTPANDANG']/100);
	bobotsudutpandang = Number(bobotsudutpandang.toFixed(2));
	bobotketinggian = ( skortinggi = $("#REFKETINGGIAN_SKOR option:selected").val()) * (BOBOTREK['RREKBOBOT_KETINGGIAN']/100);
	ns = bobotkawasan + bobotketinggian + bobotsudutpandang;

	$('.TBLDAFTREKLAME_SKORKAWASAN').text(skorkaw);
	$('.REFSUDUTPANDANG_SKOR').text(skorsdpnd);
	$('.REFKETINGGIAN_SKOR').text(skortinggi);

	$("#RREKBOBOT_KJALAN").val( BOBOTREK['RREKBOBOT_KJALAN'] );
	$(".RREKBOBOT_KJALAN").text( BOBOTREK['RREKBOBOT_KJALAN'] );
	$("#RREKBOBOT_SUDUTPANDANG").val( BOBOTREK['RREKBOBOT_SUDUTPANDANG'] );
	$(".RREKBOBOT_SUDUTPANDANG").text( BOBOTREK['RREKBOBOT_SUDUTPANDANG'] );
	$("#RREKBOBOT_KETINGGIAN").val( BOBOTREK['RREKBOBOT_KETINGGIAN'] );
	$(".RREKBOBOT_KETINGGIAN").text( BOBOTREK['RREKBOBOT_KETINGGIAN'] );

	$(".bobot1").text( bobotkawasan );
	$(".bobot2").text( bobotsudutpandang );
	$(".bobot3").text( bobotketinggian );

	kolom = $('#RREKJNSREKTARIF_ID option:selected').attr('kolom');
	tarifharga = 0;
	if ($("#TREKENINGSUB_KODE option:selected").val()!='') {
		if (kolom!=undefined) {
			tarifharga = $("#TREKENINGSUB_KODE option:selected").attr(kolom.toLowerCase());
		} else {
			
		}
	} else {
		if (window.state_cari != 'edit') {
		notifikasi('Maaf', 'Pastikan Anda sudah memilih rekening reklame untuk proses perhitungan', 0, 1, 0);
		}
	}
	hdpp = tarifharga;

	$('#TBLDAFTREKLAME_RPTARIF').val(hdpp);
	$('.TBLDAFTREKLAME_RPTARIF').text( toRp(hdpp) );
	// $('.TBLDAFTREKLAME_PERSENTARIF').text( 25 );
	PERSENTARIF = $("#TBLDAFTREKLAME_PERSENTARIF").val();
	
	$('#TBLDAFTREKLAME_NILAISTRATEGIS').val(ns);
	$('.TBLDAFTREKLAME_NILAISTRATEGIS').text( formatRibuan(ns, 0, 2) );

	NSL = ns * tarifharga;
	// NSL = ceiling(NSL, 100);
	$("#TBLDAFTREKLAME_NSL").val(NSL);
	$(".TBLDAFTREKLAME_NSL").text(toRp(NSL));

	jmlrek = $("#TBLDAFTREKLAME_JMLHREKLAME").val();
	$(".TBLDAFTREKLAME_JMLHREKLAME").text(jmlrek);

	rekpanjang = $("#TBLDAFTREKLAME_PANJANG").val();
	reklebar = $("#TBLDAFTREKLAME_LEBAR").val();
	rekluas = rekpanjang * reklebar;
	$("#TBLDAFTREKLAME_LUAS").val(rekluas);
	$(".TBLDAFTREKLAME_LUAS").text( formatRibuan(rekluas, 0, 2) );

	sp = '';
	if (skorsdpnd == 10 || skorsdpnd == 2) 
		sp = 1;
	if (skorsdpnd == 20 || skorsdpnd == 3) 
		sp = 2;
	if (skorsdpnd == 30) 
		sp = 3;
	if (skorsdpnd == 40) 
		sp = 4;

	ISIREK = 'JML ' + jmlrek + ' BH, ' + rekpanjang + 'M X ' + reklebar + 'M , SDP :' + sp + ' ';
	$("#TBLDAFTREKLAME_ISIREKLAME").val(ISIREK);

	JUMLAHHARI = 0;
	JUMLAHHARI = moment($("#TBLDAFTREKLAME_TGLAKHIRREKLAME").val(), 'DD-MM-YYYY').diff(moment($("#TBLDAFTREKLAME_TGLMULAIREKLAME").val(), 'DD-MM-YYYY'), 'days');
	if (isNaN(JUMLAHHARI) || JUMLAHHARI==0) {
		JUMLAHHARI = 1;
	} else {
		JUMLAHHARI += 1;
	}

	$("#TBLDAFTREKLAME_JUMLAHHARI").val(JUMLAHHARI);

	NISEWA = NSL * jmlrek * rekluas; // * JUMLAHHARI;
	$("#TBLDAFTREKLAME_NILAISEWA").val(NISEWA);
	$(".TBLDAFTREKLAME_NILAISEWA").text(toRp(NISEWA));

	buffpajak = NISEWA * (PERSENTARIF/100);
	buffpajak = ceiling(buffpajak, 1);
	$(".TBLDAFTREKLAME_PAJAKINDEX").text(toRp(buffpajak));

	NKontrak = valNum($("#TBLDAFTREKLAME_NILAIKONTRAK").val());
	NKontrakPajak = NKontrak * (25/100);
	// $(".TBLDAFTREKLAME_NILAIKONTRAK").text(toRp(NKontrak));
	$(".TBLDAFTREKLAME_NILAIKONTRAK").text(toRp(NKontrakPajak));

	TBLDAFTREKLAME_PAJAK = buffpajak;

	if (NKontrakPajak > buffpajak) {
		TBLDAFTREKLAME_PAJAK = NKontrak * (25/100);
	}
	$("#TBLDAFTREKLAME_PAJAK").val(TBLDAFTREKLAME_PAJAK);
	$(".TBLDAFTREKLAME_PAJAK").text(toRp(TBLDAFTREKLAME_PAJAK));

	// var pajak = OMZET*persenpajak;
	// var setor = pajak + bungarp;
	// $("#TBLDAFTREKLAME_PAJAK").val( ( parseInt(pajak) ) );
	// $("#TBLDAFTREKLAME_RUPIAHSETOR").val( ( parseInt(setor) ) );
	setPriceFormat();
}

$("#btnHitung").click(function(event) {
	$("#link_tabrek2").click();
});

$('#TBLDAFTREKLAME_JMLHREKLAME, #TBLDAFTREKLAME_TINGGIREKLAME, #TBLDAFTREKLAME_PANJANG, #TBLDAFTREKLAME_LEBAR, #TBLDAFTREKLAME_NILAIKONTRAK, #TBLDAFTREKLAME_TGLMULAIREKLAME, #TBLDAFTREKLAME_TGLAKHIRREKLAME').keyup(function(event) {
	HitungPajak();
});

$("#TBLDAFTREKLAME_SKORKAWASAN, #RREKJNSREKTARIF_ID, #REFSUDUTPANDANG_SKOR, #RREKJNSPOSISI_ID, #REFKETINGGIAN_SKOR, #TBLDAFTREKLAME_TGLMULAIREKLAME, #TBLDAFTREKLAME_TGLAKHIRREKLAME, #TREKENINGSUB_KODE").change(function(event) {
	HitungPajak();
});

function cetakPengambilan() {
	window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/reklame2016_tetap_integrasi/cetakPengambilan?');
}

function cetakJabong() {
	window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/reklame2016_tetap_integrasi/cetakJabong?');
}

function cetakIzinReklame() {
	window.open('<?= Yii::app()->getBaseUrl(1); ?>/pendataan/reklame2016_tetap_integrasi/cetakIzinReklame?');
}

function selesai() {
	window.location.reload();
}

function setTabPerhitungan() {
	HitungPajak();
}

function ceiling(angka, minimal) {
	return (Math.ceil(angka/minimal)*minimal);
}

function simpanPendataan() {
	$("#btnsimpan").attr('disabled', true);
	$("#btncetakpengambilan").attr('disabled', false);
	$("#btncetakjabong").attr('disabled', false);
	$("#btncetakizin").attr('disabled', false);
	var addparams = {
		// TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
		LOKASI : $('#REFJALAN_ID option:selected').attr('namajalan')
	}
	$.ajax({
		url: 'pendataan/reklame2016_tetap_integrasi/simpanPendataan',
		type: 'POST',
		dataType: 'json',
		data: $("#form-pendataan-reklame2016_tetap").serialize() + '&' + jQuery.param(addparams),
		success: function(respon) {
			if (respon.status=='success') {
				notifikasi('Selamat', 'Data pendataan reklame berhasil disimpan', 'success', 1, 0);
				window.location.reload();
			} else {
				notifikasi('Maaf', 'Data pendataan reklame gagal disimpan', 'f', 1, 0);
			}
		}
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}


/*form validation*/
loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
function runFormValidation() {
	var $FormData = $("#form-pendataan-reklame2016_tetap").validate({
      // Rules for form validation
      rules : {
      	"param[TBLDAFTAR_NOPOK]" : {
      		required : true
      	}
      	,"param[TBLPENDATAAN_THNPAJAK]" : {
      		required : true
      	}
      	,"param[TBLPENDATAAN_BLNPAJAK]" : {
      		required : true
      	}
      	,"param[TBLDAFTREKLAME_TGLTERIMA]" : {
      		required : true
      	}
      	,"param[TBLDAFTREKLAME_TGLBATASSPTPD]" : {
      		required : true
      	}
      },

      // Messages for form validation
      messages : {
      	"param[TBLDAFTAR_NOPOK]" : {
      		required : 'Mohon isikan Nomor Pokok WP'
      	}
      	,"param[TBLPENDATAAN_THNPAJAK]" : {
      		required : 'Mohon isikan Tahun Pajak'
      	}
      	,"param[TBLPENDATAAN_BLNPAJAK]" : {
      		required : 'Mohon isikan Bulan Pajak'
      	}
      	,"param[TBLDAFTREKLAME_TGLTERIMA]" : {
      		required : 'Mohon isikan Tanggal Terima'
      	}
      	,"param[TBLDAFTREKLAME_TGLBATASSPTPD]" : {
      		required : 'Mohon isikan Tanggal batas'
      	}
      },

      // Do not change code below
      errorPlacement : function(error, element) {
      	error.insertAfter(element.parent());
      },
      submitHandler : function(form) {
        // saat validasi benar semua, jalankan simpan()
        return simpanPendataan();
    }
});

};
/*//form validation*/

	$("#TBLDAFTREKLAME_NODAFTARIZIN").change(function(event) {
		var str = $('#TBLDAFTREKLAME_NODAFTARIZIN').val(); 
		var n = str.search("REK-I");
		if (n>1) {
			notifikasi('Menu ini hanya bisa menerima pendaftaran izin reklame sesuai jenis reklame', 'cek kembali nomor pendaftaran izin reklame', 'f', 1, 0);
			setTimeout(function() {
				// $("#TBLDAFTREKLAME_NODAFTARIZIN").val('');
			}, 100);
		}
	});

function getDataReklame(CALLBACK_FUNCTION) {
	var nodaftar = $('#TBLDAFTREKLAME_NODAFTARIZIN').val();
	$.ajax({
		url: 'pendataan/reklame2016_tetap_integrasi/GetDataReklame',
		type: 'POST',
		dataType: 'json',
		data: {
			 nodaftar: nodaftar
		},
		success : function (respon) {
			$('#TBLDAFTREKLAME_KETERANGAN1').val(respon.naskah);
			$('#TBLDAFTREKLAME_TINGGIREKLAME').val(respon.tinggi);
			$('#TBLDAFTREKLAME_PANJANG').val(respon.panjang);
			$('#TBLDAFTREKLAME_LEBAR').val(respon.lebar);
			$('#REFSUDUTPANDANG_SKOR').val(respon.muka_sisi);
			$('#TBLDAFTREKLAME_JMLHREKLAME').val(respon.jumlah);
			$('#RREKJNSREKTARIF_ID').val(respon.posisi_terhadap_jalan);
			$('#RREKJNSPOSISI_ID').val(respon.posisi_pjg_lbr);
			$('#TBLDAFTREKLAME_KETERANGAN2').val(respon.lokasi);
			$('#TBLDAFTREKLAME_PENEMPATAN').val(respon.penempatan);
			$('#TBLDAFTREKLAME_TGLMULAIREKLAME').val(respon.masa_izin_awal);
			$('#TBLDAFTREKLAME_TGLAKHIRREKLAME').val(respon.masa_izin_akhir);
			$('#TBLDAFTREKLAME_TGLIZIN').val(respon.tgl_izin);
			$('#jenis_reklame').text(respon.jenis_reklame);
			$('#RREKJNSREKTARIF_ID').val(respon.RREKJNSREKTARIF_ID);
			$('#RREKJNSPOSISI_ID').val(respon.RREKJNSPOSISI_ID);
			$('#REFSUDUTPANDANG_SKOR').val(respon.REFSUDUTPANDANG_SKOR);
			window.bloksistem_terakhir = respon.bloksistem_terakhir;
			window.status_bloksistem = respon.status_bloksistem;

			if (typeof CALLBACK_FUNCTION === 'function') {
                // jika ajax selesai & ada callback, panggil
                CALLBACK_FUNCTION()
            }
		}
	});
}

</script>
<style type="text/css">
input.disabled, textarea.disabled {
	background: #e4e4e4!important;
}

.jarviswidget-color-teal>header>.jarviswidget-ctrls a, .jarviswidget-color-teal .nav-tabs li:not(.active) a {
    color: #424242!important;
}
.label-rumus {
	padding: 0.2em !important;
}

.bold {
	font-weight: bold;
}

</style>