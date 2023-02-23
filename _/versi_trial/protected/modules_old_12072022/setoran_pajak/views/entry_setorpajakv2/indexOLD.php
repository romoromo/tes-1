<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
				<h4><i class="fa fa-pencil"></i> Entry Setoran Pajak V2</h4>
		</div>
		</div>
		</div>


<section id="" class="">
		<!-- row -->
		<div class="row">

				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-teal" id="wid-cari-validasi_penyetoran" 
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
						<header role="heading">
								<span class="widget-icon"><i class="fa fa-check-square"></i></span>
												<h2> Validasi Penyetoran </h2>
								<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
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
				<section class="col col-2">
						<label class="input">
								<p> Masa Pajak</p>
						</label>
				</section>
				<section class="col col-2">
						<label class="input">
								<input id="tahunpajak" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" placeholder="">
						</label>
				</section>
				<section class="col col-1">
						<label class="input">
								<p> Bulan</p>
						</label>
				</section>
				<section class="col col-2">
						<label class="input">
								<input id="bulanpajak" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" placeholder="">
						</label>
				</section>
				<section class="col col-1">
						<label class="input">
								<p> Tanggal</p>
						</label>
				</section>
				<section class="col col-2">
						<label class="input">
								<input id="tanggalpajak" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" placeholder="">
						</label>
				</section>
		</div>

		<div class="row">
				<section class="col col-2">
						<p> Jenis Setoran </p>
				</section>
				<section class="col col-2">
					<label class="select">
						 <select class="input-md" id="jenis_setoran" style="background-color: #fff">
								<option value="" >Pilih</option>
								<option value="SPTPD" >SPTPD</option>
								<option value="SKPD" >SKPD</option>
								<option value="STPD" >STPD</option>
								<option value="SKPDKB" >SKPDKB</option>
								<option value="SKPD-A" >SKPD-A</option>
						</select><i></i>
								</label>
				</section>
				<section class="col col-1">
						<label class="input">
							<p> Ke</p>
						</label>
				</section>
				<section class="col col-1">
						<label class="input"><div class="row">
							 <input id="pajakke" type="number">
						</label>
				</section>
		</div>
		<div class="row">
				<section class="col col-2">
					 <label class="input">
						 <p> NOPOK </p>
				</section>
				<section class="col col-4">
						<label class="input">
							<input type="text" id="nopok">
						</label>
				</section>
		</div>
		<div class="row">
				<section class="col col-2">
					<label class="input">
						<p> Rekening </p>
					</label>
				</section>
				<section class="col col-3">
					<label class="input">
						<input type="text" value="1-20- 1-20-26-0-0-4-1-1-" disabled="disabled">
					</label>
				</section>
				<section class="col col-sm0">
					<label class="input">
						<p>-</p>
					</label>
				</section>
				<section class="col col-sm-1">
					<label class="input">
						<input type="text" maxlength="2">
					</label>
				</section>
				<section class="col col-sm0">
					<label class="input">
						<p>-</p>
					</label>
				</section>
				<section class="col col-sm-1">
					<label class="input">
						<input type="text" maxlength="3">
					</label>
				</section>
				<section class="col col-2">
						 <button type="button" id="btnProses" class="btn btn-sm btn-primary" style="float: left;">
							 <i class="fa-send-o"></i> Proses
						 </button>
				</section>
		</div>
		<div class="row">
				<section class="col col-2">
					 <label class="input">
							<p> Nama</p>
					 </label>
				</section>
				<section class="col col-3">
					 <label class="input">
							<input id="info_WPNama" type="text" disabled="disabled" style="background-color: #ccc">
					 </label>
				</section>
				<section class="col col-2">
					 <label class="input">
							 <p> SPT Nama</p>
					 </label>
				</section>
				<section class="col col-3">
					 <label class="input">
								<input type="text" disabled="disabled" style="background-color: #ccc">
					 </label>
				</section>
		</div>
		<div class="row">
				<section class="col col-2">
					 <label class="input">
						 <p> Alamat</p>
					 </label>
				</section>
				<section class="col col-3">
					 <label class="input">
						 <input id="info_WPAlamat" type="text" disabled="disabled" style="background-color: #ccc">
					 </label>
				</section>
				<section class="col col-2">
						<label class="input">
							 <p> Tanggal Pajak </p>
						</label>
				</section>
				<section class="col col-3">
						<label class="input">
							 <input type="text" disabled="disabled" style="background-color: #ccc">
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
					<span class="widget-icon"> <i class="fa fa-search"></i> </span>
						<h2>Setoran Pajak Lain-lain</h2>
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
				<form action="" id="form_setor_pajak" class="smart-form" novalidate>
					<fieldset>
					<input type="hidden" name="tahun" id="setor_tahun" value="">
					<input type="hidden" name="bln" id="setor_bln" value="">
					<input type="hidden" name="tgl" id="setor_tgl" value="">
					<input type="hidden" name="nopok" id="setor_nopok" value="">
					<input type="hidden" name="ke" id="setor_ke" value="">
						<div class="row">
							<section class="col col-2">
								<label class="input">
									<p> Tanggal Setor</p>
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<i class="icon-append fa fa-calendar"></i>
									<input readonly="" name="tanggal_setor" class="disabled" data-dateformat="dd-mm-yy" id="tanggal_setor">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-2">
								<p> Bunga </p>
							</section>
							<section class="col col-3">
								<label class="input">
									<input readonly="" name="bunga_setor" class="disabled format-rupiah text-align-right" id="bunga_setor">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-2">
								<label class="input">
									<p> Denda</p>
								</label>
							</section>
							<section class="col col-3">
								<label class="input">
									<input readonly="" name="denda_setor" class="disabled format-rupiah text-align-right" id="denda_setor">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-2">
								<label class="input">
									<p> Setoran Pajak</p>
								</label>
							</section>
							<section class="col col-3">
								<label class="input">
									<input readonly="" name="pajak" class="disabled format-rupiah text-align-right" id="pajak">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-2">
								<label class="input">
									<p> Jumlah Setor </p>
								</label>
							</section>
							<section class="col col-3">
								<label class="input">
									<input readonly="" name="jmlsetor" class="disabled format-rupiah text-align-right" id="jmlsetor">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-2">
								<label class="input">
									<p> Nomor SSPD</p>
								</label>
							</section>
							<section class="col col-3">
								<label class="input">
									<input readonly="" name="nomorsspd" class="disabled text-align-right" id="nomorsspd">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-2">
								<label class="input">
									<p> Tanggal Entry SSPD</p>
								</label>
							</section>
							<section class="col col-3">
								<label class="input">
									<input readonly="" name="tanggal_entrisspd" class="disabled" data-dateformat="dd-mm-yy" id="tanggal_entrisspd">
								</label>
							</section>
						</div>
						<div class="row">
							<label class="label col col-2">Validasi (Y/T)</label>
							<section class="col col-2">
								<label class="select">
									<select name="TBLSETORANBPD_ISBPD" id="TBLSETORANBPD_ISBPD">
										<option selected="" value="Y">Y</option>
									</select> <i></i>
								</label>
							</section>
						</div>

					</fieldset>     

					<footer id="footer_simpandata">
						<section class="col col-md-2">
							<button type="submit" id="btnSimpanData" class="btn btn-sm btn-primary" style="float: left;">
								<i class="fa fa-save"></i> Simpan
							</button>
							<button id="btncetak" class="btn btn-sm btn-primary" onclick="cetakSSPD()" style="float: left;">
								<i class="fa fa-print"></i> Cetak Ulang Validasi
							</button>
						</section>
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
		$("#wid-id-validasi_penyetoran").hide();
	});

	/*form validation*/
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $FormData = $("#form_setor_pajak").validate({
			// Rules for form validation
			rules : {
				"param[tblobyek_pengukuhantgl]" : {
					required : true
				}
				,"param[tblobyek_pengukuhanno]" : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tblobyek_pengukuhantgl]" : {
					required : "Mohon isikan tanggal pengukuhan"
				}
				,"param[tblobyek_pengukuhanno]" : {
					required : "Mohon isikan nomor pengukuhan"
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, jalankan simpan()
				return simpan();
			}
		});

	};
	/*//form validation*/

	loadScript("<?php echo Yii::app()->getBaseUrl(1) ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
		generateAutocompleteWPHotel();
	});

	function generateAutocompleteWPHotel() {
		$('#nopok').autocomplete({
			serviceUrl: 'setoran_pajak/entry_setorpajakv2/autocomplete',

			onSelect: function (suggestion) {
				//alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
				window.nopok_pilih = suggestion.data;
				window.nopokok = suggestion.TBLDAFTAR_NOPOK;
				window.nama = suggestion.TBLDAFTAR_BADANUSAHANAMA;
				window.alamat = suggestion.TBLDAFTAR_BADANUSAHAALAMAT;
				$(this).val(suggestion.value);
				$('#nopok').val(suggestion.value.split(' | ')[0]);
				$('#info_WPNama').val(nama);
				$('#info_WPAlamat').val(alamat);

			}
			,showNoSuggestionNotice : true
			,noCache : true
			,noSuggestionNotice : "Tidak ditemukan hasil"
		});
	}

	$("#btnProses").click(function(event) {
		$("#wid-id-validasi_penyetoran").hide();
		$("#btncetak").hide();
		if (parseInt($("#nopok").val())==0) {
			notifikasi('Maaf', 'Mohon isikan nomor pokok!', '0', 1, 0);
			return false;
		}
		$.ajax({
			url: 'setoran_pajak/entry_setorpajakv2/getDataSetorBPD',
			type: 'POST',
			dataType: 'json',
			data: {
				tahunpajak : $("#tahunpajak").val()
				,bulanpajak : $("#bulanpajak").val()
				,tanggalpajak : $("#tanggalpajak").val()
				,pajakke : $("#pajakke").val()
				,nopok : $("#nopok").val()
				,jenis_setoran : $("#jenis_setoran").val()
			},
		})
		.done(function(respon) {
			if (respon.status!='found') {
				notifikasi('Maaf', respon.message, '0', 1, 0);
				return false;
			}
			$("#wid-id-validasi_penyetoran").show();
			$("#setor_tahun").val( $('#tahunpajak').val() );
			$("#setor_bln").val( $('#bulanpajak').val() );
			$("#setor_tgl").val( $('#tanggalpajak').val() );
			$("#setor_nopok").val( $('#nopok').val() );
			$("#setor_ke").val( $('#pajakke').val() );
			datapajak = respon.data;
			datasetoran = respon.datasetoran;
			$("html, body").animate({ scrollTop: 500 }, "slow");
			$('#tanggal_setor').val(
				isikiri(datapajak.TBLSETORANBPD_TGLSETOR, '00')
				+'-'+isikiri(datapajak.TBLSETORANBPD_BLNSETOR, '00')
				+'-20'+isikiri(datapajak.TBLSETORANBPD_THNSETOR, '00')
			);
			$('#tanggal_entrisspd').val(
				isikiri(datapajak.TBLSETORANBPD_TGLSSPD, '00')
				+'-'+isikiri(datapajak.TBLSETORANBPD_BLNSSPD, '00')
				+'-20'+isikiri(datapajak.TBLSETORANBPD_THNSSPD, '00')
			);

			$("#nomorsspd").val(datapajak.TBLSETORANBPD_NOMORSSPD);
			$("#bunga_setor").val(parseInt(datasetoran.bunga));
			$("#denda_setor").val(parseInt(datasetoran.denda));
			$("#pajak").val(parseInt(datasetoran.pajak));
			$("#jmlsetor").val(parseInt(datasetoran.jmlsetor));
			window.infosetor = (datasetoran);
			setPriceFormat();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$("#TBLSETORANBPD_ISBPD").change(function(event) {
		$('#btnSimpanData').hide();
		if($("#TBLSETORANBPD_ISBPD").val()=='Y'){
			$('#btnSimpanData').show();
		}
	});

	function isikiri(angka, pad) {
		var str = "" + angka;
		var pad = pad;
		var ans = pad.substring(0, pad.length - str.length) + str;
		return ans;
	}

	function simpan() {
		var param = {
		}
		param = $.extend(param, window.infosetor);
		$.ajax({
			url: 'setoran_pajak/entry_setorpajakv2/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form_setor_pajak").serialize()+'&'+jQuery.param(param),
		})
		.done(function(respon) {
			if (respon.status=='success') {
				notifikasi('Berhasil', 'Validasi setoran sudah dijalankan.', 'success', 1, 0);
				cetakSSPD();
				setTimeout(function() {
					window.location.reload();
				}, 3000);
			} else {
				if (respon.status == 'exists') {
					notifikasi('Data Sudah Ada', 'Akan melakukan cetak SSPD. Mohon tunggu', 'success', 1, 0);
					cetakSSPD()
					return false
				}
				notifikasi('Maaf', respon.message, '0', 1, 0);
			}
			console.log("success");
		})
		.fail(function(jqXHR, xxx) {
			notifikasi('Maaf', 'Ada kesalahan server, silahkan ulangi, Jika masih berlanjut hubungi Administrator.', '0', 1, 0);
			console.log(jqXHR);
			console.log(xxx);
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function cetakSSPD() {
		var param = {
			TBLDAFTAR_NOPOK: btoa(btoa($("#nopok").val()))
			,TBLPENDATAAN_THNPAJAK: btoa(btoa($("#tahunpajak").val().substr(-2)))
			,TBLPENDATAAN_BLNPAJAK: btoa(btoa($("#bulanpajak").val()))
			,TBLPENDATAAN_TGLPAJAK: btoa(btoa($("#tanggalpajak").val()))
			,TBLPENDATAAN_PAJAKKE: btoa(btoa($("#pajakke").val()))
			,TBLSETOR_JNSBAYAR: btoa(btoa($("#jenis_setoran").val()))
		}
		window.open('setoran_pajak/entry_setorpajakv2/cetakSSPD/?'+jQuery.param(param));
	}
</script>
<style type="text/css">
	input.disabled {
		background: #ccc!important;
	}
</style>