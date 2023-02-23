<div id="line-chart"></div>
<?php 
	$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? (int)$_REQUEST['tahun'] : date('Y');
	$data_grafik_batang = Yii::app()->db->createCommand('CALL proc_dashboard_target('.$tahun.',0)')->queryRow();
	$data_grafik_batang_realisasi = Yii::app()->db->createCommand('CALL proc_dashboard_realisasi('.$tahun.')')->queryRow();
 ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		loadline();
	});

	function loadline() {
		$('#line-chart').highcharts({
			chart: {
				type: 'line'
			},
			title: {
				text: 'Grafik Garis Target dan Realisasi Pendapatan Daerah'
			},
			subtitle: {
          text: 'Tahun <?= $tahun ?>'
      },
			xAxis: {
				categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
			},
			yAxis: {
				title: {
					text: 'Rupiah'
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
				name: 'Target',
				data: [
				<?php for($ke = 1; $ke <= 12; $ke++): ?>
          <?= $data_grafik_batang['target_' . $ke] ?>,
        <?php endfor ?>
				]
			}, {
				name: 'Realisasi',
				data: [
				<?php for($ke = 1; $ke <= 12; $ke++): ?>
          <?php if ( $ke <= date('m') ): ?>	
          <?= $data_grafik_batang_realisasi['setor_sd_bulan_' . $ke] ?>,
          <?php endif ?>
        <?php endfor ?>
				]
			}]
		});
	}
</script>