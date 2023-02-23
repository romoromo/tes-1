	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-file-text-o"></i> Angsuran - Pajak Hotel </h4>
			</div>
		</div>
	</div>


	<!-- widget grid -->
	<div class="well">
	<section id="widget-grid" class="" >

		<!-- row -->
		<div class="row">


			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-teal" id="wid-id-kiorsshotel" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
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
							<form id="form_angsuran_pajakhotel" class="smart-form" novalidate="">
								<br><fieldset>
									<div class="row">
										<section class="col col-md-2" style="margin-left: 2%;">Nomor Pokok WP</section>
										<section class="col col-md-4">
											<label class="input">
												<input class="form-control" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK">
											</label>
										</section>
										<section class="col col-md-4">
											<h4 align="left">Entry Penetapan Angsuran Pajak Hotel</h4>
										</section>
									</div>

									<div class="row">		
										<section class="col col-md-2" style="margin-left: 2%;">Tanggal Pemeriksaan</section>
										<section class="col col-md-2">
											<label class="select">
												<label class="input">
													<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="TBLPENDATAAN_THNPAJAK" name="TBLPENDATAAN_THNPAJAK">
												</label>
											</label>
										</section>
										<section class="col col-md-2">
											<label class="select">
												<select class="select2" id="TBLPENDATAAN_BLNPAJAK" name="TBLPENDATAAN_BLNPAJAK">
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
										<!-- <section class="col col-md">
											<label class="checkbox state-success"><input type="checkbox" name="checkbox"><i></i></label>
										</section>
										<section class="col col-md-1">
											<label class="input">
												<input type="text" name="TBLPENDATAAN_TGLPAJAK" id="TBLPENDATAAN_TGLPAJAK">
											</label>
										</section> -->
										<section class="col col-md-1">
											<button type="button" class="btn btn-sm btn-primary" onclick="cari()">Enter</button>
										</section>
									</div>
									<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Rekening</section>
										<section class="col col-md-4">
											<label class="select">
												<select class="select2" id="no_subrek" name="no_subrek" disabled="disabled">
													<option value="">-- Silahkan Pilih Rekening --</option>
														<?php foreach ($data['rek'] as $combo_subrek): ?>
															<option value="<?php echo $combo_subrek['TBLREKENING_KODE']; ?>">[<?php echo $combo_subrek['TBLREKENING_KODEFULL']; ?>] <?php echo $combo_subrek['TBLREKENING_NAMAREKENING']; ?></option>
														<?php endforeach ?>
												</select>
											</label>
										</section>
									</div>
								<hr><br>
								<div class="row">
									<section class="col col-md-12"><h4 align="center">Data Perhitungan</h4></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">NPWPD</section>
									
									<section class="col col-md-2">
										<span id="TBLDAFTAR_NPWPD"></span>
									</section>		
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Nama Wajib Pajak</section>
										<section class="col col-md-2">
											<span id="TBLDAFTAR_BADANUSAHANAMA"></span>
										</section>
									<section class="col col-md-2">Tanggal SKPDKB</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" readonly="" name="<?= $this->namatabel ?>_TGLKURANGBAYAR" class="datepicker" data-dateformat="dd-mm-yy" id="<?= $this->namatabel ?>_TGLKURANGBAYAR" style="
											background-color: beige;
											">
										</label>
									</section>	
								</div>

								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Alamat Wajib Pajak</section>	
										<section class="col col-md-2">
											<span id="TBLDAFTAR_BADANUSAHAALAMAT"></span>
										</section>
									<section class="col col-md-2">Total SKPDKB</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" readonly="" type="text" id="KB_<?= $this->namatabel ?>_RUPIAHKRGBAYAR" name="<?= $this->namatabel ?>_RUPIAHKRGBAYAR" style="
											background-color: beige;
											">
										</label>
									</section>
									<section class="col col-md-1">
										<button type="button" onclick="hitungtotal()" class="btn btn-sm btn-primary">Hitung Bunga Keterlambatan</button>
									</section>	
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">No SKPDKB </section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" readonly="" type="text" id="<?= $this->namatabel ?>_REGKURANGBAYAR" name="<?= $this->namatabel ?>_REGKURANGBAYAR" style="
											background-color: beige;
											">
										</label>
									</section>
									<section class="col col-md-2">Bunga Tambahan</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control format-rupiah" readonly="" type="text" id="<?= $this->namatabel ?>_BUNGATAMBAHAN" name="<?= $this->namatabel ?>_BUNGATAMBAHAN" style="
											background-color: beige;
											">
										</label>
									</section>
									
								</div>
								<div class="row">
								<section class="col col-md-2" style="margin-left: 2%;">Tanggal Batas SKPDKB </section>

								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" readonly="" name="<?= $this->namatabel ?>_TGLBTSKRGBAYAR" class="datepicker" data-dateformat="dd-mm-yy" id="<?= $this->namatabel ?>_TGLBTSKRGBAYAR" style="
										background-color: beige;
										">
									</label>
								</section>
								<section class="col col-md-2">Total Pokok Angsuran</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="form-control format-rupiah" readonly="" type="text" id="<?= $this->namatabel ?>_TOTALANGSUR" name="<?= $this->namatabel ?>_TOTALANGSUR" style="
										background-color: beige;
										">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2" style="margin-left: 2%;">Masa Pajak Awal</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" name="<?= $this->namatabel ?>_BLNKBAWAL" id="<?= $this->namatabel ?>_BLNKBAWAL">
											<option value="0">-- Silahkan Pilih --</option>
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
								<section class="col col-md-2">Masa Pajak Akhir</section>
								<section class="col col-md-2">
									<label class="select">
										<select class="select2" name="<?= $this->namatabel ?>_BLNKBAKHIR" id="<?= $this->namatabel ?>_BLNKBAKHIR">
											<option value="0">-- Silahkan Pilih --</option>
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
								<section class="col col-md-2" style="margin-left: 2%;">Tanggal Entry Angsuran</section>

								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="TGLENTRI" class="datepicker" data-dateformat="dd-mm-yy" id="TGLENTRI" style="
										/* background-color: beige; */
										">
									</label>
								</section>
								<section class="col col-md-2">Nomor Angsuran</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="form-control" type="text" id="<?= $this->namatabel ?>_REGSURATANGSUR" name="<?= $this->namatabel ?>_REGSURATANGSUR">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2" style="margin-left: 2%;"></section>

								<section class="col col-md-2">
									<label class="input"> 

									</label>
								</section>
								<section class="col col-md-2">Tanggal Surat Pengajuan Permohonan</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="<?= $this->namatabel ?>_TGLSURATANGSUR" class="datepicker" data-dateformat="dd-mm-yy" id="<?= $this->namatabel ?>_TGLSURATANGSUR" style="
										/* background-color: beige; */
										">
									</label>
								</section>
							</div>
							<div class="row">		
								<section class="col col-md-2" style="margin-left: 2%;">Tanggal Batas</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="<?= $this->namatabel ?>_TGLBATAS" class="datepicker" data-dateformat="dd-mm-yy" id="<?= $this->namatabel ?>_TGLBATAS">
									</label>
								</section>
								<section class="col col-md-3 hidden">
									<label class="checkbox state-success"><input type="checkbox" name="checkbox"><i></i>Tanpa Bunga</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2" style="margin-left: 2%;">Diangsur</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="form-control" type="text" id="<?= $this->namatabel ?>_JUMLAHANGSUR" name="<?= $this->namatabel ?>_JUMLAHANGSUR">
									</label>
								</section>
								<section class="col col-md-1">
									<button type="button" class="btn btn-sm btn-primary" id="btnHitungAngsur" onclick="hitungAngsuran()">&lt;&lt; Hitung Angsuran</button>
								</section>
							</div>

							<div>
								<table id="tbldetilangsur" class="table table-bordered table-striped">
									<thead>
										<tr>
											<td>No</td>
											<td>Angsuran Ke</td>
											<td>Tahun Batas SKP</td>
											<td>BLBSKP</td>
											<td>HRBSKP</td>
											<td>RPSKP</td>
											<td>Bunga</td>
											<td>Angsuran</td>
										</tr>
									</thead>
									<tbody id="_listDetail_">
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="6">

											</td>
											<td>
												Rp <span class="pull-right dtl_tblsuratperjanjianangsuran_tarifbunga"></span>
												<input type="hidden" name="tblsuratperjanjianangsuran_tarifbunga" class="dtl_tblsuratperjanjianangsuran_tarifbunga" />
											</td>
											<td>
												Rp <span class="pull-right dtl_tblsuratperjanjianangsuran_totalangsuran"></span>
												<input type="hidden" name="param[tblsuratperjanjianangsuran_totalangsuran]" class="dtl_tblsuratperjanjianangsuran_totalangsuran" />
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
													
							</fieldset>
								<footer>
									<div id="tbl_simpan">
										<button type="button" id="btnCetakKetetapan" class="btn btn-sm btn-success">
											<i class="fa fa-print"></i>&nbsp;Cetak Ketetapan Angsuran
										</button>

										<button type="button" id="btnCetakPerjanjian" class="btn btn-sm btn-warning">
											<i class="fa fa-print"></i>&nbsp;Cetak Perjanjian Angsuran
										</button>

										<button type="button" class="btn btn-sm btn-default" onclick= "reload()" data-dismiss="modal">
											<i class="fa fa-ban"></i>Entri Baru
										</button>

										<button type="button" id="btnsimpan" disabled="disabled" onclick="simpan()" class="btn btn-sm btn-primary">
											<i class="fa fa-save"></i>&nbsp;Simpan
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

	<form style="display: none;" method="post" id="form_cetakketetapan" action="<?php echo $this->modul_url ?>/cetakketetapan" target="_blank">
		<input type="hidden" name="form_cetakketetapan_data" id="form_cetakketetapan_data">
	</form>

	<form style="display: none;" method="post" id="form_cetakperjanjian" action="<?php echo $this->modul_url ?>/cetakperjanjian" target="_blank">
		<input type="hidden" name="form_cetakperjanjian_data" id="form_cetakperjanjian_data">
	</form>

	<!-- end widget grid -->

	<script type="text/javascript">
		pageSetUp();

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPHotel();
	});

	function generateAutocompleteWPHotel() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: '<?php echo $this->modul_url ?>/autocompletewphotel',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TNPWPD_NOPOK;
		        window.nama = suggestion.TNPWPD_MILIKNAMA;
		        window.alamat = suggestion.TNPWPD_MILIKALAMAT;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	function reload() {
		window.location.reload()
	}
	
	function hitungtotal() {

		tglbts = $('#<?= $this->namatabel ?>_TGLBTSKRGBAYAR').val();
		tglentr = $('#TGLENTRI').val();
		rupiahkb = toAngka($('#KB_<?= $this->namatabel ?>_RUPIAHKRGBAYAR').val());

		var parts = tglbts.split("-");

		dd = parts[0]; 
		mm = parts[1]; 
		yyyy = parts[2];

		tglbataskb = yyyy+'-'+mm+'-'+dd;

		var parts = tglentr.split("-");

		dd = parts[0]; 
		mm = parts[1]; 
		yyyy = parts[2];

		tglentriangsur = yyyy+'-'+mm+'-'+dd;

		jumlahblndenda = getBulanDenda(tglbataskb,tglentriangsur);

		if (jumlahblndenda>24) {
			blndenda = 24;		
		} else {
			blndenda = jumlahblndenda;		
		}

		// bunga = rupiahkb * (blndenda/100);
		bunga = (blndenda * (2/100)) * rupiahkb
		bunga = Math.round(bunga);

		totalpokokangsur = Number(rupiahkb) + bunga;
		totalpokokangsur = Math.round(totalpokokangsur);

		// $(".<?= $this->namatabel ?>_BUNGATAMBAHAN").html(toRp(bunga));
        $("#<?= $this->namatabel ?>_BUNGATAMBAHAN").val(bunga);

        // $(".<?= $this->namatabel ?>_TOTALANGSUR").html(toRp(totalpokokangsur));
        $("#<?= $this->namatabel ?>_TOTALANGSUR").val(totalpokokangsur);
        setPriceFormat();
	}

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		window.totalkb = 0;
		tblketetapanangsuran = [];
		localStorage.setItem("tblketetapanangsuran", JSON.stringify(tblketetapanangsuran));
		$("#_listDetail_").html('');
		$("#tbldetilangsur .pull-right").html('');
	});

	$("#btnHitungAngsur").click(function(event) {
		hitungAngsuran();
	});

	function cari () {

		var CARI_NOPOK = $('#TBLDAFTAR_NOPOK').val();
		var BULAN = $('#TBLPENDATAAN_BLNPAJAK').select2('val');
		var TAHUN = $('#TBLPENDATAAN_THNPAJAK').val();
		var TANGGAL = $('#TBLPENDATAAN_TGLPAJAK').val();

		getNoANG(TAHUN);

		window.cmd = "tambah";

		$.ajax({
			url: '<?php echo $this->modul_url ?>/getdata',
			type: 'POST',
			dataType: 'json',
			data: {
				TBLDAFTAR_NOPOK : CARI_NOPOK,
				bulan : $('#TBLPENDATAAN_BLNPAJAK').select2('val'),
				tahun : $('#TBLPENDATAAN_THNPAJAK').val(),
				tanggal : $('#TBLPENDATAAN_TGLPAJAK').val()
			},
			success: function(respon) {
				if (respon.data=="sudah kb") {

					$('#<?= $this->namatabel ?>_BLNKBAWAL').select2('val',respon.AWAL_PAJAK);
					$('#<?= $this->namatabel ?>_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
					$('#TBLDAFTAR_BADANUSAHANAMA').html(respon.TBLDAFTAR_BADANUSAHANAMA);
					$('#TBLDAFTAR_BADANUSAHAALAMAT').html(respon.TBLDAFTAR_BADANUSAHAALAMAT);

					$('#TBLDAFTAR_NPWPD').html(respon.TBLDAFTAR_JENISPENDAPATAN +'.'+ respon.TBLDAFTAR_GOLONGAN +'.'+ respon.TBLDAFTAR_NOPOK +'.'+ respon.TBLKECAMATAN_IDBADANUSAHA +'.'+ respon.TBLKELURAHAN_IDBADANUSAHA);

					$('#nama_subrekening').val(respon.TREKENING_NAMA);
					$('#no_subrek').select2('val',respon.REKENING_KODE);
					$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
					$('#form_perhitungan').show('fast');
					$('#form_dokumentasi_tanggal').show('fast');
					$('#persen_pajak').val(respon.TREKENING_TARIF);
					$('#kecamatan_pajak').val(respon.TBLKECAMATAN_ID);
					$('#kelurahan_pajak').val(respon.TBLKELURAHAN_ID);
					$('#tarif_rekening').val(respon.TREKENING_TARIF);
					$('#res_jumlah_pajak_tetap_wp').val(respon.<?= $this->namatabel ?>_PAJAK);
					$('#res_jumlah_pajak_setor_wp').val(respon.<?= $this->namatabel ?>_PAJAK);
					$('#<?= $this->namatabel ?>_REGKURANGBAYAR').val(respon.<?= $this->namatabel ?>_REGKURANGBAYAR);
					$('#<?= $this->namatabel ?>_PAJAKPERIKSA').val(respon.<?= $this->namatabel ?>_PAJAKPERIKSA);
					$('#<?= $this->namatabel ?>_BUNGAKRGBAYAR').val(respon.<?= $this->namatabel ?>_BUNGAKRGBAYAR);
					$('#<?= $this->namatabel ?>_KENAIKANKRGBAYAR').val(respon.<?= $this->namatabel ?>_KENAIKANKRGBAYAR);
					$('#<?= $this->namatabel ?>_DENDAKRGBAYAR').val(respon.<?= $this->namatabel ?>_DENDAKRGBAYAR);
					$('#KB_<?= $this->namatabel ?>_RUPIAHKRGBAYAR').val(respon.<?= $this->namatabel ?>_RUPIAHKRGBAYAR);
					$('#<?= $this->namatabel ?>_BLNKBAWAL').select2('val',respon.<?= $this->namatabel ?>_BLNKBAWAL);
					$('#<?= $this->namatabel ?>_BLNKBAKHIR').val(respon.<?= $this->namatabel ?>_BLNKBAKHIR);
					$('#<?= $this->namatabel ?>_NOMORPERIKSA').val(respon.<?= $this->namatabel ?>_NOMORPERIKSA);
					$('#<?= $this->namatabel ?>_TGLKURANGBAYAR').val(respon.<?= $this->namatabel ?>_TGLKURANGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNKURANGBAYAR +'-20'+respon.<?= $this->namatabel ?>_THNKURANGBAYAR);
					$('#<?= $this->namatabel ?>_TGLKURANGBAYAR2').val(respon.<?= $this->namatabel ?>_TGLKURANGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNKURANGBAYAR +'-20'+respon.<?= $this->namatabel ?>_THNKURANGBAYAR);
					$('#<?= $this->namatabel ?>_TGLBTSKRGBAYAR').val(respon.<?= $this->namatabel ?>_TGLBTSKRGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNBTSKRGBAYAR +'-20'+ respon.<?= $this->namatabel ?>_THNBTSKRGBAYAR);
					$('#TGLENTRI').val('<?= date('d-m-Y') ?>');
					window.BULAN_DENDA = respon.BULAN_DENDA;
					window.PERSEN_DENDA = respon.PERSEN_DENDA;
					$('#footer-hotel').show('fast');
					setPriceFormat();

					$('#btnsimpan').removeAttr('disabled','disabled');

					if (respon.cekAngsur=="ada" || respon.cekAngsurSetor=="ada") {

						$('#<?= $this->namatabel ?>_BLNKBAWAL').select2('val',respon.AWAL_PAJAK);
						$('#<?= $this->namatabel ?>_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
						$('#TBLDAFTAR_BADANUSAHANAMA').html(respon.TBLDAFTAR_BADANUSAHANAMA);
						$('#TBLDAFTAR_BADANUSAHAALAMAT').html(respon.TBLDAFTAR_BADANUSAHAALAMAT);

						$('#TBLDAFTAR_NPWPD').html(respon.TBLDAFTAR_JENISPENDAPATAN +'.'+ respon.TBLDAFTAR_GOLONGAN +'.'+ respon.TBLDAFTAR_NOPOK +'.'+ respon.TBLKECAMATAN_IDBADANUSAHA +'.'+ respon.TBLKELURAHAN_IDBADANUSAHA);

						$('#nama_subrekening').val(respon.TREKENING_NAMA);
						$('#no_subrek').select2('val',respon.REKENING_KODE);
						$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
						$('#form_perhitungan').show('fast');
						$('#form_dokumentasi_tanggal').show('fast');
						$('#persen_pajak').val(respon.TREKENING_TARIF);
						$('#kecamatan_pajak').val(respon.TBLKECAMATAN_ID);
						$('#kelurahan_pajak').val(respon.TBLKELURAHAN_ID);
						$('#tarif_rekening').val(respon.TREKENING_TARIF);
						$('#res_jumlah_pajak_tetap_wp').val(respon.<?= $this->namatabel ?>_PAJAK);
						$('#res_jumlah_pajak_setor_wp').val(respon.<?= $this->namatabel ?>_PAJAK);
						$('#<?= $this->namatabel ?>_REGKURANGBAYAR').val(respon.<?= $this->namatabel ?>_REGKURANGBAYAR);
						$('#<?= $this->namatabel ?>_PAJAKPERIKSA').val(respon.<?= $this->namatabel ?>_PAJAKPERIKSA);
						$('#<?= $this->namatabel ?>_BUNGAKRGBAYAR').val(respon.<?= $this->namatabel ?>_BUNGAKRGBAYAR);
						$('#<?= $this->namatabel ?>_KENAIKANKRGBAYAR').val(respon.<?= $this->namatabel ?>_KENAIKANKRGBAYAR);
						$('#<?= $this->namatabel ?>_DENDAKRGBAYAR').val(respon.<?= $this->namatabel ?>_DENDAKRGBAYAR);
						$('#KB_<?= $this->namatabel ?>_RUPIAHKRGBAYAR').val(respon.<?= $this->namatabel ?>_RUPIAHKRGBAYAR);
						$('#<?= $this->namatabel ?>_TOTALANGSUR').val(respon.<?= $this->namatabel ?>_POKOKTAMBAHAN);
						$('#<?= $this->namatabel ?>_BUNGATAMBAHAN').val(respon.<?= $this->namatabel ?>_BUNGATAMBAHAN);

						$('#<?= $this->namatabel ?>_BLNKBAWAL').select2('val',respon.<?= $this->namatabel ?>_BLNKBAWAL);
						$('#<?= $this->namatabel ?>_BLNKBAKHIR').val(respon.<?= $this->namatabel ?>_BLNKBAKHIR);
						$('#<?= $this->namatabel ?>_NOMORPERIKSA').val(respon.<?= $this->namatabel ?>_NOMORPERIKSA);
						$('#<?= $this->namatabel ?>_TGLKURANGBAYAR').val(respon.<?= $this->namatabel ?>_TGLKURANGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNKURANGBAYAR +'-20'+respon.<?= $this->namatabel ?>_THNKURANGBAYAR);
						$('#<?= $this->namatabel ?>_TGLKURANGBAYAR2').val(respon.<?= $this->namatabel ?>_TGLKURANGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNKURANGBAYAR +'-20'+respon.<?= $this->namatabel ?>_THNKURANGBAYAR);
						$('#<?= $this->namatabel ?>_TGLBTSKRGBAYAR').val(respon.<?= $this->namatabel ?>_TGLBTSKRGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNBTSKRGBAYAR +'-20'+ respon.<?= $this->namatabel ?>_THNBTSKRGBAYAR);
						$('#TGLENTRI').val('<?= date('d-m-Y') ?>');
						window.BULAN_DENDA = 0;
						window.PERSEN_DENDA = 0;

						$('#<?= $this->namatabel ?>_REGSURATANGSUR').val(respon.<?= $this->namatabel ?>_REGSURATANGSUR);
						$('#<?= $this->namatabel ?>_TGLSURATANGSUR').val(respon.<?= $this->namatabel ?>_TGLSURATANGSUR);
						$('#<?= $this->namatabel ?>_TGLBATAS').val(respon.<?= $this->namatabel ?>_TGLSURATANGSUR);
						$('#<?= $this->namatabel ?>_JUMLAHANGSUR').val(respon.<?= $this->namatabel ?>_JUMLAHANGSUR);

						$('#btnsimpan').attr('disabled',1);

						setTimeout(function() {
							// hitungtotal();
							setTimeout(function() {
								hitungAngsuran();
							}, 1000);
						}, 500);

						if (respon.cekAngsurSetor=="ada") {
							$('#footer-hotel').hide('fast');
							// notifikasi('Informasi', 'Angsuran sudah pernah setor, data tidak bisa diubah.', 'failed', 1,0);
							$.SmartMessageBox({
								title : 'Informasi', // judul Smart Alert
								content : 'Angsuran sudah pernah setor, data tidak bisa diubah.', // konten dari smart alert
								buttons : '[Baik]' // pengaturan tombol
							}, function(ButtonPressed) {

							});
						} else {
							$('#footer-hotel').show('fast');
							// $('#btnsimpan').removeAttr('disabled',1);
							// notifikasi('Informasi', 'Angsuran sudah dibuat.', 'failed', 1,0);
							$.SmartMessageBox({
								title : 'Informasi', // judul Smart Alert
								content : 'Angsuran sudah dibuat.', // konten dari smart alert
								buttons : '[Hapus][Lihat]' // pengaturan tombol
							}, function(ButtonPressed) {
								if (ButtonPressed=='Hapus') {
									$.SmartMessageBox({
										title : 'Konfirmasi', // judul Smart Alert
										content : 'Apakah anda yakin akan menghapus angsuran sudah dibuat?', // konten dari smart alert
										buttons : '[Ya][Batal]' // pengaturan tombol
									}, function(ButtonPressed) {
										if (ButtonPressed=='Ya') {
											$.ajax({
												url: '<?php echo $this->modul_url ?>/hapus',
												type: 'POST',
												dataType: 'json',
												data: $("#form_angsuran_pajakhotel").serialize()+'&id='+window.idSurat+'&idObyek='+window.idObyek+'&cmd='+window.cmd+"&tblketetapanangsuran="+tblketetapanangsuran+"&totalkb="+window.totalkb,
											})
											.done(function(respon) {
												if (respon.status=='success') {
													notifikasi('Berhasil', 'Angsuran berhasil dibatalkan', 'success', 1, 1);
												}
											})
											.fail(function() {
												console.log("error");
											})
											.always(function() {
												console.log("complete");
											});
											
										}
									});
								} else {
									
								}
							});
						}

						setPriceFormat();

					} 
				} else {


					notifikasi('Informasi', 'Kurang Bayar Belum Terdaftar', 'failed', 1,0);

					/*$('#<?= $this->namatabel ?>_BLNKBAWAL').select2('val',respon.AWAL_PAJAK);
					$('#<?= $this->namatabel ?>_BLNKBAKHIR').select2('val',$('#TBLPENDATAAN_BLNPAJAK').val());
					$('#TBLDAFTAR_BADANUSAHANAMA').html(respon.TBLDAFTAR_BADANUSAHANAMA);
					$('#TBLDAFTAR_BADANUSAHAALAMAT').html(respon.TBLDAFTAR_BADANUSAHAALAMAT);

					$('#TBLDAFTAR_NPWPD').html(respon.TBLDAFTAR_JENISPENDAPATAN +'.'+ respon.TBLDAFTAR_GOLONGAN +'.'+ respon.TBLDAFTAR_NOPOK +'.'+ respon.TBLKECAMATAN_IDBADANUSAHA +'.'+ respon.TBLKELURAHAN_IDBADANUSAHA);

					$('#nama_subrekening').val(respon.TREKENING_NAMA);
					$('#no_subrek').select2('val',respon.REKENING_KODE);
					$('#hit_jumlahhari').val(respon.JUMLAH_HARI);
					$('#form_perhitungan').show('fast');
					$('#form_dokumentasi_tanggal').show('fast');
					$('#persen_pajak').val(respon.TREKENING_TARIF);
					$('#kecamatan_pajak').val(respon.TBLKECAMATAN_ID);
					$('#kelurahan_pajak').val(respon.TBLKELURAHAN_ID);
					$('#tarif_rekening').val(respon.TREKENING_TARIF);
					$('#res_jumlah_pajak_tetap_wp').val(respon.<?= $this->namatabel ?>_PAJAK);
					$('#res_jumlah_pajak_setor_wp').val(respon.<?= $this->namatabel ?>_PAJAK);
					$('#<?= $this->namatabel ?>_REGKURANGBAYAR').val(respon.<?= $this->namatabel ?>_REGKURANGBAYAR);
					$('#<?= $this->namatabel ?>_PAJAKPERIKSA').val(respon.<?= $this->namatabel ?>_PAJAKPERIKSA);
					$('#<?= $this->namatabel ?>_BUNGAKRGBAYAR').val(respon.<?= $this->namatabel ?>_BUNGAKRGBAYAR);
					$('#<?= $this->namatabel ?>_KENAIKANKRGBAYAR').val(respon.<?= $this->namatabel ?>_KENAIKANKRGBAYAR);
					$('#<?= $this->namatabel ?>_DENDAKRGBAYAR').val(respon.<?= $this->namatabel ?>_DENDAKRGBAYAR);
					$('#KB_<?= $this->namatabel ?>_RUPIAHKRGBAYAR').val(respon.<?= $this->namatabel ?>_RUPIAHKRGBAYAR);
					$('#<?= $this->namatabel ?>_BLNKBAWAL').select2('val',respon.<?= $this->namatabel ?>_BLNKBAWAL);
					$('#<?= $this->namatabel ?>_BLNKBAKHIR').val(respon.<?= $this->namatabel ?>_BLNKBAKHIR);
					$('#<?= $this->namatabel ?>_NOMORPERIKSA').val(respon.<?= $this->namatabel ?>_NOMORPERIKSA);
					$('#<?= $this->namatabel ?>_TGLKURANGBAYAR').val(respon.<?= $this->namatabel ?>_TGLKURANGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNKURANGBAYAR +'-20'+respon.<?= $this->namatabel ?>_THNKURANGBAYAR);
					$('#<?= $this->namatabel ?>_TGLKURANGBAYAR2').val(respon.<?= $this->namatabel ?>_TGLKURANGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNKURANGBAYAR +'-20'+respon.<?= $this->namatabel ?>_THNKURANGBAYAR);
					$('#<?= $this->namatabel ?>_TGLBTSKRGBAYAR').val(respon.<?= $this->namatabel ?>_TGLBTSKRGBAYAR +'-'+ respon.<?= $this->namatabel ?>_BLNBTSKRGBAYAR +'-20'+ respon.<?= $this->namatabel ?>_THNBTSKRGBAYAR);
					$('#TGLENTRI').val('<?= date('d-m-Y') ?>');
					window.BULAN_DENDA = respon.BULAN_DENDA;
					window.PERSEN_DENDA = respon.PERSEN_DENDA;
					$('#footer-hotel').show('fast');
					setPriceFormat();*/

				}

				
			}
		});
	}

	function listDetail() {
		total_pokok = 0;
		total_bunga = 0;
		pokokdanbunga = 0;
		total_tarifangsur = 0;
		$("#_listDetail_").html("");

		tblketetapanangsuran = localStorage.getItem("tblketetapanangsuran");//Retrieve the stored data
		tblketetapanangsuran = JSON.parse(tblketetapanangsuran); //Converts string to object

		angsurke = 1;
		for(var i in tblketetapanangsuran){
			var rs = (tblketetapanangsuran[i]);
			total_bunga += Number( (rs.bungaangsur) );
			pokokdanbunga = Number( (rs.bungaangsur) ) + Number( (rs.pokokangsur) );
			total_tarifangsur += Number( (pokokdanbunga) );
			$("#_listDetail_").append(
					/*<tr>
						<td>Angsuran ke</td>
						<td>TGL Batas Bayar</td>
						<td>Pokok Angsur</td>
						<td>Bunga Dasar</td>
						<td>Angsuran</td>
				</tr>*/
				'<tr>'
					+'<td>'+rs.ke+'</td>'
					+'<td>'+rs.ke+'</td>'
					+'<td>'+rs.thnjatuhtempoangsur+'</td>'
					+'<td>'+rs.blnjatuhtempoangsur+'</td>'
					+'<td>'+rs.tgljatuhtempoangsur+'</td>'
					+'<td><div align="right">'+formatRibuan( Number((rs.pokokangsur) )) +'</div></td>'
					+'<td><div align="right">'+formatRibuan( Number((rs.bungaangsur) )) +'</div></td>'
					+'<td><div align="right">'+formatRibuan( Number(pokokdanbunga )) +'</div></td>'
				+'</tr>'
			);
		}
		$(".dtl_tblsuratperjanjianangsuran_tarifbunga").html( formatRibuan(total_bunga) ).val( formatRibuan(total_bunga) );
		$(".dtl_tblsuratperjanjianangsuran_totalangsuran").html( formatRibuan(total_tarifangsur) ).val( formatRibuan(total_tarifangsur) );

		i++;
		setPriceFormat();
	}

	$("#btnHitungAngsur").click(function(event) {
		hitungAngsuran();
	});

	function hitungAngsuran() {
		tabeldetail = [];
		byterhutangsekarang = byterhutang = Number( toAngka( $("#<?= $this->namatabel ?>_TOTALANGSUR").val() ) );
		kaliangsur = parseInt( $("#<?= $this->namatabel ?>_JUMLAHANGSUR").val() );
		totalangs = toAngka($("#KB_<?= $this->namatabel ?>_RUPIAHKRGBAYAR").val() );
		tglangsurawal = $("#<?= $this->namatabel ?>_TGLBATAS").val();
		tglangsaw = $("#<?= $this->namatabel ?>_TGLBATAS").val().split('-');
		for (var i = 0; i <= kaliangsur-1; i++) {
			bulandpn = moment(TGLIDTOINT(tglangsurawal)).add(i,'month');
			sisa = (byterhutang % kaliangsur);
			// pokokangsur = kaliangsur;
			pokokangsur = ((byterhutang-sisa) / kaliangsur);
			if (i==kaliangsur-1) {
				pokokangsur += sisa;
			}
			<?php // bungaangsur = ceiling( (byterhutangsekarang * 0.02) ,1 ); ?>
			// bungaangsur = ceiling(parseFloat(byterhutangsekarang * 0.02).toFixed(1),1);
			bungaangsur = Math.floor(parseFloat(byterhutangsekarang * 0.02).toFixed(1),1);
			totalangsur = totalangs
			// tarifangsur = (bungaangsur + pokokangsur);
			tarifangsur = (byterhutangsekarang-((i)*pokokangsur))*(2/100);
			tarifangsur = Math.floor(tarifangsur);

			if (i==0) {
				tarifangsur = 0;
			}

			// totalang = ( tarifangsur + (byterhutangsekarang/12) );
			// byterhutangsekarang = ( i * (2/100) * byterhutangsekarang );
			rs = {
				"ke" : i+1
				,"tgljatuhtempoangsur" : moment(bulandpn).format("D")
				,"blnjatuhtempoangsur" : moment(bulandpn).format("M")
				,"thnjatuhtempoangsur" : moment(bulandpn).format("Y")
				// ,"pokokangsur" : totalangsur
				,"pokokangsur" : pokokangsur
				,"rpskp" : byterhutangsekarang
				,"bungaangsur" : tarifangsur
				// ,"totalang" : totalang
			};
			tabeldetail.push( rs );
		}
		localStorage["tblketetapanangsuran"] = JSON.stringify( tabeldetail );
		listDetail();
	}

	function simpan() {
		tblketetapanangsuran = localStorage["tblketetapanangsuran"];
		$.ajax({
			url: '<?php echo $this->modul_url ?>/simpan',
			type: 'post',
			dataType: 'json',
			data:  $("#form_angsuran_pajakhotel").serialize()+'&id='+window.idSurat+'&idObyek='+window.idObyek+'&cmd='+window.cmd+"&tblketetapanangsuran="+tblketetapanangsuran+"&totalkb="+window.totalkb,
			success: function(respon) {
				if (respon.status=="success") {
					$("#modul-form").modal("hide");
					$('#btnsimpan').attr('disabled',1);
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					loadDataTable();
					tblketetapanangsuran = [];
					localStorage.setItem("tblketetapanangsuran", JSON.stringify(tblketetapanangsuran));
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});

		return false;
	}

	$("#btnCetakKetetapan").click(function(event) {
		cetakketetapan();
	
	});

	$("#btnCetakPerjanjian").click(function(event) {
		cetakperjanjian();
	});

	function cetakketetapan() {
		tblketetapanangsuran = localStorage["tblketetapanangsuran"];
		var data = $("#form_angsuran_pajakhotel").serialize()+'&id='+window.idSurat+'&idObyek='+window.idObyek+'&cmd='+window.cmd+"&tblketetapanangsuran="+tblketetapanangsuran+"&totalkb="+window.totalkb;
		$("#form_cetakketetapan_data").val(btoa(data));
		$("#form_cetakketetapan").submit();
	}

	function cetakperjanjian() {
		tblketetapanangsuran = localStorage["tblketetapanangsuran"];
		var data2 = $("#form_angsuran_pajakhotel").serialize()+'&id='+window.idSurat+'&idObyek='+window.idObyek+'&cmd='+window.cmd+"&tblketetapanangsuran="+tblketetapanangsuran+"&totalkb="+window.totalkb;
		$("#form_cetakperjanjian_data").val(btoa(data2));
		$("#form_cetakperjanjian").submit();
	}

	function simpanDetailAngsur(id) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/<?php echo $this->modul_url ?>/simpanDetailAngsur',
			type: 'POST',
			dataType: 'json',
			data: {
				tblsuratperjanjianangsuran_id: id
				,tblketetapanangsuran: localStorage.getItem("tblketetapanangsuran")
			},
			success: function(respon) {
				localStorage.setItem("tblketetapanangsuran","[]");
				tblketetapanangsuran = [];
				detailIzinPemohon(window.idpemohon);
			}
		});
	}

	function getNoANG(tahun) {
			$.ajax({
				url: 'penetapan/angsuran_hotel/GetNoANG',
				type: 'POST',
				dataType: 'json',
				data: {
					tahun: tahun
				},
				success: function(respon) {
					if (respon=='') {
						$('#<?= $this->namatabel ?>_REGSURATANGSUR').val(1);
						
					}
					else{
						$('#<?= $this->namatabel ?>_REGSURATANGSUR').val(respon.NOANG);
						}
					}
				
			});
	}

	function TGLIDTOINT(d) {d = d.split('-'); return d[1]+'-'+d[0]+'-'+d[2]; }
	</script>
