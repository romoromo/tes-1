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

					<form action="" id="ubah-status-wp" class="smart-form" novalidate>
						<fieldset>
							<div class="row">
								<section class="col col-md-2">
									<p>Nomor Pokok </p>
								</section>
								<section class="col col-md-6">
									<label class="input">
										<input class="input-sm" type="text" id="TBLDAFTAR_NOPOK" name="TBLDAFTAR_NOPOK">
									</label>
									(Ketikkan Nomor Pokok)
								</section>
								<section class="col col-md-1">
									<a class="btn btn-sm btn-default" onclick="cari()">
										<i class="fa fa-forward"></i> Proses
									</a>
								</section>
							</div>
							<div class="row" style="display:none">
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
									<label class="input">
										<input class="input-sm" disabled="" type="text" id="TBLDAFTAR_PEMILIKNAMA" name="TBLDAFTAR_PEMILIKNAMA">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Alamat Pemilik</p>
								</section>
								<label class="textarea">
									<section class="col col-md-6">
										<textarea class="input-sm" disabled="" rows="4" id="TBLDAFTAR_PEMILIKALAMAT" name="TBLDAFTAR_PEMILIKALAMAT"></textarea>
									</section>
								</label>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Nama Badan Usaha</p>
								</section>
								<label class="input">
									<section class="col col-md-6">
										<input class="input-sm" disabled="" type="text" id="TBLDAFTAR_BADANUSAHANAMA" name="TBLDAFTAR_BADANUSAHANAMA">
									</section>
								</label>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Alamat Badan Usaha</p>
								</section>
								<section class="col col-md-6">
									<label class="textarea">
										<textarea class="input-sm" disabled="" rows="4" id="TBLDAFTAR_BADANUSAHAALAMAT" name="TBLDAFTAR_BADANUSAHAALAMAT"></textarea>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Rt/Rw </p>
								</section>
								<section class="col col-md-3">
									<label class="input">
										<input class="input-sm" disabled="" type="text" id="TBLDAFTAR_PEMILIKRTRW" name="TBLDAFTAR_PEMILIKRTRW">
									</label>
								</section>
								<section class="col col-md-1">
									<p>No Telp </p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" disabled="" type="text" id="TBLDAFTAR_BADANUSAHATELP" name="TBLDAFTAR_BADANUSAHATELP">
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kecamatan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select disabled="" onchange="getKelurahan(this.value)" name="TBLKECAMATAN_IDBADANUSAHA" id="TBLKECAMATAN_IDBADANUSAHA" class="select2" placeholder="--- Pilih Kecamatan---">
												<option value="" selected="">-- Pilih Kecamatan --</option>
												<?php foreach ($data['kec'] as $row_kec): ?>
													<option value="<?=$row_kec['REFKECAMATAN_ID']; ?>"><?=$row_kec['REFKECAMATAN_NAMA']; ?></option>
												<?php endforeach ?>
											</select>
										</label>
									</section>
									<section class="col col-md-1">
										<p>Kode Pos </p>
									</section>
									<section class="col col-md-2">
										<label class="input">
											<input class="input-sm" disabled="disabled" type="text" id="TBLDAFTAR_BADANUSAHAKODEPOS" name="TBLDAFTAR_BADANUSAHAKODEPOS">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Kelurahan</p>
									</section>
									<section class="col col-md-3">
										<label class="select"> <i class="icon-append fa fa-search"></i>
											<select disabled="" name="TBLKELURAHAN_IDBADANUSAHA" id="TBLKELURAHAN_IDBADANUSAHA" class="select2" placeholder="--- Pilih Kelurahan---">
												<option value="">-- Pilih Kelurahan --</option>
											</select>
										</label>
									</section>
								</div>
								<header>Pilihan</header><br>
								<div class="row">
									<section class="col col-md-2">
										Status WP
									</section>
									<div class="col col-6 inline-group">
										<label class="radio">
											<input type="radio" name="isSudah" id="isSudah" value="Y">
											<i></i> Aktif
										</label>
										<label class="radio">
											<input type="radio" name="isBelum" id="isBelum" value="N">
											<i></i> Tidak Aktif
										</label>
									</div>
								</div>
								<div class="row" style="display:none">
									<section class="col col-md-2">
										<p>Aktifkan WP</p>
									</section>
									<section class="col col-md-2">
										<label class="checkbox">
											<input id="status" type="checkbox" name="status" value="Y">
											<i></i> Cek bila user aktif
										</label>
									</section>
									<?php /*<section class="col-md-2">
										<label>
										 	Status User Saat ini : 										
											<span id="masih_aktif" style="display:none;">
												<strong>Masih Aktif</strong>
											</span>
											<span id="tidak_aktif" style="display: none;">
												<strong>Tidak Aktif</strong>
											</span>
										</label>
									</section>*/ ?>
								</div>
								<div class="row">
									<section class="col col-md-2">
										<p>Alasan </p>
									</section>
									<section class="col col-md-6">
										<label class="textarea"> 										
											<textarea rows="3" name="TBLDAFTAR_ALASANNONAKTIF" id="TBLDAFTAR_ALASANNONAKTIF"></textarea> 
										</label>
									</section>
								</div>
							</fieldset>		
							<footer>
								<button type="button" class="btn btn-sm btn-primary" onclick="simpan()">
									<i class="fa fa-floppy-o"></i>&nbsp;Simpan
								</button>
								<button type="button" class="btn btn-warning dropdown-toggle" disabled="">
									<i class="fa fa-print"></i> Cetak Kartu
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
<!-- end row -->
</section>


