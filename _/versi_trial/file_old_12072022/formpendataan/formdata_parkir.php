<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div>
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
						<label for="label" class="input">Cara Perhitungan</label>
						<label class="select">
							<select style="width: 100%" name="param[tbltransaksiketetapan_carapenetapan]" class="select2" id="tbltransaksiketetapan_carapenetapan">
								<option selected="" value="Self Assesment">Self Assesment</option>
								<option value="Official Assesment">Official Assesment</option>
							</select>
						</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">No Transaksi</label>
						<label class="input">
							<input value="<?= "1" ?>" type="text" name="param[tbltransaksiketetapan_notransaksi]" id="tbltransaksiketetapan_notransaksi" placeholder="No Transaksi" maxlength="4" />
							<i class="icon-append fa fa-square "></i>
						</label>
					</div>
				</div>

				<br>

				<div class="row" >
					<div class="col col-3">
						<label for="label" class="input">Masa Pajak Awal</label>
						<label class="input">
							<input <?php /*class="disabled" readonly="" class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaawal]" id="tbltransaksiketetapan_masaawal" placeholder="Masa Awal" />
							<i class="icon-append fa fa-calendar "></i>
						</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">Masa Pajak Akhir</label>
						<label class="input">
							<input <?php /*class="disabled" readonly="" class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaakhir]" id="tbltransaksiketetapan_masaakhir" placeholder="Masa Akhir" />
							<i class="icon-append fa fa-calendar "></i>
						</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">Tanggal Pendataan</label>
						<label class="input">
							<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiketetapan_tglentrisptpd]" id="tbltransaksiketetapan_tglentrisptpd" placeholder="Tanggal Pendataan" />
							<i class="icon-append fa fa-calendar "></i>
						</label>
					</div>
					<div class="col col-3">
						<label for="label" class="input">Tanggal Terima SPT</label>
						<label class="input">
							<input value="<?= date('d-m-Y') ?>" class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiketetapan_tglterimasptpd]" id="tbltransaksiketetapan_tglterimasptpd" placeholder="Tanggal terima SPT" />
							<i class="icon-append fa fa-calendar "></i>
						</label>
					</div>
				</div>

				<br>

			</div>

			<div>
				<fieldset id="xxx">
					<div>
						<div class="row">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<td>No</td>
										<td>Jenis Kendaraan</td>
										<td>Jumlah Kendaraan/Bulan</td>
										<td>Tarif (Rp)/Kendaraan</td>
										<td>Omzet (Rp)/Perbulan</td>
										<td>Pajak 25% (Rp)</td>
										<td>Keterangan</td>
									</tr>
								</thead>
								<tbody style="overflow: auto;max-height: 500px" id="_listDetail_"></tbody>
								<tfoot>
									<tr id="form-detail">
										<td>
										</td>
										<td>
											<label class="input">
												<input class="" name="param[tblobyekparkir_kendaraan]" type="text" id="tblobyekparkir_kendaraan" placeholder="Jenis Kendaraan">
												<!-- <i class="icon-append fa fa-square "></i> -->
											</label>
										</td>
										<td>
											<label class="input">
												<input class="" name="param[tblobyekparkir_kapasitas]" type="text" id="tblobyekparkir_kapasitas" placeholder="Jumlah Kendaraan">
												<!-- <i class="icon-append fa fa-square "></i> -->
											</label>
										</td>
										<td>
											<label class="input">
												<input class="text-align-right format-rupiah" type="text" name="param[tblobyekparkir_tarif]" id="tblobyekparkir_tarif" placeholder="Tarif (Rp)">
												<!-- <i class="icon-prepend fa fa-square "></i> -->
											</label>
										</td>
										<td>
											<label class="input">
												<input class="text-align-right format-rupiah" type="text" name="param[tblobyekparkir_omzet]" id="tblobyekparkir_omzet" placeholder="Omzet (Rp)">
												<!-- <i class="icon-prepend fa fa-square "></i> -->
											</label>
										</td>
										<td>
											<label class="input">
												<input class="text-align-right format-rupiah" type="text" name="param[tblobyekparkir_pajak]" id="tblobyekparkir_pajak" placeholder="Pajak (Rp)">
												<!-- <i class="icon-prepend fa fa-square "></i> -->
											</label>
										</td>
										<td>
											<label class="input">
												<input class="" name="param[tblobyekparkir_keterangan]" type="text" id="tblobyekparkir_keterangan" placeholder="Keterangan">
												<!-- <i class="icon-append fa fa-square "></i> -->
											</label>
										</td>
									</tr>
									<tr>
										<td></td>
										<td>Jumlah</td>
										<td></td>
										<td></td>
										<td>Total Omzet : <br><span id="totalOmzet"></span></td>
										<td>Total Pajak : <br><span id="totalPajak"></span></td>
										<td></td>
									</tr>
									<tr>
										<td colspan="6">
											<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail('PARKIR')"><i class="fa fa-plus"></i> Perbaharui Data</a>
										</td>
										<td></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</fieldset>
			</div>

			<div style="display: none;">
				<section class="col col-6 pull-right">
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
								<?php $tarif = ( $rek = MasterRekening::model()->find('tblmasterrekening_kode=:kode', array(':kode'=>$data['rekening_kode'])) ) ? ($rek['tblmasterrekening_tarif'] * 100) : 0;  ?>
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
								<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_rupiahdenda]" id="tbltransaksiketetapan_rupiahdenda" placeholder="Nominal Denda" />
								<i class="icon-append fa fa-money "></i>
							</label>
						</div>
					</div>
					<br>
					<div class="row" >
						<div class="col col-8">
							<label for="label" class="input">Besaran Pajak</label>
							<label class="input">
								<?php /*input readonly="" class="format-rupiah-desimal disabled" type="text" name="param[tbltransaksiketetapan_pajak]" id="tbltransaksiketetapan_pajak" placeholder="Nominal Besaran Pajak" /*/ ?>
								<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_pajak]" id="tbltransaksiketetapan_pajak" placeholder="Nominal Besaran Pajak" />
								<i class="icon-append fa fa-money "></i>
							</label>
						</div>
					</div>
				</section>
			</div>
			<?php /*section class="col col-md-6">
				<p style="margin-top: 25px;">
					<em> <i class="fa fa-info-circle"></i> Silahkan Pilih Bidang Usaha</em>
				</p>
			</section*/ ?>
		</div>
	</fieldset>
	<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
	<input type="hidden" name="param[tblmasterrekening_kode]" id="xxrekkodexx" value="<?= $data['rekening_kode'] ?>" />
	<footer>
		<button btnid="<?= $xc = md5(microtime()); ?>" class="btn btn-primary" type="submit">
			Simpan
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
		window.cmdp = 'tambah';
		window.idtranskttap = 0;
		$('#tbltransaksiketetapan_carapenetapan').select2("readonly", true);
	});

	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/moment-js/moment-with-locales.min.js", setMoment);
	function setMoment() {
		moment.locale('id');
	}

	$("#tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_tarif").keyup(function(event) {
		hitungPajak();
	});

	$("#tbltransaksiketetapan_rupiahdenda").keyup(function(event) {
		hitungPajak();
	});

	$("#tbltransaksiketetapan_pajak, #tbltransaksiketetapan_tarif").keyup(function(event) {
		hitungOmzet();
		hitungPajak();
	});

	$("#tbltransaksiketetapan_tahunpajak, #tbltransaksiketetapan_bulanpajak, #tbltransaksiketetapan_notransaksi").change(function(event) {
		setMasaPajak();
	});

	function hitungPajak() {
		var omzet1 = toAngka( $("#tbltransaksiketetapan_omzettotal").val() );
		var tarif = !isNaN( trf = $("#tbltransaksiketetapan_tarif").val() ) ? trf/100 : 0;
		var rupiahdenda = toAngka( $("#tbltransaksiketetapan_rupiahdenda").val() );

		pajak = ((omzet1 * tarif) + Number(rupiahdenda));

		// $("#tbltransaksiketetapan_pajak").val(pajak.toFixed(2));
		$("#tbltransaksiketetapan_pajak").val(pajak.toFixed(0));
		setPriceFormat();
	}

	function hitungOmzet() {
		var pajak = toAngka( $("#tbltransaksiketetapan_pajak").val() );
		var tarif = !isNaN( trf = $("#tbltransaksiketetapan_tarif").val() ) ? trf/100 : 0;
		var rupiahdenda = toAngka( $("#tbltransaksiketetapan_rupiahdenda").val() );

		// omzet = ((omzet1 * tarif) + Number(rupiahdenda));
		omzet = (pajak - Number(rupiahdenda)) / tarif;

		// $("#tbltransaksiketetapan_omzettotal").val(omzet.toFixed(2));
		$("#tbltransaksiketetapan_omzettotal").val(omzet.toFixed(0));
		setPriceFormat();
	}


	// HITUNG PAJAK PARKIR

	$("#tblobyekparkir_omzet, #tblobyekparkir_omzet").keyup(function(event) {
		hitungParkir();
		HitungPajakParkir();
	});

	function hitungParkir() {
		var tarifparkir = toAngka( $("#tblobyekparkir_tarif").val() );
		var	kapasitas = $("#tblobyekparkir_kapasitas").val();

		omzet = kapasitas * tarifparkir;

		$("#tblobyekparkir_omzet").val(omzet.toFixed(0));
		setPriceFormat();
	}

	function HitungPajakParkir() {
		// var tarifparkir = toAngka( $("#tblobyekparkir_tarif").val() );
		// var	kapasitas = $("#tblobyekparkir_kapasitas").val();
		var	omzet = toAngka( $("#tblobyekparkir_omzet").val() );

		// omzet = kapasitas * tarifparkir;
		
		pajak = omzet * 25/100;

		$("#tblobyekparkir_pajak").val(pajak.toFixed(0));
		setPriceFormat();
	}

	// HITUNG PAJAK PARKIR END


	function setMasaPajak() {
		$("#tbltransaksiketetapan_masaawal").val('');
		$("#tbltransaksiketetapan_masaakhir").val('');
		thn = $("#tbltransaksiketetapan_tahunpajak").val();
		bln = $("#tbltransaksiketetapan_bulanpajak").val();
		c = $("#tbltransaksiketetapan_notransaksi").val();
		if (thn!='' && bln!='') {
			el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_rupiahdenda, #tbltransaksiketetapan_pajak";
			jQuery.each(el.split(', '), function(index, val) {
			  $(val).val($(val)[0].defaultValue);
			});
			window.cmdp = 'tambah';
			window.idtranskttap = 0;	
			masapajak = moment([thn,(bln-1)]);
			$("#tbltransaksiketetapan_masaawal").val(masapajak.format('L'));
			$("#tbltransaksiketetapan_masaakhir").val(masapajak.endOf('month').format('L'));
			if (c!='') {
			isSudahPendataan(thn, bln, c);
			}
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
				,"param[tbltransaksiketetapan_notransaksi]" : {
					required : true
					,digits : false
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
				,"param[tbltransaksiketetapan_notransaksi]" : {
					required : 'Mohon entrikan nomor transaksi'
					,digits : 'Mohon entrikan dalam angka'
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

	jQuery(document).ready(function($) {
		setPriceFormat();
		window.cmddtlo = 'tambah';

		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		// localStorage.setItem("tblobyekparkir",'[]');
		tblobyekparkir = localStorage.getItem("tblobyekparkir");//Retrieve the stored data
		tblobyekparkir = JSON.parse(tblobyekparkir); //Converts string to object
		if(tblobyekparkir == null) //If there is no data, initialize an empty array
			tblobyekparkir = [];
	});

	function simpanPendataan() {
		var addparam = {id: window.idtranskttap, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalPendataan").modal('hide');
					notifikasi('Berhasil','Pendataan berhasil dientrikan ke sistem','success',1,0);
					simpanDetailParkir(respon.pk);
					// setTimeout(function() {
					// 	detailIzinPemohon(window.idpemohon);
					// }, 1000);
				} else {
				}
			}
		});
	}

	function simpanDetailParkir(id) {
		var param = {
				tbltransaksiketetapan_id: id
				,tblobyekparkir: localStorage.getItem("tblobyekparkir")
			};
		url_param = jQuery.param(param);
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpanDetailParkir',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+url_param,
			success: function(respon) {
				localStorage.setItem("tblobyekparkir","[]");
				tblobyekparkir = [];
				detailIzinPemohon(window.idpemohon);
			}
		});
	}

	function tambahDetail(jenis) {
		hitungPajak();

		if (jenis=='PARKIR') {
			kendaraan = $("#tblobyekparkir_kendaraan").val();
			kapasitas = $("#tblobyekparkir_kapasitas").val();
			tarif = $("#tblobyekparkir_tarif").val();
			omzet = $("#tblobyekparkir_omzet").val();
			pajak = $("#tblobyekparkir_pajak").val();
			keterangan = $("#tblobyekparkir_keterangan").val();
			rs = {
				"tblobyekparkir_kendaraan":kendaraan
				,"tblobyekparkir_kapasitas":kapasitas
				,"tblobyekparkir_tarif": toAngka(tarif)
				,"tblobyekparkir_omzet": toAngka(omzet)
				,"tblobyekparkir_pajak": toAngka(pajak)
				,"tblobyekparkir_keterangan": keterangan
			};

			if (operation=='E') {
				tblobyekparkir[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				tblobyekparkir.push( rs );
			}
			localStorage["tblobyekparkir"] = JSON.stringify( tblobyekparkir );
			$("#form-detail input, #form-detail select").val('');
			listDetail('PARKIR');
			window.selected_index = -1;
		} else if (jenis=='KOS') {
			jmlkmr = $("#DTL_TPAJAKHOTELKOS_JUMLKAMAR").val();
			tarif = $("#DTL_TPAJAKHOTELKOS_TARIF").val();
			kamarlaku = $("#DTL_TPAJAKHOTELKOS_JUMLKAMARLAKU").val();
			omzet = $("#DTL_TPAJAKHOTELKOS_OMZET").val();
			keterangan = $("#DTL_TPAJAKHOTELKOS_KET").val();
			rs = {
				"TPAJAKHOTELKOS_JUMLKAMAR":jmlkmr
				,"TPAJAKHOTELKOS_TARIF": toAngka(tarif)
				,"TPAJAKHOTELKOS_JUMLKAMARLAKU": kamarlaku
				,"TPAJAKHOTELKOS_OMZET": omzet
				,"TPAJAKHOTELKOS_KET": keterangan
			};

			if (operation=='E') {
				TPAJAKHOTELKOS[selected_index] = rs;
				operation = 'A';
			} else if (operation=='A') {
				TPAJAKHOTELKOS.push( rs );
			}
			localStorage["TPAJAKHOTELKOS"] = JSON.stringify( TPAJAKHOTELKOS );
			$("#form-detail input, #form-detail select").val('');
			listDetail('KOS');
			window.selected_index = -1;
		}
		hitungPajak();
	}

	function editDetail(selected_index, jenis){
		if (jenis=='PARKIR') {
			$("#form-detail input, #form-detail select").val('');
			operation = "E"; //Edit
			window.selected_index = selected_index;
			// console.log('edit => '+window.selected_index);
			rs = tblobyekparkir[selected_index];

			$("#tblobyekparkir_kendaraan").val(rs.tblobyekparkir_kendaraan);
			$("#tblobyekparkir_kapasitas").val(rs.tblobyekparkir_kapasitas);
			$("#tblobyekparkir_tarif").val(parseInt(rs.tblobyekparkir_tarif));
			$("#tblobyekparkir_omzet").val(rs.tblobyekparkir_omzet);
			$("#tblobyekparkir_pajak").val(rs.tblobyekparkir_pajak);
			$("#tblobyekparkir_keterangan").val(rs.tblobyekparkir_keterangan);
			setPriceFormat();
		 	return true;
		 } else if (jenis=='KOS') {
		 	$("#form-detail-kos input, #form-detail-kos select").val('');
			operation = "E"; //Edit
			window.selected_index = selected_index;
			// console.log('edit => '+window.selected_index);
			rs = TPAJAKHOTELKOS[selected_index];

			$("#DTL_TPAJAKHOTELKOS_JUMLKAMAR").val(rs.TPAJAKHOTELKOS_JUMLKAMAR);
			$("#DTL_TPAJAKHOTELKOS_TARIF").val(parseInt(rs.TPAJAKHOTELKOS_TARIF));
			$("#DTL_TPAJAKHOTELKOS_JUMLKAMARLAKU").val(rs.TPAJAKHOTELKOS_JUMLKAMARLAKU);
			$("#DTL_TPAJAKHOTELKOS_OMZET").val(rs.TPAJAKHOTELKOS_OMZET);
			$("#DTL_TPAJAKHOTELKOS_KET").val(rs.TPAJAKHOTELKOS_KET);

			setPriceFormat();
		 	return true;
		 }
	}

	function listDetail(jenis) {
		if (jenis=='PARKIR') {
			$("#_listDetail_").html("");
			tblobyekparkir = JSON.parse(localStorage["tblobyekparkir"]);

			var totalomzet = 0;
			var totalpajak = 0;

			for(var i in tblobyekparkir){ 
				var rs = (tblobyekparkir[i]);
				$("#_listDetail_").append(
					'<tr>'
						+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+', \'PARKIR\')"><i class="fa fa-pencil"></i></a>'
						+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+', \'PARKIR\')"><i class="fa fa-times"></i></a></td>'
						+'<td>'+rs.tblobyekparkir_kendaraan+'</td>'
						+'<td><div align="right">'+formatRibuan(rs.tblobyekparkir_kapasitas) +'</div></td>'
						+'<td><div align="right">'+toRp(rs.tblobyekparkir_tarif) +'</div></td>'
						+'<td><div align="right">'+toRp(rs.tblobyekparkir_omzet)+'</div></td>'
						+'<td><div align="right">'+toRp(rs.tblobyekparkir_pajak) +'</div></td>'
						+'<td><div align="right">'+rs.tblobyekparkir_keterangan+'</div></td>'
					+'</tr>'
				);

			totalomzet += Number(rs.tblobyekparkir_omzet);
			totalpajak += Number(rs.tblobyekparkir_pajak);

			}

		$('#totalOmzet').text( toRp(totalomzet) );
		$('#totalPajak').text( toRp(totalpajak) );
		$('#tbltransaksiketetapan_omzettotal').val( totalomzet );
		} else if (jenis=='KOS') {
			$("#_listDetailkos_").html("");
			TPAJAKHOTELKOS = JSON.parse(localStorage["TPAJAKHOTELKOS"]);
			for(var i in TPAJAKHOTELKOS){ 
				var rs = (TPAJAKHOTELKOS[i]);
				$("#_listDetailkos_").append(
					'<tr>'
						+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+', \'KOS\')"><i class="fa fa-pencil"></i></a>'
						+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+', \'KOS\')"><i class="fa fa-times"></i></a></td>'
						+'<td>'+rs.TPAJAKHOTELKOS_JUMLKAMAR+'</td>'
						+'<td><div align="right">'+formatRibuan(rs.TPAJAKHOTELKOS_TARIF) +'</div></td>'
						+'<td><div align="right">'+formatRibuan((rs.TPAJAKHOTELKOS_JUMLKAMARLAKU)) +'</div></td>'
						+'<td>'+rs.TPAJAKHOTELKOS_OMZET+'</td>'
						+'<td>'+rs.TPAJAKHOTELKOS_KET+'</td>'
					+'</tr>'
				);
			}
		}
		setPriceFormat();
	}

	function hapusDetail(selected_index, jenis) {
		if (jenis=='PARKIR') {
			tblobyekparkir.splice(selected_index, 1);
			localStorage.setItem("tblobyekparkir", JSON.stringify(tblobyekparkir));
			listDetail('PARKIR');
		} else if (jenis=='KOS') {
			TPAJAKHOTELKOS.splice(selected_index, 1);
			localStorage.setItem("TPAJAKHOTELKOS", JSON.stringify(TPAJAKHOTELKOS));
			listDetail('KOS');
		}
	}
		

	function isSudahPendataan(t,b,c) {$.post('<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/isSudahPendataan', {xxobyidxx: senc($("#xxobyidxx").val()),t:senc(t),b:senc(b),c:senc(c)}, function(respon) {if (respon.status=='exist') {$("[btnid=<?= $xc ?>]").hide();konfirm(respon.id);notifikasi('Info','Masa Pajak terpilih sudah dibuat.','fail',1,0); } else {$("[btnid=<?= $xc ?>]").show(); } },"json"); }

	function konfirm(id) {
		$.SmartMessageBox({
			title : "Pendataan bulan terpilih sudah ada", // judul Smart Alert
			content : "Apa yang akan dilakukan dengan data ini?", // konten dari smart alert
			buttons : '[Abaikan][Batalkan][Edit]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Edit") {
				$.ajax({
					url: 'pendaftaran/Data_ketetapan/getdata',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
					},
					success: function (respon) {
						window.idtranskttap = id;
						window.respon = respon;
						exclude = ['tbltransaksiketetapan_tahunpajak','tbltransaksiketetapan_bulanpajak','tbltransaksiketetapan_carapenetapan',];
						toTGL = ['tbltransaksiketetapan_tglentrisptpd','tbltransaksiketetapan_tglterimasptpd','tbltransaksiketetapan_masaawal','tbltransaksiketetapan_masaakhir'];
						toDuit = [];
						$.each(respon, function(index, val) {
							if(!inArray(index,exclude)) {
								$("#"+index).val(respon[index]);
								$("#"+index).select2('val',respon[index]!="0" ? respon[index] : "");
								$("input[type=radio][value='"+respon[index]+"']."+index).prop('checked', true); //pilih radio button
								$("#"+index).html(respon[index]);
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
						$("#tbltransaksiketetapan_omzettotal").val(parseInt(respon.tbltransaksiketetapan_omzettotal));
						$("#tbltransaksiketetapan_rupiahdenda").val(respon.tbltransaksiketetapan_rupiahdenda);

						hitungPajak();
						$("[btnid=<?= $xc ?>]").show();
						window.cmdp = 'edit';
					}
				});
			} else if (ButtonPressed === 'Batalkan') {
				$.SmartMessageBox({
					title : "Anda akan membatalkan pendataan pajak bulan terpilih", // judul Smart Alert
					content : "Apakah anda yakin akan membatalkan?", // konten dari smart alert
					buttons : '[Tidak][Ya]' // pengaturan tombol
				}, function(ButtonPressed) {
					if (ButtonPressed === "Ya") {
						$.ajax({
							url: 'pendaftaran/Data_ketetapan/hapus',
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