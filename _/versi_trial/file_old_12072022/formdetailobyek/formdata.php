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
						<label for="label" class="input">Masa Pajak Akhir</label>
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
								<option selected="" value="Self Assesment">Self Assesment</option>
								<option value="Official Assesment">Official Assesment</option>
							</select>
						</label>
					</div>
				</div>
			</div>
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
	<input type="hidden" name="param[tblobyek_id]" id="xxobyidxx" value="<?= $data['obyek_id'] ?>" />
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
			el = "#tbltransaksiketetapan_tglentrisptpd, #tbltransaksiketetapan_tglterimasptpd, #tbltransaksiketetapan_omzettotal, #tbltransaksiketetapan_rupiahdenda, #tbltransaksiketetapan_pajak";
			jQuery.each(el.split(', '), function(index, val) {
			  $(val).val($(val)[0].defaultValue);
			});
			window.cmdp = 'tambah';
			window.idtranskttap = 0;	
			masapajak = moment([thn,(bln-1)]);
			$("#tbltransaksiketetapan_masaawal").val(masapajak.format('L'));
			$("#tbltransaksiketetapan_masaakhir").val(masapajak.endOf('month').format('L'));
			isSudahPendataan(thn, bln);
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
					setTimeout(function() {
						detailIzinPemohon(window.idpemohon);
					}, 1000);
				} else {
				}
			}
		});
	}
		

	function isSudahPendataan(t,b) {$.post('<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/isSudahPendataan', {xxobyidxx: senc($("#xxobyidxx").val()),t:senc(t),b:senc(b)}, function(respon) {if (respon.status=='exist') {$("[btnid=<?= $xc ?>]").hide();konfirm(respon.id);notifikasi('Info','Masa Pajak terpilih sudah dibuat.','fail',1,0); } else {$("[btnid=<?= $xc ?>]").show(); } },"json"); }

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