<?php 
$i=1;
foreach($data as $columns):

      $nama_kolom = $columns->name;
      $tipe_kolom = explode('(', $columns->dbType);
      $tipe_kolom = $tipe_kolom[0];
      $panjang_kolom = $columns->size;
      $urut = $i++;
      
?>
<tr>
<?php if($urut!=1 && $urut!=2): ?>
  <td>
  <input type="hidden" id="nama_field_lama<?php echo $urut; ?>" class="form-control" value="<?php echo $nama_kolom; ?>">
  <input type="text" id="nama_field<?php echo $urut; ?>" class="form-control" value="<?php echo $nama_kolom; ?>">
  </td>
  <td>
  <select name="tipebaru" id="tipe_field<?php echo $urut; ?>" class="form-control" style="width: 100px;">
      <option <?php echo $tipe_kolom=="int" ? 'selected' : ''; ?> value="integer">Integer</option>
      <option <?php echo $tipe_kolom=="float" ? 'selected' : ''; ?>  value="float">Real</option>
      <option <?php echo $tipe_kolom=="varchar" ? 'selected' : ''; ?>  value="varchar">String</option>
      <option <?php echo $tipe_kolom=="text" ? 'selected' : ''; ?>  value="text">Memo</option>
      <option <?php echo $tipe_kolom=="date" ? 'selected' : ''; ?>  value="date">Date</option>	   
    </select>
  </td>
  
  <td><input type="text" name="panjang_field" id="panjang_field<?php echo $urut; ?>" class="form-control" value="<?php echo $panjang_kolom; ?>"></td>		
 
  <td>
  
  <button style="width: 120px;" type="button" onclick="editfield(<?php echo $urut; ?>)" class="btn bg-color-teal txt-color-white">
	 
	  <i class="glyphicon glyphicon-edit"></i>
	  Ubah Field
	</button>

  <button style="width: 120px;" type="button" onclick="hapusfield(<?php echo $urut; ?>)" class="btn bg-color-orange txt-color-white">
   
    <i class="fa fa-times"></i>
   Hapus Field
  </button>
	</td>
</tr>
<?php endif; ?>
<?php endforeach; ?>
<tr>
  <td><input type="text" id="nama_field" class="form-control"></td>
  <td>
  <select name="tipebaru" id="tipe_field" class="form-control" style="width: 100px;">
      <option value="integer">Integer</option>
      <option value="float">Real</option>
      <option value="varchar">String</option>
      <option value="text">Memo</option>
      <option value="date">Date</option>     
    </select>
  </td>
  
  <td><input type="text" name="panjang_field" id="panjang_field" class="form-control"></td>   
 
  <td>
  
  <button style="width: 250px;" type="button" onclick="simpanfield()" class="btn bg-color-greenLight txt-color-white">
   
    <i class="fa fa-save"></i>
   Simpan Field Baru
  </button>
  </td>
</tr>