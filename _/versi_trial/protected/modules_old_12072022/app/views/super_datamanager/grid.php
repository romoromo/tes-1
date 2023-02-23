<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
		    <th width="15"> No</th>
	        <th data-hide="phone"><div class="center"> NPWP</div></th>
		    <th data-hide="phone"><div class="center"> Gol</div></th>
		    <th data-class=""><div class="center"> No Pokok</div></th>
		    <th data-hide="phone">KECAMATAN / KELURAHAN</th>
		    <th data-hide="phone">Nama Usaha</th>
		    <th data-hide="phone, desktop">Alamat Usaha</th>
		    <th data-hide="phone"><div class="center"> TAHUN Pajak</div></th>
		    <th data-hide="phone"><div class="center"> BULAN Pajak</div></th>
		    <th data-hide="phone"><div class="center"> HARI Pajak</div></th>
		    <th data-hide="phone"><div class="center"> KE/LOKASI</div></th>
		    <th data-hide="phone"><div class="center"> TGL SPT</div></th>
		    <th data-hide="phone"><div class="center"> RUPIAH Pajak</div></th>
		    <th data-hide="phone"><div class="center"> NO SKPD</div></th>
		    <th data-hide="phone"><div class="center"> RUPIAH SKPD</div></th>
		    <!-- <th data-hide="phone"><div class="center"> TGL SETOR BPD</div></th> -->
		    <!-- <th data-hide="phone"><div class="center"> TGL VALIDASI</div></th> -->
		    <th></th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['daftar'] as $rowtap): ?>
		<tr>
			<td>
				<label class="radio pull-right">
					<input type="radio" onclick="putuskan(this)" value="<?= base64_encode((int)$rowtap['TBLDAFTAR_NOPOK'].'#'.(int)$rowtap['TBLPENDATAAN_THNPAJAK'].'#'.(int)$rowtap['TBLPENDATAAN_BLNPAJAK'].'#'.(int)$rowtap['TBLPENDATAAN_TGLPAJAK'].'#'.(int)$rowtap['TBLPENDATAAN_PAJAKKE'].'#'.$data['tabel']) ?>" name="is_pilih" id="is_pilih_<?= $rowtap['TBLDAFTAR_NOPOK'] ?>">
					<i></i>
				</label>
			</td>
			<td><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
			<td><?= $rowtap['TBLKECAMATAN_IDBADANUSAHA'] ?><br><?= $rowtap['TBLKELURAHAN_IDBADANUSAHA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_THNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_BLNPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_TGLPAJAK'] ?></td>
			<td><?= $rowtap['TBLPENDATAAN_PAJAKKE'] ?></td>
			<td><?= sprintf('%02d', $rowtap[$data['tabel'].'_TGLENTRI']) ?>-<?= sprintf('%02d', $rowtap[$data['tabel'].'_BLNENTRI']) ?>-20<?= sprintf('%02d', $rowtap[$data['tabel'].'_THNENTRI']) ?></td>
			<td><?= LokalIndonesia::ribuan($rowtap[$data['tabel'].'_PAJAK']) ?></td>
			<td><?= isset($rowtap[$data['tabel'].'_NOMORSKPD']) ? $rowtap[$data['tabel'].'_NOMORSKPD'] : '' ?></td>
			<td><?= isset($rowtap[$data['tabel'].'_PAJAKSKPD']) ? LokalIndonesia::ribuan($rowtap[$data['tabel'].'_PAJAKSKPD']) : '' ?></td>
			<!-- <td><?php //= isset($rowtap[$data['tabel'].'_PAJAKSKPD']) ? $rowtap[$data['tabel'].'_PAJAKSKPD'] : '' ?></td>
			<td><?php //= isset($rowtap[$data['tabel'].'_PAJAKSKPD']) ? $rowtap[$data['tabel'].'_PAJAKSKPD'] : '' ?></td> -->
			<td>
	    	</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_pipeline');
	});
</script>