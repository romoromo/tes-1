<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Check Data WP Per-Tahun</h4>
		</div>
	</div>
</div>
<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
		<div class="jarviswidget jarviswidget-color-teal jarviswidget-sortable" id="widget_cetakjenisbuku" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" role="widget" style="">
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Pencarian Data</h2>
				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>
				<div role="content">
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body">
						<form id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>
								<div class="row">
								<div class="row">
									<section class="col col-md-1">
										<p>Jenis Pajak </p>
									</section>
									<section class="col col-md-5">
										<label class="select"> 
											<select class="select2" id="no_subrek" name="no_subrek">
													<option value="">== Silahkan Pilih Jenis Pajak ==</option>
												<?php foreach ($data['rek'] as $list): ?>
														<option value="<?php echo $list['TBLREKENING_KODE'] ?>">[<?php echo $list['TBLREKENING_KODE'] ?>] <?php echo $list['TBLREKENING_NAMAREKENING'] ?></option>
													<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>Tahun </p>
									</section>
									<section class="col col-md-1">
										<label class="select">
											<label class="input">
												<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="masapajak_tahun" name="masapajak_tahun">
											</label>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-1">
										<p>No. Pokok WP</p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control" type="text" id="nomor_pajak" name="nomor_pajak" autocomplete="off">
										</label>
									</section>
									<section class="col col-md-1">
										<a class="btn btn-sm btn-default" onclick="tampil()">
											<i class="fa fa-desktop"></i> View
										</a>
									</section>
									<section class="col col-md-1">
										<a class="btn btn-sm btn-success" onclick="cetak()">
											<i class="fa fa-print"></i> Cetak
										</a>
									</section>
									<section class="col col-md-1">
										<a class="btn btn-sm btn-primary" onclick="cari2()">
											<i class="fa fa-search"></i> Cari
										</a>
									</section>						
								</div>	
								<table>
									<tr>
										<td>Nama</td>
										<td>&nbsp;&nbsp;:</td>
									</tr>
									<tr>
										<td>Alamat</td>
										<td>&nbsp;&nbsp;:</td>
									</tr>
								</table>
								</div>
							</fieldset>
							<!-- <footer>
								<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
									<i class="fa  fa-search"></i>&nbsp;Cari
								</button>
							</footer> -->
						</form>
					</div>
				</div>
			</div>
		</article>
	</div>
	</section>

	<div class="row">

	<!-- NEW WIDGET START -->

	<article class="col-sm-12 col-md-12 col-lg-12">


		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false"
		data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Hasil Pencarian </h2>

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
								
							</div>
							<div id="kontrol_table">
								<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th width="5%" data-hide="phone">NO</th>
											<th width="25%" data-class="expand">Bulan Pajak</th>
											<th data-hide="phone">Tgl SKPD</th>
											<th data-hide="phone, tablet">NO SKPD</th>
											<th data-hide="phone, tablet">SKPD (Rp)</th>
											<th data-hide="phone, tablet">NO SSPD</th>
											<th data-hide="phone, tablet">Tgl Setor</th>
											<th data-hide="phone, tablet">Jenis Setoran</th>
											<th data-hide="phone, tablet">Jumlah Setor</th>
										</tr>
										<?php $no=1; ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>

	</div>

	<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Pencarian Data
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">

					<fieldset>
					<b>N.P.W.P/R.D</b><hr><br>
						<div class="row">
							<section class="col col-sm-2">
								<p>NO NPWPRD</p>
							</section>
							<section class="col col-sm-5">
								<label class="input"> <i class="icon-append fa fa-square"></i>
									<input value="" type="text" name="param" id="">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Penerimaan</p>
							</section>
							<section class="col col-sm-5">
								<label class="select">
									<select id="penerimaan">
										<option value="0">=== Silahkan Pilih ===</option>
										<option value="P">P</option>
										<option value="R">R</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Badan Usaha</p>
							</section>
							<section class="col col-sm-5">
								<label class="select">
									<select id="badanusaha">
										<option value="0">=== Silahkan Pilih ===</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Status</p>
							</section>
							<section class="col col-sm-5">
								<label class="select">
									<select id="penerimaan">
										<option value="0">=== Silahkan Pilih ===</option>
										<option value="T">=== Aktif ===</option>
										<option value="F">=== Tidak Aktif ===</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<b>PEMILIK PRIBADI</b><hr><br>
						<div class="row">
							<section class="col col-sm-2">
								<p>Nama</p>
							</section>
							<section class="col col-sm-5">
								<label class="input"> <i class="icon-append fa fa-square"></i>
									<input value="" type="text" name="param" id="nama">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Kelurahan</p>
							</section>
							<section class="col col-sm-5">
								<label class="select">
									<select id="kelurahan">
										<option value="0">=== Silahkan Pilih ===</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Kecamatan</p>
							</section>
							<section class="col col-sm-5">
								<label class="select">
									<select id="kecamatan">
										<option value="0">=== Silahkan Pilih ===</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Alamat</p>
							</section>
							<section class="col col-sm-5">
								<label class="textarea textarea-expandable"> <i class="icon-append fa fa-home "></i>
									<textarea rows="4" class="KunciJikaDetail" name="param[tblizinpendaftaran_lokasiizin]" type="telp" id="tblizinpendaftaran_lokasiizin" placeholder="Alamat"></textarea>
									<b class="tooltip tooltip-bottom-right">Mohon Isikan Alamat</b>
								</label>
							</section>
						</div>
						<b>BADAN USAHA</b><hr><br>
						<div class="row">
							<section class="col col-sm-2">
								<p>Nama</p>
							</section>
							<section class="col col-sm-5">
								<label class="input"> <i class="icon-append fa fa-square"></i>
									<input value="" type="text" name="param" id="nama">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Kelurahan</p>
							</section>
							<section class="col col-sm-5">
								<label class="select">
									<select id="kelurahan">
										<option value="0">=== Silahkan Pilih ===</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Kecamatan</p>
							</section>
							<section class="col col-sm-5">
								<label class="select">
									<select id="kecamatan">
										<option value="0">=== Silahkan Pilih ===</option>
									</select> <i></i> 
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-sm-2">
								<p>Alamat</p>
							</section>
							<section class="col col-sm-5">
								<label class="textarea textarea-expandable"> <i class="icon-append fa fa-home "></i>
									<textarea rows="4" class="KunciJikaDetail" name="param[tblizinpendaftaran_lokasiizin]" type="telp" id="tblizinpendaftaran_lokasiizin" placeholder="Alamat"></textarea>
									<b class="tooltip tooltip-bottom-right">Mohon Isikan Alamat</b>
								</label>
							</section>
						</div><br>
						<div class="row">
								<section class="col col-2">
									<label>
										Tanggal Pengukuhan
									</label>
								</section>

								<section class="col col-5">
									<label class="input"> <i class="icon-append fa fa-calendar "></i>
										<input id="tgl_pengukuhan" name="tgl_pengukuhan" type="input" class="datepicker" data-dateformat="dd-mm-yy" placeholder="Tanggal Setor">
										<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal Pengukuhan</b>
									</label>
								</section>
							</div>
					</fieldset>

					<footer>
						<button id="btn-cari" type="submit" class="btn btn-primary">
							Cari
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

	<script type="text/javascript">
	pageSetUp();
	jQuery(document).ready(function($) {
		cari();
	});

	function cari2 () {
		window.cmd = "tambah";
		window.id = '';
		$("#cmd").val("tambah");
		$("#form-data")[0].reset();
		$("#form-data .select2").select2('val','');
		$("#modal-form").modal("show");

	}

	function cari () {
		$("#tabel").html('<div align="center">'+LOADER+'').fadeIn(400);
		$.ajax({
			url: 'pembukuandanpelaporan/cekdatawp_pertahun/Cari',
			type: 'POST',
			data: {
				cari_jenis: $('#cari_jenis').val(),
			},
			success: function (respon) {
				$("#tabel").html(respon);
				$("#tabel").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(1000);
				$("#modal-form").modal("show");

			}
		});

	}

	function cetak (tipe) {
		var cari_jenis = $('#cari_jenis').val();

		window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/pembukuandanpelaporan/cekdatawp_pertahun/Cetak?tipe='+tipe+'&jenis='+cari_jenis);
	}


	</script>