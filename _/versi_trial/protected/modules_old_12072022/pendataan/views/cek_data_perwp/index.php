<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Cek Data Per - WP Per - Tahun</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-cek_data" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"
			data-widget-sortable="false"			
			>
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
					<h2>Pilih Data Sumber</h2>

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
						
						<form action="" id="form_sumber_pajak" class="smart-form" novalidate>
							<fieldset>
								<div class="row">
									<section class="col col-md-2">
										<p>Jenis Pajak </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Pajak Reklame</option>
												<option>Pajak Hotel</option>
												<option>Pajak Hiburan</option>
												<option>Pajak Parkir</option>
												<option>Pajak Air Tanah</option>
												<option>Pajak Walet</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tahun </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="sub_pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>2017</option>
												<option>2016</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pokok</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="nomor_pokok" name="nomor_pokok">
										</label>
									</section>
								</div>
							</fieldset>		
							<footer>
								<button class="btn btn-sm btn-primary" onclick="cari()">
									<i class="fa  fa-search"></i>&nbsp;Cari
								</button>
							</footer>					
						</form>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->


	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-data_sauus" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
					<h2>&nbsp;Data</h2>

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
						<p class="alert alert-info"> 
							<button class="btn btn-default">
								<i class="fa fa-print"></i> Cetak
							</button>					
						</p>

						<div class="">
						
							<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
								<thead>
									<tr>
										<th width="15"> No</th>
									    <th data-hide="phone"><div class="center"> Bulan Pajak</div></th>
									    <th data-hide="phone"><div class="center"> No SKP</div></th>
									    <th data-class="expand"><div class="center"> SKPD (Rp)</div></th>
									    <th data-hide="phone, tablet"><div class="center"> Tgl Setor</div></th>
									    <th data-hide="phone, tablet"><div class="center"> SSPD (Rp)</div></th>
									    <th data-hide="phone, tablet"> Bulan KB</th>
									    <th data-hide="phone, tablet"> No KB</th>
									    <th> SSPDKB</th>
									    <th> Tgl Setor</th>
									    <th> SSPD</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
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
								<tfoot>
									<tr>
										<td colspan="11">
											<div class="row">
												<section class="col col-md-4"></section>
												<section class="col col-md-2">J-SKPD :</section>
												<section class="col col-md-2"></section>
												<section class="col col-md-2">J-SKPDKB :</section>
											</div>
											<div class="row">
												<section class="col col-md-4"></section>
												<section class="col col-md-2">J-SSPD :</section>
												<section class="col col-md-2"></section>
												<section class="col col-md-2">J-SSKD :</section>
											</div>
										</td>
									</tr>
								</tfoot>
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

	</div>
</section>


<script type="text/javascript">
	pageSetUp();

		
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});


	function printSelected () {
		$('#datamodal').modal('show');
	}

	function tbl_simpan () {
		$('#tbl_cetak').show;
	}

</script>