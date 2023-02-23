  <table width="100%">
    <tr>
      <td width="34%">
        BADAN PENGELOLAAN KEUANGAN DAN
		<br>
        ASET DAERAH  
      </td>
      <td width="33%">
       DAFTAR INDUK WAJIB PAJAK 
     </td>
  </tr>
</table>
	<br><br>

<table id="dt_pipeline"  border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover smart-form" width="100%" >
	<thead>
    <tr>
        <th class="col-md-1"> No</th>
        <th class="col-md-3"> N.P.W.P.D</th>
        <th class="col-md-4"> NAMA</th>
        <th class="col-md-5"> ALAMAT</th>
        <th class="col-md-3"> BBU</div></th>
    </tr>
    <tr>
        <th class="col-md-1">=====</th>
        <th class="col-md-3">========</th>
        <th class="col-md-4">======================</th>
        <th class="col-md-5">======================</th>
        <th class="col-md-2">======</th>
    </tr>
  </thead>
	<tbody>
	<?php $no = 1; foreach ($data['cetak'] as $rowtap): ?>
		<tr>
      <td align="center"><?= $no++; ?></td>
			<td align="center"><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?>.<?= $rowtap['TBLDAFTAR_GOLONGAN'] ?>.<?= $rowtap['TBLDAFTAR_NOPOK'] ?></td> <!-- N.P.W.P.D --> <!-- TBLKECAMATAN_IDBADANUSAHA Dan TBLKELURAHAN_IDBADANUSAHA -->
			<td align="center"><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td> <!-- NAMA -->
			<td align="center"><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td> <!-- ALAMAT -->
			<td align="center"><?= $rowtap['REFBADANUSAHA_IDBADANUSAHA'] ?></td> <!-- BBU -->
		</tr>
	<?php endforeach ?>
	</tbody>
</table><br><br>

<table id="dt_pipeline"  border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover smart-form" width="100%" >
  <thead>
    <tr>
      <td> MENGETAHUI</td>
      <td> TANGGAL:</td>
    </tr>
    <tr>
      <td><font>KEPALA BIDANG PAJAK DAERAH</font></td>
      <td><font>PETUGAS:</font></td>
    </tr>
    <tr>
      <td><font color="white">****</font></td>
    </tr>
    <tr>
      <td><font color="white">****</font></td>
    </tr>
    <tr>
      <td><font color="white">****</font></td>
    </tr>
</thead>
<tbody>
  <tr>
    <td>DRS.WISNU BUDI I, MSI</td>
  </tr>
  <tr>
    <td>-------------------------------------</td>
    <td>-------------------------------------------------</td>
  </tr>
  <tr>
    <td>NIP. 197007271996031003</td>
  </tr>
</tbody>


</table>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_pipeline');
	});
</script>