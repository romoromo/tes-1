<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>   Cetak Rekame Jatuh Tempo</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-reklame_jatuh" 
			data-widget-editbutton="false"
			data-widget-deletebutton="false"
			data-widget-custombutton="false"
			data-widget-fullscreenbutton="false"
			data-widget-colorbutton="false"	
			data-widget-togglebutton="false"			
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
					<h2>Daftar Kartu Data Pajak Reklame</h2>

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
										<p><strong>Masa Pajak</strong></p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="masa_pajak" class="datepicker" data-dateformat="dd/mm/yy" id="masa_pajak">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Pajak </p>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Pajak Reklame</option>
											</select> <i></i> 
										</label>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="sub_pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Spanduk Nama Usaha</option>
												<option>Selembaran</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Entry SPT</p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="entry_spt" class="datepicker" data-dateformat="dd/mm/yy" id="entry_spt">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="kec" id="kec" class="select2" placeholder="--- Pilih Kecamatan---">
												<option></option>
												<option>Tegalrejo</option>
												<option>Jetis</option>
												<option>Godokusumo</option>
												<option>Danurejan</option>
												<option>Ngampilan</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kode Jalan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="kec" id="kec" class="select2" placeholder="---Silahkan Pilih---">
												<option></option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Cara Penetapan</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="besar_omset" name="besar_omset">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p> Jenis Pajak</p>
									</section>
									<section class="col col-md-3">
										<label class="input">
											<input class="input-sm" type="text" id="besar_omset" name="besar_omset">
										</label>
									</section>
									<section class="col col-md-3">
										<label class="select">
											<select name="sub_pajak">
												<option selected="" disabled="">== Silahkan Pilih ==</option>
												<option>Mini</option>
												<option>Midi</option>
												<option>Maxi</option>
											</select> <i></i> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Jatuh Tempo </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tanggal_daftar" class="datepicker " data-dateformat="dd/mm/yy" id="tgl_pengukuhan">
										</label>
									</section>
									<section class="col col-md-1">
										<p align="center">s/d </p>
									</section>
									<section class="col col-md-3">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_sdjatuh" class="datepicker " data-dateformat="dd/mm/yy" id="tgl_sdjatuh">
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
			<div class="jarviswidget jarviswidget-color-orange" id="wid-id-data_pajak" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
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
								<i class="fa fa-print"></i> Cetak Laporan
							</button>	
							<button class="btn btn-default">
								<i class="fa fa-file-text-o"></i> Cetak Excel
							</button>					
						</p>

						<div class="">
						
							<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
								<thead>
									<tr>
										<th width="15"> No</th>
									    <th data-hide="phone"><div class="center"> Nama Rekening</div></th>
									    <th data-hide="phone"><div class="center"> Tanggal Lahir</div></th>
									    <th data-class="expand"><div class="center"> Gol</div></th>
									    <th data-hide="phone, tablet"><div class="center"> Nomor Pokok</div></th>
									    <th data-hide="phone, tablet"><div class="center"> Kecamatan</div></th>
									    <th data-hide="phone, tablet">Kelurahan</th>
									    <th data-hide="phone, tablet, desktop">Nama Usaha</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
									    <td>Megatron</td>
									    <td>30/03/2017</td>
									    <td>2</td>
									    <td>3549</td>
									    <td>Tegalrejo</td>
									    <td>Tegalrejo</td>
									    <td>PT DJARUM</td>
									</tr>
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