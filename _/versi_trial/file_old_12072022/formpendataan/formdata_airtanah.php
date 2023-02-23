<?php $tarif = ( $rek = MasterRekening::model()->find('tblmasterrekening_kode=:kode', array(':kode'=>$data['rekening_kode'])) ) ? ($rek['tblmasterrekening_tarif'] * 100) : 0;  ?>
<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-md-12" style="border-right: 1px solid #000;">
				<div class="row" >
					<div class="col col-6">
						<?php $objectdata = Obyek::model()->findByPk($data['obyek_id']); ?>
						<label for="label" class="input">NPWPD</label>
						<label id="form_npwpd"><?= ($objectdata) ? $objectdata->tblobyek_npwpd : '-'; ?></label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Nama WP</label>
						<label id="form_namawp"><?= ($objectdata) ? $objectdata->tblobyek_nama : '-'; ?></label>
					</div>
				</div>

				<br>

				<div class="row" >
					<div class="col col-3">
						<label for="label" class="input">Tahun Pajak</label>
						<label class="select">
							<select name="param[tbltransaksiketetapan_tahunpajak]" class="select2" id="tbltransaksiketetapan_tahunpajak">
								<option selected="" value="">=== Pilih Tahun Pajak ====</option>
								<?php error_reporting(-1); $data['listtahun'] = Tahun::model()->findAll(); ?>
								<?php foreach ($data['listtahun'] as $tahun): ?>
									<option <?= $tahun['reftahun_nama']==date('Y') ? 'selected' : '' ?> value="<?= $tahun['reftahun_nama'] ?>"><?= $tahun['reftahun_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">Bulan Pajak</label>
						<label class="select">
							<?php $data['listbulan'] = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'); ?>
							<select name="param[tbltransaksiketetapan_bulanpajak]" class="select2" id="tbltransaksiketetapan_bulanpajak">
								<option selected="" value="">=== Pilih Bulan Pajak ====</option>
								<?php $b=1; foreach ($data['listbulan'] as $bulan): ?>
									<option value="<?= $b++ ?>"><?= $bulan ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>

					<div class="col col-3">
						<label for="label" class="input">Masa Pajak Awal</label>
						<label class="input">
							<input class="disabled" readonly="" <?php /*class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaawal]" id="tbltransaksiketetapan_masaawal" placeholder="Masa Awal" />
							<i class="icon-append fa fa-calendar "></i>
						</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">Masa Pajak Akhir</label>
						<label class="input">
							<input class="disabled" readonly="" <?php /*class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaakhir]" id="tbltransaksiketetapan_masaakhir" placeholder="Masa Akhir" />
							<i class="icon-append fa fa-calendar "></i>
						</label>
					</div>
				</div>

				<br>

				<div class="row" >
					<div style="display: none;" class="col col-3">
						<label for="label" class="input">Volume Meter Awal</label>
						<label class="input">
							<div class="input-group">
								<input type="text" name="param[tblpendataanairtanah_meterawal]" id="tblpendataanairtanah_meterawal" placeholder="Volume Awal Bulan" />
								<span class="input-group-addon">M3</span>
							</div>
						</label>
					</div>
					<div style="display: none;" class="col col-3">
						<label for="label" class="input">Volume Meter Akhir</label>
						<label class="input">
							<div class="input-group">
							<input type="text" name="param[tblpendataanairtanah_meterakhir]" id="tblpendataanairtanah_meterakhir" placeholder="Volume Akhir Bulan" />
								<span class="input-group-addon">M3</span>
							</div>
						</label>
					</div>

					<div class="col col-3">
						<label for="label" class="input">Volume Pemakaian</label>
						<label class="input">
							<div class="input-group">
								<input type="text" name="param[tblpendataanairtanah_volume]" id="tblpendataanairtanah_volume" placeholder="Volume Pemakaian" />
								<span class="input-group-addon">M3</span>
							</div>
						</label>
					</div>

					<div class="col col-3">
						<label style="display: none;" for="label" class="input">Bobot SDA</label>
						<label style="display: none;" class="select">
							<?php $data['bobotsda'] = DBFetch::query(array('from'=>'refairtanahbobotsda','mode'=>'LIST')); ?>
							<select class="" name="param[tblpendataanairtanah_bobotsda]" id="tblpendataanairtanah_bobotsda">
								<?php foreach ($data['bobotsda'] as $bobotsda): ?>
									<option keterangan="<?= $bobotsda['refairtanahbobotsda_keterangan'] ?>" value="<?= $bobotsda['refairtanahbobotsda_bobot'] ?>"><?= $bobotsda['refairtanahbobotsda_nama'] ?></option>
								<?php endforeach ?>
							</select><i></i>
						</label>

						<label for="label" class="input">Jns. Kompensasi</label>
						<label class="select">
							<?php $data['kompensasi'] = DBFetch::query(array('from'=>'refairtanahkompensasi','mode'=>'LIST')); ?>
							<select class="" name="param[tblpendataanairtanah_kompensasi]" id="tblpendataanairtanah_kompensasi">
								<?php foreach ($data['kompensasi'] as $kompensasi): ?>
									<option <?php for ($i=1; $i <= 6; $i++): ?> vol<?= $i; ?>="<?= $kompensasi['refairtanahkompensasi_vol'.$i] ?>" <?php endfor; ?> value="<?= $kompensasi['refairtanahkompensasi_nama'] ?>"><?= $kompensasi['refairtanahkompensasi_nama'] ?></option>
								<?php endforeach ?>
							</select><i></i>
						</label>
					</div>
				</div>

				<br>

				<div class="row" >
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td>No</td>
								<td>Volume Air</td>
								<td>Harga Dasar Air</td>
								<td>Vol</td>
								<td>NPA Rp.<br>(Nilai Perolehan Air Tanah)</td>
							</tr>
						</thead>
						<tbody id="_listDetail_">
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2">
									
								</td>
								<td>Jumlah NPA</td>
								<td><span id="dtl_tblpendataanairtanahdet_voltotal"></span></td>
								<td>Rp <span class="pull-right" id="dtl_tblpendataanairtanahdet_nparupiahtotal"></span></td>
							</tr>
							<tr>
								<td colspan="2">
									
								</td>
								<td colspan="2">Jumlah Pajak Terhutang <?= ($tarif) ?> %</td>
								<td>Rp <span class="pull-right" id="dtl_tblpendataanairtanahdet_pajakterhutang"></span></td>
							</tr>
							<tr>
								<td colspan="2">
									
								</td>
								<td colspan="2">Jumlah Pajak Terhutang (Pembulatan)</td>
								<td>Rp <span class="pull-right" id="dtl_tblpendataanairtanahdet_pajakterhutangbulat"></span></td>
							</tr>
						</tfoot>
					</table>
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
							<select style="width:100%" name="param[tbltransaksiketetapan_carapenetapan]" class="select2" id="tbltransaksiketetapan_carapenetapan">
								<option value="Self Assesment">Self Assesment</option>
								<option selected="" value="Official Assesment">Official Assesment</option>
							</select>
						</label>
					</div>
				</div>
			</div>
			<section style="display: none;" class="col col-4 pull-right">
				<div class="row" >
					<div class="col col-8">
						<label for="label" class="input">Besar Omzet</label>
						<label class="input">
							<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_omzettotal]" id="tbltransaksiketetapan_omzettotal" placeholder="Besar Omzet" />
							<i class="icon-append fa fa-money "></i>
						</label>
					</div>
				</div>
				<br>
				<div class="row" >
					<div class="col col-8">
						<label for="label" class="input">Tarif Pajak</label>
						<label class="input">
							<div class="input-group">
							<input readonly="" class="disabled" value="<?= $tarif ?>" type="text" name="param[tbltransaksiketetapan_tarif]" id="tbltransaksiketetapan_tarif" placeholder="Tarif Pajak" />
								<span class="input-group-addon">%</span>
							</div>
						</label>
					</div>
				</div>
				<br>
				<div class="row" >
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
			<?php /*section class="col col-md-6">
				<p style="margin-top: 25px;">
					<em> <i class="fa fa-info-circle"></i> Silahkan Pilih Bidang Usaha</em>
				</p>
			</section*/ ?>
		</div>
	</fieldset>
	<input type="hidden" name="param[tblobyek_id]" value="<?= $data['obyek_id'] ?>" />
	<footer>
		<button class="btn btn-primary" type="submit">
			Simpan
		</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">
			Batal
		</button>
	</footer>
</form>

<script type="text/javascript">
airtanah_volume=0;
	$(function() {
		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		tblpendataanairtanahdet = localStorage.getItem("tblpendataanairtanahdet");//Retrieve the stored data
		tblpendataanairtanahdet = JSON.parse(tblpendataanairtanahdet); //Converts string to object
		if(tblpendataanairtanahdet == null) //If there is no data, initialize an empty array
			tblpendataanairtanahdet = [];

	});

	<?php /*function tambahDetail() {
		var jns = $("#dtl_refjenisgalianc_id :selected");
		if (jns.val()!='') {
			id = jns.val();
			tarif = jns.attr('tarif');
			nama = jns.attr('nama');
			tonase = $("#dtl_tblpendataangalianc_tonase").val();
			rs = {
				"refjenisgalianc_id":id
				,"refjenisgalianc_nama":nama
				,"tblpendataangalianc_tonase":tonase
				,"tblpendataangalianc_harga":tarif
			};

			if (operation=='E') {
				tblpendataanairtanahdet[selected_index] = rs;
			} else if (operation=='A') {
				tblpendataanairtanahdet.push( rs );
			}
			localStorage["tblpendataanairtanahdet"] = JSON.stringify( tblpendataanairtanahdet );
			$("#form-detail input, #form-detail select").val('');
			listDetail();
			window.selected_index = -1;
		}
	} 

	function editDetail(selected_index){
		$("#form-detail input, #form-detail select").val('');
		operation = "E"; //Edit
		window.selected_index = selected_index;
		console.log('edit => '+window.selected_index);
		rs = tblpendataanairtanahdet[selected_index];
	 
		$("#dtl_refjenisgalianc_id").val(rs.refjenisgalianc_id);
		$("#dtl_refjenisgalianc_nama").val(rs.refjenisgalianc_nama);
		$("#dtl_tblpendataangalianc_tonase").val(rs.tblpendataangalianc_tonase);
		$("#dtl_tblpendataangalianc_harga").val(rs.tblpendataangalianc_harga);
	 	return true;
	}

	function hapusDetail(selected_index) {
		tblpendataanairtanahdet.splice(selected_index, 1);
		localStorage.setItem("tblpendataanairtanahdet", JSON.stringify(tblpendataanairtanahdet));
		listDetail();
	}
	*/ ?>

	function listDetail() {
		total_npa = 0;
		total_vol = 0;
		$("#_listDetail_").html("");

		tblpendataanairtanahdet = localStorage.getItem("tblpendataanairtanahdet");//Retrieve the stored data
		tblpendataanairtanahdet = JSON.parse(tblpendataanairtanahdet); //Converts string to object

		for(var i in tblpendataanairtanahdet){ 
			var rs = (tblpendataanairtanahdet[i]);
			total_npa += Number( (rs.npa) );
			total_vol += Number( (rs.bobotvol) );
			$("#_listDetail_").append(
					/*<td>No</td>
					<td>Volume Air</td>
					<td>FNA</td>
					<td>Jumlah FNA</td>
					<td>Harga Air Baku</td>
					<td>Harga Dasar Air</td>
					<td>Vol</td>
					<td>NPA<br>(Nilai Perolehan Air Tanah)</td>
				</tr>*/
				'<tr>'
					+'<td>'+rs.no+'</td>'
					+'<td><div align="right">'+rs.volair+'</div></td>'
					+'<td>'+formatRibuan( Number(toAngka(rs.hargadasarair) )) +'</td>'
					+'<td>'+(rs.bobotvol) +'</td>'
					+'<td><div align="right">'+formatRibuan( (rs.npa) ) +'</div></td>'
				+'</tr>'
			);
		}
		$("#dtl_tblpendataanairtanahdet_voltotal").html( formatRibuan(total_vol) );
		$("#dtl_tblpendataanairtanahdet_nparupiahtotal").html( formatRibuan(total_npa) );

		total_pajak_terhutang = total_npa * ( Number('<?= $tarif ?>')/100);
		total_pajak_terhutangbulat = ceiling(total_pajak_terhutang, 100);

		$("#dtl_tblpendataanairtanahdet_pajakterhutang").html( formatRibuan( total_pajak_terhutang ) );
		$("#dtl_tblpendataanairtanahdet_pajakterhutangbulat").html( formatRibuan( total_pajak_terhutangbulat ) );

		// $("#tbltransaksiketetapan_omzettotal").val( total_pajak_terhutang );
		$("#tbltransaksiketetapan_omzettotal").val( total_npa );
		$("#tbltransaksiketetapan_pajak").val( total_pajak_terhutangbulat.toFixed(2) );
		setPriceFormat();
		// hitungPajak();
	}

	function updateDetail(){
		var jns = $("#dtl_refjenisgalianc_id :selected");
		id = jns.val();
		tarif = jns.attr('tarif');
		nama = jns.attr('nama');
		tonase = $("#dtl_tblpendataangalianc_tonase").val();

		
		localStorage.setItem("tblpendataanairtanahdet", JSON.stringify(tblpendataanairtanahdet));
		operation = "A"; //Return to default value
		return true;
	}

	jQuery(document).ready(function($) {
		pageSetUp();
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
		bln = $("#tbltransaksiketetapan_bulanpajak").val();
		if (thn!='' && bln!='') {
			masapajak = moment([thn,(bln-1)]);
			$("#tbltransaksiketetapan_masaawal").val(masapajak.format('L'));
			$("#tbltransaksiketetapan_masaakhir").val(masapajak.endOf('month').format('L'));
		}
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
				,"param[tbltransaksiketetapan_bulanpajak]" : {
					required : true
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
			},

			// Messages for form validation
			messages : {
				"param[tbltransaksiketetapan_tahunpajak]" : {
					required : 'Mohon pilih tahun pajak'
				}
				,"param[tbltransaksiketetapan_bulanpajak]" : {
					required : 'Mohon pilih bulan pajak'
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
	}

	function simpanPendataan() {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize(),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalPendataan").modal('hide');
					notifikasi('Berhasil','Pendataan berhasil dientrikan ke sistem','success',1,0);
					simpanDetailAirTanah(respon.pk);
				} else {
				}
			}
		});
	}
	function simpanDetailAirTanah(id) {
		var param = {
				tbltransaksiketetapan_id: id
				,tblpendataanairtanahdet: localStorage.getItem("tblpendataanairtanahdet")
			};
		url_param = jQuery.param(param);
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpanDetailAirTanah',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+url_param,
			success: function(respon) {
				localStorage.setItem("tblpendataanairtanahdet","[]");
				tblpendataanairtanahdet = [];
				detailIzinPemohon(window.idpemohon);
			}
		});
	}

	function tabeldetail_airtanah() {
		<?php $bobot = DBFetch::query( array('from'=>'refairtanahbobot','mode'=>'DETAIL') ); ?>
		<?php $hargaairbaku = DBFetch::query( array('from'=>'refairtanahharga','mode'=>'DETAIL') ); ?>
		var refairtanahbobot_sda = '<?= $bobot['refairtanahbobot_sda'] ?>', refairtanahbobot_kompensasi = '<?= $bobot['refairtanahbobot_kompensasi'] ?>',hargaairbaku='<?= $hargaairbaku['refairtanahharga_rupiah'] ?>';
		bobot = $("#tblpendataanairtanah_bobotsda").val();
		jnskompensasi = $("#tblpendataanairtanah_kompensasi").val();
		jnskompensasivol = {};
		for (var i = 1; i <= 6; i++) {
			jnskompensasivol[i] = $("#tblpendataanairtanah_kompensasi option:selected").attr('vol'+i);
		}
		
		tabeldetail = [];
		bobotvol = {};
		bobotvol[0] = 0;
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/open_data/get/data/tabeldetail_airtanah',
			type: 'POST',
			dataType: 'json',
			data: {vol: window.airtanah_volume},
			success: function(respon) {
				if ('found'==respon.status) {
					i = 1;
					jQuery.each(respon.table, function(index, elm) {
						<?php /*console.log(elm); */ ?>
						bobotvol[i] = elm.refairtanahvolume_bobot;
						if (i==1) {
							//loop ke 1
							// console.log('loop ke '+i);
							volsekarang = window.airtanah_volume;
						}
						<?php /*console.log(volsekarang + " > " + elm.refairtanahvolume_bobot + " ? YA "); */ ?>
						if( (volsekarang > elm.refairtanahvolume_bobot ) && elm.refairtanahvolume_bobot!=null) {
							BOBOTVOL = elm.refairtanahvolume_bobot;
							(volsekarang -= elm.refairtanahvolume_bobot);
						} else {
							BOBOTVOL = volsekarang;
							<?php /*console.log('else, bobot =  '+ volsekarang) */ ?>
						}
						jumlahfna = (bobot * refairtanahbobot_sda) + (jnskompensasivol[i] * refairtanahbobot_kompensasi);
						jumlahfna = jumlahfna.toFixed(2);
						// hargadasarair = jumlahfna * hargaairbaku;
						hargadasarair = jnskompensasivol[i];
						npa = (hargadasarair * BOBOTVOL).toFixed(2);
						rs = {
							"no":i
							,"fna" : "( " + formatRibuan(bobot) + " x " + formatRibuan(refairtanahbobot_sda,0,1) + " ) + ( " + formatRibuan(jnskompensasivol[i],0,1) + " x " + formatRibuan(refairtanahbobot_kompensasi,0,1) + " )"
							,"bobotsda" : refairtanahbobot_sda
							,"kompensasi" : refairtanahbobot_kompensasi
							,"jnskompensasi" : jnskompensasi
							,"bobot" : bobot
							,"bobotvol" : BOBOTVOL
							,"jumlahfna" : jumlahfna
							,"hargaairbaku" : hargaairbaku
							,"hargadasarair" : formatRibuan( hargadasarair )
							,"volair" : elm.refairtanahvolume_keterangan
							,"npa" : npa
						};
						<?php /*console.log('volsekarang jadi : ' + volsekarang+ ' setelah dikurangi '+elm.refairtanahvolume_bobot+ ',  bobotnya : ' +elm.refairtanahvolume_bobot); */ ?>
						tabeldetail.push( rs );
						i++;
					});
					localStorage["tblpendataanairtanahdet"] = JSON.stringify( tabeldetail );
					listDetail();
				}
			}
		});
		

	}

	$("#tblpendataanairtanah_volume, #tblpendataanairtanah_kompensasi").change(function(event) {
		// maw = !isNaN( maw = $("#tblpendataanairtanah_meterawal").val() ) ? Number(maw) : 0;
		// mak = !isNaN( mak = $("#tblpendataanairtanah_meterakhir").val() ) ? Number(mak) : 0;
		// $("#tblpendataanairtanah_volume").val();
		window.airtanah_volume = airtanah_volume = $("#tblpendataanairtanah_volume").val();

		if (window.airtanah_volume > 0) {
			tabeldetail_airtanah();
		}
	});

	function ceiling(angka, minimal) {
		return (Math.ceil(angka/minimal)*minimal);
	}

</script>
<style type="text/css">
	.disabled{
		background: #ddd !important;
	}
</style>