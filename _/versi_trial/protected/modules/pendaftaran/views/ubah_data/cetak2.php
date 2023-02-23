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
        <th class="col-md-3"> STA</div></th>
        <th class="col-md-3"> ALASAN</div></th>
    </tr>
    <th class="col-md-1">=====</th>
    <th class="col-md-3">======================</th>
    <th class="col-md-4">======================</th>
    <th class="col-md-5">======================</th>
    <th class="col-md-2">================</th>
    <th class="col-md-2">============</th>
    <th class="col-md-2">==================</th>
   

  </thead>
	<tbody>
	<?php $no = 1; //foreach ($data['cetak'] as $rowtap): ?>
		<tr><td><?= $no++; ?></td>
			<td></td> <!-- N.P.W.P.D --> <!-- TBLKECAMATAN_IDBADANUSAHA Dan TBLKELURAHAN_IDBADANUSAHA -->
			<td></td> <!-- NAMA -->
			<td></td> <!-- ALAMAT -->
			<td></td> <!-- BBU -->
		</tr>
	<?php //endforeach ?>
	</tbody>
</table>

<table id="dt_pipeline"  border="0" style="border-collapse:collapse;" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover smart-form" width="100%" >
<thead>
  <tr>
  <td> MENGETAHUI</td>
  <td> Tanggal</td>
  </tr>
  <tr>
    <td>KEPALA BIDANG PAJAK DAERAH</td>
    <td>Petugas: </td>
    <td>  </td>
  </tr>

</thead>
<tbody>
  <tr>
    <td>DRS.WISNU BUDI I, MSI</td>
  </tr>
  <tr><td>----------------------------------</td></tr>
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