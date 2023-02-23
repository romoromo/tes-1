<div id="chart"></div>

<script>
$(document).ready(function () {
    Highcharts.setOptions({
    lang: {
        //numericSymbols: null //otherwise by default ['k', 'M', 'G', 'T', 'P', 'E']
        numericSymbols: [' Ribu', ' Juta', ' Milyar', ' Triliun', ' Kuadriliun'] //otherwise by default 
        ,thousandsSep : '.'
        ,decimalPoint: ','
        },
    });
    <?php if ($data['grafik'] == 'npa') : ?>
        $('#chart').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Garis NPA'
            },
            subtitle: {
                text: 'Pendapatan Daerah'
            },
            xAxis: {
                categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
            },
            yAxis: {
                title: {
                    text: 'Rupiah'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Grafik NPA',
                data: [
                    <?php foreach ($data['npa'] as $r) : ?>
                        <?= $r['TBLDAFTTANAH_NILAIAIR1'] ?>,
                    <?php endforeach; ?>
                ]
            }]
        });
    <?php elseif($data['grafik'] == 'volume'): ?>
        $('#chart').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Grafik Garis Volume'
            },
            subtitle: {
                text: 'Pendapatan Daerah'
            },
            xAxis: {
                categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember']
            },
            yAxis: {
                title: {
                    text: 'Volume (m3)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Grafik Volume',
                data: [
                    <?php foreach ($data['volume'] as $r) : ?>
                        <?= $r['TBLDAFTTANAH_TOTALVOLUME'] ?>,
                    <?php endforeach; ?>
                ]
            }]
        });
    <?php endif; ?>
    
});
</script>