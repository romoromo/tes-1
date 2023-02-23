<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Pembetulan Data</h4>
		</div>
	</div>
</div>

<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-0" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-sortable="false" role="widget">
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
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Form Pencarian</h2>

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						
						<form action="" id="form_sumber_pajak" class="smart-form" novalidate="">
							<fieldset>

								<div class="row">
									<section class="col col-md-2">
										<p>Nomor Pelayanan</p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="input-sm" type="text" id="nomor_penetapan" name="nomor_penetapan">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>NPWPD</p>
									</section>
									<section class="col col-md-5">
										<label class="input state-success">
											<input type="text" name="card" data-mask="34.02.999.999.999-9999.9" class="valid">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Disposisi</p>
									</section>
									<section class="col col-md-5">
										<select class="form-control" disabled="disabled">
											<option value="">Silahkan Pilih</option>
										</select>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Tanggal Layanan </p>
									</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_layanan" class="datepicker  hasDatepicker" data-dateformat="dd/mm/yy" id="tgl_penetapan1">
										</label>
									</section>
									<section class="col col-md-1"><p align="center">s/d</p></section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="tgl_penetapan2" class="datepicker  hasDatepicker" data-dateformat="dd/mm/yy" id="tgl_penetapan2">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama Pemohon</p>
									</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="input-sm" type="text" id="nama_pemohon" name="nama_pemohon">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-5">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<div class="select2-container select2" id="s2id_kec" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice select2-default" tabindex="-1">   <span class="select2-chosen">--- Pilih Kecamatan---</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen25"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select name="kec" id="kec" class="select2 select2-offscreen" placeholder="--- Pilih Kecamatan---" tabindex="-1">
												<option></option>
												<option>Bangun Purba</option>
												<option>Batang Kuis</option>
												<option>Beringin</option>
												<option>Biru-Biru</option>
												<option>Deli Tua</option>
												<option>Galang</option>
												<option>Gunung Meriah</option>
												<option>Hamparan Perak</option>
												<option>Kutalimbaru</option>
												<option>Labuhan Deli</option>
												<option>Labuhan Deli</option>
												<option>Lubuk Pakam</option>
												<option>Namo Rambe</option>
												<option>Pagar Merbau</option>
												<option>Pancur Batu</option>
												<option>Pantai Labu</option>
												<option>Patumbak</option>
												<option>Percut Sei Tuan</option>
											</select>
										</label>
									</section>
								</div>
								<div class="row">
								<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-5">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<div class="select2-container select2" id="s2id_desa" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice select2-default" tabindex="-1">   <span class="select2-chosen">--- Pilih Kelurahan---</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen26"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select name="desa" id="desa" class="select2 select2-offscreen" placeholder="--- Pilih Kelurahan---" tabindex="-1">
												<option></option>
												<option>Bagerpang</option>
												<option>Bah Balua</option>
												<option>Bah Perak</option>
												<option>Bandar Gunung</option>
												<option>Bandar Kuala</option>
												<option>Bandar Meriah</option>
												<option>Bangun Purba</option>
												<option>Bangun Purba Tengah</option>
												<option>Batu Gingging</option>
												<option>Batu Rata</option>
												<option>Cimahi</option>
												<option>Damak Maliho</option>
												<option>Geriahan</option>
												<option>Mabar</option>
												<option>Marambun Barat</option>
											</select>
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

				<section id="widget-grid" class="">
		<div class="well well-sm well-light">
			<div class="row">
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-34525gvsbdfoi"
					data-widget-editbutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-sortable="false"
					>
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
						<h2>Daftar WP</h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">

						</div>
						<div class="widget-body no-padding">
							<div class="widget-body-toolbar">
								<button class="btn btn-default" onclick="cetak()"> <i class="fa fa-print"></i> Cetak Daftar</button>
							</div>
							<div id="kontrol_table">
								<table id="dt_pipeline" class="table table-striped table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th width="1%" data-hide="phone"></th>
											<th width="5%" data-hide="phone">NO</th>
											<th width="25%" data-class="expand">NPWPD</th>
											<th data-hide="phone">NAMA WP</th>
											<th data-hide="phone, tablet">JENIS PAJAK</th>
											<th data-hide="phone, tablet">LOKASI WP</th>
											<th data-hide="phone, tablet">KECAMATAN</th>
											<th data-hide="phone, tablet">KELURAHAN</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
</section>
	</div>

		</article>
		<!-- WIDGET END -->

