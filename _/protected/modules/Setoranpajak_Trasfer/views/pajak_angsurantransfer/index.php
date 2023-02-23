<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Entri Angsuran Pajak</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-angsuran_pajak" 
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
					<span class="widget-icon"> <i class="fa fa-search"></i> </span>
					<h2>Validasi Penyetoran</h2>

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
						
						<form action="" id="form-entri-angsuran" class="smart-form" novalidate>
							<fieldset>

								<div class="row">
									<section class="col col-md-2">
										Tahun
									</section>
									<section class="col col-md-1">
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
										</label>
									</section>
									</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok </p>
									</section>
									<section class="col col-md-4">
										<label class="input">
											<input class="input-sm" type="text" id="nopok" name="nopok">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Setoran Ke</p>
									</section>
									<section class="col col-md-1">
										<label class="input">
											<input class="input-sm" type="text" id="setoranke" name="setoranke">
										</label>
									</section>
									<section class="col col-md-3">
										<button type="button" id="btncari" class="btn btn-sm btn-primary" onclick="cari()">
											Enter
										</button>
									</section>
								</div>

					<div id="form-data-angsuran">				
								<div class="alert alert-block alert-success ng-scope">
									<div class="row">
										<section class="col col-md-2">
											<p>Nama</p>
										</section>
										<section class="col col-md-2">
											<strong><div id="sptnama"></div></strong>
										</section>
										<section class="col col-md-2">
											<p>No Rekening</p>
										</section>
										<section class="col col-md-2">
											<strong><div id="rekening"></div></strong>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">
											<p>Alamat</p>
										</section>
										<section class="col col-md-2">
											<strong><div id="alamat"></div></strong>
										</section>
										<section class="col col-md-2">
											<p>Jenis Pajak</p>
										</section>
										<section class="col col-md-2">
											<strong><div id="jenispajak"></div></strong>
										</section>
									</div>
									<header style="background: #cde0c4;">Ketetapan Angsuran Pajak</header><br>
									<div class="row">
										<section class="col col-md-2">Tanggal SKP-A</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="tglskp" class="datepicker" data-dateformat="dd-mm-yy" id="tglskp" readonly="">
											</label>
										</section>
										<section class="col col-md-1">Batas</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="tglbatas" class="datepicker" data-dateformat="dd-mm-yy" id="tglbatas" readonly="">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Nomor Kohir</section>
										<section class="col col-md-5">
											<input class="form-control" disabled="disabled" type="text" id="kohir">
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Jumlah Pajak</section>
										<section class="col col-md-5">
											<label for="address" class="input">
												<input class="format-rupiah" disabled="disabled" type="text" id="pajak">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Tanggal Setor</b></section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" disabled="" name="tglsetor" value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" id="tglsetor">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Jumlah Angsuran</b></section>
										<section class="col col-md-5">
											<label for="address" class="input">
												<input class="form-control format-rupiah disabled" readonly="readonly" type="text" id="angsuran" name="angsuran">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Bunga</section>
										<section class="col col-md-5">
											<label for="address" class="input">
												<input class="format-rupiah disabled" readonly="readonly" type="text" id="bunga" name="bunga">
											</label>
										</section>
										<section class="col col-md-1">
										<p>Transfer Tanpa Bunga</p>
									</section>
									<section class="col col-md-2">
										<label class="checkbox pull-left">
											<input type="checkbox" id="tanpa_bunga" name="tanpa_bunga">
											<i></i>
										</label>
									</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Jumlah Pokok</b></section>
										<section class="col col-md-5">
											<label for="address" class="input">
												<input class="format-rupiah" type="text" name="pokok" id="pokok" readonly="readonly">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Denda</b></section>
										<section class="col col-md-5">
											<label for="address" class="input">
												<input type="text" name="denda" id="denda" readonly="readonly">
											</label>
										</section>
									</div>
									<div class="row" style="display: none;">
										<section class="col col-md-2"><b>Faktor Denda</b></section>
										<section class="col col-md-5">
											<label for="address" class="input">
												<input type="text" name="faktordenda" id="faktordenda" readonly="readonly">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2"><b>Total Setoran</b></section>
										<section class="col col-md-5">
											<label for="address" class="input">
												<input class="format-rupiah" type="text" name="setoran" id="setoran" readonly="readonly">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">Nomor Setoran</section>
										<section class="col col-md-2">
											<label for="address" class="input">
												<input type="text" name="nosetoran" id="nosetoran">
											</label>
										</section>
										<section class="col col-md-1">TGL Hitung Denda</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="tglhitungdenda" class="datepicker" data-dateformat="dd-mm-yy" id="tglhitungdenda">
											</label>
										</section>
									</div>
									<div class="row">
										<section class="col col-md-2">TGL Entry SPPD</section>
										<section class="col col-md-2">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" value="<?= date('d-m-Y') ?>" name="tglentry" class="datepicker"  data-dateformat="dd-mm-yy" id="tglentry">
											</label>
										</section>
										<section class="col col-md-4">
											<button type="button" id="btnCetakSSPD" class="btn btn-default btn-sm" onclick="cetakSSPD()"><i class="fa fa-print"></i> Cetak Ulang SSPD</button>
										</section>
									</div>
									<input type="hidden" id="TBLKECAMATAN_ID" name="TBLKECAMATAN_ID">
									<input type="hidden" id="TBLKELURAHAN_ID" name="TBLKELURAHAN_ID">
									<input type="hidden" id="TBLDAFTAR_JNSPENDAPATAN" name="TBLDAFTAR_JNSPENDAPATAN">
									<input type="hidden" id="TBLREKENING_REKURUSAN" name="TBLREKENING_REKURUSAN">
									<input type="hidden" id="TBLREKENING_REKPEMERINTAHAN" name="TBLREKENING_REKPEMERINTAHAN">
									<input type="hidden" id="TBLREKENING_REKORGANISASI" name="TBLREKENING_REKORGANISASI">
									<input type="hidden" id="TBLREKENING_REKPROGRAM" name="TBLREKENING_REKPROGRAM">
									<input type="hidden" id="TBLREKENING_REKKEGIATAN" name="TBLREKENING_REKKEGIATAN">
									<input type="hidden" id="TBLREKENING_REKDINAS" name="TBLREKENING_REKDINAS">
									<input type="hidden" id="TBLREKENING_REKBIDANG" name="TBLREKENING_REKBIDANG">
									<input type="hidden" id="TBLREKENING_REKPENDAPATAN" name="TBLREKENING_REKPENDAPATAN">
									<input type="hidden" id="TBLREKENING_REKPAD" name="TBLREKENING_REKPAD">
									<input type="hidden" id="TBLREKENING_REKPAJAK" name="TBLREKENING_REKPAJAK">
									<input type="hidden" id="TBLREKENING_REKAYAT" name="TBLREKENING_REKAYAT">
									<input type="hidden" id="TBLREKENING_REKJENIS" name="TBLREKENING_REKJENIS">
									<input type="hidden" id="TBLREKENING_REKSUBJENIS" name="TBLREKENING_REKSUBJENIS">
									<input type="hidden" id="TBLANGSURAN_GOLONGAN" name="TBLANGSURAN_GOLONGAN">
									<input type="hidden" id="TBLANGSURAN_TGLAWALKETETAPAN" name="TBLANGSURAN_TGLAWALKETETAPAN">
									<input type="hidden" id="TBLANGSURAN_THNBATASKETETAPAN" name="TBLANGSURAN_THNBATASKETETAPAN">
									<input type="hidden" id="TBLANGSURAN_BLNBATASKETETAPAN" name="TBLANGSURAN_BLNBATASKETETAPAN">
								</div>
					</div>			
							</fieldset>		
							<footer id="footer_simpandata">
								<button type="button" id="btnSimpan" class="btn btn-sm btn-primary" onclick="simpan()">
									Simpan
								</button>
								<button class="btn btn-sm btn-default">
									Batal
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
	<!-- end row -->

