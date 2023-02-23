<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
		<h4><i class="fa fa-file-text-o"></i> SKPDLB - Pajak PBB</h4>
		</div>
	</div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="" >

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-qwej8" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Data</h2>
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
						<form id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>
								<div class="row">
								<section class="col col-md-12"><h4 align="center"><b>Entry SKPDLB Pajak PBB</b></h4></section>
								</div>
								<header style="margin: -6px;">Perorangan</header><br>
								<div class="row">
									<section class="col col-md-2">NOP PBB</section>
									<section class="col col-md-5" style="margin-left: 2%;">
										<label class="input">
											<input class="form-control" type="text" id="TBLLBHBAYARPBB_NOP" name="TBLLBHBAYARPBB_NOP">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Tahun Pajak</section>
									<section class="col col-md-2">
										<label class="input">
											<input type="number" name="TBLLBHBAYARPBB_TAHUN" id="TBLLBHBAYARPBB_TAHUN">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Nama</section>
									<section class="col col-md-5" style="margin-left: 2%;">
										<label class="input">
											<input class="form-control" type="text" id="TBLLBHBAYARPBB_NAMAWP" name="TBLLBHBAYARPBB_NAMAWP">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Alamat</section>
									<section class="col col-md-5" style="margin-left: 2%;">
										<label class="textarea"> 										
											<textarea rows="3" name="TBLLBHBAYARPBB_ALAMATWP" id="TBLLBHBAYARPBB_ALAMATWP"></textarea> 
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">Rekening</section>
									<section class="col col-md-5" style="margin-left: 2%;">
										<label class="input">
											<input value="4.1.1.12 PAJAK BUMI BANGUNAN" style="background: #e4e4e4;" class="input-sm format-rupiah" type="text" id="rekening" name="rekening" disabled="disabled">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"><b>Setoran Pajak SSPD</b></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;"> Pajak Terhutang</section>
									<section class="col col-md-5">
										<label class="input">
											<input type="text" name="name">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"><b>Penerimaan Pajak</b></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Penyetoran</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_penyetoran" name="jumlah_penyetoran">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2"><b>Lebih Bayar (SKPDLB)</b></section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Nomor SKPDLB</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="form-control" type="text" id="nmr_skpdkb" name="nmr_skpdkb">
										</label>
									</section>
									<section class="col col-md-1">Tgl SKPDLB</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_skpdkb" class="datepicker" data-dateformat="dd-mm-yy" id="tgl_skpdkb">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Kelebihan</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control" type="text" id="jumlah_kelebihan" name="jumlah_kelebihan">
										</label>
									</section>
								</div>
							</fieldset>
							<footer>
								<div>
									<button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-save"></i>&nbsp;Simpan
									</button>
									<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
										<i class="fa fa-ban"></i>	Batal
									</button>
								</div>
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

</section>
<!-- end widget grid -->


<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>