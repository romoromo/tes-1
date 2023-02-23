  <table width="100%">
    <tr>
      <td width="34%">
        DINAS PAJAK DAERAH DAN 
        PENGELOLAAN KEUANGAN DAERAH
      </td>
      <td width="33%">
       DAFTAR INDUK WAJIB PAJAK 
     </td>
     <td width="10%">
      HALAMAN 1
    </td>
  </tr>
  <tr>
    <td></td>   
  </tr>
</table>

<table id="dt_pipeline"  border="1" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover smart-form" width="100%" >
	<thead>
    <tr>
        <th class="col-md-1"> No</th>
        <th class="col-md-3"> N.P.W.P.D</th>
        <th class="col-md-4"> NAMA</th>
        <th class="col-md-5"> ALAMAT</th>
        <th class="col-md-3"> BBU</div></th>
    </tr>
    <th class="col-md-1">========================</th>
    <th class="col-md-3">========================</th>
    <th class="col-md-4">========================</th>
    <th class="col-md-5">========================</th>
    <th class="col-md-2">========================</th>
    <tr>
  </thead>
	<tbody>
	<?php $no = 1; foreach ($data['cetak'] as $rowtap): ?>
		<tr><td><?= $no++; ?></td>
			<td><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $rowtap['TBLDAFTAR_GOLONGAN'] ?>.<?= $rowtap['TBLDAFTAR_NOPOK'] ?></td> <!-- N.P.W.P.D --> <!-- TBLKECAMATAN_IDBADANUSAHA Dan TBLKELURAHAN_IDBADANUSAHA -->
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- NAMA -->
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
			<td><?= $rowtap['REFBADANUSAHA_IDBADANUSAHA'] ?></td> <!-- BBU -->
		</tr>
	<?php endforeach ?>
	</tbody>
</table>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_pipeline');
	});
</script>