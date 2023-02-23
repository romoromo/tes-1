<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Surat Teguran</h4>
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
						
						<form action="" id="" class="smart-form" novalidate>
							<fieldset>
                					
                					<div class="row">
                						<section class="col col-md-2">
                							<p><b>Nomor Pokok</b></p>
                						</section>
                						<section class="col col-2">
                							<label class="input">
                								<input type="text" placeholder="">
                							</label>
                						</section>
                						<section class="col col-md-2">
                							<p><b>Nomor Surat</b></p>
                						</section>
                						<section class="col col-2">
                							<label class="input">
                								<input type="text" placeholder="">
                							</label>
                						</section>
                					</div>
                					<div class="row">
                						<section class="col col-md-2">
                							<p><b>Jenis Pajak</b></p>
                						</section>

                						<section class="col col-2">
                							<label class="select">
                								<select class="input-md">
                									<option value="0"> == Pilih Jenis Pajak == </option>
                									<option value="1">Pajak Hotel</option>
                									<option value="2">Pajak Restoran</option>
                									<option value="3">Pajak Penerangan Jalan</option>
                									<option value="4">Pajak Parkir</option>
                									<option value="5">Pajak Sarang Burung Walet</option>
                									<option value="6">Pajak Bumi dan Bangunan</option>
                									<option value="7">BPHTB</option>
                									<option value="8">Sewa Aset</option>
                								</select><i></i>
                							</label>
                						</section>
                					</div>

                					<div class="row">
                						<section class="col col-md-2">
                							<p><b>Tahun Pajak</b></p>
                						</section>

                						<section class="col col-2">
                							<label class="select" >
                								<select class="input-md" >
                									<option value="0"> Tahun </option>
                									<option value="1">2014</option>
                									<option value="2">2015</option>
                									<option value="3">2016</option>
                									<option value="4">2017</option>
                									<option value="5">-</option>
                								</select><i></i>
                							</label>
                						</section>
                					</div>

                					<div class="row">
                						<section class="col col-md-2">
                							<p><b>Jenis Penyetoran</b></p>
                						</section>

                						<section class="col col-2">
                							<label class="select">
                								<select class="input-md" disabled="disabled" style="background-color: #ccc">
                									<option value="0">-</option>
                								</select><i></i>
                							</label>
                						</section>
                						<section class="col col-md-2">
                							<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
                							&nbsp;Enter
                							</button>
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

		</article>
		<!-- WIDGET END -->

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
					<span class="widget-icon"> <i class="fa fa-user"></i> </span>
					<h2>Perorangan</h2>

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
						<div class="widget-body-toolbar">
			              <button rel="tooltip" data-placement="right" data-original-title="digunakan untuk menambah data tahun anggaran" class="btn btn-success" onclick="cetak()">
			               Cetak Surat Teguran
			              </button>         
			            </div>
						<div class="">
							<table width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox" id="dt_basic">
								<thead>  
									<tr>
										<th>Tahun</th>
										<th>Bulan</th>
										<th>Tgl Entry</th>
										<th>Nopok</th>
										<th>Ke</th>
										<th>Nama BU</th>
										<th>Pemilik</th>
										<th>Pajak</th>
										<th>No SPP</th>
										<th>Rp SSPD</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>17</td>
										<td>1</td>
										<td>29/06/2016</td>
										<td></td>
										<td>36</td>
										<td>Penginapan Utar Pensiun</td>
										<td>Sleman</td>
										<td>Rp.123.450</td>
										<td></td>
										<td>Rp.0</td>
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
	<!-- end row -->

</section>


<script type="text/javascript">
	pageSetUp();
	window.APP_URL = "<?php echo $data['URL_APP']; ?>";
    function cetak () {
    window.open(window.APP_URL+'/penagihan/Cek_surat_teguran/cetak');
}


</script>