<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
    <thead>
        <tr>
            <th>    
            <div  class="center">
                <label class="checkbox">
                    <input  type="checkbox" name="cbx-all" onclick="cekAll(this)">
                        <i></i> All
                </label>
                </div>
            </th>
            <th >Tahun Pajak</th>
            <th >Bulan Pajak</th>
            <th >Tgl SKPD-A</th>
            <th >Nopok</th>
            <th >Nama BU</th>
            <th >No SK-A</th>
            <th >Bulan Awal Periksa</th>
            <th >Bulan Akhir Periksa</th>
            <th >Total Angsuran</th>
            <th >Jml Angsur</th>
            <th >Total Angsur</th>
            <th >Sisa Angsur</th>
            
        </tr>
    </thead>
    <tbody style="text-align: center;">
     <?php 
     $no = 1; foreach ($data['cari'] as $row): ?>
        <tr>
            <td>
                <label class="checkbox">
                    <!-- <input type="checkbox" name="checkbox"> -->
                    <input class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo $row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $row['TBLPENDATAAN_BLNPAJAK'] ?>" name="nopokPajak" type="checkbox">
                    <i></i>
                </label>
            </td>
           <td><?=$row['TBLPENDATAAN_THNPAJAK'];?></td> <!-- Tahun -->
           <td><?=$row['TBLPENDATAAN_BLNPAJAK'];?></td> <!-- Bulan -->
           <td><?= $row[$data['NamaTBL'].'_TGLSURATANGSUR']; ?>/<?= $row[$data['NamaTBL'].'_BLNSURATANGSUR']; ?>/<?= $row[$data['NamaTBL'].'_THNSURATANGSUR']; ?></td> <!-- Tgl SKPDA -->
           <td><?=$row['TBLDAFTAR_NOPOK'];?></td> <!-- Nopok -->
           <td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td> <!-- Nama BU -->
           <td><?= $row[$data['NamaTBL'].'_REGSURATANGSUR']; ?></td> <!-- No SK-A -->
           <td><?= $row[$data['NamaTBL'].'_BLNKBAWAL']; ?></td> <!-- BULAN Awal -->
           <td><?= $row[$data['NamaTBL'].'_BLNKBAKHIR']; ?></td> <!-- BULAN Akhir -->
           <td>Rp. <?= LokalIndonesia::ribuan($row['TOTALTAGIHAN']); ?></td> <!-- TOTAL ANGSURAN -->
           <td><?=$row['HITUNG'];?></td> <!-- JML ANGSURAN -->
           <td>Rp. <?= LokalIndonesia::ribuan($row['TOTALANGSURAN']);?></td> <!-- SUDAH Angsur -->
           <td>Rp. <?= LokalIndonesia::ribuan($row['SISANGASUR']);?></td> <!-- Sisa Angsur -->
           

        </tr>
        <?php endforeach ?>
</tbody>
</table>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        // reloadDT('dt_basic');
    });

    /*jQuery(document).ready(function($) {
        var elm = $("input[name='nopokPajak']");
        cekAll(elm);
    });*/

    function cekAll(elemen) {
        $('.cbx_tetapkan').prop("checked" , elemen.checked);
    }
    
    $(".cbx_tetapkan").click(function(event) {
        // $('#modal_detail').modal('show');
        if (!$(event.target).prop('checked')) {
            window.id_eksepsi += ','+$(event.target).val();
            // $('#modal_detail').modal('hide');
        }
    });
</script>