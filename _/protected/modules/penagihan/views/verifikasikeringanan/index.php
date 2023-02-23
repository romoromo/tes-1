<?php define('ASSETS_URL', $data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light">
			<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-check"></i>
				Verifikasi Permohonan Keringanan Ketetapan Pajak</h1>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="well">
			<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Daftar Permohonan Keringanan</h2>
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
						<div class="widget-body-toolbar">
							<!-- <button class="btn btn-primary" onclick="tambah()">
								<i class="fa fa-plus-square"></i> Tambah Data
							</button> -->
						</div>
						<div id="listdata">
							<table id="dt_basic_pipeline" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-hide="phone">No</th>
										<th data-hide="phone">Tgl Input</th>
										<th data-class="expand">NPWPD </th>
										<th data-hide="phone,tablet">Jenis Pajak</th>
										<th data-hide="phone,tablet">Jenis Ketetapan</th>
										<th data-hide="phone,tablet">Masa Pajak</th>
										<th data-hide="phone,tablet">Besar Pengurangan</th>
										<th data-hide="phone,tablet">Alasan Mengajukan Pengurangan</th>
										<th data-hide="phone,tablet">Aksi</th>
									</tr>
								</thead>
								<tbody>

									<!-- <tr>
										<td>1</td>
										<td>3.0000036.05.16</td>
										<td>Hotel</td>
										<td>SKPDKB</td>
										<td>2020</td>
										<td>50 %</td>
										<td>Karena sepi</td>
										<td><a type="button" onclick="edit()" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp;
												Edit </a>
											<button onclick="hapus()" type='button' class='btn btn-danger btn-sm'> <i class="fa fa-trash-o"></i>&nbsp;
												Hapus </button>
										</td>
									</tr> -->

								</tbody>
							</table>
						</div>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Verifikasi Data Keringanan
				</h4>
			</div>

			<div class="modal-body no-padding">
				<form id="form-data-keringanan" class="smart-form">

					<fieldset>

						<section>
							<div class="row">
								<label class="label col col-4">NPWPD</label>
								<!-- <div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="param[tblpejabat_nama]" id="tblpejabat_nama">
									</label>

								</div> -->
								<section class="col col-10">
									<!-- 
				                      <label>Cari Nomor Pendafataran/ Pemohon Izin</label> -->
									<label class="input">
										<input class="input" readonly="" type="text" id="nopok" name="nopok" class="form-control">
									</label>
								</section>
							</div>
						</section>



						<section>
							<div class="row">
								<label class="label col col-4"> Nama Pemohon</label>
								<div class="col col-10">
									<label class="input">
										<input class="input" type="text" readonly="" value="" class="form-control" id="namapemohon" name="namapemohon">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Nama Jabatan Pemohon</label>
								<div class="col col-10">
									<label class="input">
										<input class="input" readonly="" type="text" value="" class="form-control" id="jabatanpemohon" name="jabatanpemohon">
									</label>
								</div>
							</div>
						</section>


						<section>
							<div class="row">
								<label class="label col col-4"> Nama Usaha/Instansi</label>
								<div class="col col-10">
									<label class="input">
										<input class="input" type="text" readonly="" class="form-control" id="namabadanusaha" name="namabadanusaha">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Alamat Pemohon</label>
								<div class="col col-10">
									<label class="input">

										<input class="input" rows="3" readonly="" name="alamatpemohon" id="alamatpemohon" class="form-control"></input>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> No Telp/Hp</label>
								<div class="col col-10">
									<label class="input">
										<input class="input" readonly="" type="number" value="" class="form-control" id="teleponpemohon" name="teleponpemohon">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Pajak</label>
								<div class="col col-10">
									<label class="select">
										<select readonly="" style="width:100%" class="select2" id="jenispajak" name="jenispajak">
											<option value="">== Pilih Jenis Pajak ==</option>
											<option value="1">PAJAK HOTEL </option>
											<option value="2">PAJAK RESTORAN </option>
											<option value="3">PAJAK HIBURAN </option>
											<option value="4">PAJAK REKLAME </option>
											<option value="7">PAJAK PARKIR</option>
											<option value="8">PAJAK AIR TANAH </option>
										</select>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Ketetapan</label>
								<div class="col col-10">
									<label class="select">
										<select readonly="" style="width:100%" class="select2" id="jenisketetapan" name="jenisketetapan">
											<option value="">== Pilih Jenis Ketetapan ==</option>
											<option value="SKPD">SKPD</option>
											<option value="SKPDKB">SKPDKB</option>
											<option value="SKPD-A">SKPD-A</option>
											<option value="STPD">STPD</option>
										</select>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Jenis Permohonan Keringanan</label>
								<div class="col col-10">
									<label class="select">
										<select readonly="" style="width:100%" class="select2" id="jenisringan" name="jenisringan">
											<option value="">== Pilih Jenis ==</option>
											<option value="pokok">Keringanan Ketetapan Pokok</option>
											<option value="bunga">Keringanan Bunga KB / Angsuran</option>
											<option value="denda">Keringanan Denda Keterlambatan</option>
											<option value="bungadenda">Keringanan Bunga dan Denda</option>
										</select>
									</label>
								</div>
							</div>
						</section>


						<!-- <section>
							<div class="row">
								<label class="label col col-4">No SK Ketetapan</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-square"></i>
										<input value="" type="text" name="nokohir" id="nokohir">
									</label>

								</div>
							</div>
						</section> -->

						<!-- <a class="btn btn-sm btn-warning" onclick="getModalmasapajak()">
							<i class="fa fa-plus"></i> Tambah Masa Pajak
						</a> -->
						<br>
						<br>

						<div class="row" style="padding-left: 10px;padding-right: 10px;">
							<div class="" style="width: auto;overflow-x: auto;">
								<table id="tbldetil" class="table table-striped table-bordered table-hover smart-form" width="100%">
									<thead>
										<tr>
											<th width="2%" class="text-align-center">No</th>
											<th width="2%" class="text-align-center">Tahun Pajak</th>
											<th width="5%" class="text-align-center">Bulan Pajak </th>
											<th width="5%" class="text-align-center">No SK Ketetapan</th>
											<th width="10%" class="text-align-center">Rupiah Ketetapan</th>
											<!-- <th width="10%" class="text-align-center">Satuan</th>
													<th width="25%" class="text-align-center">Uraian </th>
                                                    <th width="10%" class="text-align-center">Jumlah</th> -->
											<th width="5%" class="text-align-center">Aksi</th>
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
											<!-- <td></td>
                                                    <td></td>
                                                    <td></td> -->
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="4">
											</td>
											<td>
												<span class="pull-right dtl_total"></span>
												<input type="hidden" name="total" class="dtl_total" />
											</td>
											<td>
											</td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
						<br>

						<!-- <section>
							<div class="row">
								<label class="label col col-4"> Masa Pajak</label>
								<div class="col col-10">
									<label class="select">
											<label class="input">
												<input type="number" value="<?= date('Y') ?>" class="form-control" id="thp" name="thp">
											</label>
										</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Bulan Pajak</label>
								<div class="col col-10">
									<label class="input">
										<select style="width:100%" class="select2" id="blp" name="blp" >
											<option value="">== Pilih Bulan ==</option>
											<option value="1">Januari </option>
											<option value="2">Februari  </option>
											<option value="3">Maret </option>
											<option value="4">April</option>
											<option value="5">Mei </option>
											<option value="6">Juni </option>
											<option value="7">Juli </option>
											<option value="8">Agustus </option>
											<option value="9">September </option>
											<option value="10">Oktober </option>
											<option value="11">November </option>
											<option value="12">Desember </option>
										</select>
									</label>
								</div>
							</div>
						</section> -->




						<section style="display: none;">
							<div class="row">
								<label class="label col col-4"> No Sumur</label>
								<div class="col col-10">
									<label class="input">
										<input class="input" type="number" value="" class="form-control" id="nomorsumur" name="nomorsumur">
									</label>
								</div>
							</div>
						</section>

						<section style="display: none;">
							<div class="row">
								<label class="label col col-4"> Isi Reklame</label>
								<div class="col col-10">
									<label class="input">
										<input class="input" type="text" value="" class="form-control" id="isireklame" name="isireklame">
									</label>
								</div>
							</div>
						</section>

						<!-- <section>
							<div class="row">
								<label class="label col col-4"> Jatuh Tempo</label>
							</div>
							<br>
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
								<section class="col col-md-3">
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
								<section class="col col-md-1">
									Tgl
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" type="number" id="tgl" name="tgl">
									</label>
								</section>
							</div>
						</section> -->



						<section style="display: none;">
							<div class="row">
								<label class="label col col-4"> Lokasi</label>
								<div class="col col-10">
									<label class="input">
										<input class="input" type="text" value="" class="form-control" id="lokasireklame" name="lokasireklame">
										<!-- <textarea rows="3" name="info" id="lokasi"></textarea>  -->
									</label>
								</div>
							</div>
						</section>


						<section>
							<div class="row">
								<label class="label col col-4"> Besar Pengurangan yang diminta</label>
							</div>
							<div class="row">
								<div class="col col-10">
									<label readonly="" class="input"> <i class="icon-append"><b>%</b></i>
										<input class="input" value="" type="number" name="besarpengurangan" id="besarpengurangan">
									</label>
								</div>
								<!-- 
								<div class="col col-4">
									<label class="label col col-4"> %</label>
								</div> -->
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Alasan mengajukan Pengurangan</label>
								<div class="col col-10">
									<label class="textarea">
										<textarea readonly="" class="textarea" rows="3" name="alasan" id="alasan"></textarea>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Hasil Penelitian</label>
								<div class="col col-10">
									<label class="textarea">
										<textarea class="textarea" rows="3" name="hasilpenelitian" id="hasilpenelitian"></textarea>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Keputusan pengabulan</label>
								<div class="col col-10">
									<label class="select">
										<select style="width:100%" class="select2" id="hasilkeputusan" name="hasilkeputusan">
											<!-- <option value="">== Pilih Jenis ==</option> -->
											<option value="DIKABULKAN SELURUH">Dikabulkan Seluruh</option>
											<option value="DIKABULKAN SEBAGIAN">Dikabulkan Sebagian</option>
											<option value="DITOLAK">Ditolak</option>
										</select>
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Besar Pengurangan yang dikabulkan</label>
							</div>
							<div class="row">
								<div class="col col-10">
									<label class="input"> <i class="icon-append"><b>%</b></i>
										<input class="input" value="" type="number" name="besardikabulkan" id="besardikabulkan">
									</label>
								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4"> Tim Penelitian</label>
								<div class="col col-10">
									<label class="textarea">
										<textarea class="textarea" rows="3" name="tim" id="tim"></textarea>
									</label>
								</div>
							</div>
						</section>




					</fieldset>

					<footer>

						<button id="btnsimpan" type="submit" class="btn btn-primary">
							Diproses
						</button>
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-data-masapajak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-file"></i> Data Masa Pajak
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-data-masapajak">
					<fieldset style="overflow-y: scroll; height: 300px;">

						<div role="content">

							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->

							</div>
							<!-- end widget edit box -->



							<br>
							<br>

							<!-- widget content -->
							<div class="widget-body">

								<div id="form_masapajak" class=""></div>

							</div>
						</div>
					</fieldset>
					<footer>
						&nbsp;
					</footer>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	// loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function() {
	// 	generateAutocomplete();
	// });

	setInterval(() => {
		loadDataTable();
	}, 60000); //1 menit = 60*1000

	// function generateAutocomplete() {
	// 	$('#nopok').autocomplete({
	// 		serviceUrl: 'penagihan/verifikasikeringanan/Autocomplete',
	// 		onSelect: function(suggestion) {
	// 			$(this).val(suggestion.value);
	// 			$('#nopok').val(suggestion.TBLDAFTAR_NOPOK);
	// 			$('#namabadanusaha').val(suggestion.TBLDAFTAR_BADANUSAHANAMA);
	// 			$('#alamatpemohon').val(suggestion.TBLDAFTAR_BADANUSAHAALAMAT);
	// 			$('#jenispajak').select2('val', suggestion.REFBADANUSAHA_REKAYAT);
	// 			$("#jenispajak").select2('readonly', 1);

	// 		},
	// 		showNoSuggestionNotice: true,
	// 		noCache: true,
	// 		noSuggestionNotice: "Tidak ditemukan data "
	// 	});
	// }

	/*form validation*/
	loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);

	function runFormValidation() {
		var $FormData = $("#form-data-keringanan").validate({
			// Rules for form validation
			rules: {
				"nopok": {
					required: true
				},
				"namapemohon": {
					required: true
				}
				// ,"alamatpemohon" : {
				// 	required : true
				// }
				,
				"teleponpemohon": {
					required: true
				},
				"jabatanpemohon": {
					required: true
				},
				"jenispajak": {
					required: true
				},
				"jenisketetapan": {
					required: true
				},
				"jenisringan": {
					required: true
				}

				,
				"besarpengurangan": {
					required: true
				},
				"alasan": {
					required: true
				},
				"hasilpenelitian": {
					required: true
				},
				"hasilkeputusan": {
					required: true
				},
				"besardikabulkan": {
					required: true
				}


			},

			// Messages for form validation
			messages: {
				"nopok": {
					required: 'Mohon isikan NPWPD'
				},
				"namapemohon": {
					required: 'Mohon isikan nama pemohon'
				}
				// ,"alamatpemohon" : {
				// 	required : 'Mohon isikan alamat pemohon '
				// }
				,
				"teleponpemohon": {
					required: 'Mohon isikan nomor telepon'
				},
				"jabatanpemohon": {
					required: 'Mohon isikan jabatan pemohon'
				},
				"jenispajak": {
					required: 'Mohon pilih jenis pajak'
				},
				"jenisketetapan": {
					required: 'Mohon pilih jenis ketetapan '
				},
				"jenisringan": {
					required: 'Mohon pilih jenis keringanan'
				},
				"besarpengurangan": {
					required: 'Mohon isi besar pengurangan'
				},
				"alasan": {
					required: 'Mohon isi alasan'
				},
				"hasilpenelitian": {
					required: 'Mohon isi hasil penelitian'
				},
				"hasilkeputusan": {
					required: 'Mohon pilih hasil keputusan'
				},
				"besardikabulkan": {
					required: 'Mohon isi persen dikabulkan'
				}
			},

			// Do not change code below
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler: function(form) {
				// saat validasi benar semua, jalankan simpan()
				return simpan();
			}
		});

	};
	/*//form validation*/

	function tambah() {
		window.cmd = "tambah";
		window.id = '';
		$("#modal-form").modal("show");
		$("#form-data-keringanan .input").val('');
		$("#form-data-keringanan .select2").select2('val', '');
		$("#form-data-keringanan .textarea").val('');
		$("#_listDetail_").html('');
		$(".dtl_total").html('');
		localStorage.clear();

	}

	function verifikasi(id) {

		var param = {
			id: id
		}
		$.ajax({
				url: 'penagihan/verifikasikeringanan/verifikasidata',
				type: 'POST',
				dataType: 'json',
				data: param,
			})
			.done(function(respon) {

				$("#modal-form").modal("show");
				$("#nopok").prop('readonly', 1);
				window.cmd = 'verifikasi';
				window.id = respon.data.mohonringan.TBLMOHONRINGAN_ID;

				daftarmasapajak = [];
				localStorage.setItem("daftarmasapajak", JSON.stringify(daftarmasapajak));
				$("#_listDetail_").html('');

				$('#nopok').val(respon.data.mohonringan.TBLDAFTAR_NOPOK);
				$('#namapemohon').val(respon.data.mohonringan.TBLMOHONRINGAN_NAMA);
				$('#jabatanpemohon').val(respon.data.mohonringan.TBLMOHONRINGAN_JAB);
				$('#namabadanusaha').val(respon.data.mohonringan.TBLDAFTAR_BADANUSAHANAMA);
				$('#alamatpemohon').val(respon.data.mohonringan.TBLDAFTAR_BADANUSAHAALAMAT);
				$('#teleponpemohon').val(respon.data.mohonringan.TBLMOHONRINGAN_TELP);
				$('#jenispajak').select2('val', respon.data.mohonringan.TBLMOHONRINGAN_REKAYAT);
				$('#jenisketetapan').select2('val', respon.data.mohonringan.TBLMOHONRINGAN_JNSBAYAR);
				$('#jenisringan').select2('val', respon.data.mohonringan.TBLMOHONRINGAN_JNSRINGAN);
				$('#besarpengurangan').val(respon.data.mohonringan.TBLMOHONRINGAN_PERSEN);
				$('#alasan').val(respon.data.mohonringan.TBLMOHONRINGAN_ALASAN);

				var detail = respon.data.daftringan;
				$.each(detail, function(idx, rs) {
					addmasapajakToTabel(rs.TBLPENDATAAN_THNPAJAK, rs.TBLPENDATAAN_BLNPAJAK, rs.TBLDAFTRINGAN_REGKETETAPAN, rs.TBLDAFTRINGAN_POKAWAL, rs.CONVBULAN, rs.TBLDAFTRINGAN_POKAWAL);
				});

			})


			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
	}

	function simpan() {
		// return "success";
		$(".btnsimpan").attr('disabled', 1);
		var addparam = {
			daftarmasapajak: localStorage.getItem("daftarmasapajak"),
			cmd: window.cmd,
			id: window.id
		}

		$.ajax({
				url: 'penagihan/verifikasikeringanan/simpan',
				type: 'post',
				dataType: "json",
				data: $("#form-data-keringanan").serialize() + '&' + jQuery.param(addparam),
			})
			.done(function(respon) {
				if (respon.status == 'success') {
					notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1, 0);
					$("#modal-form").modal("hide");
					$(".btnsimpan").attr('disabled', 1);
					localStorage.clear();
					$("#_listDetail_").html('');
					$(".dtl_total").html('');
					loadDataTable();
				} else {
					notifikasi('Gagal', 'Data Gagal Disimpan', 'fail', 1, 0);
					$(".btnsimpan").removeAttr('disabled');
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				$(".btnsimpan").removeAttr('disabled');
			});

	}

	function hapus(id) {
		$.SmartMessageBox({
			title: "Konfirmasi Hapus", // judul Smart Alert
			content: "Apakah anda yakin akan menghapus data ini", // konten dari smart alert
			buttons: '[Tidak][Ya]' // pengaturan tombol
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'penagihan/verifikasikeringanan/hapus',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
					},
					success: function(respon) {
						if (respon.status == 'success') {
							notifikasi('Sukses', 'Data Berhasil Dihapus', 'success', 1, 0);
							loadDataTable();
						} else {
							notifikasi('Gagal', 'Data Gagal Dihapus', 'fail', 1, 0);
						}
					}
				});

			}

		});
	}

	function getModalmasapajak() {

		setTimeout(function() {
			GetMasapajak();
		}, 10);
	}

	function GetMasapajak() {
		var nopok = $('#nopok').val();
		var jenispajak = $('#jenispajak').select2('val');
		var jenisketetapan = $('#jenisketetapan').select2('val');
		if (nopok == '' || jenispajak == '' || jenisketetapan == '') {
			notifikasi('Informasi', 'Mohon Lengkapi Data', 'failed', 1, 0);
		} else {

			$.ajax({
					url: 'penagihan/verifikasikeringanan/LoadMasapajak',
					type: 'POST',
					data: {
						nopok: $('#nopok').val(),
						jenispajak: $('#jenispajak').select2('val'),
						jenisketetapan: $('#jenisketetapan').select2('val'),
					},
					success: function(respon) {
						$("#modal-data-masapajak").modal('show');
						setTimeout(function() {
							$('#form_masapajak').html(respon);
						}, 100);
					}
				})
				.fail(function() {
					notifikasi('Informasi', 'Error, Mohon Menghubungi Admin', 'failed', 1, 0);
				});
		}
	}

	function addmasapajakToTabel(thp, blp, nokb, rpkb, namabulan, ribuan) {

		$("#modal-data-masapajak").modal('hide');

		rs = {
			"no": "",
			"thp": thp,
			"blp": blp,
			"nokb": nokb,
			"rpkb": rpkb,
			"namabulan": namabulan,
			"ribuan": ribuan
		};
		daftarmasapajak.push(rs);
		localStorage["daftarmasapajak"] = JSON.stringify(daftarmasapajak);
		listDetail();
	}

	function listDetail() {
		$("#_listDetail_").html("");
		total_tap = 0;
		daftarmasapajak = localStorage.getItem("daftarmasapajak");
		daftarmasapajak = JSON.parse(daftarmasapajak);
		var no = 1;

		for (var i in daftarmasapajak) {
			var rs = (daftarmasapajak[i]);
			total_tap += Number(Math.round(rs.rpkb));

			$("#_listDetail_").append(
				'<tr>' +
				'<td>' + (no++) + '</td>' +
				'<td>20' + rs.thp + '</td>'

				+
				"<td>" + rs.namabulan + '</td>'

				+
				'<td>' + rs.nokb + '</td>'

				+
				'<td>' + rs.ribuan + '</td>'

				+
				'<td>' +
				'</td>'

				+
				'</tr>'
			);
			i++;
		}
		$(".dtl_total").html(total_tap);
		// setPriceFormat();
	}

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
		daftarmasapajak = [];
		localStorage.setItem("daftarmasapajak", JSON.stringify(daftarmasapajak));
		$("#_listDetail_").html('');
		loadDataTable();
	});

	function hapusDetail(selected_index) {
		daftarmasapajak.splice(selected_index, 1);
		localStorage.setItem("daftarmasapajak", JSON.stringify(daftarmasapajak));
		listDetail();
	}

	function loadDataTable() {
		var totalRecords = '';
		var ajaxUrl = "penagihan/verifikasikeringanan/DTJSON"; // url that fetches the data for the table
		COLUMN = [{
			"data": "num"
		}, {
			"data": "TGLINPUT"
		}, {
			"data": "TBLDAFTAR_NOPOK"
		}, {
			"data": "TBLREKENING_NAMAREKENING"
		}, {
			"data": "TBLMOHONRINGAN_JNSBAYAR"
		}, {
			"data": "THPBLP"
		}, {
			"data": "TBLMOHONRINGAN_PERSEN"
		}, {
			"data": "TBLMOHONRINGAN_ALASAN"
		}, {
			"data": "TBLMOHONRINGAN_ID",
			"render": function(data, type, full, meta) {

				if (full['TBLMOHONRINGAN_PERSENKEP'] != 0) {
					return '<div align="center"><a rel="tooltip" data-placement="left" data-original-title="Klik untuk verifikasi data" onclick="verifikasi(' + data + ')" class="btn btn-circle btn-primary"><i class="fa fa-check"></i></a>' +
						'&nbsp;<a rel="tooltip" data-placement="left" data-original-title="Klik untuk cetak" onclick="cetakba(' + data + ')" class="btn btn-circle btn-danger"><i>BA</i></a></div>';
				} else {
					return '<div align="center"><a rel="tooltip" data-placement="left" data-original-title="Klik untuk verifikasi data" onclick="verifikasi(' + data + ')" class="btn btn-circle btn-primary"><i class="fa fa-check"></i></a></div>';
				}

			}
		}];
		drawTablePipeLine($('#dt_basic_pipeline'), 1, totalRecords, ajaxUrl, COLUMN, pageSetUp); //Initializes the datatable
	}

	$('#jenisketetapan').change(function(e) {
		daftarmasapajak = [];
		localStorage.setItem("daftarmasapajak", JSON.stringify(daftarmasapajak));
		$("#_listDetail_").html('');
		$(".dtl_total").html('');
		e.preventDefault();
	});

	function cetakba(id) {
		var param = {
			id: id,
		}
		window.open('penagihan/verifikasikeringanan/cetakba/?' + jQuery.param(param));
	}
</script>