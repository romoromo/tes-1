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
									<section class="col col-md-2">Tahun Pajak</section>
									<section class="col col-md-2" style="margin-left: 2%;">
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
											<input value="4.1.1.12 PAJAK BUMI BANGUNAN" style="background: #e4e4e4;" class="input-sm " type="text" id="rekening" name="rekening" disabled="disabled">
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
											<input type="text" class="format-rupiah" name="TBLLBHBAYARPBB_TERHUTANG" id="TBLLBHBAYARPBB_TERHUTANG">
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
											<input class="form-control format-rupiah" type="text" id="TBLLBHBAYARPBB_TERBAYAR" name="TBLLBHBAYARPBB_TERBAYAR">
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
											<input class="form-control" type="text" id="TBLLBHBAYARPBB_REGLEBIHBAYAR" name="TBLLBHBAYARPBB_REGLEBIHBAYAR">
										</label>
									</section>
									<section class="col col-md-1">Tgl SKPDLB</section>
									<section class="col col-md-2">
										<label class="input"> <i class="icon-append fa fa-calendar"></i>
											<input type="text" name="TBLLBHBAYARPBB_TGL" class="datepicker" data-dateformat="dd-mm-yy" id="TBLLBHBAYARPBB_TGL">
										</label>
									</section>
								</div>
								<div class="row">
									<section class="col col-md-2" style="margin-left: 2%;">Jumlah Kelebihan</section>
									<section class="col col-md-5">
										<label class="input">
											<input class="form-control format-rupiah" type="text" id="TBLLBHBAYARPBB_RUPIAHLBHBAYAR" name="TBLLBHBAYARPBB_RUPIAHLBHBAYAR">
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
                                    <button type="button" class="btn btn-sm btn-success" id="btnCetak">
                                        <i class="fa fa-print"></i>&nbsp;Cetak
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
		$("#TBLLBHBAYARPBB_TERHUTANG, #TBLLBHBAYARPBB_TERBAYAR").change(function(event) {
        	var setoran = parseFloat(toAngka($("#TBLLBHBAYARPBB_TERHUTANG").val()))
        	var pajak_terbayar = parseFloat(toAngka($("#TBLLBHBAYARPBB_TERBAYAR").val()))
        	var pajak_lb = pajak_terbayar - setoran
        	$("#TBLLBHBAYARPBB_RUPIAHLBHBAYAR").val(pajak_lb)
        	setPriceFormat()
        });
        loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);

	    function runFormValidation() {
	        var $FormData = $("#form_sumber_pajak").validate({
	            // Rules for form validation
	            rules: {
	                "TBLLBHBAYARPBB_NOP": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_TAHUN": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_NAMAWP": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_ALAMATWP": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_TERHUTANG": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_TERBAYAR": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_REGLEBIHBAYAR": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_TGL": {
	                    required: true
	                },
	                "TBLLBHBAYARPBB_RUPIAHLBHBAYAR": {
	                    required: true
	                },
	            },

	            // Messages for form validation
	            messages: {
	                "TBLLBHBAYARPBB_NOP": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_TAHUN": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_NAMAWP": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_ALAMATWP": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_TERHUTANG": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_TERBAYAR": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_REGLEBIHBAYAR": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_TGL": {
	                    required: 'Mohon isikan entian berikut',
	                },
	                "TBLLBHBAYARPBB_RUPIAHLBHBAYAR": {
	                    required: 'Mohon isikan entian berikut',
	                },
	            },

	            // Do not change code below
	            errorPlacement: function(error, element) {
	                error.insertAfter(element.parent());
	            },
	            submitHandler: function(form) {
	                // saat validasi benar semua, jalankan simpan()
	                return simpanskpdlb();
	            }
	        });

	        function simpanskpdlb() {
		        $.ajax({
		            url: '<?= $this->MODUL_URL ?>/SimpanSKPDLB',
		            type: 'post',
		            dataType: "json",
		            data: $("#form_sumber_pajak").serialize(),
		            success: function(data) {
		                if (data.status == "success") {
		                    notifikasi('Sukses', 'Data Berhasil Disimpan', 'success', 1, 0);
		                } else {
		                    notifikasi('Gagal', 'Data Gagal Disimpan', 'fail', 1, 0);
		                }
		            }
		        });
		    }

	    };

	    $("#btnCetak").click(function(event) {
	    	cetakWord();
	    });

	    function cetakWord() {
	        var param = jQuery.param({
	            TBLLBHBAYARPBB_NOP: $("#TBLLBHBAYARPBB_NOP").val(),
	            TBLLBHBAYARPBB_TAHUN: $("#TBLLBHBAYARPBB_TAHUN").val()
	        });
	        window.open('<?php echo Yii::app()->getBaseUrl(1); ?>/<?= $this->MODUL_URL ?>/cetakword?' + param);
	    }
	});
</script>