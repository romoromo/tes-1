
<div class="table-responsive">

	<table class="table table-bordered table-striped" style="margin-bottom: -1px !important;">
		<tbody>
			<tr>
				<td>
					<div id="detailPemohon" class="smart-form">
						<fieldset>
							<?php
							$status = $data['detail_pemohon']['TBLSUBYEK_JENISUSAHA'];
							$jenisIdentitas = '';
							if ($status=='Perorangan') {
								# jika status pemohon perseorangan
								$jenisIdentitas = "KTP";
								$nomorIdentitas = LokalIndonesia::formatKTP( $data['detail_pemohon']['TBLSUBYEK_NIK'] );
							} elseif ($status=='Badan Usaha') {
								# jika status pemohon badan usaha
								$jenisIdentitas = "NPWP";
								$nomorIdentitas = LokalIndonesia::formatNPWP( $data['detail_pemohon']['TBLSUBYEK_NPWP'] );
							}
							?>
							<div class="row">
								<!-- <section class="col col-md-12">
									<button type="submit" class="btn btn-sm btn-primary" onclick="edit_pemohon()" style="float: right;">
										<i class="fa fa-edit"></i> Edit Data Utama
									</button>
								</section> -->
							</div>

					<?php  if ($status=='Perorangan'): ?>
						<div class="row">
							<section class="col col-md-12">
								<header style="margin: 0px 0px 0;border-color:  red;">
									Info Pemilik Pajak
								</header>
							</section>
						</div>

						<div class="row" style="background-color: #FAEBD7;">
							<div class="col col-md-5" style="width: 47% !important;">
								<div class="row" style="margin-top: 13px;">
									<section class="col col-md-5">
										Status Pemohon
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6">Perorangan</section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										KTP
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $nomorIdentitas ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Pemilik Pajak
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['TBLSUBYEK_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Provinsi
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFPROPINSI_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Kabupaten
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFKABUPATEN_NAMA'] ?></section>
								</div>
							</div>

							<div class="col col-md-2" style="width: 5% !important;">
								<div align="center">
									<hr style="border:  solid rgb(215, 6, 6);height: 256px;width: 0px;border-width: thin;">
									
								</div>
							</div>

							<div class="col col-md-5" style="width: 47% !important;">
								<div class="row" style="margin-top: 13px;">
									<section class="col col-md-5">
										Kecamatan
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFKECAMATAN_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Desa
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFKELURAHAN_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Jalan / RTRW
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['TBLSUBYEK_ALAMAT'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										No. Telpon
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['TBLSUBYEK_TELPON'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										<button class="btn btn-sm btn-primary" id="btnTambahObyek" onclick="tambahObyek()"><i class="fa fa-plus"></i> Tambah Data NPWPD</button>
									</section>
									<section class="col col-md-1"></section>
									<section class="col col-md-6"></section>
								</div>
							</div>
						</div>

						<?php require('detail-npwpd.php') ?>
					</div>


					<?php  elseif ($status=='Badan Usaha') : ?>
						<div class="row">
							<section class="col col-md-12">
								<header style="margin: 0px 0px 0;border-color:  red;">
									Info Pemilik Pajak
								</header>
							</section>
						</div>

						<div class="row" style="background-color: #FAEBD7;">
							<div class="col col-md-5" style="width: 47% !important;">
								<div class="row" style="margin-top: 13px;">
									<section class="col col-md-5">
										Status Pemohon
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6">Badan Usaha</section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										NPWP
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $nomorIdentitas ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Pemilik Pajak
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['TBLSUBYEK_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Provinsi
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFPROPINSI_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Kabupaten
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFKABUPATEN_NAMA'] ?></section>
								</div>
							</div>

							<div class="col col-md-2" style="width: 5% !important;">
								<div align="center">
									<hr style="border:  solid rgb(215, 6, 6);height: 256px;width: 0px;border-width: thin;">
									
								</div>
							</div>

							<div class="col col-md-5" style="width: 47% !important;">
								<div class="row" style="margin-top: 13px;">
									<section class="col col-md-5">
										Kecamatan
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFKECAMATAN_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Desa
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['REFKELURAHAN_NAMA'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										Jalan / RTRW
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['TBLSUBYEK_ALAMAT'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										No. Telpon
									</section>
									<section class="col col-md-1"><p align="center">:</p></section>
									<section class="col col-md-6"><?php echo $data['detail_pemohon']['TBLSUBYEK_TELPON'] ?></section>
								</div>
								<div class="row">
									<section class="col col-md-12"><hr></section>
								</div>
								<div class="row">
									<section class="col col-md-5">
										<button class="btn btn-sm btn-primary" id="btnTambahObyek" onclick="tambahObyek()"><i class="fa fa-plus"></i> Tambah Data NPWPD</button>
									</section>
									<section class="col col-md-1"></section>
									<section class="col col-md-6"></section>
								</div>
							</div>
						</div>

						<?php require('detail-npwpd.php') ?>
					</div>

					<?php endif; ?>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<?php //include_once 'form-obyek.php'; ?>

<!--Modal form pendataan-->
<div class="modal fade" id="modalPendataan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog" style="width: 80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button class="btn btn-danger pull-right" type="button" class="close" data-dismiss="modal" aria-hidden="true">
					X
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-tasks"></i> Form Pendataan Obyek
				</h4>
			</div>
			<div class="modal-body no-padding">

				<div class="widget-body" id="divPendataan" style="overflow-y: auto;max-height: 500px;">

				</div>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--End form pendataan-->

<!--Modal form pendataan-->
<div class="modal fade" id="modalDetailObyek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog" style="width: 80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button class="btn btn-danger pull-right" type="button" class="close" data-dismiss="modal" aria-hidden="true">
					X
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-tasks"></i> Form Detail Obyek
				</h4>
			</div>
			<div class="modal-body no-padding">

				<div class="widget-body fade in" id="divDetailObyek" style="overflow-y: auto;max-height: 500px;">

				</div>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--End form pendataan-->

<script type="text/javascript">

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
	pageSetUp();


	function lihat_setoran (id) {
		window.idob = id;
		/*window.idbdush = idbdush;
		$("#form_lihatsetoran_body").html(LOADER).fadeIn(400);
	  	$("#form_lihatsetoran").modal('show');
		$.ajax({
			url: '<?= $this->MODULE_URL ?>/detailObyekSetoran',
			type: 'POST',
			data: {id: id, idbdush: idbdush},
			success: function(response) {
				$("#form_lihatsetoran_body").html(response);
				$("#form_lihatsetoran_body").prepend(LOADER);
				$(".loader_img").fadeOut(1000);
			}
		});*/
		window.open('<?php echo Yii::app()->baseUrl; ?>/<?= $this->MODULE_URL ?>/detailObyekSetoran?id='+id);
	}

	function lihat_ketetapan (id) {
		window.idob = id;
		/*$("#form_lihatketetapan_body").html(LOADER).fadeIn(400);
		$("#form_lihatketetapan").modal('show');
		$.ajax({
			url: '<?= $this->MODULE_URL ?>/detailObyekKetetapan',
			type: 'POST',
			data: {id: id, idbdush: idbdush},
			success: function(response) {
				$("#form_lihatketetapan_body").html(response);
				$("#form_lihatketetapan_body").prepend(LOADER);
				$(".loader_img").fadeOut(1000);
			}
		});*/
		window.open('<?php echo Yii::app()->baseUrl; ?>/<?= $this->MODULE_URL ?>/detailObyekKetetapan?id='+id);
	}

	function lihat_tunggakan (id) {
		// $("#form_lihattunggakan").modal('show');
		window.idob = id;
		/*window.idbdush = idbdush;
		$("#form_lihattunggakan_body").html(LOADER).fadeIn(400);
		$("#form_lihattunggakan").modal('show');
		$.ajax({
			url: '<?= $this->MODULE_URL ?>/detailObyekTunggakan',
			type: 'POST',
			data: {id: id, idbdush: idbdush},
			success: function(response) {
				$("#form_lihattunggakan_body").html(response);
				$("#form_lihattunggakan_body").prepend(LOADER);
				$(".loader_img").fadeOut(1000);
			}
		});*/
		window.open('<?php echo Yii::app()->baseUrl; ?>/<?= $this->MODULE_URL ?>/detailObyekTunggakan?id='+id);
	}

</script>


<!--Modal form lihat storan-->
<div class="modal fade" id="form_lihatsetoran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog" style="width: 896px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-tasks"></i> Form Lihat Riwayat Setoran Pajak
				</h4>
			</div>
			<div class="modal-body no-padding">

				<div class="widget-body" id="form_lihatsetoran_body">
				</div>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--End form lihat storan-->

<!--Modal form lihat Ketetapan-->
<div class="modal fade" id="form_lihatketetapan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog" style="width: 896px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-tasks"></i> Form Lihat Riwayat Ketetapan Pajak
				</h4>
			</div>
			<div class="modal-body no-padding">

				<div class="widget-body" id="form_lihatketetapan_body">

				</div>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--End form lihat Ketetapan-->

<!--Modal form lihat Ketetapan-->
<div class="modal fade" id="form_lihattunggakan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog" style="width: 896px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-tasks"></i> Form Lihat Riwayat Tunggakan Pajak
				</h4>
			</div>
			<div class="modal-body no-padding" id="form_lihattunggakan_body">
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--End form lihat Ketetapan-->