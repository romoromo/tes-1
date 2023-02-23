<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i> Monitoring</h4>
		</div>
	</div>
</div>

<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"
			data-widget-sortable="false"			
			>
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Form Pencarian</h2>
				</header>
				<div>

					<div class="jarviswidget-editbox">

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
							<fieldset>

								<div class="row">
									<section class="col col-1">
										<p>Tahun</p>
									</section>
									<section class="col col-4">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">Silahkan Pilih</option>
												<option value="1">2013</option>
												<option value="2">2014</option>
												<option value="3">2015</option>
											</select> <i></i> 
										</label>
									</section>
									<?php /*
									<section class="col col-1">
										<p>Bulan</p>
									</section>
									<section class="col col-4">
										<label class="select">
											<select name="gender">
												<option value="0" selected="" disabled="">Silahkan Pilih</option>
												<option value="1">Januari</option>
												<option value="2">Februari</option>
												<option value="3">Maret</option>
											</select> <i></i> 
										</label>
									</section>
									*/ ?>
								</div>
							</fieldset>		
							<footer>
								<a class="btn btn-sm btn-primary" onclick="cari()">
									<i class="fa  fa-search"></i>&nbsp;Cari
								</a>
							</footer>				
						</form>
					</div>
				</div>
			</div>
		</article>
	</div>

	<!-- DATA PER REKENING -->

	<div class="row">
		<?php /*
		<article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-pasdenerimaan" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>&nbsp;Data Pendapatan Daerah</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar">
                          <button class="btn btn-warning" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak</button>
                        </div>
						<div class="">
						
							<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
								<thead>
									<tr>
										<th width="15"> No</th>
									    <th data-hide="phone"><div class="center"> Bidang Usaha</div></th>
									    <th data-hide="phone"><div class="center"> Jumlah</div></th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($data['realisasi_perrekening'] as $list_realisasi_perrekening): ?>
										<tr>
										    <td><?php echo $no++; ?></td>
										    <td><?php echo $list_realisasi_perrekening['NM_REKENING']; ?></td>
										    <td><?php echo LokalIndonesia::rupiah($list_realisasi_perrekening['rupiahsetor']); ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</article>
		*/ ?>

		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-penaserimaan" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>&nbsp;Grafik Pendapatan Daerah</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar">
                          <!-- <button class="btn btn-warning" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak</button> -->
                        </div>

						<div>
							<div id="pie-chart" ></div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>


	<!-- DATA PER KECAMATAN -->
	<div class="row">
		<?php /*
		<article class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="jarviswidget jarviswidget-color-green" id="wid-id-pasdeasnerimaan" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>&nbsp;Data Realisasi Perkecamatan</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar">
                          <button class="btn btn-warning" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak</button>
                        </div>
						<div class="">
						
							<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_perkecamatan">
								<thead>
									<tr>
										<th width="15"> No</th>
									    <th data-hide="phone"><div class="center"> Kecamatan</div></th>
									    <th data-hide="phone"><div class="center"> Jumlah</div></th>
									</tr>
								</thead>
								<tbody>
									<?php $no_perkec = 1; foreach ($data['realisasi_perkecamatan'] as $list_realisasi_perkecamatan): ?>
									<tr>
										<td><?php echo $no_perkec++; ?></td>
										<td><?php echo $list_realisasi_perkecamatan['nama']; ?></td>
										<td><?php echo LokalIndonesia::rupiah($list_realisasi_perkecamatan['rupiahsetor']); ?></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</article>
		*/ ?>

		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-green" id="wid-asdid-penaserimaan" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>&nbsp;Grafik Realisasi Perkecamatan</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding">
						<div class="widget-body-toolbar">
                          <!-- <button class="btn btn-warning" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak</button> -->
                        </div>

						<div class="">
							<div id="pie-chart2"></div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>

	<!-- PER REKENING PER KECAMATAN -->
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-green" id="wid-erimaan" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>&nbsp;Grafik Realisasi Per Rekening Per Kecamatan</h2>
				</header>
				<div>
					<div class="jarviswidget-editbox">
					</div>
					<div class="widget-body no-padding" style="overflow-x:scroll; ">
						<div class="widget-body-toolbar">
							<form  id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>
								<div class="row">
									<section class="col col-1">
										<p>Jenis</p>
									</section>
									<section class="col col-4">
										<label class="select">
											<select name="change_idgrafik3" id="change_idgrafik3" onchange="change_idgrafik3(this.value)">
												<option value="0" selected="">== Silahkan Pilih ==</option>
												<option value="KETETAPAN">KETETAPAN</option>
												<option value="REALISASI">REALISASI</option>
												<option value="TUNGGAKAN">TUNGGAKAN</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
							</fieldset>			
						</form>
                        </div>

						<div class="" style="width: 200%;">
							<div id="pie-chart3"></div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>

</section>

