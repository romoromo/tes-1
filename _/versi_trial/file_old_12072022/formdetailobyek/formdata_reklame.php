<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div class="widget-body">
			<ul id="myTabReklame" class="nav nav-tabs bordered">
				<li class="active">
					<a href="#tabrek1" onclick="$('#footer_reklame').show();" data-toggle="tab">Pendataan Reklame</a>
				</li>
				<li>
					<a id="link_tabrek2" href="#tabrek2" onclick="$('#div_tabrek2').show();$('#footer_reklame').hide();setTabPerhitungan();" data-toggle="tab"> Perhitungan Reklame</a>
				</li>
			</ul>
			<div id="myTabReklameContent" class="tab-content padding-10">
				<div class="tab-pane fade in active" id="tabrek1">
					<div class="row">
						<section class="col col-6" style="border-right: 1px solid #000;">
							<div class="row" >
								<div class="col col-10">
									<label for="label" class="input">Tahun Pajak</label>
									<label class="select">
										<select name="param[tbltransaksiketetapan_tahunpajak]" class="select2" id="tbltransaksiketetapan_tahunpajak">
											<option selected="" value="">=== Pilih Tahun Pajak ====</option>
											<?php error_reporting(-1); $data['listtahun'] = Tahun::model()->findAll(); ?>
											<?php foreach ($data['listtahun'] as $tahun): ?>
												<option value="<?= $tahun['reftahun_nama'] ?>"><?= $tahun['reftahun_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</div>
								<div class="col col-4">
									<br>
									<label for="label" class="input">Kode Lokasi</label>
									<label class="input">
										<input type="hidden" name="param[tbltransaksiketetapan_bulanpajak]" id="tbltransaksiketetapan_bulanpajak" value="0" />
										<input type="text" name="param[tblpendataanreklame_kodelokasi]" id="tblpendataanreklame_kodelokasi" placeholder="Kode Lokasi" maxlength="4" />
										<i class="icon-append fa fa-square "></i>
									</label>
								</div>
							</div>

							<br>

							<div style="display:none;" class="row" >
								<div class="col col-6">
									<label for="label" class="input">Masa Pajak Awal</label>
									<label class="input">
										<input class="disabled" readonly="" <?php /*class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaawal]" id="tbltransaksiketetapan_masaawal" placeholder="Masa Awal" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Masa Pajak Akhir</label>
									<label class="input">
										<input class="disabled" readonly="" <?php /*class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaakhir]" id="tbltransaksiketetapan_masaakhir" placeholder="Masa Akhir" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
							</div>

							<br>

							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Tanggal Pendataan</label>
									<label class="input">
										<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiketetapan_tglentrisptpd]" id="tbltransaksiketetapan_tglentrisptpd" placeholder="Tanggal Pendataan" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Tanggal Terima SPT</label>
									<label class="input">
										<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiketetapan_tglterimasptpd]" id="tbltransaksiketetapan_tglterimasptpd" placeholder="Tanggal terima SPT" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-md-12">
									<label for="label" class="input">Cara Perhitungan</label>
									<label class="select">
										<select style="width: 100%" name="param[tbltransaksiketetapan_carapenetapan]" class="select2" id="tbltransaksiketetapan_carapenetapan">
											<option value="Self Assesment">Self Assesment</option>
											<option selected="" value="Official Assesment">Official Assesment</option>
										</select>
									</label>
								</div>
							</div>
						</section>
						<section class="col col-6 pull-right">
							<div class="row" >
								<div class="col col-8">
									<label for="label" class="input">Jenis Reklame</label>
									<table style="width: 100%; table-layout: fixed !important;"><tr><td>
									<label class="select">
										<select name="param[refjenisreklame_id]" class="select2" id="refjenisreklame_id">
											<option selected="" value="">--- Pilih Jenis Reklame ---</option>
											<?php 
											$otherquery = array(
												'join_reftarifreklame'=>array('reftarifreklame','reftarifreklame.refjenisreklame_id = refjenisreklame.refjenisreklame_id')
												,'group'=>'refjenisreklame.refjenisreklame_id'
											);
											$data['listjenisreklame'] = DBFetch::query( array('from'=>'refjenisreklame','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
											<?php foreach ($data['listjenisreklame'] as $reklame): ?>
												<option issemuaukuran="<?= ($reklame['reftarifreklame_batasluasmin']==0 && $reklame['refterifreklame_batasluasmax']==999.00) ? "Semua Ukuran" : "Range" ?>" nilaidasar="<?= $reklame['reftarifreklame_nilaidasar'] ?>" value="<?= $reklame['refjenisreklame_id'] ?>"><?= $reklame['refjenisreklame_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
									</td></tr></table>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-md-12">
									<label for="label" class="input">Judul / Tema</label>
									<label class="textarea textarea-expandable">
										<textarea rows="2" class="" name="param[tblpendataanreklame_judul]" id="tblpendataanreklame_judul" placeholder="Judul / Tema Reklame"></textarea>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-md-12">
									<label for="label" class="input">Lokasi Pemasangan</label>
									<label class="textarea textarea-expandable">
										<textarea rows="3" class="" name="param[tblpendataanreklame_lokasi]" id="tblpendataanreklame_lokasi" placeholder="Lokasi Pemasangan"></textarea>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Ukuran Panjang</label>
									<label class="input">
										<div class="input-group state-success">
											<input value="" type="text" name="param[tblpendataanreklame_panjang]" id="tblpendataanreklame_panjang" placeholder="Ukuran Panjang">
											<span class="input-group-addon">M</span>
										</div>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Ukuran Lebar</label>
									<label class="input">
										<div class="input-group state-success">
											<input value="" type="text" name="param[tblpendataanreklame_lebar]" id="tblpendataanreklame_lebar" placeholder="Ukuran Lebar">
											<span class="input-group-addon">M</span>
										</div>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Ukuran Luas</label>
									<label class="input">
										<div class="input-group state-success">
											<input readonly="" class="disabled" value="" type="text" name="param[tblpendataanreklame_luas]" id="tblpendataanreklame_luas" placeholder="Ukuran Luas">
											<span class="input-group-addon">M2</span>
										</div>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Ukuran Sisi</label>
									<label class="input">
										<div class="input-group state-success">
											<input value="1" type="text" name="param[tblpendataanreklame_sisi]" id="tblpendataanreklame_sisi" placeholder="Jumlah Sisi">
											<span class="input-group-addon">sisi</span>
										</div>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-4">
									<label for="label" class="input">Jumlah Reklame</label>
									<label class="input">
										<input value="1" type="text" name="param[tblpendataanreklame_jumlahreklame]" id="tblpendataanreklame_jumlahreklame" placeholder="Jumlah Reklame">
										<i class="icon-append fa fa-square "></i>
									</label>
								</div>
								<div class="col col-8">
									<label for="label" class="input">Harga Dasar</label>
									<label class="input">
										<input readonly="" class="format-rupiah disabled" value="" type="text" name="param[tblpendataanreklame_tarifreklame]" id="tblpendataanreklame_tarifreklame" placeholder="Harga Dasar">
										<i class="icon-append fa fa-money "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Kelas Jalan</label>
									<label class="select">
										<select name="param[tblpendataanreklame_kelasjalan]" class="select2" id="tblpendataanreklame_kelasjalan">
											<option selected="" value="">--- Pilih Kelas Jalan ---</option>
											<option value="I">Kelas I</option>
											<option value="II">Kelas II</option>
										</select>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-8">
									<label for="label" class="input">Nilai Strategis</label>
									<label class="input">
										<input readonly="" class="format-rupiah disabled" value="" type="text" name="param[tblpendataanreklame_kelastarif]" id="tblpendataanreklame_kelastarif" placeholder="Nilai Strategis">
										<i class="icon-append fa fa-money"></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Masa Pasang Awal</label>
									<label class="input">
										<input type="text" name="param[tblpendataanreklame_masaawal]" id="tblpendataanreklame_masaawal" placeholder="Masa Pemasangan Awal" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
								<div class="col col-6">
									<label for="label" class="input">Masa Pasang Akhir</label>
									<label class="input">
										<input type="text" name="param[tblpendataanreklame_masaakhir]" id="tblpendataanreklame_masaakhir" placeholder="Masa Akhir" />
										<i class="icon-append fa fa-calendar "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-6">
									<label for="label" class="input">Jumlah Hari</label>
									<label class="input">
										<div class="input-group">
											<input readonly="" class="disabled" type="text" name="param[tblpendataanreklame_jumlahhari]" id="tblpendataanreklame_jumlahhari" placeholder="Jumlah Hari" />
											<span class="input-group-addon">hari</span>
										</div>
									</label>
								</div>
							</div>
							<br>
							<div style="display: none"  class="row" >
								<div class="col col-8">
									<label for="label" class="input">Besar Omzet</label>
									<label class="input">
										<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_omzettotal]" id="tbltransaksiketetapan_omzettotal" placeholder="Besar Omzet" />
										<i class="icon-append fa fa-money "></i>
									</label>
								</div>
							</div>
							<br>
							<div style="display: none" class="row" >
								<div class="col col-8">
									<label for="label" class="input">Tarif Pajak</label>
									<label class="input">
										<div class="input-group">
											<?php $tarif = ( $rek = MasterRekening::model()->find('tblmasterrekening_kode=:kode', array(':kode'=>$data['rekening_kode'])) ) ? ($rek['tblmasterrekening_tarif'] * 100) : 0;  ?>
											<input readonly="" class="disabled" value="<?= $tarif ?>" type="text" name="param[tbltransaksiketetapan_tarif]" id="tbltransaksiketetapan_tarif" placeholder="Tarif Pajak" />
											<span class="input-group-addon">%</span>
										</div>
									</label>
								</div>
							</div>
							<br>
							<div style="display: none" class="row" >
								<div class="col col-8">
									<label for="label" class="input">Denda</label>
									<label class="input">
										<input class="format-rupiah-desimal" type="text" name="param[tbltransaksiketetapan_rupiahdenda]" id="tbltransaksiketetapan_rupiahdenda" placeholder="Nominal Denda" />
										<i class="icon-append fa fa-money "></i>
									</label>
								</div>
							</div>
							<br>
							<div class="row" >
								<div class="col col-8">
									<label for="label" class="input">Besaran Pajak</label>
									<label class="input">
										<input readonly="" class="format-rupiah-desimal disabled" type="text" name="param[tbltransaksiketetapan_pajak]" id="tbltransaksiketetapan_pajak" placeholder="Nominal Besaran Pajak" />
										<i class="icon-append fa fa-money "></i>
									</label>
								</div>
							</div>
						</section>
					</div>
				</div>
				<div class="tab-pane fade in active" id="tabrek2">
					<div style="display: none;" id="div_tabrek2" class="row">
						<section class="col col-3">
							<label for="label">Nilai Dasar Reklame</label>
							<br>
							<br>
							<br>
							<br>
							<label for="label">Nilai Strategis</label>
							<br>
							<br>
							<br>
							<br>
							<label for="label">Nilai Sewa Reklame</label>
							<br>
							<br>
							<br>
							<br>
							<label for="label">Nominal Pajak Terhutang</label>
						</section>
						<section class="col col-8">
							<div class="row">
								<label for="label">= Panjang x Lebar x Sisi x Harga Dasar x Jumlah Hari</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_panjang"></span> x <span class="tblpendataanreklame_lebar"></span> x <span class="tblpendataanreklame_sisi"></span> x <span class="tblpendataanreklame_tarifreklame"></span> x <span class="tblpendataanreklame_jumlahhari"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaidasar"></span> </label>
							</div>

							<br>

							<div class="row">
								<label for="label">= (Nilai Strategis x Jumlah Reklame x Luas)</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_kelastarif"></span> x <span class="tblpendataanreklame_jumlahreklame"></span> x <span class="tblpendataanreklame_luas"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaistrategis"></span> </label>
							</div>

							<br>

							<div class="row">
								<label for="label">= (Nilai Dasar + Nilai Strategis)</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaidasar"></span> + <span class="tblpendataanreklame_nilaistrategis"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tblpendataanreklame_nilaisewa"></span> </label>
							</div>

							<br>

							<div class="row">
								<label for="label">= (Tarif Pajak x Nilai Sewa Reklame)</label>
							</div>
							<div class="row">
								<label for="label">= <span class="tbltransaksiketetapan_tarif"></span> % x <span class="tblpendataanreklame_nilaisewa"></span> </label>
							</div>
							<div class="row">
								<label for="label">= <span class="tbltransaksiketetapan_pajak"></span> </label>
							</div>
						</section>
					</div>
				</div>
			</div>
			<input type="hidden" id="tblpendataanreklame_nilaidasar" name="param[tblpendataanreklame_nilaidasar]" />
			<input type="hidden" id="tblpendataanreklame_nilaistrategis" name="param[tblpendataanreklame_nilaistrategis]" />
			<input type="hidden" id="tblpendataanreklame_nilaisewa" name="param[tblpendataanreklame_nilaisewa]" />
			
			<?php /*section class="col col-md-6">
				<p style="margin-top: 25px;">
					<em> <i class="fa fa-info-circle"></i> Silahkan Pilih Bidang Usaha</em>
				</p>
			</section*/ ?>
		</div>
	</fieldset>
	<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
	<footer id="footer_reklame">
		<button onclick="" id="btnHitung" class="btn btn-primary" type="submit">
			HITUNG!
		</button>
		<?php $xc = 'btnSimpanHitungx'; ?>
		<button onclick="simpanPendataan()" style="display: none;" btnid="btnSimpanHitung" id="btnSimpanHitung" class="btn btn-primary" type="button">
			SIMPAN PERHITUNGAN
		</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Batal
		</button>
	</footer>
</form>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		setPriceFormat();
		pageSetUp();
		window.nilaidasar = 0;
		window.nilaistrategis = 0;
		window.nilaisewa = 0;
		window.pajak_terhutang = 0;
		$('#tbltransaksiketetapan_carapenetapan').select2("readonly", true);
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
	function setMoment() {
		moment.locale('id');
	}

	$("#tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_tarif, #tbltransaksiketetapan_rupiahdenda").keyup(function(event) {
		hitungPajak();
	});

	$("#tbltransaksiketetapan_tahunpajak, #tbltransaksiketetapan_bulanpajak").change(function(event) {
		setMasaPajak();
	});
	$("#tblpendataanreklame_kodelokasi").change(function(event) {
		setMasaPajak();
	});

	$("#tblpendataanreklame_panjang, #tblpendataanreklame_lebar, #tblpendataanreklame_sisi").keyup(function(event) {
		window.pjg = pjg = !isNaN( p = $("#tblpendataanreklame_panjang").val() ) ? Number(p) : 0;
		window.lbr = lbr = !isNaN( l = $("#tblpendataanreklame_lebar").val() ) ? Number(l) : 0;
		window.sisi_ = sisi_ = !isNaN( ss = $("#tblpendataanreklame_sisi").val() ) ? Number(ss) : 0;
		$("#tblpendataanreklame_luas").val(pjg * lbr);

		getHargaDasar();
	});

	function hitungPajak() {
		var omzet1 = toAngka( $("#tbltransaksiketetapan_omzettotal").val() );
		var tarif = !isNaN( trf = $("#tbltransaksiketetapan_tarif").val() ) ? trf/100 : 0;
		var rupiahdenda = toAngka( $("#tbltransaksiketetapan_rupiahdenda").val() );

		pajak = ((omzet1 * tarif) + Number(rupiahdenda));

		$("#tbltransaksiketetapan_pajak").val(pajak.toFixed(2));
		setPriceFormat();
	}

	function setMasaPajak() {
		$("#tbltransaksiketetapan_masaawal").val('');
		$("#tbltransaksiketetapan_masaakhir").val('');
		thn = $("#tbltransaksiketetapan_tahunpajak").val();
		kodelokasi = $("#tblpendataanreklame_kodelokasi").val();
		if (thn!='' && kodelokasi!='') {
			el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tblpendataanreklame_judul, #tbltransaksiketetapan_pajak, #tblpendataanreklame_lokasi, #tblpendataanreklame_panjang, #tblpendataanreklame_lebar, #tblpendataanreklame_luas, #tblpendataanreklame_sisi, #tblpendataanreklame_jumlahreklame, #tblpendataanreklame_tarifreklame, #tblpendataanreklame_masaawal, #tblpendataanreklame_masaakhir, #tblpendataanreklame_jumlahhari";
			jQuery.each(el.split(', '), function(index, val) {
			  $(val).val($(val)[0].defaultValue);
			});
			window.cmdp = 'tambah';
			window.idtranskttap = 0;
			// masapajak = moment([thn,(bln-1)]);
			// $("#tbltransaksiketetapan_masaawal").val(masapajak.format('L'));
			// $("#tbltransaksiketetapan_masaakhir").val(masapajak.endOf('month').format('L'));

			isSudahPendataan(thn,kodelokasi);
		}
	}

	$("#tblpendataanreklame_masaawal, #tblpendataanreklame_masaakhir").change(function(event) {
		$("#tblpendataanreklame_jumlahhari").val('');
		var aw = $("#tblpendataanreklame_masaawal").val(), 
		ak = $("#tblpendataanreklame_masaakhir").val();
		if (aw!='' && ak!='') {
			awal = moment( aw.split('-').reverse().join('-') );
			akhir = moment( ak.split('-').reverse().join('-') );
			jml = akhir.diff(awal, 'days');
			if (awal==akhir) jml=1;
			$("#tblpendataanreklame_jumlahhari").val( jml );
			getHargaDasar();

			$("#tbltransaksiketetapan_masaawal").val(aw);
			$("#tbltransaksiketetapan_masaakhir").val(ak);
		}
	});
	
	$("#refjenisreklame_id").change(function(event) {
		getHargaDasar();
	});

	function getHargaDasar() {
		$("#tblpendataanreklame_tarifreklame").val( 0 );
		window.nilaistrategiskelas1 = 0;
		window.nilaistrategiskelas2 = 0;

		var refjenisreklame_id = $("#refjenisreklame_id").val();
		luas = !isNaN( l = $("#tblpendataanreklame_luas").val() ) ? l : 0;
		jmlr = !isNaN( jr = $("#tblpendataanreklame_jumlahreklame").val() ) ? jr : 0;
		jmlhr = !isNaN( jhr = $("#tblpendataanreklame_jumlahhari").val() ) ? jhr : 0;

		if(refjenisreklame_id!='' && luas!=''){
			$.post('<?= Yii::app()->getBaseUrl(1) ?>/open_data/get/data/tarif_reklame', {
				refjenisreklame_id: refjenisreklame_id
				,luas: luas
			}, function(respon) {
				if (respon.status=='found') {
					$("#tblpendataanreklame_tarifreklame").val( toAngka(respon.info.reftarifreklame_nilaidasar) );
					window.nilaistrategiskelas1 = respon.info.reftarifreklame_nilaistrategiskelas1;
					window.nilaistrategiskelas2 = respon.info.reftarifreklame_nilaistrategiskelas2;
					
					window.nilaidasar = luas * window.sisi_ * respon.info.reftarifreklame_nilaidasar * jmlhr;
				}
				setPriceFormat();
			},"json");
		}
	}

	$("#tblpendataanreklame_jumlahreklame").keyup(function(event) {
		hitungStrategis();
	});
	$("#tblpendataanreklame_kelasjalan").change(function(event) {
		hitungStrategis();
	});
	function hitungStrategis() {
		if ( $("#tblpendataanreklame_kelasjalan").select2('val')=='I' ) {
			$("#tblpendataanreklame_kelastarif").val( window.nilaistrategiskelas1 );
		} else {
			$("#tblpendataanreklame_kelastarif").val( window.nilaistrategiskelas2 );			
		}
		jmlr = !isNaN( jr = $("#tblpendataanreklame_jumlahreklame").val() ) ? jr : 0;
		window.nilaistrategis = luas * jmlr * $("#tblpendataanreklame_kelastarif").val();
		// console.log('window.nilaistrategis = '+ luas +'(luas)'+ jmlr +'(jmlr)'+ $("#tblpendataanreklame_kelastarif").val() +'($("#tblpendataanreklame_kelastarif").val())');
		setPriceFormat();
	}

	function setTabPerhitungan() {
		$(".tblpendataanreklame_panjang").html( window.pjg );
		$(".tblpendataanreklame_lebar").html( window.lbr );
		$(".tblpendataanreklame_sisi").html( window.sisi_ );
		$(".tblpendataanreklame_tarifreklame").html( $("#tblpendataanreklame_tarifreklame").val() );
		$(".tblpendataanreklame_jumlahhari").html( $("#tblpendataanreklame_jumlahhari").val() );
		/*===*/ $(".tblpendataanreklame_nilaidasar").html( toRp( window.nilaidasar ) );
		/*===*/ $("#tblpendataanreklame_nilaidasar").val( toRp( window.nilaidasar ) );

		$(".tblpendataanreklame_jumlahreklame").html( $("#tblpendataanreklame_jumlahreklame").val() );
		$(".tblpendataanreklame_kelastarif").html( $("#tblpendataanreklame_kelastarif").val() );
		$(".tblpendataanreklame_luas").html( $("#tblpendataanreklame_luas").val() );
		/*===*/ $(".tblpendataanreklame_nilaistrategis").html( toRp( window.nilaistrategis ) );
		/*===*/ $("#tblpendataanreklame_nilaistrategis").val( toRp( window.nilaistrategis ) );

		// $(".tblpendataanreklame_nilaidasar").html();
		// $(".tblpendataanreklame_nilaistrategis").html();
		/*===*/ $(".tblpendataanreklame_nilaisewa").html( toRp(window.nilaisewa = window.nilaidasar + window.nilaistrategis) );
		/*===*/ $("#tblpendataanreklame_nilaisewa").val( toRp(window.nilaisewa = window.nilaidasar + window.nilaistrategis) );

		$(".tbltransaksiketetapan_tarif").html( $("#tbltransaksiketetapan_tarif").val() );
		/*===*/ $(".tbltransaksiketetapan_pajak").html( toRp( window.pajak_terhutang = window.nilaisewa * ($("#tbltransaksiketetapan_tarif").val()/100) ) );
		/*===*/ $("#tbltransaksiketetapan_pajak").val( ( window.pajak_terhutang = window.nilaisewa * ($("#tbltransaksiketetapan_tarif").val()/100) ).toFixed(2) );
		setPriceFormat();
	}

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		jQuery.validator.addMethod("number_ID", function(value, element) {
			// allow any non-whitespace characters as the host part
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
		}, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');

		var $FormDaftar = $("#form-pendataan").validate({
			// Rules for form validation
			rules : {
				"param[tbltransaksiketetapan_tahunpajak]" : {
					required : true
				}
				,"param[tblpendataanreklame_kodelokasi]" : {
					required : true
					,digits : true
				}
				,"param[tbltransaksiketetapan_tglentrisptpd]" : {
					required : true
				}
				,"param[tbltransaksiketetapan_tglterimasptpd]" : {
					required : true,
				}
				,"param[tbltransaksiketetapan_omzettotal]" : {
					required : true
				}
				,"param[refjenisreklame_id]" : {
					required : true
				}
				,"param[tblpendataanreklame_judul]" : {
					required : true
				}
				,"param[tblpendataanreklame_lokasi]" : {
					required : true
				}
				,"param[tblpendataanreklame_panjang]" : {
					required : true
				}
				,"param[tblpendataanreklame_lebar]" : {
					required : true
				}
				,"param[tblpendataanreklame_sisi]" : {
					required : true
				}
				,"param[tblpendataanreklame_jumlahreklame]" : {
					required : true
				}
				,"param[tblpendataanreklame_kelasjalan]" : {
					required : true
				}
				,"param[tblpendataanreklame_masaawal]" : {
					required : true
				}
				,"param[tblpendataanreklame_masaakhir]" : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tbltransaksiketetapan_tahunpajak]" : {
					required : 'Mohon pilih tahun pajak'
				}
				,"param[tblpendataanreklame_kodelokasi]" : {
					required : 'Mohon isikan kode lokasi'
					,digits : 'Mohon isikan dalam angka'
				}
				,"param[tbltransaksiketetapan_tglentrisptpd]" : {
					required : 'Mohon entrikan tanggal pendataan',
				}
				,"param[tbltransaksiketetapan_tglterimasptpd]" : {
					required : 'Mohon entrikan tanggal terima',
				}
				,"param[tbltransaksiketetapan_omzettotal]" : {
					required : 'Mohon entrikan nilai omzet',
				}
				,"param[refjenisreklame_id]" : {
					required : 'Mohon pilih jenis reklame',
				}
				,"param[tblpendataanreklame_judul]" : {
					required : 'Mohon entrikan judul/tema reklame',
				}
				,"param[tblpendataanreklame_lokasi]" : {
					required : 'Mohon entrikan lokasi pemasangan reklame',
				}
				,"param[tblpendataanreklame_panjang]" : {
					required : 'Mohon entrikan panjang reklame',
				}
				,"param[tblpendataanreklame_lebar]" : {
					required : 'Mohon entrikan lebar reklame',
				}
				,"param[tblpendataanreklame_sisi]" : {
					required : 'Mohon entrikan jumlah sisi reklame',
				}
				,"param[tblpendataanreklame_jumlahreklame]" : {
					required : 'Mohon entrikan jumlah reklame',
				}
				,"param[tblpendataanreklame_kelasjalan]" : {
					required : 'Mohon pilih kelas jalan',
				}
				,"param[tblpendataanreklame_masaawal]" : {
					required : 'Mohon entrikan masa pemasangan awal',
				}
				,"param[tblpendataanreklame_masaakhir]" : {
					required : 'Mohon entrikan masa pemasangan akhir',
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, jalankan simpan()
				// return simpanPendataan();
				$("#btnSimpanHitung").show();
				$("#link_tabrek2").click();
				$("#btnHitung").hide();
				$("#footer_reklame").show(1000);
			}
		});
	}

	function simpanPendataan() {
		var addparam = {id: window.idtranskttap, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					// $("#modalPendataan").modal('hide');
					notifikasi('Berhasil','Pendataan berhasil dientrikan ke sistem','success',1,0);
					simpanDetailReklame(respon.pk, $("#form-pendataan").serialize());
					// detailIzinPemohon(window.idpemohon);
				} else {
				}
			}
		});
		
	}

	function simpanDetailReklame(id, formdata) {
		var addparam = {id: window.idtranskttap, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpanDetailReklame',
			type: 'POST',
			dataType: 'json',
			data: formdata+'&tbltransaksiketetapan_id='+id+'&'+jQuery.param(addparam),
			success: function(respon) {
				$("#modalPendataan").modal('hide');
				setTimeout(function() {
					detailIzinPemohon(window.idpemohon);					
				}, 2000);
			}
		});
	}

	// Date Range Picker
	$("#tblpendataanreklame_masaawal").datepicker({
	    defaultDate: "+1w",
	    changeMonth: true,
	    numberOfMonths: 2,
	    dateFormat: "dd-mm-yy",
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onClose: function (selectedDate) {
	        $("#tblpendataanreklame_masaakhir").datepicker("option", "minDate", selectedDate);
	    }

	});
	$("#tblpendataanreklame_masaakhir").datepicker({
	    defaultDate: "+1w",
	    changeMonth: true,
	    numberOfMonths: 2,
	    dateFormat: "dd-mm-yy",
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onClose: function (selectedDate) {
	        $("#tblpendataanreklame_masaawal").datepicker("option", "maxDate", selectedDate);
	    }
	});

	function isSudahPendataan(t,b) {$.post('<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/isSudahPendataanReklame', {xxobyidxx: senc($("#xxobyidxx").val()),t:senc(t),b:senc(b)}, function(respon) {if (respon.status=='exist') {$("[btnid=<?= $xc ?>]").hide();konfirm(respon.id);notifikasi('Info','Lokasi reklame sudah ada, isikan kode lokasi lain.','fail',1,0); } else {$("[btnid=<?= $xc ?>]").show(); } },"json"); }
	function konfirm(id) {
		$.SmartMessageBox({
			title : "Pendataan reklame terpilih sudah ada", // judul Smart Alert
			content : "Apa yang akan dilakukan dengan data ini?", // konten dari smart alert
			buttons : '[Abaikan][Batalkan][Edit]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Edit") {
				$.ajax({
					url: 'pendaftaran/Data_ketetapan/getdatarekl',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
					},
					success: function (respon) {
						window.idtranskttap = id;
						window.respon = respon;
						exclude = ['tbltransaksiketetapan_tahunpajak','tbltransaksiketetapan_bulanpajak','tbltransaksiketetapan_carapenetapan','tblpendataanreklame_kodelokasi',];
						toTGL = ['tbltransaksiketetapan_tglentrisptpd','tbltransaksiketetapan_tglterimasptpd','tblpendataanreklame_masaawal','tblpendataanreklame_masaakhir'];
						toDuit = [];
						$.each(respon, function(index, val) {
							if(!inArray(index,exclude)) {
								$("#"+index).val(respon[index]);
								$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
								$("input[type=radio][value='"+respon[index]+"']."+index).prop('checked', true); //pilih radio button
								// $("#"+index).html(respon[index]);
								if(inArray(index,toTGL)) {
									tgl = moment(respon[index]).format("LL");
									$("#"+index).html(tgl);
									$("#"+index).val(respon[index]!=null ? moment(respon[index]).format("L") : '');
								}
								if(inArray(index,toDuit)) {
									$("#"+index).html( formatRibuan(respon[index]) );
								}
							}
						});
						$("#tbltransaksiketetapan_tarif").val(respon.tbltransaksiketetapan_tarif*100);
						$("#tbltransaksiketetapan_omzettotal").val(parseInt(respon.tbltransaksiketetapan_pajak));
						// $("#tbltransaksiketetapan_rupiahdenda").val(respon.tbltransaksiketetapan_rupiahdenda);
						$("#tblpendataanreklame_masaawal, #tblpendataanreklame_masaakhir").trigger('change');
						$("#tblpendataanreklame_panjang, #tblpendataanreklame_lebar, #tblpendataanreklame_sisi").trigger('keyup');
						$("#tblpendataanreklame_jumlahreklame").trigger('keyup');
						setTimeout(function() {
							$("#tblpendataanreklame_kelasjalan").trigger('change');
						}, 2000);

						// hitungPajak();
						$("[btnid=<?= $xc ?>]").show();
						window.cmdp = 'edit';
					}
				});
			} else if (ButtonPressed === 'Batalkan') {
				$.SmartMessageBox({
					title : "Anda akan membatalkan pendataan pajak reklame terpilih", // judul Smart Alert
					content : "Apakah anda yakin akan membatalkan?", // konten dari smart alert
					buttons : '[Tidak][Ya]' // pengaturan tombol
				}, function(ButtonPressed) {
					if (ButtonPressed === "Ya") {
						$.ajax({
							url: 'pendaftaran/Data_ketetapan/hapusrekl',
							type: 'post',
							dataType: 'json',
							data: {
								id: senc(id.toString()),
								token: senc(Math.random().toString())
							},
							success: function (respon) {
								if(respon.status=='success') {
									notifikasi('Sukses','Data berhasil dihapus', 'success',1,0);
									setTimeout(function() {
										setMasaPajak();
									}, 1000);
								} else {
									notifikasi('Gagal',respon.msg, 'fail',0,0);
								}
							}
						});
					}
				});
			} else if (ButtonPressed === 'Abaikan') {
				window.cmdp = 'tambah';
			}
		});
	}
</script>
<style type="text/css">
	.disabled{
		background: #ddd !important;
	}
</style>