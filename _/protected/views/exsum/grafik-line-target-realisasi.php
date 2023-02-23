<div id="line-chart"></div>
<?php 
	$tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? (int)$_REQUEST['tahun'] : date('Y');
	$data_grafik_line = Yii::app()->db->createCommand('SELECT * FROM DASK_GRAFIK_LINE')->queryRow();
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
	            text: 'Grafik Garis Realisasi'
	        },
	        subtitle: {
	            text: 'Pendapatan Daerah'
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
	        series: [
	        <?php /*{
	            name: 'Target',
	            data: [70000000, 69000000, 95000000, 145000000, 184000000, 215000000, 252000000, 265000000, 273000000, 283000000, 293000000, 303000000]
	        },*/ ?>
	         {
	            name: 'Realisasi',
	            data: [
	            <?php $total_current = 0; for($ke = 1; $ke <= 12; $ke++): ?>
	            <?php $bulan = strtoupper(LokalIndonesia::getBulan($ke)); ?>
	            <?php if ( isset( $data_grafik_line[$bulan] ) ): ?>
	            <?php $total_current += $data_grafik_line[$bulan] ?>
	            <?php echo $total_current . ',' ?>
	            
	            <?php else: ?>
	            <?php echo ',' ?>
	            <?php endif ?>
	            <?php endfor ?>
	            ]
	        }]
	    });
	}
</script>