<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-6" style="border-right: 1px solid #000;">
				<div class="row" >
					<div class="col col-6">
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
					<div class="col col-6">
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
				</div>

				<br>
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Cara Perhitungan</label>
						<label class="select">
							<select style="width: 100%" name="param[tbltransaksiketetapan_carapenetapan]" class="select2" id="tbltransaksiketetapan_carapenetapan">
								<option selected="" value="Self Assesment">Self Assesment</option>
								<option value="Official Assesment">Official Assesment</option>
							</select>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">No Transaksi</label>
						<label class="input">
							<input type="text" value="1" name="param[tbltransaksiketetapan_notransaksi]" id="tbltransaksiketetapan_notransaksi" placeholder="No Transaksi" maxlength="4" />
							<i class="icon-append fa fa-square "></i>
						</label>
					</div>
				</div>

				<br>

				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Masa Pajak Awal</label>
						<label class="input">
							<input <?php /*class="disabled" readonly="" class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaawal]" id="tbltransaksiketetapan_masaawal" placeholder="Masa Awal" />
							<i class="icon-append fa fa-calendar "></i>
						</label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Masa Pajak Akhir</label>
						<label class="input">
							<input <?php /*class="disabled" readonly="" class="datepicker" data-dateformat="dd-mm-yy"*/ ?> type="text" name="param[tbltransaksiketetapan_masaakhir]" id="tbltransaksiketetapan_masaakhir" placeholder="Masa Akhir" />
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
			</div>
			<section class="col col-6 pull-right">

				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">Jenis Sumber</label>
						<label class="select">
							<select name="param[pilih_jenissumber]" class="select2" id="pilih_jenissumber">
								<option selected="" value="">=== Pilih Jenis Sumber ====</option>
									<option value="1">NON INDUSTRI</option>
									<option value="2">INDUSTRI</option>
									<option value="3">LISTRIK SENDIRI</option>
							</select>
						</label>
					</div>

					<div class="col col-6">
					</div>
					<!-- <div class="col col-6">
						<label for="label" class="input">Besar Omzet Non Industri</label>
						<label class="input">
							<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_omzetnonindustri]" id="tbltransaksiketetapan_omzetnonindustri" placeholder="Besar Omzet Non Industri" />
							<i class="icon-append fa fa-money "></i>
						</label>
					</div> -->
				</div>

				<br>

				<div class="row">
					<div class="col col-6">
						<label for="label" class="input">Besar Omzet</label>
						<label class="input">
							<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_omzetindustri]" id="tbltransaksiketetapan_omzetindustri" placeholder="Besar Omzet" />
							<i class="icon-append fa fa-money "></i>
						</label>
					</div>


					<div class="col col-6">
						<label for="label" class="input">Tarif Pajak Non Industri</label>
						<label class="input">
							<div class="input-group">
							<input readonly="" class="disabled" value="<?= $tarif ?>" type="text" name="param[tbltransaksiketetapan_tarifnonid]" id="tbltransaksiketetapan_tarifnonid" placeholder="Tarif Pajak" />
								<span class="input-group-addon">%</span>
							</div>
						</label>
					</div>

					<!-- <div class="col col-6" style=" display: none;" id="industri">
						<label for="label" class="input">Tarif Pajak Industri</label>
						<label class="input">
							<div class="input-group">
							<?php $tarif = 3;  ?>
							<input readonly="" class="disabled" value="<?= $tarif ?>" type="text" name="param[tbltransaksiketetapan_tarif]" id="tbltransaksiketetapan_tarif" placeholder="Tarif Pajak" />
								<span class="input-group-addon">%</span>
							</div>
						</label>
					</div>

					<div class="col col-6" style="display: none;" id="listrik-sendiri">
						<label for="label" class="input">Tarif Pajak Listrik Sendiri</label>
						<label class="input">
							<div class="input-group">
							<?php $tarif = 1.5;  ?>
							<input readonly="" class="disabled" value="<?= $tarif ?>" type="text" name="param[tbltransaksiketetapan_tarif]" id="tbltransaksiketetapan_tarif" placeholder="Tarif Pajak" />
								<span class="input-group-addon">%</span>
							</div>
						</label>
					</div> -->

					

					<!-- <div class="col col-6">
						<label for="label" class="input">Besar Omzet Non Industri</label>
						<label class="input">
							<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_omzetnonindustri]" id="tbltransaksiketetapan_omzetnonindustri" placeholder="Besar Omzet Non Industri" />
							<i class="icon-append fa fa-money "></i>
						</label>
					</div> -->
					<input type="hidden" name="param[tbltransaksiketetapan_omzettotal]" id="tbltransaksiketetapan_omzettotal" placeholder="Besar Omzet" />
				</div>
				<div class="row" >
					<!-- <div class="col col-6">
						<label for="label" class="input">Tarif Pajak Non Industri</label>
						<label class="input">
							<div class="input-group">
							<?php $tarif = ( $rek = MasterRekening::model()->find('tblmasterrekening_kode=:kode', array(':kode'=>$data['rekening_kode'])) ) ? ($rek['tblmasterrekening_tarif'] * 100) : 0;  ?>
							<input readonly="" class="disabled" value="<?= $tarif ?>" type="text" name="param[tbltransaksiketetapan_tarifnonid]" id="tbltransaksiketetapan_tarifnonid" placeholder="Tarif Pajak" />
								<span class="input-group-addon">%</span>
							</div>
						</label>
					</div> -->
				</div>
				<div class="row" >
					<!-- <div class="col col-6">
						<label for="label" class="input">Besaran Pajak Industri</label>
						<label class="input">
							<input readonly="" class="format-rupiah-desimal disabled" type="text" name="param[tbltransaksiketetapan_pajakindustri]" id="tbltransaksiketetapan_pajakindustri" placeholder="Nominal Besaran Pajak Industri" />
							<i class="icon-append fa fa-money "></i>
						</label>
					</div> -->
					<!-- <div class="col col-6">
						<label for="label" class="input">Besaran Pajak Non Industri</label>
						<label class="input">
							<input readonly="" class="format-rupiah-desimal disabled" type="text" name="param[tbltransaksiketetapan_pajaknonindustri]" id="tbltransaksiketetapan_pajaknonindustri" placeholder="Nominal Besaran Pajak Non Industri" />
							<i class="icon-append fa fa-money "></i>
						</label>
					</div> -->
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
							<?php /*input class="disabled format-rupiah" readonly="" type="text" name="param[tbltransaksiketetapan_pajak]" id="tbltransaksiketetapan_pajak" placeholder="Nominal Besaran Pajak" /*/ ?>
							<input class="format-rupiah" type="text" name="param[tbltransaksiketetapan_pajak]" id="tbltransaksiketetapan_pajak" placeholder="Nominal Besaran Pajak" />
							<i class="icon-append fa fa-money "></i>
						</label>
					</div>
				</div>
				<br>
			</section>
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

	$("#tbltransaksiketetapan_omzetindustri, #tbltransaksiketetapan_omzetnonindustri,#tbltransaksiketetapan_omzetnonindustri, #tbltransaksiketetapan_tarif, #tbltransaksiketetapan_tarifnonid").keyup(function(event) {
		hitungPajak();
	});

	$("#tbltransaksiketetapan_pajak").keyup(function(event) {
		hitungOmzet();
	});

	$("#tbltransaksiketetapan_rupiahdenda").keyup(function(event) {
		hitungPajak();
	});

	$("#tbltransaksiketetapan_tahunpajak, #tbltransaksiketetapan_bulanpajak, #tbltransaksiketetapan_notransaksi").change(function(event) {
		setMasaPajak();
	});

	function valNum(n) {
		n = (typeof n == "undefined") ? "0" : n;
		return !isNaN(toAngka(n)) ? Number(toAngka(n)) : 0;
	}

	function hitungPajak() {
		var omzet_id = valNum( $("#tbltransaksiketetapan_omzetindustri").val() );
		// var omzet_nonid = valNum( $("#tbltransaksiketetapan_omzetnonindustri").val() );
		var tarif_id = !isNaN( trf = $("#tbltransaksiketetapan_tarif").val() ) ? trf/100 : 0;
		var tarif = !isNaN( trf = $("#tbltransaksiketetapan_tarifnonid").val() ) ? trf/100 : 0;
		var rupiahdenda = valNum( $("#tbltransaksiketetapan_rupiahdenda").val() );

		pajakid = ((omzet_id * tarif_id));
		// pajaknonid = ((omzet_nonid * tarif));
		totalpajak = (pajakid+pajaknonid+rupiahdenda);
		omzet = (omzet_id);

		$("#tbltransaksiketetapan_pajakindustri").val(pajakid.toFixed(2));
		// $("#tbltransaksiketetapan_pajaknonindustri").val(pajaknonid.toFixed(2));

		$("#tbltransaksiketetapan_pajak").val(totalpajak);
		$("#tbltransaksiketetapan_omzettotal").val(omzet);
		setPriceFormat();
	}

	function hitungOmzet() {
		var pajak = valNum( $("#tbltransaksiketetapan_pajak").val() );
		var tarif = !isNaN( trf = $("#tbltransaksiketetapan_tarif").val() ) ? trf/100 : 0;
		var rupiahdenda = valNum( $("#tbltransaksiketetapan_rupiahdenda").val() );

		omzet = (pajak - Number(rupiahdenda)) / tarif;
		$("#tbltransaksiketetapan_omzetindustri").val(omzet.toFixed(0));

		$("#tbltransaksiketetapan_omzettotal").val(omzet);
		setPriceFormat();
	}

	function setMasaPajak() {
		$("#tbltransaksiketetapan_masaawal").val('');
		$("#tbltransaksiketetapan_masaakhir").val('');
		thn = $("#tbltransaksiketetapan_tahunpajak").val();
		bln = $("#tbltransaksiketetapan_bulanpajak").val();
		c = $("#tbltransaksiketetapan_notransaksi").val();
		if (thn!='' && bln!='') {
			// el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tbltransaksiketetapan_omzetindustri, #tbltransaksiketetapan_omzetnonindustri, #tbltransaksiketetapan_rupiahdenda, #tbltransaksiketetapan_pajak, #tbltransaksiketetapan_pajakindustri, #tbltransaksiketetapan_pajaknonindustri";
			if (c!='') {
				el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tbltransaksiketetapan_omzetindustri, #tbltransaksiketetapan_rupiahdenda, #tbltransaksiketetapan_pajak";
				jQuery.each(el.split(', '), function(index, val) {
				  $(val).val($(val)[0].defaultValue);
				});
				window.cmdp = 'tambah';
				window.idtranskttap = 0;
				isSudahPendataan(thn, bln, c);
			}
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
				,"param[tbltransaksiketetapan_notransaksi]" : {
					required : false
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

	$(document).ready(function(){
		$('#pilih_jenissumber').on('change', function() {
		if ( this.value == '1'){
	  	$("#non-industri").show();
	  	$("#industri").hide();
	  	$("#listrik-sendiri").hide();
	  } else if (this.value == '2'){

	  	$("#non-industri").hide();
	  	$("#industri").show();
	  	$("#listrik-sendiri").hide();

	  } else if (this.value == '3'){
	  	$("#non-industri").hide();
	  	$("#industri").hide();
	  	$("#listrik-sendiri").show();
	  }
	});
	});

	function simpanPendataan() {
		var addparam = {id: window.idtranskttap, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/SimpanPPJ',
			type: 'POST',
			dataType: 'json',
			data: $("#form-pendataan").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalPendataan").modal('hide');
					notifikasi('Berhasil','Pendataan berhasil dientrikan ke sistem','success',1,0);
					setTimeout(function() {
						detailIzinPemohon(window.idpemohon);
					}, 1000);
				} else {
				}
			}
		});
		
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