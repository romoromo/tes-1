<?php define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Cetak Buku Jenis</h4>
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
									<section class="col col-md-2">
										<p>Rekening </p>
									</section>
									<section class="col col-md-5">
										<label class="select"> 
											<select class="select2" id="no_subrek" name="no_subrek">
													<option value="">== Silahkan Pilih Rekening ==</option>
												<?php foreach ($data['sub_rek'] as $combo_subrek): ?>
													<option value="<?php echo $combo_subrek['TREKENING_KODE']; ?>">[<?php echo $combo_subrek['TREKENING_KODE'] ?>] <?php echo $combo_subrek['TREKENING_NAMA']; ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
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
								<section class="col col-md-2">
										<p>Bulan </p>
									</section>
									<section class="col col-md-2">
										<label class="select">
											<select class="select2" id="masapajak_bulan" name="masapajak_bulan">
												<option value="01">Januari</option>
												<option value="02">Februari</option>
												<option value="03">Maret</option>
												<option value="04">April</option>
												<option value="05">Mei</option>
												<option value="06">Juni</option>
												<option value="07">Juli</option>
												<option value="08">Agustus</option>
												<option value="09">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
											</select>
										</label>
									</section><i></i>
									</div>		
								</div>
							</fieldset>
							<footer>
								<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
									<i class="fa  fa-search"></i>&nbsp;Cari
								</button>
							</footer>
						</form>
					</div>
				</div>
			</div>
		</article>
	</div>
	<!-- end row -->
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12">

			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-7" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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
					<div class="table-responsive" style="max-width: 100%; height: 400px!important; overflow: auto;">
						<button class="btn btn-sm btn-default" onclick="cetak('html')">
							<i class="fa fa-print"></i> Cetak Html
						</button>
						<button class="btn btn-sm btn-success" onclick="cetak('excel')">
							<i class="fa fa-table"></i> Cetak Excel
						</button>
						<br>
						<br>
						<table class="table table-striped table-bordered table-hover" width="100%" style="overflow-x: scroll;">
							<thead>                   
								<tr>
									<th>THSET</th>
									<th>BLSET</th>
									<th>HRSET</th>
									<th>THP</th>
									<th>BLP</th>
									<th>HRP</th>
									<th>NOSPP</th>
									<th>PEND</th>
									<th>PAD</th>
									<th>PJK</th>
									<th>AYT</th>
									<th>JEN</th>
									<th>SUB</th>
									<th>GOL</th>
									<th>NOPOK</th>
									<th>BKEC</th>
									<th>BKEL</th>
									<th>RPSET</th>
									<th>NMSU</th>
									<th>NMREK</th>
									<th>THP_1</th>
									<th>BLP_1</th>
									<th>HRP_1</th>
									<th>KEP</th>
									<th>AYSU</th>
									<th>KDSU</th>
									<th>PR</th>
									<th>NOPOK_1</th>
									<th>URS</th>
									<th>PEM</th>
									<th>ORG</th>
									<th>PRG</th>
									<th>KGT</th>
									<th>DIN</th>
									<th>BID</th>
									<th>PEND_1</th>
									<th>PAD_1</th>
									<th>PJK_1</th>
									<th>AYT_1</th>
									<th>JEN_1</th>
									<th>SUB_1</th>
									<th>GOL_1</th>
									<th>KEC</th>
									<th>KEL</th>
									<th>NMSU_1</th>
									<th>HRSU</th>
									<th>BLSU</th>
									<th>THSU</th>
									<th>NOSU</th>
									<th>HRBSU</th>
									<th>BLBSU</th>
									<th>THBSU</th>
									<th>KDMED</th>
									<th>KDREF</th>
									<th>KDSE</th>
									<th>KDBANK</th>
									<th>TPSET</th>
									<th>HRSET_1</th>
									<th>BLSET_1</th>
									<th>THSET_1</th>
									<th>NOSPP_1</th>
									<th>HRENSPP</th>
									<th>BLESPP</th>
									<th>THESPP</th>
									<th>JENSET</th>
									<th>NOCG</th>
									<th>NOREK</th>
									<th>BANK</th>
									<th>BANCB</th>
									<th>TGCGT</th>
									<th>TGCAIR</th>
									<th>LUNAS</th>
									<th>KDTAG</th>
									<th>KDKB</th>
									<th>BLBU</th>
									<th>BASTP</th>
									<th>HRSTP</th>
									<th>BLSTP</th>
									<th>THSTP</th>
									<th>BAKB</th>
									<th>PAJAK</th>
									<th>RPSET_1</th>
									<th>RPRET</th>
									<th>RPSKP</th>
									<th>RPSTP</th>
									<th>RPKB</th>
									<th>BUSKP</th>
									<th>BUSTP</th>
									<th>BUSTP</th>
									<th>BUKB</th>
									<th>BURET</th>
									<th>DDSKP</th>
									<th>DDRET</th>
									<th>NAIK</th>
									<th>ADM</th>
									<th>RESSKP</th>
									<th>RPSKB</th>
									<th>RPSRET</th>
									<th>UK1</th>
									<th>UK2</th>
									<th>UK3</th>
									<th>NMUK</th>
									<th>DUP</th>
									<th>KET</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<th></th>
									<th></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<th></th>
									<th></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<th></th>
									<th></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<th></th>
									<th></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<th></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
						<center><i><b>Silahkan Lakukan Pencarian Terlebih Dahulu</b></i></center>
					</div>
				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
	</article>

</div>

</section>
<script type="text/javascript">

	pageSetUp();

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function cari () {
		$("#tabel_laporan").html('<div align="center">'+LOADER+'').fadeIn(400);
		$.ajax({
			url: 'pembukuandanpelaporan/cetakbuku_jenis/Cari',
			type: 'POST',
			data: {
				cari_jenis: $('#cari_jenis').val(),
			},
			success: function (respon) {
				$("#tabel_laporan").html(respon);
				$("#tabel_laporan").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(1000);
			}
		});

	}

	function cetak (tipe) {
		var cari_jenis = $('#cari_jenis').val();

		window.open('<?php echo Yii::app()->getBaseUrl(1) ?>/laporan/lap_perjenisbadanusaha/Cetak?tipe='+tipe+'&jenis='+cari_jenis);
	}

</script>