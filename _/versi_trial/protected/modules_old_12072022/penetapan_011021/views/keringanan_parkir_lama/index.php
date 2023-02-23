<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-pencil"></i> Pendapatan Keringanan Parikir </h4>
		</div>
	</div>
</div>


<section id="" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
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
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Pencarian Data</h2>

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

					<form action="" id="" class="smart-form" novalidate>
						<fieldset>

							<div class="row">
								<section class="col col-sm-2">
									<p><b>No. Pokok WP</b></p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input type="text" placeholder="">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-sm-2">
									<p><b>Masa Pajak</b></p>
								</section>
								<section class="col col-md-1">
									<label class="select">
										<label class="input">
											<input type="number" value="<?php echo date('Y'); ?>" class="form-control" type="text" id="masapajak_tahun" name="masapajak_tahun">
										</label>
									</label>
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
								</section>
								<section class="col col-md-1">
									<label class="checkbox pull-right">
										<input type="checkbox" name="checkbox">
										<i></i>
									</label>
								</section>
								<section class="col col-md-1">
									<label class="select">
										<select class="select2" id="masapajak_tanggal" name="masapajak_tanggal">
											<?php for ($i=1; $i <32 ; $i++) {  ?>
											<?php if ($i==date('d')): ?>
												<option selected="selected" value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php else: ?>
												<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
											<?php endif ?>
											<?php } ?>
										</select>
									</label>
								</section>
								<section class="col col-md-1">
									<a class="btn btn-sm btn-default" onclick="cari()">
										<i class="fa fa-forward"></i> Proses
									</a>
								</section>	
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p><b>Rekening</b></p>
								</section>
								<section class="col col-md-3">
									<label class="select">
										<select class="select2" name="myNumber" id="rekening" name="rekening">
											<option>.::Silahkan Pilih::.</option>
											<option value="">[4.1.1.7.0]Pajak Parkir</option>
											<option value="">[4.1.1.7.1]Pajak Parkir</option>
											<option value="">[4.1.1.7.10]Tunggakan Pajak Parkir</option>
											<option value="">[4.1.1.7.3]Tunggakan Pajak Parkir</option>
											<option value="">[4.1.1.7.2]Sekaten(Parkir)</option>
										</select>
									</label>
								</section>
							</div>
						</fieldset>		
					</form>
				</div>
				<!-- end widget content -->
			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->

		<div class="row">

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
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
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Data Wajib Pajak</h2>

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

					<form action="" id="" class="smart-form" novalidate>
						<fieldset>
							<div class="row">
								<section class="col col-sm-2">
									Nama
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									Alamat
								</section>
							</div>

						</fieldset>		

					</form>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>

	</article>

	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
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
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Data Perhitungan</h2>

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

					<form action="" id="" class="smart-form" novalidate>
						<fieldset>
							<div class="row">
								<section class="col col-md-2">
									Penjualan/Hari
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" disabled="disabled" style="background: #e4e4e4;">
									</label>
								</section>
								<section class="col col-md-1">
									Jumlah Hari
								</section>
								<section class="col col-md-3">
									<label class="input"> 
										<input type="text" disabled="disabled" style="background: #e4e4e4;">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									Penjualan/Bulan
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" disabled="disabled" style="background: #e4e4e4;">
									</label>
								</section>
								<section class="col col-md-1">
									Keringanan
								</section>
								<section class="col col-md-3"> 
									<label class="input"><i class="icon-append ">%</i>
										<input type="text" name="">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									Tanggal Awal
								</section>
								<section class="col col-md-3">
								<label class="input"><i class="icon-append fa fa-calendar"></i>
										<input type="text" name="wp_input_tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="wp_input_tgl_spt" disabled="disabled" style="background: #e4e4e4;">
									</label>
								</section>
								<section class="col col-md-1">
									Tanggal Akhir
								</section>
								<section class="col col-md-3">
									<label class="input"><i class="icon-append fa fa-calendar"></i>
										<input type="text" name="wp_input_tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="wp_input_tgl_spt" disabled="disabled" style="background: #e4e4e4;">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">			
								</section>
								<section class="col col-md-1">
									Pembukuan
								</section>
								<section class="col col-md-1">
									<label class="select">
										<select class="select2" disabled="disabled" style="background: #e4e4e4;"></select>
									</label>
								</section>
								<section class="col col-md-1">
									Kas
								</section>
								<section class="col col-md-1">
									<label class="select">
										<select class="select2" disabled="disabled" style="background: #e4e4e4;"></select>
									</label>
								</section>
								<section class="col col-md-1">
									Nota
								</section>
								<section class="col col-md-1">
									<label class="select">
										<select class="select2" disabled="disabled" style="background: #e4e4e4;"></select>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									Pajak 
								</section>
								<section class="col col-md-1">
									RP
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									Bunga SPT 
								</section>
								<section class="col col-md-1">
									RP
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									Total Setor 
								</section>
								<section class="col col-md-1">
									RP
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input type="text" disabled="disabled" style="background: #e4e4e4;" placeholder="RP.0">
									</label>
								</section>
							</div>																					
						</fieldset>		

					</form>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>

	</article>

	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
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
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Pendapatan Keringanan Pajak</h2>

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

					<form action="keringanan" id="" class="smart-form" novalidate>
						<fieldset>

							<div class="row">
								<section class="col col-md-2">
									Tanggal Keringanan
								</section>
								<section class="col col-md-5">
									<label class="input"><i class="icon-append fa fa-calendar"></i>
										<input type="text" name="wp_input_tgl_spt" class="datepicker" data-dateformat="dd-mm-yy" id="wp_input_tgl_spt">
									</label>
								</section>								
							</div>
							<div class="row">
								<section class="col col-md-2">
									No Reg Keringanan
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input type="text" name="">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									No Surat Keringanan
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input type="text" name> 
									</label>
								</section>
							</div>
						</fieldset>		

					</form>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>

	</article>

	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-validasi_penyetoran" 
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
				<span class="widget-icon"> <i class="fa fa-search"></i> </span>
				<h2>Ketetapan Baru</h2>

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

					<form action="ketetapanbaru" id="" class="smart-form" novalidate>
						<fieldset>
							<div class="row">
								<section class="col col-md-2">
									Tanpa Keringanan
								</section>
								<section class="col col-md-2">
									RP :
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input type="text" name="">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									Keringanan
								</section>
								<section class="col col-md-2">
									RP :
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input type="text" name="">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									Bunga SPT Baru
								</section>
								<section class="col col-md-2">
									RP :
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input type="text" name="">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									Total Setor Baru
								</section>
								<section class="col col-md-2">
									RP :
								</section>
								<section class="col col-md-5">
									<label class="input">
										<input type="text" name="">
									</label>
								</section>
							</div>
						</fieldset>

					</div>
				</article>

				<script type="text/javascript">

					pageSetUp();

				</script>