<script type="text/javascript" src="themes/smartadmin/js/plugin/highcharts/highcharts.js"></script>
<script type="text/javascript" src="themes/smartadmin/js/plugin/highcharts/highcharts-3d.js"></script>
<script type="text/javascript" src="themes/smartadmin/js/plugin/highcharts/exporting.js.js"></script>
<script type="text/javascript">
	

	pageSetUp();

	jQuery(document).ready(function($) {
		//reloadDT('dt_basic');
		//reloadDT('dt_perkecamatan');
		//reloadDT('dt_perkecamatan_rekening');
	});


	$(document).ready(function() {
		loadpie3();
		loadpie();
		loadpie2();
	});

	function loadpie() {
		$('#pie-chart').highcharts({
        chart: {
            type: 'column'
        },
         scrollbar: {
	        enabled: true
	    },
        title: {
            text: 'Grafik Pendapatan Daerah'
        },
        xAxis: {
            categories: [
            	<?php foreach ($data['realisasi_perrekening'] as $chart_perrekening): ?>
                '<?php echo $chart_perrekening["NM_REKENING"]; ?>',
                <?php endforeach; ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
        series: [{
            name: 'Ketetapan',
            data: [
            	<?php foreach ($data['realisasi_perrekening'] as $chart_perrekening1): ?>
            	<?php echo AllFunction::model()->getketetapanByKodeRekening($chart_perrekening1['kd_rekening']); ?>,
            	<?php endforeach; ?>
            	]

        }, {
            name: 'Anggaran',
            data: [
	            <?php foreach ($data['realisasi_perrekening'] as $chart_perrekening2): ?>
	            	<?php echo AllFunction::model()->getAnggaranByKodeRekening($chart_perrekening2['kd_rekening']); ?>,
	            <?php endforeach; ?>
            ]

        }, {
            name: 'Realisasi',
            data: [
            	<?php foreach ($data['realisasi_perrekening'] as $chart_perrekening3): ?>
            	<?php echo AllFunction::model()->getRealisasiByKodeRekening($chart_perrekening3['kd_rekening']); ?>,
            	<?php endforeach; ?>
            ]

        }]
    });
	}
	function loadpie2() {
		$('#pie-chart2').highcharts({
			chart: {
				type: 'area',
				inverted: true
			},
			title: {
				text: 'Grafik Realisasi Per Kecamatan'
			},
			subtitle: {
				style: {
					position: 'absolute',
					right: '0px',
					bottom: '10px'
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: 50,
				y: 100,
				floating: true,
				borderWidth: 1,
				backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
			},
			xAxis: {
				categories: [
				<?php foreach ($data['realisasi_perkecamatan'] as $list_chartperkecamatan): ?>
				'<?php echo $list_chartperkecamatan['nama']; ?>',
				<?php endforeach ?>
				]
			},
			yAxis: {
				title: {
					text: 'Jumlah'
				},
				labels: {
					formatter: function () {
						return this.value;
					}
				},
				min: 0
			},
			plotOptions: {
				area: {
					fillOpacity: 0.5
				}
			},
			series: [{
				name: 'Jumlah Ketetapan',
				data: [
				<?php foreach ($data['realisasi_perkecamatan'] as $list_chartperkecamatan2): ?>
					<?php echo AllFunction::model()->getKetetapanByKecamatan($list_chartperkecamatan2['nama']); ?>,
				<?php endforeach; ?>
				]
			}, {
				name: 'Jumlah yang Disetor',
				data: [
				<?php foreach ($data['realisasi_perkecamatan'] as $list_chartperkecamatan3): ?>
				<?php echo AllFunction::model()->getJmlSetorByKecamatan($list_chartperkecamatan3['nama']); ?>,
				<?php endforeach; ?>
				]
			}]
		});
	}
	function loadpie3() {
		$('#pie-chart3').highcharts({
        title: {
            text: 'Grafik Realisasi Per Kecamatan Per Rekening',
            x: -20 //center
        },
        xAxis: {
            categories: [
            <?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4): ?>
            '<?php echo $list_chartperkecamatan4['nama']; ?>',
            <?php endforeach ?>
             ]
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Hotel',
            data: [
             	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_2): ?>
            		<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_2['nama'], 'HOTEL') ?>,
            	<?php endforeach; ?>
            	]
        }, {
            name: 'Rumah Makan',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_3): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_3['nama'], 'RUMAHMAKAN') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'Hiburan',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_4): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_4['nama'], 'HIBURAN') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'Reklame',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_5): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_5['nama'], 'REKLAME') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'Penerangan Jalan',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_6): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_6['nama'], 'PPJ') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'Galian C',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_6): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_6['nama'], 'GALIANC') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'Parkir',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_7): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_7['nama'], 'PARKIR') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'Air Tanah',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_8): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_8['nama'], 'AIRTANAH') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'Walet',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_9): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_9['nama'], 'WALET') ?>,
	            <?php endforeach; ?>
            ]
        }, {
            name: 'BPHTP',
            data: [
            	<?php foreach ($data['realisasi_perpajak_kecamatan'] as $list_chartperkecamatan4_10): ?>
	            	<?php echo AllFunction::model()->getJmlByJenisKec('KETETAPAN', $list_chartperkecamatan4_10['nama'], 'BPHTB') ?>,
	            <?php endforeach; ?>
            ]
        }]
    });
	}
	function cetak(tipe) {
		var tahun = '2017';
		var tipe = tipe;
		window.open('<?php echo Yii::app()->baseUrl; ?>/monitoring/cetakdata?tahun='+tahun+'&tipe='+tipe,'_blank');
	}

</script>