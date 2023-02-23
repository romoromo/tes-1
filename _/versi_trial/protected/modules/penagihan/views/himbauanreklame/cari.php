<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
    <thead>
        <tr>
            <th>URUT</th>
            <th>
                <div class="center">
                    <label class="checkbox">
                        <input type="checkbox" name="cbx-all" onclick="cekAll(this)">
                        <i></i> All
                    </label>
                </div>
            </th>
            <th>TAHUN</th>
            <th>BULAN</th>
            <th>TANGGAL</th>
            <th>KE</th>
            <th>NOPOK</th>
            <th>TGL SKPD</th>
            <th>NAMA BU</th>
            <th>No SKPD</th>
            <th>SKPD (RP)</th>
            <th>NOSSP</th>
            <th>RPSSP</th>
            <th>STATUS</th>
            <th>UNIK ID</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data['cari'] as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>
                    <div align="center">
                        <label class="checkbox">
                            <!-- <input type="checkbox" name="checkbox"> -->
                            <input class="cbx_tetapkan" value="<?php echo $row['TBLDAFTAR_NOPOK'] ?>-<?php echo (int)$row['TBLPENDATAAN_THNPAJAK'] ?>-<?php echo $row['TBLPENDATAAN_BLNPAJAK'] ?>-<?php echo $row['TBLPENDATAAN_TGLPAJAK'] ?>-<?php echo $row['TBLPENDATAAN_PAJAKKE'] ?>" name="nopokPajak" type="checkbox">
                            <i></i>
                        </label>
                    </div>
                </td>
                <td><?= $row['TBLPENDATAAN_THNPAJAK']; ?></td>
                <!--BNAMA-->
                <td><?= $row['TBLPENDATAAN_BLNPAJAK']; ?></td>
                <!--BALAMAT-->
                <td><?= $row['TBLPENDATAAN_TGLPAJAK']; ?></td>
                <!--KTRE1-->
                <td><?= $row['TBLPENDATAAN_PAJAKKE']; ?></td> <!-- KE -->
                <td><?= $row['TBLDAFTAR_NOPOK']; ?></td>
                <!--NOPOK-->
                <td><?= $row['TBLDAFTREKLAME_TGLSKPD']; ?>/<?= $row['TBLDAFTREKLAME_BLNSKPD']; ?>/<?= $row['TBLDAFTREKLAME_THNSKPD'] + 2000; ?></td> <!-- TGL SKPD -->
                <td><?= $row['TBLDAFTAR_BADANUSAHANAMA']; ?>
                    <!-- NAMA BU -->
                <td><?= $row['TBLDAFTREKLAME_NOMORSKPD']; ?></td> <!-- No SKPD -->
                <td>Rp. <?= LokalIndonesia::ribuan($row['TBLDAFTREKLAME_PAJAKSKPD']); ?></td> <!-- KETETAPAN -->
                <td>Rp. <?= LokalIndonesia::ribuan($row['TBLDAFTREKLAME_RUPIAHSETOR']); ?></td> <!-- RPSSP -->
                <td><?= $row['TBLDAFTREKLAME_REGSETOR']; ?></td> <!-- RPSSP -->
                <td><?= $row['STATUS']; ?></td> <!-- STATUS -->
                <td><?= $row['UNIK_ID']; ?></td> <!-- STATUS -->
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        // reloadDT('dt_basic');
        $('.cbx_tetapkan').prop("checked", false);
    });

    /*jQuery(document).ready(function($) {
        var elm = $("input[name='nopokPajak']");
        cekAll(elm);
    });*/

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