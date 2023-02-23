<div class="row">
	<section class="col col-md-12">
		<header style="margin-right: 0px;border-color:  red;">
			<p>Info NPWPD</p>
		</header>
	</section>
</div>

<?php /*===================================*/
// $data['daftar_npwpd'] = $this->getAllNPWD("PEMOHON", $data['idpemohon']);
 /*===================================*/ ?>

<div id="form_pendataan" style="margin-left: 15px;margin-top: 5px;margin-bottom: 5px;">
	<table class="table table-bordered table-striped" id="tbl_daftarpermohonan" style="margin-bottom: -1px !important;">
		<thead>
			<tr style="background-color: rgba(223, 218, 216, 0.62);">
				<td align="center" style="width: 51px;background-color: rgb(231, 231, 231);font-size: 14px;"><strong>No</strong></td>
				<td colspan="4" align="center" style="width: 130px;background-color: rgb(231, 231, 231);font-size: 14px;"><strong>Pendataan</strong></td>
				<td align="center" style="width: 26%;background-color: rgb(231, 231, 231);font-size: 14px;"><strong></strong></td>
			</tr>
		</thead>
		<tbody>
			<?php /*==================xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx=====================*/ ?>
			<?php $listnosptpd2 = array(); $urutan = 1; foreach ($data['daftar_npwpd'] as $rowNPWPD): ?>
			<?php //array_push($listnosptpd2, (int)$rowNPWPD['TNPWPD_NOMORSPTPD2']); ?>
			<tr>
				<td colspan="6" style="border-bottom: 3px solid rgb(215, 6, 6);"></td>
			</tr> 
			<tr >
				<td rowspan="5"><?php echo $urutan; ?>.</td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Nomor NPWPD</strong></td>
				<td>
				<?php echo !empty($rowNPWPD['TNPWPD_NPWPD']) ? DMOrcl::formatNPWPD($rowNPWPD['TNPWPD_NPWPD']) : '<label class="txt-color-red">Belum Dikukuhkan</label>' ?>

				<?php if ($rowNPWPD['TNPWPD_ISAKTIF']=="T"): ?>
				<?php endif ?>
				<br>
				<br>
				<a rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mengedit data obyek" class="btn bg-color-blueDark txt-color-white btn-sm btn-block" onclick="edit_obyek('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
					<i class="fa fa-pencil"></i> Edit Data Obyek
				</a>
				</td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Masa Pajak Terakhir</strong></td>
				<td><?php //$last = $this->getLasTKetetapan( $rowNPWPD['TNPWPD_ID'] ); ?>
				<?php //= ($last) ? LokalIndonesia::TGLID( $last['tbltransaksiketetapan_masaawal'],'/' ) : "-" ?> - <?php //= ($last) ? LokalIndonesia::TGLID( $last['tbltransaksiketetapan_masaakhir'],'/' ) : "-" ?></td>

				<td>
					<?php if ($rowNPWPD['TNPWPD_ISAKTIF']=="T"): ?>
						
					<button rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mengentri ketetapan pajak" class="btn btn-sm btn-default btn-block <?= $rowNPWPD['TNPWPD_ISKUKUH']=='F' ? "BLMKUKUH" : "" ?>" onclick="entri_pendataan('<?php echo $rowNPWPD['TNPWPD_ID'] ?>','<?php echo $rowNPWPD['TREKENING_KODE'] ?>')">
						<i class="fa fa-money"></i> Entri Pendataan
					</button>
					<?php if (substr($rowNPWPD['TREKENING_KODE'],0,5)!='41104'): ?>
					<button rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mengentri data detail obyek" class="btn btn-sm bg-color-orange txt-color-white btn-block" onclick="entri_detail('<?php echo $rowNPWPD['TNPWPD_ID'] ?>','<?php echo $rowNPWPD['TREKENING_KODE'] ?>')">
						<i class="fa  fa-tasks"></i> Entri Detail Obyek
					</button>
					<?php endif ?>
					<!-- <?php endif ?> -->
					<?php /*br>
					<div class="col col-12">
						<div class="inline-group">
							<label class="radio">
								<input <?= $rowNPWPD['TNPWPD_ISAKTIF']=='T' ? 'checked' : '' ?> type="radio" class="tblobyek_isaktif" name="param[tblobyek_isaktif]" onclick="changeKeaktifanObyek('<?= base64_encode($rowNPWPD['TNPWPD_ID']) ?>', '<?= base64_encode('T') ?>')" value="T">
								<i></i> Aktif
							</label>
							<label class="radio">
								<input <?= $rowNPWPD['TNPWPD_ISAKTIF']=='F' ? 'checked' : '' ?> type="radio" class="tblobyek_isaktif" name="param[tblobyek_isaktif]" onclick="changeKeaktifanObyek('<?= base64_encode($rowNPWPD['TNPWPD_ID']) ?>', '<?= base64_encode('F') ?>')" value="F">
								<i></i> Non Aktif
							</label>
						</div>
					</div*/ ?>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Nama NPWPD</strong></td>
				<td><b>OBJEK <?php echo $rowNPWPD['TREKENING_NAMA'] ?></b></td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Omzet Sebelumnya</strong></td>
				<td><?php //echo ($last) ? LokalIndonesia::rupiah( $last['tbltransaksiketetapan_omzettotal'] ) : "-"; ?></td>

				<td>
					<button  rel="tooltip" data-placement="left" data-original-title="Digunakan untuk  melihat riwayat ketetapan pajak" class="btn btn-sm btn-default btn-block" onclick="lihat_ketetapan('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
						<i class="fa fa-ticket"></i> Lihat Riwayat Ketetapan Pajak
					</button>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Rekening</strong></td>
				<td>
				[<?= $rowNPWPD['TREKENING_KODE'] ?>] <?= $rowNPWPD['TREKENING_NAMA'] ?>
				<?php if (!empty($rowNPWPD['TREKENINGSUB_KODE'])): ?>
				<br>Sub: 
				[<?= $rowNPWPD['TREKENINGSUB_KODE'] ?>] <?= $rowNPWPD['TREKENINGSUB_NAMA'] ?>
				<?php endif ?>
				</td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Pajak Sebelumnya</strong></td>
				<td><?php //echo ($last) ? LokalIndonesia::rupiah( $last['tbltransaksiketetapan_pajak'] ) : "-"; ?></td>

				<td>
					<button  rel="tooltip" data-placement="left" data-original-title="Digunakan untuk melihat riwayat setoran pajak" class="btn btn-sm btn-success txt-color-white btn-block" onclick="lihat_setoran('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
						<i class="fa fa-ticket"></i> Lihat Riwayat Setoran Pajak
					</button>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Tanggal Pengukuhan</strong></td>
				<td><?php echo strtotime($rowNPWPD['TNPWPD_TGLKUKUH']) ? LokalIndonesia::TanggalUmum( $rowNPWPD['TNPWPD_TGLKUKUH'] ) : '<label class="txt-color-red">Belum Dikukuhkan</label>' ?></td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Tanggal Jatuh Tempo</strong></td>
				<td><?php //echo strtotime($last['tbltransaksiketetapan_tgljatuhtempo']) ? LokalIndonesia::TanggalUmum( $last['tbltransaksiketetapan_tgljatuhtempo'] ) : '-'; ?></td>

				<td>
					<button  rel="tooltip" data-placement="left" data-original-title="Digunakan untuk melihat tunggakan pajak" class="btn btn-sm btn-info txt-color-white btn-block" onclick="lihat_tunggakan('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
						<i class="fa  fa-tasks"></i> Lihat Tunggakan Pajak
					</button>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Lokasi</strong></td>
				<td><?php echo $rowNPWPD['TSUBYEK_BUALAMAT'] ?><br><?php echo $rowNPWPD['TBLKELURAHAN_NAMA'] ?>,<?php echo $rowNPWPD['TBLKECAMATAN_NAMA'] ?></td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Telepon</strong></td>
				<td><?= $rowNPWPD['TSUBYEK_BUTELP'] ?></td>

				<td>
					<?php /*
					<!-- Disembunyikan dulu kata mas Rian 10062016 -->
					<button style="display: none" rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mengentri data detail obyek" class="btn btn-sm btn-info txt-color-white btn-block" onclick="lihat_tunggakan('<?php //echo $data['idobyek'] ?>','<?php // $rowNPWPD['REFBIDANGUSAHA_ID'] ?>')">
						<i class="fa  fa-tasks"></i> Entri Detail Obyek
					</button>*/ ?>
					<?php $pajaknocetakperbup = explode(",",AppConfig::getValue('REK_KARTUDATA_NOCETAKPERBUP')); 
					if (!in_array(substr($rowNPWPD['TREKENING_KODE'],0,5), $pajaknocetakperbup)): ?>
					<a target="_blank" href="<?= Yii::app()->getBaseUrl(1) ?>/cetak/cetak_kartudata/cetakperbup?listData=<?= $rowNPWPD['TNPWPD_ID'] ?>&tahun=<?= date('Y') ?>" rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mencetak kartu data sesuai format Peraturan Daerah" class="btn btn-sm bg-color-magenta txt-color-white btn-block">
						<i class="fa fa-print"></i> Kartu Data Perbup
					</a>
					<?php endif ?>
					<a target="_blank" href="<?= Yii::app()->getBaseUrl(1) ?>/cetak/cetak_kartudata/cetak?listData=<?= $rowNPWPD['TNPWPD_ID'] ?>&tahun=<?= date('Y') ?>" rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mencetak kartu data" class="btn  btn-sm bg-color-pink txt-color-white btn-block">
						<i class="fa  fa-print"></i> Kartu Data Aplikasi
					</a>
					<a target="_blank" href="<?= Yii::app()->getBaseUrl(1) ?>/cetak/cetak_kartudata/cetaksptpd?listData=<?= $rowNPWPD['TNPWPD_ID'] ?>&tahun=<?= date('Y') ?>&transid=<?php //= base64_encode($last['tbltransaksiketetapan_id']) ?>" rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mencetak lembar SPTPD" class="btn btn-sm bg-color-magenta txt-color-white btn-block <?= $rowNPWPD['TNPWPD_ISKUKUH']=='F' ? "BLMKUKUH" : "" ?> <?php //= !$last ? "BLMKUKUH" : "" ?>">
						<i class="fa fa-print"></i> Cetak SPTPD
					</a>
				</td>
			</tr>
		<?php /*==================xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx=====================*/  ?>
		<?php $urutan++; endforeach ?>

		<?php /*==================xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx=====================*xx/ ?>
		<?php ($listnosptpd2=array_unique($listnosptpd2)); ?>
		<?php foreach ($listnosptpd2 as $nosptpd2): ?>
		
			<?php $data['daftar_npwpd_lama'] = $this->getAllNPWDLama('PEMOHON', $nosptpd2); ?>
			<?php foreach ($data['daftar_npwpd_lama'] as $rowNPWPD): ?>
			<tr>
				<td colspan="6" style="border-bottom: 3px solid rgb(215, 6, 6);"></td>
			</tr> 
			<tr >
				<td rowspan="5"><?php echo $urutan; ?>.</td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Nomor NPWPD</strong></td>
				<td>
				<?php echo !empty($rowNPWPD['TNPWPD_NPWPD']) ? $rowNPWPD['TNPWPD_NPWPD'] : '<label class="txt-color-red">Belum Dikukuhkan</label>' ?>
				<br>
				<br>
				<?php /*a rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mengedit data obyek" class="btn bg-color-blueDark txt-color-white btn-sm btn-block" onclick="edit_obyek('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
					<i class="fa fa-pencil"></i> Edit Data Obyek
				</a*xx/ ?>
				</td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Masa Pajak Terakhir</strong></td>
				<td><?php $last = $this->getLasTKetetapan( $rowNPWPD['TNPWPD_ID'] ); ?>
				<?= ($last) ? LokalIndonesia::TGLID( $last['tbltransaksiketetapan_masaawal'],'/' ) : "-" ?> - <?= ($last) ? LokalIndonesia::TGLID( $last['tbltransaksiketetapan_masaakhir'],'/' ) : "-" ?></td>

				<td>
					<?php /*button  rel="tooltip" data-placement="left" data-original-title="Digunakan untuk  melihat riwayat ketetapan pajak" class="btn btn-sm btn-default btn-block" onclick="entri_pendataan('<?php echo $rowNPWPD['TNPWPD_ID'] ?>','<?php echo $rowNPWPD['TREKENING_KODE'] ?>')">
						<i class="fa fa-money"></i> Entri Pendataan
					</button>
					<?php if (substr($rowNPWPD['TREKENING_KODE'],0,5)!='41104'): ?>
					<button rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mengentri data detail obyek" class="btn btn-sm bg-color-orange txt-color-white btn-block" onclick="entri_detail('<?php echo $rowNPWPD['TNPWPD_ID'] ?>','<?php echo $rowNPWPD['TREKENING_KODE'] ?>')">
						<i class="fa  fa-tasks"></i> Entri Detail Obyek
					</button>
					<?php endif *xx/?>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Nama NPWPD</strong></td>
				<td><?php echo $rowNPWPD['TNPWPD_NAMA'] ?></td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Omzet Sebelumnya</strong></td>
				<td><?php echo ($last) ? LokalIndonesia::rupiah( $last['tbltransaksiketetapan_omzettotal'] ) : "-"; ?></td>

				<td>
					<button  rel="tooltip" data-placement="left" data-original-title="Digunakan untuk  melihat riwayat ketetapan pajak" class="btn btn-sm btn-default btn-block" onclick="lihat_ketetapan('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
						<i class="fa fa-ticket"></i> Lihat Riwayat Ketetapan Pajak
					</button>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Rekening</strong></td>
				<td>[<?= $rowNPWPD['TREKENING_KODE'] ?>] <?= $rowNPWPD['TBLREKENING_NAMA'] ?></td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Pajak Sebelumnya</strong></td>
				<td><?php echo ($last) ? LokalIndonesia::rupiah( $last['tbltransaksiketetapan_pajak'] ) : "-"; ?></td>

				<td>
					<button  rel="tooltip" data-placement="left" data-original-title="Digunakan untuk melihat riwayat setoran pajak" class="btn btn-sm btn-success txt-color-white btn-block" onclick="lihat_setoran('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
						<i class="fa fa-ticket"></i> Lihat Riwayat Setoran Pajak
					</button>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Tanggal Pengukuhan</strong></td>
				<td><?php echo strtotime($rowNPWPD['TNPWPD_TGLKUKUH']) ? LokalIndonesia::TanggalUmum( $rowNPWPD['TNPWPD_TGLKUKUH'] ) : '<label class="txt-color-red">Belum Dikukuhkan</label>' ?></td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Tanggal Jatuh Tempo</strong></td>
				<td><?php echo strtotime($last['tbltransaksiketetapan_tgljatuhtempo']) ? LokalIndonesia::TanggalUmum( $last['tbltransaksiketetapan_tgljatuhtempo'] ) : 'Belum diatur'; ?></td>

				<td>
					<button  rel="tooltip" data-placement="left" data-original-title="Digunakan untuk melihat tunggakan pajak" class="btn btn-sm btn-info txt-color-white btn-block" onclick="lihat_tunggakan('<?php echo $rowNPWPD['TNPWPD_ID'] ?>')">
						<i class="fa  fa-tasks"></i> Lihat Tunggakan Pajak
					</button>
				</td>
			</tr>
			<tr>
				<td style="background-color: rgba(247, 233, 216, 0.4);"><strong>Lokasi</strong></td>
				<td><?php echo $rowNPWPD['TSUBYEK_BUALAMAT'] ?><br><?php echo $rowNPWPD['TBLKELURAHAN_NAMA'] ?>,<?php echo $rowNPWPD['TBLKECAMATAN_NAMA'] ?></td>

				<td style="background-color: rgba(247, 233, 216, 0.4);width: 16%;"><strong>Telepon</strong></td>
				<td><?= $rowNPWPD['TSUBYEK_BUTELP'] ?></td>

				<td>
					<?php /*
					<!-- Disembunyikan dulu kata mas Rian 10062016 -->
					<button style="display: none" rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mengentri data detail obyek" class="btn btn-sm btn-info txt-color-white btn-block" onclick="lihat_tunggakan('<?php //echo $data['idobyek'] ?>','<?php // $rowNPWPD['REFBIDANGUSAHA_ID'] ?>')">
						<i class="fa  fa-tasks"></i> Entri Detail Obyek
					</button>*xxx/ ?>
					<?php $pajaknocetakperbup = explode(",",AppConfig::getValue('REK_KARTUDATA_NOCETAKPERBUP')); 
					if (!in_array(substr($rowNPWPD['TREKENING_KODE'],0,5), $pajaknocetakperbup)): ?>
					<a target="_blank" href="<?= Yii::app()->getBaseUrl(1) ?>/cetak/cetak_kartudata/cetakperbup?listData=<?= $rowNPWPD['TNPWPD_ID'] ?>&tahun=<?= date('Y') ?>" rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mencetak kartu data sesuai format Peraturan Daerah" class="btn btn-sm bg-color-magenta txt-color-white btn-block">
						<i class="fa fa-print"></i> Kartu Data Perbup
					</a>
					<?php endif ?>
					<a target="_blank" href="<?= Yii::app()->getBaseUrl(1) ?>/cetak/cetak_kartudata/cetak?listData=<?= $rowNPWPD['TNPWPD_ID'] ?>&tahun=<?= date('Y') ?>" rel="tooltip" data-placement="left" data-original-title="Digunakan untuk mencetak kartu data" class="btn  btn-sm bg-color-pink txt-color-white btn-block">
						<i class="fa  fa-print"></i> Kartu Data Aplikasi
					</a>
				</td>
			</tr>
		<?php /xx*==================xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx=====================*/  ?>
		<?php //$urutan++; endforeach ?>
		<?php //endforeach ?>
	</tbody>
</table>
<?php //require 'detail-npwpd-det.php'; ?>
</div>

<?php if ($urutan==1): ?>
	<div class="row" align="center" style="background-color: #F1DA91;"><h4>Belum memiliki daftar NPWPD</h4></div>
<?php endif ?>
<?php /*===================================*/ ?>


<script type="text/javascript">

	function pilih_pendataan (id) {
		$("#form_pendataan"+id).html(LOADER).fadeIn(400);
		$.ajax({
			url: '<?= $this->MODULE_URL ?>/detailObyek',
			type: 'POST',
			data: {id: id},
			success: function(response) {
				$("#form_pendataan"+id).show('slow');
				$("#pilih_pendataan"+id).hide('slow');
				$("#tutup_pendataan"+id).show('slow');

				$("#form_pendataan"+id).html(response);
				$("#form_pendataan"+id).prepend(LOADER);
				$(".loader_img").fadeOut(1000);

				pageSetUp();
			}
		});
		
	}

	function tutup_pendataan (id) {
		$("#form_pendataan"+id).hide('slow');
		$("#tutup_pendataan"+id).hide('slow');
		$("#pilih_pendataan"+id).show('slow');
	}

	function entri_pendataan(objid, rekkode){
		$.ajax({
			url: 'pendaftaran/data_ketetapan/loadForm',
			type: 'POST',
			data: {
				objid: objid
				,rekkode: rekkode
			},
			success: function(respon) {
				$("#divPendataan").html(respon);
				$("#modalPendataan").modal('show');
			}
		});
		
	}

	function entri_detail(objid, rekkode){
		$.ajax({
			url: 'pendaftaran/detail_obyek/loadForm',
			type: 'POST',
			data: {
				objid: objid
				,rekkode: rekkode
			},
			success: function(respon) {
				$("#divDetailObyek").html(respon);
				$("#modalDetailObyek").modal('show');
			}
		});
		
	}

	function changeKeaktifanObyek(id, stat) {
		$.ajax({
			url: '<?= $this->MODULE_URL ?>/changeKeaktifanObyek',
			type: 'POST',
			dataType: 'json',
			data: {
				objid: id
				,status: stat
			},
			success: function(respon) {
				if (respon.status=='success') {
					notifikasi('Sukses','Pengubahan status aktif berhasil.','success',1,0 );
					detailIzinPemohon(window.idpemohon);
				} else {
					notifikasi('Oops','Ada kesalahan di server, ulangi proses lagi.','fail',1,0 );
				}
			},
			error: function(respon) {
				notifikasi('Oops','Ada kesalahan di server, ulangi proses lagi.','fail',1,0 );
			}
		});		
	}

	jQuery(document).ready(function($) {
		$("button.BLMKUKUH").removeAttr('onclick');
		$("button.BLMKUKUH").attr('disabled', 'true');
		$("a.BLMKUKUH").removeAttr('href');
		$("a.BLMKUKUH").attr('disabled', 'true');

		$("#tbl_daftarpermohonan button").hide();
		$("#tbl_daftarpermohonan a.btn").hide();
	});

</script>