<div class="table-responsive">
    <table id="form_data_rekening" width="100%" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
        <tbody>
            <tr>
                <th class="text-center" style="vertical-align: middle;">Tahun</th>         
                <!-- <th class="text-center" style="vertical-align: middle;">Sub</th>          -->
                <th class="text-center" style="vertical-align: middle;">Bulan</th>         
                <th class="text-center" style="vertical-align: middle;">No SK</th>
                <th class="text-center" style="vertical-align: middle;">Rupiah Ketetapan</th>         
            </tr>
            <?php foreach ($data['masapajak'] as $list) : ?>
                <tr onclick="addmasapajakToTabel('<?= $list['THP'] ?>','<?= $list['BLP']; ?>','<?= $list['NOKB']; ?>','<?= $list['RPKB']; ?>','<?= LokalIndonesia::getBulan($list['BLP']); ?>','<?= LokalIndonesia::ribuan($list['RPKB']); ?>')">
                    <td>20<?= $list['THP']; ?></td>
                    <td><?= LokalIndonesia::getBulan($list['BLP']); ?></td>
                    <td><?= $list['NOKB']; ?></td>
                    <td><?= LokalIndonesia::ribuan($list['RPKB']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
</script>