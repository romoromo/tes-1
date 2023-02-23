<div id="pie-chart"></div>
<?php 
	/*
	SELECT *
	FROM DIAGRAM_PIE
	*/
	// $tahun = isset($_REQUEST['tahun']) && !empty($_REQUEST['tahun']) ? (int)$_REQUEST['tahun'] : date('Y');
	$select = '
	REKENING AS TBLMASTERREKENING_KODE,
	PAJAK AS TBLMASTERREKENING_NAMA,
	TOTALSETORAN AS jmlsetor
	';
	$from = 'DIAGRAM_PIE';
	$otherquery = array(
		// 'join_rek' => array('TBLMASTERREKENING', 'left(TBLSETORAN.TBLSETORAN_REKENINGKODE,5) = TBLMASTERREKENING.TBLMASTERREKENING_KODE')
		// ,'group' => 'TBLMASTERREKENING.TBLMASTERREKENING_ID'
	);
	$filter = array(
		// 'LK__TBLSETORAN_TGLSETOR' => $tahun 
	);

	$data_grafik_pie = DBFetch::query( array('mode'=>'LIST', 'select'=>$select, 'from'=>$from, 'otherquery'=>$otherquery, 'filter'=>$filter) );
 ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		loadpie();
	});
	function loadpie() {
		$('#pie-chart').highcharts({
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0
				}
			},
			title: {
				text: 'Grafik Pie Pendapatan Daerah'
			},
			tooltip: {
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					depth: 35,
					dataLabels: {
						enabled: true,
						format: '{point.name}'
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Persentase',
				data: [
				<?php foreach ($data_grafik_pie as $data): ?>
				['<?= $data['TBLMASTERREKENING_NAMA'] ?>', <?= (int)$data['jmlsetor'] ?>],
				<?php endforeach ?>
				]
			}]
		});
	}
</script>