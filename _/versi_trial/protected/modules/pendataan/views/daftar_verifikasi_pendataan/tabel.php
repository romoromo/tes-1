
<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basicc">
	<thead>
		<!-- <header>
			<span class="widget-icon"> <i class="fa fa-table"></i> </span>
			<h2>&nbsp;Data</h2>
		</header> -->
		<tr>
			
			<!-- <th data-hide="phone"><div class="center"> REKENING</div></th> -->
			<th data-clas="phone"><div class="center"> NAMA OBYEK PAJAK</div></th>
			<th data-class="expand"><div class="center"> NPWPD</div></th>
			<th data-hide="phone"><div class="center"> PEMILIK</div></th>
			<th data-hide="phone"><div class="center"> TAHUN PAJAK</div></th>
			<th data-hide="phone"><div class="center"> BULAN PAJAK</div></th>
			<th data-hide="phone"><div class="center"> NPA</div></th>
			<th data-hide="phone"><div class="center"> VOLUME</div></th>
			<th data-hide="phone"><div class="center"> PAJAK</div></th>
			<th data-hide="phone, tablet, desktop"><div class=""> TGL ENTRI SPT</div></th>
			<th data-hide="phone"><div class="center"> AKSI</div></th>
		</thead>
		<tbody>
			<?php $no = 1; ($data['table']); foreach ($data['table'] as $row): ?>
			<tr>

				<!-- <td><?= $row['NMREKENING']; ?></td> -->
				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td>
				<td><?= $row['TBLDAFTAR_JENISPENDAPATAN']; ?>.<?= $row['TBLDAFTAR_GOLONGAN']; ?>.<?= sprintf('%07d',$row['TBLDAFTAR_NOPOK']); ?>.<?= sprintf('%02d',$row['TBLKECAMATAN_IDBADANUSAHA']); ?>.<?= sprintf('%02d',$row['TBLKELURAHAN_IDBADANUSAHA']); ?></td>
				
				<td><?= $row['TBLDAFTAR_PEMILIKNAMA']; ?></td>
				<td><?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
				<td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
				<td><?= LokalIndonesia::ribuan($row['NPA']); ?></td>
				<td><?= $row['VOL']; ?></td>
				<td align="right"><?= LokalIndonesia::ribuan($row['PAJAK']); ?></td>
				<td><?= $row[$data['namatbl'].'_'.'TGLENTRI']; ?>-<?= $row[$data['namatbl'].'_'.'BLNENTRI']; ?>-<?= $row[$data['namatbl'].'_'.'THNENTRI']; ?></td>
				<td>
			
					<!-- <button type="button" onclick="grafik1()" class="btn btn-sm btn-default" style="margin-bottom: 4%;">
									<i class="fa fa-bar-chart-o"></i>&nbsp;Grafik NPA
					</button>
					<button type="button" class="btn btn-sm btn-default" style="margin-bottom: 4%;" onclick="grafik2()">
									<i class="fa fa-bar-chart-o"></i>&nbsp;Grafik Volume
					</button> -->
					<button type="button" class="btn btn-sm btn-success" style="margin-bottom: 4%;" onclick="editpendataan('<?= base64_encode(CJSON::encode(array(
						'nopok' => $row['TBLDAFTAR_NOPOK'],
						'tahun' => $row['TBLPENDATAAN_THNPAJAK'],
						'bulan' => $row['TBLPENDATAAN_BLNPAJAK'],
						'hari'  => $row['TBLPENDATAAN_TGLPAJAK'],
					))); ?>')">
						<i class="fa fa-share"></i>&nbsp;Edit Pendataan
					</button>
					<!-- <button type="button" class="btn btn-sm btn-danger" style="margin-bottom: 4%;" onclick="kembali()">
									<i class="fa fa-mail-reply"></i>&nbsp;Kembalikan
					</button> -->
					<!-- <a class="btn btn-sm btn-success" "fa fa-save" onclick="hapus()">
						Verifikasi
					</a>
					<a class="btn btn-sm btn-danger"  onclick="hapus()">
						Kembalikan Ke Penadfatarn
					</a> -->
				</td> <!-- tambah tombol aksi disini-->
				
			</tr>
		<?php endforeach ?>
	</tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="grfk1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Grafik
				</h4>
			</div>
			
			<div id="viewpopup" class="modal-body no-padding" >
				
				<div id="container"></div>
				
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0);" class="btn btn-default " data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</a>
				<!-- <a href="javascript:void(0);" onclick="simpan()" data-dismiss="modal" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a> -->
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="grfk2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Grafik
				</h4>
			</div>
			
			<div id="viewpopup" class="modal-body no-padding" >
				
				<div id="container1"></div>
				
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0);" class="btn btn-default " data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</a>
				<!-- <a href="javascript:void(0);" onclick="simpan()" data-dismiss="modal" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a> -->
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript" src="themes/smartadmin/js/plugin/highcharts/highcharts.js"></script>
<script type="text/javascript" src="themes/smartadmin/js/plugin/highcharts/highcharts-3d.js"></script>
<script type="text/javascript" src="themes/smartadmin/js/plugin/highcharts/exporting.js.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basicc');
	});

	function editpendataan(param) {
		window.location.href = '<?= Yii::app()->getBaseUrl(1); ?>/#pendataan/pajak_airtanah2017/index/param/'+param;
	}

	function grafik1 () {
		window.cmd = 'grafik1';
		$('#grfk1').modal('show');
	}

	function grafik2 () {
		window.cmd = 'grafik2';
		$('#grfk2').modal('show');
	}



	$('#container').highcharts({
	        chart: {
	            type: 'line'
	        },
	        title: {
	            text: 'Grafik Garis NPA'
	        },
	        subtitle: {
	            text: 'Pendapatan Daerah'
	        },
	        xAxis: {
	            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
	        },
	        yAxis: {
	            title: {
	                text: 'Juta'
	            }
	        },
	        plotOptions: {
	            line: {
	                dataLabels: {
	                    enabled: true
	                },
	                enableMouseTracking: true
	            }
	},
    series: [{
        name: 'Grafik NPA',
        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    }]
});

	$('#container1').highcharts({
	        chart: {
	            type: 'line'
	        },
	        title: {
	            text: 'Grafik Garis Volume'
	        },
	        subtitle: {
	            text: 'Pendapatan Daerah'
	        },
	        xAxis: {
	            categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
	        },
	        yAxis: {
	            title: {
	                text: 'Ribu'
	            }
	        },
	        plotOptions: {
	            line: {
	                dataLabels: {
	                    enabled: true
	                },
	                enableMouseTracking: true
	            }
	},
    series: [{
        name: 'Grafik Volume',
        data: [7.0, 6.5, 9.0, 14.0, 18.0, 21.5, 25.5, 26.5, 24.2, 19.3, 14.0, 9.5]
    }]
});

</script>
<!-- <fieldset>
<header></header>
	<div class="row">
		<section class="col col-md-1">
			<p>J_SKPD</p>
		</section>
		<section class="col col-md-3">
			<label class="input">
				<input type="nopok" name="" id="nopok">
			</label>
		</section>
	</div>
</fieldset> -->


