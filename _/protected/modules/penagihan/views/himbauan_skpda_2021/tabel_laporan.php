<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
    <thead>
        <tr>
            <th>Urut</th>
            <th>
                <div class="center">
                    <label class="checkbox">
                        <input type="checkbox" name="cbx-all" onclick="cekAll(this)">
                        <i></i> All
                    </label>
                </div>
            </th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Nopok</th>
            <th>Tgl Penetapan Angsuran</th>
            <th>No SK Angsuran</th>
            <th>Nama BU</th>
            <th>Bulan Awal Periksa</th>
            <th>Bulan Akhir Periksa</th>
            <th>Total Angsuran</th>
            <th>Jml Angsur</th>
            <th>Sudah Bayar</th>
            <th>Tunggakan</th>

        </tr>
    </thead>
    <tbody style="text-align: center;">
        <?php
        $no = 1;
        foreach ($data['cari'] as $row) : ?>
            <tr><td><?=$no++;?></td>
                <td>
                    <label class="checkbox">
                        <!-- <input type="checkbox" name="checkbox"> -->
                        <input class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo $row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $row['TBLPENDATAAN_BLNPAJAK'] ?>" name="nopokPajak" type="checkbox">
                        <i></i>
                    </label>
                </td>
                <td>20<?= $row['TBLPENDATAAN_THNPAJAK']; ?></td> <!-- Tahun -->
                <td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td> <!-- Bulan -->
                <td><?= $row['TBLDAFTAR_NOPOK']; ?></td> <!-- Nopok -->
                <td><?= $row[$data['NamaTBL'] . '_TGLSURATANGSUR']; ?> <?= LokalIndonesia::getBulan($row[$data['NamaTBL'] . '_BLNSURATANGSUR']); ?> 20<?= $row[$data['NamaTBL'] . '_THNSURATANGSUR']; ?></td> <!-- Tgl SKPDA -->
                <td><?= $row[$data['NamaTBL'] . '_REGSURATANGSUR']; ?></td> <!-- No SK-A -->
                <td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td> <!-- Nama BU -->
                <td><?= $row[$data['NamaTBL'] . '_BLNKBAWAL']; ?></td> <!-- BULAN Awal -->
                <td><?= $row[$data['NamaTBL'] . '_BLNKBAKHIR']; ?></td> <!-- BULAN Akhir -->
                <td>Rp. <?= LokalIndonesia::ribuan($row['TOTALTAGIHAN']); ?></td> <!-- TOTAL ANGSURAN -->
                <td><?= $row['HITUNG']; ?></td> <!-- JML ANGSURAN -->
                <td>Rp. <?= LokalIndonesia::ribuan($row['TOTALSUDAHBAYAR']); ?></td> <!-- SUDAH BAYAR -->
                <td>Rp. <?= LokalIndonesia::ribuan($row['SISANGASUR']); ?></td> <!-- Sisa Tunggakan  -->


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
        $('.cbx_tetapkan').prop("checked", elemen.checked);
    }

    $(".cbx_tetapkan").click(function(event) {
        // $('#modal_detail').modal('show');
        if (!$(event.target).prop('checked')) {
            window.id_eksepsi += ',' + $(event.target).val();
            // $('#modal_detail').modal('hide');
        }
    });
</script>