<?php 
$data['list_kecamatan'] = Kecamatan::model()->findAll( array('order'=>'REFKECAMATAN_KODE ASC') );
?>
<form id="form-data-subyek">
<section class="col col-md-12">
	<div class="panel-group smart-accordion-default" id="accordion">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> 
						<i class="fa fa-lg fa-angle-down pull-right"></i> 
						<i class="fa fa-lg fa-angle-up pull-right"></i><p align="center"> DIISI OLEH SELURUH WAJIB PAJAK BADAN</p>
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse">
				<div class="panel-body no-padding">
					<fieldset class="smart-form">
                        <div class="row">
                            <section class="col col-md-2">
                                1. Nama Badan / Merk Usaha
                            </section>
                            <section class="col col-md-6">
                                <label for="address" class="input">
                                    <input type="text" name="tnpwpddaftar_bumerk" id="tnpwpddaftar_bumerk">
                                </label>
                            </section>
                        </div>
                        <div class="col col-3" style="display: none;">
                            <section>
                                <div class="row">
                                    <label class="label col col-4">Jenis Usaha</label>
                                    <div class="col col-12">
                                        <div class="inline-group">
                                            <label class="radio">
                                                <input type="radio" class="tblsubyek_jenisusaha" name="param[tblsubyek_jenisusaha]" id="isPerorangan" value="Perorangan">
                                                <i></i> Perorangan
                                            </label>
                                            <label class="radio">
                                                <input type="radio" class="tblsubyek_jenisusaha" name="param[tblsubyek_jenisusaha]" id="isBadanUsaha" value="Badan Usaha">
                                                <i></i> Badan Usaha
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div style="margin-left: 2%;">
                            <div class="row">
                                <section class="col col-md-2">
                                    NIK
                                </section>
                                <section class="col col-md-3">
                                    <label for="address" class="input">
                                        <input data-mask="99.99.99.99.99.99.9999" value="" type="text" name="param[tnpwpddaftar_bunik]" id="tnpwpddaftar_bunik">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                    NPWP
                                </section>
                                <section class="col col-md-3">
                                    <label for="address" class="input">
                                        <input data-mask="99.999.999.9-999.999" value="" type="text" name="param[tnpwpddaftar_bunpwp]" id="tnpwpddaftar_bunpwp">
                                    </label>
                                </section>
                            </div>
                             <div class="row">
                                <section class="col col-md-2">
                                    No. HP
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="tnpwpddaftar_buhp" name="param[tnpwpddaftar_buhp]">
                                    </label>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <section class="col col-md-12">
                                2. Alamat (photo copy Surat Keterangan Domisili diampirkan)
                            </section>
                        </div>
                        <div style="margin-left: 2%;">
                            <div class="row">
                                <section class="col col-md-2">
                                   Jalan / No.
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="tnpwpddaftar_bujalan" name="param[tnpwpddaftar_bujalan]">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Kabupaten / Kota
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="tnpwpddaftar_milikkabkota" name="param[tnpwpddaftar_milikkabkota]">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                   Rt/Rw / Rk
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="tnpwpddaftar_burtrwrk" name="param[tnpwpddaftar_burtrwrk]">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Nomor Telepon
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="tnpwpddaftar_butelp" name="param[tnpwpddaftar_butelp]">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                   Kecamatan
                                </section>
                                <section class="col col-md-3">
                                    <label class="select">
                                        <select class="select2" name="param[refkecamatan_id]" id="refkecamatan_id">
                                            <option value="">=== Pilih Kecamatan ===</option>
                                            <?php foreach ($data['list_kecamatan'] as $opKec) : ?>
											<option value="<?php echo $opKec['REFKECAMATAN_ID'] ?>">[<?php echo $opKec['REFKECAMATAN_KODE'] ?>] <?php echo $opKec['REFKECAMATAN_NAMA'] ?></option>
										<?php endforeach ?>
                                        </select> 
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   File upload
                                </section>
                                <section class="col col-md-4">
                                    <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-md-2">
                                   Kelurahan
                                </section>
                                <section class="col col-md-3">
                                    <label class="select">
                                         <select class="select2" name="param[refkelurahan_id]" id="refkelurahan_id">
                                            <option value="">=== Pilih Kelurahan ===</option>
                                            <option value=""></option>
                                        </select>
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Kode Pos
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="tnpwpddaftar_bukodepos" name="param[tnpwpddaftar_bukodepos]">
                                    </label>
                                </section>
                            </div>                                                              

                        </div>
                        <div class="row">
                            <section class="col col-md-12">
                                3. Surat izin yang dimiliki (Photo copy surat izin harap dilampirkan)
                            </section>
                        </div>
                        <div style="margin-left: 2%;">
                            <div class="row">
                                <section class="col col-md-2">
                                   Surat Izin Gangguan
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" name="nama_usaha">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Tanggal
                                </section>
                                <section class="col col-md-2">
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_izinganguan">
                                    </label>
                                </section>
                                <section class="col col-md-4">
                                    <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                   Surat Izin Usaha Kepariwisata
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" name="nama_usaha">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Tanggal
                                </section>
                                <section class="col col-md-2">
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_izinkepariwisata">
                                    </label>
                                </section>
                                <section class="col col-md-4">
                                    <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label>
                                </section>
                            </div>
                            <div class="row">
                                <section class="col col-md-2">
                                  No Akta Pendirian
                                </section>
                                <section class="col col-md-2">
                                    <label for="address" class="input">
                                        <input type="text" id="tnpwpddaftar_bunoakta" name="param[tnpwpddaftar_bunoakta]">
                                    </label>
                                </section>
                                <section class="col col-md-2">
                                   Tanggal
                                </section>
                                <section class="col col-md-2">
                                    <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="request" class="datepicker" data-dateformat="dd/mm/yy" id="tgl_izin..">
                                    </label>
                                </section>
                                <section class="col col-md-4">
                                    <label for="file" class="input input-file">
                                    <div class="button"><input type="file" name="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly="">
                                    </label>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <section class="col col-md-12">
                                4. Bidang Usaha (harap diisi sesuai dengan bidang usahanya)
                            </section>
                        </div>
                        <div style="margin-left: 2%;">
                            <div class="row">
                            	<!-- START -->
                            	<?php $no = 1; foreach (TRekening::model()->getRekeningAktif() as $list_rek): ?>
                            	<?php if ( $no-1 / 5 === 1 OR $no == 1): ?>
                            		<section class="col col-md-4">
                            		<?php endif ?>
                            		<?php $pajakrek_kode = $list_rek['TREKENING_KODE']; ?>
                            		<label class="radio pull-left">
                            			<input type="radio" class="radio_jenisrekening" value="<?= $pajakrek_kode ?>" name="param[tblrekening_kode]">
                            			<i></i> <?= $list_rek['TREKENING_NAMA'] ?>
                            		</label>

                            		<button style="display: none; margin-left: 10px;" id="btn-det-<?= $pajakrek_kode ?>" type="button" onclick="getFormDetail('<?= base64_encode( RFormPajak::model()->getFormKode( $pajakrek_kode ) ) ?>')" class="btn btn-sm bg-color-magenta txt-color-white btn-det">
                            			<i class="fa fa-table"></i> Detail
                            		</button>
                            		<br><br>
                            		<?php if ( $no-1 / 5 === 1 OR $no == 5): ?>
                            		</section>
                            	<?php endif ?>
                            	<?php $no++; endforeach ?>
                            <section class="col col-md-4">&nbsp;</section>
                            	<!-- STOP -->
                                <?php /*section class="col col-md-3">
                                    <label class="radio">
                                        <input type="radio" name="radio" checked="checked">
                                        <i></i>Hotel
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i>Restoran
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i>Hiburan
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i>Reklame
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i>Penerangan Jalan
                                    </label>
                                </section>
                                <section class="col col-md-6">
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i>Peyelenggaraan tempat parkir di luar badan jalan
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i>Pengambilan dan atau Pemanfaatan air tanah
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i>pengambilan dan atau pengusahaan sarang burung walet
                                    </label>
                                    <!-- <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i> PBB
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="radio">
                                        <i></i> BPHTB
                                    </label> -->
                                </section*/ ?>
                            </div>
                        </div>
                    </fieldset>
				</div>
			</div>
		</div>
		
		<?php include_once 'form-pemilik.php'; ?>

        
	</div>
