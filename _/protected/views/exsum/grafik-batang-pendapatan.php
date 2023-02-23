<div id="bar-chart"></div>
<?php 
	$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? (int)$_REQUEST['tahun'] : date('Y');
	$data_grafik_batang = Yii::app()->db->createCommand('CALL PROC_DASHBOARD_TARGET('.$tahun.',0)')->queryRow();
	$data_grafik_batang_realisasi = Yii::app()->db->createCommand('CALL PROC_DASHBOARD_REALISASI('.$tahun.')')->queryRow();
 ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		loadbar();
	});
	function loadbar() {
		$('#bar-chart').highcharts({
	        chart: {
	            type: 'column',
	            options3d: {
	                enabled: true,
	                alpha: 15,
	                beta: 15,
	                depth: 50,
	                viewDistance: 25
	            }
	        },
	        title: {
	            text: 'Grafik Batang Pendapatan Daerah'
	        },
	        subtitle: {
	            text: 'Tahun <?= $tahun ?>'
	        },
	        xAxis: {
	            categories: [
	                'Jan',
	                'Feb',
	                'Mar',
	                'Apr',
	                'Mei',
	                'Jun',
	                'Jul',
	                'Ags',
	                'Sep',
	                'Okt',
	                'Nov',
	                'Des'
	            ],
	            crosshair: true
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Rupiah'
	            }
	        },
	        tooltip: {
	            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	                '<td style="padding:0"><b>Rp. {point.y:.,0f}</b></td></tr>',
	            footerFormat: '</table>',
	            shared: true,
	            useHTML: true
	        },
	        plotOptions: {
	            column: {
	                pointPadding: 0.2,
	                borderWidth: 0
	            }
	        },
	        series: [
	          {
	            name: 'Target',
	            data: [
	            <?php for($ke = 1; $ke <= 12; $ke++): ?>
		            <?= $data_grafik_batang['target_' . $ke] ?>,
	            <?php endfor ?>
	            ]
	          },
	          {
	            name: 'Realisasi',
	            data: [
	            <?php for($ke = 1; $ke <= 12; $ke++): ?>
		            <?php if ( $ke <= date('m') ): ?>	
		            <?= $data_grafik_batang_realisasi['setor_sd_bulan_' . $ke] ?>,
		            <?php endif ?>
	            <?php endfor ?>
	            ]
	          },
	        ]
	    });
	}
</script>