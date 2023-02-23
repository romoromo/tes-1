

<!--Modal Salin-->
<div class="modal fade" id="modal-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Data
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form" id="form-data">
					<fieldset>
						<div class="row">
							<section class="col col-md-2">
								<p>ID</p>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input value="" type="text" name="REFBADANUSAHA_ID" id="REFBADANUSAHA_ID">
								</label>
							</section>
						</div>
						<div class="row">
							<section class="col col-md-2">
								<p>NAMA BU</p>
							</section>
							<section class="col col-md-4">
								<label class="input">
									<input value="" type="text" name="REFBADANUSAHA_NAMA" id="REFBADANUSAHA_NAMA">
								</label>
							</section>

							<section class="col col-md-2">
								<p>NAMA BU 90</p>
							</section>
							<section class="col col-md-4">
								<label class="input">
									<input value="" type="text" name="REFBADANUSAHA_NAMA_90" id="REFBADANUSAHA_NAMA_90">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-md-12">
								<p>KODE REK LAMA</p>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="PEND" value="" type="text" name="REFBADANUSAHA_REKPENDAPATAN" id="REFBADANUSAHA_REKPENDAPATAN">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="PAD" value="" type="text" name="REFBADANUSAHA_REKPAD" id="REFBADANUSAHA_REKPAD">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="PJK" value="" type="text" name="REFBADANUSAHA_REKPJK" id="REFBADANUSAHA_REKPJK">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="AYAT" value="" type="text" name="REFBADANUSAHA_REKAYAT" id="REFBADANUSAHA_REKAYAT">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="JENIS" value="" type="text" name="REFBADANUSAHA_REKJENIS" id="REFBADANUSAHA_REKJENIS">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-md-12">
								<p>KODE REK 90</p>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="PEND" value="" type="text" name="REFBADANUSAHA_REKPENDAPATAN_90" id="REFBADANUSAHA_REKPENDAPATAN_90">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="PAD" value="" type="text" name="REFBADANUSAHA_REKPAD_90" id="REFBADANUSAHA_REKPAD_90">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="PJK" value="" type="text" name="REFBADANUSAHA_REKPJK_90" id="REFBADANUSAHA_REKPJK_90">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="AYAT" value="" type="text" name="REFBADANUSAHA_REKAYAT_90" id="REFBADANUSAHA_REKAYAT_90">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="JENIS" value="" type="text" name="REFBADANUSAHA_REKJENIS_90" id="REFBADANUSAHA_REKJENIS_90">
								</label>
							</section>
							<section class="col col-md-2">
								<label class="input">
									<input placeholder="SUB" value="" type="text" name="REFBADANUSAHA_REKSUB_90" id="REFBADANUSAHA_REKSUB_90">
								</label>
							</section>
						</div>
					</fieldset>	

					<footer>
						<button type="submit" class="btn btn-primary">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>							
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		pageSetUp();
        /*form validation*/
        loadScript(
            "<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js",
            runFormValidation);
        jQuery.validator.addMethod("number_ID", function(value, element) {
            // allow any non-whitespace characters as the host part
            return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(
                value);
        }, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');
        jQuery.validator.addMethod("min_ID", function(value, element, params) {
            // allow any non-whitespace characters as the host part
            return this.optional(element) || toAngka(value) <= params[0];
        }, 'Mohon isikan dalam angka yang lebih dari {0}');
        jQuery.validator.addMethod("latitude", function(value, element) {
                // allow any non-whitespace characters as the host part
                return this.optional(element) ||
                    /^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/.test(value);
            },
            'Mohon isikan dalam angka, pemisah desimal adalah titik (.) range (-90 s/d +90) dengan maks 6 angka desimal'
        );
        jQuery.validator.addMethod("longitude", function(value, element) {
                // allow any non-whitespace characters as the host part
                return this.optional(element) ||
                    /^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,6})?))$/
                    .test(value);
            },
            'Mohon isikan dalam angka, pemisah desimal adalah titik (.) range (-180 s/d +180) dengan maks 6 angka desimal'
        );

        function runFormValidation() {
            var $FormData = window.validation_form_data = $("#form-data").validate({
                // Rules for form validation
                rules: {
                    "REFBADANUSAHA_ID": {
                        required: true,
                    },
                    "REFBADANUSAHA_NAMA": {
                        required: true,
                    },
                    "REFBADANUSAHA_NAMA_90": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKPENDAPATAN": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKPAD": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKPJK": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKAYAT": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKJENIS": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKPENDAPATAN_90": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKPAD_90": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKPJK_90": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKAYAT_90": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKJENIS_90": {
                        required: true,
                    },
                    "REFBADANUSAHA_REKSUB_90": {
                        required: true,
                    },
                },

                // Messages for form validation
                messages: {
                    "REFBADANUSAHA_ID": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_NAMA": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_NAMA_90": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKPENDAPATAN": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKPAD": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKPJK": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKAYAT": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKJENIS": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKPENDAPATAN_90": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKPAD_90": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKPJK_90": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKAYAT_90": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKJENIS_90": {
                        required: "Mohon isikan entrian berikut ",
                    },
                    "REFBADANUSAHA_REKSUB_90": {
                        required: "Mohon isikan entrian berikut ",
                    },
                },

                // Do not change code below
                errorPlacement: function(error, element) {
                    error.insertAfter(element.parent());
                },
                submitHandler: function(form) {
                    // saat validasi benar semua, jalankan simpan()
                    return simpan();
                }
            });

            function addRules(rulesObj) {
                for (var item in rulesObj) {
                    $('#' + item).rules('add', rulesObj[item]);
                }
                // console.log('add');
                // console.log(rulesObj);
            }

            function removeRules(rulesObj) {
                for (var item in rulesObj) {
                    $('#' + item).rules('remove');
                }
                // console.log('remove');
                // console.log(rulesObj);
            }
        };
        /*form validation*/
	});
</script>