</section>

<footer>
		<div class="col col-12">
			<label class="textarea">
				<ol>
					<?php /*<li>Petunjuk ...</li>*/ ?>
				</ol>
			</label>
		</div>

		<button id="btn-simpan" type="submit" class="btn btn-primary">
			Simpan
		</button>
		<button type="reset" class="btn btn-default" data-dismiss="modal">
			Batal
		</button>

	</footer>
</form>

<script type="text/javascript">

	function simpanNPWPD() {
		$.ajax({
			url: 'pelayanan/npwpd/simpan',
			type: 'post',
			dataType: 'json',
			data:  $("#form-data-subyek").serialize()+'&id='+window.idSubyek+'&cmd='+window.cmd,
			success: function(respon) {
				if (respon.status=="success") {
					$("#formpemohon_daftar").hide();
					notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);
					detailIzinPemohon(respon.pk);
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail',1,0);
				}
			}
		});

		return false;
	}

	$("#refkecamatan_id").change(function(event) {
		getkelurahan_by_kecamatan($("#refkecamatan_id").val());
	});

	function getkelurahan_by_kecamatan(kecid, kelid) {
		$("#refkelurahan_id").select2('val','');
		$.ajax({
			url: '<?php echo Yii::app()->getBaseUrl(1); ?>/open_data/get/data/kelurahan_by_kecamatan',
			type: 'GET',
			dataType: 'json',
			data: {id: kecid},
			success: function(json) {
				window.jsonx = json;
				setSelectList('refkelurahan_id', 'Kelurahan', json);
				if (kelid!=null) {
					setTimeout(function() {
						$("#refkelurahan_id").select2('val',kelid!="0" ? kelid : "" ); // set combo
					}, 500);
				}
			}
		});		
	}		

	function TambahSubyek() {
			window.cmd = "tambah";
			window.idSubyek = '';
			$("#cmd").val("tambah");
			$("#form-data-subyek")[0].reset();
			$("#form-data-subyek .select2").select2('val','');
			$("#sec_indentitas").hide();
			$(".isBadanUsaha").hide();
			$(".isDalamWil").hide(); 
			$("#formpemohon_daftar").show();

			/*$("input[type=radio][value='"+window.formobyek['wn']+"'].tblsubyek_wn").prop('checked', true);
			$("input[type=radio][value='"+window.formobyek['jenis_usaha']+"'].tblsubyek_jenisusaha").prop('checked', true);*/

			// setFormIdentitas();

		}

	$("#btnTambahSubyek").click(function(event) {
		TambahSubyek();
	});

	function tambahObyek() {
			/* window.cmd = "tambah";
			window.idSubyek = '';
			$("#cmd").val("tambah");
			$("#form-data-subyek")[0].reset();
			$("#form-data-subyek .select2").select2('val','');
			$("#sec_indentitas").hide();
			$(".isBadanUsaha").hide();
			$(".isDalamWil").hide(); */
			$("#formpemohon_daftar_npwpd").show();

			/*$("input[type=radio][value='"+window.formobyek['wn']+"'].tblsubyek_wn").prop('checked', true);
			$("input[type=radio][value='"+window.formobyek['jenis_usaha']+"'].tblsubyek_jenisusaha").prop('checked', true);*/

			// setFormIdentitas();

		}

	$("#btnTambahObyek").click(function(event) {
		tambahObyek();
	});

	$('.radio_jenisrekening').click(function(event) {
		isPilihPajak(event.target);
	});

	function isPilihPajak(elm) {
		$(".btn-det").hide();           
		if ( $(elm).prop('checked') ) {
			var kode = $(elm).val();
			$("#btn-det-" + kode).show(500);            
		}
	}
</script>	