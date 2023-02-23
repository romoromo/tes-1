<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
    <thead>
        <tr>
            <th>Urut</th>
            <th data-hide="phone">
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
            <th>Tgl. Penetapan KB</th>
            <th>Tgl. Tempo KB</th>
            <th>No. KB</th>
            <th>Nama BU</th>
            <th>Alamat</th>
            <th>Pajak Periksa</th>
            <th>Bunga</th>
            <th>Kenaikan</th>
            <th>Rp SKPDKB</th>
            <!--  <th ></th> -->

        </tr>
    </thead>
    <tbody style="text-align: center;">
        <?php
        $no = 1;
        foreach ($data['cari'] as $row) : ?>
            <tr>
                <td><?=$no++;?></td>
                <td>
                    <label class="checkbox">
                        <!-- <input type="checkbox" name="checkbox"> -->
                        <input class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo (int)$row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $row['TBLPENDATAAN_BLNPAJAK'] ?>" name="nopokPajak" type="checkbox">
                        <i></i>
                    </label>
                </td>
                <td>20<?= $row['TBLPENDATAAN_THNPAJAK']; ?></td> <!-- Tahun -->
                <td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td> <!-- Bulan -->
                <td><?= $row['TBLDAFTAR_NOPOK']; ?></td> <!-- Nopok -->
                <td><?= $row[$data['NamaTBL'] . '_TGLKURANGBAYAR']; ?> <?php echo LokalIndonesia::getBulan($row[$data['NamaTBL'] . '_BLNKURANGBAYAR']); ?> 20<?= $row[$data['NamaTBL'] . '_THNKURANGBAYAR']; ?></td> <!-- Tgl. Penetapan KB -->
                <td><?= $row[$data['NamaTBL'] . '_TGLBTSKRGBAYAR']; ?> <?php echo LokalIndonesia::getBulan($row[$data['NamaTBL'] . '_BLNBTSKRGBAYAR']); ?> 20<?= $row[$data['NamaTBL'] . '_THNBTSKRGBAYAR']; ?></td> <!-- Tgl. Tempo KB -->
                <td><?= $row[$data['NamaTBL'] . '_REGKURANGBAYAR']; ?></td> <!-- No KB -->
                <td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?></td> <!-- Nama Bu -->
                <td><?= $row['TBLDAFTAR_BADANUSAHAALAMAT']; ?></td> <!-- Alamat  -->
                <td><?= LokalIndonesia::ribuan($row[$data['NamaTBL'] . '_PAJAKPERIKSA']); ?></td> <!-- Pajak Periksa -->
                <td><?= LokalIndonesia::ribuan($row[$data['NamaTBL'] . '_BUNGAKRGBAYAR']); ?></td> <!-- Bunga -->
                <td><?= LokalIndonesia::ribuan($row[$data['NamaTBL'] . '_NAKB']); ?></td> <!-- Denda -->
                <td><?= LokalIndonesia::ribuan($row[$data['NamaTBL'] . '_RUPIAHKRGBAYAR']); ?></td> <!-- Rp.SKPDKB -->
                <!--   <td></td> -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // reloadDT('dt_basic');
        $('.cbx_tetapkan').prop("checked", false);
    });

    function cekAll(elemen) {
        $('.cbx_tetapkan').prop("checked", elemen.checked);
    }

    $(".cbx_tetapkan").click(function(event) {
        if (!$(event.target).prop('checked')) {
            window.id_eksepsi += ',' + $(event.target).val();
            // cari();
        }
    });
</script>