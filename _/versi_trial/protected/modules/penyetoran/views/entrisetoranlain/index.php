<?php 
define('ASSETS_URL', Yii::app()->theme->baseUrl);
?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light bg-color-greenLight txt-color-white">
			<h4><i class="fa fa-file-text-o"></i>  Entri Setoran Lain - lain</h4>
		</div>
	</div>
</div>


<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-teal" id="wid-id-setoran_lain" 
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
				<h2>Validasi Penyetoran</h2>

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
								<section class="col col-md-1">
									Tanggal Setor
								</section>
								<section class="col col-md-2">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
										<input type="text" name="tglsetor" class="datepicker" data-dateformat="dd-mm-yy" id="tglsetor">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									<p>Kode Penyetor  </p>
								</section>
								<section class="col col-md-2">
									<label class="input">
										<input class="input-sm" type="text" id="enopok" name="enopok">
									</label>
								</section>
								<section class="col col-md-1">
									<p>Setoran Ke</p>
								</section>
								<section class="col col-md-1">
									<label class="input">
										<input type="number" name="setoranke" id="setoranke" /><i></i> 
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-1">
									<p>Rekening </p>
								</section>
								<section class="col col-md-4">
									<label class="input">
										<input data-mask="1-20-1-20-26-0-0-4-1-1-99-99" class="input-sm" type="text" id="rekening" name="rekening">
									</label>
								</section>
								<section class="col col-md-3">
									<button type="button" class="btn btn-sm btn-primary" onclick="cari()">
										Enter
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
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display: none;" id="wid-id-data_setoran">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-teal"
		data-widget-editbutton="false"
		data-widget-deletebutton="false"
		data-widget-custombutton="false"
		data-widget-fullscreenbutton="false"
		data-widget-colorbutton="false"
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
				<h2>Setor Pajak Lain - lain</h2>

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

					<form action="" id="form_setorlain" class="smart-form" >
						<fieldset>
							<header>Penambahan Setoran</header><br>
							<div class="row">
								<section class="col col-md-2">
									Nama Rekening
								</section>
								<section class="col col-md-6">
									<b id="namarek">Rekening</b>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Keterangan </p>
								</section>
								<section class="col col-md-5">
									<label class="textarea"> 										
										<textarea placeholder="Keterangan (maks 30 karakter)" rows="3" name="KET" id="KET" maxlength="30"></textarea> 
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Tahun </p>
								</section>
								<section class="col col-md-2">
									<label for="address" class="input">
										<input type="text" name="TGCGT" id="TGCGT">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Kode BKP/Bank </p>
								</section>
								<section class="col col-md-2">
									<label for="address" class="input">
										<input class="disabled" readonly="" value="10" type="text" name="TBLSETOR_STATUSBAYAR" id="TBLSETOR_STATUSBAYAR">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Bukti Setor </p>
								</section>
								<section class="col col-md-5">
									<label for="address" class="input">
										<input type="number" name="TBLSETOR_NOMORSSPD">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Jumlah Setor </p>
								</section>
								<section class="col col-md-5">
									<label for="TBLSETOR_RUPIAHSETOR" class="input">
										<input class="format-rupiah text-align-right" type="text" name="TBLSETOR_RUPIAHSETOR" id="TBLSETOR_RUPIAHSETOR">
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">
									<p>Validasi (Y/T)</p>
								</section>
								<section class="col col-md-2">
									<label class="select">
										<select name="stat_Validasi" id="stat_Validasi">
											<option selected="" value="Y">Y</option>
											<option value="T">T</option>
										</select> <i></i> 
									</label>
								</section>
							</div>
						</fieldset>		
						<footer>
							<button type="button" id="btnSimpan" class="btn btn-sm btn-primary">Simpan</button>
							<button type="reset" class="btn btn-sm btn-default">Batal</button>
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

</section><BR>

<div style="display: none;" id="dialog-confirm" title="Hapus data ini?">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>"Data dengan Masa Pajak <span id="dlg_tglsetor"></span> transaksi ke  <span id="dlg_setoranke"></span> sudah pernah didata. Apakah akan dihapus?</p>
</div>