<script type="text/javascript">
	pageSetUp();

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWP();
	});

	function generateAutocompleteWP() {
		$('#TBLDAFTAR_NOPOK').autocomplete({
			serviceUrl: 'pendaftaran/ubah_statuswp/autocompletewp',

			onSelect: function (suggestion) {
		        //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		        window.id = suggestion.data;
		        window.nopokok = suggestion.TBLDAFTAR_NOPOK;
		        window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
		        window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
		        $(this).val(suggestion.value);
		        $('#TBLDAFTAR_NOPOK').val(suggestion.value.split(' | ')[0]);

		    }
		    ,showNoSuggestionNotice : true
		    ,noCache : true
		    ,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	function getKelurahan(val) {
		$.ajax({
			url: 'pendaftaran/ubah_statuswp/getKelurahan',
			type: 'POST',
			dataType: 'html',
			data: {value: val},
			success: function(respon) {
				$('#TBLKELURAHAN_IDBADANUSAHA').html(respon);
			}
		})
	}

	function cari() {

		$.ajax({
			url: 'pendaftaran/ubah_statuswp/GetData',
			type: 'POST',
			dataType: 'json',
			data:  {
				TBLDAFTAR_NOPOK: $("#TBLDAFTAR_NOPOK").val()
				, TBLDAFTAR_JENISPENDAPATAN: $("#TBLDAFTAR_JENISPENDAPATAN").val()
				, TBLDAFTAR_PEMILIKNAMA: $("#TBLDAFTAR_PEMILIKNAMA").val()
				, TBLDAFTAR_BADANUSAHANAMA: $("#TBLDAFTAR_BADANUSAHANAMA").val()
				, TBLKECAMATAN_IDPEMILIK: $("#TBLKECAMATAN_IDPEMILIK").val()
			},
			success: function(respon) {
		            // $('#TBLDAFTAR_NOPOK').val(respon.TBLDAFTAR_NOPOK);
		            $('#TBLDAFTAR_PEMILIKNAMA').val(respon.TBLDAFTAR_PEMILIKNAMA);
		            $('#TBLDAFTAR_PEMILIKALAMAT').val(respon.TBLDAFTAR_PEMILIKALAMAT);
		            $('#TBLDAFTAR_BADANUSAHANAMA').val(respon.TBLDAFTAR_BADANUSAHANAMA);
		            $('#TBLDAFTAR_BADANUSAHAALAMAT').val(respon.TBLDAFTAR_BADANUSAHAALAMAT);
		            $('#TBLDAFTAR_PEMILIKRTRW').val(respon.TBLDAFTAR_PEMILIKRTRW);
		            $('#TBLDAFTAR_BADANUSAHATELP').val(respon.TBLDAFTAR_BADANUSAHATELP);
		            $('#TBLDAFTAR_ALASANNONAKTIF').val(respon.TBLDAFTAR_ALASANNONAKTIF);
		            $('#TBLKECAMATAN_IDBADANUSAHA').select2('val',respon.TBLKECAMATAN_IDBADANUSAHA);
		            getKelurahan(respon.TBLKECAMATAN_IDBADANUSAHA);
		            setTimeout(function() {
		            	$('#TBLKELURAHAN_IDBADANUSAHA').select2('val',respon.TBLKELURAHAN_IDBADANUSAHA);
		            }, 500);
		            $('#TBLDAFTAR_BADANUSAHAKODEPOS').val(respon.TBLDAFTAR_BADANUSAHAKODEPOS);
		            status = respon.TBLDAFTAR_ISAKTIF ;
		            if (status=='Y') {
		            	$("#isSudah").prop("checked", true);
		            	$("#isBelum").prop("checked", false);
		            } else if(status=='N'){
		            	$("#isSudah").prop("checked", false);
		            	$("#isBelum").prop("checked", true);
		            } else {
		            	$("#isBelum").prop("checked", false);
		            	$("#isSudah").prop("checked", true);
		            }
		        }
		    });

			// $('#widget-grid-tetapan').show('fast');
		// }
	}

jQuery(document).ready(function($) {
           $('#isBelum').change(function () {
               $('#isSudah').prop('checked', false);
           });

           $('#isSudah').change(function () {
               $('#isBelum').prop('checked', false);
           });
});

	function simpanx() {
		$.smallBox({
			title : "Success",
			content : "<i class='fa fa-save'></i><i> Data Berhasil Disimpan</i>",
			color : "#296191",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 1000			
		});
	}
	
	function simpan() {
		
		// var statususer = 'N';
		var checkBox = document.getElementById("isSudah");
		if (checkBox.checked==true) {
			statususer = 'Y';
		}
		else{
			statususer = 'N';
		}
		$.ajax({
			url: 'pendaftaran/ubah_statuswp/update',
			type: 'POST',
			dataType: 'json',
			data: {
				statususer : statususer,
				nopokok : $('#TBLDAFTAR_NOPOK').val(),
				alasan : $('#TBLDAFTAR_ALASANNONAKTIF').val(),
			},
			success:function (respon) {
				if (respon.status=='update' && statususer=='N') {
					notifikasi('Sukses','Data Berhasil Di Non Aktifkan', 'success',0,1);
				} else if (respon.status=='update' && statususer=='Y') {
					notifikasi('Sukses','Data Berhasil Di Aktifkan', 'success',0,1);
				} else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			},
			error: function (jqXHR, exception) {
				handelErr(jqXHR, exception);
			}
		});
	}


</script>