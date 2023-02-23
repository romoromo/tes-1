<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
    <thead>
        <tr>
            <th width="10%" data-hide="phone" >
                <div class="center" >
                    <label class="checkbox">
                        <input type="checkbox" name="cbx-all" onclick="cekAll(this)">
                        <i></i> All
                    </label>
                </div>
            </th>
            <th >Tahun Pajak</th>
            <th >Bulan Pajak</th>
            <th >Nopok</th>
            <th >Tgl. Entri Monitoring</th>
            <th >Nama Badan Usaha</th>
            <th >Alamat</th>
           <!--  <th ></th> -->

        </tr>
    </thead>
    <tbody style="text-align: center;">
    <?php
    $no = 1; foreach ($data['cari'] as $row): ?>
       <tr>
        <td>
            <label class="checkbox">
                <!-- <input type="checkbox" name="checkbox"> -->
                <input  class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo (int)$row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $row['TBLPENDATAAN_BLNPAJAK'] ?>" name="nopokPajak" type="checkbox">
                <i></i>
            </label>
        </td>
        <td>20<?=$row['TBLPENDATAAN_THNPAJAK'];?></td> <!-- Tahun -->
        <td><?=LokalIndonesia::getBulan($row['TBLPENDATAAN_BLNPAJAK']);?></td> <!-- Bulan -->
        <td><?=$row['TBLDAFTAR_NOPOK'];?></td> <!-- Nopok -->
        <td><?=$row['TGL_MONITORING']; ?></td> <!-- Tgl. Penetapan KB -->
        <td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td> <!-- Nama Bu -->
        <td><?=$row['TBLDAFTAR_BADANUSAHAALAMAT'];?></td> <!-- Alamat  -->
      <!--   <td></td> -->
    </tr>
    <?php endforeach ?>
</tbody>
</table>
<script type="text/javascript">
jQuery(document).ready(function($) {
        // reloadDT('dt_basic');
        $('.cbx_tetapkan').prop("checked" , false);
    });
   function cekAll(elemen) {
    $('.cbx_tetapkan').prop("checked" , elemen.checked);
}

$(".cbx_tetapkan").click(function(event) {
    if (!$(event.target).prop('checked')) {
        window.id_eksepsi += ','+$(event.target).val();
        // cari();
    }
});
</script>
