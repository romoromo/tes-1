<?php
	$data_realisasi_perbulan = Yii::app()->db->createCommand('SELECT * FROM DASK_PERBULAN_PERREKENING')->queryAll();

 ?>
 <!-- NEW WIDGET START -->
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-orange" id="wid-id-obyek-5wx5w5v67v" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
				<h2>&nbsp;Data Capaian Penetapan Pajak Daerah</h2>

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

					<div class="">
						
						<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
							<thead>
								<tr>
									<th width="15"> No</th>
									<th data-class="expand"><div class="center"> Nama Bidang Usaha</div></th>
									<th data-hide="phone"><div class="center"> Januari</div></th>
									<th data-hide="phone"><div class="center"> Februari </div></th>
									<th data-hide="phone, tablet"><div class="center"> Maret</div></th>
									<th data-hide="phone, tablet"><div class="center"> April</div></th>
									<th data-hide="phone, tablet, desktop">Mei</th>
									<th data-hide="phone, tablet, desktop">Juni</th>
									<th data-hide="phone, tablet, desktop">Juli</th>
									<th data-hide="phone, tablet, desktop">Agustus</th>
									<th data-hide="phone, tablet, desktop">September</th>
									<th data-hide="phone, tablet, desktop">Oktober</th>
									<th data-hide="phone, tablet, desktop">November</th>
									<th data-hide="phone, tablet, desktop">Desember</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($data_realisasi_perbulan as $row): ?>
								<tr>
									<td><?= $no++ ?>.</td>
									<td><?= $row['PAJAK'] ?></td>
									<?php for ($bln=1; $bln<=12; $bln++): ?>
									<td><div align="right">
									<?php
									$kolom = strtoupper(LokalIndonesia::getBulan($bln));
									$duit = isset($row[$kolom]) ? $row[$kolom] : 0;
									echo LokalIndonesia::ribuan($duit) ?>
									</div></td>
									<?php endfor ?>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>

					</div>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->

	</article>
	<!-- WIDGET END -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>