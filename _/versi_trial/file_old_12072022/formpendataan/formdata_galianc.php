<form id="form-pendataan" class="smart-form">
	<fieldset id="sss">
		<div>
			<div class="col col-8" style="border-right: 1px solid #000;">
				<div class="row" >
					<div class="col col-6">
						<label for="label" class="input">NPWPD</label>
						<label id="form_npwpd"></label>
					</div>
					<div class="col col-6">
						<label for="label" class="input">Nama WP</label>
						<label id="form_namawp"></label>
					</div>
				</div>

				<br>

				<div class="row" >
					<div class="col col-6">
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
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td></td>
								<td>Kode Bahan</td>
								<td>Nama Bahan C</td>
								<td>Tonase</td>
								<td>Harga</td>
							</tr>
						</thead>
						<tbody id="_listDetail_">
						</tbody>
						<tfoot>
							<tr id="form-detail">
								<td>
								</td>
								<td>
									<label class="select">
										<?php $data['jenis_galianc'] = DBFetch::query(array('from'=>'refjenisgalianc','mode'=>'LIST')); ?>
										<select id="dtl_refjenisgalianc_id">
											<option value="">-- Pilih Galian --</option>
											<?php foreach ($data['jenis_galianc'] as $jenis_galianc): ?>
												<option nama="<?= $jenis_galianc['refjenisgalianc_nama'] ?>" tarif="<?= $jenis_galianc['refjenisgalianc_tarif'] ?>" value="<?= $jenis_galianc['refjenisgalianc_id'] ?>"><?= $jenis_galianc['refjenisgalianc_nama'] ?></option>
											<?php endforeach ?>
										</select>
									</label>
								</td>
								<td>
									<label class="input">
										<input readonly="" class="disabled" type="text" id="dtl_refjenisgalianc_nama" placeholder="Nama Bahan">
										<i class="icon-append fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input class="format-desimal valid" type="text" id="dtl_tblpendataangalianc_tonase" placeholder="Tonase">
										<i class="icon-append fa fa-square "></i>
									</label>
								</td>
								<td>
									<label class="input">
										<input readonly="" class="disabled" type="text" id="dtl_tblpendataangalianc_harga" placeholder="Harga Bahan">
										<i class="icon-append fa fa-money "></i>
									</label>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<a class="pull-right btn btn-sm btn-success" onclick="tambahDetail()"><i class="fa fa-plus"></i> Perbaharui Data</a>
								</td>
								<td>Jumlah</td>
								<td>Rp <span id="dtl_tblpendataangalianc_totalharga"></span></td>
							</tr>
						</tfoot>
					</table>
				</div>

				<br>

				<div class="row" >
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
								<option selected="" value="Self Assesment">Self Assesment</option>
								<option value="Official Assesment">Official Assesment</option>
							</select>
						</label>
					</div>
				</div>
			</div>
			<section class="col col-4 pull-right">
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

	$(function() {
		operation = "A"; //"A"=Adding; "E"=Editing
		selected_index = -1; //Index of the selected list item
		tblpendataan_galianc = localStorage.getItem("tblpendataan_galianc");//Retrieve the stored data
		tblpendataan_galianc = JSON.parse(tblpendataan_galianc); //Converts string to object
		if(tblpendataan_galianc == null) //If there is no data, initialize an empty array
			tblpendataan_galianc = [];

		listDetail();
	});

	function tambahDetail() {
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
				tblpendataan_galianc[selected_index] = rs;
			} else if (operation=='A') {
				tblpendataan_galianc.push( rs );
			}
			localStorage["tblpendataan_galianc"] = JSON.stringify( tblpendataan_galianc );
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
		rs = tblpendataan_galianc[selected_index];
	 
		$("#dtl_refjenisgalianc_id").val(rs.refjenisgalianc_id);
		$("#dtl_refjenisgalianc_nama").val(rs.refjenisgalianc_nama);
		$("#dtl_tblpendataangalianc_tonase").val(rs.tblpendataangalianc_tonase);
		$("#dtl_tblpendataangalianc_harga").val(rs.tblpendataangalianc_harga);
	 	return true;
	}

	function hapusDetail(selected_index) {
		tblpendataan_galianc.splice(selected_index, 1);
		localStorage.setItem("tblpendataan_galianc", JSON.stringify(tblpendataan_galianc));
		listDetail();
	}

	function listDetail() {
		total_harga = 0;
		$("#_listDetail_").html("");
		for(var i in tblpendataan_galianc){ 
			var rs = (tblpendataan_galianc[i]);
			total_harga += ( Number(toAngka(rs.tblpendataangalianc_tonase))*rs.tblpendataangalianc_harga);
			$("#_listDetail_").append(
				'<tr>'
					+'<td><a class="btn btn-sm btn-warning  btn-circle" onclick="editDetail('+i+')"><i class="fa fa-pencil"></i></a>'
					+'<a class="btn btn-sm  btn-danger btn-circle" onclick="hapusDetail('+i+')"><i class="fa fa-times"></i></a></td>'
					+'<td></td>'
					+'<td>'+rs.refjenisgalianc_nama+'</td>'
					+'<td>'+formatRibuan(toAngka(rs.tblpendataangalianc_tonase)) +'</td>'
					+'<td>'+formatRibuan(rs.tblpendataangalianc_harga) +'</td>'
				+'</tr>'
			);
		}
		$("#dtl_tblpendataangalianc_totalharga").html( formatRibuan(total_harga) );
		$("#tbltransaksiketetapan_omzettotal").val( total_harga );
		setPriceFormat();
		hitungPajak();
	}

	function updateDetail(){
		var jns = $("#dtl_refjenisgalianc_id :selected");
		id = jns.val();
		tarif = jns.attr('tarif');
		nama = jns.attr('nama');
		tonase = $("#dtl_tblpendataangalianc_tonase").val();

		
		localStorage.setItem("tblpendataan_galianc", JSON.stringify(tblpendataan_galianc));
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
	$("#dtl_refjenisgalianc_id").change(function(event) {
		$("#dtl_refjenisgalianc_nama").val( $("#dtl_refjenisgalianc_id :selected").attr('nama') );
		$("#dtl_tblpendataangalianc_harga").val( formatRibuan( Number( $("#dtl_refjenisgalianc_id :selected").attr('tarif') ) ) );
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
					simpanDetailGalianC(respon.pk);
				} else {
				}
			}
		});
	}
	function simpanDetailGalianC(id) {
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_ketetapan/simpanDetailGalianC',
			type: 'POST',
			dataType: 'json',
			data: {
				tbltransaksiketetapan_id: id
				,tblpendataangalianc: localStorage.getItem("tblpendataan_galianc")
			},
			success: function(respon) {
				localStorage.setItem("tblpendataan_galianc","[]");
				tblpendataan_galianc = [];
				detailIzinPemohon(window.idpemohon);
			}
		});
	}
</script>
<style type="text/css">
	.disabled{
		background: #ddd !important;
	}
</style>