<script type="text/javascript">
	pageSetUp();

	jQuery(document).ready(function($) {
		<?php if (Yii::app()->request->getParam('r')=='pbb') : ?>
			$('#rekening').val('1-20-1-20-26-0-0-4-1-1-10-00');
			$('#enopok').val('2200000');
		<?php endif ?>
		<?php if (Yii::app()->request->getParam('r')=='ppj') : ?>
			$('#rekening').val('1-20-1-20-26-0-0-4-1-1-05-00');
			$('#enopok').val('101190');
		<?php endif ?>
		$("#btnSimpan").click(function(event) {
			simpan();
		});

		function simpan() {
			$("#btnSimpan").attr('disabled', 1);
			var addparam = {
			};
			$.ajax({
				url: 'penyetoran/entrisetoranlain/simpandata',
				type: 'POST',
				dataType: 'json',
				data: $("#form_setorlain").serialize()+'&'+jQuery.param(addparam)+'&'+$("#form_sumber_pajak").serialize()
			})
			.done(function(respon) {
				if (respon.status=='success') {
					// cetak();
					// $("#btnCetakSetorLain").show();
					notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1,0);
					$("#wid-id-data_setoran").hide();
				}else{
					notifikasi('Gagal', 'Sudah pernah diinputkan', 'fail', 1,0);
				}
			})
			.fail(function(jqXHR, exception) {
				handelErr(jqXHR, exception);
			})
			.always(function() {
				console.log("complete");
				$("#btnSimpan").removeAttr('disabled');
			});;
		}
	});

	function cari() {
		subrek = $("#rekening").val().substr(-5).split('-');
		if (subrek.length==1 || subrek[0]==0) {
			notifikasi('Maaf', 'Isikan rekening terlebih dahulu', 'x', 1, 0);
			return false;
		}
		$("#wid-id-data_setoran").hide();
		$("#form_setorlain")[0].reset();
		$.ajax({
			url: 'penyetoran/entrisetoranlain/getdata',
			type: 'POST',
			dataType: 'json',
			data: {
				tglsetor : $('#tglsetor').val(),
				rekening : $('#rekening').val(),
				enopok : $('#enopok').val(),
				setoranke : $('#setoranke').val(),
			},
		})
		.done(function(respon) {
			if (respon.data.validate=='kurang') {
				notifikasi('Silahkan isikan data dengan lengkap', 'Periksa kembali isian data dan klik cari', 'fail', 1,0);
			} else if (respon.data.validate=='rekening_not_valid') {
				notifikasi('Maaf', 'Rujukan Rekening Tidak Ada...!!!<br>Periksa kembali rekening', 'fail', 1,0);
			} else {
				if (respon.data.exist=='ada') {
					notifikasi('Maaf','Setoran Sudah Pernah di Inputkan...!!!', 'fail', 1,0);
					// $.SmartMessageBox({
					// 	title : "Informasi", // judul Smart Alert
					// 	content : "Data dengan Masa Pajak "+$('#tglsetor').val()+" transaksi ke "+$('#setoranke').val()+" sudah pernah mendaftar. <br> Apakah anda ingin menghapus data ini?", // konten dari smart alert
					// 	buttons : '[Tidak][Ya]' // pengaturan tombol
					// 	}, function(ButtonPressed) {
					// 		if (ButtonPressed === "Ya") {
					// 			$.ajax({
					// 				url: 'penyetoran/entrisetoranlain/hapus',
					// 				type: 'POST',
					// 				dataType: 'json',
					// 				data: $("#form_sumber_pajak").serialize(),
					// 			})
					// 			.done(function(respondel) {
					// 				if (respondel.data.validate=='kurang') {
					// 					notifikasi('Silahkan isikan data dengan lengkap', 'Periksa kembali isian data dan klik cari', 'fail', 1,0);
					// 					return false;
					// 				}
					// 				if (respondel.status=='ok') {
					// 					notifikasi('Berhasil', 'Data berhasil dihapus', 'success', 1,0);
					// 				} else {
					// 					notifikasi('Maaf', 'Data gagal dihapus', 'x', 1,0);
					// 				}
					// 			})
					// 			.fail(function(jqXHR, exception) {
					// 				handelErr(jqXHR, exception);
					// 			})
					// 			.always(function() {
					// 				$("#wid-id-data_setoran").hide();
					// 			});
					// 		}
					// 	}
					// );
					$("#wid-id-data_setoran").show();
					$("#namarek").text(respon.data.rekening.TBLREKENING_NAMAREKENING);
					$("#KET").val('');
					$("#TBLSETOR_NOMORSSPD").val(respon.model.TBLSETOR_NOMORSSPD);
					$("#TBLSETOR_RUPIAHSETOR").val(respon.model.TBLSETOR_RUPIAHSETOR);
					$("#dlg_setoranke").text(respon.model.TBLPENDATAAN_PAJAKKE);
					$("#dlg_tglsetor").text(isikiri(respon.model.TBLPENDATAAN_TGLPAJAK, '00')+'-'+isikiri(respon.model.TBLPENDATAAN_BLNPAJAK, '00')+'-'+isikiri(respon.model.TBLPENDATAAN_THNPAJAK, '2000'));
					$("#stat_Validasi").val('Y');
					setPriceFormat();
					$("#dialog-confirm" ).dialog({
						resizable: false,
						height: "auto",
						width: 400,
						modal: true,
						buttons: {
							"Ya, Hapus ": function() {
								$( this ).dialog( "close" );
								$.ajax({
									url: 'penyetoran/entrisetoranlain/hapus',
									type: 'POST',
									dataType: 'json',
									data: $("#form_sumber_pajak").serialize(),
								})
								.done(function(respondel) {
									if (respondel.data.validate=='kurang') {
										notifikasi('Silahkan isikan data dengan lengkap', 'Periksa kembali isian data dan klik cari', 'fail', 1,0);
										return false;
									}
									if (respondel.status=='ok') {
										notifikasi('Berhasil', 'Data berhasil dihapus', 'success', 1,0);
									} else {
										notifikasi('Maaf', 'Data gagal dihapus', 'x', 1,0);
									}
								})
								.fail(function(jqXHR, exception) {
									handelErr(jqXHR, exception);
								})
								.always(function() {
									$("#wid-id-data_setoran").hide();
								});
							},
							Tidak: function() {
								$( this ).dialog( "close" );
							}
						}
					});
					return false;
				} else {
					$("#wid-id-data_setoran").show();
				}

				$("#namarek").text(respon.data.rekening.TBLREKENING_NAMAREKENING);
				setPriceFormat();
			}
		})
		.fail(function(jqXHR, exception) {
			handelErr(jqXHR, exception);
		})
		.always(function() {
			console.log("complete");
		});
	}

</script>