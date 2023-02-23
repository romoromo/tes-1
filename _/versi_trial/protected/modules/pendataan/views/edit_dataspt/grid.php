<table id="dt_pipeline" class="table table-striped table-bordered table-hover smart-form" width="100%">
	<thead>
		<tr>
		    <th width="15"> No</th>
	        <th data-hide="phone"><div class="center"> NPWP</div></th>
		    <th data-hide="phone"><div class="center"> Gol</div></th>
		    <th data-class="expand"><div class="center"> No Pokok</div></th>
		    <th data-hide="phone, tablet"><div class="center"> Tanggal Pajak</div></th>
		    <th data-hide="phone, tablet"><div class="center"> Kecamatan</div></th>
		    <th data-hide="phone, tablet">Nama Usaha</th>
		    <th data-hide="phone, tablet, desktop">Alamat Usaha</th>
		    <th></th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; foreach ($data['daftar'] as $rowtap): ?>
		<tr><td><?= $no++; ?></td>
			<td><?= $rowtap['TBLDAFTAR_JENISPENDAPATAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_GOLONGAN'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_NOPOK'] ?></td>
			<td>
				<?php if($rowtap['TBLPENDATAAN_TGLPAJAK']>0){
				echo $rowtap['TBLPENDATAAN_TGLPAJAK']." - ".$rowtap['TBLPENDATAAN_BLNPAJAK']." - 20".$rowtap['TBLPENDATAAN_THNPAJAK'];
				}elseif($rowtap['TBLPENDATAAN_THNPAJAK']>=1 && $rowtap['TBLPENDATAAN_THNPAJAK']<=9){
				echo $rowtap['TBLPENDATAAN_BLNPAJAK']." - 200".$rowtap['TBLPENDATAAN_THNPAJAK'];
				}elseif($rowtap['TBLPENDATAAN_THNPAJAK']>9 && $rowtap['TBLPENDATAAN_THNPAJAK']<=90){
				echo $rowtap['TBLPENDATAAN_BLNPAJAK']." - 20".$rowtap['TBLPENDATAAN_THNPAJAK'];
				}elseif($rowtap['TBLPENDATAAN_THNPAJAK']>=90){
				echo $rowtap['TBLPENDATAAN_BLNPAJAK']." - 19".$rowtap['TBLPENDATAAN_THNPAJAK'];
				} ?>
			</td>
			<td><?= $rowtap['REFKECAMATAN_NAMA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHANAMA'] ?></td>
			<td><?= $rowtap['TBLDAFTAR_BADANUSAHAALAMAT'] ?></td>
			<td>
				<a href="<?php echo '#'.$data['url']."?nopokok=".base64_encode($rowtap['TBLDAFTAR_NOPOK'])."&thnpajak=".base64_encode($rowtap['TBLPENDATAAN_THNPAJAK'])."&blnpajak=".base64_encode($rowtap['TBLPENDATAAN_BLNPAJAK'])."&tglpajak=".base64_encode($rowtap['TBLPENDATAAN_TGLPAJAK']) ?>" target="_blank">Edit</a>
				<!--<button onclick="edit('<?//= $rowtap['TBLDAFTAR_NOPOK'] ?>')" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">
		    		<i class="fa fa-edit"></i> Edit
		    	</button>-->
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