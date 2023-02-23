<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
                <thead>
                    <tr>
                        <th width="10%" data-hide="phone">
                            <div class="center">
                                <label class="checkbox">
                                    <input checked="" type="checkbox" name="cbx-all" onclick="cekAll(this)">
                                    <i></i> All
                                </label>
                            </div>
                        </th>
                        <th >Tahun</th>
                        <th >Bulan</th>
                        <th >Hari / Tanggal</th>
                        <th >Ke</th>
                        <th >NOPOK</th>
                        <th >Tgl SKPD</th>
                        <th >Nama BU</th>
                        <th >No SKPD</th>
                        <th >SKPD (Rp)</th>
                        <th >No SSP</th>
                        <th >Rp SSPD</th>
                        <th >Status</th>

            </tr>
        </thead>
        <tbody>
        <?php foreach ($data['cari'] as $row): ?>
                 <tr>
                    <td><input type="checkbox"></td>
                    <td ><?=$row['TBLPENDATAAN_THNPAJAK'];?></td>
                    <td><?=$row['TBLPENDATAAN_BLNPAJAK'];?></td>
                    <td><?=$row['TBLPENDATAAN_TGLPAJAK'];?></td>
                    <td><?=$row['TBLPENDATAAN_PAJAKKE'];?></td>
                    <td><?=$row['TBLDAFTAR_NOPOK'];?></td>
                    <td><?=$row['TBLDAFTREKLAME_TGLSKPD'];?></td>
                    <td><?=$row['TBLDAFTAR_BADANUSAHANAMA'];?></td>
                    <td><?=$row['TBLDAFTREKLAME_NOMORSKPD'];?></td>
                    <td><?=$row['TBLDAFTREKLAME_PAJAKSKPD'];?></td>
                    <td></td>
                    <td><?=$row['TBLDAFTREKLAME_RUPIAHSETOR'];?></td>
                    <td></td>
               </tr>
    <?php endforeach ?>
    </tbody>
</table>