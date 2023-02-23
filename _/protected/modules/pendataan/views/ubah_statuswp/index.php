<?php 
	define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Ubah Status WP</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-status_wp" 
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
					<h2>Form Entry</h2>

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
										<p>Nomor Pokok </p>
									</section>
									<section class="col col-md-6">
										<label for="pemohon" class="input">Cari Nomor Pokok</label>
										<label class="input"> <i class="icon-append fa fa-search"></i>
											<input style="width: 100%;" class="autocomplete" id="pemohon" name="pemohon" placeholder="--- Ketik Nomor Pokok ---" type="text">
										</label>
										(Ketikkan Nomor Pokok)
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>NPWPD </p>
									</section>
									<section class="col col-md-6">
										<label class="input">
											<input class="input-sm" type="text" id="formulir" name="formulir">
										</label>
									</section>
								</div>
						
								<header style="border-color: red;">Data WP</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama Pemilik</p>
									</section>
									<section class="col col-md-6">
										<input class="form-control" disabled="disabled" type="text" id="nama_pemilik" name="nama_pemilik">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat Pemilik</p>
									</section>
									<section class="col col-md-6">
										<textarea class="form-control" disabled="disabled" rows="4"></textarea>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Nama Badan Usaha</p>
									</section>
									<section class="col col-md-6">
										<input class="form-control" disabled="disabled" type="text" id="nama_pemilik" name="nama_pemilik">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alamat Badan Usaha</p>
									</section>
									<section class="col col-md-6">
										<textarea class="form-control" disabled="disabled" rows="4"></textarea>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Rt/Rw </p>
									</section>
									<section class="col col-md-3">
										<input class="form-control" disabled="disabled" type="text" id="rt" name="rt">
									</section>
									<section class="col col-md-1">
										<p>No Telp </p>
									</section>
									<section class="col col-md-2">
										<input class="form-control" disabled="disabled" type="text" id="telp" name="telp">
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
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
										<input class="form-control" disabled="disabled" type="text" id="kode_pos" name="kode_pos">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select name="desa" id="desa" class="select2" placeholder="--- Pilih Desa---">
												<option></option>
												<option>Kricak</option>
												<option>Karangwaru</option>
												<option>Tegalrejo</option>
												<option>Bener</option>
											</select>
										</label>
									</section>
								</div>
								<header>Pilihan</header><br>
								<div class="row">
									<section class="col col-md-2">
										<p>Status </p>
									</section>
									<section class="col col-md-6">
										<label class="checkbox">
											<input type="checkbox" name="checkbox">
											<i></i> Cek bila user aktif
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alasan </p>
									</section>
									<section class="col col-md-6">
										<label class="textarea"> 										
											<textarea rows="3" name="alamat" id="alamat"></textarea> 
										</label>
									</section>
								</div>
							</fieldset>		
							<footer>
									<button type="button" class="btn btn-sm btn-primary" onclick="simpan()">
										<i class="fa fa-floppy-o"></i>&nbsp;Simpan
									</button>
									<button type="button" class="btn btn-warning dropdown-toggle">
										<i class="fa fa-print"></i> Cetak Kartu
									</button>
									<button type="button" type="button" class="btn btn-sm btn-default" data-dismiss="modal">
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
	<!-- end row -->
</section>


<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	/*start autocomplete textfield*/
		var $select2Elm = $('#pemohon');

		$select2Elm.select2({
			minimumInputLength: 3,
			maximumSelectionSize: 1,
			multiple: true,
			formatInputTooShort: function () {
				return "Isikan minimal 3 karakter";
			}, 
			// options coming from the select2 documentation
			// you can ignore it
			ajax: {
				url: "informasi/StatusProses/AutoComplete", // place here your ajax url
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						keyword: term, //search term
						page_limit: 10, // page size
						page: page
					};
				},
				results: function(data, page) {
					
					return {
						results: data
					};
				}
			},
			formatResult: function(data) {

				return data.text;

			},
			formatSelection: function(data) {
				return data.text;
			},
			dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
			escapeMarkup: function(m) {
				return m;
			} // we do not want to escape markup since we are displaying html in results
		}).on('change', function(e) {

				/**
				*
				* Here there is my quick and dirty fix
				* 
				*/

				// get the original input tag
				var select2 = $select2Elm.data('select2'),
				// get the select2 input tag
				$select2Input = $('.select2-input', select2.searchContainer),
				// get the useless tag
				$tagToRemove = $('li', select2.selection).eq(0),
				newValue = $.trim($tagToRemove.text());

				// append the value chosen into the select2 text input
				$select2Input.val(newValue);
				$select2Input.trigger('keyup');
				// set the new value to the original text field
				$select2Elm.val(newValue);
				// remove the useless tag
				$tagToRemove.remove();
				$nomor = (this.value.split(' / ')[0]=!null) ? this.value.split(' / ')[0] : '';
				$nama = (this.value.split(' / ')[1]=!null) ? this.value.split(' / ')[1] : '';
				$namausaha = (this.value.split(' / ')[2]=!null) ? this.value.split(' / ')[2] : '';
				$izin_daftar = (this.value.split(' / ')[3]=!null) ? this.value.split(' / ')[3] : '';
				window.izin_daftar_id = $izin_daftar;

				var selector_nomorizin = $(".select2-input").attr("id");
				$("#"+selector_nomorizin).val( $nomor+" / "+$nama+" / "+$namausaha );
					//alert($izin_daftar);

					loadDetailIzin(window.izin_daftar_id);
					wait(2000); //tunggu 2 detik
					OpenDetail();

				}
				).data('select2').clearSearch = function() {
		return false;
	};

	function simpan () {
		$.smallBox({
			title : "Success",
			content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 1000			
		});
	}


</script>