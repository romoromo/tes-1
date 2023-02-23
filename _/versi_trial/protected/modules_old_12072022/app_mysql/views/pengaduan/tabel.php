<table class="table table-striped table-bordered table-hover" width="100%">
  <thead>
	  <tr>
		 <th width="5%" data-hide="phone">No</th>
		 <th width="25%" data-class="expand"><i class=" text-muted hidden-md hidden-sm hidden-xs"></i>Pengaduan </th>
		  <th width="24%">Tanggapan</th>
		  <th width="8%" data-hide="phone,tablet"><i class=" txt-color-blue hidden-md hidden-sm hidden-xs"></i>Status</th>
		    <th width="16%">&nbsp;</th>
	  </tr>
  </thead>
  <tbody id="bodynya">
  <?php $i=1; foreach ($data['pengaduan'] as $key_komentar): ?>
	  <?php $data['komentar'] = Komentar::model()->findAll('tblpengaduan_id=:id', array(':id'=>$key_komentar['tblpengaduan_id']))?>
		<tr>
	        <td><?php echo $i++ ?></td>
		    <td><?php echo $key_komentar['tblpengaduan_judul'] ?></td>
		    <td>
				<?php if (count($data['komentar'])<1): ?>
		    		<button onclick="edit(<?php echo $key_komentar['tblpengaduan_id'] ?>)" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp; Tanggapi </button>
		    	<?php endif ?>
		    	<?php foreach ($data['komentar'] as $komen): ?>
		    		<!-- <li><?php //echo $komen['tblkomentar_konten'] ?></li> -->
		    		<a id="<?php echo $komen['tblkomentar_id']; ?>" href="form-x-editable.html#" class="komentar" data-pk="<?php echo $komen['tblkomentar_id']; ?>" data-value="<?php echo $komen['tblkomentar_konten']; ?>" data-original-title="Edit Komentar"><?php echo $komen['tblkomentar_konten']; ?></a>
		    	<?php endforeach ?>
			</td>
		    <td>
		    	<form action="" class="smart-form">
					<div align="center">
						<label class="toggle" style="left:-40px;">

							<input <?php if ($key_komentar['tblpengaduan_isaktif']=="T") {echo 'checked="checked"';} ?> id="<?php echo $key_komentar['tblpengaduan_id']; ?>" type="checkbox" name="checkdata" class="checkdata" onchange="toogle_aktif(<?php echo $key_komentar['tblpengaduan_id']; ?>,'<?php echo $key_komentar['tblpengaduan_isaktif']=="T" ? "F" : "T"; ?>')">
							<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>

						</label>

					</div>
				</form>
			</td>
		    <td><!-- <button onclick="edit(<?php //echo $key_komentar['tblpengaduan_id'] ?>)" data-toggle="modal" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i>&nbsp; Edit </button> -->
	        <button onclick="hapus(<?php echo $key_komentar['tblpengaduan_id'] ?>)" type='button' class='btn btn-danger btn-sm' > <i class="fa fa-trash-o"></i>&nbsp; Hapus </button></td>
		</tr>
	<?php endforeach; ?>
  </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
		reloadDT('dt_basic');
		loadXeditable();
	});

	function loadXeditable() {
	    loadScript("themes/smartadmin/js/plugin/x-editable/x-editable.min.js",runXEditDemo);
	}

	function runXEditDemo() {
	    $('.komentar').editable({
	        url: 'app/pengaduan/simpanInline',
	        type: 'text',
	        title: 'input Tanggapan'
	        ,success:function(response){
				if (response == 'failed') {
					notifikasi('Error', 'Data gagal disimpan.', 'failed', 1, 0);
				} else {
					notifikasi('Sukses', 'Data berhasil disimpan.', 'success', 1, 0);
					//filter_muncul();
				}
			}
	    });
	}
</script>