</section>
<br>

<script type="text/javascript">
	pageSetUp();

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPHotel();
	});

	function generateAutocompleteWPHotel() {
		$('#nopok').autocomplete({
			serviceUrl: 'pendaftaran/ubah_data/autocompletewp',

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

	$("#tglhitungdenda").change(function(event) {
			hitungDenda();
			totalSetor();
		});
	$("#tglentri").change(function(event) {
			$("#tglsetor").val($("#tglentri"));
		});

	function cari () {
		$('#bunga').val('');
		$.ajax({
			url: 'Setoranpajak_Trasfer/pajak_angsurantransfer/getdata',
			type: 'POST',
			dataType: 'json',
			data: {
				tahun : $('#tahun').val(),
				bln : $('#bln').val(),
				nopok : $('#nopok').val(),
				setoranke : $('#setoranke').val(),
			},
			success:function (respon) {
				if (respon.data==false) {
					notifikasi('Informasi', 'Referensi Tidak Ditemukan', 'fail', 1,0);
				} else if (respon.validasi=='sudahsetor') {
					notifikasi('Informasi', 'Data SSPD Angsuran Sudah Pernah diinputkan...!!!', 'fail', 1,0);
					$('#form-data-angsuran').show();
					$('#footer_simpandata').hide();
					$('#btnCetakSSPD').show();
					

					$('#sptnama').html(respon.datadariseto.TBLANGSURAN_NAMABADANUSAHA);
					$('#alamat').html(respon.datadariseto.TBLANGSURAN_ALAMATBADANUSAHA);
					$('#rekening').html(respon.datadariseto.TBLREKENING_KODEFULL);
					$('#jenispajak').html(respon.datadariseto.TBLREKENING_NAMAREKENING);
					$('#tglskp').val( respon.datadariseto.TBLANGSURAN_TGLKETETAPAN +'-'+ respon.datadariseto.TBLANGSURAN_BLNKETETAPAN +'-'+'20'+respon.datadariseto.TBLANGSURAN_THNKETETAPAN );
					$('#tglbatas').val( respon.datadariseto.TBLANGSURAN_TGLBATASKETETAPAN +'-'+respon.datadariseto.TBLANGSURAN_BLNBATASKETETAPAN+'-'+'20'+respon.datadariseto.TBLANGSURAN_THNBATASKETETAPAN );
					$('#pajak').val(respon.datadariseto.TBLANGSURAN_KETETAPANTOTAL);
					// $('#tglsetor').val(respon.datadariseto.TBLANGSURAN_KETETAPANPAJAK);
					$('#angsuran').val(respon.datadariseto.TBLANGSURAN_ANGSURAN);
					$('#bunga').val(respon.datadariseto.TBLANGSURAN_BUNGAANGSURAN);
					$('#denda').val(toRp(respon.datadariseto.TBLSETOR_DENDAKETETAPAN));
					$('#nosetoran').val(respon.datadariseto.NOMORSSPD);
					$('#TBLKECAMATAN_ID').val(respon.datadariseto.TBLKECAMATAN_ID);
					$('#TBLKELURAHAN_ID').val(respon.datadariseto.TBLKELURAHAN_ID);
					$('#TBLDAFTAR_JNSPENDAPATAN').val(respon.datadariseto.TBLDAFTAR_JNSPENDAPATAN);
					$('#TBLREKENING_REKURUSAN').val(respon.datadariseto.TBLREKENING_REKURUSAN);
					$('#TBLREKENING_REKPEMERINTAHAN').val(respon.datadariseto.TBLREKENING_REKPEMERINTAHAN);
					$('#TBLREKENING_REKORGANISASI').val(respon.datadariseto.TBLREKENING_REKORGANISASI);
					$('#TBLREKENING_REKPROGRAM').val(respon.datadariseto.TBLREKENING_REKPROGRAM);
					$('#TBLREKENING_REKKEGIATAN').val(respon.datadariseto.TBLREKENING_REKKEGIATAN);
					$('#TBLREKENING_REKDINAS').val(respon.datadariseto.TBLREKENING_REKDINAS);
					$('#TBLREKENING_REKBIDANG').val(respon.datadariseto.TBLREKENING_REKBIDANG);
					$('#TBLREKENING_REKPENDAPATAN').val(respon.datadariseto.TBLREKENING_REKPENDAPATAN);
					$('#TBLREKENING_REKPAD').val(respon.datadariseto.TBLREKENING_REKPAD);
					$('#TBLREKENING_REKPAJAK').val(respon.datadariseto.TBLREKENING_REKPAJAK);
					$('#TBLREKENING_REKAYAT').val(respon.datadariseto.TBLREKENING_REKAYAT);
					$('#TBLREKENING_REKJENIS').val(respon.datadariseto.TBLREKENING_REKJENIS);
					$('#TBLREKENING_REKSUBJENIS').val(respon.datadariseto.TBLREKENING_REKSUBJENIS);
					$('#TBLANGSURAN_GOLONGAN').val(respon.datadariseto.TBLANGSURAN_GOLONGAN);
					$('#TBLANGSURAN_TGLAWALKETETAPAN').val(respon.datadariseto.TBLANGSURAN_TGLAWALKETETAPAN);
					$('#TBLANGSURAN_THNBATASKETETAPAN').val(respon.datadariseto.TBLANGSURAN_THNBATASKETETAPAN);
					$('#TBLANGSURAN_BLNBATASKETETAPAN').val(respon.datadariseto.TBLANGSURAN_BLNBATASKETETAPAN);

					setTimeout(function() {
						hitungJumlahPokok();
					}, 100);


					setTimeout(function() {
						totalSetor();
					}, 102);

					setPriceFormat();

					$("#btncari").click(function() {
					    $('html, body').animate({
					        scrollTop: $("#btnCetakSSPD").offset().top
					    }, 1000);
					});

				} else if (respon.validasi=='belumsetor') {
					$('#form-data-angsuran').show();
					$('#footer_simpandata').show();
					$('#btnCetakSSPD').hide();

					$('#sptnama').html(respon.data.TBLANGSURAN_NAMABADANUSAHA);
					$('#alamat').html(respon.data.TBLANGSURAN_ALAMATBADANUSAHA);
					$('#rekening').html(respon.data.TBLREKENING_KODEFULL);
					$('#jenispajak').html(respon.data.TBLREKENING_NAMAREKENING);
					$('#tglskp').val( respon.data.TBLANGSURAN_TGLKETETAPAN +'-'+ respon.data.TBLANGSURAN_BLNKETETAPAN +'-'+'20'+respon.data.TBLANGSURAN_THNKETETAPAN );
					$('#tglbatas').val( respon.data.TBLANGSURAN_TGLBATASKETETAPAN +'-'+respon.data.TBLANGSURAN_BLNBATASKETETAPAN+'-'+'20'+respon.data.TBLANGSURAN_THNBATASKETETAPAN );
					$('#pajak').val(respon.data.TBLANGSURAN_KETETAPANTOTAL);
					// $('#tglsetor').val(respon.data.TBLANGSURAN_KETETAPANPAJAK);
					$('#angsuran').val(respon.data.TBLANGSURAN_ANGSURAN);
					$('#bunga').val(respon.data.BUNGANEW);
					$('#faktordenda').val(respon.data.TBLANGSURAN_BEBASDND);
					window.bunga_hitung=respon.data.BUNGANEW;
					$('#nosetoran').val('');
					$('#TBLKECAMATAN_ID').val(respon.data.TBLKECAMATAN_ID);
					$('#TBLKELURAHAN_ID').val(respon.data.TBLKELURAHAN_ID);
					$('#TBLDAFTAR_JNSPENDAPATAN').val(respon.data.TBLDAFTAR_JNSPENDAPATAN);
					$('#TBLREKENING_REKURUSAN').val(respon.data.TBLREKENING_REKURUSAN);
					$('#TBLREKENING_REKPEMERINTAHAN').val(respon.data.TBLREKENING_REKPEMERINTAHAN);
					$('#TBLREKENING_REKORGANISASI').val(respon.data.TBLREKENING_REKORGANISASI);
					$('#TBLREKENING_REKPROGRAM').val(respon.data.TBLREKENING_REKPROGRAM);
					$('#TBLREKENING_REKKEGIATAN').val(respon.data.TBLREKENING_REKKEGIATAN);
					$('#TBLREKENING_REKDINAS').val(respon.data.TBLREKENING_REKDINAS);
					$('#TBLREKENING_REKBIDANG').val(respon.data.TBLREKENING_REKBIDANG);
					$('#TBLREKENING_REKPENDAPATAN').val(respon.data.TBLREKENING_REKPENDAPATAN);
					$('#TBLREKENING_REKPAD').val(respon.data.TBLREKENING_REKPAD);
					$('#TBLREKENING_REKPAJAK').val(respon.data.TBLREKENING_REKPAJAK);
					$('#TBLREKENING_REKAYAT').val(respon.data.TBLREKENING_REKAYAT);
					$('#TBLREKENING_REKJENIS').val(respon.data.TBLREKENING_REKJENIS);
					$('#TBLREKENING_REKSUBJENIS').val(respon.data.TBLREKENING_REKSUBJENIS);
					$('#TBLANGSURAN_GOLONGAN').val(respon.data.TBLANGSURAN_GOLONGAN);
					$('#TBLANGSURAN_TGLAWALKETETAPAN').val(respon.data.TBLANGSURAN_TGLAWALKETETAPAN);
					$('#TBLANGSURAN_THNBATASKETETAPAN').val(respon.data.TBLANGSURAN_THNBATASKETETAPAN);
					$('#TBLANGSURAN_BLNBATASKETETAPAN').val(respon.data.TBLANGSURAN_BLNBATASKETETAPAN);

					setTimeout(function() {
						hitungJumlahPokok();
					}, 100);

					setTimeout(function() {
						hitungDenda();
					}, 101);

					setTimeout(function() {
						totalSetor();
					}, 102);

					// $("#btncari").click(function() {
					//     $('html, body').animate({
					//         scrollTop: $("#btnSimpan").offset().top
					//     }, 1000);
					// });

					setPriceFormat();
				}
			}
		});
	}

	$("#tanpa_bunga").click(function(event) {
		// setTimeout(function() {
						hitungJumlahPokok();
					// }, 100);
		// setTimeout(function() {
						hitungDenda();
					// }, 101);
		// setTimeout(function() {
						totalSetor();
					// }, 102);
	});

	function hitungJumlahPokok() {
		var angsuran = Number(toAngka($('#angsuran').val()));
		var bunga_ = Number(toAngka($('#bunga').val()));

		if ($('#tanpa_bunga').is(':checked')) {
			bunga = 0;
		} else {
			bunga = Number(toAngka(window.bunga_hitung));
		}

		jumlahpokok = angsuran+bunga;
		// console.log(jumlahpokok);
		
		$('#pokok').val(toRp(jumlahpokok));
		$('#bunga').val(toRp(bunga));
	}

	function hitungDenda() {

		tglbts = $('#tglbatas').val();
		tglhitdenda = $('#tglhitungdenda').val();
		faktordnd = $('#faktordenda').val();
		pokok = Number(toAngka($('#pokok').val()));

		var parts = tglbts.split("-");

		dd = parts[0]; 
		mm = parts[1]; 
		yyyy = parts[2];

		tglbatas = yyyy+'-'+mm+'-'+dd;

		var parts = tglhitdenda.split("-");

		dd = parts[0]; 
		mm = parts[1]; 
		yyyy = parts[2];

		tglhitungdenda = yyyy+'-'+mm+'-'+dd;

		jmlbulandenda = getBulanDenda(tglbatas,tglhitungdenda);

		if (jmlbulandenda>24) {
	      jmlbulandenda = 24;
	    } else {
	      jmlbulandenda = jmlbulandenda;
	    }
		
		faktorpengurang = ((pokok*jmlbulandenda*2/100)*faktordnd/100);
		
		denda = pokok*jmlbulandenda*2/100;

		totaldenda = denda-faktorpengurang;

		$('#denda').val(toRp(totaldenda));
	}

	function totalSetor() {
		pokok = Number(toAngka($('#pokok').val()));
		denda = Number(toAngka($('#denda').val()));

		totalsetor = pokok + denda;

		$('#setoran').val(toRp(totalsetor));
	}

	function cetakSSPD() {
		var param = {
			TBLDAFTAR_NOPOK: btoa(btoa($("#nopok").val()))
			,TBLPENDATAAN_THNPAJAK: btoa(btoa($("#tahun").val().substr(-2)))
			,TBLPENDATAAN_BLNPAJAK: btoa(btoa($("#bln").val()))
			,TBLPENDATAAN_TGLPAJAK: btoa(btoa($("#tgl").val()))
			,TBLPENDATAAN_PAJAKKE: btoa(btoa($("#setoranke").val()))
			,DENDA: btoa(btoa($("#denda").val()))
		}
		window.open('Setoranpajak_Trasfer/pajak_angsurantransfer/CetakSSPD/?'+jQuery.param(param));
	}

	function simpan() {
		$.ajax({
			url: 'Setoranpajak_Trasfer/pajak_angsurantransfer/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-entri-angsuran").serialize(),
			success:function (respon) {
				if (respon.pesan=='success') {
					notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1,0);
					$('#form-data-angsuran').hide();
					$('#footer_simpandata').hide();
					$("#btnSimpan").click(function() {
					    $('html, body').animate({
					        scrollTop: $("#btncari").offset().top
					    }, 1000);
					});
					cetakSSPD();

				}else{
					notifikasi('Gagal Simpan', 'Silakan Ulangi Proses Entri', 'fail', 1,0);
					$('#form-data-angsuran').hide();
					$('#footer_simpandata').hide();
				}
			}
		});
		
	}

</script>