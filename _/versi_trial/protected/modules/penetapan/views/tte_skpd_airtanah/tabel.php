<table border="1" cellspacing="0" cellpadding="5" width="100%" class="table table-bordered smart-form has-tickbox" id="dt_basicc">

	<thead>
		<tr>
			<th colspan="14" style="text-align-last:left;">JUMLAH SKPD = <?php echo $data['sum']['JMLSKPD']; ?></th>
		</tr>
		<tr>
			<th colspan="14" style="text-align-last:left;">RUPIAH TOTAL SKPD = Rp. <?php echo LokalIndonesia::ribuan($data['sum']['JMLRUPIAHSKPD']); ?></th>
		</tr>
		<tr>
			<!-- <th data-hide="phone"><div class="center"> REKENING</div></th> -->
			<th data-clas="phone">
				<div class="center"> NO</div>
			</th>
			<th data-clas="phone">
				<div class="center"> NO KOHIR</div>
			</th>
			<th data-clas="phone">
				<div class="center"> TGL PENETAPAN</div>
			</th>
			<th data-clas="phone">
				<div class="center"> NAMA OBYEK PAJAK</div>
			</th>
			<th data-class="expand">
				<div class="center"> NPWPD</div>
			</th>
			<th data-hide="phone">
				<div class="center"> PEMILIK</div>
			</th>
			<th data-hide="phone, tablet, desktop">
				<div class=""> TAHUN<br>PAJAK</div>
			</th>
			<th data-hide="phone, tablet, desktop">
				<div class=""> BULAN<br>PAJAK</div>
			</th>
			<th data-hide="phone">
				<div class="center"> NPA</div>
			</th>
			<th data-hide="phone">
				<div class="center"> VOLUME</div>
			</th>
			<th data-hide="phone">
				<div class="center"> PAJAK</div>
			</th>
			<th data-hide="phone, tablet, desktop">
				<div class=""> TGL ENTRI SPT</div>
			</th>
			<th data-hide="phone">
				<div class="center"> STATUS</div>
			</th>
			<th data-hide="phone">
				<div class="center"> AKSI</div>
			</th>
	</thead>
	<tbody>
		<?php
		/*
			94	Kasubbid Penetapan	Kasubid Penetapan
			97	KABID P4D	Kabid Verifikator
			 */
		?>
		<?php $IS_ADA_VERIF = false; ?>
		<?php $no = 1;
		foreach ($data['results'] as $row) : ?>
			<?php if (Yii::app()->user->role_id == 94 and $row['STATUS_DATA'] == 3) : ?>
				<?php $IS_ADA_VERIF = true; ?>
				<?php $stylebgcolor = "background: #ffcc80;"; ?>
			<?php elseif (Yii::app()->user->role_id == 97 and $row['STATUS_DATA'] == 4) : ?>
				<?php $IS_ADA_VERIF = true; ?>
				<?php $stylebgcolor = "background: #ffcc80;"; ?>
			<?php else : ?>
				<?php $stylebgcolor = ""; ?>
			<?php endif ?>
			<tr style="<?= $stylebgcolor ?>">
				<td><?php echo $no++; ?></td>
				<td><?= $row['TBLDAFTTANAH_NOMORSKPD'] ?></td>
				<td><?= sprintf('%02d', $row[$this->TABEL . '_' . 'TGLSKPD']); ?>-<?= sprintf('%02d', $row[$this->TABEL . '_' . 'BLNSKPD']); ?>-<?= (2000 + $row[$this->TABEL . '_' . 'THNSKPD']); ?></td>

				<td><?= $row['TBLDAFTAR_BADANUSAHANAMA'] ?></td>

				<td>
					<?= $row['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $row['TBLDAFTAR_GOLONGAN'] ?>.<?= sprintf('%07d', $row['TBLDAFTAR_NOPOK']) ?>.<?= $row['TBLKECAMATAN_IDBADANUSAHA'] ?>.<?= $row['TBLKELURAHAN_IDBADANUSAHA'] ?>
				</td>
				<td><?= $row['TBLDAFTAR_PEMILIKNAMA'] ?></td>
				<td><?= $row['TBLPENDATAAN_THNPAJAK'] ?></td>
				<td><?= $row['TBLPENDATAAN_BLNPAJAK'] ?></td>
				<td><?= LokalIndonesia::ribuan($row['NPA']); ?></td>
				<td><?= $row['VOL']; ?></td>
				<td align="right"><?= LokalIndonesia::ribuan($row['PAJAK']); ?></td>
				<td><?= sprintf('%02d', $row[$this->TABEL . '_' . 'TGLENTRI']); ?>-<?= sprintf('%02d', $row[$this->TABEL . '_' . 'BLNENTRI']); ?>-<?= (2000 + $row[$this->TABEL . '_' . 'THNENTRI']); ?></td>
				<td>
					<?php if ($row['STATUS_DATA'] == 0) : ?>
						PENDATAAN
					<?php elseif ($row['STATUS_DATA'] == 1) : ?>
						STAF VERIFIKASI PENETAPAN
					<?php elseif ($row['STATUS_DATA'] == 2) : ?>
						STAF KOHIR PENETAPAN
					<?php elseif ($row['STATUS_DATA'] == 3) : ?>
						KASUBBID PENETAPAN
					<?php elseif ($row['STATUS_DATA'] == 4) : ?>
						KABID P4D
					<?php elseif ($row['STATUS_DATA'] == 5) : ?>
						WAJIB PAJAK
					<?php endif ?>
				</td> <!-- role pak edi nyelip diantara verifikator dan kasubbid, rahmat 15-06-2021  -->
				<td>
					<!-- <?php //= CJSON::encode($row) 
							?> -->
					<button type="button" onclick="skpd_draft('<?= base64_encode(CJSON::encode($row)) ?>')" class="btn btn-block btn-sm btn-default" style="margin-bottom: 2%; ">
						<i class="fa fa-eye"></i> Lihat Draft SKPD
					</button>
					<?php if (!empty($row['TBLTTE_TGLTTE'])) : ?>
						<button type="button" onclick="grafik1()" class="btn btn-block btn-sm btn-default" style="margin-bottom: 2%; color: #fafafa;background-color: #3f2f6f;">
							<i class="fa fa-eye"></i> Lihat SKPD Tertanda-tangan
						</button>
						<?php /* ?>
					<button type="button" class="btn btn-block btn-sm btn-warning" style="margin-bottom: 2%;" onclick="kembali()">
						<i class="fa fa-check"></i> Tanda Tangan Ulang
					</button>
					<?php */ ?>
					<?php else : ?>
						<?php /* ?>
					<button type="button" class="btn btn-block btn-sm btn-success" style="margin-bottom: 2%;" onclick="verifikasi()">
						<i class="fa fa-check"></i> Tanda Tangani
					</button>
					<?php */ ?>
					<?php endif ?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modal_skpd_draft" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg" style="max-width: 70%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Draft SKPD
				</h4>
			</div>

			<div id="" class="modal-body no-padding">
				<iframe id="skpd_draft_content" frameborder="0"></iframe>
			</div>
			<div class="modal-footer">
				<a href="javascript:void(0);" class="btn btn-default " data-dismiss="modal"><i class="fa fa-ban"></i> Tutup</a>
				<!-- <a href="javascript:void(0);" onclick="simpan()" data-dismiss="modal" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</a> -->
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basicc', false);
		$("#btnVerifikasi").hide()
		<?php if ($IS_ADA_VERIF) : ?>
			$("#btnVerifikasi").show()

			$("#btnVerifikasi").click(function(event) {
				verifikasi_all()
			});
			$("#btnVerifikasisimulasi").click(function(event) {
				verifikasi_simulasi()
			});
		<?php endif ?>
	});

	function skpd_draft(params) {
		$.ajax({
				url: 'penetapan/tte_skpd_airtanah/skpd_draft',
				type: 'POST',
				dataType: 'json',
				data: {
					params: params
				},
			})
			.done(function(respon) {
				// $("#skpd_draft_content").attr('src', respon.url);
				let binary_pdf = `data:application/pdf;base64,${respon.binary}`
				$("#skpd_draft_content").attr('src', binary_pdf);
				$("#modal_skpd_draft").modal('show');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

	}
</script>

<style type="text/css">
	iframe {
		overflow: scroll;
		width: 100%;
		height: 450px;
		border: 1px solid black;
	}
</style>