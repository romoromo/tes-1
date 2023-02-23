<form id="form-retribusi" class="smart-form ng-pristine ng-valid">
	<header>Retribusi Reklame</header>
	<fieldset id="sss">
		<div>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Tahun Pajak</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="select">
							<select class="select2" name="param[tbltransaksiretribusi_tahunpajak]" id="tbltransaksiretribusi_tahunpajak">
								<option selected="" value="">=== Pilih Tahun Pajak ====</option>
								<?php error_reporting(-1); $data['listtahun'] = Tahun::model()->findAll(); ?>
								<?php foreach ($data['listtahun'] as $tahun): ?>
									<option <?= $tahun['reftahun_nama']==date('Y') ? 'selected' : '' ?> value="<?= $tahun['reftahun_nama'] ?>"><?= $tahun['reftahun_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">NPWPD / Obyek Pajak</label>
					<label class="col control-label">:</label>
					<section class="col col-4">
						<div class=" input">
							<input type="text" name="param[tblobyek_nomorsptpd]" class="form-control tblobyek_nomorsptpd" id="tblobyek_nomorsptpd" placeholder="">
						</div>
					</section>
					<section class="col col-4">
						<label id="tblobyek_nama"></label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Kode Lokasi</label>
					<label class="col control-label">:</label>
					<section class="col col-3">
						<label class="select">
							<select id="pendataanreklame_kodelokasi" name="param[tblpendataanreklame_kodelokasi]">
								<option disabled="" selected="" value="0"><center>Pilih Kode Lokasi</center></option>
							</select> <i></i> 
						</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col-md-2 control-label">Jenis Reklame</label>
					<label class="col control-label">:</label>
					<section class="col col-4">
						<label class="select">
							<select class="select2" id="retrefjenisreklame_id" name="param[refjenisreklame_id]">
								<option selected="" value="">--- Pilih Jenis Reklame ---</option>
								<?php 
								$otherquery = array(
									'join_reftarifreklame'=>array('reftarifreklame','reftarifreklame.refjenisreklame_id = refjenisreklame.refjenisreklame_id')
									,'group'=>'refjenisreklame.refjenisreklame_id'
									);
									$data['listjenisreklame'] = DBFetch::query( array('from'=>'refjenisreklame','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
									<?php foreach ($data['listjenisreklame'] as $reklame): ?>
										<option keterangan="<?= $reklame['refjenisreklame_keterangan'] ?>" nama="<?= $reklame['refjenisreklame_nama'] ?>" value="<?= $reklame['refjenisreklame_id'] ?>"><?= $reklame['refjenisreklame_nama'] ?></option>
									<?php endforeach ?>
							</select>
							<input value="" type="hidden" name="param[refjenisreklame_nama]" id="refjenisreklame_nama">
						</label>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>			
			<br>
			<br>
			<div class="col col-md-12" >
				<div class="col col-3">
					<label for="label" class="input">Masa Pajak Awal</label>
					<label class="input">
						<input class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiretribusi_masaawal]" id="rtblpendataanreklame_masaawal" placeholder="Masa Awal" />
						<i class="icon-append fa fa-calendar "></i>
					</label>
				</div>
				<div class="col col-3">
					<label for="label" class="input">Masa Pajak Akhir</label>
					<label class="input">
						<input class="datepicker" data-dateformat="dd-mm-yy" type="text" name="param[tbltransaksiretribusi_masaakhir]" id="rtblpendataanreklame_masaakhir" placeholder="Masa Akhir" />
						<i class="icon-append fa fa-calendar "></i>
					</label>
				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col 2 control-label">Kelas Lokasi Strategis</label>
					<label class="col control-label">:</label>
					<section class="col-md-3">
						<table style="width: 100%; table-layout: fixed !important;"><tr><td>
							<label class="select">
							<select name="param[refreklamejalan_id]" class="select2" id="retrefreklamejalan_id">
									<option selected="" value="">--- Pilih Lokasi Jalan ---</option>
									<?php 
									$otherquery = array();
									$data['listlokasijln'] = DBFetch::query( array('from'=>'refreklamejalan','otherquery'=>$otherquery,'mode'=>'LIST') ); ?>
									<?php foreach ($data['listlokasijln'] as $lokasijln): ?>
										<option kelasjalan="<?= $lokasijln['refreklamejalan_kelasjalan'] ?>" skorstrategis="<?= $lokasijln['refreklamejalan_skorstrategis'] ?>" jeniskawasan="<?= $lokasijln['refreklamejalan_jeniskawasan'] ?>" hargakawasan="<?= $lokasijln['refreklamejalan_hargakawasan'] ?>" lebarjalan="<?= $lokasijln['refreklamejalan_lebarjalan'] ?>" nilailebarjalan="<?= $lokasijln['refreklamejalan_nilailebarjalan'] ?>" retribusitarif="<?= $lokasijln['refreklamejalan_retribusitarif'] ?>" retribusispanduk="<?= $lokasijln['refreklamejalan_retribusispanduk'] ?>" retribusibaliho="<?= $lokasijln['refreklamejalan_retribusibaliho'] ?>" value="<?= $lokasijln['refreklamejalan_id'] ?>"><?= $lokasijln['refreklamejalan_nama'] ?></option>
									<?php endforeach ?>
								</select>
							</label>
						</td></tr></table>
					</section>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col col-1 control-label">Lebar</label>
					<label class="col control-label">:</label>
					<label class="col-md-2">
					<label class="input">
						<input id="rettblpendataanreklame_lebar" name="param[tblretribusireklame_lebar]" type="text" class="form-control text-align-right" placeholder="Lebar Reklame">
					</label>
					</label>
				</div>
				<label class="col control-label"></label>
				<label class="col control-label">X</label>

				<div class="form-group">
					<label class="col control-label">Tinggi</label>
					<label class="col control-label">:</label>
					<label class="col col-2">
					<label class="input">
						<input id="rettblpendataanreklame_ketinggian" name="param[tblretribusireklame_tinggi]" type="text" class="form-control text-align-right format-ribuan" placeholder="Tinggi Reklame">
					</label>
					</label>
				</div>
			</div>
			<br>
			<br>
			<div class="col col-md-12">
			
				<div class="form-group">
					<label class="col control-label"> Jumlah Minggu</label>
					<label class="col control-label">:</label>
					<label class="col col-2">
					<label class="input">
						<input id="rettblpendataanreklame_ketinggian" name="param[tblretribusireklame_tinggi]" type="text" class="form-control text-align-right format-ribuan" placeholder="Tinggi Reklame">
					</label>
					</label>
				</div>
				<label class="col control-label"></label>
				<label class="col control-label">X</label>
				<div class="form-group">
					<label id= "harga" class="col control-label">Rp. 3500/hari</label>
				</div>
			</div>
			<br>
			<br>
			<div class="col col-md-12">
			
				<div class="form-group">
					<label class="col control-label"> Jumlah Reklame</label>
					<label class="col control-label">:</label>
					<label class="col col-2">
					<label class="input">
						<input id="rettblpendataanreklame_ketinggian" name="param[tblretribusireklame_tinggi]" type="text" class="form-control text-align-right format-ribuan" placeholder="Tinggi Reklame">
					</label>
					</label>
				</div>
				
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col col-1 control-label">Luas</label>
					<label class="col control-label">X</label>
					<label class="col col-1 control-label">Tarif </label>
					<label class="col control-label">X</label>
					<label class="col col-2 control-label">Jumlah Reklame</label>
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col col-1 control-label retribusiluas">. . . . .</label>
					<label class="col control-label">X</label>
					<label class="col col-2 control-label retribusitarif">. . . . .</label>
					<label class="col control-label">X</label>
					<label class="col col-2 control-label retribusihari">. . . . .</label>
					<input type="hidden" name="param[tblretribusireklame_luas]" id="tblretribusireklame_luas">
					<input type="hidden" name="param[refreklamejalan_retribusitarif]" id="refreklamejalan_retribusitarif">
					<input type="hidden" name="param[jumlahtarif_hari]" id="jumlahtarif_hari">
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col col-md-12">
				<div class="form-group">
					<label class="col control-label">=</label>
					<label class="control-label retribusittotal">Rp  . . . . . <label>
					<input type="hidden" id="tblretribusireklame_total" name="param[tblretribusireklame_total]">
				</div>
				<label class="col control-label"></label>
			</div>
			<br>
			<br>
			<br>
			</div>
		</fieldset>
		<input type="hidden" id="tbltransaksiretribusi_pajak" name="param[tbltransaksiretribusi_pajak]" value="0">
		<input type="hidden" id="tblpendataanreklame_id" name="param[tblpendataanreklame_id]" value="0">
		<input type="hidden" name="param[tblobyek_id]" value="<?= $data['obyek_id'] ?>" />
		<input type="hidden" name="param[tblretribusitanah_tahunpajak]" value="<?= date('Y') ?>" />
		<footer>
			<button class="btn btn-primary" type="submit">
				Simpan
			</button>
			<button type="button" class="btn btn-default" data-dismiss="modal">
				Batal
			</button>
		</footer>
	</form>
	<script type="text/javascript">
		pageSetUp();
		jQuery(document).ready(function($) {
			setPriceFormat();
			window.cmdp = 'tambah';
			window.idtransretr = 0;
		});

		function valNum(n) {
			n = (typeof n == "undefined") ? "0" : n;
			return !isNaN(toAngka(n)) ? Number(toAngka(n)) : 0;
		}

		loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/devbridgeAutocomplete/jquery.autocomplete.min.js", function(){
			generateAutocompleteOby();
		});
		function generateAutocompleteOby(tahun) {
			tahun = tahun!=null ? tahun : "";
			$('#tblobyek_nomorsptpd').val('');
			$('#tblobyek_nomorsptpd').autocomplete({
				serviceUrl: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/autocomplete_nosptpd?tahun='+tahun+'&subyekid=<?= $data['subyek_id'] ?>',

				onSelect: function (suggestion) {
					window.nomorsptpdx = suggestion.data;
					$("#tblobyek_nomorsptpd").val(window.nomorsptpdx);
					$("#tblobyek_nama").val(suggestion.namawp);
					kodelokasireklame_by_obyek(window.nomorsptpdx);
				}
				,showNoSuggestionNotice : true
				,noCache: true
				,noSuggestionNotice : "Tidak ditemukan Obyek Pajak"
			});
		}

		$("#tbltransaksiretribusi_tahunpajak").change(function(event) {
			generateAutocompleteOby($("#tbltransaksiretribusi_tahunpajak").select2('val'));
		});

		$("#pendataanreklame_kodelokasi").change(function(event) {
			var id = $("#pendataanreklame_kodelokasi").val();
			$.ajax({
					url: 'pendaftaran/Data_ketetapan/getdatarekl',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
					},
					success: function (respon) {
						$("#rtblpendataanreklame_masaawal").val(respon.tblpendataanreklame_masaawal.split('-').reverse().join('-'));
						$("#rtblpendataanreklame_masaakhir").val(respon.tblpendataanreklame_masaakhir.split('-').reverse().join('-'));
						$("#rettblpendataanreklame_lebar").val( parseInt(respon.tblpendataanreklame_lebar));
						$("#rettblpendataanreklame_ketinggian").val(respon.tblpendataanreklame_ketinggian);
						$("#retrefjenisreklame_id").select2('val', respon.refjenisreklame_id);
						$("#retrefreklamejalan_id").select2('val', respon.refreklamejalan_id);
						window.refjenisreklame_id=respon.refjenisreklame_id;

						if (respon.refjenisreklame_id==1) {
							setTimeout(function() {
							$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusibaliho')));
							$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusibaliho'));
							}, 500);

						} else if (respon.refjenisreklame_id==2) {
							setTimeout(function() {
							$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusispanduk')));
							$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusispanduk'));
							}, 500);

						} else if (respon.refjenisreklame_id==12) {
							setTimeout(function() {
							$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusispanduk')));
							$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusispanduk'));
							}, 500);

						} else if (respon.refjenisreklame_id==16) {
							setTimeout(function() {
							$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusispanduk')));
							$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusispanduk'));
							}, 500);
						}
					}
				});
			setTimeout(function() {
				hitungRetribusiRekl()
			},500);
		});

		function kodelokasireklame_by_obyek(obyid) {
			$.ajax({
				url: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kodelokasireklame_by_obyek',
				type: 'GET',
				dataType: 'json',
				data: {id: obyid},
				success: function(json) {
					window.jsonx = json;
					setComboList('pendataanreklame_kodelokasi', 'Kode Lokasi', json);
				}
			});		
		}

		function hitungRetribusiRekl() {
			if (window.refjenisreklame_id==1) {
				$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusibaliho'));
			} else if (window.refjenisreklame_id==2) {
				$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusispanduk'));
			} else if (window.refjenisreklame_id==12) {
				$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusispanduk'));
			} else if (window.refjenisreklame_id==16) {
				$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusispanduk'));
			} else {
				$("#refreklamejalan_retribusitarif").val($("#retrefreklamejalan_id option:selected").attr('retribusitarif'));
			}
			var lbr = valNum( $("#rettblpendataanreklame_lebar").val() )
			, tinggi = valNum( $("#rettblpendataanreklame_ketinggian").val() )
			, luas = lbr*tinggi
			, tarif = $("#refreklamejalan_retribusitarif").val()
			, jum_hari = valNum( $("#jumlah_hari").val() )
			, tarifperhari = jum_hari*500
			, total = luas*tarif*tarifperhari
			;
			if (window.refjenisreklame_id==1) {
				$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusibaliho')));
			} else if (window.refjenisreklame_id==2) {
				$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusispanduk')));
			} else if (window.refjenisreklame_id==12) {
				$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusispanduk')));
			} else if (window.refjenisreklame_id==16) {
				$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusispanduk')));
			} else {
				$(".retribusitarif").html(toRp($("#retrefreklamejalan_id option:selected").attr('retribusitarif')));
			}
			$("#refjenisreklame_nama").val(($("#retrefreklamejalan_id option:selected").text()));
			$("#tblpendataanreklame_id").val(($("#pendataanreklame_kodelokasi option:selected").attr('idpendataan')));

			$("#tblretribusireklame_luas").val(luas);
			$(".retribusiluas").html(formatRibuan(luas));

			$("#jumlahtarif_hari").val(tarifperhari);
			$(".retribusihari").html(toRp(tarifperhari));
			
			$("#tblretribusireklame_total").val(total);
			$(".retribusittotal").html(toRp(total));
			$("#tbltransaksiretribusi_pajak").val(total);
		}
		$("#rettblpendataanreklame_lebar, #rettblpendataanreklame_ketinggian, #jumlah_hari").keyup(function(event) {
			hitungRetribusiRekl();
		});

		loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
		function runFormValidation() {
			jQuery.validator.addMethod("number_ID", function(value, element) {
			// allow any non-whitespace characters as the host part
			return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:[\s\.,]\d{3})+)(?:[\.,]\d+)?$/.test(value);
		}, 'Mohon isikan dalam angka, pemisah desimal adalah koma (,)');

			var $FormDaftar = $("#form-retribusi").validate({
			// Rules for form validation
			rules : {
				"param[tbltransaksiretribusi_tahunpajak]" : {
					required : true
				}
				,"param[tblobyek_nomorsptpd]" : {
					required : true
				}
				,"param[tblpendataanreklame_kodelokasi]" : {
					required : false
				}
				,"param[tblpendataanreklame_masaawal]" : {
					required : false
				}
				,"param[tblpendataanreklame_masaakhir]" : {
					required : false
				}
				,"param[tblretribusireklame_lebar]" : {
					required : true
					,number_ID : true
				}
				,"param[tblretribusireklame_tinggi]" : {
					required : true
					,number_ID : true
				}
			},

			// Messages for form validation
			messages : {
				"param[tbltransaksiretribusi_tahunpajak]" : {
					required : 'Mohon pilih tahun pajak'
				}
				,"param[tblobyek_nomorsptpd]" : {
					required : "Mohon pilih sptpd"
				}
				,"param[tblpendataanreklame_kodelokasi]" : {
					required : 'Mohon pilih kode lokasi'
				}
				,"param[tblpendataanreklame_masaawal]" : {
					required : 'Mohon pilih kode lokasi'
				}
				,"param[tblpendataanreklame_masaakhir]" : {
					required : 'Mohon pilih kode lokasi'
				}
				,"param[tblretribusireklame_lebar]" : {
					required : 'Mohon isikan lebar'
				}
				,"param[tblretribusireklame_tinggi]" : {
					required : 'Mohon isikan tinggi'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, jalankan simpan()
				return simpanRetribusi();
			}
		});
		}

	function simpanRetribusi() {
		var addparam = {id: window.idtransretr, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpan',
			type: 'POST',
			dataType: 'json',
			data: $("#form-retribusi").serialize()+'&'+jQuery.param(addparam),
			success: function(respon) {
				if (respon.status=='success') {
					$("#modalRetribusi").modal('hide');
					notifikasi('Berhasil','Retribusi berhasil dientrikan ke sistem','success',1,0);
					simpanDetailRekl(respon.pk)
				} else {
				}
			}
		});
		return false
	}

	function simpanDetailRekl(id) {
		var param = {
					tbltransaksiretribusi_id: id
				};
			url_param = jQuery.param(param);
		// var addparam = {id: window.idtransretr, cmd: window.cmdp};
		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/pendaftaran/data_retribusi/simpanDetailReklame',
			type: 'POST',
			dataType: 'json',
			data: $("#form-retribusi").serialize()+'&'+url_param,
			success: function(respon) {
				detailIzinPemohon(window.idpemohon);
			}
		});
		return false
	}

	function setComboList(elemen, kata, respon) {
		//data = $.parseJSON(respon);
		data = respon;
		var list_html = '';
		if (data.length>0) {
			list_html += '<option value="" placeholder="=== Pilih '+kata+' ===" selected>=== Pilih '+kata+' ===</option>';
			$.each(data, function(i, item) {
				isDisabled = data[i].isDisabled=="T" ? 'disabled="disabled"' : '';
				var attr = '';
				$.each(item, function(key, val) {
					 attr += key+'="'+val+'" ';
				});
				list_html += '<option '+attr+'>'+data[i].text+'</option>';
			});
			$('#'+elemen).html(list_html);
		}
		else {
			$('#'+elemen).html('<option value="" placeholder="=== Pilih '+kata+' ===" selected="">=== Pilih '+kata+' ===</option>');
		}
	}
	</script>