<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
    <thead>
        <tr>
            <th>    
                <div class="center">
                    <label class="checkbox">
                        <input  type="checkbox" name="cbx-all" onclick="cekAll(this)">
                        <i></i> All
                    </label>
                </div>
            </th>
            <th >NO</th>
            <th >WAJIB PAJAK</th>
            <th >ALAMAT</th>
            <th >KETERANGAN</th>
            <th >NPWPD</th>
            <th >TAHUN</th>
            <th >LOKASI</th>
            <th >No SKPD</th>
            <th >BPT</th>
            <th >PEMASANGAN</th>
            <th >KETETAPAN</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach  ($data['find'] as $row): ?>
        <tr>
            <td>
                <div align="center">
                    <label class="checkbox">
                        <!-- <input type="checkbox" name="checkbox"> -->
                        <input  class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo (int)$row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $row['TBLDAFTREKLAME_NOMORSKPD'] ?>" name="nopokPajak" type="checkbox">
                        <i></i>
                    </label>
                </div>
            </td>
            <td><?= $no++; ?></td><!--NO-->
            <td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td><!--BNAMA-->
            <td><?=$row['TBLDAFTAR_BADANUSAHAALAMAT'];?></td><!--BALAMAT-->
            <td><?=$row['TBLDAFTREKLAME_KETERANGAN1'];?></td><!--KTRE1-->
            <td><?=$row['TBLDAFTAR_GOLONGAN'];?>.<?=$row['TBLDAFTAR_NOPOK'];?>.<?=$row['TBLKECAMATAN_ID'];?>.<?=$row['TBLKELURAHAN_ID'];?></td><!--NPWPD-->
            <td><?=$row['TBLPENDATAAN_THNPAJAK'];?></td> <!-- TAHUN -->
            <td><?=$row['TBLPENDATAAN_PAJAKKE'];?></td> <!-- LOKASI -->
            <td><?=$row['TBLDAFTREKLAME_NOMORSKPD'];?></td> <!-- No SKPD -->
            <td><?=$row['TBLDAFTREKLAME_TGLBATASSKPD'];?>/<?=$row['TBLDAFTREKLAME_BLNBATASSKPD'];?>/<?=$row['TBLDAFTREKLAME_THNBATASSKPD'];?></td> <!-- BPT -->
            <td><?=$row['TBLDAFTREKLAME_KETERANGAN1'];?><?=$row['TBLDAFTREKLAME_KETERANGAN2'];?></td> <!-- PEMASANGAN -->
            <td><?=$row['TBLDAFTREKLAME_PAJAKSKPD'];?></td> <!-- KETETAPAN -->
        </tr>
    <?php endforeach ?>
</tbody>
</table>

<script type="text/javascript">
    jQuery(document).ready(function($) {
         reloadDT('dt_basic');
         $('.cbx_tetapkan').prop("checked" , false);
    });

    /*jQuery(document).ready(function($) {
        var elm = $("input[name='nopokPajak']");
        cekAll(elm);
    });*/

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