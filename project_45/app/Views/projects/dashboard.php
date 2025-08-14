<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<h2>Dashboard Proyek</h2>
<p>Total Proyek: <?= $total ?></p>
<p>Rata-rata Nilai Total: Rp<?= number_format($avg_nilai['nilai_total_drm'], 0, ',', '.') ?></p>

<canvas id="areaChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('areaChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($area_data, 'area')) ?>,
        datasets: [{
            label: 'Jumlah Proyek per Area',
            data: <?= json_encode(array_column($area_data, 'jumlah')) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.6)'
        }]
    }
});
</script>

<?= $this->endSection() ?>
